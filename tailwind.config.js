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
        secondary: '#d5ed86'
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}