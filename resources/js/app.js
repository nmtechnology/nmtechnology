import './bootstrap';
import { createApp } from "vue";
import HomePage from "./components/HomePage.vue";

const app = createApp(HomePage);
const mountedApp =  app.mount('#app');
