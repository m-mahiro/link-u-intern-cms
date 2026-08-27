import vue from '@vitejs/plugin-vue'
import { defineConfig } from 'vite'

// https://vite.dev/config/
export default defineConfig({
  manifest: true,
  rollupOptions: {
    input: 'src/main.js'
  },
  plugins: [vue()],
  server: {
    port: 3000
  }
})
