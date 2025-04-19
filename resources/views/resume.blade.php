<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abraham Opuba - Professional Resume</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #fff;
            padding: 25px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .resume-header {
            margin-bottom: 25px;
            border-bottom: 2px solid #6366f1;
            padding-bottom: 15px;
        }

        .name {
            font-size: 36px;
            font-weight: 700;
            color: #4f46e5;
            margin-bottom: 5px;
        }

        .title {
            font-size: 20px;
            font-weight: 500;
            color: #64748b;
            margin-bottom: 15px;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            font-size: 14px;
            color: #64748b;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .section {
            margin-bottom: 25px;
        }

        .section-header {
            font-size: 22px;
            font-weight: 600;
            color: #4f46e5;
            margin-bottom: 10px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 5px;
        }

        .summary {
            margin-bottom: 25px;
            color: #334155;
        }

        .experience-item, .education-item, .project-item {
            margin-bottom: 20px;
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .item-title {
            font-size: 18px;
            font-weight: 600;
            color: #334155;
        }

        .item-subtitle {
            font-size: 16px;
            font-weight: 500;
            color: #475569;
        }

        .item-date {
            font-size: 14px;
            color: #64748b;
        }

        .item-description {
            color: #475569;
            font-size: 15px;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            list-style-type: none;
        }

        .skill-item {
            background-color: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 14px;
            color: #475569;
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
    <div class="resume-header">
        <h1 class="name">Abraham Opuba</h1>
        <div class="title">Full Stack Web Developer</div>
        <div class="contact-info">
            <div class="contact-item">
                <span>📧</span>
                <span>abrahamopuba@gmail.com</span>
            </div>
            <div class="contact-item">
                <span>📱</span>
                <span>+254 123 456 789</span>
            </div>
            <div class="contact-item">
                <span>🌐</span>
                <span>abrahamopuba.com</span>
            </div>
            <div class="contact-item">
                <span>🔗</span>
                <span>linkedin.com/in/abraham-opuba</span>
            </div>
            <div class="contact-item">
                <span>🐙</span>
                <span>github.com/abrahamopuba</span>
            </div>
            <div class="contact-item">
                <span>📍</span>
                <span>Westlands, Nairobi, Kenya</span>
            </div>
        </div>
    </div>

    <div class="section summary">
        <p>Passionate Full Stack Developer with over 5 years of experience building robust web applications with modern technologies. Specialized in creating performant, accessible, and user-friendly solutions with PHP/Laravel, JavaScript, Vue.js, and React. Committed to writing clean, maintainable code and implementing best practices in software development.</p>
    </div>

    <div class="section">
        <h2 class="section-header">Professional Experience</h2>

        <div class="experience-item">
            <div class="item-header">
                <div class="item-title">Senior Web Developer</div>
                <div class="item-date">Jan 2023 - Present</div>
            </div>
            <div class="item-subtitle">TechPlus Solutions, Nairobi, Kenya</div>
            <ul class="achievements">
                <li class="achievement-item">Led the development of a high-traffic e-commerce platform, increasing conversion rates by 15% through performance optimizations and improved UX</li>
                <li class="achievement-item">Implemented CI/CD pipelines that reduced deployment time by 70% and decreased release-related incidents by 25%</li>
                <li class="achievement-item">Mentored junior developers through code reviews, pair programming, and technical workshops</li>
                <li class="achievement-item">Refactored legacy codebase to modern Laravel standards, resulting in a 40% improvement in application performance</li>
            </ul>
        </div>

        <div class="experience-item">
            <div class="item-header">
                <div class="item-title">Full Stack Developer</div>
                <div class="item-date">Mar 2020 - Dec 2022</div>
            </div>
            <div class="item-subtitle">Digital Innovators Ltd, Nairobi, Kenya</div>
            <ul class="achievements">
                <li class="achievement-item">Designed and developed a customer portal that streamlined service requests, reducing customer service calls by 30%</li>
                <li class="achievement-item">Built RESTful APIs that integrated with third-party services, improving data accuracy and operational efficiency</li>
                <li class="achievement-item">Collaborated with UX designers to implement responsive interfaces using Vue.js and Tailwind CSS</li>
                <li class="achievement-item">Optimized database queries and implemented caching strategies, reducing average page load times by 60%</li>
            </ul>
        </div>

        <div class="experience-item">
            <div class="item-header">
                <div class="item-title">Web Developer</div>
                <div class="item-date">Jun 2018 - Feb 2020</div>
            </div>
            <div class="item-subtitle">CreativeTech Agency, Nairobi, Kenya</div>
            <ul class="achievements">
                <li class="achievement-item">Developed responsive websites for various clients across multiple industries, adhering to W3C standards</li>
                <li class="achievement-item">Implemented content management systems that enabled non-technical staff to manage website content</li>
                <li class="achievement-item">Collaborated with the design team to translate wireframes and mockups into functional websites</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="section">
                <h2 class="section-header">Technical Skills</h2>
                <ul class="skills-list">
                    <li class="skill-item">PHP</li>
                    <li class="skill-item">Laravel</li>
                    <li class="skill-item">JavaScript</li>
                    <li class="skill-item">TypeScript</li>
                    <li class="skill-item">Vue.js</li>
                    <li class="skill-item">React</li>
                    <li class="skill-item">MySQL</li>
                    <li class="skill-item">PostgreSQL</li>
                    <li class="skill-item">MongoDB</li>
                    <li class="skill-item">HTML5</li>
                    <li class="skill-item">CSS3</li>
                    <li class="skill-item">Tailwind CSS</li>
                    <li class="skill-item">SASS/SCSS</li>
                    <li class="skill-item">Git</li>
                    <li class="skill-item">Docker</li>
                    <li class="skill-item">CI/CD</li>
                    <li class="skill-item">AWS</li>
                    <li class="skill-item">RESTful APIs</li>
                    <li class="skill-item">GraphQL</li>
                    <li class="skill-item">TDD</li>
                </ul>
            </div>

            <div class="section">
                <h2 class="section-header">Certifications</h2>
                <div class="experience-item">
                    <div class="item-title">AWS Certified Developer – Associate</div>
                    <div class="item-date">Issued: April 2023</div>
                </div>
                <div class="experience-item">
                    <div class="item-title">Laravel Certification</div>
                    <div class="item-date">Issued: November 2022</div>
                </div>
                <div class="experience-item">
                    <div class="item-title">Professional Scrum Master I (PSM I)</div>
                    <div class="item-date">Issued: March 2021</div>
                </div>
                <div class="experience-item">
                    <div class="item-title">JavaScript Algorithms and Data Structures</div>
                    <div class="item-date">Issued: June 2020</div>
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
