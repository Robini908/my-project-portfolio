<div>
    <!-- Privacy Policy Modal -->
    <div
        x-data="{}"
        x-show="$wire.showPrivacyPolicy"
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
        <div
            class="fixed inset-0 bg-black/60 backdrop-blur-sm"
            wire:click="closeLegalModal"
        ></div>

        <!-- Modal Container -->
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <!-- Privacy Policy Modal Content -->
            <div
                class="relative max-w-3xl max-h-[80vh] w-full overflow-y-auto bg-slate-900 border border-slate-700 rounded-xl shadow-2xl p-6"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                @click.away="$wire.closeLegalModal()"
            >
                <div class="absolute top-4 right-4">
                    <button wire:click="closeLegalModal" class="text-gray-400 hover:text-white transition p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mb-4">
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-violet-400 to-indigo-500 bg-clip-text text-transparent">Privacy Policy</h2>
                    <div class="w-16 h-1 mt-1 rounded-full bg-gradient-to-r from-violet-500 to-indigo-600"></div>
                </div>
                <div class="text-gray-300 space-y-4">
                    <p>Last updated: {{ date('F d, Y') }}</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Introduction</h3>
                    <p>This Privacy Policy describes how your personal information is collected, used, and shared when you visit my portfolio website.</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Personal Information Collection</h3>
                    <p>When you visit the Site, I automatically collect certain information about your device, including information about your web browser, IP address, time zone, and some of the cookies that are installed on your device.</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Contact Form Information</h3>
                    <p>When you submit the contact form, I collect the information you provide, including your name, email address, and message content. This information is used solely to respond to your inquiries.</p>

                    <h3 class="text-xl font-semibold text-white mt-6">How I Use Your Personal Information</h3>
                    <p>I use the information collected through the contact form to communicate with you and respond to your inquiries. I may also use this information to improve my website and services.</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Data Retention</h3>
                    <p>Contact form submissions are stored for a period of one year after which they are automatically deleted unless there is a legitimate need to retain them longer.</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Changes</h3>
                    <p>I may update this privacy policy from time to time to reflect changes to my practices or for other operational, legal, or regulatory reasons.</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Contact Me</h3>
                    <p>For more information about my privacy practices, if you have questions, or if you would like to make a complaint, please contact me by email at abrahamopuba@gmail.com.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms & Conditions Modal -->
    <div
        x-data="{}"
        x-show="$wire.showTermsConditions"
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
        <div
            class="fixed inset-0 bg-black/60 backdrop-blur-sm"
            wire:click="closeLegalModal"
        ></div>

        <!-- Modal Container -->
        <div class="relative min-h-screen flex items-center justify-center p-4">
            <!-- Terms & Conditions Modal Content -->
            <div
                class="relative max-w-3xl max-h-[80vh] w-full overflow-y-auto bg-slate-900 border border-slate-700 rounded-xl shadow-2xl p-6"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                @click.away="$wire.closeLegalModal()"
            >
                <div class="absolute top-4 right-4">
                    <button wire:click="closeLegalModal" class="text-gray-400 hover:text-white transition p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mb-4">
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-violet-400 to-indigo-500 bg-clip-text text-transparent">Terms & Conditions</h2>
                    <div class="w-16 h-1 mt-1 rounded-full bg-gradient-to-r from-violet-500 to-indigo-600"></div>
                </div>
                <div class="text-gray-300 space-y-4">
                    <p>Last updated: {{ date('F d, Y') }}</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Introduction</h3>
                    <p>These Terms and Conditions govern your use of my portfolio website. By accessing this website, you agree to these Terms and Conditions in full.</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Intellectual Property</h3>
                    <p>The content of this website, including but not limited to text, graphics, logos, images, and software, is the property of Abraham Opuba and is protected by copyright and other intellectual property laws.</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Use License</h3>
                    <p>Permission is granted to temporarily view the materials on my website for personal, non-commercial use only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                    <ul class="list-disc pl-6">
                        <li>Modify or copy the materials</li>
                        <li>Use the materials for any commercial purpose</li>
                        <li>Remove any copyright or other proprietary notations from the materials</li>
                        <li>Transfer the materials to another person or "mirror" the materials on any other server</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-white mt-6">Contact Form Usage</h3>
                    <p>By using the contact form on this website, you agree not to use it to send spam, malicious content, or any content that violates any laws or regulations.</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Disclaimer</h3>
                    <p>The materials on this website are provided "as is". I make no warranties, expressed or implied, and hereby disclaim and negate all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property.</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Limitations</h3>
                    <p>In no event shall I be liable for any damages arising out of the use or inability to use the materials on my website.</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Revisions</h3>
                    <p>I may revise these Terms and Conditions at any time without notice. By using this website, you agree to be bound by the current version of these Terms and Conditions.</p>

                    <h3 class="text-xl font-semibold text-white mt-6">Contact</h3>
                    <p>If you have any questions about these Terms and Conditions, please contact me at abrahamopuba@gmail.com.</p>
                </div>
            </div>
        </div>
    </div>
</div>
