<template>
  <div v-if="isLoading" class="fixed inset-0 w-full h-full bg-gray-900 flex flex-col items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-radial from-emerald-500/10 to-transparent pointer-events-none"></div>
    <div class="logo-container z-10" :class="{ 'visible': showLoadingAnimation }">
      <img :src="nmTechnologyLogo" alt="NM Technology" class="logo w-48 h-auto mb-8">
    </div>
    <div class="loading-text z-10" :class="{ 'visible': showLoadingAnimation }">
      Welcome to NM Technology
    </div>
    <div class="progress-bar-container z-10" :class="{ 'visible': showLoadingAnimation }">
      <div class="progress-bar"></div>
    </div>
  </div>
  <slot v-else></slot>
</template>

<script>
import nmTechnologyLogo from '../../images/nm-technology-logo.webp';

export default {
  name: 'AuthGuard',
  data() {
    return {
      nmTechnologyLogo,
    return {
      isLoading: false,
      showLoadingAnimation: false,
    }
  },
  created() {
    // Check if this is the initial verification
    const isInitialVerification = localStorage.getItem('isInitialVerification') === 'true';
    
    if (isInitialVerification) {
      this.isLoading = true;
      // Start showing animations after a brief delay
      setTimeout(() => {
        this.showLoadingAnimation = true;
      }, 100);
      
      // Remove the initial verification flag
      localStorage.removeItem('isInitialVerification');
      
      // After animations complete, hide loading screen
      setTimeout(() => {
        this.isLoading = false;
      }, 3500);
    }
  }
}
</script>

<style scoped>
.logo-container {
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.8s ease-out;
}

.logo-container.visible {
  opacity: 1;
  transform: translateY(0);
}

.logo {
  filter: drop-shadow(0 0 20px rgba(16, 185, 129, 0.3));
}

.loading-text {
  color: #10b981;
  font-size: 1.75rem;
  font-weight: 500;
  margin-bottom: 2rem;
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.8s ease-out 0.2s;
  text-shadow: 0 0 10px rgba(16, 185, 129, 0.2);
}

.loading-text.visible {
  opacity: 1;
  transform: translateY(0);
}

.progress-bar-container {
  width: 300px;
  height: 4px;
  background-color: rgba(55, 65, 81, 0.5);
  border-radius: 4px;
  overflow: hidden;
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.8s ease-out 0.4s;
  box-shadow: 0 0 15px rgba(16, 185, 129, 0.1);
}

.progress-bar-container.visible {
  opacity: 1;
  transform: translateY(0);
}

.progress-bar {
  height: 100%;
  width: 0%;
  background-color: #10b981;
  transition: width 3s cubic-bezier(0.4, 0, 0.2, 1);
  box-shadow: 0 0 10px rgba(16, 185, 129, 0.5);
}

.progress-bar-container.visible .progress-bar {
  width: 100%;
}

@keyframes gradient {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
</style>
