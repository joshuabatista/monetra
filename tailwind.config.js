/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        primary: '#4b50d1',
        secondary: '#d5ed86',
        primary_dark: '#4248d6'
      },
      animation: {
        spin: 'spin 5s linear infinite',
      },
      screens: {
        mobile: { max: '639px' },
      },
      animation: {
        pulseGrow: "pulseGrow 1.5s infinite ease-in-out",
      },
      keyframes: {
        pulseGrow: {
          "0%, 100%": { transform: "scale(1)" },
          "50%": { transform: "scale(1.1)" },
        },
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}