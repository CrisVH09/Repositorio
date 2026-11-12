/**
 * Light / dark theme toggle. The initial theme is applied by an inline
 * script in the layout <head> to avoid a flash of the wrong theme.
 */
function setupThemeToggle() {
    const root = document.documentElement;

    document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const isDark = root.classList.toggle('dark');

            try {
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            } catch {
                // Storage may be unavailable (private mode); the toggle still works for this visit.
            }
        });
    });
}

/**
 * Mobile navigation menu.
 */
function setupMobileMenu() {
    const button = document.querySelector('[data-menu-toggle]');
    const menu = document.querySelector('[data-menu]');

    if (!button || !menu) {
        return;
    }

    button.addEventListener('click', () => {
        const isOpen = button.getAttribute('aria-expanded') === 'true';

        button.setAttribute('aria-expanded', String(!isOpen));
        menu.classList.toggle('hidden', isOpen);
    });
}

setupThemeToggle();
setupMobileMenu();
