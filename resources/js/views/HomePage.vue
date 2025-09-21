<template>
  <div class="site-wrapper">
    <!-- Fixed elements -->
    <nav><!-- Your navbar here --></nav>
    <DesertParallax v-if="!isVerySmallScreen" class="fixed-parallax" />
    <TopBanner v-if="showFixedBanner" class="fixed top-0 left-0 w-full z-50" />
    <TopBanner v-else class="fixed left-0 w-full z-50" style="top: 1rem;" />
    
    <!-- Main Content Starts -->
    <main class="site-content">
      <!-- Hero Section -->
      <section class="hero-section relative flex flex-col items-center justify-center min-h-screen w-full z-10 text-center px-4 py-16 md:py-24">
        <div class="max-w-5xl mx-auto mt-20 sm:mt-32">
          <h1 class="tracking-tight text-gray-100 sm:text-6xl mt-10 mb-6 text-4xl font-extrabold leading-none md:text-5xl lg:text-6xl animate-fadeIn">
            NM Technology is Albuquerque's Trusted Commercial CCTV, Security & Fire Systems Installation Experts
            <span class="text-green-500 block mt-2">Protected and Served</span> Right Here in New Mexico!
          </h1>
          
          <p class="text-lg font-normal text-gray-300 lg:text-xl animate-fadeIn-delay max-w-4xl mx-auto">
            NM Technology specializes in <strong class="text-green-400">CCTV installation & design</strong>, security
            systems, and integrated technology solutions for businesses and homes in Albuquerque and throughout New Mexico.
            Our team provides professional low voltage installation in New Mexico, we provide ongoing maintenance, and rapid
            support to protect your assets, personnel, and data.
          </p>
          
          <!-- CTA Buttons -->
          <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4 w-full">
            <button @click="openContactModal"
              class="w-full sm:w-auto text-base font-semibold leading-6 bg-green-600 px-8 py-3 text-white shadow-lg hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400 rounded-md transition-all duration-300 transform hover:scale-105">
              Contact Us
            </button>
            <button @click="generateQuote"
              class="w-full sm:w-auto text-base font-semibold leading-6 bg-blue-600 px-8 py-3 text-white shadow-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-md transition-all duration-300 transform hover:scale-105 mt-4 sm:mt-0">
              Make A Quote
            </button>
          </div>
        </div>
        
        <!-- Hero Footer with brand icons -->
        <div class="hero-footer absolute bottom-0 left-0 right-0 py-8">
          <div class="flex flex-wrap justify-center gap-8">
            <img src="/public/images/google-doorbellcam.webp" alt="" class="h-16 w-16 object-cover rounded-lg shadow-lg" />
            <img src="/public/images/security-cam-1.webp" alt="" class="h-16 w-16 object-cover rounded-lg shadow-lg" />
            <img src="/public/images/smart-access-control.webp" alt="" class="h-16 w-16 object-cover rounded-lg shadow-lg" />
          </div>
        </div>
      </section>
      
      <!-- Services Section (with background effect) -->
      <div class="section-divider">
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path fill="#111827" fill-opacity="1" d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,208C672,213,768,203,864,170.7C960,139,1056,85,1152,80C1248,75,1344,117,1392,138.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
      </div>
      
      <!-- Main Content Sections -->
      <SectionService class="content-section" />
      <BlackGradient class="content-section" />
      <SectionOne class="content-section" />
      
      <!-- Footer -->
      <HomeFooter />
    </main>
    
    <!-- Modals -->
    <ContactModal ref="contactModalRef" />
  </div>
</template>

<script setup>
import SectionService from '../components/SectionService.vue'
import HomeGrecaptcha from '../components/HomeGrecaptcha.vue'
import SectionOne from '../components/SectionOne.vue'
import DesertParallax from '../components/DesertParallax.vue'
import BlackGradient from '../components/BlackGradient.vue'
import WorkCollage from '../components/WorkCollage.vue'
import HomeFooter from '../components/HomeFooter.vue'
import TopBanner from '../components/TopBanner.vue'
import CcTv from '../components/CcTv.vue'
import MobileMenu from '../components/MobileMenu.vue'
import TrustedTeams from '../components/TrustedTeams.vue'
import ContactModal from '../components/ContactModal.vue'
import { ref, onMounted, onUnmounted, computed } from 'vue'
import { useRouter } from 'vue-router'

const contactModalRef = ref(null);
const router = useRouter();
const openContactModal = () => {
  if (contactModalRef.value) {
    contactModalRef.value.openModalFromOptions();
  }
};
const generateQuote = () => {
  router.push('/cctv');
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
  window.addEventListener('scroll', handleScroll);
  window.addEventListener('resize', checkMobile);
  checkMobile();
});
onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
  window.removeEventListener('resize', checkMobile);
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

/* Section Divider Styling */
.section-divider {
  position: relative;
  width: 100%;
  height: 150px;
  z-index: 5;
}

.wave {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  z-index: 5;
}

/* Content Section Styling */
.content-section {
  position: relative;
  z-index: 20;
  background-color: #111827;
}

/* Animation Classes */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.animate-fadeIn {
  animation: fadeIn 1.2s ease-out;
}

.animate-fadeIn-delay {
  animation: fadeIn 1.4s ease-out 0.3s forwards;
  opacity: 0;
}

/* Mobile Responsiveness */
@media (max-width: 640px) {
  .hero-section {
    padding-top: 4rem;
    padding-bottom: 4rem;
    min-height: 90vh;
  }
  
  .section-divider {
    height: 80px;
  }
}
</style>
