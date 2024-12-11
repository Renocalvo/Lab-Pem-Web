// Import createApp dari Vue
import { createApp } from 'vue'

// Import komponen utama App
import App from './App.vue'

// Import konfigurasi router
import router from './router'

// Membuat instance Vue
const app = createApp(App)

// Gunakan router di Vue dengan plugin "use"
app.use(router)

// Mount aplikasi ke elemen dengan id 'app'
app.mount('#app')

