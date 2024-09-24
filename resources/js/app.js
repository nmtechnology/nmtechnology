import './bootstrap'
import { createApp } from 'vue'
import { createRouter, createWebHistory, useRoute } from 'vue-router'
import App from './App.vue'
import HomePage from './views/HomePage.vue'
import CcTv from './components/CcTv.vue'
import axios from 'axios'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', name: 'home', component: HomePage },
    { path: '/cctv', name: 'cctv', component: CcTv }
  ]
})

export default router

createApp(App).use(router).mount('#app')

const instance = axios.create({
  baseURL: 'http://127.0.0.1:8000/'
})
