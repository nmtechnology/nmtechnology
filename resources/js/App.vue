<template>
  <div>
    <header class="fixed inset-x-0 top-0 h-20 bg-gray-900 z-30">
      <nav class="flex items-center justify-between p-6 lg:px-8 w-screen" aria-label="Global">
        <div class="flex lg:flex-1 items-center">
          <router-link to="/" class="relative flex items-center">
            <img class="h-10 w-auto mr-2" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo">
            <span class="italic text-lg font-extrabold text-white -ml-5">Technology</span>
          </router-link>
        </div>
      
        <!-- Mobile menu button -->
        <div class="flex lg:hidden">
          <button type="button" 
              class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-green-400"
              @click="mobileMenuOpen = true">
            <span class="sr-only">Open main menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
              <path fillRule="evenodd" d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clipRule="evenodd" />
            </svg>
          </button>
        </div>
        
        <!-- Desktop navigation links -->
        <div class="hidden lg:flex lg:gap-x-5 gap-x-10">
          <router-link to="/cctv" class="nav-item text-sm font-semibold leading-6 text-white hover:text-green-400 active:text-green-400 rounded-sm">
            CCTV
          </router-link>
          <router-link to="/cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">
            Security Systems
          </router-link>
          <router-link to="/cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">
            Fire Alarms
          </router-link>
          <router-link to="/cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">
            Networking
          </router-link>
          <router-link to="/cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">
            Structured Cabling
          </router-link>
        </div>
        
        <!-- Desktop cart and login buttons -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center">
          <button @click="openCart" class="mr-4 text-white hover:text-green-400 relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <transition name="cart-badge">
              <span v-if="cartItemCount > 0" class="cart-badge absolute -top-2 -right-2 bg-red-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">{{ cartItemCount }}</span>
            </transition>
          </button>
          <a href="#" class="text-sm font-semibold leading-6 text-white">Log in <span aria-hidden="true">&rarr;</span></a>
        </div>
      </nav>
      
      <!-- Mobile menu -->
      <Dialog class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
        <div class="fixed inset-0 z-30 bg-gray-900/80" />
        <DialogPanel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-800/10 shadow-xl">
          <div class="flex items-center justify-between">
            <router-link to="/" class="md:box-border h-16 max-w-32 size-full fixed mx-5 z-30">
              <img class="md:box-border h-16 max-w-16 size-full flex-initial fixed mx-5 z-30" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo">
            </router-link>
            <router-link to="/" class="italic text-lg font-extrabold leading-6 text-white flex-initial mx-36 mr10 lg:mt-5 md:mt-5 sm:mt-5 mt-5 z-40">
              Technology
            </router-link>
            <button type="button" class="-m-2.5 rounded-md p-2.5 text-white hover:text-green-400" @click="mobileMenuOpen = false">
              <span class="sr-only">Close menu</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          
          <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-700">
              <div class="space-y-2 py-6">
                <router-link v-for="item in navigation" :key="item.name" :to="item.href" @click="mobileMenuOpen = false" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800 hover:text-green-400 transition-colors">
                  {{ item.name }}
                </router-link>
                
                <!-- Mobile cart button -->
                <button @click="openCartAndCloseMenu" class="flex items-center -mx-3 rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800 hover:text-green-400 transition-colors w-full">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  Cart
                  <transition name="cart-badge">
                    <span v-if="cartItemCount > 0" class="ml-2 bg-red-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">{{ cartItemCount }}</span>
                  </transition>
                </button>
              </div>
            </div>
          </div>
        </DialogPanel>
      </Dialog>
    </header>
  </div>
  
  <router-view></router-view>
  
  <!-- Toast notifications container -->
  <ToastContainer />
  
  <!-- Global Cart Modal -->
  <CartModal />
</template>

<script>
import { ref, computed } from 'vue'
import { Dialog, DialogPanel } from '@headlessui/vue'
import ToastContainer from './components/ToastContainer.vue'
import CartModal from './components/CartModal.vue'
import { cartStore } from './store/cartStore.js'

// Navigation array for mobile menu
const navigation = [
  { name: 'CCTV', href: '/cctv' },
  { name: 'Security Systems', href: '/cctv' },
  { name: 'Fire Alarms', href: '/cctv' },
  { name: 'Networking', href: '/cctv' },
  { name: 'Structured Cabling', href: '/cctv' }
]

export default {
  components: {
    ToastContainer,
    CartModal,
    Dialog,
    DialogPanel
  },
  setup() {
    const mobileMenuOpen = ref(false);
    const cartItemCount = computed(() => cartStore.getItemCount.value);
    
    const openCart = () => {
      cartStore.openCart();
    };
    
    const openCartAndCloseMenu = () => {
      cartStore.openCart();
      mobileMenuOpen.value = false;
    };
    
    return {
      navigation,
      mobileMenuOpen,
      cartItemCount,
      openCart,
      openCartAndCloseMenu
    };
  }
}
</script>

<style>
@media (min-width: 2560px) {
  #navbar {
    width: 100%;
    height: 60px;
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
  }
}

@media (min-width: 322px) {
  #mobile-nav {
    display: none;
  }
}

/* Additional navbar styling */
header {
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

/* Ensure router-view has proper margin */
#app > div + router-view {
  padding-top: 80px;
}

/* Cart badge animation */
.cart-badge-enter-active {
  animation: bounce-in 0.5s;
}

.cart-badge-leave-active {
  animation: bounce-in 0.5s reverse;
}

@keyframes bounce-in {
  0% {
    transform: scale(0);
    opacity: 0;
  }
  50% {
    transform: scale(1.25);
    opacity: 1;
  }
  100% {
    transform: scale(1);
  }
}

/* Cart badge pulse animation when adding items */
@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.35);
    background-color: #ef4444; /* Brighter red flash */
  }
  100% {
    transform: scale(1);
  }
}

.cart-badge-pulse {
  animation: pulse 0.6s cubic-bezier(0.4, 0, 0.6, 1);
}

/* Add responsiveness to cart modal for mobile */
@media (max-width: 640px) {
  .cart-modal-mobile {
    padding: 0.5rem !important;
  }
  
  .cart-modal-mobile-content {
    max-width: 100% !important;
    margin: 0 !important;
  }
}
</style>
