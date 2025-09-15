eslint-disable comma-dangle
eslint-disable no-undef
<template>
    <nav><!-- Your navbar here --></nav>
    <div class="relative w-full h-[55vh]">
      <DesertParallax class="fixed-parallax" />
      <TopBanner v-if="showFixedBanner" class="fixed top-0 left-0 w-full z-20" />
      <TopBanner v-else class="fixed left-0 w-full z-20" style="top:8vh;" />
    </div>
    <div class="relative z-10 bg-gray-900" :style="{ marginTop: isMobile ? '8rem' : '18rem' }">
        <main>
            <div class="relative isolate">
                <svg class="absolute inset-x-0 top-0 -z-40 h-[84rem] w-full stroke-slate-600 [mask-image:radial-gradient(40rem_30rem_at_center,white,transparent)]"
                    aria-hidden="true">
                    <defs>
                        
                        <pattern id="1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84" width="200" height="200" x="50%" y="-1"
                            patternUnits="userSpaceOnUse">
                            <path d="M.5 300V.5H200" fill="none" />
                        </pattern>
                    </defs>
                    <svg x="50%" y="-1" class="overflow-visible">
                        <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
                            stroke-width="0" />
                    </svg>
                    <rect width="100%" height="100%" stroke-width="0" fill="url(#1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84)" />
                </svg>
                <div class="absolute left-1/2 right-0 top-0 -z-40 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                    aria-hidden="true">
                    <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#3b71ab] to-[#d289fc] opacity-30"
                        style="
                            clip-path: polygon(
                                63.1% 29.5%,
                                100% 17.1%,
                                76.6% 3%,
                                80.4% 0%,
                                44.6% 4.7%,
                                40.5% 25.3%,
                                59.8% 49%,
                                55.2% 57.8%,
                                44.4% 57.2%,
                                56.8% 47.9%,
                                35.1% 81.5%,
                                0% 97.7%,
                                39.2% 100%,
                                35.2% 81.4%,
                                97.2% 52.8%,
                                30.1% 29.5%
                            );
                        "></div>
                </div>
                <div class="overflow-hidden">
                    <div class="mx-auto max-w-7xl px-4 pb-20 pt-16 sm:pt-32 lg:px-8 lg:pt-24"
                         :class="isMobile ? 'pt-16 pb-12' : 'pt-24 pb-24'">
                        <div class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center">
                            <div class="w-full max-w-xl lg:shrink-0 xl:max-w-2xl sm:mt-6">
                               
<h1 class="tracking-tight text-gray-300 sm:text-6xl 2xl:mt-10 mt-10 mb-4 text-4xl font-extrabold leading-none md:text-5xl lg:text-6xl dark:text-white">
  NM Technology is Albuquerque's Trusted Commercial CCTV, Security & Fire Systems Installation Experts, We Are Changing The Way New Mexicans are
  <span class="text-green-600 dark:text-blue-500">Protected and Served</span> Right Here in New Mexico!
</h1>
<p class="text-lg font-normal text-gray-400 lg:text-xl dark:text-gray-400">
  NM Technology specializes in <strong class="text-green-400">CCTV installation & design</strong>, security systems, and integrated technology solutions for businesses and homes in Albuquerque and throughout New Mexico. Our team provides professional low voltage installation in New Mexico, we provide ongoing maintenance, and rapid support to protect your assets, personnel, and data.<br><br>
  We use advanced security monitoring, smart automation, and local expertise to help you deter the threats that exist in New Mexico. We automate routine tasks and ensure peace of mind for our customers. Our solutions are trusted by leading organizations and backed by warranties and responsive service.<br><br>
<span class="text-blue-400">Do you need On-site Representation?</span> NM Technology partners with top-rated nationwide contractors for qualified technician services here in New Mexico. We can help you get the work you need done for your customer at the level of professionalism you expect. We can provide a world-class customer service experience for your customers while you maintain their loyalty.
</p>
                                
                                <div class="mt-10 flex items-center gap-x-4 w-full sm:w-auto">
                                    <button @click="openContactModal" class="flex-1 sm:flex-none text-base font-semibold leading-6 bg-green-600 px-6 py-3 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 rounded-md transition">
                                        Contact Us 
                                    </button>
                                    <button @click="generateQuote" class="flex-1 sm:flex-none text-base font-semibold leading-6 bg-blue-600 px-6 py-3 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 rounded-md transition">
                                        Make A Quote
                                    </button>
                                </div>
                            </div>
                            <div class="mt-14 flex justify-end gap-8 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0">
                                <div
                                    class="ml-auto w-44 flex-none space-y-8 pt-32 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-80">
                                    <div class="relative">
                                        <img src="/public/images/google-doorbellcam.webp" alt=""
                                            class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg" />
                                        <div
                                            class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                        </div>
                                    </div>
                                </div>
                                <div class="mr-auto w-44 flex-none space-y-8 sm:mr-0 sm:pt-52 lg:pt-36">
                                    <div class="relative">
                                        <img src="/public/images/security-cam-1.webp" alt=""
                                            class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg" />
                                        <div
                                            class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <img src="/public/images/smart-access-control.webp" alt=""
                                            class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg" />
                                        <div
                                            class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                        </div>
                                    </div>
                                </div>
                                <div class="w-44 flex-none space-y-8 pt-32 sm:pt-0">
                                    <div class="relative">
                                        <img src="/public/images/IT-rack.webp" alt=""
                                            class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover" />
                                        <div
                                            class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <img src="/public/images/code-dev.webp" alt=""
                                            class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg" />
                                        <div
                                            class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <SectionService />
    <BlackGradient />
    <SectionOne />
    <HomeFooter />
    <ContactModal ref="contactModalRef" />
</template>

<script>
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
// Import logAction from shared util if needed

const isOpen = ref(true)

export default {
  name: 'nmTechnology',
  components: {
    HomeFooter,
    SectionService,
    HomeGrecaptcha,
    SectionOne,
    BlackGradient,
    DesertParallax,
    WorkCollage,
    MobileMenu,
    TopBanner,
    CcTv,
    ContactModal,
    TrustedTeams
  },
  setup() {
    const contactModalRef = ref(null)
    
    const router = useRouter()
    const openContactModal = () => {
      if (contactModalRef.value) {
        contactModalRef.value.openModalFromOptions()
      }
    }

    const generateQuote = () => {
      router.push('/cctv')
    }

    const showFixedBanner = ref(false)
    const isMobile = ref(false)
    const checkMobile = () => {
      isMobile.value = window.innerWidth < 640
    }
    const handleScroll = () => {
      showFixedBanner.value = window.scrollY > window.innerHeight * 0.45
    }
    const handleResize = () => {
      checkMobile()
    }

    onMounted(() => {
      window.addEventListener('scroll', handleScroll)
      window.addEventListener('resize', checkMobile)
      checkMobile()
      logAction('HomePage', 'Page visited')
    })

    onUnmounted(() => {
      window.removeEventListener('scroll', handleScroll)
      window.removeEventListener('resize', checkMobile)
    })

    // Example: log other actions
    function onPromoBannerClick() {
      logAction('PromoBanner', 'Clicked promo banner')
    }
    
    return {
      contactModalRef,
      openContactModal,
      generateQuote,
      showFixedBanner,
      isMobile
    }
  }
}
</script>

<style scoped>
.fixed-parallax {
  position: absolute;
  top: 0;
  left: 0;
  width: 100vw;
  height: 55vh;
  z-index: 1;
  background-attachment: fixed;
}
@media (max-width: 640px) {
  .fixed-parallax {
    height: 32vh;
  }
  .mx-auto.max-w-7xl {
    padding-top: 2rem !important;
    padding-bottom: 1rem !important;
  }
}
h1 {
  text-shadow: 0 2px 8px rgba(16, 185, 129, 0.15);
  letter-spacing: 0.01em;
  animation: fadeIn 1.2s ease-out;
}

p {
  animation: fadeIn 1.4s ease-out 0.2s;
  line-height: 1.7;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>
