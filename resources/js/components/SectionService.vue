<template>
    <div class="bg-gray-900 py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-rows-1 p-12 justify-center ">
                <img class="h-12 z-8" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo"><a href="#" class="text-sm italic font-bold leading-6 text-white flex-initial">Technology</a>
            </div>
            <work-collage></work-collage>
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-lime-400">
                    Stay Protected 24/7!
                </h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">
                    Leverage Modern Technology
                </p>
                <p class="mt-6 mb-12 text-lg leading-8 text-gray-300">
                    NM Technology has the experience and know-how to professionally install and protect what matters most for you. 
                    Our team of experienced technicians are available 24/7 to provide comprehensive support, ensuring your surveillance systems 
                    are always up and running at their best. Call or email us today and we can place you on our schedule right away!
                    We work with top industry vendors and can provide you with the right solution for your property. Take a look at our partner list.  
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
