<template>
  <div :class="['relative w-full', fixedImage ? 'h-[55vh]' : 'h-64 sm:h-96']">
    <img
      class="mx-auto w-full h-full object-cover bg-center bg-no-repeat shadow-lg desert-parallax-img"
      :class="fixedImage ? 'bg-fixed' : ''"
      src="/public/images/desert.webp"
      alt="Desert"
    >
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent pointer-events-none"></div>
    <!-- Optional: Add a title or tagline here for more engagement -->
    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 text-center w-full px-4">
      <h2 class="text-2xl sm:text-4xl font-bold text-white drop-shadow-lg animate-fadeIn">New Mexico Security Starts Here</h2>
      <p class="mt-2 text-base text-yellow-400 animate-fadeIn-delay">Desert-tested, trusted by New Mexico homes & businesses</p>
    </div>
  </div>
</template>

<script setup>
import { defineProps, onMounted } from 'vue'
const props = defineProps({ fixedImage: Boolean })

onMounted(() => {
  // Parallax effect for desktop
  const img = document.querySelector('.desert-parallax-img')
  if (img && window.innerWidth > 640 && !props.fixedImage) {
    window.addEventListener('scroll', () => {
      const scrolled = window.scrollY
      img.style.transform = `translateY(${scrolled * 0.15}px)`
    })
  }
})
</script>

<style scoped>
.desert-parallax-img {
  opacity: 0;
  animation: fadeIn 2.5s ease-out forwards;
}

@keyframes fadeIn {
  from { opacity: 0; transform: scale(1.05); }
  to { opacity: 1; transform: scale(1); }
}

@media (max-width: 640px) {
  .desert-parallax-img {
    min-height: 400px;
    object-position: center;
  }
}

.animate-fadeIn-delay {
  animation: fadeIn 1.2s ease-out 0.5s forwards;
  opacity: 0;
}
</style>
