import './bootstrap'
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'
import HomePage from './views/HomePage.vue'
import axios from 'axios'

const router = createRouter({
  history: createWebHistory(),
  routes: [{ path: '/', name: 'Home', component: HomePage }]
})

createApp(App).use(router).mount('#app')

const instance = axios.create({
  baseURL: 'http://127.0.0.1:8000/'
})

// eslint-disable-next-line no-undef
App.config.globalProperties.axios = instance
