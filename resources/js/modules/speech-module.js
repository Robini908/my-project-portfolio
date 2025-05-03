/**
 * Enhanced Text-to-Speech Module
 * Provides advanced speech synthesis capabilities with voice selection,
 * speech rate control, and visual feedback.
 */

class SpeechModule {
    constructor(options = {}) {
        this.options = {
            selector: '.speech-text',
            highlightClass: 'highlight',
            rate: 0.95,
            pitch: 1.0,
            volume: 1.0,
            preferredLang: 'en',
            preferredVoiceKeywords: ['Google', 'Natural', 'Neural', 'Premium'],
            autoScroll: true,
            ...options
        };

        this.synth = window.speechSynthesis;
        this.isSpeaking = false;
        this.isPaused = false;
        this.currentParagraph = 0;
        this.paragraphs = [];
        this.voices = [];
        this.selectedVoice = null;
        this.callbacks = {
            onStart: null,
            onPause: null,
            onResume: null,
            onStop: null,
            onParagraphChange: null,
            onVoicesChanged: null,
            onError: null
        };

        this.init();
    }

    /**
     * Initialize the speech module
     */
    init() {
        if (!('speechSynthesis' in window)) {
            this._fireCallback('onError', new Error('Speech synthesis not supported in this browser'));
            return;
        }

        // Load paragraphs from the DOM
        this._loadParagraphs();

        // Load available voices
        this._loadVoices();

        // Set up voice change listener (Chrome loads voices asynchronously)
        this.synth.addEventListener('voiceschanged', () => {
            this._loadVoices();
            this._fireCallback('onVoicesChanged', this.voices);
        });
    }

    /**
     * Load paragraphs from the DOM based on selector
     * @private
     */
    _loadParagraphs() {
        const elements = document.querySelectorAll(this.options.selector);
        this.paragraphs = Array.from(elements).map(el => {
            return {
                element: el,
                text: el.textContent.trim()
            };
        });
    }

    /**
     * Load and filter available voices
     * @private
     */
    _loadVoices() {
        const allVoices = this.synth.getVoices();

        // Filter to preferred language if specified
        this.voices = allVoices.filter(voice =>
            !this.options.preferredLang || voice.lang.includes(this.options.preferredLang)
        );

        // Try to find a high-quality voice
        this.selectedVoice = this.voices.find(voice =>
            this.options.preferredVoiceKeywords.some(keyword =>
                voice.name.includes(keyword)
            )
        ) || this.voices[0];
    }

    /**
     * Start speech synthesis
     */
    start() {
        if (!this.synth || this.isSpeaking) return;

        // Cancel any ongoing speech
        this.synth.cancel();

        this.isSpeaking = true;
        this.isPaused = false;
        this.currentParagraph = 0;

        this._fireCallback('onStart');
        this._speakCurrentParagraph();
    }

    /**
     * Pause speech synthesis
     */
    pause() {
        if (!this.synth || !this.isSpeaking || this.isPaused) return;

        this.synth.pause();
        this.isPaused = true;
        this._fireCallback('onPause');
    }

    /**
     * Resume speech synthesis
     */
    resume() {
        if (!this.synth || !this.isSpeaking || !this.isPaused) return;

        this.synth.resume();
        this.isPaused = false;
        this._fireCallback('onResume');
    }

    /**
     * Stop speech synthesis
     */
    stop() {
        if (!this.synth) return;

        this.synth.cancel();
        this.isSpeaking = false;
        this.isPaused = false;

        this._clearHighlighting();
        this._fireCallback('onStop');
    }

    /**
     * Skip to the next paragraph
     */
    next() {
        if (!this.isSpeaking) return;

        this.synth.cancel();
        this.currentParagraph++;

        if (this.currentParagraph < this.paragraphs.length) {
            this._speakCurrentParagraph();
        } else {
            this.stop();
        }
    }

    /**
     * Go back to the previous paragraph
     */
    previous() {
        if (!this.isSpeaking) return;

        this.synth.cancel();
        this.currentParagraph = Math.max(0, this.currentParagraph - 1);
        this._speakCurrentParagraph();
    }

    /**
     * Set speech rate
     * @param {number} rate - Speech rate (0.1 to 2.0)
     */
    setRate(rate) {
        this.options.rate = Math.max(0.1, Math.min(2, rate));

        // If speaking, restart current paragraph with new rate
        if (this.isSpeaking && !this.isPaused) {
            this.synth.cancel();
            this._speakCurrentParagraph();
        }
    }

    /**
     * Set speech pitch
     * @param {number} pitch - Speech pitch (0.1 to 2.0)
     */
    setPitch(pitch) {
        this.options.pitch = Math.max(0.1, Math.min(2, pitch));

        if (this.isSpeaking && !this.isPaused) {
            this.synth.cancel();
            this._speakCurrentParagraph();
        }
    }

    /**
     * Set speech volume
     * @param {number} volume - Speech volume (0.0 to 1.0)
     */
    setVolume(volume) {
        this.options.volume = Math.max(0, Math.min(1, volume));

        if (this.isSpeaking && !this.isPaused) {
            this.synth.cancel();
            this._speakCurrentParagraph();
        }
    }

    /**
     * Select a specific voice by name or index
     * @param {string|number} voiceIdentifier - Voice name or index
     */
    selectVoice(voiceIdentifier) {
        if (typeof voiceIdentifier === 'number') {
            if (voiceIdentifier >= 0 && voiceIdentifier < this.voices.length) {
                this.selectedVoice = this.voices[voiceIdentifier];
            }
        } else if (typeof voiceIdentifier === 'string') {
            const voice = this.voices.find(v => v.name.includes(voiceIdentifier));
            if (voice) this.selectedVoice = voice;
        }

        if (this.isSpeaking && !this.isPaused) {
            this.synth.cancel();
            this._speakCurrentParagraph();
        }
    }

    /**
     * Get available voices
     * @returns {Array} Available voices
     */
    getVoices() {
        return this.voices;
    }

    /**
     * Get current state
     * @returns {Object} Current state
     */
    getState() {
        return {
            isSpeaking: this.isSpeaking,
            isPaused: this.isPaused,
            currentParagraph: this.currentParagraph,
            totalParagraphs: this.paragraphs.length,
            rate: this.options.rate,
            pitch: this.options.pitch,
            volume: this.options.volume,
            selectedVoice: this.selectedVoice
        };
    }

    /**
     * Set a callback function
     * @param {string} event - Event name
     * @param {Function} callback - Callback function
     */
    on(event, callback) {
        if (this.callbacks.hasOwnProperty(event)) {
            this.callbacks[event] = callback;
        }
    }

    /**
     * Speak the current paragraph
     * @private
     */
    _speakCurrentParagraph() {
        if (this.currentParagraph >= this.paragraphs.length) {
            this.stop();
            return;
        }

        // Highlight current paragraph
        this._highlightParagraph();

        // Scroll to paragraph if enabled
        if (this.options.autoScroll) {
            this._scrollToParagraph();
        }

        // Fire callback for paragraph change
        this._fireCallback('onParagraphChange', {
            index: this.currentParagraph,
            total: this.paragraphs.length,
            text: this.paragraphs[this.currentParagraph].text,
            element: this.paragraphs[this.currentParagraph].element
        });

        // Create utterance
        const utterance = new SpeechSynthesisUtterance(this.paragraphs[this.currentParagraph].text);

        // Apply voice and options
        if (this.selectedVoice) {
            utterance.voice = this.selectedVoice;
        }

        utterance.rate = this.options.rate;
        utterance.pitch = this.options.pitch;
        utterance.volume = this.options.volume;

        // Set up completion handler
        utterance.onend = () => {
            this.currentParagraph++;
            if (this.currentParagraph < this.paragraphs.length) {
                this._speakCurrentParagraph();
            } else {
                this.stop();
            }
        };

        // Start speaking
        this.synth.speak(utterance);
    }

    /**
     * Highlight the current paragraph
     * @private
     */
    _highlightParagraph() {
        this._clearHighlighting();

        if (this.currentParagraph < this.paragraphs.length) {
            this.paragraphs[this.currentParagraph].element.classList.add(this.options.highlightClass);
        }
    }

    /**
     * Clear highlighting from all paragraphs
     * @private
     */
    _clearHighlighting() {
        this.paragraphs.forEach(p => {
            p.element.classList.remove(this.options.highlightClass);
        });
    }

    /**
     * Scroll to the current paragraph
     * @private
     */
    _scrollToParagraph() {
        if (this.currentParagraph < this.paragraphs.length) {
            const element = this.paragraphs[this.currentParagraph].element;
            element.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    /**
     * Fire a callback if it exists
     * @param {string} name - Callback name
     * @param {*} data - Data to pass to callback
     * @private
     */
    _fireCallback(name, data) {
        if (typeof this.callbacks[name] === 'function') {
            this.callbacks[name](data);
        }
    }
}

// Export for module systems
if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
    module.exports = SpeechModule;
} else {
    window.SpeechModule = SpeechModule;
}

// Initialize when document is ready
document.addEventListener('DOMContentLoaded', () => {
    window.speechModule = new SpeechModule();
});
