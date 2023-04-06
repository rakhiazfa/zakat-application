/** @type {import('tailwindcss').Config} */

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
            colors: {
                dark: "#1A1A1A",
                light: "#F7F7F7",
            },
            boxShadow: {
                xxs: "1px 1px 45px 1px rgba(0, 0, 0, 0.025)",
                sxs: "1px 1px 45px 1px rgba(0, 0, 0, 0.045)",
            },
            screens: {
                xs: "480px",
            },
        },
    },
    plugins: [],
};
