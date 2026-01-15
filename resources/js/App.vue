<template>
  <div>
    <header
      v-if="!isLandingPage"
      class="fixed inset-x-0 top-0 z-50 bg-black backdrop-blur-md border-b border-green-600/30"
    >
      <nav
        class="flex items-center justify-between h-20 p-6 lg:px-8 w-screen max-w-7xl mx-auto"
        aria-label="Global"
      >
        <!-- Logo Section -->
        <div class="flex lg:flex-1 items-center">
          <router-link to="/home" class="relative flex items-center group">
            <NMLogo variant="service" size="large" />
          </router-link>
        </div>
        <!-- Mobile menu button -->
        <div class="flex lg:hidden">
          <button
            type="button"
            class="inline-flex items-center justify-center rounded-md p-2.5 text-green-400 hover:text-green-300 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500 transition-all duration-200"
            @click="mobileMenuOpen = true"
          >
            <span class="sr-only">Open main menu</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 16 16"
              fill="currentColor"
              class="size-5"
            >
              <path
                fill-rule="evenodd"
                d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"
                clip-rule="evenodd"
              />
            </svg>
          </button>
        </div>

        <!-- Desktop navigation links -->
        <div class="hidden lg:flex lg:gap-x-1 gap-x-3">
          <router-link
            v-for="item in navigation.filter((i) => i.name !== 'Home')"
            :key="item.name"
            :to="item.href"
            class="relative px-3 py-2 text-sm font-semibold transition-colors duration-200 rounded-md group"
            :class="getRouteColor(item.href)"
          >
            {{ item.name }}
            <span
              class="absolute bottom-0 left-0 w-full h-0.5 scale-x-0 group-hover:scale-x-100 transition-transform duration-200 origin-left"
              :class="getUnderlineColor(item.href)"
            ></span>
            <span
              v-if="isActiveRoute(item.href)"
              class="absolute bottom-0 left-0 w-full h-0.5"
              :class="getUnderlineColor(item.href)"
            ></span>
          </router-link>
        </div>

        <!-- Desktop Action Buttons -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center gap-3">
          <button
            @click="openContactModal"
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 text-white rounded-lg font-semibold text-sm shadow-lg shadow-green-500/30 transition-all duration-300 transform hover:scale-105"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M13 10V3L4 14h7v7l9-11h-7z"
              />
            </svg>
            Contact Us
          </button>
          <button
            @click="openSecurityFAQsModal"
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-700/50 text-green-400 ring-1 ring-inset ring-green-600/50 hover:bg-gray-700 hover:ring-green-500 rounded-lg font-semibold text-sm transition-all duration-300 transform hover:scale-105"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            Security FAQs
          </button>
        </div>
      </nav>

      <!-- Mobile menu -->
      <Dialog
        as="div"
        class="lg:hidden"
        @close="mobileMenuOpen = false"
        :open="mobileMenuOpen"
      >
        <!-- Enhanced Backdrop with animated blur -->
        <div
          class="fixed inset-0 bg-black/70 backdrop-blur-sm z-40 transition-all duration-300"
          aria-hidden="true"
        />

        <!-- Panel container with slide animation -->
        <div class="fixed inset-0 z-40 flex justify-end">
          <DialogPanel
            class="relative w-full sm:max-w-md bg-gray-900 shadow-2xl overflow-y-auto transform transition-all duration-300 ease-out"
            :class="{
              'translate-x-0': mobileMenuOpen,
              'translate-x-full': !mobileMenuOpen,
            }"
          >
            <!-- Simple border accent -->
            <div class="absolute left-0 top-0 h-full w-0.5 bg-green-500/50"></div>

            <!-- Header Section -->
            <div class="relative px-6 py-6 border-b border-gray-700">
              <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                  <router-link to="/home" class="relative flex items-center group">
                    <NMLogo variant="mobile" size="medium" />
                  </router-link>
                </div>
                <button
                  type="button"
                  class="rounded-full p-3 text-gray-400 hover:text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500/50 transition-all duration-200"
                  @click="mobileMenuOpen = false"
                >
                  <span class="sr-only">Close menu</span>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"
                    />
                  </svg>
                </button>
              </div>

              <!-- Simple tagline -->
              <div class="text-center">
                <p class="text-sm text-gray-400">Professional Security Solutions</p>
              </div>
            </div>

            <!-- Navigation Section (simplified for mobile) -->
            <div class="px-6 py-6">
              <nav class="space-y-2">
                <router-link
                  v-for="(item, index) in navigation"
                  :key="item.name"
                  :to="item.href"
                  @click="mobileMenuOpen = false"
                  class="block px-4 py-3 text-base font-semibold text-gray-300 hover:text-white bg-gray-800/40 rounded-md"
                  :class="{ 'bg-gray-700 text-white': isActiveRoute(item.href) }"
                >
                  {{ item.name }}
                </router-link>

                <div class="mt-4">
                  <button
                    @click="openSecurityFAQsModal(); mobileMenuOpen = false"
                    class="w-full inline-flex items-center justify-center px-4 py-3 bg-red-600 border border-red-700 rounded-md font-medium text-white text-base hover:bg-red-700 hover:text-white transition-all duration-200"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Security FAQs</span>
                  </button>
                </div>
              </nav>

              <!-- Enhanced Action Buttons Section -->
              <div class="mt-8 space-y-3">
                <!-- Contact Button -->
                <button
                  @click="
                    openContactModal();
                    mobileMenuOpen = false;
                  "
                  class="w-full group flex items-center justify-center gap-3 px-6 py-4 bg-green-600 hover:bg-green-500 text-white rounded-lg font-semibold text-sm shadow-lg transition-all duration-200 transform hover:scale-[1.02]"
                >
                  <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M13 10V3L4 14h7v7l9-11h-7z"
                    />
                  </svg>
                  <span>Get Expert Consultation</span>
                </button>

                <!-- Quote Button -->
                <button
                  @click="
                    generateQuote();
                    mobileMenuOpen = false;
                  "
                  class="w-full group flex items-center justify-center gap-3 px-6 py-4 bg-gray-700 hover:bg-gray-600 text-gray-200 hover:text-white border border-gray-600 hover:border-gray-500 rounded-lg font-semibold text-sm transition-all duration-200"
                >
                  <svg
                    class="w-5 h-5 text-gray-300"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                    />
                  </svg>
                  <span>Request Quote</span>
                </button>

                <!-- Apply Now Button -->
                <button
                  @click="
                    openApplicationModal();
                    mobileMenuOpen = false;
                  "
                  class="w-full group flex items-center justify-center gap-3 px-6 py-4 bg-lime-400 hover:bg-lime-300 text-black rounded-lg font-semibold text-sm shadow-lg transition-all duration-200 transform hover:scale-[1.02]"
                >
                  <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 01-2 2H10a2 2 0 01-2-2V6m8 0H8m0 10h8a2 2 0 002-2V8a2 2 0 00-2-2H8a2 2 0 00-2 2v6a2 2 0 002 2z"
                    />
                  </svg>
                  <span>Join Our Team</span>
                </button>
              </div>

              <!-- Footer Section -->
              <div class="mt-8 pt-6 border-t border-gray-700">
                <div class="flex items-center justify-center space-x-4">
                  <div class="flex items-center gap-2 text-sm text-gray-400">
                    <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                    <span>Professional Excellence Since 2018</span>
                  </div>
                </div>
              </div>
            </div>
          </DialogPanel>
        </div>
      </Dialog>
    </header>
  </div>

  <!-- Floating cart button - only visible when not on landing page -->
  <div v-if="!isLandingPage" class="fixed bottom-6 right-6 z-50">
    <button
      @click="openCart"
      class="flex items-center justify-center h-14 w-14 rounded-full bg-gray-900 hover:bg-gray-800 text-green-500 hover:text-green-400 shadow-lg transition-all duration-300 hover:scale-110 border-2 border-green-600/40 hover:border-green-500"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
        />
      </svg>
      <transition name="cart-badge">
        <span
          v-if="cartItemCount > 0"
          class="cart-badge absolute -top-2 -right-2 bg-red-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center shadow-md"
          >{{ cartItemCount }}</span
        >
      </transition>
    </button>
  </div>

  <!-- Survey Banner -->
  <SurveyBanner v-if="!isLandingPage" />

  <router-view></router-view>

  <!-- Toast notifications container -->
  <ToastContainer />

  <!-- Global Quote Cart Modal -->
  <CartModal />

  <!-- Contact Modal -->
  <ContactModal ref="contactModalRef" />

  <!-- Application Modal -->
  <ApplicationModal ref="applicationModalRef" />

  <!-- Security FAQs Modal (opened from navbar) -->
  <SecurityFAQsModal ref="securityFaqsRef" />
</template>

<script>
import { ref, computed, provide } from "vue";
import { Dialog, DialogPanel, TransitionChild } from "@headlessui/vue";
import { useRoute } from "vue-router";
import ToastContainer from "./components/ToastContainer.vue";
import CartModal from "./components/CartModal.vue";
import ContactModal from "./components/ContactModal.vue";
import ApplicationModal from "./components/ApplicationModal.vue";
import SecurityFAQsModal from "./components/SecurityFAQsModal.vue";
import NMLogo from "./components/NMLogo.vue";
import SurveyBanner from "./components/SurveyBanner.vue";
import { cartStore } from "./store/cartStore.js";

// Navigation array for mobile menu
const navigation = [
  { name: "Home", href: "/home" },
  { name: "CCTV", href: "/cctv" },
  { name: "Security Systems", href: "/security-alarms" },
  { name: "Fire Alarms", href: "/fire-alarms" },
  { name: "Networks", href: "/networking" },
  { name: "Access Control", href: "/access-control" },
];

export default {
  components: {
    ToastContainer,
    CartModal,
    ContactModal,
    ApplicationModal,
    SecurityFAQsModal,
    NMLogo,
    SurveyBanner,
    Dialog,
    DialogPanel,
    TransitionChild,
  },
  setup() {
    const route = useRoute();
    const mobileMenuOpen = ref(false);
    const contactModalRef = ref(null);
    const applicationModalRef = ref(null);
    const cartItemCount = computed(() => cartStore.getItemCount.value);

    // Check if current route is the landing page
    const isLandingPage = computed(() => {
      return route.name === "landing";
    });

    // Check if a route is active (either exact match or starts with)
    const isActiveRoute = (path) => {
      // Remove hash part from both paths for comparison
      const routePath = route.path.split("#")[0];
      const comparePath = path.split("#")[0];

      if (routePath === comparePath) return true;
      if (comparePath !== "/home" && routePath.startsWith(comparePath)) return true;
      return false;
    };

    // Get color class based on current route
    const getRouteColor = (path) => {
      const routePath = route.path.split("#")[0];
      const comparePath = path.split("#")[0];
      const isActive = routePath === comparePath || (comparePath !== "/home" && routePath.startsWith(comparePath));

      if (comparePath === '/cctv') {
        return isActive ? 'text-cyan-400' : 'text-white';
      }
      if (comparePath === '/security-alarms') {
        return isActive ? 'text-green-400' : 'text-white';
      }
      if (comparePath === '/fire-alarms') {
        return isActive ? 'text-red-400' : 'text-white';
      }
      if (comparePath === '/networking') {
        return isActive ? 'text-purple-400' : 'text-white ';
      }
      if (comparePath === '/access-control') {
        return isActive ? 'text-orange-400' : 'text-white ';
      }
      return isActive ? 'text-green-400' : 'text-white';
    };

    // Get underline color class based on route
    const getUnderlineColor = (path) => {
      const comparePath = path.split("#")[0];
      
      if (comparePath === '/cctv') return 'bg-cyan-500';
      if (comparePath === '/security-alarms') return 'bg-green-500';
      if (comparePath === '/fire-alarms') return 'bg-red-500';
      if (comparePath === '/networking') return 'bg-purple-500';
      if (comparePath === '/access-control') return 'bg-orange-500';
      return 'bg-green-500';
    };

    // Check if current route matches exactly
    const isRouteActive = (path) => {
      return route.path === path;
    };

    const openCart = () => {
      cartStore.openCart();
    };

    const openCartAndCloseMenu = () => {
      cartStore.openCart();
      mobileMenuOpen.value = false;
    };

    const openContactModal = () => {
      if (contactModalRef.value) {
        contactModalRef.value.openModal();
      }
    };

    const openApplicationModal = () => {
      if (applicationModalRef.value) {
        applicationModalRef.value.openModalFromOptions();
      }
    };

    const generateQuote = () => {
      // Keep for backward compat - navigate to Products page for quote generation
      if (route.path !== "/products") {
        window.location.href = "/products";
      }
    };

    // Security FAQs modal control
    const securityFaqsRef = ref(null);
    const openSecurityFAQsModal = () => {
      if (securityFaqsRef.value) {
        securityFaqsRef.value.openModal();
      }
    };

    // Provide openContactModal to child components
    provide("openContactModal", openContactModal);
    provide("openApplicationModal", openApplicationModal);

    return {
      navigation,
      mobileMenuOpen,
      contactModalRef,
      applicationModalRef,
      securityFaqsRef,
      cartItemCount,
      openCart,
      openCartAndCloseMenu,
      openContactModal,
      openApplicationModal,
      generateQuote,
      openSecurityFAQsModal,
      isLandingPage,
      isActiveRoute,
      getRouteColor,
      getUnderlineColor,
      isRouteActive,
      openApplicationModal,
      generateQuote,
      openSecurityFAQsModal,
      isLandingPage,
      isActiveRoute,
      isRouteActive,
    };
  },
};
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
  box-shadow: 0 4px 10px -1px rgba(0, 0, 0, 0.2), 0 2px 6px -1px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(8px);
}

header::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(
    to right,
    rgba(22, 163, 74, 0),
    rgba(22, 163, 74, 0.5),
    rgba(22, 163, 74, 0)
  );
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

/* Floating cart button styling */
.fixed.bottom-6.right-6 button {
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25), 0 0 0 rgba(22, 163, 74, 0);
  transform-origin: center;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.fixed.bottom-6.right-6 button:hover {
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.35), 0 0 15px rgba(22, 163, 74, 0.3);
}

.fixed.bottom-6.right-6 button:active {
  transform: scale(0.95);
}

/* Active navigation link styling */
.router-link-active.text-green-400 .absolute.bottom-0 {
  transform: scaleX(1);
}

/* Mobile menu transition */
.dialog-enter-active,
.dialog-leave-active {
  transition: opacity 0.3s ease, transform 0.3s ease;
}

.dialog-enter-from,
.dialog-leave-to {
  opacity: 0;
  transform: translateX(20px);
}

@media (max-width: 640px) {
  .fixed.bottom-6.right-6 {
    bottom: 1rem;
    right: 1rem;
  }

  .fixed.bottom-6.right-6 button {
    height: 3rem;
    width: 3rem;
  }
}
</style>
