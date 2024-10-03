/* eslint-disable n/no-exports-assign */
/** @type {import('tailwindcss').Config} */

function withOpacity (variableName) {
  return ({ opacityValue }) => {
    if (opacityValue !== undefined) {
      return `rgba(var(${variableName}), ${opacityValue})`
    }
    return `rgba(var(${variableName}))`
  }
}
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/**/*.vue',
    './src/**/*.{html,js}',
    './node_modules/tw-elements/dist/js/**/*.js'
  ],

  module: (exports = {
    purge: [],
    theme: {
      daisyui: {
        themes: [
          {
            mytheme: {
              "primary": "#2b3155",
              "secondary": "#f6d860",
              "highlight": "#c8ff00",
              "neutral-green": "#15a34a",
              "coder-pink": "#d13581",
            },
          },
          "dark",
          "cupcake",
        ],
      },
      extend: {
        screens: {
          'mobile': '200px',
          'tablet': '768px',
          'laptop': '950px',
          'desktop': '1440px',
        },
      },
    }
  }),
  plugins: [
    [
      require('daisyui', '@tailwindcss/forms, tw-elements/dist/plugin.cjs')
    ]
  ],
  darkMode: 'class'
}
