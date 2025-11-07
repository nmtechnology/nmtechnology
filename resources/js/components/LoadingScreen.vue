<template>
  <div
    class="fixed inset-0 w-full h-full bg-gradient-to-b from-gray-900 via-black to-gray-900 flex flex-col items-center justify-center overflow-hidden z-50"
    :class="{ 'animate-fadeOut': isLeaving }"
  >
    <!-- Decorative Background Blurs -->
    <div
      class="absolute top-20 left-1/4 w-[600px] h-[600px] bg-gradient-to-br from-purple-500/10 to-blue-400/10 rounded-full blur-3xl -z-10 animate-pulse"
      style="animation-duration: 3s"
    ></div>
    <div
      class="absolute bottom-20 right-1/4 w-[500px] h-[500px] bg-gradient-to-tr from-blue-400/10 to-purple-500/10 rounded-full blur-3xl -z-10 animate-pulse"
      style="animation-duration: 4s"
    ></div>

    <!-- Background Pattern -->
    <svg
      class="absolute inset-0 -z-10 h-full w-full stroke-purple-600/10 [mask-image:radial-gradient(40rem_30rem_at_center,white,transparent)]"
      aria-hidden="true"
    >
      <defs>
        <pattern
          id="loading-pattern"
          width="100"
          height="100"
          x="50%"
          y="-1"
          patternUnits="userSpaceOnUse"
        >
          <path d="M.5 200V.5H200" fill="none" />
        </pattern>
      </defs>
      <rect width="100%" height="100%" stroke-width="0" fill="url(#loading-pattern)" />
    </svg>

    <!-- Glass Container -->
    <div
      class="relative z-10 bg-gray-800/30 backdrop-blur-md rounded-3xl border border-purple-500/20 p-12 shadow-2xl animate-fadeIn opacity-0"
      style="animation-delay: 0.2s"
    >
      <!-- Logo -->
      <div class="flex justify-center mb-8">
        <div class="relative">
          <div
            class="absolute inset-0 bg-gradient-to-r from-purple-400 to-blue-400 rounded-2xl blur-xl opacity-50"
          ></div>
          <div class="relative">
            <NMLogo variant="loading" size="xl" :showBorder="false" />
          </div>
        </div>
      </div>

      <!-- Welcome Text -->
      <div
        class="text-center mb-10 animate-fadeIn opacity-0"
        style="animation-delay: 0.5s"
      >
        <h2 class="text-4xl sm:text-5xl font-bold mb-3">
          <span class="text-white">Welcome to </span>
          <span
            class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400"
          >
            NM Technology
          </span>
        </h2>
        <p class="text-gray-400 text-lg mt-3">Loading your security solutions...</p>
      </div>

      <!-- Progress Bar -->
      <div
        class="progress-container w-80 max-w-full animate-fadeIn opacity-0"
        style="animation-delay: 0.8s"
      >
        <div
          class="h-2 w-full bg-gray-700/50 rounded-full overflow-hidden backdrop-blur-sm border border-purple-600/20"
        >
          <div
            ref="progressBar"
            class="progress-bar h-full bg-gradient-to-r from-purple-500 to-blue-400 rounded-full transition-all duration-[2500ms] ease-out w-0 shadow-lg"
          ></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, nextTick, defineExpose } from "vue";
import NMLogo from "./NMLogo.vue";

const progressBar = ref(null);
const isLeaving = ref(false);

// Expose the startLeaving method to parent
defineExpose({
  startLeaving: () => {
    isLeaving.value = true;
  },
});

onMounted(() => {
  // Ensure the DOM is ready
  nextTick(() => {
    // Force a reflow to ensure the initial width of 0 is rendered
    progressBar.value.getBoundingClientRect();
    // Set to 100% width to trigger the animation
    progressBar.value.style.width = "100%";
  });
});
</script>

<style scoped>
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px) scale(0.95);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

@keyframes fadeOut {
  from {
    opacity: 1;
    transform: scale(1);
  }
  to {
    opacity: 0;
    transform: scale(0.95);
  }
}

.animate-fadeIn {
  animation: fadeIn 0.8s ease-out forwards;
}

.animate-fadeOut {
  animation: fadeOut 0.5s ease-out forwards;
}

.progress-bar {
  box-shadow: 0 0 30px rgba(168, 85, 247, 0.6), 0 0 60px rgba(96, 165, 250, 0.3);
}
</style>
