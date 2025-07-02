module.exports = {
    proxy: "localhost:8000", // Assuming you're using PHP's built-in server on port 8000
    files: [
        "**/*.php",
        "**/*.html",
        "**/*.css",
        "**/*.js"
    ],
    open: false,
    notify: false
}; 