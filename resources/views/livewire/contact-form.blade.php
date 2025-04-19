<div>
    <!-- Contact Form Component -->
    <div class="relative max-w-lg mx-auto w-full">
        <!-- Success Message Modal -->
        @if($successMessage)
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <!-- Modal Backdrop with Blur -->
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity duration-300" wire:click="$set('successMessage', false)"></div>

            <!-- Modal Content with Animation -->
            <div class="relative bg-gradient-to-br from-slate-900 to-slate-800 border border-green-500/20 shadow-[0_0_40px_rgba(52,211,153,0.2)] rounded-2xl p-8 transform transition-all animate-float-in max-w-md w-full mx-4 overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-400 to-emerald-500"></div>
                <div class="absolute -bottom-20 -right-20 w-40 h-40 bg-green-500/10 rounded-full blur-2xl"></div>
                <div class="absolute -top-20 -left-20 w-40 h-40 bg-emerald-500/10 rounded-full blur-2xl"></div>

                <div class="text-center relative z-10">
                    <!-- Success Icon -->
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-green-100/10 mb-6 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>

                    <!-- Success Messages -->
                    <h3 class="text-2xl font-bold text-white mb-3">Message Sent Successfully!</h3>
                    <div class="h-1 w-16 bg-gradient-to-r from-green-400 to-emerald-500 mx-auto mb-5 rounded-full"></div>
                    <p class="text-gray-300 mb-8 leading-relaxed">
                        Thank you for contacting me! I'll review your message and get back to you as soon as possible. You'll receive a confirmation email shortly.
                    </p>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3 justify-center">
                        <button
                            wire:click="resetForm"
                            class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-lg hover:from-green-600 hover:to-emerald-700 transition-all duration-300 font-medium shadow-lg shadow-green-500/20 flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Awesome!</span>
                        </button>
                        <a
                            href="#projects"
                            wire:click="$set('successMessage', false)"
                            class="px-6 py-3 bg-slate-700 hover:bg-slate-600 text-white rounded-lg transition-all duration-300 font-medium shadow-lg shadow-slate-800/50 flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5z" />
                            </svg>
                            <span>View My Projects</span>
                        </a>
                    </div>

                    <!-- Confetti Animation Canvas -->
                    <canvas id="success-confetti" class="absolute inset-0 z-0 pointer-events-none"></canvas>
                </div>
            </div>
        </div>

        <!-- Success Animation and Sound -->
        <script>
            document.addEventListener('livewire:initialized', () => {
                @this.on('showSuccessMessage', () => {
                    // Reset all form fields visually to ensure clean state
                    const form = document.querySelector('form[wire\\:submit="submit"]');
                    if (form) {
                        form.reset();
                    }

                    // Play success sound
                    const audio = new Audio('/audio/success.mp3');
                    audio.volume = 0.3;
                    try {
                        audio.play();
                    } catch (e) {
                        console.log('Audio autoplay prevented');
                    }

                    // Launch confetti animation
                    const canvas = document.getElementById('success-confetti');
                    if (canvas && typeof confetti !== 'undefined') {
                        const myConfetti = confetti.create(canvas, {
                            resize: true
                        });

                        myConfetti({
                            particleCount: 100,
                            spread: 70,
                            origin: { y: 0.6 }
                        });
                    }

                    // Hide success message after some time
                    setTimeout(() => {
                        @this.set('successMessage', false);
                        @this.call('resetForm');
                    }, 8000);
                });
            });
        </script>
        @endif

        <!-- Error Message Modal -->
        @if($errorMessage)
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <!-- Modal Backdrop with Blur -->
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity duration-300" wire:click="$set('errorMessage', false)"></div>

            <!-- Modal Content with Animation -->
            <div class="relative bg-gradient-to-br from-slate-900 to-slate-800 border border-red-500/20 shadow-[0_0_40px_rgba(239,68,68,0.2)] rounded-2xl p-8 transform transition-all animate-float-in max-w-md w-full mx-4 overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-400 to-rose-500"></div>
                <div class="absolute -bottom-20 -right-20 w-40 h-40 bg-red-500/10 rounded-full blur-2xl"></div>
                <div class="absolute -top-20 -left-20 w-40 h-40 bg-rose-500/10 rounded-full blur-2xl"></div>

                <div class="text-center relative z-10">
                    <!-- Error Icon with Animation -->
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-red-100/10 mb-6 mx-auto relative">
                        <div class="absolute inset-0 rounded-full border-2 border-red-400/60 animate-ping opacity-75"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>

                    <!-- Error Messages -->
                    <h3 class="text-2xl font-bold text-white mb-3">Message Could Not Be Sent</h3>
                    <div class="h-1 w-16 bg-gradient-to-r from-red-400 to-rose-500 mx-auto mb-5 rounded-full"></div>
                    <div class="bg-red-500/10 p-4 rounded-lg border border-red-500/20 mb-6">
                        <p class="text-gray-300 leading-relaxed">
                            @if($errorDetails)
                                {{ $errorDetails }}
                            @else
                                Sorry, there was a problem sending your message. Please try again or use an alternative contact method.
                            @endif
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3 justify-center">
                        <button
                            wire:click="resetForm"
                            class="px-6 py-3 bg-gradient-to-r from-red-500 to-rose-600 text-white rounded-lg hover:from-red-600 hover:to-rose-700 transition-all duration-300 font-medium shadow-lg shadow-red-500/20 flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                            </svg>
                            <span>Try Again</span>
                        </button>
                        <a
                            href="mailto:abrahamopuba@gmail.com"
                            class="px-6 py-3 bg-slate-700 hover:bg-slate-600 text-white rounded-lg transition-all duration-300 font-medium shadow-lg shadow-slate-800/50 flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <span>Email Directly</span>
                        </a>
                    </div>

                    <!-- Error Details (if available) -->
                    @if($errorData && is_array($errorData) && count($errorData) > 0)
                    <div class="mt-6 pt-4 border-t border-red-500/10 text-left">
                        @if(app()->environment('local', 'development', 'testing'))
                            <div class="text-sm font-medium text-red-400 mb-1">Technical Information:</div>
                            <div class="bg-red-900/20 rounded-lg p-3 overflow-auto max-h-32 text-xs text-gray-300 font-mono">
                                @foreach($errorData as $key => $value)
                                    <div><span class="text-red-400">{{ $key }}:</span> {{ is_string($value) ? $value : json_encode($value) }}</div>
                                @endforeach
                            </div>
                        @else
                            <!-- User-friendly message for production -->
                            <div class="text-sm font-medium text-red-400 mb-1">Additional Information:</div>
                            <div class="bg-red-900/20 rounded-lg p-3 text-sm text-gray-300">
                                <p>We've recorded this issue and will look into it. If you continue to experience problems, please email us directly.</p>
                                @if(isset($errorData['attempt']))
                                    <p class="mt-2">Submission attempt: {{ $errorData['attempt'] }}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Error Animation and Sound -->
        <script>
            document.addEventListener('livewire:initialized', () => {
                @this.on('showErrorMessage', (event) => {
                    // Play error sound
                    const audio = new Audio('/audio/error.mp3');
                    audio.volume = 0.2;
                    try {
                        audio.play();
                    } catch (e) {
                        console.log('Audio autoplay prevented');
                    }

                    // Flash screen - subtle red flash
                    const flashOverlay = document.createElement('div');
                    flashOverlay.className = 'fixed inset-0 bg-red-900/10 z-40 pointer-events-none';
                    document.body.appendChild(flashOverlay);

                    setTimeout(() => {
                        flashOverlay.remove();
                    }, 300);

                    // Show the specific error message in a browser notification if supported
                    if ("Notification" in window && Notification.permission === "granted") {
                        new Notification("Contact Form", {
                            body: @json(app()->environment('production'))
                                ? "We couldn't send your message. Please try again."
                                : (event.message || "Error sending your message"),
                            icon: "/favicon.ico"
                        });
                    } else if ("Notification" in window && Notification.permission !== "denied") {
                        Notification.requestPermission();
                    }

                    // Hide error message after some time
                    setTimeout(() => {
                        @this.set('errorMessage', false);
                    }, 15000);
                });
            });
        </script>
        @endif

        <div class="p-8 rounded-2xl bg-slate-900/70 backdrop-blur-xl border border-slate-800/50 shadow-2xl transform transition-all duration-500 relative">
            <!-- Loading Overlay -->
            @if($loading)
            <div class="absolute inset-0 flex items-center justify-center bg-slate-900/70 backdrop-blur-md rounded-2xl z-10">
                <div class="flex flex-col items-center">
                    <svg class="animate-spin h-10 w-10 text-indigo-500 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <p class="text-white">Sending your message...</p>
                </div>
            </div>
            @endif

            <form wire:submit="submit" class="space-y-7">
                <!-- Form Header -->
                <div class="mb-8 text-center">
                    <h3 class="text-2xl font-bold bg-gradient-to-r from-violet-400 to-indigo-500 bg-clip-text text-transparent mb-1">Send Message</h3>
                    <div class="w-16 h-1 mx-auto rounded-full bg-gradient-to-r from-violet-500 to-indigo-600"></div>
                </div>

                <!-- Input Fields Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name Field with Floating Label -->
                    <div class="relative">
                        <!-- Boxed Input with Floating Label -->
                        <div class="relative border-2 border-slate-700 rounded-lg bg-slate-800/50 focus-within:border-indigo-500 transition duration-300 shadow-lg overflow-hidden @error('name') border-red-500 @enderror">
                            <input type="text" id="name" wire:model="name" required
                                class="block w-full px-4 pt-6 pb-2 text-white bg-transparent appearance-none focus:outline-none peer"
                                placeholder=" " />
                            <label for="name"
                                class="absolute text-sm text-gray-400 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-indigo-400">
                                Your Name
                            </label>
                            <!-- Icon -->
                            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500 peer-focus:text-indigo-400 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Email Field with Floating Label -->
                    <div class="relative">
                        <!-- Boxed Input with Floating Label -->
                        <div class="relative border-2 border-slate-700 rounded-lg bg-slate-800/50 focus-within:border-indigo-500 transition duration-300 shadow-lg overflow-hidden @error('email') border-red-500 @enderror">
                            <input type="email" id="email" wire:model="email" required
                                class="block w-full px-4 pt-6 pb-2 text-white bg-transparent appearance-none focus:outline-none peer"
                                placeholder=" " />
                            <label for="email"
                                class="absolute text-sm text-gray-400 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-indigo-400">
                                Your Email
                            </label>
                            <!-- Icon -->
                            <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500 peer-focus:text-indigo-400 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                        </div>
                        @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Subject Field with Floating Label -->
                <div class="relative">
                    <!-- Boxed Input with Floating Label -->
                    <div class="relative border-2 border-slate-700 rounded-lg bg-slate-800/50 focus-within:border-indigo-500 transition duration-300 shadow-lg overflow-hidden @error('subject') border-red-500 @enderror">
                        <input type="text" id="subject" wire:model="subject" required
                            class="block w-full px-4 pt-6 pb-2 text-white bg-transparent appearance-none focus:outline-none peer"
                            placeholder=" " />
                        <label for="subject"
                            class="absolute text-sm text-gray-400 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-indigo-400">
                            Subject
                        </label>
                        <!-- Icon -->
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-slate-500 peer-focus:text-indigo-400 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    @error('subject') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Message Field with Floating Label -->
                <div class="relative">
                    <!-- Boxed Input with Floating Label -->
                    <div class="relative border-2 border-slate-700 rounded-lg bg-slate-800/50 focus-within:border-indigo-500 transition duration-300 shadow-lg overflow-hidden @error('message') border-red-500 @enderror">
                        <textarea id="message" wire:model="message" rows="4" required
                            class="block w-full px-4 pt-6 pb-2 text-white bg-transparent appearance-none focus:outline-none resize-none peer"
                            placeholder=" "></textarea>
                        <label for="message"
                            class="absolute text-sm text-gray-400 duration-300 transform -translate-y-3 scale-75 top-4 z-10 origin-[0] left-4 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-indigo-400">
                            Your Message
                        </label>
                        <!-- Icon -->
                        <div class="absolute right-4 top-6 text-slate-500 peer-focus:text-indigo-400 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    @error('message') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="group relative w-full py-4 px-6 rounded-lg overflow-hidden shadow-xl disabled:opacity-70" wire:loading.attr="disabled">
                        <!-- Button Gradient Background with Animation -->
                        <div class="absolute inset-0 w-full h-full transition-all duration-300 ease-out bg-gradient-to-r from-violet-600 via-indigo-600 to-violet-600 group-hover:opacity-90 bg-size-200 bg-pos-0 group-hover:bg-pos-100"></div>

                        <!-- Loading Progress Indicator -->
                        <div wire:loading wire:target="submit" class="absolute bottom-0 left-0 h-1 bg-white/30 w-full">
                            <div class="h-full bg-white animate-progress-bar"></div>
                        </div>

                        <!-- Button Content -->
                        <div class="relative flex items-center justify-center space-x-2">
                            <!-- Loading spinner (shown when loading) -->
                            <svg wire:loading wire:target="submit" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>

                            <!-- Default text (hidden when loading) -->
                            <span wire:loading.remove wire:target="submit" class="text-white font-medium">Send Message</span>

                            <!-- Loading text (shown when loading) -->
                            <span wire:loading wire:target="submit" class="text-white font-medium">Sending...</span>

                            <!-- Arrow icon (hidden when loading) -->
                            <svg wire:loading.remove wire:target="submit" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white transform transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>

                    <!-- Loading status message with progress steps -->
                    <div wire:loading wire:target="submit" class="text-center mt-4 text-sm text-indigo-300">
                        <div class="flex flex-col items-center">
                            <div class="flex items-center space-x-2 mb-1">
                                <div class="w-5 h-5 rounded-full bg-indigo-500/20 flex items-center justify-center">
                                    <div class="w-2 h-2 rounded-full bg-indigo-400 animate-ping"></div>
                                </div>
                                <span>Sending your message...</span>
                            </div>

                            <div class="flex flex-wrap justify-center gap-3 mt-2 max-w-xs mx-auto text-xs text-gray-400">
                                <span class="px-2 py-1 rounded-full bg-slate-800/50 border border-slate-700/50">
                                    Validating
                                </span>
                                <span class="px-2 py-1 rounded-full bg-slate-800/50 border border-slate-700/50">
                                    Processing
                                </span>
                                <span class="px-2 py-1 rounded-full bg-slate-800/50 border border-slate-700/50">
                                    Sending
                                </span>
                                <span class="px-2 py-1 rounded-full bg-slate-800/50 border border-slate-700/50">
                                    Confirming
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute -bottom-5 -right-5 w-32 h-32 bg-violet-500/10 rounded-full blur-2xl"></div>
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-indigo-500/10 rounded-full blur-2xl"></div>
    </div>

    <!-- Form Validation Toast Notifications -->
    <div class="fixed top-4 right-4 z-50 max-w-md w-full">
        @error('name')
        <div class="bg-red-500/90 text-white p-4 rounded-lg shadow-lg mb-2 transform transition-all duration-300 animate-fade-in-down flex items-start">
            <div class="mr-2 flex-shrink-0 pt-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="font-medium">Name Error</p>
                <p class="text-sm opacity-90">{{ $message }}</p>
            </div>
        </div>
        @enderror

        @error('email')
        <div class="bg-red-500/90 text-white p-4 rounded-lg shadow-lg mb-2 transform transition-all duration-300 animate-fade-in-down flex items-start">
            <div class="mr-2 flex-shrink-0 pt-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="font-medium">Email Error</p>
                <p class="text-sm opacity-90">{{ $message }}</p>
            </div>
        </div>
        @enderror

        @error('subject')
        <div class="bg-red-500/90 text-white p-4 rounded-lg shadow-lg mb-2 transform transition-all duration-300 animate-fade-in-down flex items-start">
            <div class="mr-2 flex-shrink-0 pt-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="font-medium">Subject Error</p>
                <p class="text-sm opacity-90">{{ $message }}</p>
            </div>
        </div>
        @enderror

        @error('message')
        <div class="bg-red-500/90 text-white p-4 rounded-lg shadow-lg mb-2 transform transition-all duration-300 animate-fade-in-down flex items-start">
            <div class="mr-2 flex-shrink-0 pt-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="font-medium">Message Error</p>
                <p class="text-sm opacity-90">{{ $message }}</p>
            </div>
        </div>
        @enderror
    </div>

    <!-- Toast Notification Auto-Dismiss Script -->
    <script>
        document.addEventListener('livewire:initialized', () => {
            // Listen for form reset event
            @this.on('formReset', () => {
                // Reset any form fields that might not be automatically reset
                const form = document.querySelector('form[wire\\:submit="submit"]');
                if (form) {
                    form.reset();

                    // Reset any custom input styling or states
                    const inputs = form.querySelectorAll('input, textarea');
                    inputs.forEach(input => {
                        input.classList.remove('border-red-500');
                        // Force floating labels back to their default state
                        input.placeholder = " ";
                    });

                    // Scroll back to top of form
                    const formContainer = document.querySelector('.p-8.rounded-2xl.bg-slate-900\\/70');
                    if (formContainer) {
                        formContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            });

            // Auto-dismiss validation toasts after 5 seconds
            const dismissToasts = () => {
                const toasts = document.querySelectorAll('.animate-fade-in-down');

                toasts.forEach(toast => {
                    setTimeout(() => {
                        toast.style.opacity = '0';
                        toast.style.transform = 'translateY(-20px)';
                        toast.style.transition = 'opacity 0.5s ease, transform 0.5s ease';

                        setTimeout(() => {
                            toast.remove();
                        }, 500);
                    }, 5000);
                });
            };

            // Listen for Livewire updates to catch new validation errors
            Livewire.hook('morph.updated', () => {
                dismissToasts();
            });

            // Initial check for toasts
            dismissToasts();
        });
    </script>

    <!-- Include Confetti.js for success animation -->
    <script>
        // Load confetti.js dynamically
        document.addEventListener('livewire:initialized', () => {
            if (typeof confetti === 'undefined') {
                const script = document.createElement('script');
                script.src = 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js';
                script.async = true;
                document.head.appendChild(script);
            }
        });
    </script>

    <style>
        .bg-size-200 {
            background-size: 200% 200%;
        }

        .bg-pos-0 {
            background-position: 0% 0%;
        }

        .bg-pos-100 {
            background-position: 100% 100%;
        }

        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.5s ease-out forwards;
        }

        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.5s ease-out forwards;
        }

        @keyframes float-in {
            0% {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            70% {
                opacity: 1;
                transform: translateY(-5px) scale(1.02);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .animate-float-in {
            animation: float-in 0.65s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        @keyframes progress-bar {
            0% { width: 0%; }
            10% { width: 10%; }
            30% { width: 40%; }
            50% { width: 60%; }
            70% { width: 75%; }
            90% { width: 90%; }
            100% { width: 100%; }
        }

        .animate-progress-bar {
            animation: progress-bar 3s ease-in-out forwards;
        }
    </style>
</div>
