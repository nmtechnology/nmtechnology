import './bootstrap';
import { createApp } from "vue";
import Footer from "./components/Footer.vue";


const app = createApp(Footer);
app.component("Footer", Footer);

const mountedApp =  app.mount('#app');
