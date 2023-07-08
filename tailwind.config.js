/** @type {import('tailwindcss').Config} */

function withOpacity(variableName) {
    return ({ opacityValue }) => {
        if (opacityValue != undefined) {
            return `rgba(var(${variableName}), ${opacityValue})`
        }
        return `rgba(var(${variableName}))`
    }
}
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/**/*.vue",
        "./src/**/*.{html,js}",
        "./node_modules/tw-elements/dist/js/**/*.js"
    ],

    module: exports = {
        purge: [],
        theme: {
            extend: {
                textColor: {
                    skin: {
                        base: withOpacity('--color-text-base'),
                        muted: withOpacity('--color-text-muted'),
                        inverted: withOpacity('--color-text-inverted'),
                    },
                },
                backgroundColor: {
                    skin: {
                        fill: withOpacity('--color-fill'),
                        'button-accent': withOpacity('--color-button-accent-hover'),
                        'button-accent-hover': withOpacity('--color-button-accent-hover'),
                        'button-muted': withOpacity('--color-button-muted'),
                    },
                },
            },
            gradientColorStops: {
                skin: {
                    hue: withOpacity('--color-fill'),
            },
        },
    },
},
        plugins: [
            [require('daisyui', '@tailwindcss/forms, tw-elements/dist/plugin.cjs')],
        ],
    darkMode: "class"
    };
        
