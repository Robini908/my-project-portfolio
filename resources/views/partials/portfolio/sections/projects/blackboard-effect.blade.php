<!-- Blackboard Effect Styles and Scripts for Projects Section -->
<style>
    /* Blackboard Base Styles */
    .blackboard-container {
        background-color: rgba(30, 30, 30, 0.9);
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 20px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        position: relative;
        overflow: hidden;
    }

    /* Chalk Text Styles */
    .chalk-text {
        font-family: 'Architects Daughter', 'Just Another Hand', cursive;
        color: rgba(255, 255, 255, 0.9);
        text-shadow: 0 0 3px rgba(255, 255, 255, 0.3);
        letter-spacing: 0.5px;
    }

    /* Chalk Dust Effect */
    .chalk-dust {
        position: absolute;
        width: 2px;
        height: 2px;
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 50%;
        opacity: 0;
        animation: chalk-fall 2s ease-out forwards;
    }

    @keyframes chalk-fall {
        0% {
            transform: translateY(-10px);
            opacity: 0.8;
        }
        100% {
            transform: translateY(100px);
            opacity: 0;
        }
    }

    /* Chalk Writing Animation */
    .chalk-writing {
        position: relative;
        display: inline-block;
    }

    .chalk-writing::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background-color: rgba(255, 255, 255, 0.6);
        animation: chalk-write 1.5s ease-out forwards;
    }

    @keyframes chalk-write {
        0% { width: 0; }
        100% { width: 100%; }
    }

    /* Eraser Marks */
    .eraser-mark {
        position: absolute;
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 50%;
        filter: blur(3px);
    }
</style>

<!-- Blackboard Effect Scripts are in resources/js/alpine-init.js -->
