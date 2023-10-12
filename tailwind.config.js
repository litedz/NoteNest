/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.{html,js",
    './vendor/notenest/resources/**/*.blade.php',
    "./resources/views/*.blade.php",
    "./resources/views/**/*.blade.php",
    "./resources/app/livewire/*.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

