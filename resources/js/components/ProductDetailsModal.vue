<template>
  <Teleport to="body">
    <div
      v-if="isVisible"
      class="fixed inset-0 z-[200] flex items-center justify-center p-4 relative"
      @click="close"
    >
      <!-- Enhanced Backdrop with Blur (kept behind modal panel) -->
      <div
        class="absolute inset-0 bg-gray-900/80 backdrop-blur-sm transition-opacity z-0"
        @click="close"
      ></div>

      <!-- Modern Modal Container -->
      <div
        @click.stop
        :class="[
          'relative z-10 w-full max-w-4xl mx-auto rounded-2xl shadow-2xl',
          'bg-gradient-to-br from-gray-900/95 via-gray-800/90 to-gray-900/95',
          'backdrop-blur-xl border border-gray-700/50 overflow-hidden',
          'transform transition-all duration-300 ease-out max-h-[90vh] flex flex-col',
        ]"
      >
      <!-- Modern Header Section -->
      <div class="relative bg-gray-900 border-b border-gray-700 overflow-hidden">
        <!-- Image Carousel -->
        <div
          class="relative h-64 sm:h-80 bg-gradient-to-br from-gray-800 to-gray-900"
          @click.stop
        >
          <div class="relative w-full h-full">
            <!-- Carousel Images -->
            <div
              v-if="product.images && product.images.length > 0"
              class="relative w-full h-full"
            >
              <img
                v-for="(image, index) in product.images"
                :key="index"
                :src="image"
                :alt="`${product.name} - Image ${index + 1}`"
                :class="[
                  'absolute inset-0 w-full h-full object-contain transition-opacity duration-500',
                  index === currentImageIndex ? 'opacity-100' : 'opacity-0',
                ]"
              />
            </div>

            <!-- Placeholder for no images -->
            <div
              v-else
              class="flex items-center justify-center w-full h-full bg-gradient-to-br from-gray-700 to-gray-800"
            >
              <svg
                class="w-24 h-24 text-gray-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                />
              </svg>
            </div>

            <!-- Navigation Arrows -->
            <template v-if="product.images && product.images.length > 1">
              <button
                @click="previousImage"
                class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-gray-900/70 hover:bg-gray-900/90 backdrop-blur-sm text-white rounded-full flex items-center justify-center transition-all duration-200 border border-gray-600/50"
              >
                <svg
                  class="w-5 h-5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7"
                  />
                </svg>
              </button>
              <button
                @click="nextImage"
                class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-gray-900/70 hover:bg-gray-900/90 backdrop-blur-sm text-white rounded-full flex items-center justify-center transition-all duration-200 border border-gray-600/50"
              >
                <svg
                  class="w-5 h-5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7"
                  />
                </svg>
              </button>

              <!-- Image Indicators -->
              <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
                <button
                  v-for="(_, index) in product.images"
                  :key="index"
                  @click="setCurrentImage(index)"
                  :class="[
                    'w-2 h-2 rounded-full transition-all duration-200',
                    index === currentImageIndex
                      ? 'bg-white'
                      : 'bg-white/40 hover:bg-white/60',
                  ]"
                />
              </div>
            </template>
          </div>

          <!-- Close button overlay -->
          <button
            @click="close"
            class="absolute top-4 right-4 w-8 h-8 bg-gray-900/70 hover:bg-gray-900/90 backdrop-blur-sm text-white rounded-full flex items-center justify-center transition-all duration-200 border border-gray-600/50"
          >
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>

        <!-- Product Title Overlay -->
        <div
          class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900/90 via-gray-900/60 to-transparent p-6"
        >
          <div class="flex items-end justify-between">
            <div class="flex-1">
              <h2 class="text-2xl font-bold text-white mb-2">{{ product.name }}</h2>
              <div class="flex items-center gap-3">
                <span
                  :class="[
                    'inline-block text-white text-xs px-3 py-1 rounded-full font-medium',
                    themeColor === 'green'
                      ? 'bg-green-600'
                      : themeColor === 'purple'
                      ? 'bg-purple-600'
                      : themeColor === 'blue'
                      ? 'bg-blue-600'
                      : themeColor === 'yellow'
                      ? 'bg-yellow-600'
                      : 'bg-green-600',
                  ]"
                >
                  {{ product.brand }}
                </span>
                <span
                  :class="[
                    'inline-block text-white text-xs px-3 py-1 rounded-full font-medium',
                    themeColor === 'green'
                      ? 'bg-green-500'
                      : themeColor === 'purple'
                      ? 'bg-purple-500'
                      : themeColor === 'blue'
                      ? 'bg-blue-500'
                      : themeColor === 'yellow'
                      ? 'bg-yellow-500'
                      : 'bg-green-500',
                  ]"
                >
                  {{ categoryName }}
                </span>
              </div>
            </div>

            <!-- Price -->
            <div class="text-right ml-4">
              <span
                :class="[
                  'text-2xl font-bold',
                  themeColor === 'green'
                    ? 'text-green-400'
                    : themeColor === 'purple'
                    ? 'text-purple-400'
                    : themeColor === 'blue'
                    ? 'text-blue-400'
                    : themeColor === 'yellow'
                    ? 'text-yellow-400'
                    : 'text-green-400',
                ]"
              >
                {{ product.price ? `$${product.price.toFixed(2)}` : "Call For Price" }}
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- Modern Scrollable Content -->
      <div class="flex-1 overflow-y-auto p-6 bg-gray-800/50 min-h-0">
        <!-- Product Description -->
        <div class="mb-6">
          <p class="text-gray-300 leading-relaxed mb-4">{{ product.description }}</p>

          <!-- Key Features -->
          <div v-if="product.features && product.features.length > 0" class="mb-6">
            <h4 class="text-white font-semibold mb-3 flex items-center">
              <svg
                class="w-5 h-5 mr-2 text-green-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              Key Features
            </h4>
            <div class="grid gap-2">
              <div
                v-for="feature in product.features"
                :key="feature"
                class="flex items-start p-3 bg-gray-700/30 rounded-lg border border-gray-600/30"
              >
                <div
                  class="w-2 h-2 bg-green-400 rounded-full mt-2 mr-3 flex-shrink-0"
                ></div>
                <span class="text-gray-300 text-sm">{{ feature }}</span>
              </div>
            </div>
          </div>

          <!-- Specifications -->
          <div v-if="product.specs" class="mb-6">
            <h4 class="text-white font-semibold mb-3 flex items-center">
              <svg
                class="w-5 h-5 mr-2 text-blue-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                />
              </svg>
              Specifications
            </h4>
            <div class="grid gap-2">
              <div
                v-for="(value, key) in product.specs"
                :key="key"
                class="flex justify-between items-center p-3 bg-gray-700/30 rounded-lg border border-gray-600/30"
              >
                <span class="text-gray-400 text-sm font-medium"
                  >{{ formatSpecName(key) }}:</span
                >
                <span class="text-gray-200 text-sm">{{ value }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modern Footer with Actions -->
      <div
        class="bg-gradient-to-r from-gray-800/80 via-gray-700/50 to-gray-800/80 backdrop-blur-sm border-t border-gray-700/50 p-6"
      >
        <div class="flex items-center justify-between gap-4">
          <!-- Price and Info -->
          <div class="flex-1">
            <div class="flex items-center gap-2 mb-2">
              <svg
                class="w-4 h-4 text-green-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"
                />
              </svg>
              <span class="text-gray-400 text-sm">Quote pricing available</span>
            </div>
            <p class="text-xs text-gray-500">Professional installation included</p>
          </div>

          <!-- Action Buttons -->
          <div class="flex gap-3">
            <button
              @click="close"
              class="px-6 py-2 bg-gray-700 hover:bg-gray-600 text-gray-200 rounded-lg font-medium transition-colors border border-gray-600"
            >
              Close
            </button>

            <button
              @click="addToCartAndClose"
              :class="[
                'px-6 py-2 text-white rounded-lg font-medium transition-all duration-200 shadow-lg',
                themeColor === 'green'
                  ? 'bg-green-600 hover:bg-green-500 shadow-green-600/30'
                  : themeColor === 'purple'
                  ? 'bg-purple-600 hover:bg-purple-500 shadow-purple-600/30'
                  : themeColor === 'blue'
                  ? 'bg-blue-600 hover:bg-blue-500 shadow-blue-600/30'
                  : themeColor === 'yellow'
                  ? 'bg-yellow-600 hover:bg-yellow-500 shadow-yellow-600/30'
                  : 'bg-green-600 hover:bg-green-500 shadow-green-600/30',
              ]"
            >
              {{ product.category === "monitoring" ? "Subscribe" : "Add to Quote" }}
            </button>
          </div>
        </div>
      </div>
      </div>
    </div>
  </Teleport>
</template>

<script>
import { computed, ref, watch, onBeforeUnmount } from "vue";
import { cartStore } from "../store/cartStore.js";
import { toastService } from "../services/toastService.js";

export default {
  name: "ProductDetailsModal",
  props: {
    isOpen: {
      type: Boolean,
      default: false,
    },
    product: {
      type: Object,
      default: () => ({}),
    },
  },
  emits: ["close"],
  setup(props, { emit }) {
    // Image carousel state
    const currentImageIndex = ref(0);

    // Modal visibility
    const isVisible = computed(
      () => props.isOpen && props.product && Object.keys(props.product).length > 0
    );

    const previousOverflow = ref("");
    watch(
      isVisible,
      (locked) => {
        if (typeof document === "undefined") return;
        if (locked) {
          previousOverflow.value = document.body.style.overflow;
          document.body.style.overflow = "hidden";
          console.log('ProductDetailsModal: Locked body scroll');
        } else {
          document.body.style.overflow = previousOverflow.value || "";
          console.log('ProductDetailsModal: Restored body scroll');
        }
      },
      { immediate: true }
    );

    onBeforeUnmount(() => {
      if (typeof document === "undefined") return;
      document.body.style.overflow = previousOverflow.value || "";
      console.log('ProductDetailsModal: Unmounted, restored scroll');
    });

    // Theme color based on product category
    const themeColor = computed(() => {
      if (!props.product.category) return "green";
      const colorMap = {
        cameras: "green",
        networking: "blue",
        access: "purple",
        alarms: "yellow",
        monitoring: "green",
        ai: "blue",
        network: "blue", // Added for network category
        security: "blue", // Added for security category
      };
      return colorMap[props.product.category] || "green";
    });

    // Category display name
    const categoryName = computed(() => {
      if (!props.product.category) return "Product";
      const nameMap = {
        cameras: "Security Camera",
        networking: "Network Device",
        access: "Access Control",
        alarms: "Security Alarm",
        monitoring: "Monitoring Service",
        ai: "AI Solution",
        network: "Network Device",
        security: "Security Device",
      };
      return nameMap[props.product.category] || "Product";
    });

    // Methods
    const close = () => {
      emit("close");
      currentImageIndex.value = 0;
    };

    const addToCartAndClose = () => {
      if (props.product && props.product.id) {
        cartStore.addItem(props.product);
        toastService.success(`Added to quote: ${props.product.name}`, { duration: 2500 });
      } else {
        toastService.error("Could not add item to quote");
      }
      close();
    };

    const nextImage = () => {
      if (props.product.images && props.product.images.length > 1) {
        currentImageIndex.value =
          (currentImageIndex.value + 1) % props.product.images.length;
      }
    };

    const previousImage = () => {
      if (props.product.images && props.product.images.length > 1) {
        const length = props.product.images.length;
        currentImageIndex.value = (currentImageIndex.value - 1 + length) % length;
      }
    };

    const setCurrentImage = (index) => {
      currentImageIndex.value = index;
    };

    const formatSpecName = (key) => {
      return key.replace(/([A-Z])/g, " $1").replace(/^./, (str) => str.toUpperCase());
    };

    // Reset image index when product changes
    watch(
      () => props.product,
      () => {
        currentImageIndex.value = 0;
      }
    );

    return {
      product: computed(() => props.product),
      isVisible,
      themeColor,
      categoryName,
      currentImageIndex,
      close,
      addToCartAndClose,
      nextImage,
      previousImage,
      setCurrentImage,
      formatSpecName,
    };
  },
};
</script>

<style scoped>
/* Custom scrollbar for the content area */
.overflow-y-auto {
  scrollbar-width: thin;
  scrollbar-color: rgba(156, 163, 175, 0.4) transparent;
}

.overflow-y-auto::-webkit-scrollbar {
  width: 8px;
}

.overflow-y-auto::-webkit-scrollbar-track {
  background: transparent;
}

.overflow-y-auto::-webkit-scrollbar-thumb {
  background: rgba(156, 163, 175, 0.4);
  border-radius: 4px;
}

.overflow-y-auto::-webkit-scrollbar-thumb:hover {
  background: rgba(156, 163, 175, 0.6);
}

/* Theme-specific button hover effects */
.theme-green button:hover {
  background-color: rgb(34 197 94);
}

.theme-purple button:hover {
  background-color: rgb(168 85 247);
}

.theme-blue button:hover {
  background-color: rgb(59 130 246);
}

.theme-yellow button:hover {
  background-color: rgb(234 179 8);
}
</style>
