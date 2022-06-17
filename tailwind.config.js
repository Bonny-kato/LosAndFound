module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary:{
                    // blue: "#07141c",
                    blue: "#131a29",
                    dark:"#262D37"
                },
                secondary:{
                    blue: "#2BA7F3",
                    dark: "#3C424B"
                },
                accent: "#1b272f"
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
