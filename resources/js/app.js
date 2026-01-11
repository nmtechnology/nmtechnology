import './bootstrap'
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'
import HomePage from './views/HomePage.vue'
import LandingPage from './views/LandingPage.vue'
import CcTv from './components/CcTv.vue'
import axios from 'axios'
import { vTouch } from './directives/touch-directive'
import descope, { getSdk } from '@descope/vue-sdk'

const router = createRouter({
  history: createWebHistory(),

  variants: {
    backgroundColor: ['responsive','hover','focus', 'active']
  },

  currentLinkActiveClass: 'active-link',

  routes: [
    { path: '/', name: 'landing', component: LandingPage },
    { path: '/home', name: 'nmtis', component: HomePage },
    { path: '/products', name: 'Products', component: CcTv },
    { path: '/learn', name: 'LearnCenter', component: () => import('./views/LearnCenter.vue') },
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

// Create app instance
const app = createApp(App)

// Register the touch directive globally
app.directive('touch', vTouch)

// Initialize Descope (if configured) and mount the app
if (import.meta.env.VITE_DESCOPE_PROJECT_ID) {
  app.use(descope, { projectId: import.meta.env.VITE_DESCOPE_PROJECT_ID })
  // Optional: expose SDK via global for quick usage in dev
  // const sdk = getSdk()
}

// Mount the app
app.use(router).mount('#app')

const instance = axios.create({
  baseURL: 'http://127.0.0.1:8000/'
})

let visitorVerified = false;

// Call this after successful math verification
function startVisitorSession() {
  visitorVerified = true;
  logAction('LandingPage', 'Math verified');
}

function logAction(page, details = '') {
  if (!visitorVerified) return;
  fetch('/api/log-action', {
    method: 'POST',
    credentials: 'same-origin',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ page, details })
  });
}

// Track route changes (page visits)
router.afterEach((to) => {
  logAction(to.name || to.path, 'Page visited');
});

// Track tab/window close or navigation away
window.addEventListener('beforeunload', () => {
  if (visitorVerified) {
    navigator.sendBeacon('/api/left-site');
  }
});

// Example: call startVisitorSession after math verification
// In your math verification logic:
// if (verificationSuccess) startVisitorSession();
