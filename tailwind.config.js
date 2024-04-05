/** @type {import('tailwindcss').Config} */
export default {
  prefix: 'tw-',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors : {
        brand : "#003366"
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography')
  ],
}