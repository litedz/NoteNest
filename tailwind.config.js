/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js",
    './vendor/laravel/framework/src/Illuminate/resources/views/*.blade.php',
    './vendor/notenest/resources/**/*.blade.php',
    "./resources/views/*.blade.php",
    "./resources/views/**/*.blade.php",
    "./src/app/livewire/*.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

