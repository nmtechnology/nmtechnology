const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
      darkMode: 'class',
      transparent: 'transparent',
      current: 'currentColor',
      'red': '#fe0200',
      'blue': '#0084ff',
      'midnight': '#001B35',
      'orange': '#ff700a',
      'silver': '#c8b1b1',
      'gold': '#90ff00',
      'white': '#ffffff',
      'dark': '#232323'
    },
        extend: {
            fontFamily: {
                sans: ['Kanit', ...defaultTheme.fontFamily.sans],
            },
        },
    },
  
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
