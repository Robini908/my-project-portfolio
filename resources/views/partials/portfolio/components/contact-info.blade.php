<!-- Contact Information Component -->
<div class="space-y-6">
    <!-- Component Title -->
    <div class="mb-8 text-center md:text-left">
        <h3 class="text-2xl font-bold bg-gradient-to-r from-violet-400 to-indigo-500 bg-clip-text text-transparent mb-1">Contact Info</h3>
        <div class="w-16 h-1 mx-auto md:mx-0 rounded-full bg-gradient-to-r from-violet-500 to-indigo-600"></div>
    </div>

    <!-- Info Cards -->
    <div class="space-y-5">
        <!-- Email Card -->
        <div class="group relative transform transition duration-300 hover:translate-y-[-5px]">
            <div class="absolute -inset-1 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl blur opacity-25 group-hover:opacity-70 transition duration-1000"></div>
            <div class="relative p-6 bg-slate-900 rounded-xl flex items-start space-x-4 border border-slate-800/50">
                <!-- Icon Container -->
                <div class="flex-shrink-0">
                    <div class="p-3 bg-gradient-to-r from-violet-600/20 to-indigo-600/20 rounded-lg text-indigo-400 group-hover:text-white transition duration-300">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1">
                    <h4 class="text-lg font-semibold text-white mb-1 group-hover:text-indigo-300 transition duration-300">Email</h4>
                    <a href="mailto:abrahamopuba@gmail.com"
                        class="text-gray-400 group-hover:text-indigo-200 transition duration-300 flex items-center space-x-1">
                        <span>abrahamopuba@gmail.com</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-0 group-hover:opacity-100 transform translate-x-0 group-hover:translate-x-1 transition duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Location Card -->
        <div class="group relative transform transition duration-300 hover:translate-y-[-5px]">
            <div class="absolute -inset-1 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl blur opacity-25 group-hover:opacity-70 transition duration-1000"></div>
            <div class="relative p-6 bg-slate-900 rounded-xl flex items-start space-x-4 border border-slate-800/50">
                <!-- Icon Container -->
                <div class="flex-shrink-0">
                    <div class="p-3 bg-gradient-to-r from-violet-600/20 to-indigo-600/20 rounded-lg text-indigo-400 group-hover:text-white transition duration-300">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1">
                    <h4 class="text-lg font-semibold text-white mb-1 group-hover:text-indigo-300 transition duration-300">Location</h4>
                    <p class="text-gray-400 group-hover:text-indigo-200 transition duration-300">
                        Westlands, Nairobi, Kenya
                    </p>
                    <button id="toggle-map" class="mt-2 flex items-center space-x-1 text-indigo-400 hover:text-indigo-300 transition-all duration-300 text-sm font-medium">
                        <span>View on Map</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Working Hours Card -->
        <div class="group relative transform transition duration-300 hover:translate-y-[-5px]">
            <div class="absolute -inset-1 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-xl blur opacity-25 group-hover:opacity-70 transition duration-1000"></div>
            <div class="relative p-6 bg-slate-900 rounded-xl flex items-start space-x-4 border border-slate-800/50">
                <!-- Icon Container -->
                <div class="flex-shrink-0">
                    <div class="p-3 bg-gradient-to-r from-violet-600/20 to-indigo-600/20 rounded-lg text-indigo-400 group-hover:text-white transition duration-300">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Content -->
                <div class="flex-1">
                    <h4 class="text-lg font-semibold text-white mb-1 group-hover:text-indigo-300 transition duration-300">Working Hours</h4>
                    <p class="text-gray-400 group-hover:text-indigo-200 transition duration-300">
                        Mon - Fri: 9AM - 6PM
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Links -->
    <div class="mt-10 pt-6 border-t border-slate-800/50">
        <h4 class="text-lg font-semibold text-white mb-4">Follow Me</h4>
        <div class="flex space-x-4">
            <!-- GitHub -->
            <a href="https://github.com/abrahamopuba" class="group relative" target="_blank" rel="noopener" title="GitHub">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-800 text-slate-400 hover:bg-indigo-600 hover:text-white transform transition-all duration-300 hover:scale-110">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                    </svg>
                </div>
                <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 -translate-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-white text-xs bg-indigo-600 px-2 py-1 rounded whitespace-nowrap">GitHub</span>
            </a>

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/in/abraham-opuba" class="group relative" target="_blank" rel="noopener" title="LinkedIn">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-800 text-slate-400 hover:bg-indigo-600 hover:text-white transform transition-all duration-300 hover:scale-110">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                    </svg>
                </div>
                <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 -translate-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-white text-xs bg-indigo-600 px-2 py-1 rounded whitespace-nowrap">LinkedIn</span>
            </a>

            <!-- Twitter -->
            <a href="https://twitter.com/abrahamopuba" class="group relative" target="_blank" rel="noopener" title="Twitter">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-800 text-slate-400 hover:bg-indigo-600 hover:text-white transform transition-all duration-300 hover:scale-110">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                    </svg>
                </div>
                <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 -translate-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-white text-xs bg-indigo-600 px-2 py-1 rounded whitespace-nowrap">Twitter</span>
            </a>

            <!-- Instagram (replacing Dribbble) -->
            <a href="https://www.instagram.com/abrahamopuba" class="group relative" target="_blank" rel="noopener" title="Instagram">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-800 text-slate-400 hover:bg-indigo-600 hover:text-white transform transition-all duration-300 hover:scale-110">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                    </svg>
                </div>
                <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 -translate-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-white text-xs bg-indigo-600 px-2 py-1 rounded whitespace-nowrap">Instagram</span>
            </a>
        </div>
    </div>
</div>
