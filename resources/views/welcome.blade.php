@extends('layouts.portfolio')

@section('title', 'Welcome')

@section('content')
    <!-- Hero Section -->
    @include('partials.portfolio.sections.hero')

    <!-- About Section -->
    @include('partials.portfolio.sections.about')

    <!-- Skills Section -->
    @include('partials.portfolio.sections.skills')

    <!-- Projects Section -->
    @include('partials.portfolio.sections.projects')

    <!-- Contact Section -->
    <section id="contact" class="contact-section py-20 relative">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gradient inline-block mb-4">Get In Touch</h2>
                <div class="w-20 h-1 mx-auto bg-indigo-500 rounded-full mb-6"></div>
                <p class="text-gray-300 max-w-3xl mx-auto">Let's discuss your next project and bring your ideas to life</p>
            </div>

            <div class="max-w-5xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Contact Form -->
                    <div class="order-2 lg:order-1">
                        <div class="bg-slate-900/90 backdrop-blur-xl rounded-2xl p-8 border border-slate-700/30 shadow-2xl relative overflow-hidden">
                            <!-- Blackboard Texture Overlay -->
                            <div class="absolute inset-0 opacity-5">
                                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34h-2V16h2v18zm4-2V16h2v16h-2zm-23 2V16h-2v18h2zm-4-2V16h-2v16h2zm11-14h-2v18h2V18zm4 2h2v14h-2V20zm-17 0v14h-2V20h2zm10 0h2v14h-2V20z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                            </div>

                            <!-- Chalk Dust Effect -->
                            <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
                                <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-white/10 rounded-full animate-float"></div>
                                <div class="absolute top-1/3 right-1/3 w-1.5 h-1.5 bg-white/10 rounded-full animate-float animation-delay-1000"></div>
                                <div class="absolute bottom-1/4 left-1/3 w-2.5 h-2.5 bg-white/10 rounded-full animate-float animation-delay-2000"></div>
                            </div>

                            <form class="contact-form space-y-6 relative">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="form-field relative">
                                        <input type="text" id="name" name="name" placeholder="Your Name"
                                                class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 font-['Architects_Daughter']" required>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="form-field relative">
                                        <input type="email" id="email" name="email" placeholder="Your Email"
                                            class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 font-['Architects_Daughter']" required>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-field relative">
                                    <input type="text" id="subject" name="subject" placeholder="Subject"
                                        class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 font-['Architects_Daughter']" required>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                        </svg>
                                    </div>
                                </div>

                                <div class="form-field relative">
                                    <textarea id="message" name="message" rows="4" placeholder="Your Message"
                                        class="w-full px-4 py-3 bg-slate-800/50 border border-slate-700/30 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 resize-none font-['Architects_Daughter']" required></textarea>
                                    <div class="absolute top-3 right-3">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                        </svg>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit"
                                            class="px-8 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-medium rounded-lg hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:scale-105 transition-all duration-300 shadow-lg font-['Architects_Daughter']">
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Info & Map -->
                    <div class="order-1 lg:order-2 space-y-8">
                        <!-- Contact Information -->
                        <div class="grid grid-cols-1 gap-6">
                            <div class="p-6 rounded-xl bg-slate-900/90 backdrop-blur-xl border border-slate-700/30 shadow-xl transform transition-all duration-300 hover:scale-105 relative overflow-hidden">
                                <!-- Chalk Dust Effect -->
                                <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
                                    <div class="absolute top-1/4 right-1/4 w-2 h-2 bg-white/10 rounded-full animate-float"></div>
                                </div>
                                <div class="flex items-center space-x-4 relative">
                                    <div class="p-3 rounded-lg bg-indigo-500/10">
                                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-white mb-1 font-['Architects_Daughter']">Email</h3>
                                        <a href="mailto:abrahamopuba@gmail.com" class="text-gray-400 hover:text-indigo-400 transition font-['Architects_Daughter']">abrahamopuba@gmail.com</a>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 rounded-xl bg-slate-900/90 backdrop-blur-xl border border-slate-700/30 shadow-xl transform transition-all duration-300 hover:scale-105 relative overflow-hidden">
                                <!-- Chalk Dust Effect -->
                                <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
                                    <div class="absolute bottom-1/4 left-1/4 w-2 h-2 bg-white/10 rounded-full animate-float animation-delay-1000"></div>
                                </div>
                                <div class="flex items-center space-x-4 relative">
                                    <div class="p-3 rounded-lg bg-indigo-500/10">
                                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-white mb-1 font-['Architects_Daughter']">Location</h3>
                                        <p class="text-gray-400 font-['Architects_Daughter']">Westlands, Nairobi, Kenya</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 rounded-xl bg-slate-900/90 backdrop-blur-xl border border-slate-700/30 shadow-xl transform transition-all duration-300 hover:scale-105 relative overflow-hidden">
                                <!-- Chalk Dust Effect -->
                                <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
                                    <div class="absolute top-1/3 left-1/3 w-2 h-2 bg-white/10 rounded-full animate-float animation-delay-2000"></div>
                                </div>
                                <div class="flex items-center space-x-4 relative">
                                    <div class="p-3 rounded-lg bg-indigo-500/10">
                                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-white mb-1 font-['Architects_Daughter']">Working Hours</h3>
                                        <p class="text-gray-400 font-['Architects_Daughter']">Mon - Fri: 9AM - 6PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Social Links -->
                        <div class="p-6 rounded-xl bg-slate-900/90 backdrop-blur-xl border border-slate-700/30 shadow-xl relative overflow-hidden">
                            <!-- Chalk Dust Effect -->
                            <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
                                <div class="absolute top-1/4 right-1/3 w-2 h-2 bg-white/10 rounded-full animate-float"></div>
                                <div class="absolute bottom-1/4 left-1/4 w-2 h-2 bg-white/10 rounded-full animate-float animation-delay-1000"></div>
                            </div>
                            <h3 class="text-lg font-semibold text-white mb-4 font-['Architects_Daughter']">Connect With Me</h3>
                            <div class="flex space-x-6">
                                <a href="#" class="p-3 rounded-lg bg-slate-800/50 hover:bg-indigo-500/10 transition-all duration-300 transform hover:scale-110">
                                    <svg class="w-6 h-6 text-gray-400 hover:text-indigo-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                    </svg>
                                </a>
                                <a href="#" class="p-3 rounded-lg bg-slate-800/50 hover:bg-indigo-500/10 transition-all duration-300 transform hover:scale-110">
                                    <svg class="w-6 h-6 text-gray-400 hover:text-indigo-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
                                    </svg>
                                </a>
                                <a href="#" class="p-3 rounded-lg bg-slate-800/50 hover:bg-indigo-500/10 transition-all duration-300 transform hover:scale-110">
                                    <svg class="w-6 h-6 text-gray-400 hover:text-indigo-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.784 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-.79-.07-1.41-.476-1.886-.407-.479-1.056-.717-1.944-.717-1.396 0-2.586.842-2.586 2.476v5.731h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd"/>
                                    </svg>
                                </a>
                                <a href="#" class="p-3 rounded-lg bg-slate-800/50 hover:bg-indigo-500/10 transition-all duration-300 transform hover:scale-110">
                                    <svg class="w-6 h-6 text-gray-400 hover:text-indigo-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Google Map -->
                        <div class="rounded-xl overflow-hidden h-64 shadow-xl relative">
                            <!-- Chalk Dust Effect -->
                            <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
                                <div class="absolute top-1/4 left-1/3 w-2 h-2 bg-white/10 rounded-full animate-float"></div>
                                <div class="absolute bottom-1/4 right-1/4 w-2 h-2 bg-white/10 rounded-full animate-float animation-delay-1000"></div>
                            </div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.794647475456!2d36.8197!3d-1.2921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f0d02e174f781%3A0x8443fd829a43a087!2sWestlands%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1647881234567!5m2!1sen!2ske"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                class="rounded-xl">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-indigo-500/10 rounded-full filter blur-3xl"></div>
        <div class="absolute top-1/2 right-0 w-40 h-40 bg-blue-500/10 rounded-full filter blur-3xl"></div>
    </section>
@endsection
