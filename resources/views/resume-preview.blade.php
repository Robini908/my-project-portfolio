<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Abraham Opuba - Senior Full Stack Developer Resume Preview">
    <title>Abraham Opuba - Resume Preview</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #1e293b;
            background: white;
            padding: 20px;
            font-size: 14px;
        }

        .resume-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .resume-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px;
            color: white;
            text-align: center;
        }

        .name {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
            font-size: 13px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.1);
            padding: 6px 12px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .contact-item a {
            color: inherit;
            text-decoration: none;
        }

        .contact-item a:hover {
            text-decoration: underline;
        }

        .resume-content {
            padding: 30px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-header {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 15px;
            position: relative;
            padding-bottom: 8px;
        }

        .section-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 1px;
        }

        .summary p {
            font-size: 15px;
            line-height: 1.7;
            color: #475569;
        }

        .experience-item {
            margin-bottom: 20px;
            padding: 15px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 10px;
            border-left: 3px solid #667eea;
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 6px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .item-title {
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
            flex: 1;
            min-width: 150px;
        }

        .item-date {
            font-size: 12px;
            color: #667eea;
            font-weight: 600;
            background: white;
            padding: 3px 8px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .item-subtitle {
            font-size: 14px;
            font-weight: 500;
            color: #475569;
            margin-bottom: 10px;
        }

        .achievements {
            list-style: none;
        }

        .achievement-item {
            margin-bottom: 8px;
            position: relative;
            padding-left: 15px;
            font-size: 13px;
            line-height: 1.5;
            color: #475569;
        }

        .achievement-item::before {
            content: "•";
            position: absolute;
            left: 0;
            color: #667eea;
            font-weight: bold;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .skill-category {
            background: #f8fafc;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }

        .skill-category-title {
            font-size: 14px;
            font-weight: 600;
            color: #667eea;
            margin-bottom: 10px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 5px;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            list-style: none;
        }

        .skill-item {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            padding: 4px 8px;
            font-size: 12px;
            color: #475569;
        }

        .two-column {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        .education-item, .cert-item {
            margin-bottom: 15px;
            padding: 12px;
            background: #f8fafc;
            border-radius: 8px;
            border-left: 3px solid #667eea;
        }

        .achievements-highlight {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .achievement-card {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            border-left: 3px solid #667eea;
        }

        .achievement-metric {
            font-size: 20px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 4px;
            font-family: 'Playfair Display', serif;
        }

        .achievement-desc {
            font-size: 12px;
            color: #475569;
            font-weight: 500;
        }

        @media print {
            body {
                padding: 0;
                font-size: 12px;
            }

            .resume-container {
                box-shadow: none;
                border-radius: 0;
            }

            .resume-header {
                padding: 20px;
            }

            .name {
                font-size: 24px;
            }

            .title {
                font-size: 16px;
            }

            .resume-content {
                padding: 20px;
            }

            .section {
                margin-bottom: 20px;
                break-inside: avoid;
            }

            .experience-item {
                break-inside: avoid;
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="resume-container">
        <header class="resume-header">
            <h1 class="name">Abraham Opuba</h1>
            <p class="title">Senior Full Stack Web Developer</p>
            <div class="contact-info">
                <div class="contact-item">
                    <span>✉</span>
                    <a href="mailto:abrahamopuba@gmail.com">abrahamopuba@gmail.com</a>
                </div>
                <div class="contact-item">
                    <span>☎</span>
                    <a href="tel:+254123456789">+254 123 456 789</a>
                </div>
                <div class="contact-item">
                    <span>🌐</span>
                    <a href="https://www.abrahamopuba.com" target="_blank">www.abrahamopuba.com</a>
                </div>
                <div class="contact-item">
                    <span>💼</span>
                    <a href="https://linkedin.com/in/abraham-opuba" target="_blank">LinkedIn Profile</a>
                </div>
                <div class="contact-item">
                    <span>⚡</span>
                    <a href="https://github.com/Robini908" target="_blank">GitHub Profile</a>
                </div>
                <div class="contact-item">
                    <span>📍</span>
                    <span>Westlands, Nairobi, Kenya</span>
                </div>
            </div>
        </header>

        <div class="resume-content">
            <section class="section summary">
                <h2 class="section-header">Professional Summary</h2>
                <p>Results-driven Full Stack Developer with 5+ years of experience architecting and developing scalable web applications using modern technologies. Proven expertise in PHP/Laravel, JavaScript frameworks (Vue.js, React), and cloud deployment strategies. Demonstrated ability to lead technical projects, optimize application performance by up to 40%, and deliver high-quality solutions that drive business growth.</p>
            </section>

            <section class="section">
                <h2 class="section-header">Key Achievements</h2>
                <div class="achievements-highlight">
                    <div class="achievement-card">
                        <div class="achievement-metric">45%</div>
                        <div class="achievement-desc">Performance Improvement</div>
                    </div>
                    <div class="achievement-card">
                        <div class="achievement-metric">$2.5M</div>
                        <div class="achievement-desc">Annual Revenue Generated</div>
                    </div>
                    <div class="achievement-card">
                        <div class="achievement-metric">94%</div>
                        <div class="achievement-desc">Deployment Time Reduction</div>
                    </div>
                    <div class="achievement-card">
                        <div class="achievement-metric">99.9%</div>
                        <div class="achievement-desc">System Uptime Achieved</div>
                    </div>
                </div>
            </section>

            <section class="section">
                <h2 class="section-header">Professional Experience</h2>

                <div class="experience-item">
                    <div class="item-header">
                        <div class="item-title">Senior Full Stack Developer</div>
                        <div class="item-date">Jan 2023 - Present</div>
                    </div>
                    <div class="item-subtitle">TechSolutions Inc, Nairobi, Kenya</div>
                    <ul class="achievements">
                        <li class="achievement-item">Spearheaded development of a multi-tenant SaaS platform serving 10,000+ active users across 15 countries</li>
                        <li class="achievement-item">Architected microservices infrastructure using Laravel, Docker, and AWS, achieving 99.9% uptime</li>
                        <li class="achievement-item">Led cross-functional team of 6 developers and 2 designers, implementing Agile methodologies</li>
                        <li class="achievement-item">Optimized database performance through query optimization and Redis caching implementation</li>
                    </ul>
                </div>

                <div class="experience-item">
                    <div class="item-header">
                        <div class="item-title">Full Stack Developer</div>
                        <div class="item-date">Mar 2020 - Dec 2022</div>
                    </div>
                    <div class="item-subtitle">Digital Innovators Ltd, Nairobi, Kenya</div>
                    <ul class="achievements">
                        <li class="achievement-item">Designed and developed a comprehensive customer portal handling 5,000+ monthly transactions</li>
                        <li class="achievement-item">Built and maintained 15+ RESTful APIs integrating with payment gateways and CRM systems</li>
                        <li class="achievement-item">Collaborated with UX/UI team to implement responsive web applications using Vue.js and Laravel</li>
                        <li class="achievement-item">Implemented automated testing and deployment workflows, reducing manual testing time by 40%</li>
                    </ul>
                </div>

                <div class="experience-item">
                    <div class="item-header">
                        <div class="item-title">Web Developer</div>
                        <div class="item-date">Jun 2018 - Feb 2020</div>
                    </div>
                    <div class="item-subtitle">CreativeTech Agency, Nairobi, Kenya</div>
                    <ul class="achievements">
                        <li class="achievement-item">Developed 25+ responsive websites for clients across healthcare, finance, and e-commerce sectors</li>
                        <li class="achievement-item">Implemented custom CMS solutions using PHP and MySQL</li>
                        <li class="achievement-item">Collaborated with design team to translate 40+ wireframes into pixel-perfect websites</li>
                    </ul>
                </div>
            </section>

            <div class="two-column">
                <div>
                    <section class="section">
                        <h2 class="section-header">Technical Skills</h2>
                        <div class="skills-grid">
                            <div class="skill-category">
                                <h3 class="skill-category-title">Backend Development</h3>
                                <ul class="skills-list">
                                    <li class="skill-item">PHP (Expert)</li>
                                    <li class="skill-item">Laravel (Expert)</li>
                                    <li class="skill-item">Node.js</li>
                                    <li class="skill-item">RESTful APIs</li>
                                    <li class="skill-item">GraphQL</li>
                                </ul>
                            </div>
                            <div class="skill-category">
                                <h3 class="skill-category-title">Frontend Development</h3>
                                <ul class="skills-list">
                                    <li class="skill-item">JavaScript (Expert)</li>
                                    <li class="skill-item">Vue.js (Expert)</li>
                                    <li class="skill-item">React</li>
                                    <li class="skill-item">HTML5/CSS3</li>
                                    <li class="skill-item">Tailwind CSS</li>
                                </ul>
                            </div>
                            <div class="skill-category">
                                <h3 class="skill-category-title">Database & Cloud</h3>
                                <ul class="skills-list">
                                    <li class="skill-item">MySQL (Expert)</li>
                                    <li class="skill-item">PostgreSQL</li>
                                    <li class="skill-item">MongoDB</li>
                                    <li class="skill-item">Redis</li>
                                    <li class="skill-item">AWS</li>
                                    <li class="skill-item">Docker</li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>

                <div>
                    <section class="section">
                        <h2 class="section-header">Education</h2>
                        <div class="education-item">
                            <div class="item-header">
                                <div class="item-title">BSc in Computer Science</div>
                                <div class="item-date">2014 - 2018</div>
                            </div>
                            <div class="item-subtitle">University of Nairobi, Kenya</div>
                            <p style="font-size: 12px; color: #64748b; margin-top: 5px;">Graduated with First Class Honors. Specialized in Software Engineering and Database Systems.</p>
                        </div>
                    </section>

                    <section class="section">
                        <h2 class="section-header">Certifications</h2>
                        <div class="cert-item">
                            <div class="item-title" style="font-size: 14px;">AWS Certified Developer – Associate</div>
                            <div class="item-date">April 2023</div>
                        </div>
                        <div class="cert-item">
                            <div class="item-title" style="font-size: 14px;">Laravel Certified Developer</div>
                            <div class="item-date">November 2022</div>
                        </div>
                        <div class="cert-item">
                            <div class="item-title" style="font-size: 14px;">Professional Scrum Master I</div>
                            <div class="item-date">March 2021</div>
                        </div>
                    </section>

                    <section class="section">
                        <h2 class="section-header">Languages</h2>
                        <ul class="skills-list" style="flex-direction: column; gap: 8px;">
                            <li class="skill-item">English (Fluent)</li>
                            <li class="skill-item">Swahili (Native)</li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
