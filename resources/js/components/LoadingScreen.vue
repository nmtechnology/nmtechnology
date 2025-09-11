<template>
  <div class="fixed inset-0 w-full h-full bg-gray-900 flex flex-col items-center justify-center overflow-hidden z-50"
       :class="{ 'animate-fadeOut': isLeaving }">
    <!-- Background Pattern -->
    <svg class="absolute inset-0 -z-10 h-full w-full stroke-slate-600 [mask-image:radial-gradient(40rem_30rem_at_center,white,transparent)]"
        aria-hidden="true">
      <defs>
        <pattern id="loading-pattern" width="100" height="100" x="50%" y="-1" patternUnits="userSpaceOnUse">
          <path d="M.5 200V.5H200" fill="none" />
        </pattern>
      </defs>
      <rect width="100%" height="100%" stroke-width="0" fill="url(#loading-pattern)" />
    </svg>

    <!-- Logo and Text -->
    <div class="logo-container z-10 animate-fadeIn opacity-0" style="animation-delay: 0.2s;">
      <img src="/public/images/nm-logo-rmbg.webp" alt="NM Technology" class="w-50 h-40 mb-8">
    </div>
    
    <div class="welcome-text z-10 animate-fadeIn opacity-0 mb-8" style="animation-delay: 0.5s;">
      <h2 class="text-3xl font-bold text-white text-center">
        Welcome to <span class="text-green-500">NM Technology</span>
      </h2>
    </div>

    <!-- Progress Bar -->
    <div class="progress-container z-10 w-64 animate-fadeIn opacity-0" style="animation-delay: 0.8s;">
      <div class="h-1 w-full bg-gray-700 rounded-full overflow-hidden">
        <div ref="progressBar" class="progress-bar h-full bg-green-500 rounded-full transition-all duration-[2500ms] ease-out w-0"></div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, nextTick, defineExpose } from 'vue';

const progressBar = ref(null);
const isLeaving = ref(false);

// Expose the startLeaving method to parent
defineExpose({
  startLeaving: () => {
    isLeaving.value = true;
  }
});

onMounted(() => {
  // Ensure the DOM is ready
  nextTick(() => {
    // Force a reflow to ensure the initial width of 0 is rendered
    progressBar.value.getBoundingClientRect();
    // Set to 100% width to trigger the animation
    progressBar.value.style.width = '100%';
  });
});
</script>

<style scoped>
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeOut {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}

.animate-fadeIn {
  animation: fadeIn 0.8s ease-out forwards;
}

.animate-fadeOut {
  animation: fadeOut 0.5s ease-out forwards;
}

.progress-bar {
  box-shadow: 0 0 20px rgba(16, 185, 129, 0.5);
}
</style>
