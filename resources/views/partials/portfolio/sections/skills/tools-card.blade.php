<!-- Tools & Others Skills Card -->
<div class="skill-card group" 
     data-category="tools"
     x-show="activeCategory === null || activeCategory === 'tools'"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-95"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-95">
    
    <div class="relative overflow-hidden rounded-xl h-full">
        <!-- Card Background with Code Snippet -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-800/90 via-slate-800/80 to-blue-900/70 backdrop-blur-sm z-10"></div>
            <pre class="text-[0.5rem] text-blue-300/20 font-mono leading-tight p-4 overflow-hidden absolute inset-0">
# Docker Compose Configuration
version: '3.8'

services:
  # Web Application
  app:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: portfolio-app
    restart: unless-stopped
    volumes:
      - .:/var/www/html
      - ./docker/php/local.ini:/usr/local/etc/php/conf.d/local.ini
    networks:
      - portfolio-network
    depends_on:
      - db
      - redis

  # Nginx Service
  webserver:
    image: nginx:alpine
    container_name: portfolio-webserver
    restart: unless-stopped
    ports:
      - "80:80"
      - "443:443"
    volumes:
      - .:/var/www/html
      - ./docker/nginx/conf.d/:/etc/nginx/conf.d/
      - ./docker/nginx/ssl/:/etc/nginx/ssl/
    networks:
      - portfolio-network
    depends_on:
      - app

  # Database Service
  db:
    image: mysql:8.0
    container_name: portfolio-db
    restart: unless-stopped
    environment:
      MYSQL_DATABASE: ${DB_DATABASE}
      MYSQL_ROOT_PASSWORD: ${DB_PASSWORD}
      MYSQL_PASSWORD: ${DB_PASSWORD}
      MYSQL_USER: ${DB_USERNAME}
    volumes:
      - dbdata:/var/lib/mysql
    networks:
      - portfolio-network

  # Redis Service
  redis:
    image: redis:alpine
    container_name: portfolio-redis
    restart: unless-stopped
    networks:
      - portfolio-network

networks:
  portfolio-network:
    driver: bridge

volumes:
  dbdata:
    driver: local
            </pre>
        </div>

        <!-- Card Content -->
        <div class="relative p-6 z-20 h-full flex flex-col">
            <!-- Icon -->
            <div class="mb-6">
                <div class="w-16 h-16 bg-blue-500/20 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300 border border-blue-500/30">
                    <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path>
                    </svg>
                </div>
            </div>
            
            <!-- Title with Typing Effect -->
            <h3 class="text-xl font-semibold mb-3 group-hover:text-gradient transition-colors duration-300 chalk-text-lg">
                Tools & DevOps
            </h3>
            
            <!-- Description -->
            <p class="text-gray-400 mb-6 group-hover:text-gray-300 transition-colors duration-300 chalk-text-sm">
                Development tools, methodologies, and additional skills to enhance development workflow.
            </p>
            
            <!-- Skills Grid with Logos -->
            <div class="grid grid-cols-3 gap-4 mt-auto">
                <template x-for="(skill, index) in ['Git', 'Docker', 'AWS', 'Jenkins', 'Kubernetes', 'Linux']">
                    <div class="relative group/skill" 
                         @mouseenter="setHoveredSkill(skill)" 
                         @mouseleave="clearHoveredSkill()">
                        <div class="w-12 h-12 bg-slate-800/80 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover/skill:scale-110 border border-slate-700/50 group-hover/skill:border-blue-500/50">
                            <img :src="`https://cdn.jsdelivr.net/gh/devicons/devicon/icons/${skill.toLowerCase().replace('.', '').replace(' ', '')}/${skill.toLowerCase().replace('.', '').replace(' ', '')}-original.svg`" 
                                 :alt="skill" 
                                 class="w-6 h-6 transition-all duration-300 group-hover/skill:w-7 group-hover/skill:h-7">
                        </div>
                        <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 px-2 py-1 bg-slate-800 text-white text-xs rounded opacity-0 group-hover/skill:opacity-100 transition-opacity duration-300 whitespace-nowrap border border-blue-500/30">
                            <span x-text="skill"></span>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Interactive Hover Effects -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/0 via-blue-500/0 to-blue-500/0 group-hover:from-blue-500/10 group-hover:via-blue-500/5 group-hover:to-blue-500/10 transition-all duration-500 z-10"></div>
        
        <!-- Glowing Border Effect -->
        <div class="absolute inset-0 rounded-xl border border-blue-500/0 group-hover:border-blue-500/50 transition-all duration-500 z-10 glow-border-blue"></div>
    </div>
</div>
