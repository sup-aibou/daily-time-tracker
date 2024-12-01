import { defineConfig } from "vite";

export default defineConfig({
	root: "./", // Adjust based on your project structure
	build: {
		outDir: "dist", // Output directory for the build
	},
	server: {
		proxy: {
			"/php": "http://localhost", // If you need to proxy PHP requests
		},
	},
	css: {
		postcss: "./postcss.config.js", // Ensure this points to your PostCSS config
	},
});
