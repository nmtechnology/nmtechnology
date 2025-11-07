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
            <NMLogo variant="landing" size="medium" />
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
            class="relative px-3 py-2 text-sm font-semibold text-white hover:text-green-400 transition-colors duration-200 rounded-md group"
            :class="{ 'text-green-400': isActiveRoute(item.href) }"
          >
            {{ item.name }}
            <span
              class="absolute bottom-0 left-0 w-full h-0.5 bg-green-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-200 origin-left"
            ></span>
            <span
              v-if="isActiveRoute(item.href)"
              class="absolute bottom-0 left-0 w-full h-0.5 bg-green-500"
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
            @click="generateQuote"
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-700/50 text-green-400 ring-1 ring-inset ring-green-600/50 hover:bg-gray-700 hover:ring-green-500 rounded-lg font-semibold text-sm transition-all duration-300 transform hover:scale-105"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
              />
            </svg>
            Get Quote
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
        <!-- Backdrop -->
        <div
          class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm z-40"
          aria-hidden="true"
        />

        <!-- Panel container -->
        <div class="fixed inset-0 z-40 flex justify-end">
          <DialogPanel
            class="relative w-full sm:max-w-sm bg-black px-6 py-6 border-l-4 border-green-600 shadow-2xl overflow-y-auto"
          >
            <div class="flex items-center justify-between mb-6">
              <div class="flex items-center">
                <router-link to="/home" class="relative flex items-center">
                  <NMLogo variant="mobile" size="medium" />
                </router-link>
              </div>
              <button
                type="button"
                class="rounded-md p-2.5 text-white hover:text-green-400 transition-colors duration-200 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500/50"
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

            <div class="mt-2 flow-root">
              <div class="divide-y divide-gray-800/50">
                <div class="space-y-1 py-4">
                  <router-link
                    v-for="item in navigation"
                    :key="item.name"
                    :to="item.href"
                    @click="mobileMenuOpen = false"
                    class="flex items-center px-4 py-3 text-base font-semibold text-white hover:bg-gradient-to-r hover:from-gray-800 hover:to-gray-800/70 hover:text-green-400 transition-all duration-200 rounded-lg border-l-2 border-transparent hover:border-green-600"
                    :class="{
                      'bg-gray-800/50 text-green-400 border-l-2 border-green-600': isActiveRoute(
                        item.href
                      ),
                    }"
                  >
                    <svg
                      v-if="item.name === 'Home'"
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 mr-3"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                      />
                    </svg>
                    <svg
                      v-else-if="item.name === 'CCTV'"
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 mr-3"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
                      />
                    </svg>
                    <svg
                      v-else-if="item.name === 'Security Systems'"
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 mr-3"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                      />
                    </svg>
                    <svg
                      v-else-if="item.name === 'Fire Alarms'"
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 mr-3"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"
                      />
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"
                      />
                    </svg>
                    <svg
                      v-else
                      class="h-5 w-5 mr-3"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"
                      />
                    </svg>
                    {{ item.name }}
                  </router-link>

                  <div class="border-t border-gray-800/50 my-4"></div>

                  <!-- Mobile Action Buttons -->
                  <button
                    @click="
                      openContactModal();
                      mobileMenuOpen = false;
                    "
                    class="w-full flex items-center justify-center gap-2 px-5 py-3 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 text-white rounded-lg font-semibold text-sm shadow-lg shadow-green-500/30 transition-all duration-300 transform hover:scale-[1.02]"
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
                    Contact Us
                  </button>

                  <button
                    @click="
                      generateQuote();
                      mobileMenuOpen = false;
                    "
                    class="w-full flex items-center justify-center gap-2 px-5 py-3 bg-gray-700/50 text-green-400 ring-1 ring-inset ring-green-600/50 hover:bg-gray-700 hover:ring-green-500 rounded-lg font-semibold text-sm transition-all duration-300 transform hover:scale-[1.02]"
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
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                      />
                    </svg>
                    Get Quote
                  </button>

                  <button
                    @click="
                      openApplicationModal();
                      mobileMenuOpen = false;
                    "
                    class="w-full flex items-center justify-center gap-2 px-5 py-3 bg-lime-400 hover:bg-black text-black hover:text-lime-400 rounded-lg font-semibold text-sm shadow-lg shadow-lime-400/30 transition-all duration-300 transform hover:scale-[1.02]"
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
                    Apply Now
                  </button>
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
  { name: "Security Systems", href: "/cctv" },
  { name: "Fire Alarms", href: "/cctv" },
  { name: "Networking", href: "/cctv" },
  { name: "Structured Cabling", href: "/cctv" },
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
      // Navigate to CCTV page for quote generation
      if (route.path !== "/cctv") {
        window.location.href = "/cctv";
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
      cartItemCount,
      openCart,
      openCartAndCloseMenu,
      openContactModal,
      openApplicationModal,
      generateQuote,
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
