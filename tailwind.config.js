/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
   './public_html/**/*.html',  // Para arquivos HTML
    './public_html/**/*.php',    // Para arquivos PHP, como o seu
    './public_html/assets/css/**/*.css', // Para arquivos CSS, se aplicável
    './public_html/assets/js/**/*.js',    // Para arquivos JavaScript, se aplicável
    './src/**/*.html',  // Para arquivos HTML
    './src/**/*.php',    // Para arquivos PHP, como o seu
    './src/assets/css/**/*.css', // Para arquivos CSS, se aplicável
    './src/assets/js/**/*.js'    // Para arquivos JavaScript, se aplicável
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}