<template>
  <div class="overflow-hidden bg-gray-900 px-6 py-2 sm:px-3.5 relative z-20 mt-20 w-full">
    <!-- Simplified background with reduced visual impact -->
    <div class="absolute left-1/2 top-1/2 -z-10 -translate-x-1/2 -translate-y-1/2 transform-gpu blur-xl" aria-hidden="true">
      <div class="aspect-[577/310] w-[30rem] bg-gradient-to-r from-[#67cbf2] to-[#89c2fc] opacity-20" />
    </div>
    <div class="flex gap-x-4 gap-y-2 justify-center">
      <img src="/public/images/usa-flag.webp" alt="" class="h-8 w-auto animate-pulse" />
      <p class="text-sm leading-6 text-white">
        <strong class="font-semibold">Check Us Out On Yelp!</strong><svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true"><circle cx="5" cy="5" r="5" /></svg>
      </p>
    
      <a href="tel:+1-505-659-5097" class="rounded-xl bg-green-700 px-3.5 py-1 text-sm font-semibold flex text-gray-900 shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900 text-center">CALL TODAY!<span aria-hidden="true"></span></a>
    </div>
  </div>
</template>

<script setup>
import { XMarkIcon } from '@heroicons/vue/20/solid'
</script>
