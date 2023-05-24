import { defineConfig, loadEnv } from "vite";
import vue from "@vitejs/plugin-vue";
import { liveReload } from "vite-plugin-live-reload";

// https://vitejs.dev/config/
export default defineConfig(({ command, mode }) => {
  const envConfigMode = mode === "development" ? "dev" : mode;
  const env = loadEnv(envConfigMode, "");

  return {
    plugins: [vue(), liveReload(["app/views/**/*.twig"])],
    build: {
      minify: true,
      outDir: "webroot/dist",
      manifest: true,
      rollupOptions: {
        input: "src/app.js",
      },
    },

    server: {
      strictPort: true,
      port: env.VITE_PORT,
    },
  };
});
