// Hero Component JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Precisão: 0.1mm
    const precisionEl = document.getElementById('counter-precision');
    if (precisionEl) {
        let precision = 0.0;
        const precisionTarget = 0.1;
        const precisionStep = 0.005;

        function animatePrecision() {
            if (precision < precisionTarget) {
                precision += precisionStep;
                if (precision > precisionTarget) precision = precisionTarget;
                precisionEl.textContent = precision.toFixed(1);
                requestAnimationFrame(animatePrecision);
            } else {
                precisionEl.textContent = precisionTarget.toFixed(1);
            }
        }
        animatePrecision();
    }

    // Projetos: +500
    const projectsEl = document.getElementById('counter-projects');
    if (projectsEl) {
        let projects = 0;
        const projectsTarget = 500;
        const projectsStep = Math.ceil(projectsTarget / 60);

        function animateProjects() {
            if (projects < projectsTarget) {
                projects += projectsStep;
                if (projects > projectsTarget) projects = projectsTarget;
                projectsEl.textContent = projects;
                requestAnimationFrame(animateProjects);
            } else {
                projectsEl.textContent = projectsTarget;
            }
        }
        animateProjects();
    }

    // Setores: 25+
    const sectorsEl = document.getElementById('counter-sectors');
    if (sectorsEl) {
        let sectors = 0;
        const sectorsTarget = 25;
        const sectorsStep = 1;

        function animateSectors() {
            if (sectors < sectorsTarget) {
                sectors += sectorsStep;
                sectorsEl.textContent = sectors;
                setTimeout(animateSectors, 30);
            } else {
                sectorsEl.textContent = sectorsTarget;
            }
        }
        animateSectors();
    }
}); 