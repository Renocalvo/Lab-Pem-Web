// Import axios
import axios from 'axios';

// Membuat instance axios
const Api = axios.create({
  // Samakan dengan URL API Laravel (Modul 5)
  baseURL: 'http://localhost:8000'
});

// Export instance axios
export default Api;
