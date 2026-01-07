hn.m,/<template>
  <div
    class="fixed inset-0 w-full h-full bg-gradient-to-b from-black via-gray-900 to-gray-900 flex flex-col items-center justify-center overflow-hidden z-50"
    :class="{ 'animate-fadeOut': isLeaving }"
  >
    <!-- Decorative Background Blurs -->
    <div
      class="absolute top-20 left-1/4 w-[600px] h-[600px] bg-gradient-to-br from-red-500/10 to-blue-400/10 rounded-full blur-3xl -z-10 animate-pulse"
      style="animation-duration: 3s"
    ></div>
    <div
      class="absolute bottom-20 right-1/4 w-[500px] h-[500px] bg-gradient-to-tr from-red-400/10 to-blue-500/10 rounded-full blur-3xl -z-10 animate-pulse"
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
      class="relative z-10 bg-gray-800/30 backdrop-blur-md rounded-3xl border border-red-500/20 p-12 shadow-2xl ring-2 ring-red-500/10 shadow-red-500/5 animate-fadeIn opacity-0"
      style="animation-delay: 0.2s"
    >
      <!-- Logo with NM Technology styling -->
      <div class="flex justify-center mb-8">
        <div class="relative">
          <!-- Glow effect behind logo -->
          <div
            class="absolute inset-0 bg-gradient-to-r from-red-400/20 to-blue-400/20 rounded-2xl blur-xl"
          ></div>
          <div class="relative bg-gray-900/50 backdrop-blur-sm rounded-2xl border border-red-500/20 p-6">
            <NMLogo variant="loading" size="xl" />
          </div>
        </div>
      </div>

      <!-- Welcome Text -->
      <div
        class="text-center mb-10 animate-fadeIn opacity-0"
        style="animation-delay: 0.5s"
      >
        <h2 class="text-4xl sm:text-5xl font-bold mb-3">
          <span class="text-white">Securing </span>
          <span
            class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-blue-400"
          >
            New Mexico
          </span>
        </h2>
        <p class="text-gray-300 text-lg mt-3">Loading your security solutions...</p>
        
        <!-- Security badges -->
        <div class="flex justify-center gap-4 mt-6">
          <div class="flex items-center gap-2 bg-red-500/10 border border-red-500/20 rounded-full px-4 py-2">
            <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-7-4z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sm font-semibold text-green-400">CCTV Systems</span>
          </div>
          <div class="flex items-center gap-2 bg-green-500/10 border border-green-500/20 rounded-full px-4 py-2">
            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sm font-semibold text-green-400">Access Control</span>
          </div>
        </div>
      </div>

      <!-- Progress Bar -->
      <div
        class="progress-container w-80 max-w-full animate-fadeIn opacity-0"
        style="animation-delay: 0.8s"
      >
        <div class="mb-2 flex justify-between text-sm text-gray-400">
          <span>Initializing Security Systems</span>
          <span class="text-green-400 font-semibold">Professional Excellence</span>
        </div>
        <div
          class="h-3 w-full bg-gray-700/50 rounded-full overflow-hidden backdrop-blur-sm border border-green-600/20 shadow-inner"
        >
          <div
            ref="progressBar"
            class="progress-bar h-full bg-gradient-to-r from-green-500 to-lime-400 rounded-full transition-all duration-[2500ms] ease-out w-0 shadow-lg relative"
          >
            <!-- Shimmer effect -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -skew-x-12 animate-shimmer"></div>
          </div>
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

@keyframes shimmer {
  0% {
    transform: translateX(-100%) skewX(-12deg);
  }
  100% {
    transform: translateX(200%) skewX(-12deg);
  }
}

.animate-fadeIn {
  animation: fadeIn 0.8s ease-out forwards;
}

.animate-fadeOut {
  animation: fadeOut 0.5s ease-out forwards;
}

.animate-shimmer {
  animation: shimmer 2s infinite;
}

.progress-bar {
  box-shadow: 0 0 20px rgba(34, 197, 94, 0.6), 0 0 40px rgba(132, 204, 22, 0.3);
  position: relative;
}

/* Enhanced glow effect for the container */
.relative.z-10 {
  box-shadow: 
    0 25px 50px -12px rgba(34, 197, 94, 0.15),
    0 0 0 1px rgba(34, 197, 94, 0.1),
    inset 0 1px 0 rgba(255, 255, 255, 0.1);
}
</style>
