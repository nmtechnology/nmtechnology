<template>
  <div v-if="isLoading" class="min-h-screen bg-gray-900 flex items-center justify-center">
    <div class="text-white text-lg">Loading...</div>
  </div>
  <slot v-else></slot>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';

const props = defineProps({
  requireAuth: {
    type: Boolean,
    default: true
  }
});

const router = useRouter();
const isLoading = ref(true);

// Add the handleBannerDismiss method that was missing
const handleBannerDismiss = () => {
  // Method to handle banner dismissal
  console.log('Banner dismissed');
};

onMounted(() => {
  console.log('AuthGuard mounted, requireAuth:', props.requireAuth);
  
  if (props.requireAuth) {
    // Check if user has completed the human verification
    const humanVerified = localStorage.getItem('humanVerified');
    const verifiedTimestamp = localStorage.getItem('humanVerifiedTimestamp');
    
    console.log('Auth check:', { humanVerified, verifiedTimestamp });
    
    if (!humanVerified || !verifiedTimestamp) {
      // No verification found, redirect to landing page
      console.log('No verification found, redirecting to landing page');
      router.push('/');
      return;
    }
    
    // Check if verification has expired (24 hours)
    const elapsed = Date.now() - parseInt(verifiedTimestamp);
    const dayInMs = 24 * 60 * 60 * 1000;
    
    console.log('Time since verification:', elapsed, 'ms');
    
    if (elapsed > dayInMs) {
      // Verification expired, redirect to landing page
      console.log('Verification expired, redirecting to landing page');
      localStorage.removeItem('humanVerified');
      localStorage.removeItem('humanVerifiedTimestamp');
      router.push('/');
      return;
    }
  }
  
  isLoading.value = false;
});
</script>
