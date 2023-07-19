import './bootstrap'
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'
import HomePage from './views/HomePage.vue'

const router = createRouter({
  history: createWebHistory(),
  routes: [{ path: '/', name: 'Home', component: HomePage }]
})

createApp(App).use(router).mount('#app')
