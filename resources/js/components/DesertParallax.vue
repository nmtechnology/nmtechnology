<template>
  <div :class="['parallax-container', fixedImage ? 'h-[55vh]' : 'h-64 sm:h-96']">
    <img
      class="parallax-img"
      :class="fixedImage ? 'bg-fixed' : ''"
      src="/public/images/desert.webp"
      alt="Desert"
    >
    <div class="parallax-gradient"></div>
    <!-- <div class="parallax-content">
      <h2 class="parallax-title">New Mexico Security Starts Here</h2>
      <p class="parallax-tagline">Desert-tested, trusted by New Mexico homes & businesses</p>
    </div> -->
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
})
</script>

<style scoped>
.parallax-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 95vh;
  overflow: hidden;
  z-index: -1; /* Use -1 to ensure the parallax is always behind all content */
  display: flex;
  align-items: center;
  justify-content: center;
}
.parallax-img {
  position: relative;
  width: auto;
  height: 100%;
  max-width: 100vw;
  max-height: 100%;
  object-fit: contain;
  object-position: center;
  opacity: 0;
  animation: fadeIn 2.5s ease-out forwards;
  z-index: 0;
}
.bg-fixed {
  background-attachment: fixed;
}
.parallax-gradient {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.6) 0%, transparent 100%);
  pointer-events: none;
  z-index: 1;
}
.parallax-content {
  position: absolute;
  bottom: 1rem;
  left: 50%;
  transform: translateX(-50%);
  text-align: center;
  width: 100%;
  padding: 0 1rem;
  z-index: 2;
}
.parallax-title {
  font-size: 2rem;
  font-weight: bold;
  color: #fff;
  text-shadow: 0 2px 8px rgba(16,185,129,0.15);
  animation: fadeIn 1.2s ease-out;
}
.parallax-tagline {
  margin-top: 0.5rem;
  font-size: 1rem;
  color: #FFD700;
  animation: fadeIn 1.2s ease-out 0.5s forwards;
  opacity: 0;
}
@keyframes fadeIn {
  from { opacity: 0; transform: scale(1.05); }
  to { opacity: 1; transform: scale(1); }
}
@media (max-width: 640px) {
  .parallax-container {
    height: 32vh;
  }
  .parallax-img {
    min-height: 400px;
    object-position: center;
  }
}
@media (max-width: 350px) {
  .parallax-container {
    display: none;
  }
}
</style>
