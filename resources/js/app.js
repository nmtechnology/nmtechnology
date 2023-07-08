import './bootstrap';
import { createApp } from "vue";
import HomePage from "./components/HomePage.vue";

let app = createApp(HomePage);
const mountedApp =  app.mount('#app');
