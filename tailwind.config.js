/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "*/**/*.php",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: { 
      fontFamily: {
      custom: ['Archivo', 'Poppins'],
    },
  },
  },
  plugins: [
    require()
  ],
  
}

