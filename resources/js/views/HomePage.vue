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
      <section class="content-section">
        <div class="content-container">
          <div class="content-box">
            <div class="box-corner top-left"></div>
            <div class="box-corner top-right"></div>
            <div class="box-corner bottom-left"></div>
            <div class="box-corner bottom-right"></div>
            <div class="content-wrapper">
              <SectionService />
            </div>
          </div>
        </div>
      </section>

      <!-- Technology Highlights Section -->
      <section class="content-section alt-bg">
        <div class="content-container">
          <div class="content-box highlighted">
            <div class="box-corner top-left"></div>
            <div class="box-corner top-right"></div>
            <div class="box-corner bottom-left"></div>
            <div class="box-corner bottom-right"></div>
            <div class="content-wrapper">
              <BlackGradient />
            </div>
          </div>
        </div>
      </section>

      <!-- Trusted Teams Section -->
      <section class="content-section">
        <div class="content-container">
          <div class="content-box">
            <div class="box-corner top-left"></div>
            <div class="box-corner top-right"></div>
            <div class="box-corner bottom-left"></div>
            <div class="box-corner bottom-right"></div>
            <div class="content-wrapper">
              <TrustedTeams />
            </div>
          </div>
        </div>
      </section>

      <!-- Wave separator before final sections -->
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
      <section class="content-section">
        <div class="content-container">
          <div class="content-box">
            <div class="box-corner top-left"></div>
            <div class="box-corner top-right"></div>
            <div class="box-corner bottom-left"></div>
            <div class="box-corner bottom-right"></div>
            <div class="content-wrapper">
              <SectionOne />
            </div>
          </div>
        </div>
      </section>

      <!-- Pricing Section -->
      <section class="content-section alt-bg">
        <div class="content-container">
          <div class="content-box highlighted">
            <div class="box-corner top-left"></div>
            <div class="box-corner top-right"></div>
            <div class="box-corner bottom-left"></div>
            <div class="box-corner bottom-right"></div>
            <div class="content-wrapper">
              <Pricing />
            </div>
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

/* Hero Section Styling */
.hero-section {
  position: relative;
  padding-bottom: 6rem;
  overflow: hidden;
  background: linear-gradient(to bottom, transparent, rgba(17, 24, 39, 0.8) 70%, #111827);
}

/* Modern Content Section Styling */
.content-section {
  position: relative;
  padding: 2rem 0;
  background: #111827;
}

.content-section.alt-bg {
  background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
}

.content-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 1rem;
}

/* Modern Box Design with Corner Accents */
.content-box {
  position: relative;
  background: linear-gradient(
    135deg,
    rgba(17, 24, 39, 0.8) 0%,
    rgba(31, 41, 55, 0.6) 100%
  );
  border: 1px solid rgba(75, 85, 99, 0.2);
  border-radius: 0.5rem;
  padding: 2rem 1.5rem;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  overflow: hidden;
}

.content-box::before {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: 0.5rem;
  padding: 1px;
  background: linear-gradient(
    135deg,
    rgba(74, 222, 128, 0.1),
    transparent,
    rgba(59, 130, 246, 0.1)
  );
  -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  -webkit-mask-composite: xor;
  mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  mask-composite: exclude;
  pointer-events: none;
}

.content-box.highlighted {
  background: linear-gradient(
    135deg,
    rgba(22, 163, 74, 0.05) 0%,
    rgba(17, 24, 39, 0.8) 50%,
    rgba(59, 130, 246, 0.05) 100%
  );
  border-color: rgba(74, 222, 128, 0.2);
}

.content-box:hover {
  transform: translateY(-4px);
  border-color: rgba(74, 222, 128, 0.4);
  box-shadow: 0 20px 60px -15px rgba(0, 0, 0, 0.5), 0 0 40px -10px rgba(74, 222, 128, 0.1);
}

/* Corner Accent Elements */
.box-corner {
  position: absolute;
  width: 20px;
  height: 20px;
  border-color: rgba(74, 222, 128, 0.6);
  transition: all 0.3s ease;
}

.box-corner.top-left {
  top: -1px;
  left: -1px;
  border-top: 2px solid;
  border-left: 2px solid;
  border-top-left-radius: 0.5rem;
}

.box-corner.top-right {
  top: -1px;
  right: -1px;
  border-top: 2px solid;
  border-right: 2px solid;
  border-top-right-radius: 0.5rem;
}

.box-corner.bottom-left {
  bottom: -1px;
  left: -1px;
  border-bottom: 2px solid;
  border-left: 2px solid;
  border-bottom-left-radius: 0.5rem;
}

.box-corner.bottom-right {
  bottom: -1px;
  right: -1px;
  border-bottom: 2px solid;
  border-right: 2px solid;
  border-bottom-right-radius: 0.5rem;
}

.content-box:hover .box-corner {
  width: 40px;
  height: 40px;
  border-color: rgba(74, 222, 128, 0.9);
}

.content-wrapper {
  position: relative;
  z-index: 1;
}

/* Responsive Design */
@media (min-width: 640px) {
  .content-section {
    padding: 3rem 0;
  }

  .content-container {
    padding: 0 1.5rem;
  }

  .content-box {
    padding: 3rem 2rem;
    border-radius: 0.75rem;
  }

  .box-corner {
    width: 30px;
    height: 30px;
  }

  .content-box:hover .box-corner {
    width: 50px;
    height: 50px;
  }
}

@media (min-width: 768px) {
  .content-section {
    padding: 4rem 0;
  }

  .content-container {
    padding: 0 2rem;
  }

  .content-box {
    padding: 4rem 3rem;
    border-radius: 1rem;
  }
}

@media (min-width: 1024px) {
  .content-section {
    padding: 5rem 0;
  }

  .content-box {
    padding: 5rem 4rem;
  }

  .box-corner {
    width: 35px;
    height: 35px;
  }

  .content-box:hover .box-corner {
    width: 60px;
    height: 60px;
  }
}

@media (min-width: 1280px) {
  .content-section {
    padding: 6rem 0;
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
