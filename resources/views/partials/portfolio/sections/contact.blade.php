<!-- Contact Section -->
<section id="contact" class="relative min-h-screen py-20 bg-[#0B1121] overflow-hidden">
    <!-- Content Container -->
    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-violet-500 to-purple-600 bg-clip-text text-transparent mb-4">Get In Touch</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Let's discuss your next project and bring your ideas to life</p>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
            <!-- Contact Form -->
            <div class="order-2 lg:order-1">
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name Input -->
                        <div class="form-field">
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 bg-[#0B1121] border border-violet-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-violet-500 transition-all duration-300 font-['Space_Grotesk']"
                                placeholder="Your Name">
                        </div>

                        <!-- Email Input -->
                        <div class="form-field">
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 bg-[#0B1121] border border-violet-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-violet-500 transition-all duration-300 font-['Space_Grotesk']"
                                placeholder="Your Email">
                        </div>
                    </div>

                    <!-- Subject Input -->
                    <div class="form-field">
                        <input type="text" id="subject" name="subject" required
                            class="w-full px-4 py-3 bg-[#0B1121] border border-violet-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-violet-500 transition-all duration-300 font-['Space_Grotesk']"
                            placeholder="Subject">
                    </div>

                    <!-- Message Input -->
                    <div class="form-field">
                        <textarea id="message" name="message" rows="4" required
                            class="w-full px-4 py-3 bg-[#0B1121] border border-violet-500/30 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-violet-500 transition-all duration-300 resize-none font-['Space_Grotesk']"
                            placeholder="Your Message"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit"
                            class="px-8 py-3 bg-gradient-to-r from-violet-600 to-purple-600 text-white font-medium rounded-lg hover:from-violet-700 hover:to-purple-700 focus:outline-none transform hover:scale-105 transition-all duration-300">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="order-1 lg:order-2 space-y-8">
                <!-- Info Cards -->
                <div class="grid grid-cols-1 gap-6">
                    <!-- Email Card -->
                    <div class="p-6 rounded-xl bg-[#0B1121] border border-violet-500/30">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 rounded-lg bg-violet-500/10">
                                <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-1">Email</h3>
                                <a href="mailto:abrahamopuba@gmail.com" class="text-gray-400 hover:text-violet-400 transition">abrahamopuba@gmail.com</a>
                            </div>
                        </div>
                    </div>

                    <!-- Location Card -->
                    <div class="p-6 rounded-xl bg-[#0B1121] border border-violet-500/30">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 rounded-lg bg-violet-500/10">
                                <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-1">Location</h3>
                                <p class="text-gray-400">Westlands, Nairobi, Kenya</p>
                            </div>
                        </div>
                    </div>

                    <!-- Working Hours Card -->
                    <div class="p-6 rounded-xl bg-[#0B1121] border border-violet-500/30">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 rounded-lg bg-violet-500/10">
                                <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-1">Working Hours</h3>
                                <p class="text-gray-400">Mon - Fri: 9AM - 6PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
