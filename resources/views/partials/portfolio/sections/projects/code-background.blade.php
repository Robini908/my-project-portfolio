<!-- Code Snippet Background for Projects Section -->
<div class="absolute inset-0 overflow-hidden opacity-10 pointer-events-none">
    <div class="absolute inset-0 z-0">
        <pre class="text-xs text-indigo-500 whitespace-pre-wrap leading-tight opacity-30">
<code class="language-javascript">
// Project Management System
class Project {
    constructor(title, description, technologies, status = 'active') {
        this.id = Math.random().toString(36).substr(2, 9);
        this.title = title;
        this.description = description;
        this.technologies = technologies;
        this.status = status;
        this.createdAt = new Date();
        this.updatedAt = new Date();
    }

    update(data) {
        Object.assign(this, data);
        this.updatedAt = new Date();
        return this;
    }

    addTechnology(tech) {
        if (!this.technologies.includes(tech)) {
            this.technologies.push(tech);
            this.updatedAt = new Date();
        }
        return this;
    }
}

class ProjectManager {
    constructor() {
        this.projects = [];
        this.listeners = [];
    }

    addProject(project) {
        this.projects.push(project);
        this.notifyListeners('project_added', project);
        return project;
    }

    getProject(id) {
        return this.projects.find(p => p.id === id);
    }

    updateProject(id, data) {
        const project = this.getProject(id);
        if (project) {
            project.update(data);
            this.notifyListeners('project_updated', project);
            return project;
        }
        return null;
    }

    deleteProject(id) {
        const index = this.projects.findIndex(p => p.id === id);
        if (index !== -1) {
            const project = this.projects[index];
            this.projects.splice(index, 1);
            this.notifyListeners('project_deleted', project);
            return true;
        }
        return false;
    }

    filterProjects(criteria) {
        return this.projects.filter(project => {
            for (const key in criteria) {
                if (key === 'technologies') {
                    // Check if project has any of the specified technologies
                    if (!criteria[key].some(tech => project.technologies.includes(tech))) {
                        return false;
                    }
                } else if (project[key] !== criteria[key]) {
                    return false;
                }
            }
            return true;
        });
    }

    subscribe(event, callback) {
        this.listeners.push({ event, callback });
        return () => this.unsubscribe(callback);
    }

    unsubscribe(callback) {
        this.listeners = this.listeners.filter(listener => listener.callback !== callback);
    }

    notifyListeners(event, data) {
        this.listeners
            .filter(listener => listener.event === event || listener.event === '*')
            .forEach(listener => listener.callback(data, event));
    }
}

// Example usage
const projectManager = new ProjectManager();

// Add some projects
const webApp = new Project(
    'Web Application Dashboard',
    'A responsive dashboard for monitoring system metrics and user activity',
    ['React', 'Node.js', 'MongoDB']
);

const mobileApp = new Project(
    'Mobile Fitness Tracker',
    'Cross-platform mobile app for tracking workouts and nutrition',
    ['React Native', 'Firebase', 'Redux']
);

const aiModel = new Project(
    'AI Recommendation Engine',
    'Machine learning model for personalized content recommendations',
    ['Python', 'TensorFlow', 'AWS']
);

projectManager.addProject(webApp);
projectManager.addProject(mobileApp);
projectManager.addProject(aiModel);

// Subscribe to events
projectManager.subscribe('project_added', (project) => {
    console.log(`New project added: ${project.title}`);
});

projectManager.subscribe('project_updated', (project) => {
    console.log(`Project updated: ${project.title}`);
});

// Filter projects by technology
const reactProjects = projectManager.filterProjects({
    technologies: ['React', 'React Native']
});

console.log(`Found ${reactProjects.length} React projects`);
</code>
        </pre>
    </div>
</div>
