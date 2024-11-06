/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./index.html",
        './vendor/filament/**/*.blade.php',
        "./src/**/*.{js,ts,jsx,tsx}",
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};
