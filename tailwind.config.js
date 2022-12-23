/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/protonemedia/laravel-splade/lib/**/*.vue",
        "./vendor/protonemedia/laravel-splade/resources/views/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    darkMode: 'class',

    theme: {
        extend: {
            animation: {
                'ping-one': 'ping 0.3s linear',
            },

            keyframes: {
            },

            screens: {
                "3xs": '240px',
                "2xs": '320px',
                "xs": '480px',
                "sm": '720px',
                "md": '960px',
                "lg": '1200px',
                "xl": '1440px',
                "2xl": '1600px',
                "3xl": '1920px',
            },
            gridRow: {
                'span-8': 'span 8 / span 8',
                'span-9': 'span 9 / span 9',
                'span-10': 'span 10 / span 10',
                'span-11': 'span 11 / span 11',
                'span-12': 'span 12 / span 12',
            },
            gridTemplateRows: {
                // Simple 10 row grid
                '12': 'repeat(12, minmax(0, 1fr))',
            },

            // fontFamily: {
            //     sans: ['Lexend Exa', ...defaultTheme.fontFamily.sans],
            // },

            colors: {
                'primary': 'var(--color-primary)',
                'primary-dark': 'var(--color-primary-dark)',

                'secondary': 'var(--color-secondary)',
                'secondary-dark': 'var(--color-secondary-dark)',

                'tertiary': 'var(--color-tertiary)',
                'tertiary-dark': 'var(--color-tertiary-dark)',

                'background': 'var(--color-background)',
                'background-dark': 'var(--color-background-dark)',

                'success': 'var(--color-success)',
                'info': 'var(--color-info)',
                'action': 'var(--color-action)',
                'warning': 'var(--color-warning)',
                'danger': 'var(--color-danger)',
                'error': 'var(--color-error)',

                'active': 'var(--color-active)',
                'hover': 'var(--color-hover)',
                'hover-item': 'var(--color-hover-item)',
                'focus': 'var(--color-focus)',

                'light': 'var(--color-light)',
                'dark': 'var(--color-dark)',
            },

            textColor: {
                'base-color': 'var(--color-text-base)',
                'base-dark': 'var(--color-text-base-dark)',

                'muted': 'var(--color-text-muted)',
                'muted-dark': 'var(--color-text-muted-dark)',

                'inverted': 'var(--color-text-inverted)',
                'inverted-dark': 'var(--color-text-inverted-dark)',
            },
            borderColor: {
                'base-color': 'var(--color-text-base)',
                'base-dark': 'var(--color-text-base-dark)',

                'muted': 'var(--color-text-muted)',
                'muted-dark': 'var(--color-text-muted-dark)',

                'inverted': 'var(--color-text-inverted)',
                'inverted-dark': 'var(--color-text-inverted-dark)',
            }
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography")
    ],
};
