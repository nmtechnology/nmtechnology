<template>
  <div class="site-wrapper">
    <!-- Modern Navigation Bar -->
    <nav
      class="modern-navbar fixed top-0 left-0 w-full z-50 bg-gray-900/80 backdrop-blur-md border-b border-green-500/20"
    >
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
          <!-- Logo Section -->
          <div class="flex items-center gap-3">
            <img
              src="/public/images/nm-logo-rmbg.webp"
              alt="NM Technology"
              class="h-12 w-auto"
            />
            <div class="hidden sm:flex flex-col">
              <span class="text-xl font-bold text-white">Technology</span>
              <span class="text-xs text-green-400 font-semibold tracking-wider uppercase"
                >& Integration Solutions</span
              >
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex items-center gap-3">
            <button
              @click="openContactModal"
              class="hidden sm:flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-500 text-white rounded-lg transition-all duration-300 transform hover:scale-105 font-semibold text-sm"
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
              <span class="hidden sm:inline">Get Quote</span>
              <span class="sm:hidden">Quote</span>
            </button>
          </div>
        </div>
      </div>
    </nav>

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
            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-500/10 border border-green-500/20 mb-6 animate-fadeIn"
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

      <!-- Our Services & Partnerships Section -->
      <section class="modern-section py-12 sm:py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="modern-card">
            <SectionService />
          </div>
        </div>
      </section>

      <!-- Technology Highlights Section -->
      <section
        class="modern-section bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-12 sm:py-16 md:py-20"
      >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="modern-card">
            <BlackGradient />
          </div>
        </div>
      </section>

      <!-- Trusted Teams Section -->
      <section class="modern-section py-12 sm:py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="modern-card">
            <TrustedTeams />
          </div>
        </div>
      </section>

      <!-- Wave separator before final sections (improved for all screen sizes) -->
      <div class="wave-transition accent-wave">
        <div class="divider-line bg-green-400"></div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="wave-svg">
          <path
            fill="#111827"
            fill-opacity="1"
            d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,90.7C672,85,768,107,864,122.7C960,139,1056,149,1152,144C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
          ></path>
        </svg>
      </div>

      <!-- Commercial Services & Pricing Section -->
      <section class="modern-section py-12 sm:py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="modern-card">
            <SectionOne />
          </div>
        </div>
      </section>

      <!-- Pricing Section -->
      <section class="modern-section bg-gray-900 py-12 sm:py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="modern-card">
            <Pricing />
          </div>
        </div>
      </section>

      <!-- Footer -->
      <HomeFooter />
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
}

.site-content {
  position: relative;
  z-index: 10;
}

.fixed-parallax {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  z-index: -1000;
}

/* Modern Navigation Bar */
.modern-navbar {
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  animation: slideDown 0.5s ease-out;
}

@keyframes slideDown {
  from {
    transform: translateY(-100%);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

.modern-navbar button {
  position: relative;
  overflow: hidden;
}

.modern-navbar button::before {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
  transform: translate(-50%, -50%);
  transition: width 0.6s, height 0.6s;
}

.modern-navbar button:hover::before {
  width: 300px;
  height: 300px;
}

/* Hero Section Styling */
.hero-section {
  position: relative;
  padding-bottom: 6rem;
  overflow: hidden;
  background: linear-gradient(to bottom, transparent, rgba(17, 24, 39, 0.8) 70%, #111827);
}

/* Modern Section Styling */
.modern-section {
  position: relative;
  width: 100%;
}

/* Modern Card Design */
.modern-card {
  background: rgba(17, 24, 39, 0.4);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border: 1px solid rgba(75, 85, 99, 0.3);
  border-radius: 1rem;
  padding: 1.5rem;
  transition: all 0.3s ease;
}

.modern-card:hover {
  border-color: rgba(74, 222, 128, 0.4);
  transform: translateY(-2px);
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

@media (min-width: 640px) {
  .modern-card {
    padding: 2rem;
    border-radius: 1.5rem;
  }
}

@media (min-width: 768px) {
  .modern-card {
    padding: 2.5rem;
  }
}

@media (min-width: 1024px) {
  .modern-card {
    padding: 3rem;
  }
}

/* Modern Wave Transition Styling */

.wave-transition {
  position: relative;
  width: 100%;
  height: 80px;
  z-index: 40;
  margin-bottom: -1px;
}

.wave-transition--gradient {
  height: 80px;
}

.wave-gradient-overlay {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 40px;
  pointer-events: none;
  background: linear-gradient(
    to bottom,
    rgba(17, 24, 39, 0.01) 0%,
    rgba(17, 24, 39, 0.7) 60%,
    rgba(17, 24, 39, 0) 100%
  );
  z-index: 42;
}

.wave-transition.accent-wave {
  margin-top: 1.5rem;
}

.divider-line {
  position: absolute;
  height: 3px;
  width: 100%;
  top: 50%;
  z-index: 42;
  background: linear-gradient(90deg, transparent, rgba(74, 222, 128, 0.6), transparent);
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
    height: 100px;
  }

  .wave-transition--gradient {
    height: 100px;
  }

  .wave-gradient-overlay {
    height: 50px;
  }

  .wave-transition.accent-wave {
    margin-top: 2rem;
  }

  .divider-line {
    height: 4px;
  }
}

@media (min-width: 768px) {
  .wave-transition {
    height: 110px;
  }

  .wave-transition--gradient {
    height: 110px;
  }

  .wave-gradient-overlay {
    height: 60px;
  }

  .wave-transition.accent-wave {
    margin-top: 3rem;
  }

  .divider-line {
    height: 5px;
  }
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
