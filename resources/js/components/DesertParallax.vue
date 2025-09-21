<template>
  <div :class="['parallax-container', fixedImage ? 'h-[55vh]' : 'h-screen']">
    <div class="parallax-overlay"></div>
    <img
      class="parallax-img"
      :class="fixedImage ? 'bg-fixed' : ''"
      src="/public/images/desert.webp"
      alt="Desert"
    >
    <div class="parallax-gradient"></div>
  </div>
</template>

<script setup>
import { defineProps, onMounted, onUnmounted } from 'vue'
const props = defineProps({ fixedImage: Boolean })

onMounted(() => {
  const img = document.querySelector('.parallax-img')
  let scrollHandler = null
  if (img && window.innerWidth > 640 && !props.fixedImage) {
    scrollHandler = () => {
      const scrolled = window.scrollY
      img.style.transform = `translateY(${scrolled * 0.15}px)`
    }
    window.addEventListener('scroll', scrollHandler)
  }
  
  return () => {
    if (scrollHandler) {
      window.removeEventListener('scroll', scrollHandler)
    }
  }
})
</script>

<style scoped>
.parallax-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  overflow: hidden;
  z-index: -1000; /* Far back in the stacking order */
}

.parallax-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.4);
  z-index: -998;
}

.parallax-img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  opacity: 0;
  animation: fadeIn 2.5s ease-out forwards;
  z-index: -999;
}

.bg-fixed {
  background-attachment: fixed;
}

.parallax-gradient {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.2) 100%);
  pointer-events: none;
  z-index: -997;
}

@keyframes fadeIn {
  from { opacity: 0; transform: scale(1.05); }
  to { opacity: 1; transform: scale(1); }
}

@media (max-width: 640px) {
  .parallax-container {
    height: 100vh;
  }
  .parallax-img {
    height: 100%;
    object-position: center;
  }
}

@media (max-width: 350px) {
  .parallax-container {
    height: 100vh;
  }
}
</style>
