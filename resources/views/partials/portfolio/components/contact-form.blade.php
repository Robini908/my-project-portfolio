<!-- Contact Form Component -->
<div class="relative max-w-lg mx-auto w-full">
    <div class="p-8 rounded-2xl bg-slate-900/70 backdrop-blur-xl border border-slate-800/50 shadow-2xl transform transition-all duration-500">
        <form id="contactForm" class="space-y-7">
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
                    <div class="relative border-2 border-slate-700 rounded-lg bg-slate-800/50 focus-within:border-indigo-500 transition duration-300 shadow-lg overflow-hidden">
                        <input type="text" id="name" name="name" required
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
                </div>

                <!-- Email Field with Floating Label -->
                <div class="relative">
                    <!-- Boxed Input with Floating Label -->
                    <div class="relative border-2 border-slate-700 rounded-lg bg-slate-800/50 focus-within:border-indigo-500 transition duration-300 shadow-lg overflow-hidden">
                        <input type="email" id="email" name="email" required
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
                </div>
            </div>

            <!-- Subject Field with Floating Label -->
            <div class="relative">
                <!-- Boxed Input with Floating Label -->
                <div class="relative border-2 border-slate-700 rounded-lg bg-slate-800/50 focus-within:border-indigo-500 transition duration-300 shadow-lg overflow-hidden">
                    <input type="text" id="subject" name="subject" required
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
            </div>

            <!-- Message Field with Floating Label -->
            <div class="relative">
                <!-- Boxed Input with Floating Label -->
                <div class="relative border-2 border-slate-700 rounded-lg bg-slate-800/50 focus-within:border-indigo-500 transition duration-300 shadow-lg overflow-hidden">
                    <textarea id="message" name="message" rows="4" required
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
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit" class="group relative w-full py-4 px-6 rounded-lg overflow-hidden shadow-xl">
                    <!-- Button Gradient Background with Animation -->
                    <div class="absolute inset-0 w-full h-full transition-all duration-300 ease-out bg-gradient-to-r from-violet-600 via-indigo-600 to-violet-600 group-hover:opacity-90 bg-size-200 bg-pos-0 group-hover:bg-pos-100"></div>

                    <!-- Button Content -->
                    <div class="relative flex items-center justify-center space-x-2">
                        <span class="text-white font-medium">Send Message</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white transform transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </div>
        </form>
    </div>

    <!-- Decorative Elements -->
    <div class="absolute -bottom-5 -right-5 w-32 h-32 bg-violet-500/10 rounded-full blur-2xl"></div>
    <div class="absolute -top-10 -left-10 w-40 h-40 bg-indigo-500/10 rounded-full blur-2xl"></div>
</div>

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
</style>

<!-- Form Validation and Submission Script -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contactForm');

        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Simple form validation
                let valid = true;
                const inputs = form.querySelectorAll('input, textarea');

                inputs.forEach(input => {
                    if (input.required && !input.value.trim()) {
                        valid = false;
                        input.parentElement.classList.add('border-red-500');
                    } else {
                        input.parentElement.classList.remove('border-red-500');
                    }

                    // Email validation
                    if (input.type === 'email' && input.value.trim()) {
                        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailPattern.test(input.value)) {
                            valid = false;
                            input.parentElement.classList.add('border-red-500');
                        }
                    }
                });

                if (valid) {
                    // Simulate form submission with loading state
                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalHTML = submitBtn.innerHTML;

                    submitBtn.disabled = true;
                    submitBtn.querySelector('.relative').innerHTML = `
                        <div class="flex items-center justify-center">
                            <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Sending...</span>
                        </div>
                    `;

                    // Simulate API call
                    setTimeout(() => {
                        submitBtn.querySelector('.relative').innerHTML = `
                            <div class="flex items-center justify-center text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span>Message Sent!</span>
                            </div>
                        `;

                        form.reset();

                        setTimeout(() => {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalHTML;
                        }, 3000);
                    }, 2000);
                }
            });

            // Real-time validation feedback
            const inputs = form.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.remove('border-red-500');
                });
            });
        }
    });
</script>
@endpush
