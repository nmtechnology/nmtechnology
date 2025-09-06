eslint-disable comma-dangle
eslint-disable no-undef
<template>
  <AuthGuard>
    <TopBanner />
    <!-- Halloween Promotional Banner -->
    <PromoBanner 
      :maxHeight="80"
      link="/halloween-special"
      dismissible
      fixed
      @dismissed="handleBannerDismiss"
    >
      <div class="absolute inset-0 bg-black bg-opacity-40 md:flex items-center justify-center hidden">
        <div class="text-center">
          <h3 class="text-xl md:text-2xl font-bold text-orange-500">Halloween Security Special!</h3>
          <p class="text-white text-sm md:text-lg">Get 10% off all security systems until October 31st</p>
        </div>
      </div>
    </PromoBanner>
    <div class="bg-gray-900">
        <main class="pt-[60px]"> <!-- Reduced padding to account for the fixed banner -->
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
                    <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#3b71ab] to-[#9689fc] opacity-30"
                        style="
                            clip-path: polygon(
                                63.1% 29.5%,
                                100% 17.1%,
                                76.6% 3%,
                                69.4% 0%,
                                44.6% 4.7%,
                                40.5% 25.3%,
                                59.8% 49%,
                                55.2% 57.8%,
                                44.4% 57.2%,
                                27.8% 47.9%,
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
                    <div class="mx-auto max-w-7xl px-6 pb-32 pt-36 sm:pt-60 lg:px-8 lg:pt-32" style="margin-top: 80px;">
                        <div class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center">
                            <div class="w-full max-w-xl lg:shrink-0 xl:max-w-2xl sm:mt-10">
                               
<div class="flex items-center gap-4">
    <h1 class="tracking-tight text-gray-300 sm:text-6xl 2xl:mt-10 mt-2 mb-4 text-4xl font-extrabold leading-none md:text-5xl lg:text-6xl dark:text-white">NM Technology is changing the way you are
         <span class="text-green-600 dark:text-blue-500">protected and served</span> here in <span class="items-center inline-flex"><img src="/public/images/zia-symbol.webp" alt="Zia Symbol" class="w-12 h-12 mx-1"/> New Mexico!</span></h1>
</div>
<p class="text-lg font-normal text-gray-400 lg:text-xl dark:text-gray-400">When our customers use our integrated technology to protect their home or business,
                                    they can automate routine tasks and create
                                    customized settings based around thier lifestyle or business functionalities. 
                                    Our new Quote Cart system makes it easy to select the security products you need and generate a customized quote in minutes. Simply browse our products, add items to your Quote Cart, and submit your request to have our team prepare a detailed quote tailored to your specific requirements.
                                    By offering a full range of
                                    security monitoring services and products that address
                                    both physical and cyber threats, we can
                                    protect organizations of all types and sizes with our security systems and cameras. We offer on-site representation as well so we can help you get the work you need done even though you are 3 area codes away from your customer.
                                    We protect our customers personell, assets. In
                                    addition, we offer warranties for ongoing maintenance and
                                    support services to ensure that these
                                    systems continue to function effectively
                                    over time. Contact us today so we can get started.</p>
                                
                                <div class="mt-10 flex flex-col sm:flex-row items-center gap-4 w-full">
                                    <div class="w-full sm:w-auto mb-3 sm:mb-0">
                                        <ContactModal buttonClasses="w-full sm:w-auto inline-flex items-center justify-center px-3 py-1.5 bg-green-600 border border-transparent rounded-md font-medium text-white text-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300">
                                            Contact Us
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </ContactModal>
                                    </div>
                                    <router-link to="/cctv#product-grid" class="w-full sm:w-auto inline-flex items-center justify-center px-3 py-1.5 bg-blue-600 border border-transparent rounded-md font-medium text-white text-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300">
                                        Generate Quote
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                        </svg>
                                    </router-link>
                                    <!-- <SecurityFAQsModal buttonClasses="w-full sm:w-auto inline-flex items-center justify-center px-3 py-1.5 bg-gray-700 border border-gray-600 rounded-md font-medium text-white text-sm hover:bg-gray-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-300">
                                        Why Security?
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </SecurityFAQsModal> -->
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
  </AuthGuard>
</template>

<script>
import SectionService from '../components/SectionService.vue'
import HomeGrecaptcha from '../components/HomeGrecaptcha.vue'
import SectionOne from '../components/SectionOne.vue'
import DesertParallax from '../components/DesertParallax.vue'
import BlackGradient from '../components/BlackGradient.vue'
import WorkCollage from '../components/WorkCollage.vue'
import HomeFooter from '../components/HomeFooter.vue'
import ContactModal from '../components/ContactModal.vue'
import TopBanner from '../components/TopBanner.vue'
import CcTv from '../components/CcTv.vue'
import MobileMenu from '../components/MobileMenu.vue'
import TrustedTeams from '../components/TrustedTeams.vue'
import PromoBanner from '../components/PromoBanner.vue'
import AuthGuard from '../components/AuthGuard.vue'
import SecurityFAQsModal from '../components/SecurityFAQsModal.vue'
import { ref } from 'vue'

const isOpen = ref(true)
const showBanner = ref(true)

const handleBannerDismiss = () => {
  showBanner.value = false;
  // Optionally, you can store this in localStorage to remember the user's choice
  localStorage.setItem('halloweenBannerDismissed', 'true');
}

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
    ContactModal,
    MobileMenu,
    TopBanner,
    CcTv,
    TrustedTeams,
    PromoBanner,
    AuthGuard,
    SecurityFAQsModal
  }
}
</script>
