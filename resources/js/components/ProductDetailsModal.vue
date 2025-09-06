<template>
  <div v-if="isOpen" class="fixed inset-0 overflow-y-auto z-50" aria-labelledby="product-details-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Background overlay -->
      <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true" @click="close"></div>

      <!-- Modal panel with swipe functionality -->
      <div 
        ref="modalPanel"
        v-touch:swipe.top="close"
        v-touch:swipe.bottom="close"
        class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full mobile-swipe-indicator">
        <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-2xl font-bold leading-6 text-white" id="product-details-title">
              {{ product.name }}
            </h3>
            <button @click="close" class="text-gray-400 hover:text-white focus:outline-none">
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- Product details -->
          <div class="mt-3">
            <div class="flex flex-col lg:flex-row gap-6">
              <!-- Product image or carousel -->
              <div class="w-full lg:w-1/2">
                <div v-if="product.images && product.images.length > 1" class="relative">
                  <!-- Image carousel -->
                  <div class="relative overflow-hidden bg-gray-700 rounded-lg h-72">
                    <div ref="carouselRef" class="carousel-container flex transition-transform duration-300" 
                      :style="{ transform: `translateX(-${currentSlide * 100}%)`, width: `${product.images.length * 100}%` }"
                      v-touch:swipe.left="nextSlide"
                      v-touch:swipe.right="prevSlide">
                      <div
                        v-for="(image, index) in product.images"
                        :key="index"
                        class="w-full h-72 flex items-center justify-center flex-shrink-0"
                        :style="{ width: `${100 / product.images.length}%` }">
                        <img
                          :src="image" 
                          :alt="`${product.name} - Image ${index + 1}`" 
                          class="max-h-full max-w-full object-contain"
                          @error="$event.target.src = '/public/images/axis-dome-side.webp'"
                        />
                      </div>
                    </div>
                    <!-- Navigation arrows -->
                    <button 
                      @click="prevSlide" 
                      class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800/70 text-white p-2 rounded-r-md hover:bg-gray-700"
                      v-if="product.images.length > 1">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                      </svg>
                    </button>
                    <button 
                      @click="nextSlide" 
                      class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800/70 text-white p-2 rounded-l-md hover:bg-gray-700"
                      v-if="product.images.length > 1">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                      </svg>
                    </button>
                  </div>
                  <!-- Pagination dots -->
                  <div class="flex justify-center mt-2 space-x-2" v-if="product.images.length > 1">
                    <button 
                      v-for="(_, index) in product.images" 
                      :key="index" 
                      @click="goToSlide(index)"
                      :class="[
                        'w-2 h-2 rounded-full transition-all focus:outline-none',
                        currentSlide === index ? 'bg-green-500 w-4' : 'bg-gray-400 hover:bg-gray-300'
                      ]"
                      :aria-label="`Go to image ${index + 1}`">
                    </button>
                  </div>
                </div>
                <div v-else class="relative overflow-hidden bg-gray-700 rounded-lg h-72 flex items-center justify-center">
                  <img :src="product.image" :alt="product.name" class="max-h-full max-w-full object-contain" @error="$event.target.src = '/public/images/axis-dome-side.webp'">
                </div>
              </div>
              
              <!-- Product info -->
              <div class="w-full lg:w-1/2">
                <div class="mb-4">
                  <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded-full">{{ product.brand }}</span>
                  <span class="inline-block bg-blue-600 text-white text-xs px-2 py-1 rounded-full ml-2">{{ categoryName }}</span>
                </div>
                
                <p class="text-gray-300 mb-4">{{ product.description }}</p>
                
                <h4 class="text-white font-medium mb-2">Key Features:</h4>
                <ul class="list-disc list-inside mb-4 text-gray-300">
                  <li v-for="feature in product.features" :key="feature">{{ feature }}</li>
                </ul>
                
                <div class="mt-4">
                  <span class="text-xl font-bold text-green-600 block">{{ product.price ? `$${product.price.toFixed(2)}` : 'Call For Price' }}</span>
                </div>
              </div>
            </div>
            
            <!-- Detailed specifications section -->
            <div v-if="product.specs" class="mt-8 border-t border-gray-700 pt-4">
              <h4 class="text-white font-medium mb-4">
                <span v-if="product.category === 'package'" class="text-green-500">Package</span>
                Technical Specifications:
              </h4>
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div v-for="(value, key) in product.specs" :key="key" 
                     :class="['flex flex-col p-2', product.category === 'package' ? 'bg-gray-700/30 rounded' : '']">
                  <span :class="['text-sm', product.category === 'package' ? 'text-green-400' : 'text-gray-400']">
                    {{ formatSpecName(key) }}
                  </span>
                  <span class="text-white">{{ value }}</span>
                </div>
              </div>
              
              <!-- Special call to action for packages -->
              <div v-if="product.category === 'package'" class="mt-6 bg-green-900/20 border border-green-600/30 rounded-lg p-4">
                <h5 class="text-green-500 font-semibold mb-2">Complete Security Solution</h5>
                <p class="text-gray-300 text-sm">
                  This package includes everything you need for a complete security setup: cameras, NVR, storage, 
                  and all necessary cables and mounting hardware. Professional installation available.
                </p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Modal footer with action buttons -->
        <div class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button @click="addToCartAndClose" 
                  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
            Add to Quote Cart
          </button>
          <button @click="close" 
                  class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed, ref, watch, onMounted, onBeforeUnmount } from 'vue';
import { cartStore } from '../store/cartStore.js';
import { toastService } from '../services/toastService.js';
import { useSwipe } from '@vueuse/core';

export default {
  name: 'ProductDetailsModal',
  props: {
    isOpen: {
      type: Boolean,
      required: true
    },
    product: {
      type: Object,
      required: true
    }
  },
  emits: ['close'],
  setup(props, { emit }) {
    const modalPanel = ref(null);
    const currentSlide = ref(0);
    const carouselRef = ref(null);
    let swipeCleanup = null;
    
    // Carousel controls
    const nextSlide = () => {
      if (!props.product.images) return;
      currentSlide.value = (currentSlide.value + 1) % props.product.images.length;
      resetAutoRotation();
    };
    
    const prevSlide = () => {
      if (!props.product.images) return;
      currentSlide.value = (currentSlide.value - 1 + props.product.images.length) % props.product.images.length;
      resetAutoRotation();
    };
    
    const goToSlide = (index) => {
      currentSlide.value = index;
      resetAutoRotation();
    };
    
    // Reset auto-rotation when user interacts with carousel
    const resetAutoRotation = () => {
      if (autoRotationTimer) {
        clearInterval(autoRotationTimer);
        startAutoRotation();
      }
    };
    
    // Reset slide index when product changes
    watch(() => props.product, () => {
      currentSlide.value = 0;
      startAutoRotation();
    });
    
    // Auto-rotate carousel slides
    let autoRotationTimer = null;
    
    const startAutoRotation = () => {
      // Clear any existing timer
      if (autoRotationTimer) clearInterval(autoRotationTimer);
      
      // Only start auto-rotation if product has multiple images
      if (props.product.images && props.product.images.length > 1) {
        autoRotationTimer = setInterval(() => {
          nextSlide();
        }, 5000); // Rotate every 5 seconds
      }
    };
    
    // Clean up timer when component is unmounted
    onBeforeUnmount(() => {
      if (autoRotationTimer) clearInterval(autoRotationTimer);
    });
    
    // Start auto-rotation when component is mounted
    onMounted(() => {
      startAutoRotation();
    });
    
    // Set up swipe gesture handling when component is mounted
    onMounted(() => {
      if (modalPanel.value) {
        const { stop } = useSwipe(modalPanel.value, {
          onSwipeStart: (e) => {
            // Add visual feedback that swiping has started
            if (modalPanel.value) {
              modalPanel.value.classList.add('swiping');
            }
          },
          onSwipe: ({ deltaY }) => {
            // Apply transform during swipe for visual feedback
            if (modalPanel.value && Math.abs(deltaY) > 20) {
              const opacity = Math.max(0.5, 1 - Math.abs(deltaY) / 500);
              modalPanel.value.style.transform = `translateY(${deltaY}px)`;
              modalPanel.value.style.opacity = opacity.toString();
            }
          },
          onSwipeEnd: ({ direction, deltaY }) => {
            // Reset styles if swipe wasn't enough to dismiss
            if (modalPanel.value) {
              if ((direction === 'top' || direction === 'bottom') && Math.abs(deltaY) > 100) {
                // Close the modal if swiped enough
                close();
              } else {
                // Reset position and opacity if swipe wasn't far enough
                modalPanel.value.style.transform = '';
                modalPanel.value.style.opacity = '1';
                modalPanel.value.classList.remove('swiping');
              }
            }
          }
        });
        
        // Store cleanup function
        swipeCleanup = stop;
        
        // Add swipe hint animation
        if (modalPanel.value) {
          setTimeout(() => {
            if (modalPanel.value) {
              modalPanel.value.classList.add('show-swipe-hint');
              setTimeout(() => {
                if (modalPanel.value) {
                  modalPanel.value.classList.remove('show-swipe-hint');
                }
              }, 2000);
            }
          }, 1000);
        }
      }
    });
    
    // Clean up swipe handler when component is unmounted
    onBeforeUnmount(() => {
      if (swipeCleanup) {
        swipeCleanup();
      }
    });
    // Convert category ID to friendly name
    const categoryName = computed(() => {
      const categories = {
        'camera': 'Security Camera',
        'recorder': 'Recorder & NVR',
        'accessory': 'Accessory',
        'network': 'Networking Equipment',
        'package': 'Security Package',
        'monitoring': 'Security Monitoring'
      };
      
      return categories[props.product.category] || props.product.category;
    });
    
    const close = () => {
      emit('close');
    };
    
    const addToCartAndClose = () => {
      cartStore.addItem({
        id: props.product.id,
        name: props.product.name,
        image: props.product.image,
        price: props.product.price
      });
      
      toastService.success(`Added ${props.product.name} to cart!`);
      close();
    };

    const formatSpecName = (key) => {
      const specNames = {
        'dimensions': 'Dimensions',
        'wifi': 'WiFi Standard',
        'range': 'Coverage Range',
        'weatherproofing': 'Weatherproofing',
        'cameraCount': 'Number of Cameras',
        'resolution': 'Camera Resolution',
        'nvr': 'NVR Specification',
        'storage': 'Storage Capacity',
        'poe': 'PoE Capability',
        'coverage': 'Coverage Area',
        'warranty': 'Warranty',
        'doorContacts': 'Door Contacts',
        'windowSensors': 'Window Sensors',
        'motionDetectors': 'Motion Detectors',
        'ipSirens': 'IP Sirens',
        'smartDevices': 'Smart Devices',
        'responseTimes': 'Response Time',
        'contractLength': 'Contract Length',
        'installation': 'Installation',
        'monthlyFee': 'Monthly Fee',
        'idealFor': 'Ideal For',
        'power': 'Power Supply',
        'antenna': 'Antenna Gain',
        'maxTxPower': 'Max TX Power',
        'interfaces': 'Interfaces',
        'temperature': 'Operating Temperature',
        'frequency': 'Frequency',
        'mountOptions': 'Mounting Options',
        'resolution': 'Resolution',
        'nightVision': 'Night Vision Range',
        'fov': 'Field of View',
        'smartDetections': 'Smart Detections',
        'audio': 'Audio',
        'tamperResistance': 'Tamper Resistance',
        'networkInterface': 'Network Interface',
        'maxFrameRate': 'Max Frame Rate',
        'sensor': 'Image Sensor',
        'lens': 'Lens',
        'powerConsumption': 'Power Consumption',
        'processor': 'Processor',
        'memory': 'Memory',
        'storage': 'Storage',
        'powerInput': 'Power Input',
        'operating': 'Operating System',
        'mounting': 'Mounting Options',
        'totalPorts': 'Total Ports',
        'switching': 'Switching Capacity',
        'forwarding': 'Forwarding Rate',
        'poeInterfaces': 'PoE Standards',
        'poeBudget': 'Total PoE Budget',
        'maxPoePerPort': 'Max Power Per Port',
        'management': 'Management Interface',
        'zoom': 'Optical Zoom'
      };
      
      // Use predefined name if available, otherwise format the key
      return specNames[key] || key.replace(/_/g, ' ').replace(/\b\w/g, char => char.toUpperCase());
    };
    
    return {
      modalPanel,
      carouselRef,
      categoryName,
      close,
      addToCartAndClose,
      formatSpecName,
      currentSlide,
      nextSlide,
      prevSlide,
      goToSlide
    };
  }
};
</script>

<style scoped>
/* Mobile swipe indicator styles */
.mobile-swipe-indicator {
  position: relative;
  touch-action: pan-y;
  transition: transform 0.3s ease-out, opacity 0.3s ease-out;
}

.mobile-swipe-indicator::after {
  content: '';
  position: absolute;
  top: 8px;
  left: 50%;
  transform: translateX(-50%);
  width: 40px;
  height: 5px;
  background-color: rgba(255, 255, 255, 0.3);
  border-radius: 3px;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.show-swipe-hint::after {
  opacity: 1;
  animation: pulse 1.5s ease-in-out;
}

.swiping {
  transition: transform 0.1s linear, opacity 0.1s linear;
}

@keyframes pulse {
  0% { transform: translateX(-50%) scaleX(1); opacity: 0.3; }
  50% { transform: translateX(-50%) scaleX(1.2); opacity: 0.6; }
  100% { transform: translateX(-50%) scaleX(1); opacity: 0.3; }
}

/* Responsive adjustments for mobile */
/* Carousel styles */
.carousel-container {
  display: flex;
  transition: transform 0.3s ease-in-out;
  height: 100%;
}

.carousel-container img {
  opacity: 0;
  animation: fadeIn 0.5s ease-in forwards;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@media (max-width: 640px) {
  .mobile-swipe-indicator {
    margin-top: 2rem;
    width: 100%;
    max-height: 85vh;
    overflow-y: auto;
    border-radius: 1rem 1rem 0 0;
  }
  
  .mobile-swipe-indicator::after {
    opacity: 0.5;
  }
}
</style>
