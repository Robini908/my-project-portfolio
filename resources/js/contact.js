document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.contact-form');
    const inputs = form.querySelectorAll('.chalk-input');

    // Initialize chalk dust effect
    function createChalkDust(x, y) {
        const dust = document.createElement('div');
        dust.className = 'chalk-dust';
        dust.style.left = `${x}px`;
        dust.style.top = `${y}px`;
        document.body.appendChild(dust);

        // Remove dust particle after animation
        dust.addEventListener('animationend', () => dust.remove());
    }

    // Add chalk dust effect to inputs
    inputs.forEach(input => {
        input.addEventListener('focus', function(e) {
            const rect = this.getBoundingClientRect();
            for(let i = 0; i < 5; i++) {
                setTimeout(() => {
                    createChalkDust(
                        rect.left + Math.random() * rect.width,
                        rect.top + Math.random() * rect.height
                    );
                }, i * 100);
            }
        });
    });

    // Form validation
    function validateField(input) {
        const field = input.closest('.form-field');
        const validation = field.querySelector('.field-validation');

        if (input.value.trim() === '') {
            validation.textContent = `${input.getAttribute('placeholder')} is required`;
            validation.classList.add('show');
            return false;
        }

        if (input.type === 'email' && !validateEmail(input.value)) {
            validation.textContent = 'Please enter a valid email address';
            validation.classList.add('show');
            return false;
        }

        validation.classList.remove('show');
        return true;
    }

    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // Form submission handling
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        let isValid = true;

        // Validate all fields
        inputs.forEach(input => {
            if (!validateField(input)) {
                isValid = false;
            }
        });

        if (!isValid) return;

        // Simulate form submission
        const submitButton = form.querySelector('button[type="submit"]');
        const originalText = submitButton.textContent;
        submitButton.disabled = true;
        submitButton.innerHTML = '<span class="animate-spin">↻</span> Sending...';

        try {
            // Here you would typically send the form data to your backend
            await new Promise(resolve => setTimeout(resolve, 1500)); // Simulate API call

            // Show success message
            const successMessage = document.createElement('div');
            successMessage.className = 'success-message';
            successMessage.textContent = 'Message sent successfully!';
            document.body.appendChild(successMessage);

            // Trigger animation
            setTimeout(() => successMessage.classList.add('show'), 100);

            // Remove message after 3 seconds
            setTimeout(() => {
                successMessage.classList.remove('show');
                setTimeout(() => successMessage.remove(), 500);
            }, 3000);

            // Reset form
            form.reset();

        } catch (error) {
            // Show error message
            const errorMessage = document.createElement('div');
            errorMessage.className = 'success-message error-message';
            errorMessage.textContent = 'Failed to send message. Please try again.';
            document.body.appendChild(errorMessage);

            setTimeout(() => errorMessage.classList.add('show'), 100);
            setTimeout(() => {
                errorMessage.classList.remove('show');
                setTimeout(() => errorMessage.remove(), 500);
            }, 3000);
        }

        // Reset button
        submitButton.disabled = false;
        submitButton.textContent = originalText;
    });

    // Real-time validation
    inputs.forEach(input => {
        input.addEventListener('blur', () => validateField(input));
        input.addEventListener('input', () => {
            const field = input.closest('.form-field');
            const validation = field.querySelector('.field-validation');
            validation.classList.remove('show');
        });
    });

    // Add 3D tilt effect to form
    const formContainer = document.querySelector('.chalkboard-form');

    formContainer.addEventListener('mousemove', function(e) {
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const angleX = (y - centerY) / 30;
        const angleY = (centerX - x) / 30;

        this.style.transform = `perspective(1000px) rotateX(${angleX}deg) rotateY(${angleY}deg) translateZ(10px)`;
    });

    formContainer.addEventListener('mouseleave', function() {
        this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
    });
});
