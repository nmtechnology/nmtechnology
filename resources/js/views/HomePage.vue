<template>
  <div class="site-wrapper">
    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-gray-900 border-b border-green-600/30">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
          <!-- Logo Section - Matching quote route style -->
          <div class="flex lg:flex-1 items-center">
            <router-link to="/home" class="relative flex items-center group">
              <img
                class="h-10 w-auto mr-2 transition-transform duration-300 group-hover:scale-105"
                src="/public/images/nm-logo-rmbg.webp"
                alt="nmtechnology-logo"
              />
              <span
                class="italic text-lg font-extrabold text-white -ml-5 transition-colors duration-300 group-hover:text-green-400"
                >Technology</span
              >
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
              class="flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-500 text-white rounded-lg transition-all duration-300 transform hover:scale-105 font-semibold text-sm"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                />
              </svg>
              Contact Us
            </button>
            <button
              @click="generateQuote"
              class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition-all duration-300 transform hover:scale-105 font-semibold text-sm"
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
        </div>
      </div>
    </nav>

    <!-- Mobile menu -->
    <div
      v-if="mobileMenuOpen"
      class="lg:hidden fixed inset-0 z-50"
      @click.self="mobileMenuOpen = false"
    >
      <div class="fixed inset-0 bg-gray-900/80" @click="mobileMenuOpen = false" />
      <div
        class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 px-6 py-6 sm:max-w-sm border-l-4 border-green-600 shadow-2xl"
      >
        <div class="flex items-center justify-between mb-6">
          <router-link to="/home" class="relative flex items-center">
            <img
              class="h-10 w-auto mr-2"
              src="/public/images/nm-logo-rmbg.webp"
              alt="nmtechnology-logo"
            />
            <span class="italic text-lg font-extrabold text-white -ml-1">Technology</span>
          </router-link>
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
                {{ item.name }}
              </router-link>
            </div>

            <!-- Mobile Action Buttons -->
            <div class="space-y-3 py-6">
              <button
                @click="
                  openContactModal();
                  mobileMenuOpen = false;
                "
                class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-green-600 hover:bg-green-500 text-white rounded-lg transition-all duration-300 font-semibold text-sm"
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
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                  />
                </svg>
                Contact Us
              </button>
              <button
                @click="
                  generateQuote();
                  mobileMenuOpen = false;
                "
                class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition-all duration-300 font-semibold text-sm"
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
            </div>
          </div>
        </div>
      </div>
    </div>

    <DesertParallax v-if="!isVerySmallScreen" class="fixed-parallax" />
    <!-- Single TopBanner instance - positioning handled inside component to avoid class conflicts -->
    <TopBanner v-show="showFixedBanner" />

    <!-- Main Content Starts -->
    <main class="site-content">
      <!-- Hero Section with Modern Design -->
      <section
        class="hero-section relative flex flex-col items-center justify-center min-h-screen w-full z-10 text-center px-4 py-10 sm:py-16 md:py-24"
      >
        <!-- Animated background grid -->
        <div class="absolute inset-0 -z-10">
          <svg
            class="absolute inset-0 h-full w-full stroke-green-500/5"
            aria-hidden="true"
          >
            <defs>
              <pattern
                id="hero-grid"
                width="40"
                height="40"
                patternUnits="userSpaceOnUse"
              >
                <path d="M0 40V.5H40" fill="none" stroke-width="0.5" />
              </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#hero-grid)" />
          </svg>
        </div>

        <div class="max-w-5xl mx-auto mt-24 sm:mt-32 md:mt-40">
          <!-- Modern Badge -->
          <div
            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-purple-500-500/10 border border-blue-500/20 mb-6 animate-fadeIn"
          >
            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
              <path
                fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd"
              />
            </svg>
            <span
              class="text-xs sm:text-sm font-semibold text-green-400 tracking-wide uppercase"
              >Trusted in New Mexico</span
            >
          </div>

          <h1
            class="tracking-tight text-gray-100 mb-6 sm:mb-8 text-3xl sm:text-4xl font-extrabold leading-tight sm:leading-none md:text-5xl lg:text-6xl animate-fadeIn"
          >
            Albuquerque's Trusted
            <span class="text-green-400 block mt-2">Commercial CCTV & Security</span>
            <span class="text-white block mt-2">Installation Experts</span>
          </h1>

          <p
            class="text-base sm:text-lg font-normal text-gray-300 lg:text-xl animate-fadeIn-delay max-w-4xl mx-auto px-1 sm:px-4 leading-relaxed"
          >
            Professional
            <strong class="text-green-400">CCTV installation & design</strong>, security
            systems, and integrated technology solutions for businesses and homes
            throughout New Mexico. Expert low voltage installation, ongoing maintenance,
            and rapid support to protect your assets.
          </p>

          <!-- Modern CTA Buttons -->
          <div
            class="mt-10 sm:mt-12 flex flex-col sm:flex-row items-center justify-center gap-4 w-full relative z-20 px-2"
          >
            <button
              @click="openContactModal"
              class="group w-full sm:w-auto text-sm sm:text-base font-semibold px-8 py-4 bg-green-600 hover:bg-green-500 text-white rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center gap-2"
            >
              <svg
                class="w-5 h-5 group-hover:rotate-12 transition-transform"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                />
              </svg>
              Contact Us Today
            </button>
            <button
              @click="generateQuote"
              class="group w-full sm:w-auto text-sm sm:text-base font-semibold px-8 py-4 bg-gray-800 hover:bg-gray-700 border-2 border-blue-500 text-blue-400 hover:text-blue-300 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center gap-2"
            >
              <svg
                class="w-5 h-5 group-hover:translate-x-1 transition-transform"
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
              Get Free Quote
            </button>
          </div>
        </div>

        <!-- Modern Product Showcase -->
        <div class="hero-footer absolute bottom-0 left-0 right-0 py-6 sm:py-10 z-10">
          <div class="flex flex-wrap justify-center gap-4 sm:gap-6 md:gap-8">
            <div class="group">
              <img
                src="/public/images/google-doorbellcam.webp"
                alt="Smart Doorbell"
                class="h-24 w-24 sm:h-28 sm:w-28 md:h-36 md:w-36 object-cover rounded-xl shadow-xl border-2 border-gray-700 group-hover:border-green-500 group-hover:scale-105 transition-all duration-300"
              />
            </div>
            <div class="group">
              <img
                src="/public/images/security-cam-1.webp"
                alt="Security Camera"
                class="h-24 w-24 sm:h-28 sm:w-28 md:h-36 md:w-36 object-cover rounded-xl shadow-xl border-2 border-gray-700 group-hover:border-blue-500 group-hover:scale-105 transition-all duration-300"
              />
            </div>
            <div class="group">
              <img
                src="/public/images/smart-access-control.webp"
                alt="Access Control"
                class="h-24 w-24 sm:h-28 sm:w-28 md:h-36 md:w-36 object-cover rounded-xl shadow-xl border-2 border-gray-700 group-hover:border-green-500 group-hover:scale-105 transition-all duration-300"
              />
            </div>
          </div>
        </div>
      </section>

      <!-- Elegant wave transition to next section (improved for all screen sizes) -->
      <div class="wave-transition wave-transition--gradient">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave-svg">
          <path
            fill="#111827"
            fill-opacity="1"
            d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,208C672,213,768,203,864,170.7C960,139,1056,85,1152,80C1248,75,1344,117,1392,138.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
          ></path>
        </svg>
        <div class="wave-gradient-overlay"></div>
      </div>

      <!-- Services Section -->
      <section class="security-section" ref="serviceSection" id="services">
        <div class="security-container">
          <div class="security-badge">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="w-4 h-4"
            >
              <path
                d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 2.18l7 3.12v4.7c0 4.67-2.88 8.76-7 10.13-4.12-1.37-7-5.46-7-10.13v-4.7l7-3.12z"
              />
            </svg>
            Our Security Solutions
          </div>
          <div class="security-card">
            <SectionService />
          </div>
        </div>
      </section>

      <!-- Product Showcase -->
      <section class="security-section dark" ref="productSection" id="products">
        <div class="security-container">
          <div class="security-badge">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="w-4 h-4"
            >
              <path
                d="M12 16.5l4-4h-3v-9h-2v9H8l4 4zm9-13h-6v1.99h6v14.03H3V5.49h6V3.5H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2v-14c0-1.1-.9-2-2-2z"
              />
            </svg>
            Featured Products
          </div>
          <div class="security-card featured">
            <BlackGradient />
          </div>
        </div>
      </section>

      <!-- Partners & Certifications -->
      <section class="security-section" ref="trustedTeamsSection" id="partners">
        <div class="security-container">
          <div class="security-badge">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="w-4 h-4"
            >
              <path
                d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm4.24 16L12 15.45 7.77 18l1.12-4.81-3.73-3.23 4.92-.42L12 5l1.92 4.53 4.92.42-3.73 3.23L16.23 18z"
              />
            </svg>
            Trusted Partners
          </div>
          <div class="security-card">
            <TrustedTeams />
          </div>
        </div>
      </section>

      <!-- Modern Divider -->
      <div class="modern-divider">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave-svg">
          <path
            fill="#111827"
            fill-opacity="1"
            d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,90.7C672,85,768,107,864,122.7C960,139,1056,149,1152,144C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
          ></path>
        </svg>
      </div>

      <!-- Commercial Solutions -->
      <section class="security-section dark" ref="section1" id="commercial">
        <div class="security-container">
          <div class="security-badge">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="w-4 h-4"
            >
              <path
                d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"
              />
            </svg>
            Commercial Security
          </div>
          <div class="security-card">
            <SectionOne />
          </div>
        </div>
      </section>

      <!-- Pricing & Packages -->
      <section class="security-section" ref="pricingSection" id="pricing">
        <div class="security-container">
          <div class="security-badge">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="w-4 h-4"
            >
              <path
                d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"
              />
            </svg>
            Packages & Pricing
          </div>
          <div class="security-card featured">
            <Pricing />
          </div>
        </div>
      </section>

      <!-- Footer with Security Focus -->
      <div
        class="bg-gradient-to-b from-gray-900 to-gray-950 border-t border-green-600/10"
      >
        <HomeFooter />
      </div>
    </main>

    <!-- Modals -->
    <ContactModal ref="contactModalRef" />
  </div>
</template>

<script setup>
import SectionService from "../components/SectionService.vue";
import SectionOne from "../components/SectionOne.vue";
import DesertParallax from "../components/DesertParallax.vue";
import BlackGradient from "../components/BlackGradient.vue";
import HomeFooter from "../components/HomeFooter.vue";
import TopBanner from "../components/TopBanner.vue";
import MobileMenu from "../components/MobileMenu.vue";
import Pricing from "../components/Pricing.vue";
import TrustedTeams from "../components/TrustedTeams.vue";
import ContactModal from "../components/ContactModal.vue";
import { ref, onMounted, onUnmounted, computed, provide } from "vue";
import { useRouter } from "vue-router";

const contactModalRef = ref(null);
const router = useRouter();
const mobileMenuOpen = ref(false);

// Navigation items
const navigation = [
  { name: "Home", href: "/home" },
  { name: "CCTV", href: "/cctv" },
  { name: "Security Systems", href: "/cctv" },
  { name: "Fire Alarms", href: "/cctv" },
  { name: "Networking", href: "/cctv" },
  { name: "Structured Cabling", href: "/cctv" },
];

const openContactModal = () => {
  if (contactModalRef.value) {
    contactModalRef.value.openModalFromOptions();
  }
};

// Provide the openContactModal function to child components
provide("openContactModal", openContactModal);
const generateQuote = () => {
  router.push("/cctv");
};

// Check if route is active
const isActiveRoute = (href) => {
  return router.currentRoute.value.path === href;
};

const showFixedBanner = ref(false);
const isMobile = ref(false);
const isVerySmallScreen = ref(false);
const checkMobile = () => {
  isMobile.value = window.innerWidth < 640;
  isVerySmallScreen.value = window.innerWidth < 280;
};
const handleScroll = () => {
  showFixedBanner.value = window.scrollY > window.innerHeight * 0.45;
};
onMounted(() => {
  window.addEventListener("scroll", handleScroll);
  window.addEventListener("resize", checkMobile);
  checkMobile();
});
onUnmounted(() => {
  window.removeEventListener("scroll", handleScroll);
  window.removeEventListener("resize", checkMobile);
});
</script>

<style scoped>
.site-wrapper {
  position: relative;
  overflow-x: hidden;
  min-height: 100vh;
  background: #0a0f1a;
}

/* Modern Glowing Orb Background Effects */
.site-wrapper::before {
  content: "";
  position: fixed;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(
      circle at 20% 20%,
      rgba(74, 222, 128, 0.08) 0%,
      transparent 25%
    ),
    radial-gradient(circle at 80% 80%, rgba(34, 197, 94, 0.06) 0%, transparent 25%),
    radial-gradient(circle at 50% 50%, rgba(16, 185, 129, 0.04) 0%, transparent 30%);
  animation: orbitGlow 30s ease-in-out infinite;
  z-index: 1;
  pointer-events: none;
  filter: blur(60px);
}

@keyframes orbitGlow {
  0%,
  100% {
    transform: translate(0, 0) rotate(0deg);
    opacity: 0.4;
  }
  33% {
    transform: translate(5%, -5%) rotate(120deg);
    opacity: 0.6;
  }
  66% {
    transform: translate(-5%, 5%) rotate(240deg);
    opacity: 0.5;
  }
}

/* Mesh Gradient Overlay */
.site-wrapper::after {
  content: "";
  position: fixed;
  inset: 0;
  background: linear-gradient(
      135deg,
      transparent 0%,
      rgba(74, 222, 128, 0.02) 50%,
      transparent 100%
    ),
    linear-gradient(
      225deg,
      transparent 0%,
      rgba(34, 197, 94, 0.015) 50%,
      transparent 100%
    );
  z-index: 1;
  pointer-events: none;
  animation: meshShift 20s ease-in-out infinite alternate;
}

@keyframes meshShift {
  0% {
    opacity: 0.3;
  }
  100% {
    opacity: 0.7;
  }
}

.site-content {
  position: relative;
  z-index: 10;
}

/* Enhanced Desert Parallax Background */
.fixed-parallax {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  z-index: 0;
  opacity: 0.25;
  filter: brightness(0.7) contrast(1.1);
  transition: opacity 0.5s ease;
}

.fixed-parallax::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to bottom,
    rgba(10, 15, 26, 0.4) 0%,
    rgba(15, 23, 42, 0.7) 50%,
    rgba(10, 15, 26, 0.9) 100%
  );
  z-index: 1;
  pointer-events: none;
}

.fixed-parallax::after {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(
      circle at 20% 30%,
      rgba(74, 222, 128, 0.03) 0%,
      transparent 40%
    ),
    radial-gradient(circle at 80% 70%, rgba(34, 197, 94, 0.02) 0%, transparent 40%);
  z-index: 2;
  pointer-events: none;
  animation: parallaxGlow 15s ease-in-out infinite alternate;
}

@keyframes parallaxGlow {
  0% {
    opacity: 0.3;
  }
  100% {
    opacity: 0.6;
  }
}

/* Enhanced Security Hero Section with Modern Glow */
.hero-section {
  position: relative;
  min-height: 90vh;
  padding: 8rem 0 6rem;
  overflow: hidden;
  background: radial-gradient(
      ellipse at 30% 20%,
      rgba(74, 222, 128, 0.12) 0%,
      transparent 40%
    ),
    radial-gradient(ellipse at 70% 80%, rgba(34, 197, 94, 0.08) 0%, transparent 40%),
    radial-gradient(circle at 50% 0%, rgba(16, 185, 129, 0.06) 0%, transparent 50%),
    linear-gradient(180deg, rgba(10, 15, 26, 0.2) 0%, rgba(15, 23, 42, 0.7) 100%);
  animation: heroGlow 10s ease-in-out infinite alternate;
  backdrop-filter: blur(0.5px);
}

/* Floating light particles effect */
.hero-section::after {
  content: "";
  position: absolute;
  inset: 0;
  background-image: radial-gradient(circle, rgba(74, 222, 128, 0.4) 1px, transparent 1px),
    radial-gradient(circle, rgba(34, 197, 94, 0.3) 1px, transparent 1px);
  background-size: 50px 50px, 80px 80px;
  background-position: 0 0, 40px 40px;
  opacity: 0.1;
  animation: particleFloat 40s linear infinite;
  pointer-events: none;
}

@keyframes particleFloat {
  0% {
    transform: translateY(0);
  }
  100% {
    transform: translateY(-100px);
  }
}

@keyframes heroGlow {
  0% {
    background-position: 0% 0%, 100% 100%;
  }
  100% {
    background-position: 100% 100%, 0% 0%;
  }
}

.hero-section::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 2px;
  background: linear-gradient(
    90deg,
    transparent,
    rgba(74, 222, 128, 0.5) 30%,
    rgba(74, 222, 128, 0.8) 50%,
    rgba(74, 222, 128, 0.5) 70%,
    transparent
  );
  box-shadow: 0 0 20px rgba(74, 222, 128, 0.3);
  animation: lineShimmer 3s ease-in-out infinite;
}

@keyframes lineShimmer {
  0%,
  100% {
    opacity: 0.5;
  }
  50% {
    opacity: 1;
  }
}

/* Enhanced Security Section Styling */
.security-section {
  position: relative;
  padding: 6rem 1.5rem;
  background: linear-gradient(
    165deg,
    rgba(15, 23, 42, 0.95) 0%,
    rgba(17, 24, 39, 0.95) 100%
  );
  overflow: hidden;
  border-bottom: 1px solid rgba(74, 222, 128, 0.1);
}

.security-section::before {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(
      ellipse 900px 700px at 120% 50%,
      rgba(74, 222, 128, 0.1) 0%,
      transparent 50%
    ),
    radial-gradient(
      ellipse 700px 900px at -20% 50%,
      rgba(34, 197, 94, 0.08) 0%,
      transparent 50%
    ),
    radial-gradient(circle 500px at 50% 0%, rgba(16, 185, 129, 0.05) 0%, transparent 50%);
  pointer-events: none;
  animation: sectionGlow 15s ease-in-out infinite alternate;
  filter: blur(50px);
  z-index: 0;
}

/* Security Grid Pattern Overlay */
.security-section::after {
  content: "";
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(74, 222, 128, 0.02) 1px, transparent 1px),
    linear-gradient(90deg, rgba(74, 222, 128, 0.02) 1px, transparent 1px);
  background-size: 50px 50px;
  pointer-events: none;
  opacity: 0.3;
  animation: gridPulse 20s ease-in-out infinite;
}

@keyframes gridPulse {
  0%,
  100% {
    opacity: 0.2;
  }
  50% {
    opacity: 0.4;
  }
}

@keyframes sectionGlow {
  0% {
    opacity: 0.3;
  }
  100% {
    opacity: 0.6;
  }
}

.security-section::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(74, 222, 128, 0.2), transparent);
  pointer-events: none;
}

.security-section.dark {
  background: linear-gradient(165deg, #0a0f1a 0%, #0f172a 100%);
}

.security-section.dark::before {
  background: radial-gradient(
      circle at -20% 50%,
      rgba(74, 222, 128, 0.04) 0%,
      transparent 50%
    ),
    radial-gradient(circle at 120% 50%, rgba(34, 197, 94, 0.02) 0%, transparent 50%);
}

/* Modern Security Container */
.security-container {
  position: relative;
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 1.5rem;
  z-index: 1;
}

/* Modern Security Card with Gradient Backgrounds */
.security-card {
  position: relative;
  background: linear-gradient(
    135deg,
    rgba(15, 23, 42, 0.95) 0%,
    rgba(17, 24, 39, 0.98) 50%,
    rgba(15, 23, 42, 0.95) 100%
  );
  border: 1px solid rgba(74, 222, 128, 0.08);
  border-radius: 1.5rem;
  padding: 2.5rem 2rem;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  backdrop-filter: blur(10px);
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

/* Subtle gradient overlay - no glow */
.security-card::before {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(
      circle at 0% 0%,
      rgba(74, 222, 128, 0.04) 0%,
      transparent 50%
    ),
    radial-gradient(circle at 100% 100%, rgba(34, 197, 94, 0.03) 0%, transparent 50%);
  border-radius: 1.5rem;
  pointer-events: none;
  z-index: -1;
}

@keyframes gradientShift {
  0%,
  100% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
}

.security-card::after {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: 1.5rem;
  padding: 1px;
  background: linear-gradient(
    135deg,
    rgba(74, 222, 128, 0.2),
    rgba(34, 197, 94, 0.05),
    transparent
  );
  -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  -webkit-mask-composite: xor;
  mask-composite: exclude;
  pointer-events: none;
  opacity: 0.5;
  transition: opacity 0.5s ease;
}

.security-card:hover {
  transform: translateY(-8px);
  border-color: rgba(74, 222, 128, 0.15);
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
  background: linear-gradient(
    135deg,
    rgba(17, 24, 39, 0.98) 0%,
    rgba(22, 163, 74, 0.06) 50%,
    rgba(15, 23, 42, 0.98) 100%
  );
}

.security-card:hover::before {
  background: radial-gradient(
      circle at 0% 0%,
      rgba(74, 222, 128, 0.08) 0%,
      transparent 50%
    ),
    radial-gradient(circle at 100% 100%, rgba(34, 197, 94, 0.06) 0%, transparent 50%);
}

/* Card content positioning */
.security-card > * {
  position: relative;
  z-index: 1;
}

/* Featured card with gradient backgrounds */
.security-card.featured {
  background: linear-gradient(
    135deg,
    rgba(22, 163, 74, 0.08) 0%,
    rgba(17, 24, 39, 0.98) 40%,
    rgba(15, 23, 42, 0.98) 60%,
    rgba(34, 197, 94, 0.06) 100%
  );
  border: 1px solid rgba(74, 222, 128, 0.12);
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
}

.security-card.featured::before {
  background: radial-gradient(
      circle at 0% 0%,
      rgba(74, 222, 128, 0.08) 0%,
      transparent 50%
    ),
    radial-gradient(circle at 100% 100%, rgba(34, 197, 94, 0.06) 0%, transparent 50%);
}

.security-card.featured:hover {
  background: linear-gradient(
    135deg,
    rgba(22, 163, 74, 0.12) 0%,
    rgba(17, 24, 39, 0.98) 40%,
    rgba(15, 23, 42, 0.98) 60%,
    rgba(34, 197, 94, 0.1) 100%
  );
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.4), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
}

.security-card.featured:hover::before {
  background: radial-gradient(
      circle at 0% 0%,
      rgba(74, 222, 128, 0.12) 0%,
      transparent 50%
    ),
    radial-gradient(circle at 100% 100%, rgba(34, 197, 94, 0.1) 0%, transparent 50%);
}

/* Card Icons */
.security-icon {
  width: 3rem;
  height: 3rem;
  background: linear-gradient(135deg, #22c55e, #16a34a);
  border-radius: 0.75rem;
  padding: 0.75rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 0 20px rgba(74, 222, 128, 0.2);
}

/* Enhanced Security Badge */
.security-badge {
  display: inline-flex;
  align-items: center;
  background: linear-gradient(135deg, rgba(74, 222, 128, 0.15), rgba(34, 197, 94, 0.1));
  color: #4ade80;
  font-size: 0.875rem;
  font-weight: 700;
  padding: 0.5rem 1rem;
  border-radius: 9999px;
  margin-bottom: 1.5rem;
  border: 1px solid rgba(74, 222, 128, 0.25);
  box-shadow: 0 4px 6px -1px rgba(74, 222, 128, 0.1),
    0 2px 4px -1px rgba(74, 222, 128, 0.06), inset 0 1px 0 rgba(255, 255, 255, 0.05);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  backdrop-filter: blur(10px);
  position: relative;
  overflow: hidden;
}

.security-badge::before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    90deg,
    transparent,
    rgba(255, 255, 255, 0.2),
    rgba(74, 222, 128, 0.3),
    rgba(255, 255, 255, 0.2),
    transparent
  );
  animation: shimmerMove 3s ease-in-out infinite;
}

@keyframes shimmerMove {
  0% {
    left: -100%;
  }
  50%,
  100% {
    left: 200%;
  }
}

.security-badge:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 8px -2px rgba(74, 222, 128, 0.15),
    0 3px 4px -1px rgba(74, 222, 128, 0.1);
  border-color: rgba(74, 222, 128, 0.35);
  background: linear-gradient(135deg, rgba(74, 222, 128, 0.18), rgba(34, 197, 94, 0.12));
}

.security-badge:hover::before {
  animation-duration: 1s;
}

.security-badge svg {
  width: 1.125rem;
  height: 1.125rem;
  margin-right: 0.5rem;
}

/* Smooth Scroll Enhancement */
html {
  scroll-behavior: smooth;
}

/* Enhanced Section Transitions */
.security-section,
.security-card,
.security-badge {
  animation: fadeInUp 0.8s ease-out;
  animation-fill-mode: both;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Staggered animation delays for sections */
.security-section:nth-child(1) {
  animation-delay: 0.1s;
}
.security-section:nth-child(2) {
  animation-delay: 0.2s;
}
.security-section:nth-child(3) {
  animation-delay: 0.3s;
}
.security-section:nth-child(4) {
  animation-delay: 0.4s;
}
.security-section:nth-child(5) {
  animation-delay: 0.5s;
}

/* Responsive Design */
@media (max-width: 640px) {
  .hero-section {
    padding: 6rem 0 4rem;
    min-height: 80vh;
  }

  .security-section {
    padding: 3rem 1rem;
  }

  .security-container {
    padding: 0 1rem;
  }

  .security-card {
    padding: 2rem 1.5rem;
    border-radius: 1.25rem;
  }

  .security-badge {
    font-size: 0.8125rem;
    padding: 0.4rem 0.875rem;
  }
}

@media (min-width: 641px) and (max-width: 1023px) {
  .security-section {
    padding: 4.5rem 1.5rem;
  }

  .security-card {
    padding: 2.75rem 2.25rem;
    border-radius: 1.375rem;
  }
}

@media (min-width: 1024px) {
  .hero-section {
    min-height: 92vh;
  }

  .security-section {
    padding: 7rem 2rem;
  }

  .security-card {
    padding: 3.5rem 3rem;
  }
}

@media (min-width: 1280px) {
  .security-section {
    padding: 8rem 2rem;
  }

  .security-card {
    padding: 4rem 3.5rem;
  }

  .security-badge {
    font-size: 0.9375rem;
    padding: 0.625rem 1.25rem;
  }
}

/* Add smooth transitions for all interactive elements */
* {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Improve focus states for accessibility */
:focus-visible {
  outline: 2px solid rgba(74, 222, 128, 0.5);
  outline-offset: 2px;
  border-radius: 0.25rem;
}

/* Enhanced hover effects for links and buttons */
a,
button {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Subtle parallax effect on scroll */
@media (prefers-reduced-motion: no-preference) {
  .security-section::before {
    animation: parallaxFloat 20s ease-in-out infinite;
  }
}

@keyframes parallaxFloat {
  0%,
  100% {
    transform: translateY(0) scale(1);
  }
  50% {
    transform: translateY(-10px) scale(1.05);
  }
} /* Wave Transition Styling */
.wave-transition {
  position: relative;
  width: 100%;
  height: 60px;
  z-index: 40;
  margin-bottom: -1px;
}

.wave-transition--gradient {
  height: 60px;
}

.wave-gradient-overlay {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 30px;
  pointer-events: none;
  background: linear-gradient(
    to bottom,
    rgba(17, 24, 39, 0) 0%,
    rgba(17, 24, 39, 0.5) 60%,
    rgba(17, 24, 39, 0) 100%
  );
  z-index: 42;
}

.wave-transition.accent-wave {
  margin-top: 0;
  margin-bottom: 0;
}

.divider-line {
  position: absolute;
  height: 2px;
  width: 100%;
  top: 50%;
  z-index: 42;
  background: linear-gradient(
    90deg,
    transparent 0%,
    rgba(74, 222, 128, 0.5) 50%,
    transparent 100%
  );
  box-shadow: 0 0 10px rgba(74, 222, 128, 0.3), 0 0 20px rgba(74, 222, 128, 0.2);
  animation: dividerPulse 3s ease-in-out infinite;
}

@keyframes dividerPulse {
  0%,
  100% {
    opacity: 0.5;
    transform: scaleX(0.95);
  }
  50% {
    opacity: 1;
    transform: scaleX(1);
  }
}

.wave-svg {
  margin-top: -20px;
}

.wave-transition svg {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  z-index: 41;
}

@media (min-width: 640px) {
  .wave-transition {
    height: 80px;
  }

  .wave-transition--gradient {
    height: 80px;
  }

  .wave-gradient-overlay {
    height: 40px;
  }

  .divider-line {
    height: 2px;
  }
}

@media (min-width: 768px) {
  .wave-transition {
    height: 90px;
  }

  .wave-transition--gradient {
    height: 90px;
  }

  .wave-gradient-overlay {
    height: 45px;
  }

  .divider-line {
    height: 2px;
  }
}

/* Noise Texture Overlay for Depth */
.site-content::before {
  content: "";
  position: fixed;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.03'/%3E%3C/svg%3E");
  opacity: 0.4;
  pointer-events: none;
  z-index: 100;
  mix-blend-mode: overlay;
}

/* Aurora-like gradient animation */
.hero-section,
.security-section {
  position: relative;
}

.hero-section > *:not(::before):not(::after),
.security-section > *:not(::before):not(::after) {
  position: relative;
  z-index: 2;
}

/* Animation Classes */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fadeIn {
  animation: fadeIn 1.2s ease-out;
}

.animate-fadeIn-delay {
  animation: fadeIn 1.4s ease-out 0.3s forwards;
  opacity: 0;
}

@keyframes pulse {
  0%,
  100% {
    opacity: 1;
  }
  50% {
    opacity: 0.5;
  }
}

/* Mobile Responsiveness */
@media (max-width: 640px) {
  .hero-section {
    padding-top: 3.5rem;
    padding-bottom: 3.5rem;
    min-height: 85vh;
  }

  h1 {
    font-size: 1.75rem !important;
    line-height: 1.25 !important;
  }

  h2 {
    font-size: 1.5rem !important;
  }

  p {
    font-size: 0.938rem !important;
    line-height: 1.5 !important;
  }
}
</style>
