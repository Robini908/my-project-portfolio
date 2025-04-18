import https from 'https';
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const logos = {
    'react': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/react/react-original.svg',
    'vue': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/vuejs/vuejs-original.svg',
    'nextjs': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/nextjs/nextjs-line.svg',
    'tailwind': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/tailwindcss/tailwindcss-original.svg',
    'typescript': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/typescript/typescript-original.svg',
    'javascript': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg',
    'laravel': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-original.svg',
    'nodejs': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/nodejs/nodejs-original.svg',
    'express': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/express/express-original.svg',
    'postgresql': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/postgresql/postgresql-original.svg',
    'mongodb': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/mongodb/mongodb-original.svg',
    'redis': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/redis/redis-original.svg',
    'docker': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/docker/docker-original.svg',
    'git': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/git/git-original.svg',
    'aws': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/amazonwebservices/amazonwebservices-plain-wordmark.svg',
    'github-actions': 'https://raw.githubusercontent.com/simple-icons/simple-icons/develop/icons/githubactions.svg',
    'linux': 'https://raw.githubusercontent.com/devicons/devicon/master/icons/linux/linux-original.svg',
    'nginx': 'https://raw.githubusercontent.com/simple-icons/simple-icons/develop/icons/nginx.svg'
};

const downloadLogo = (name, url) => {
    const filePath = path.join(__dirname, 'public', 'images', 'skills', `${name}.svg`);

    https.get(url, (response) => {
        if (response.statusCode === 200) {
            const file = fs.createWriteStream(filePath);
            response.pipe(file);

            file.on('finish', () => {
                file.close();
                console.log(`Downloaded: ${name}.svg`);
            });
        } else {
            console.error(`Failed to download ${name}.svg: ${response.statusCode}`);
        }
    }).on('error', (err) => {
        console.error(`Error downloading ${name}.svg:`, err.message);
    });
};

// Create directory if it doesn't exist
const dir = path.join(__dirname, 'public', 'images', 'skills');
if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
}

// Download all logos
Object.entries(logos).forEach(([name, url]) => {
    downloadLogo(name, url);
});
