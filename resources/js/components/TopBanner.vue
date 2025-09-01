<template>
  <div class="overflow-hidden bg-gray-900 fixed z-50 mt-20 w-screen">
    <!-- Halloween Promo Banner -->
    <div class="halloween-promo-container mb-2 w-full" v-if="showHalloweenPromo">
      <img src="/public/images/halloween-promo-banner.png" alt="Halloween Promotion" class="halloween-banner w-full" />
      <button @click="closeHalloweenPromo" class="close-promo-btn" aria-label="Close promotion">
        <XMarkIcon class="h-5 w-5" aria-hidden="true" />
      </button>
    </div>
    
    <div class="flex gap-x-4 gap-y-2 justify-center px-6 py-2 sm:px-3.5">
      <img src="/public/images/usa-flag.webp" alt="USA Flag" class="h-8 w-auto animate-pulse" />
      <p class="text-sm leading-6 text-white">
        <strong class="font-semibold">Check Us Out On Yelp!</strong><svg viewBox="0 0 2 2"
          class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true">
          <circle cx="5" cy="5" r="5" />
        </svg>
      </p>

      <a href="tel:+1-505-659-5097"
        class="rounded-xl bg-green-700 px-3.5 py-1 text-sm font-semibold flex text-gray-900 shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900 text-center">CALL
        TODAY!<span aria-hidden="true"></span></a>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { XMarkIcon } from '@heroicons/vue/20/solid';


const showHalloweenPromo = ref(true);

// Check if the user has already closed the promo banner
onMounted(() => {
  const hasClosedPromo = localStorage.getItem('halloweenPromoClosed');
  if (hasClosedPromo) {
    showHalloweenPromo.value = false;
  }
});

// Function to close the promo banner
const closeHalloweenPromo = () => {
  showHalloweenPromo.value = false;
  localStorage.setItem('halloweenPromoClosed', 'true');
};
</script>

<style scoped>
.halloween-promo-container {
  position: relative;
  width: 100%;
  display: flex;
  justify-content: center;
  overflow: hidden;
  background-color: #000;
}

.halloween-banner {
  width: 100%;
  height: auto;
  max-height: 120px;
  object-fit: cover;
}

.close-promo-btn {
  position: absolute;
  top: 10px;
  right: 20px;
  background-color: rgba(0, 0, 0, 0.7);
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  border: none;
  cursor: pointer;
  transition: background-color 0.2s;
  z-index: 10;
}

.close-promo-btn:hover {
  background-color: rgba(0, 0, 0, 0.7);
}
</style>
