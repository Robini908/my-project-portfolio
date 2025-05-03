/**
 * Advanced AI Features Module
 *
 * This module provides various AI capabilities for the portfolio:
 * - Content summarization
 * - Image recognition and analysis
 * - Code snippet explanation
 * - Sentiment analysis
 * - Professional skill matching
 * - Tech stack recommendations
 * - Career path analysis
 */

class AIFeaturesModule {
    constructor(options = {}) {
        this.options = {
            apiEndpoint: '/api/ai',
            useLocalModels: false,
            modelPreferences: {
                summarization: 'gpt-3.5-turbo',
                imageAnalysis: 'vision-model',
                codeExplanation: 'code-llama',
                sentimentAnalysis: 'sentiment-analyzer',
                skillMatching: 'skills-analyzer'
            },
            maxTokens: 1000,
            ...options
        };

        this.isInitialized = false;
        this.modelStatus = {
            summarization: false,
            imageAnalysis: false,
            codeExplanation: false,
            sentimentAnalysis: false,
            skillMatching: false
        };

        this.callbacks = {
            onInitialized: null,
            onError: null,
            onModelLoaded: null,
            onProcessingStart: null,
            onProcessingComplete: null
        };

        // Initialize module
        this.init();
    }

    /**
     * Initialize the AI Features module
     */
    init() {
        // Check for browser compatibility
        if (!('fetch' in window)) {
            this._fireCallback('onError', new Error('Your browser does not support required features'));
            return;
        }

        // Initialize local models if requested
        if (this.options.useLocalModels) {
            this._initializeLocalModels();
        } else {
            // Just mark as initialized since we'll use API endpoints
            this.isInitialized = true;
            this._fireCallback('onInitialized');
        }

        // Add global instance
        window.AIFeatures = this;
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
        return this;
    }

    /**
     * Text Summarization API
     * Summarizes a long text into a concise version
     *
     * @param {string} text - Text to summarize
     * @param {object} options - Options for summarization
     * @returns {Promise<object>} - Summarization result
     */
    async summarizeText(text, options = {}) {
        if (!text || text.trim().length === 0) {
            throw new Error('No text provided for summarization');
        }

        this._fireCallback('onProcessingStart', { type: 'summarization' });

        try {
            // If using local models and they're available
            if (this.options.useLocalModels && this.modelStatus.summarization) {
                return await this._summarizeWithLocalModel(text, options);
            }

            // Otherwise use API
            const response = await fetch(`${this.options.apiEndpoint}/summarize`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({
                    text,
                    max_length: options.maxLength || this.options.maxTokens,
                    model: options.model || this.options.modelPreferences.summarization
                }),
            });

            if (!response.ok) {
                throw new Error(`API request failed with status ${response.status}`);
            }

            const result = await response.json();
            this._fireCallback('onProcessingComplete', {
                type: 'summarization',
                result
            });
            return result;
        } catch (error) {
            this._fireCallback('onError', error);
            throw error;
        }
    }

    /**
     * Image Analysis API
     * Analyzes an image and returns descriptions, objects, faces, etc.
     *
     * @param {string|File} image - Image URL or File object
     * @param {object} options - Analysis options
     * @returns {Promise<object>} - Analysis results
     */
    async analyzeImage(image, options = {}) {
        if (!image) {
            throw new Error('No image provided for analysis');
        }

        this._fireCallback('onProcessingStart', { type: 'imageAnalysis' });

        try {
            const formData = new FormData();

            if (typeof image === 'string') {
                formData.append('image_url', image);
            } else if (image instanceof File) {
                formData.append('image', image);
            } else {
                throw new Error('Invalid image format. Provide a URL or File object');
            }

            // Add options to form data
            if (options.detectFaces !== undefined) {
                formData.append('detect_faces', options.detectFaces);
            }
            if (options.detectObjects !== undefined) {
                formData.append('detect_objects', options.detectObjects);
            }
            if (options.generateCaption !== undefined) {
                formData.append('generate_caption', options.generateCaption);
            }

            const response = await fetch(`${this.options.apiEndpoint}/analyze-image`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: formData,
            });

            if (!response.ok) {
                throw new Error(`API request failed with status ${response.status}`);
            }

            const result = await response.json();
            this._fireCallback('onProcessingComplete', {
                type: 'imageAnalysis',
                result
            });
            return result;
        } catch (error) {
            this._fireCallback('onError', error);
            throw error;
        }
    }

    /**
     * Code Explanation API
     * Explains the provided code snippet with intelligent annotations
     *
     * @param {string} code - Code snippet to explain
     * @param {string} language - Programming language
     * @param {object} options - Explanation options
     * @returns {Promise<object>} - Explanation results
     */
    async explainCode(code, language, options = {}) {
        if (!code || code.trim().length === 0) {
            throw new Error('No code provided for explanation');
        }

        this._fireCallback('onProcessingStart', { type: 'codeExplanation' });

        try {
            const response = await fetch(`${this.options.apiEndpoint}/explain-code`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({
                    code,
                    language,
                    level: options.level || 'intermediate',
                    include_performance: options.includePerformance || false,
                    highlight_issues: options.highlightIssues || true,
                    model: options.model || this.options.modelPreferences.codeExplanation
                }),
            });

            if (!response.ok) {
                throw new Error(`API request failed with status ${response.status}`);
            }

            const result = await response.json();
            this._fireCallback('onProcessingComplete', {
                type: 'codeExplanation',
                result
            });
            return result;
        } catch (error) {
            this._fireCallback('onError', error);
            throw error;
        }
    }

    /**
     * Sentiment Analysis API
     * Analyzes the sentiment of a text
     *
     * @param {string} text - Text to analyze
     * @param {object} options - Analysis options
     * @returns {Promise<object>} - Sentiment analysis results
     */
    async analyzeSentiment(text, options = {}) {
        if (!text || text.trim().length === 0) {
            throw new Error('No text provided for sentiment analysis');
        }

        this._fireCallback('onProcessingStart', { type: 'sentimentAnalysis' });

        try {
            const response = await fetch(`${this.options.apiEndpoint}/analyze-sentiment`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({
                    text,
                    detailed: options.detailed || false,
                    model: options.model || this.options.modelPreferences.sentimentAnalysis
                }),
            });

            if (!response.ok) {
                throw new Error(`API request failed with status ${response.status}`);
            }

            const result = await response.json();
            this._fireCallback('onProcessingComplete', {
                type: 'sentimentAnalysis',
                result
            });
            return result;
        } catch (error) {
            this._fireCallback('onError', error);
            throw error;
        }
    }

    /**
     * Professional Skills Analysis
     * Analyzes professional skills from bio and suggests matches/improvements
     *
     * @param {string} bio - Professional bio text
     * @param {Array} currentSkills - Current listed skills
     * @param {object} options - Analysis options
     * @returns {Promise<object>} - Skills analysis results
     */
    async analyzeSkills(bio, currentSkills = [], options = {}) {
        if (!bio || bio.trim().length === 0) {
            throw new Error('No professional bio provided for skills analysis');
        }

        this._fireCallback('onProcessingStart', { type: 'skillsAnalysis' });

        try {
            const response = await fetch(`${this.options.apiEndpoint}/analyze-skills`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({
                    bio,
                    current_skills: currentSkills,
                    career_focus: options.careerFocus || 'full stack development',
                    experience_level: options.experienceLevel || 'mid-level',
                    model: options.model || this.options.modelPreferences.skillMatching
                }),
            });

            if (!response.ok) {
                throw new Error(`API request failed with status ${response.status}`);
            }

            const result = await response.json();
            this._fireCallback('onProcessingComplete', {
                type: 'skillsAnalysis',
                result
            });
            return result;
        } catch (error) {
            this._fireCallback('onError', error);
            throw error;
        }
    }

    /**
     * Career Path Analysis
     * Analyzes career trajectory based on skills and bio
     *
     * @param {string} bio - Professional bio text
     * @param {Array} skills - Professional skills
     * @param {object} options - Analysis options
     * @returns {Promise<object>} - Career path analysis results
     */
    async analyzeCareerPath(bio, skills = [], options = {}) {
        if (!bio || bio.trim().length === 0) {
            throw new Error('No professional bio provided for career path analysis');
        }

        this._fireCallback('onProcessingStart', { type: 'careerPathAnalysis' });

        try {
            const response = await fetch(`${this.options.apiEndpoint}/analyze-career-path`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({
                    bio,
                    skills,
                    current_role: options.currentRole || 'Full Stack Developer',
                    years_experience: options.yearsExperience || 5,
                    career_interests: options.careerInterests || [],
                    model: options.model || this.options.modelPreferences.skillMatching
                }),
            });

            if (!response.ok) {
                throw new Error(`API request failed with status ${response.status}`);
            }

            const result = await response.json();
            this._fireCallback('onProcessingComplete', {
                type: 'careerPathAnalysis',
                result
            });
            return result;
        } catch (error) {
            this._fireCallback('onError', error);
            throw error;
        }
    }

    /**
     * Tech Stack Recommendation
     * Recommends appropriate technologies based on skills and preferences
     *
     * @param {Array} skills - Professional skills
     * @param {Array} currentTech - Current technologies
     * @param {object} options - Analysis options
     * @returns {Promise<object>} - Tech stack recommendations
     */
    async recommendTechStack(skills = [], currentTech = [], options = {}) {
        this._fireCallback('onProcessingStart', { type: 'techStackRecommendation' });

        try {
            const response = await fetch(`${this.options.apiEndpoint}/recommend-tech-stack`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({
                    skills,
                    current_tech: currentTech,
                    project_type: options.projectType || 'web application',
                    preferences: options.preferences || {
                        scalability: 'high',
                        performance: 'high',
                        learning_curve: 'moderate'
                    },
                    model: options.model || this.options.modelPreferences.skillMatching
                }),
            });

            if (!response.ok) {
                throw new Error(`API request failed with status ${response.status}`);
            }

            const result = await response.json();
            this._fireCallback('onProcessingComplete', {
                type: 'techStackRecommendation',
                result
            });
            return result;
        } catch (error) {
            this._fireCallback('onError', error);
            throw error;
        }
    }

    /**
     * Initialize local models for offline use
     * @private
     */
    async _initializeLocalModels() {
        try {
            // Load models sequentially to avoid overwhelming the browser
            // These are placeholders - in a real implementation you would use
            // actual model loading code for ONNX Runtime, TensorFlow.js, etc.

            this._fireCallback('onModelLoaded', {
                model: 'summarization',
                status: 'loading'
            });

            // Simulated loading - in a real app, this would load actual models
            await new Promise(resolve => setTimeout(resolve, 1000));

            this.modelStatus.summarization = true;
            this._fireCallback('onModelLoaded', {
                model: 'summarization',
                status: 'loaded'
            });

            // Additional models would be loaded similarly
            // ...

            this.isInitialized = true;
            this._fireCallback('onInitialized');
        } catch (error) {
            this._fireCallback('onError', error);
            this.isInitialized = false;
        }
    }

    /**
     * Use local model for summarization
     * @private
     */
    async _summarizeWithLocalModel(text, options) {
        // This would be replaced with actual local model inference
        // For now, just return a simplistic summary
        const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0);
        const numberOfSentences = Math.max(1, Math.floor(sentences.length * 0.3));
        const summarySentences = sentences.slice(0, numberOfSentences);

        return {
            summary: summarySentences.join('. ') + '.',
            original_length: text.length,
            summary_length: summarySentences.join('. ').length,
            reduction_percentage: Math.round((1 - summarySentences.join('. ').length / text.length) * 100)
        };
    }

    /**
     * Fire callback if it exists
     * @private
     */
    _fireCallback(name, data) {
        if (typeof this.callbacks[name] === 'function') {
            this.callbacks[name](data);
        }
    }
}

// Initialize when document is ready
document.addEventListener('DOMContentLoaded', () => {
    window.aiFeatures = new AIFeaturesModule();
});

// Export for module systems
if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
    module.exports = AIFeaturesModule;
} else {
    window.AIFeaturesModule = AIFeaturesModule;
}
