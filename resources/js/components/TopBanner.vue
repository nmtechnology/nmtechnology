<template>
  <div class="fixed overflow-hidden bg-gray-900 px-6 py-2 sm:px-3.5 z-40 w-full h-12">
    <!-- Simplified background with reduced visual impact -->
    <div class="absolute left-1/2 top-1/2 -z-10 -translate-x-1/2 -translate-y-1/2 transform-gpu blur-xl"
      aria-hidden="true">
      <div class="aspect-[577/310] w-[30rem] bg-gradient-to-r from-[#67cbf2] to-[#f489fc] opacity-20" />
    </div>
    <div class="flex items-center justify-center h-full">
      <p class="text-sm leading-6 text-white flex items-center animate-bannerPulse">
        <strong class="font-bold text-white drop-shadow">New Mexico's Top Security Experts</strong>
        <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true">
          <circle cx="5" cy="5" r="5" />
        </svg>
        <!-- <span class="ml-2 text-white font-bold">Check Us Out On Yelp!</span> -->
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
  height: 48px; /* Fixed height */
  min-height: 48px;
  max-height: 48px;
  box-sizing: border-box;
}

/* Responsive adjustments */
@media (min-width: 768px) {
  .fixed.overflow-hidden {
    height: 48px; /* Keep consistent height on larger screens */
  }
}

/* Container for elements inside the banner */
.flex.items-center.justify-center {
  max-width: 1400px;
  margin: 0 auto;
  height: 100%;
}

@keyframes bannerPulse {
  0%, 100% { filter: brightness(1); }
  50% { filter: brightness(1.3); }
}
.animate-bannerPulse {
  animation: bannerPulse 2.5s infinite;
}
</style>