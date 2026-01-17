<template>
  <div
    class="relative bg-gradient-to-b from-black via-gray-900 to-black py-16 sm:py-24 overflow-hidden"
  >
    <!-- Decorative Background Blurs -->
    <div
      class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-gradient-to-br from-green-500/10 to-lime-500/10 rounded-full blur-3xl -z-10"
      aria-hidden="true"
    ></div>
    <div
      class="absolute bottom-0 right-0 translate-y-1/2 translate-x-1/2 w-[600px] h-[600px] bg-gradient-to-tl from-lime-500/10 to-green-500/5 rounded-full blur-3xl -z-10"
      aria-hidden="true"
    ></div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
      <!-- Logo Header with Glass Effect -->
      <NMLogo variant="service" size="large" />

      <!-- Main Content Card -->
      <div class="mx-auto max-w-4xl text-center mt-16">
        <div
          class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-lime-500/10 to-green-500/10 backdrop-blur-sm border border-lime-500/30 rounded-full mb-6 shadow-lg"
        >
          <svg class="w-5 h-5 text-lime-400" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
              clip-rule="evenodd"
            />
          </svg>
          <span class="text-sm font-semibold text-lime-400"
            >Installation & Service Excellence</span
          >
        </div>

        <h2
          class="text-center text-4xl sm:text-5xl font-bold drop-shadow-lg animate-fadeIn mb-6 text-white"
        >
          Complete
          <span
            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
            >Security & Infrastructure</span
          ><span
            class="text-transparent bg-clip-text bg-gradient-to-r from-green-100 to-white/30"
          >
            Solutions</span
          >
        </h2>

        <p class="text-xl text-gray-300 leading-relaxed mb-12 max-w-3xl mx-auto">
          From surveillance to life safety, access management to network infrastructure—we deliver comprehensive security solutions tailored to your needs. Available 24/7 across New Mexico, our certified technicians ensure your systems run flawlessly. Need representation for your out-of-state clients? We're your trusted boots on the ground with top ratings on Field Nation and Work Market.
        </p>
      </div>

      <!-- Why Choose Section with Glass Card -->
      <div
        class="bg-gray-800/40 backdrop-blur-md rounded-2xl border border-green-500/20 p-8 sm:p-12 shadow-2xl mt-16"
      >
       <div
          class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-lime-500/10 to-green-500/10 backdrop-blur-sm border border-lime-500/30 rounded-full mb-6 shadow-lg"
        >
          <svg class="w-5 h-5 text-lime-400" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
              clip-rule="evenodd"
            />
          </svg>
          <span class="text-sm font-semibold text-lime-400"
            >Field Engineering & Smart Hands</span
          >
        </div>
        <h2
          class="text-center text-4xl sm:text-5xl font-bold drop-shadow-lg animate-fadeIn mb-6 text-white"
        >
          Why Choose
          <span
            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
            >NM Technology?</span
          >
        </h2>
        <p
          class="text-lg text-gray-300 text-center mb-10 animate-fadeIn-delay leading-relaxed"
        >
          We specialize in
          <strong class="text-green-400"
            >end-to-end security infrastructure</strong
          >—from initial design and installation through ongoing maintenance and support. Our team brings enterprise-grade expertise to every project, whether it's protecting a single facility or managing multi-site deployments across New Mexico.<br /><br />
          As your local Field Engineering partner, we extend your reach into the Southwest. Your clients receive the same professional, responsive service they'd expect from your own team—because when we're on-site, we represent your brand as our own.
        </p>

        <!-- Partner Logos -->
        <div
          class="flex flex-wrap justify-center items-center gap-10 mt-12 pt-8 border-t border-green-600/20"
        >
          <img
            :src="ubiquityLogo"
            class="h-14 object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
            alt="Ubiquity"
          />
          <img
            :src="linovisionLogo"
            class="h-14 object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
            alt="Linovision"
          />
          <img
            :src="zwaveLogo"
            class="h-14 object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
            alt="ZWave"
          />
          <img
            :src="allegionLogo"
            class="h-14 object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
            alt="Allegion"
          />
          <img
            :src="teltonikaLogo"
            class="h-14 object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
            alt="Teltonika"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import NMLogo from './NMLogo.vue'
import ubiquityLogo from '../../images/ubiquity-logo.webp';
import linovisionLogo from '../../images/linovision-logo.webp';
import zwaveLogo from '../../images/zwave-logo.webp';
import allegionLogo from '../../images/allegion-logo.webp';
import teltonikaLogo from '../../images/teltonika-logo.webp';
</script>

<style scoped>
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(30px) scale(0.95);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}
@keyframes fadeIn-delay {
  from {
    opacity: 0;
    transform: translateY(30px);
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
  animation: fadeIn-delay 1.4s ease-out 0.3s forwards;
  opacity: 0;
}
</style>
