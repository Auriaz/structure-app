import { ref, onMounted } from 'vue';
        // import { useStorage } from './useStorage';

export const isDark = ref(true);

export const themeSwitch = () => {
    if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        // useStorage('theme', 'light');
        localStorage.setItem('theme', 'light');
        isDark.value =  false;

        return;
    }

    document.documentElement.classList.add('dark');
    // useStorage('theme', 'dark');
    localStorage.setItem('theme', 'dark');

    isDark.value = true;
};

export const themeCheck = () => {
    const userTheme = localStorage.getItem('theme');
    const systemTheme = window.matchMedia('(prefers-color-sheme: dark)').matches;

    if (userTheme === 'dark' || (!userTheme && systemTheme)) {
        document.documentElement.classList.add('dark');
        isDark.value = true;

        return;
    }

    isDark.value = false;

    themeSwitch();
};

