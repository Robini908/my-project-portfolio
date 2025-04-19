<div>
    <!-- Streamlined Resume Modal -->
    <div
        x-data="{}"
        x-show="$wire.showResumeModal"
        x-cloak
        class="fixed inset-0 z-50 overflow-y-auto"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/90 backdrop-blur-sm" wire:click="closeResume"></div>

        <!-- Modal Container -->
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <!-- Resume Modal Content -->
            <div
                class="relative max-w-4xl w-full bg-white dark:bg-slate-800 rounded-xl shadow-2xl overflow-hidden"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                @click.away="$wire.closeResume()"
            >
                <div class="absolute top-4 right-4 z-10">
                    <button
                        wire:click="closeResume"
                        class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-white transition p-2 bg-white/10 backdrop-blur-sm rounded-full"
                        aria-label="Close"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Tabs Navigation -->
                <div class="border-b border-gray-200 dark:border-slate-700">
                    <nav class="flex" aria-label="Tabs">
                        <button
                            wire:click="$set('previewMode', true)"
                            class="py-4 px-6 font-medium text-sm transition-colors duration-200 relative"
                            :class="$wire.previewMode ? 'text-indigo-600 dark:text-indigo-400' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300'"
                            aria-current="$wire.previewMode ? 'page' : undefined"
                        >
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            Preview
                            </span>
                            <span
                                x-show="$wire.previewMode"
                                class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600 dark:bg-indigo-400"
                            ></span>
                        </button>
                        <button
                            wire:click="$set('previewMode', false)"
                            class="py-4 px-6 font-medium text-sm transition-colors duration-200 relative"
                            :class="!$wire.previewMode ? 'text-indigo-600 dark:text-indigo-400' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300'"
                            aria-current="!$wire.previewMode ? 'page' : undefined"
                        >
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Download
                            </span>
                            <span
                                x-show="!$wire.previewMode"
                                class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600 dark:bg-indigo-400"
                            ></span>
                        </button>
                    </nav>
                </div>

                <!-- Content -->
                <div class="h-[70vh] flex flex-col">
                    <!-- Preview Mode -->
                    <div x-show="$wire.previewMode" class="flex-1 overflow-hidden">
                        <iframe
                            src="/documents/abraham-opuba-resume.pdf"
                            class="w-full h-full"
                            frameborder="0"
                            title="Resume Preview"
                        ></iframe>
                    </div>

                    <!-- Download Options Mode -->
                    <div x-show="!$wire.previewMode" class="flex-1 p-6 md:p-8 overflow-y-auto">
                        <div class="max-w-xl mx-auto">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">Download Resume</h2>

                            <p class="text-gray-600 dark:text-gray-300 mb-8">
                                Choose the format that works best for your needs. Each format is optimized for different purposes.
                            </p>

                            <div class="space-y-4">
                            <!-- PDF Option -->
                                <div class="flex items-center p-4 border border-gray-200 dark:border-slate-700 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                                    <div class="flex-shrink-0 mr-4">
                                        <div class="w-10 h-10 rounded-full bg-red-100 dark:bg-red-900/20 flex items-center justify-center text-red-600 dark:text-red-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-base font-medium text-gray-900 dark:text-white">PDF Format</h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Best for submitting applications and printing</p>
                                    </div>
                                    <button
                                        wire:click="downloadResume('pdf')"
                                        class="ml-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-slate-800 transition-colors duration-200"
                                        wire:loading.class="opacity-75 cursor-wait"
                                        wire:loading.attr="disabled"
                                        wire:target="downloadResume('pdf')"
                                    >
                                        <span wire:loading.remove wire:target="downloadResume('pdf')">Download</span>
                                        <span wire:loading wire:target="downloadResume('pdf')">
                                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                            Processing
                                        </span>
                                    </button>
                            </div>

                                <!-- DOCX Option -->
                                <div class="flex items-center p-4 border border-gray-200 dark:border-slate-700 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                                    <div class="flex-shrink-0 mr-4">
                                        <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center text-blue-600 dark:text-blue-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-base font-medium text-gray-900 dark:text-white">Word Format</h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Editable format for customizing to specific jobs</p>
                                    </div>
                                    <button
                                        wire:click="downloadResume('docx')"
                                        class="ml-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-slate-800 transition-colors duration-200"
                                        wire:loading.class="opacity-75 cursor-wait"
                                        wire:loading.attr="disabled"
                                        wire:target="downloadResume('docx')"
                                    >
                                        <span wire:loading.remove wire:target="downloadResume('docx')">Download</span>
                                        <span wire:loading wire:target="downloadResume('docx')">
                                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                            Processing
                                        </span>
                                    </button>
                            </div>

                                <!-- TXT Option -->
                                <div class="flex items-center p-4 border border-gray-200 dark:border-slate-700 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                                    <div class="flex-shrink-0 mr-4">
                                        <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/20 flex items-center justify-center text-green-600 dark:text-green-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                        </svg>
                                    </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-base font-medium text-gray-900 dark:text-white">Text Format</h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Plain text for ATS compatibility</p>
                                    </div>
                                    <button
                                        wire:click="downloadResume('txt')"
                                        class="ml-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-slate-800 transition-colors duration-200"
                                        wire:loading.class="opacity-75 cursor-wait"
                                        wire:loading.attr="disabled"
                                        wire:target="downloadResume('txt')"
                                    >
                                        <span wire:loading.remove wire:target="downloadResume('txt')">Download</span>
                                        <span wire:loading wire:target="downloadResume('txt')">
                                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                            Processing
                                        </span>
                                    </button>
                            </div>

                                <!-- vCard Option -->
                                <div class="flex items-center p-4 border border-gray-200 dark:border-slate-700 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors duration-200">
                                    <div class="flex-shrink-0 mr-4">
                                        <div class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900/20 flex items-center justify-center text-purple-600 dark:text-purple-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-base font-medium text-gray-900 dark:text-white">Contact Card</h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Digital vCard for your phone contacts</p>
                                    </div>
                                    <button
                                        wire:click="downloadResume('vcf')"
                                        class="ml-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-slate-800 transition-colors duration-200"
                                        wire:loading.class="opacity-75 cursor-wait"
                                        wire:loading.attr="disabled"
                                        wire:target="downloadResume('vcf')"
                                    >
                                        <span wire:loading.remove wire:target="downloadResume('vcf')">Download</span>
                                        <span wire:loading wire:target="downloadResume('vcf')">
                                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                            Processing
                                        </span>
                                    </button>
                            </div>
                        </div>

                            <!-- Helpful Information -->
                            <div class="mt-8 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg p-4 text-sm">
                                <h4 class="font-medium text-indigo-800 dark:text-indigo-300 flex items-center gap-2 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Resume Tips
                                </h4>
                                <ul class="text-indigo-700 dark:text-indigo-200 space-y-1 ml-5 list-disc">
                                    <li>Use PDF for most job applications</li>
                                    <li>Use DOCX to customize for specific roles</li>
                                    <li>TXT format works best with application tracking systems</li>
                                    <li>vCard makes it easy to save contact information</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
    </style>

    <!-- Download handling script -->
    <script>
        document.addEventListener('livewire:init', () => {
            // Listen for resumeDownloading event
            Livewire.on('resumeDownloading', ({ format, url }) => {
                // Create a hidden iframe for the download
                const iframe = document.createElement('iframe');
                iframe.style.display = 'none';
                iframe.src = url;
                document.body.appendChild(iframe);

                // Reset the downloading state after a short delay
                setTimeout(() => {
                    window.Livewire.dispatch('resetDownloadState');

                    // Remove the iframe after download starts
                    setTimeout(() => {
                        document.body.removeChild(iframe);
                    }, 5000);
                }, 1000);
            });
        });
    </script>
</div>
