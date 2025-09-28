<template>
  <div class="fixed top-16 overflow-hidden bg-gray-900 px-3 sm:px-6 py-2 z-30 w-full">
    <!-- Simplified background with reduced visual impact -->
    <div class="absolute left-1/2 top-0 -z-10 -translate-x-1/2 -translate-y-1/2 transform-gpu blur-xl"
      aria-hidden="true">
      <div class="aspect-[577/310] w-[30rem] bg-gradient-to-r from-[#4b74d5] to-[#f489fc] opacity-20" />
    </div>
    <div class="flex items-center justify-center h-full">
      <p class="text-xs sm:text-sm leading-tight sm:leading-6 text-white flex flex-col sm:flex-row items-center animate-bannerPulse">
        <strong class="font-bold text-white drop-shadow whitespace-nowrap">New Mexico's Top Security Experts</strong>
        <svg viewBox="0 0 2 2" class="mx-2 hidden sm:inline h-0.5 w-0.5 fill-current" aria-hidden="true">
          <circle cx="5" cy="5" r="5" />
        </svg>
        <span class="mt-1 sm:mt-0 sm:ml-2 text-white font-bold text-xs sm:text-sm whitespace-nowrap">CCTV • Security • Fire</span>
      </p>
    </div>
  </div>
</template>

<script setup>
import { XMarkIcon } from '@heroicons/vue/20/solid'
</script>

<style scoped>
/* Ensure top banner maintains consistent size */
.fixed.overflow-hidden {
  max-width: 100%;
  height: auto;
  min-height: 40px;
  box-sizing: border-box;
}

/* Responsive adjustments */
@media (min-width: 640px) {
  .fixed.overflow-hidden {
    min-height: 48px;
  }
}

/* Container for elements inside the banner */
.flex.items-center.justify-center {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0.5rem 0;
}

@keyframes bannerPulse {
  0%, 100% { filter: brightness(1); }
  50% { filter: brightness(1.3); }
}
.animate-bannerPulse {
  animation: bannerPulse 2.5s infinite;
}
</style>