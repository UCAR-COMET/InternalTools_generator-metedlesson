import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [react()],
  base: "/generators/webapp/",
  server: {
    port: 3000,
    open: true
  },
  build: {
    outDir: "dist",
    assetsDir: "assets"
  }
});
