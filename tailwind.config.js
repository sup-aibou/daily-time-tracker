module.exports = {
	content: [
		"./*.{html,php,js}",
		"./**/*.php", // Scans all PHP files in your project
		"./functions/**/*.php",
		"./includes/**/*.php",
		"./src/**/*.{html,js,php}", // Add src folder for dynamic files
	],
	theme: {
		extend: {},
	},
	plugins: [],
	mode: "jit",
};
