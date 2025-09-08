<template>
  <div v-if="isOpen" class="product-details-modal-fixed" aria-labelledby="product-details-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
      <!-- Background overlay (make sure it does NOT block pointer events for modal) -->
      <div class="fixed inset-0 bg-gray-900" aria-hidden="true" style="pointer-events: none;"></div>

      <!-- Modal panel with swipe functionality -->
      <div 
        ref="modalPanel"
        :class="[
          'relative mx-auto bg-gray-800 rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl w-full mobile-swipe-indicator border-2 flex flex-col max-h-[85vh]',
          themeColor === 'green' ? 'border-green-600/30 theme-green' : 
          themeColor === 'purple' ? 'border-purple-600/30 theme-purple' : 
          themeColor === 'blue' ? 'border-blue-600/30 theme-blue' : 
          themeColor === 'yellow' ? 'border-yellow-600/30 theme-yellow' : 'border-transparent'
        ]">
        
        <!-- Fixed Header with Carousel -->
        <div :class="[
          'sticky top-0 z-10',
          themeColor === 'green' ? 'border-green-600/30' : 
          themeColor === 'purple' ? 'border-purple-600/30' : 
          themeColor === 'blue' ? 'border-blue-600/30' : 
          themeColor === 'yellow' ? 'border-yellow-600/30' : 'border-gray-700'
        ]">
          <div class="relative">
            <!-- Image carousel in header -->
            <div v-if="product.images && product.images.length > 1" class="relative bg-gray-900 border-b border-gray-700">
              <!-- Image carousel with ARIA attributes -->
              <div class="relative overflow-hidden bg-gray-900 h-80 sm:h-[450px]" @click.stop role="region" aria-roledescription="carousel" aria-label="Product images">
                <!-- Screen reader announcement region -->
                <div id="carousel-live-region" class="sr-only" aria-live="polite"></div>
                
                <!-- Title overlay with subtle gradient -->
                <div class="absolute inset-0 z-10 pointer-events-none">
                  <div class="absolute inset-0 h-32 bg-gradient-to-b from-gray-900/75 via-gray-900/25 to-transparent"></div>
                  <div class="relative px-6 py-4 flex flex-col pointer-events-auto">
                    <!-- Title and close button -->
                    <div class="flex justify-between items-center">
                      <h3 class="text-2xl font-bold leading-6 text-white max-w-[80%] truncate" 
                          :class="[
                            themeColor === 'yellow' ? 'text-yellow-400' : 'text-white'
                          ]" 
                          id="product-details-title">
                        {{ product.name }}
                      </h3>
                      <button @click="close" class="text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white/20 rounded-full p-1 transition-colors">
                        <span class="sr-only">Close modal</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      </button>
                    </div>

                    <!-- Category pills -->
                    <div class="flex gap-2 mt-2">
                      <span class="inline-block text-white text-xs px-2 py-1 rounded-full bg-opacity-90"
                        :class="{
                          'bg-green-600': themeColor === 'green',
                          'bg-purple-600': themeColor === 'purple',
                          'bg-blue-600': themeColor === 'blue',
                          'bg-yellow-600': themeColor === 'yellow'
                        }">{{ product.brand }}</span>
                      <span class="inline-block text-white text-xs px-2 py-1 rounded-full bg-opacity-90"
                        :class="{
                          'bg-green-600': themeColor === 'green',
                          'bg-purple-600': themeColor === 'purple',
                          'bg-blue-600': themeColor === 'blue',
                          'bg-yellow-600': themeColor === 'yellow'
                        }">{{ categoryName }}</span>
                    </div>
                    
                    <!-- Swipe text -->
                    <div v-if="product.images && product.images.length > 1" class="text-xs text-gray-300/80 mt-2">
                      <span class="hidden sm:inline">Use arrow keys or </span>
                      <span>swipe to navigate</span>
                    </div>
                  </div>
                </div>
                
                <!-- Carousel container -->
                <div 
                  ref="carouselRef"
                  class="carousel-container"
                  @touchstart="handleTouchStart"
                  @touchmove="handleTouchMove"
                  @touchend="handleTouchEnd">
                  <div
                    v-for="(image, index) in product.images"
                    :key="index"
                    :class="['carousel-item', currentSlide === index ? 'active' : '']"
                    :style="{ width: `${100 / product.images.length}%` }"
                    role="group"
                    aria-roledescription="slide"
                    :aria-label="`Image ${index + 1} of ${product.images.length}`">
                    <div class="w-full h-full flex items-center justify-center">
                      <!-- Loading placeholder -->
                      <div 
                        :class="['absolute inset-0 bg-gr flex items-center justify-center transition-opacity duration-300',
                          currentSlide === index ? 'opacity-100' : 'opacity-0']">
                        <div class="w-8 h-8 border-4 border-gray-600 border-t-gray-200 rounded-full animate-spin"></div>
                      </div>
                      <img
                        :src="image" 
                        :alt="`${product.name} - Image ${index + 1}`" 
                        class="max-h-full max-w-full w-auto h-auto transition-opacity duration-300"
                        @error="$event.target.src = '/public/images/axis-dome-side.webp'"
                        loading="lazy"
                        @click.stop
                        @load="$event.target.classList.add('opacity-100')"
                        style="opacity: 0;"
                      />
                    </div>
                  </div>
                </div>
                
                <!-- Navigation arrows with improved accessibility -->
                <button 
                  @click.stop="prevSlide" 
                  class="carousel-nav-button absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800/70 text-white p-2 rounded-r-md hover:bg-gray-700 z-10 focus:outline-none focus:ring focus:ring-white/30"
                  v-if="product.images.length > 1"
                  aria-label="Previous image"
                  title="Previous image">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                  </svg>
                </button>
                <button 
                  @click.stop="nextSlide" 
                  class="carousel-nav-button absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800/70 text-white p-2 rounded-l-md hover:bg-gray-700 z-10 focus:outline-none focus:ring focus:ring-white/30"
                  v-if="product.images.length > 1"
                  aria-label="Next image"
                  title="Next image">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </button>
              </div>
              
              <!-- Pagination dots with improved accessibility -->
              <div class="flex justify-center pb-3 space-x-2" v-if="product.images.length > 1" role="tablist" aria-label="Image pagination">
                <button 
                  v-for="(_, index) in product.images" 
                  :key="index" 
                  @click.stop="goToSlide(index)"
                  :class="[
                    'pagination-dot rounded-full transition-all focus:outline-none focus:ring focus:ring-white/30',
                    currentSlide === index ? 'w-4 active' : 'w-2 h-2',
                    currentSlide === index ? 
                      (themeColor === 'green' ? 'bg-green-500' : 
                       themeColor === 'purple' ? 'bg-purple-500' : 
                       themeColor === 'blue' ? 'bg-blue-500' : 
                       themeColor === 'yellow' ? 'bg-yellow-500' : 'bg-green-500') : 'bg-gray-400 hover:bg-gray-300'
                  ]"
                  :aria-label="`Go to image ${index + 1}`"
                  :aria-selected="currentSlide === index"
                  role="tab">
                </button>
              </div>
            </div>
            <!-- Single image display -->
            <div v-else class="relative bg-gray-900 h-80 sm:h-[450px] flex items-center justify-center">
              <!-- Title overlay with subtle gradient -->
              <div class="absolute inset-0 z-10 pointer-events-none">
                <div class="absolute inset-0 h-32 bg-gradient-to-b from-gray-900/75 via-gray-900/25 to-transparent"></div>
                <div class="relative px-6 py-4 flex flex-col pointer-events-auto">
                  <!-- Title and close button -->
                  <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold leading-6 text-white max-w-[80%] truncate" 
                        :class="[
                          themeColor === 'yellow' ? 'text-yellow-400' : 'text-white'
                        ]" 
                        id="product-details-title">
                      {{ product.name }}
                    </h3>
                    <button @click="close" class="text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white/20 rounded-full p-1 transition-colors">
                      <span class="sr-only">Close modal</span>
                      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>

                  <!-- Category pills -->
                  <div class="flex gap-2 mt-2">
                    <span class="inline-block text-white text-xs px-2 py-1 rounded-full bg-opacity-90"
                      :class="{
                        'bg-green-600': themeColor === 'green',
                        'bg-purple-600': themeColor === 'purple',
                        'bg-blue-600': themeColor === 'blue',
                        'bg-yellow-600': themeColor === 'yellow'
                      }">{{ product.brand }}</span>
                    <span class="inline-block text-white text-xs px-2 py-1 rounded-full bg-opacity-90"
                      :class="{
                        'bg-green-600': themeColor === 'green',
                        'bg-purple-600': themeColor === 'purple',
                        'bg-blue-600': themeColor === 'blue',
                        'bg-yellow-600': themeColor === 'yellow'
                      }">{{ categoryName }}</span>
                  </div>
                </div>
              </div>

              <!-- Loading placeholder -->
              <div class="absolute inset-0 bg-gray-800 flex items-center justify-center transition-opacity duration-300" 
                   :class="{ 'opacity-0': imageLoaded }">
                <div class="w-8 h-8 border-4 border-gray-600 border-t-gray-200 rounded-full animate-spin"></div>
              </div>
              <img 
                :src="product.image" 
                :alt="product.name" 
                class="max-h-full max-w-full w-auto h-auto p-4 transition-opacity duration-300"
                style="opacity: 0"
                @load="$event.target.style.opacity = 1; imageLoaded = true"
                @error="$event.target.src = '/public/images/axis-dome-side.webp'"
              >
            </div>
          </div>
        </div>

        <!-- Scrollable Content Area -->
        <div class="bg-gray-800 px-4 py-4 sm:px-6 overflow-y-auto flex-grow scrollbar">
          <div class="flex flex-col gap-6">
            <!-- Product info -->
            <div class="w-full">
              <p class="text-gray-300 mb-4">{{ product.description }}</p>
              
              <h4 class="text-white font-medium mb-2">Key Features:</h4>
              <ul class="list-disc list-inside mb-4 text-gray-300">
                <li v-for="feature in product.features" :key="feature">{{ feature }}</li>
              </ul>
              
              <div class="mt-4">
                <span class="text-xl font-bold block" 
                  :class="{
                    'text-green-600': themeColor === 'green',
                    'text-purple-600': themeColor === 'purple',
                    'text-blue-500': themeColor === 'blue',
                    'text-yellow-600': themeColor === 'yellow'
                  }">{{ product.price ? `$${product.price.toFixed(2)}` : 'Call For Price' }}</span>
              </div>
            </div>
          </div>
          
          <!-- Detailed specifications section -->
          <div v-if="product.specs" class="mt-8 border-t border-gray-700 pt-4">
            <h4 class="text-white font-medium mb-4">
              <span v-if="product.category === 'package'" :class="`text-${themeColor}-500`">Package</span>
              <span v-else-if="product.category === 'security'" :class="`text-${themeColor}-500`">Security System</span>
              <span v-else-if="product.brand === 'NM Solar'" :class="`text-${themeColor}-500`">Solar Security</span>
              <span v-else-if="product.category === 'monitoring'" :class="`text-${themeColor}-500`">Monitoring</span>
              Technical Specifications:
            </h4>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div v-for="(value, key) in product.specs" :key="key" 
                   :class="['flex flex-col p-2', 'bg-gray-700/30 rounded']">
                <span :class="[
                  'text-sm', 
                  themeColor === 'green' ? 'text-green-400' : 
                  themeColor === 'purple' ? 'text-purple-400' : 
                  themeColor === 'blue' ? 'text-blue-400' : 
                  themeColor === 'yellow' ? 'text-yellow-400' : 'text-gray-400'
                ]">
                  {{ formatSpecName(key) }}
                </span>
                <span class="text-white">{{ value }}</span>
              </div>
            </div>
            
            <!-- Special call to action based on product category -->
            <div v-if="product.category === 'package'" 
                 :class="`mt-6 bg-${themeColor}-900/20 border border-${themeColor}-600/30 rounded-lg p-4`">
              <h5 :class="`text-${themeColor}-500 font-semibold mb-2`">Complete Security Solution</h5>
              <p class="text-gray-300 text-sm">
                This package includes everything you need for a complete security setup: cameras, NVR, storage, 
                and all necessary cables and mounting hardware. Professional installation available.
              </p>
            </div>
            
            <div v-else-if="product.category === 'security'" 
                 :class="`mt-6 bg-${themeColor}-900/20 border border-${themeColor}-600/30 rounded-lg p-4`">
              <h5 :class="`text-${themeColor}-500 font-semibold mb-2`">Complete Home Security System</h5>
              <p class="text-gray-300 text-sm">
                This security system includes everything you need to protect your home: control panel, sensors,
                and mobile app access. Professional installation and monitoring options available.
              </p>
            </div>
            
            <div v-else-if="product.brand === 'NM Solar'" 
                 :class="`mt-6 bg-${themeColor}-900/20 border border-${themeColor}-600/30 rounded-lg p-4`">
              <h5 :class="`text-${themeColor}-500 font-semibold mb-2`">Solar-Powered Security Solution</h5>
              <p class="text-gray-300 text-sm">
                This solar-powered security system can be deployed anywhere without requiring grid power.
                Perfect for remote locations, construction sites, or temporary security needs.
              </p>
            </div>
          </div>
        </div>
        
        <!-- Fixed Footer with action buttons -->
        <div :class="[
          'bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse sticky bottom-0 z-10 border-t',
          themeColor === 'green' ? 'border-green-600/30' : 
          themeColor === 'purple' ? 'border-purple-600/30' : 
          themeColor === 'blue' ? 'border-blue-600/30' : 
          themeColor === 'yellow' ? 'border-yellow-600/30' : 'border-gray-700'
        ]">
          <button @click="addToCartAndClose" 
                  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm"
                  :class="{
                    'bg-green-600 hover:bg-green-700 focus:ring-green-500': themeColor === 'green',
                    'bg-purple-600 hover:bg-purple-700 focus:ring-purple-500': themeColor === 'purple',
                    'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500': themeColor === 'blue',
                    'bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500': themeColor === 'yellow'
                  }">
            {{ product.category === 'monitoring' ? 'Subscribe' : 'Add to Quote Cart' }}
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
    const imageLoaded = ref(false);
    let swipeCleanup = null;
    let touchStartX = 0;
    let touchStartY = 0;
    let touchEndX = 0;
    let isSwiping = false;
    let swipeThreshold = 50; // Minimum distance to trigger a swipe
    let isDragging = false;
    let initialSwipeDirection = null;
    
    // Improved touch event handlers for the carousel
    const handleTouchStart = (e) => {
      if (!props.product.images || props.product.images.length <= 1) return;
      
      touchStartX = e.changedTouches[0].screenX;
      touchStartY = e.changedTouches[0].screenY;
      isSwiping = true;
      initialSwipeDirection = null;
      isDragging = false;
      
      // Store Y position to determine if this is a horizontal or vertical swipe
      if (modalPanel.value) {
        modalPanel.value._touchStartY = touchStartY;
      }
    };
    
    const handleTouchMove = (e) => {
      if (!isSwiping || !props.product.images || props.product.images.length <= 1) return;
      
      const touchCurrentX = e.changedTouches[0].screenX;
      const touchCurrentY = e.changedTouches[0].screenY;
      const deltaX = touchCurrentX - touchStartX;
      const deltaY = touchCurrentY - touchStartY;
      
      // Determine initial swipe direction if not yet determined
      if (initialSwipeDirection === null) {
        if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > 10) {
          initialSwipeDirection = 'horizontal';
          // Add dragging class for visual feedback
          if (carouselRef.value) {
            carouselRef.value.classList.add('dragging');
          }
        } else if (Math.abs(deltaY) > Math.abs(deltaX) && Math.abs(deltaY) > 10) {
          initialSwipeDirection = 'vertical';
        }
      }
      
      // If primarily horizontal swipe (carousel navigation), stop propagation to modal
      if (initialSwipeDirection === 'horizontal') {
        e.stopPropagation();
        isDragging = true;
        
        // Enhanced visual feedback for swiping with resistance effect
        if (carouselRef.value) {
          // Add resistance at the edges
          let offset = deltaX;
          
          // Apply resistance if at first or last slide
          if ((currentSlide.value === 0 && deltaX > 0) || 
              (currentSlide.value === props.product.images.length - 1 && deltaX < 0)) {
            offset = deltaX / 3; // More resistance at edges
          } else {
            offset = deltaX / 1.5; // Less resistance in the middle
          }
          
          carouselRef.value.style.transform = `translateX(calc(-${currentSlide.value * 100}% + ${offset}px))`;
        }
      }
    };
    
    const handleTouchEnd = (e) => {
      if (!isSwiping || !props.product.images || props.product.images.length <= 1) return;
      
      touchEndX = e.changedTouches[0].screenX;
      const deltaX = touchEndX - touchStartX;
      
      // Remove dragging class
      if (carouselRef.value) {
        carouselRef.value.classList.remove('dragging');
      }
      
      // Reset any visual transformation with animation
      if (carouselRef.value) {
        // If was dragging horizontally and initiated as a horizontal swipe
        if (isDragging && initialSwipeDirection === 'horizontal') {
          // Determine if swipe was significant enough to change slides
          if (Math.abs(deltaX) > swipeThreshold) {
            // Add smooth transition back
            carouselRef.value.style.transition = 'transform 0.3s ease-out';
            
            if (deltaX > 0) {
              // Add a small bounce effect for previous slide
              if (currentSlide.value > 0) {
                prevSlide(); // Swipe right -> previous slide
              } else {
                // At first slide, bounce back with animation
                carouselRef.value.style.transform = `translateX(calc(-${currentSlide.value * 100}% + 20px))`;
                setTimeout(() => {
                  if (carouselRef.value) {
                    carouselRef.value.style.transform = `translateX(-${currentSlide.value * 100}%)`;
                  }
                }, 50);
              }
            } else {
              // Add a small bounce effect for next slide
              if (currentSlide.value < props.product.images.length - 1) {
                nextSlide(); // Swipe left -> next slide
              } else {
                // At last slide, bounce back with animation
                carouselRef.value.style.transform = `translateX(calc(-${currentSlide.value * 100}% - 20px))`;
                setTimeout(() => {
                  if (carouselRef.value) {
                    carouselRef.value.style.transform = `translateX(-${currentSlide.value * 100}%)`;
                  }
                }, 50);
              }
            }
          } else {
            // Not enough to change slide, reset to current slide with easing
            carouselRef.value.style.transition = 'transform 0.3s cubic-bezier(0.25, 0.8, 0.25, 1)';
            carouselRef.value.style.transform = `translateX(-${currentSlide.value * 100}%)`;
            setTimeout(() => {
              if (carouselRef.value) {
                carouselRef.value.style.transition = 'transform 0.3s ease-in-out';
              }
            }, 300);
          }
          e.stopPropagation(); // Prevent modal from closing
        } else {
          // Reset transform if not dragging horizontally
          carouselRef.value.style.transform = `translateX(-${currentSlide.value * 100}%)`;
        }
      }
      
      isSwiping = false;
      isDragging = false;
      initialSwipeDirection = null;
    };
    
    // Carousel controls
    const nextSlide = () => {
      if (!props.product.images) return;
      currentSlide.value = (currentSlide.value + 1) % props.product.images.length;
      resetAutoRotation();
      announceSlideChange();
    };
    
    const prevSlide = () => {
      if (!props.product.images) return;
      currentSlide.value = (currentSlide.value - 1 + props.product.images.length) % props.product.images.length;
      resetAutoRotation();
      announceSlideChange();
    };
    
    const goToSlide = (index) => {
      currentSlide.value = index;
      resetAutoRotation();
      announceSlideChange();
    };
    
    // Accessibility announcement for screen readers
    const announceSlideChange = () => {
      const announcement = `Image ${currentSlide.value + 1} of ${props.product.images ? props.product.images.length : 1}`;
      
      // Use ARIA live region for announcement (added in the template)
      const liveRegion = document.getElementById('carousel-live-region');
      if (liveRegion) {
        liveRegion.textContent = announcement;
      }
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
    
    // Enhanced keyboard navigation
    onMounted(() => {
      startAutoRotation();
      
      const handleKeyDown = (e) => {
        if (!props.isOpen || !props.product.images || props.product.images.length <= 1) return;
        
        // Focus handling - only respond to keyboard if modal is focused or carousel container is focused
        const activeElement = document.activeElement;
        const modalElement = modalPanel.value;
        const carouselElement = carouselRef.value;
        
        // Check if focus is within the modal
        if (modalElement && !modalElement.contains(activeElement)) {
          return;
        }
        
        // Left arrow key - previous slide
        if (e.key === 'ArrowLeft') {
          prevSlide();
          e.preventDefault();
        }
        // Right arrow key - next slide
        else if (e.key === 'ArrowRight') {
          nextSlide();
          e.preventDefault();
        }
      };
      
      window.addEventListener('keydown', handleKeyDown);
      
      onBeforeUnmount(() => {
        window.removeEventListener('keydown', handleKeyDown);
        if (autoRotationTimer) clearInterval(autoRotationTimer);
        if (swipeCleanup) swipeCleanup();
      });
      
      // Set up swipe gesture handling for the modal
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
            // Significantly increased threshold from 50 to 80 to reduce sensitivity on mobile
            if (modalPanel.value && Math.abs(deltaY) > 80) {
              // Further reduced the transformation effect by dividing deltaY by 3
              const transformY = deltaY / 3;
              const opacity = Math.max(0.8, 1 - Math.abs(deltaY) / 1000);
              modalPanel.value.style.transform = `translateY(${transformY}px)`;
              modalPanel.value.style.opacity = opacity.toString();
            }
          },
          onSwipeEnd: ({ direction, deltaY }) => {
            // Reset styles if swipe wasn't enough to dismiss
            if (modalPanel.value) {
              // Significantly increased threshold from 180 to 250 for dismissal to reduce sensitivity on mobile
              if ((direction === 'top' || direction === 'bottom') && Math.abs(deltaY) > 250) {
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
    
    // Convert category ID to friendly name
    const categoryName = computed(() => {
      const categories = {
        'camera': 'Security Camera',
        'recorder': 'Recorder & NVR',
        'accessory': 'Accessory',
        'network': 'Networking Equipment',
        'package': 'Security Package',
        'monitoring': 'Security Monitoring',
        'security': 'Home Security System'
      };
      
      return categories[props.product.category] || props.product.category;
    });
    
    // Determine theme color based on product category and color
    const themeColor = computed(() => {
      if (props.product.category === 'package') {
        return 'green';
      } else if (props.product.category === 'monitoring') {
        return 'purple';
      } else if (props.product.category === 'security' && props.product.color === 'blue') {
        return 'blue';
      } else if (props.product.brand === 'NM Solar' && props.product.color === 'yellow') {
        return 'yellow';
      } else {
        return 'blue'; // Default color
      }
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
      themeColor,
      imageLoaded,
      close,
      addToCartAndClose,
      formatSpecName,
      currentSlide,
      nextSlide,
      prevSlide,
      goToSlide,
      handleTouchStart,
      handleTouchMove,
      handleTouchEnd
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
  overflow: hidden;
}

.mobile-swipe-indicator::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  z-index: 10;
}

/* Theme-specific accent colors */
.theme-green::before {
  background: linear-gradient(90deg, rgba(22, 163, 74, 0.8) 0%, rgba(22, 163, 74, 0.4) 100%);
}

.theme-purple::before {
  background: linear-gradient(90deg, rgba(147, 51, 234, 0.8) 0%, rgba(147, 51, 234, 0.4) 100%);
}

.theme-blue::before {
  background: linear-gradient(90deg, rgba(37, 99, 235, 0.8) 0%, rgba(37, 99, 235, 0.4) 100%);
}

.theme-yellow::before {
  background: linear-gradient(90deg, rgba(234, 179, 8, 0.8) 0%, rgba(234, 179, 8, 0.4) 100%);
}

/* Glow effects for themed modals */
.theme-green {
  box-shadow: 0 0 15px rgba(22, 163, 74, 0.15);
}

.theme-purple {
  box-shadow: 0 0 15px rgba(147, 51, 234, 0.15);
}

.theme-blue {
  box-shadow: 0 0 15px rgba(37, 99, 235, 0.15);
}

.theme-yellow {
  box-shadow: 0 0 15px rgba(234, 179, 8, 0.15);
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

/* Carousel styles */
.carousel-container {
  display: flex;
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  height: 100%;
  width: 100%;
  will-change: transform;
  touch-action: pan-y;
}

.carousel-item {
  flex: 0 0 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgb(17, 24, 39);
  overflow: hidden;
  position: relative;
}

.carousel-item img {
  max-height: 100%;
  max-width: 100%;
  width: auto;
  height: auto;
  object-fit: contain;
  object-position: center;
  transition: opacity 0.3s ease;
}

.carousel-item.loading {
  position: relative;
}

.carousel-item.loading::before {
  content: '';
  position: absolute;
  inset: 0;
  background-color: rgba(17, 24, 39, 0.5);
  z-index: 1;
}

.carousel-item.loading::after {
  content: '';
  position: absolute;
  left: 50%;
  top: 50%;
  width: 2rem;
  height: 2rem;
  border-radius: 50%;
  border: 2px solid rgb(75, 85, 99);
  border-top-color: rgb(209, 213, 219);
  animation: spin 1s linear infinite;
  z-index: 2;
  transform: translate(-50%, -50%);
}

@keyframes spin {
  to {
    transform: translate(-50%, -50%) rotate(360deg);
  }
}

.carousel-navigation {
  position: absolute;
  bottom: 1rem;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  gap: 0.5rem;
  z-index: 20;
}

.carousel-dot {
  width: 0.5rem;
  height: 0.5rem;
  border-radius: 9999px;
  background-color: rgb(209, 213, 219);
  opacity: 0.5;
  transition: all 0.2s ease;
}

.carousel-dot.active {
  opacity: 1;
  transform: scale(1.25);
}

/* Responsive adjustments for different screen sizes */
@media (max-width: 640px) {
  .mobile-swipe-indicator {
    margin-top: 2rem;
    width: 100%;
    max-height: 90vh;
    overflow: hidden;
    border-radius: 1rem 1rem 0 0;
    display: flex;
    flex-direction: column;
  }
  
  .mobile-swipe-indicator::after {
    opacity: 0.5;
  }
}

@media (max-width: 200px) {
  .product-details-modal-fixed {
    align-items: flex-end;
    padding: 0;
    top: 56px !important; /* Offset for navbar, adjust as needed */
    height: calc(100vh - 56px) !important;
    min-height: 60vh;
    max-height: 95vh;
  }
  .mobile-swipe-indicator {
    max-width: 100vw !important;
    width: 100vw !important;
    border-radius: 0 !important;
    margin: 0 !important;
    min-height: 60vh;
    max-height: calc(95vh - 56px);
    box-shadow: none;
    padding-bottom: env(safe-area-inset-bottom, 0);
  }
  .bg-gray-800 {
    border-radius: 0 !important;
    padding-left: 0.5rem !important;
    padding-right: 0.5rem !important;
  }
  .scrollbar {
    max-height: 60vh !important;
    overflow-y: auto !important;
  }
  .sticky.top-0 {
    position: static !important;
  }
  .sticky.bottom-0 {
    position: static !important;
  }
}

@media (min-width: 640px) {
  .mobile-swipe-indicator {
    max-height: 85vh;
    display: flex;
    flex-direction: column;
  }
}

/* Fixed header and footer styles */
.sticky {
  position: sticky;
  position: -webkit-sticky;
}

.top-0 {
  top: 0;
}

.bottom-0 {
  bottom: 0;
}

/* Theme-based scrollbar styles */
/* General scrollbar styling */
.scrollbar {
  scrollbar-width: thin;
  scrollbar-color: rgba(107, 114, 128, 0.5) rgba(31, 41, 55, 0.1);
}

.theme-green ::-webkit-scrollbar {
  width: 8px;
}

.theme-green ::-webkit-scrollbar-track {
  background: rgba(22, 163, 74, 0.1);
  border-radius: 4px;
}

.theme-green ::-webkit-scrollbar-thumb {
  background: rgba(22, 163, 74, 0.5);
  border-radius: 4px;
}

.theme-green ::-webkit-scrollbar-thumb:hover {
  background: rgba(22, 163, 74, 0.7);
}

.theme-purple ::-webkit-scrollbar {
  width: 8px;
}

.theme-purple ::-webkit-scrollbar-track {
  background: rgba(147, 51, 234, 0.1);
  border-radius: 4px;
}

.theme-purple ::-webkit-scrollbar-thumb {
  background: rgba(147, 51, 234, 0.5);
  border-radius: 4px;
}

.theme-purple ::-webkit-scrollbar-thumb:hover {
  background: rgba(147, 51, 234, 0.7);
}

.theme-blue ::-webkit-scrollbar {
  width: 8px;
}

.theme-blue ::-webkit-scrollbar-track {
  background: rgba(37, 99, 235, 0.1);
  border-radius: 4px;
}

.theme-blue ::-webkit-scrollbar-thumb {
  background: rgba(37, 99, 235, 0.5);
  border-radius: 4px;
}

.theme-blue ::-webkit-scrollbar-thumb:hover {
  background: rgba(37, 99, 235, 0.7);
}

.theme-yellow ::-webkit-scrollbar {
  width: 8px;
}

.theme-yellow ::-webkit-scrollbar-track {
  background: rgba(234, 179, 8, 0.1);
  border-radius: 4px;
}

.theme-yellow ::-webkit-scrollbar-thumb {
  background: rgba(234, 179, 8, 0.5);
  border-radius: 4px;
}

.theme-yellow ::-webkit-scrollbar-thumb:hover {
  background: rgba(234, 179, 8, 0.7);
}

/* Carousel navigation improvements */
.carousel-nav-button {
  background-color: rgba(31, 41, 55, 0.7);
  padding: 0.5rem;
  border-radius: 0.25rem;
  color: white;
  transition: all 0.2s ease;
  z-index: 10;
}

.carousel-nav-button:hover,
.carousel-nav-button:focus {
  background-color: rgba(31, 41, 55, 0.9);
  box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.5);
  outline: none;
}

.carousel-nav-button:active {
  transform: scale(0.95);
}

/* Ensure pagination dots are clickable */
.pagination-dots {
  display: flex;
  justify-content: center;
  margin-top: 0.5rem;
}

.pagination-dot {
  width: 0.5rem;
  height: 0.5rem;
  border-radius: 9999px;
  margin: 0 0.25rem;
  transition: all 0.3s ease;
  cursor: pointer;
}

.pagination-dot.active {
  width: 1rem;
}

/* Enhanced touch feedback for carousel */
.carousel-container {
  display: flex;
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  height: 100%;
  will-change: transform;
  touch-action: pan-y;
  pointer-events: auto;
  position: relative;
  z-index: 5;
}

.carousel-container.dragging {
  transition: none;
  cursor: grabbing;
}

/* Keyboard focus styling */
.carousel-nav-button:focus-visible {
  outline: 2px solid white;
  outline-offset: 2px;
}

.pagination-dot:focus-visible {
  outline: 2px solid white;
  outline-offset: 2px;
}

/* Screen reader only class */
.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border-width: 0;
}

/* Carousel styles for header */
.carousel-container {
  display: flex;
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  height: 80%;
  will-change: transform;
  touch-action: pan-y;
  position: relative;
}

.carousel-item {
  flex: 1 0 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  background-color: rgb(17, 24, 39);
  padding: 0.5rem;
}

.carousel-item img {
  height: 100%;
  width: 100%;
  object-fit: contain;
  object-position: center;
  transition: opacity 0.3s ease;
}

/* Animated entrance for slide content */
@keyframes slideEnter {
  from {
    opacity: 0.4;
    transform: scale(0.98);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

.carousel-item.active img {
  animation: slideEnter 0.3s ease-out forwards;
}

.product-details-modal-fixed {
  position: fixed !important;
  top: 95px;
  left: 0;
  width: 98vw;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 10;
}

@media (max-width: 639px) {
  .product-details-modal-fixed {
    align-items: flex-end;
    padding: 0;
  }
  .mobile-swipe-indicator {
    max-width: 100vw !important;
    width: 100vw !important;
    border-radius: 0 !important;
    margin: 0 !important;
    min-height: 60vh;
    max-height: 95vh;
    box-shadow: none;
    padding-bottom: env(safe-area-inset-bottom, 0);
  }
  .bg-gray-800 {
    border-radius: 0 !important;
    padding-left: 0.5rem !important;
    padding-right: 0.5rem !important;
  }
  .scrollbar {
    max-height: 60vh !important;
    overflow-y: auto !important;
  }
  .sticky.top-0 {
    position: static !important;
  }
  .sticky.bottom-0 {
    position: static !important;
  }
}

/* Navbar pulse wave animation */
.navbar-pulse-border {
  position: relative;
}

.navbar-pulse-border::before {
  content: '';
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  height: 4px;
  z-index: 20;
  border-radius: 2px 2px 0 0;
  pointer-events: none;
  background: linear-gradient(90deg,
    rgba(22,163,74,0.0) 0%,
    rgba(22,163,74,0.7) 20%,
    rgba(22,163,74,1) 50%,
    rgba(22,163,74,0.7) 80%,
    rgba(22,163,74,0.0) 100%
  );
  background-size: 200% 100%;
  animation: navbarPulseWave 2.5s linear infinite;
  box-shadow: 0 0 12px 2px rgba(22,163,74,0.25);
}

.theme-purple.navbar-pulse-border::before {
  background: linear-gradient(90deg,
    rgba(147,51,234,0.0) 0%,
    rgba(147,51,234,0.7) 20%,
    rgba(147,51,234,1) 50%,
    rgba(147,51,234,0.7) 80%,
    rgba(147,51,234,0.0) 100%
  );
  box-shadow: 0 0 12px 2px rgba(147,51,234,0.25);
}
.theme-blue.navbar-pulse-border::before {
  background: linear-gradient(90deg,
    rgba(37,99,235,0.0) 0%,
    rgba(37,99,235,0.7) 20%,
    rgba(37,99,235,1) 50%,
    rgba(37,99,235,0.7) 80%,
    rgba(37,99,235,0.0) 100%
  );
  box-shadow: 0 0 12px 2px rgba(37,99,235,0.25);
}
.theme-yellow.navbar-pulse-border::before {
  background: linear-gradient(90deg,
    rgba(234,179,8,0.0) 0%,
    rgba(234,179,8,0.7) 20%,
    rgba(234,179,8,1) 50%,
    rgba(234,179,8,0.7) 80%,
    rgba(234,179,8,0.0) 100%
  );
  box-shadow: 0 0 12px 2px rgba(234,179,8,0.25);
}

@keyframes navbarPulseWave {
  0% { background-position: 0% 0; opacity: 0.7; }
  40% { opacity: 1; }
  50% { background-position: 100% 0; opacity: 1; }
  100% { background-position: 200% 0; opacity: 0.7; }
}

</style>
