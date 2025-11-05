<template>
    <div class="relative bg-gradient-to-b from-gray-900 via-black to-gray-900 py-16 sm:py-24 overflow-hidden">
        <div class="absolute bottom-0 right-0 translate-y-1/2 translate-x-1/2 w-[600px] h-[600px] bg-gradient-to-tl from-lime-500/10 to-green-500/5 rounded-full blur-3xl" aria-hidden="true"></div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
            <div class="flex items-center justify-center gap-2 mb-12">
                <img class="h-12 w-auto" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo">
                <span class="text-lg italic font-extrabold text-white">Technology</span>
            </div>
            <work-collage></work-collage>
            <div class="mx-auto max-w-4xl text-center mt-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-lime-500/10 border border-lime-500/20 rounded-full mb-6">
                    <svg class="w-4 h-4 text-lime-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm font-semibold text-lime-400">24/7 Protection</span>
                </div>
                
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-6">
                    Professional Security Solutions
                </h2>
                
                <p class="text-xl text-gray-300 leading-relaxed mb-12 max-w-3xl mx-auto">
                    Expert technicians available around the clock to install and maintain your surveillance systems. Schedule your consultation today and partner with New Mexico's trusted security provider.
                </p>
            </div>
            <h2 class="text-3xl font-bold text-green-500 mb-6 text-center animate-fadeIn">Why Choose NM Technology for Commercial CCTV Installation?</h2>
            <p class="text-lg text-gray-300 text-center mb-10 animate-fadeIn-delay">
                We provide expert <strong class="text-green-400">CCTV installation</strong>, security systems, and smart automation for businesses and homes in Albuquerque and across New Mexico. Our certified technicians deliver rapid service, ongoing support, and tailored solutions to protect your property, assets, and data.<br><br>
                NM Technology partners with leading vendors and security technology manufacturers to offer you leading industry options to enforce a security strategy that gives you the peace of mind you have been looking for! <strong>"CCTV installation Albuquerque"</strong> and related security keywords. Contact us for a free security audit and discover why we’re trusted by top organizations statewide.
            </p>
            <div class="flex flex-wrap justify-center gap-8 mt-8">
                <img src="/public/images/ubiquity-logo.webp" class="h-12 object-contain grayscale hover:grayscale-0 transition-all" alt="Ubiquity" />
                <img src="/public/images/linovision-logo.webp" class="h-12 object-contain grayscale hover:grayscale-0 transition-all" alt="Linovision" />
                <img src="/public/images/zwave-logo.webp" class="h-12 object-contain grayscale hover:grayscale-0 transition-all" alt="ZWave" />
                <img src="/public/images/allegion-logo.webp" class="h-12 object-contain grayscale hover:grayscale-0 transition-all" alt="Allegion" />
                <img src="/public/images/teltonika-logo.webp" class="h-12 object-contain grayscale hover:grayscale-0 transition-all" alt="Teltonika" />
            </div>
        </div>
    </div>
</template>

<script setup>
import WorkCollage from './WorkCollage.vue';

</script>

<style scoped>
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeIn-delay {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fadeIn {
  animation: fadeIn 1.2s ease-out;
}
.animate-fadeIn-delay {
  animation: fadeIn-delay 1.4s ease-out 0.3s forwards;
  opacity: 0;
}
img {
  transition: filter 0.3s, transform 0.3s;
}
img:hover {
  filter: brightness(1.1);
  transform: scale(1.05);
}
</style>
