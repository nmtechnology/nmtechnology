<template>
  <div class="root w-full">
    <!-- Modal Trigger Button -->
    <button @click="openModal" class="w-full inline-flex items-center justify-center px-3 py-1.5 bg-red-600 border border-red-700 rounded-md font-medium text-white text-sm hover:bg-red-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span class="text-center">Why Security?</span>
    </button>

    <teleport to="body">
      <div v-if="isOpen" class="modal" @click.self="closeModal">
        <div class="isolate bg-gray-900 modal-content">
          <div class="modal-header">
            <button class="text-white close-button" @click="closeModal">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l-1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>

          <!-- SecurityFAQs content -->
          <div class="mx-auto grid max-w-7xl grid-cols-1">
            <div class="relative px-4 sm:px-6 pb-12 sm:pb-20 pt-12 sm:pt-24">
              <div class="mx-auto max-w-4xl">
                <div class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden ring-1 ring-white/5">
                  <div class="absolute inset-0 bg-gradient-to-br from-gray-800/80 to-gray-800/60"></div>
                </div>
                <!-- Learning Center quick links -->
                <div class="mb-6 flex flex-wrap gap-3">
                  <router-link class="nmt-chip-link" :to="{ path: '/learn', hash: '#onvif' }">ONVIF protocols</router-link>
                  <router-link class="nmt-chip-link" :to="{ path: '/learn', hash: '#poe' }">PoE classes</router-link>
                  <router-link class="nmt-chip-link" :to="{ path: '/learn', hash: '#fire-alarm-cabling' }">Fire alarm wiring</router-link>
                  <router-link class="nmt-chip-link" :to="{ path: '/learn', hash: '#access-control' }">Access control</router-link>
                  <router-link class="nmt-chip-link" :to="{ path: '/learn', hash: '#alarm-insurance' }">Alarm & Insurance FAQ</router-link>
                  <router-link class="nmt-chip-link" :to="{ path: '/learn' }">Open Learning Center</router-link>
                </div>
                <SecurityFAQs @scroll-to="handleScrollTo" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </teleport>
  </div>
</template>

<script>
import { ref } from 'vue';
import SecurityFAQs from './SecurityFAQs.vue';

export default {
  name: 'SecurityFAQsModal',
  components: {
    SecurityFAQs
  },
  setup() {
    const isOpen = ref(false);

    const openModal = () => {
      isOpen.value = true;
      document.body.style.overflow = 'hidden';
    };

    const closeModal = () => {
      isOpen.value = false;
      document.body.style.overflow = '';
    };

    // No longer needed since we're opening the modal directly
    // Keeping this as a reference in case we need to navigate elsewhere
    const navigateToProducts = () => {
      console.log('Navigate to products function is no longer used');
    };
    
    // Handler for scroll-to events from SecurityFAQs component
    // This handles the case when users click on links/buttons inside the FAQs component
    const handleScrollTo = (targetId) => {
      // Close modal first
      closeModal();
      
      // Wait for modal to close before navigating
      setTimeout(() => {
        console.log(`SecurityFAQsModal: Navigating to ${targetId}`);
        
        // Navigate to the appropriate section on the CCTV page
        if (targetId === 'products' || targetId === 'product-grid') {
          window.location.href = '/products#product-grid';
        } else if (targetId === 'packages') {
          window.location.href = '/products#package-section';
        } else if (targetId === 'monitoring') {
          window.location.href = '/products#monitoring-section';
        }
      }, 300);
    };

    return {
      isOpen,
      openModal,
      closeModal,
      navigateToProducts,
      handleScrollTo
    };
  }
};
</script>

<style scoped>
.modal {
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(3, 13, 30, 0.85);
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    overflow-y: auto;
    z-index: 50;
    padding: 1rem;
}

.modal-content {
    margin-top: 120px; /* Adjusted to position below navbar and TopBanner */
    margin-bottom: 2rem;
    width: 100%;
    max-width: 1200px;
    border-radius: 1.5rem;
    position: relative;
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
    animation: modalSlideDown 0.3s ease-out;
    border: 3px solid #16a34a; /* Adding green border with site's green theme color */
}

.modal-header {
    position: relative;
    padding-top: 1rem;
    padding-right: 1rem;
    display: flex;
    justify-content: flex-end;
}

.close-button {
    border-radius: 9999px;
    padding: 0.5rem;
    background-color: rgba(255, 255, 255, 0.1);
    transition: background-color 0.2s;
}

.close-button:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

@media (max-width: 640px) {
    .modal-content {
        margin-top: 1rem;
    }
}

@media (min-width: 768px) {
    .modal {
        align-items: flex-start;
        padding: 2rem;
    }
    
    .modal-content {
        margin-top: 120px;
    }
}

/* Animation for modal appearance */
@keyframes modalSlideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
