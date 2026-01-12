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
      <div v-if="isOpen" class="relative z-50">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/80" aria-hidden="true" @click.self="closeModal"></div>

        <!-- Modal container (fixed & scrollable) -->
        <div class="fixed inset-0 z-50 w-screen overflow-y-auto">
          <div class="flex min-h-full items-start justify-center p-4">
            <div class="modal-content relative bg-black w-full max-w-4xl rounded-2xl border border-green-600/50 shadow-2xl transform transition-all duration-300">
              <div class="modal-header relative flex items-center justify-between px-6 py-6">
                <div class="flex items-center gap-2">
                  <button
                    v-if="!showInlineLearn"
                    @click="openInlineLearn()"
                    class="nmt-chip-link inline-flex items-center justify-center gap-2 px-3 py-1.5 bg-red-600 border border-red-700 rounded-md font-medium text-white text-sm hover:bg-red-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20l9-5-9-5-9 5 9 5z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l9-5-9-5-9 5 9 5z" opacity="0.4" />
                    </svg>
                    <span>Technology Learning Center</span>
                  </button>

                  <button
                    v-else
                    @click="closeInlineLearn()"
                    class="nmt-chip-link inline-flex items-center justify-center gap-2 px-3 py-1.5 bg-red-600 border border-red-700 rounded-md font-medium text-white text-sm hover:bg-red-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300"
                  >
                    <span class="text-sm">◀</span>
                    <span>Back to FAQs</span>
                  </button>
                </div>

                <!-- Center logo -->
                <div class="absolute left-1/2 transform -translate-x-1/2 pointer-events-none">
                  <NMLogo variant="service" size="small" />
                </div>

                <button class="text-white close-button" @click="closeModal">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l-1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>

              <!-- Scrollable body (matches Contact modal pattern) -->
              <div class="px-6 pb-8 pt-0 max-h-[calc(100vh-200px)] overflow-y-auto">
                <div class="mx-auto max-w-4xl">
                  <div class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden ring-1 ring-white/5">
                    <div class="absolute inset-0 bg-black rounded"></div>
                  </div>

                  <template v-if="!showInlineLearn">
                    <SecurityFAQs @scroll-to="handleScrollTo" />
                  </template>

                  <template v-else>
                    <div class="learn-inline">
                      <component :is="inlineLearnComp" :initialHash="currentLearnHash" />
                    </div>
                  </template>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </teleport>
  </div>
</template>

<script>
import { ref, nextTick } from 'vue';
import { useRouter } from 'vue-router';
import SecurityFAQs from './SecurityFAQs.vue';
import NMLogo from './NMLogo.vue';
export default {
  name: 'SecurityFAQsModal',
  components: {
    SecurityFAQs,
    NMLogo
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
    
    // Router for navigation to Learn page
    const router = useRouter();

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

    // Navigate to Learn page hashes and close modal first (previous behavior)
    const navigateToLearn = (hash = '') => {
      closeModal();
      setTimeout(() => {
        const pushObj = { path: '/learn' };
        if (hash) pushObj.hash = hash;
        router.push(pushObj).catch((e) => {
          // Ignore NavigationDuplicated errors
          if (e && e.name !== 'NavigationDuplicated') console.error(e);
        });
      }, 250);
    };

    // Inline Learn embedding for modal: lazy-load LearnCenter.vue and show a specific hash
    const showInlineLearn = ref(false);
    const inlineLearnComp = ref(null);
    const currentLearnHash = ref('');

    const openInlineLearn = async (hash = '') => {
      // If already showing Learn, just update the hash
      currentLearnHash.value = hash || '';

      if (showInlineLearn.value && inlineLearnComp.value) {
        // Trigger the LearnCenter prop update which will scroll via watch
        return;
      }

      try {
        const module = await import(/* webpackChunkName: "learn-center-inline" */ '../views/LearnCenter.vue');
        inlineLearnComp.value = module.default || module;
        showInlineLearn.value = true;

        // Allow the component to mount and then the LearnCenter will scroll using its prop
        await nextTick();
      } catch (e) {
        console.error('SecurityFAQsModal: Failed to load LearnCenter inline', e);
        // Fallback to route navigation
        navigateToLearn(hash);
      }
    };

    const closeInlineLearn = () => {
      showInlineLearn.value = false;
      inlineLearnComp.value = null;
      currentLearnHash.value = '';
    };

    return {
      isOpen,
      openModal,
      closeModal,
      navigateToProducts,
      handleScrollTo,
      // Inline learn embed API
      showInlineLearn,
      inlineLearnComp,
      currentLearnHash,
      openInlineLearn,
      closeInlineLearn
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
    /* Use fixed-width panel similar to Contact modal and let inner content scroll */
    width: 100%;
    max-width: 960px;
    border-radius: 1.5rem;
    position: relative;
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
    animation: modalSlideDown 0.3s ease-out;
    border: 3px solid #16a34a; /* Adding green border with site's green theme color */
    overflow: hidden;
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
