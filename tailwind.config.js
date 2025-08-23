
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
     "./resources/views/admin/**/*.blade.php",
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
   daisyui:{
    themes:['dark','light','retro','cupcake','emerald']
  },
}


