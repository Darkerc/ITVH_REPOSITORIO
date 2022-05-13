import { defineConfig } from "vite";

export default defineConfig({
  build: {
    assetsDir: '.',
    outDir: '../web/bundle',
    emptyOutDir: false,
    rollupOptions: {
      output: {
        entryFileNames: '[name].js',
        // Prevent vendor.js being created
        manualChunks: {},
        // chunkFileNames: "index.js",
        // this got rid of the hash on style.css
        assetFileNames: "index.[ext]",
      },
    },
    // Prevent vendor.css being created
    cssCodeSplit: false,
    // prevent some warnings
    chunkSizeWarningLimit: 60000,
  },
});
