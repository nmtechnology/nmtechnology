import './bootstrap'
import { createApp } from 'vue'
import { createRouter, createWebHistory, useRoute } from 'vue-router'
import App from './App.vue'
import HomePage from './views/HomePage.vue'
import LandingPage from './views/LandingPage.vue'
import CcTv from './components/CcTv.vue'
import axios from 'axios'
import { vTouch } from './directives/touch-directive'

const router = createRouter({
  history: createWebHistory(),

  variants: {
    backgroundColor: ['responsive','hover','focus', 'active']
  },

  currentLinkActiveClass: 'active-link',

  routes: [
    { path: '/', name: 'landing', component: LandingPage },
    { path: '/home', name: 'nmtis', component: HomePage },
    { path: '/cctv', name: 'CcTv', component: CcTv },
    { path: '/promo-banner-examples', name: 'PromoBannerExamples', component: () => import('./components/PromoBannerExamples.vue') }
  ],
  
  // Add scrollBehavior function to handle anchor links
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      // Return savedPosition if it exists (browser back/forward navigation)
      return savedPosition;
    } else if (to.hash) {
      // Check if the element exists before scrolling
      const element = document.querySelector(to.hash);
      if (element) {
        return {
          el: to.hash,
          behavior: 'smooth',
          top: 80, // Add offset to account for fixed header
        }
      } else {
        // If element doesn't exist, scroll to top
        console.warn(`Element with selector "${to.hash}" not found in the DOM`);
        return { top: 0 }
      }
    } else {
      // Otherwise scroll to top of the page
      return { top: 0 }
    }
  }
})

export default router

createApp(App).use(router).mount('#app')

const instance = axios.create({
  baseURL: 'http://127.0.0.1:8000/'
})
