<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Abraham Opuba - Senior Full Stack Developer with 5+ years experience in PHP, Laravel, JavaScript, Vue.js, and React. Expert in building scalable web applications.">
    <meta name="keywords" content="Full Stack Developer, PHP, Laravel, JavaScript, Vue.js, React, Web Development, Software Engineer">
    <meta name="author" content="Abraham Opuba">
    <title>Abraham Opuba - Senior Full Stack Developer Resume</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.7;
            color: #1e293b;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 40px 30px;
            max-width: 1100px;
            margin: 0 auto;
            min-height: 100vh;
        }

        @media print {
            body {
                background: white;
                padding: 20px;
                font-size: 12px;
                line-height: 1.4;
            }
        }

        .resume-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: -40px -30px 40px -30px;
            padding: 50px 40px 40px 40px;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .resume-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
            z-index: 0;
        }

        .resume-header > * {
            position: relative;
            z-index: 1;
        }

        .name {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            letter-spacing: -0.5px;
        }

        .title {
            font-size: 22px;
            font-weight: 500;
            color: #e2e8f0;
            margin-bottom: 25px;
            letter-spacing: 0.5px;
        }

        @media print {
            .resume-header {
                background: #4f46e5;
                margin: -20px -20px 30px -20px;
                padding: 30px 25px;
            }

            .name {
                font-size: 32px;
            }

            .title {
                font-size: 18px;
            }
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            color: #f1f5f9;
            background: rgba(255, 255, 255, 0.1);
            padding: 8px 15px;
            border-radius: 25px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .contact-item span:first-child {
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        @media print {
            .contact-info {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .contact-item {
                background: rgba(255, 255, 255, 0.2);
                padding: 5px 10px;
                font-size: 12px;
            }
        }

        .section {
            background: white;
            margin-bottom: 30px;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(226, 232, 240, 0.5);
            transition: all 0.3s ease;
        }

        .section:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .section-header {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .section-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        .summary {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-left: 5px solid #667eea;
        }

        .summary p {
            font-size: 16px;
            line-height: 1.8;
            color: #475569;
            margin: 0;
        }

        @media print {
            .section {
                background: white;
                padding: 20px;
                margin-bottom: 20px;
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }

            .section-header {
                font-size: 20px;
                margin-bottom: 15px;
            }

            .summary {
                background: #f8fafc;
            }
        }

        .experience-item, .education-item, .project-item {
            margin-bottom: 25px;
            padding: 20px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 15px;
            border-left: 4px solid #667eea;
            transition: all 0.3s ease;
            position: relative;
        }

        .experience-item:hover, .education-item:hover, .project-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.1);
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .item-title {
            font-size: 20px;
            font-weight: 700;
            color: #1e293b;
            flex: 1;
            min-width: 200px;
        }

        .item-subtitle {
            font-size: 16px;
            font-weight: 500;
            color: #475569;
            margin-bottom: 15px;
        }

        .item-date {
            font-size: 14px;
            color: #667eea;
            font-weight: 600;
            background: white;
            padding: 4px 12px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .item-description {
            color: #475569;
            font-size: 15px;
            line-height: 1.6;
        }

        @media print {
            .experience-item, .education-item, .project-item {
                background: #f8fafc;
                padding: 15px;
                margin-bottom: 15px;
            }

            .item-title {
                font-size: 16px;
            }

            .item-date {
                background: transparent;
                border: none;
                padding: 0;
            }
        }

        .skill-category {
            margin-bottom: 20px;
        }

        .skill-category-title {
            font-size: 16px;
            font-weight: 600;
            color: #4f46e5;
            margin-bottom: 8px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 4px;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            list-style-type: none;
            margin-bottom: 0;
        }

        .skill-item {
            background-color: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 14px;
            color: #475569;
            transition: all 0.2s ease;
        }

        .skill-item:hover {
            background-color: #e2e8f0;
            transform: translateY(-1px);
        }

        .skills-progress {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .skill-progress-item {
            background: white;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .skill-progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .skill-name {
            font-weight: 600;
            color: #1e293b;
            font-size: 14px;
        }

        .skill-level {
            font-size: 12px;
            color: #667eea;
            font-weight: 500;
        }

        .skill-progress-bar {
            width: 100%;
            height: 6px;
            background-color: #f1f5f9;
            border-radius: 3px;
            overflow: hidden;
        }

        .skill-progress-fill {
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 3px;
            transition: width 1s ease-in-out;
            position: relative;
        }

        .skill-progress-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        @media print {
            .skills-progress {
                gap: 10px;
            }

            .skill-progress-item {
                padding: 10px;
                margin-bottom: 8px;
            }

            .skill-progress-fill::after {
                display: none;
            }
        }

        .achievements {
            list-style-type: none;
        }

        .achievement-item {
            margin-bottom: 10px;
            position: relative;
            padding-left: 20px;
        }

        .achievement-item::before {
            content: "•";
            position: absolute;
            left: 0;
            color: #4f46e5;
            font-weight: bold;
        }

        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .achievement-highlight {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            align-items: flex-start;
            gap: 15px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .achievement-highlight::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .achievement-highlight:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
        }

        .achievement-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .achievement-content {
            flex: 1;
        }

        .achievement-metric {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 4px;
            font-family: 'Playfair Display', serif;
        }

        .achievement-description {
            font-size: 16px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 4px;
        }

        .achievement-detail {
            font-size: 14px;
            color: #64748b;
            line-height: 1.4;
        }

        @media print {
            .achievements-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .achievement-highlight {
                padding: 15px;
                break-inside: avoid;
            }

            .achievement-metric {
                font-size: 20px;
            }
        }

        .row {
            display: flex;
            gap: 20px;
        }

        .col {
            flex: 1;
        }

        @media print {
            body {
                padding: 0;
                font-size: 12px;
            }

            .name {
                font-size: 28px;
            }

            .title {
                font-size: 16px;
            }

            .section-header {
                font-size: 18px;
            }

            .item-title {
                font-size: 16px;
            }

            .item-subtitle {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header class="resume-header" role="banner">
        <h1 class="name">Abraham Opuba</h1>
        <p class="title">Senior Full Stack Web Developer</p>
        <address class="contact-info" aria-label="Contact Information">
            <div class="contact-item">
                <span aria-hidden="true">✉</span>
                <a href="mailto:abrahamopuba@gmail.com" aria-label="Email address">abrahamopuba@gmail.com</a>
            </div>
            <div class="contact-item">
                <span aria-hidden="true">☎</span>
                <a href="tel:+254123456789" aria-label="Phone number">+254 123 456 789</a>
            </div>
            <div class="contact-item">
                <span aria-hidden="true">🌐</span>
                <a href="https://www.abrahamopuba.com" target="_blank" rel="noopener noreferrer" aria-label="Personal website">www.abrahamopuba.com</a>
            </div>
            <div class="contact-item">
                <span aria-hidden="true">💼</span>
                <a href="https://linkedin.com/in/abraham-opuba" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn profile">linkedin.com/in/abraham-opuba</a>
            </div>
            <div class="contact-item">
                <span aria-hidden="true">⚡</span>
                <a href="https://github.com/Robini908" target="_blank" rel="noopener noreferrer" aria-label="GitHub profile">github.com/Robini908</a>
            </div>
            <div class="contact-item">
                <span aria-hidden="true">📍</span>
                <span>Westlands, Nairobi, Kenya</span>
            </div>
        </address>
    </header>

    <main role="main">
        <section class="section summary" aria-labelledby="summary-heading">
            <h2 id="summary-heading" class="section-header">Professional Summary</h2>
            <p>Results-driven Full Stack Developer with 5+ years of experience architecting and developing scalable web applications using modern technologies. Proven expertise in PHP/Laravel, JavaScript frameworks (Vue.js, React), and cloud deployment strategies. Demonstrated ability to lead technical projects, optimize application performance by up to 40%, and deliver high-quality solutions that drive business growth. Strong advocate for clean code principles, test-driven development, and agile methodologies.</p>
        </section>

    <div class="section">
        <h2 class="section-header">Key Achievements</h2>
        <div class="achievements-grid">
            <div class="achievement-highlight">
                <div class="achievement-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div class="achievement-content">
                    <div class="achievement-metric">45%</div>
                    <div class="achievement-description">Performance Improvement</div>
                    <div class="achievement-detail">Database optimization and caching implementation</div>
                </div>
            </div>

            <div class="achievement-highlight">
                <div class="achievement-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <div class="achievement-content">
                    <div class="achievement-metric">$2.5M</div>
                    <div class="achievement-description">Annual Recurring Revenue</div>
                    <div class="achievement-detail">SaaS platform with 10,000+ active users</div>
                </div>
            </div>

            <div class="achievement-highlight">
                <div class="achievement-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="achievement-content">
                    <div class="achievement-metric">94%</div>
                    <div class="achievement-description">Deployment Time Reduction</div>
                    <div class="achievement-detail">From 4 hours to 15 minutes using CI/CD</div>
                </div>
            </div>

            <div class="achievement-highlight">
                <div class="achievement-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="achievement-content">
                    <div class="achievement-metric">6+</div>
                    <div class="achievement-description">Developers Mentored</div>
                    <div class="achievement-detail">50% improvement in team productivity</div>
                </div>
            </div>

            <div class="achievement-highlight">
                <div class="achievement-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="achievement-content">
                    <div class="achievement-metric">99.9%</div>
                    <div class="achievement-description">System Uptime</div>
                    <div class="achievement-detail">Across all managed applications</div>
                </div>
            </div>

            <div class="achievement-highlight">
                <div class="achievement-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <div class="achievement-content">
                    <div class="achievement-metric">$3K</div>
                    <div class="achievement-description">Monthly Cost Savings</div>
                    <div class="achievement-detail">Through performance optimizations</div>
                </div>
            </div>
        </div>
    </div>

        <section class="section" aria-labelledby="experience-heading">
            <h2 id="experience-heading" class="section-header">Professional Experience</h2>

        <div class="experience-item">
            <div class="item-header">
                <div class="item-title">Senior Full Stack Developer</div>
                <div class="item-date">Jan 2023 - Present</div>
            </div>
            <div class="item-subtitle">TechSolutions Inc, Nairobi, Kenya</div>
            <ul class="achievements">
                <li class="achievement-item">Spearheaded development of a multi-tenant SaaS platform serving 10,000+ active users across 15 countries, contributing to 40% YoY revenue growth ($2.5M ARR)</li>
                <li class="achievement-item">Architected microservices infrastructure using Laravel, Docker, and AWS, achieving 99.9% uptime and reducing deployment cycles from 4 hours to 15 minutes</li>
                <li class="achievement-item">Led cross-functional team of 6 developers and 2 designers, implementing Agile methodologies and CI/CD pipelines that reduced bug reports by 35% and accelerated feature delivery by 50%</li>
                <li class="achievement-item">Optimized database performance through query optimization and Redis caching implementation, improving page load times by 45% and reducing server costs by $3,000/month</li>
                <li class="achievement-item">Established comprehensive testing framework (PHPUnit, Jest) achieving 85% code coverage and reducing production incidents by 60%</li>
            </ul>
        </div>

        <div class="experience-item">
            <div class="item-header">
                <div class="item-title">Full Stack Developer</div>
                <div class="item-date">Mar 2020 - Dec 2022</div>
            </div>
            <div class="item-subtitle">Digital Innovators Ltd, Nairobi, Kenya</div>
            <ul class="achievements">
                <li class="achievement-item">Designed and developed a comprehensive customer portal handling 5,000+ monthly transactions, reducing customer service calls by 30% and improving customer satisfaction scores by 25%</li>
                <li class="achievement-item">Built and maintained 15+ RESTful APIs integrating with payment gateways, CRM systems, and third-party services, processing $500K+ in monthly transactions with 99.8% uptime</li>
                <li class="achievement-item">Collaborated with UX/UI team to implement responsive web applications using Vue.js, Tailwind CSS, and Laravel, supporting 3 different client brands with custom theming</li>
                <li class="achievement-item">Optimized database queries and implemented Redis caching strategies, reducing average page load times by 60% and improving overall system performance</li>
                <li class="achievement-item">Participated in Agile/Scrum ceremonies, contributing to sprint planning, daily standups, and retrospectives while maintaining 95% sprint completion rate</li>
            </ul>
        </div>

        <div class="experience-item">
            <div class="item-header">
                <div class="item-title">Web Developer</div>
                <div class="item-date">Jun 2018 - Feb 2020</div>
            </div>
            <div class="item-subtitle">CreativeTech Agency, Nairobi, Kenya</div>
            <ul class="achievements">
                <li class="achievement-item">Developed 25+ responsive websites for clients across healthcare, finance, and e-commerce sectors, achieving 100% W3C compliance and 95+ Google PageSpeed scores</li>
                <li class="achievement-item">Implemented custom CMS solutions using PHP and MySQL, enabling non-technical staff to manage content and reducing client maintenance requests by 50%</li>
                <li class="achievement-item">Collaborated with design team to translate 40+ wireframes and mockups into pixel-perfect, cross-browser compatible websites using HTML5, CSS3, and JavaScript</li>
                <li class="achievement-item">Optimized website performance through image compression, code minification, and CDN implementation, achieving average 3-second load times</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="section">
                <h2 class="section-header">Technical Skills</h2>

                <div class="skill-category">
                    <h3 class="skill-category-title">Backend Development</h3>
                    <div class="skills-progress">
                        <div class="skill-progress-item">
                            <div class="skill-progress-header">
                                <span class="skill-name">PHP</span>
                                <span class="skill-level">Expert (95%)</span>
                            </div>
                            <div class="skill-progress-bar">
                                <div class="skill-progress-fill" style="width: 95%"></div>
                            </div>
                        </div>
                        <div class="skill-progress-item">
                            <div class="skill-progress-header">
                                <span class="skill-name">Laravel</span>
                                <span class="skill-level">Expert (95%)</span>
                            </div>
                            <div class="skill-progress-bar">
                                <div class="skill-progress-fill" style="width: 95%"></div>
                            </div>
                        </div>
                        <div class="skill-progress-item">
                            <div class="skill-progress-header">
                                <span class="skill-name">Node.js</span>
                                <span class="skill-level">Proficient (80%)</span>
                            </div>
                            <div class="skill-progress-bar">
                                <div class="skill-progress-fill" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="skill-progress-item">
                            <div class="skill-progress-header">
                                <span class="skill-name">RESTful APIs</span>
                                <span class="skill-level">Expert (90%)</span>
                            </div>
                            <div class="skill-progress-bar">
                                <div class="skill-progress-fill" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="skill-category">
                    <h3 class="skill-category-title">Frontend Development</h3>
                    <div class="skills-progress">
                        <div class="skill-progress-item">
                            <div class="skill-progress-header">
                                <span class="skill-name">JavaScript</span>
                                <span class="skill-level">Expert (92%)</span>
                            </div>
                            <div class="skill-progress-bar">
                                <div class="skill-progress-fill" style="width: 92%"></div>
                            </div>
                        </div>
                        <div class="skill-progress-item">
                            <div class="skill-progress-header">
                                <span class="skill-name">Vue.js</span>
                                <span class="skill-level">Expert (90%)</span>
                            </div>
                            <div class="skill-progress-bar">
                                <div class="skill-progress-fill" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="skill-progress-item">
                            <div class="skill-progress-header">
                                <span class="skill-name">React</span>
                                <span class="skill-level">Proficient (85%)</span>
                            </div>
                            <div class="skill-progress-bar">
                                <div class="skill-progress-fill" style="width: 85%"></div>
                            </div>
                        </div>
                        <div class="skill-progress-item">
                            <div class="skill-progress-header">
                                <span class="skill-name">HTML5/CSS3</span>
                                <span class="skill-level">Expert (95%)</span>
                            </div>
                            <div class="skill-progress-bar">
                                <div class="skill-progress-fill" style="width: 95%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="skill-category">
                    <h3 class="skill-category-title">Database & Cloud</h3>
                    <ul class="skills-list">
                        <li class="skill-item">MySQL (Expert)</li>
                        <li class="skill-item">PostgreSQL (Proficient)</li>
                        <li class="skill-item">MongoDB (Proficient)</li>
                        <li class="skill-item">Redis (Proficient)</li>
                        <li class="skill-item">AWS (EC2, S3, RDS, Lambda)</li>
                        <li class="skill-item">Docker & Kubernetes</li>
                    </ul>
                </div>

                <div class="skill-category">
                    <h3 class="skill-category-title">Development Tools & Practices</h3>
                    <ul class="skills-list">
                        <li class="skill-item">Git/GitHub (Expert)</li>
                        <li class="skill-item">CI/CD (Jenkins, GitHub Actions)</li>
                        <li class="skill-item">Test-Driven Development</li>
                        <li class="skill-item">Agile/Scrum Methodologies</li>
                        <li class="skill-item">Code Review & Mentoring</li>
                        <li class="skill-item">Performance Optimization</li>
                    </ul>
                </div>
            </div>

            <div class="section">
                <h2 class="section-header">Certifications & Training</h2>
                <div class="experience-item">
                    <div class="item-title">AWS Certified Developer – Associate</div>
                    <div class="item-subtitle">Amazon Web Services</div>
                    <div class="item-date">Issued: April 2023 | Valid until: April 2026</div>
                </div>
                <div class="experience-item">
                    <div class="item-title">Laravel Certified Developer</div>
                    <div class="item-subtitle">Laravel LLC</div>
                    <div class="item-date">Issued: November 2022</div>
                </div>
                <div class="experience-item">
                    <div class="item-title">Professional Scrum Master I (PSM I)</div>
                    <div class="item-subtitle">Scrum.org</div>
                    <div class="item-date">Issued: March 2021</div>
                </div>
                <div class="experience-item">
                    <div class="item-title">JavaScript Algorithms and Data Structures</div>
                    <div class="item-subtitle">freeCodeCamp</div>
                    <div class="item-date">Issued: June 2020</div>
                </div>
                <div class="experience-item">
                    <div class="item-title">Google Analytics Certified</div>
                    <div class="item-subtitle">Google</div>
                    <div class="item-date">Issued: January 2023</div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="section">
                <h2 class="section-header">Notable Projects</h2>
                <div class="project-item">
                    <div class="item-header">
                        <div class="item-title">E-Commerce Platform</div>
                        <div class="item-date">2023</div>
                    </div>
                    <div class="item-description">
                        A full-featured e-commerce solution built with Laravel, Vue.js, and Tailwind CSS. Includes product management, shopping cart, payment processing, and order tracking.
                    </div>
                </div>
                <div class="project-item">
                    <div class="item-header">
                        <div class="item-title">Customer Support Portal</div>
                        <div class="item-date">2022</div>
                    </div>
                    <div class="item-description">
                        A comprehensive support system with ticket management, knowledge base, and live chat functionality. Built with Laravel, Livewire, and Alpine.js.
                    </div>
                </div>
                <div class="project-item">
                    <div class="item-header">
                        <div class="item-title">Real Estate Listing Platform</div>
                        <div class="item-date">2021</div>
                    </div>
                    <div class="item-description">
                        A property listing website with advanced search, filtering, and mapping features. Built with Laravel, React, and Google Maps API.
                    </div>
                </div>
            </div>

            <div class="section">
                <h2 class="section-header">Education</h2>
                <div class="education-item">
                    <div class="item-header">
                        <div class="item-title">BSc in Computer Science</div>
                        <div class="item-date">2014 - 2018</div>
                    </div>
                    <div class="item-subtitle">University of Nairobi, Kenya</div>
                    <div class="item-description">
                        Graduated with First Class Honors. Specialized in Software Engineering and Database Systems.
                    </div>
                </div>
            </div>

            <div class="section">
                <h2 class="section-header">Languages</h2>
                <ul class="skills-list">
                    <li class="skill-item">English (Fluent)</li>
                    <li class="skill-item">Swahili (Native)</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
