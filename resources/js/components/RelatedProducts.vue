<template>
  <section v-if="filteredProducts.length > 0" class="py-12 bg-gray-900/40">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <!-- Section Header -->
      <div class="flex items-center justify-between mb-6">
        <div>
          <h2 class="text-2xl sm:text-3xl font-bold text-white mb-2">
            {{ title || 'Related Products' }}
          </h2>
          <p class="text-gray-400">{{ subtitle || 'Explore our selection of products' }}</p>
        </div>
        <button
          v-if="showViewAllButton"
          @click="viewAllProducts"
          class="hidden sm:inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-lg transition-all duration-300"
          :class="buttonClasses"
        >
          View All
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M17 8l4 4m0 0l-4 4m4-4H3"
            />
          </svg>
        </button>
      </div>

      <!-- Scrollable Product Grid -->
      <div class="relative group">
        <!-- Left scroll button -->
        <button
          v-if="showNavButtons && canScrollLeft"
          @click="scrollLeft"
          class="absolute left-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-gray-800/90 hover:bg-gray-700 text-white backdrop-blur-sm shadow-lg transition-all duration-200 opacity-0 group-hover:opacity-100 flex items-center justify-center"
          aria-label="Scroll left"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>

        <!-- Products Container -->
        <div
          ref="scrollContainer"
          class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide pb-4"
          @scroll="updateScrollButtons"
        >
          <div
            v-for="product in filteredProducts"
            :key="product.id"
            class="flex-shrink-0 w-64 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:transform hover:scale-[1.02] cursor-pointer border"
            :class="cardClasses"
            @click="showProductDetails(product)"
          >
            <div class="p-4">
              <img
                :src="product.image || '/images/axis-dome-side.webp'"
                :alt="product.name"
                class="w-full h-40 object-scale-down mb-4"
                @error="$event.target.src = '/images/axis-dome-side.webp'"
              />

              <h3
                class="text-lg font-bold mb-2 line-clamp-2"
                :class="titleClasses"
              >
                {{ product.name }}
              </h3>

              <p class="text-gray-400 text-sm mb-3 line-clamp-2">
                {{ product.description }}
              </p>

              <div v-if="product.features && product.features.length" class="flex flex-wrap gap-2 mb-3">
                <span
                  v-for="feature in product.features.slice(0, 2)"
                  :key="feature"
                  class="inline-block px-2 py-1 text-xs font-medium bg-gray-700 text-gray-300 rounded-md"
                >
                  {{ feature }}
                </span>
                <span
                  v-if="product.features.length > 2"
                  class="inline-block px-2 py-1 text-xs font-medium bg-gray-700 text-gray-300 rounded-md"
                >
                  +{{ product.features.length - 2 }} more
                </span>
              </div>

              <div class="flex items-center justify-between">
                <span class="font-bold" :class="priceClasses">
                  {{ product.price ? `$${product.price.toFixed(2)}` : 'Call for Price' }}
                </span>
                <button
                  @click.stop="addToQuote(product)"
                  class="px-3 py-1.5 rounded-lg text-sm font-semibold transition-all duration-300"
                  :class="addToQuoteButtonClasses"
                >
                  Add to Quote
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Right scroll button -->
        <button
          v-if="showNavButtons && canScrollRight"
          @click="scrollRight"
          class="absolute right-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-gray-800/90 hover:bg-gray-700 text-white backdrop-blur-sm shadow-lg transition-all duration-200 opacity-0 group-hover:opacity-100 flex items-center justify-center"
          aria-label="Scroll right"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>

      <!-- View All button for mobile -->
      <div v-if="showViewAllButton" class="mt-6 flex justify-center sm:hidden">
        <button
          @click="viewAllProducts"
          class="inline-flex items-center gap-2 px-6 py-3 rounded-lg font-semibold transition-all duration-300"
          :class="buttonClasses"
        >
          View All Products
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M17 8l4 4m0 0l-4 4m4-4H3"
            />
          </svg>
        </button>
      </div>
    </div>
  </section>
</template>

<script>
import { ref, computed, onMounted, onBeforeUnmount } from 'vue';
import { useRouter } from 'vue-router';
import { cameraProducts } from '../data/productData.js';
import { cartStore } from '../store/cartStore.js';
import { toastService } from '../services/toastService.js';

export default {
  name: 'RelatedProducts',
  props: {
    // Filter by category (camera, network, alarm, access, etc.)
    category: {
      type: [String, Array],
      default: null
    },
    // Filter by brand
    brand: {
      type: String,
      default: null
    },
    // Exclude specific product IDs
    excludeIds: {
      type: Array,
      default: () => []
    },
    // Maximum number of products to show
    maxProducts: {
      type: Number,
      default: 12
    },
    // Section title
    title: {
      type: String,
      default: 'Related Products'
    },
    // Section subtitle
    subtitle: {
      type: String,
      default: 'Explore our selection of products'
    },
    // Theme color (green, blue, purple, yellow, orange, red)
    theme: {
      type: String,
      default: 'green',
      validator: (value) => ['green', 'blue', 'purple', 'yellow', 'orange', 'red'].includes(value)
    },
    // Show "View All" button
    showViewAllButton: {
      type: Boolean,
      default: true
    },
    // Show navigation arrows
    showNavButtons: {
      type: Boolean,
      default: true
    }
  },
  emits: ['product-clicked'],
  setup(props, { emit }) {
    const router = useRouter();
    const scrollContainer = ref(null);
    const canScrollLeft = ref(false);
    const canScrollRight = ref(false);

    // Filter products based on props
    const filteredProducts = computed(() => {
      let products = [...cameraProducts];

      // Filter by category
      if (props.category) {
        const categories = Array.isArray(props.category) ? props.category : [props.category];
        products = products.filter(p => categories.includes(p.category));
      }

      // Filter by brand
      if (props.brand) {
        products = products.filter(p => p.brand === props.brand);
      }

      // Exclude specific IDs
      if (props.excludeIds.length > 0) {
        products = products.filter(p => !props.excludeIds.includes(p.id));
      }

      // Limit products
      return products.slice(0, props.maxProducts);
    });

    // Theme-based styling
    const themeColors = {
      green: {
        card: 'bg-gradient-to-br from-gray-800 to-gray-900 border-green-500/20',
        title: 'text-green-400',
        price: 'text-green-500',
        button: 'bg-green-600 hover:bg-green-500 text-white',
        viewAllButton: 'bg-green-600 hover:bg-green-500 text-white'
      },
      blue: {
        card: 'bg-gradient-to-br from-gray-800 to-gray-900 border-blue-500/20',
        title: 'text-blue-400',
        price: 'text-blue-500',
        button: 'bg-blue-600 hover:bg-blue-500 text-white',
        viewAllButton: 'bg-blue-600 hover:bg-blue-500 text-white'
      },
      purple: {
        card: 'bg-gradient-to-br from-gray-800 to-gray-900 border-purple-500/20',
        title: 'text-purple-400',
        price: 'text-purple-500',
        button: 'bg-purple-600 hover:bg-purple-500 text-white',
        viewAllButton: 'bg-purple-600 hover:bg-purple-500 text-white'
      },
      yellow: {
        card: 'bg-gradient-to-br from-gray-800 to-gray-900 border-yellow-500/20',
        title: 'text-yellow-400',
        price: 'text-yellow-500',
        button: 'bg-yellow-600 hover:bg-yellow-500 text-white',
        viewAllButton: 'bg-yellow-600 hover:bg-yellow-500 text-white'
      },
      orange: {
        card: 'bg-gradient-to-br from-gray-800 to-gray-900 border-orange-500/20',
        title: 'text-orange-400',
        price: 'text-orange-500',
        button: 'bg-orange-600 hover:bg-orange-500 text-white',
        viewAllButton: 'bg-orange-600 hover:bg-orange-500 text-white'
      },
      red: {
        card: 'bg-gradient-to-br from-gray-800 to-gray-900 border-red-500/20',
        title: 'text-red-400',
        price: 'text-red-500',
        button: 'bg-red-600 hover:bg-red-500 text-white',
        viewAllButton: 'bg-red-600 hover:bg-red-500 text-white'
      }
    };

    const currentTheme = computed(() => themeColors[props.theme] || themeColors.green);
    const cardClasses = computed(() => currentTheme.value.card);
    const titleClasses = computed(() => currentTheme.value.title);
    const priceClasses = computed(() => currentTheme.value.price);
    const addToQuoteButtonClasses = computed(() => currentTheme.value.button);
    const buttonClasses = computed(() => currentTheme.value.viewAllButton);

    // Scroll functions
    const scrollLeft = () => {
      if (scrollContainer.value) {
        scrollContainer.value.scrollBy({ left: -300, behavior: 'smooth' });
      }
    };

    const scrollRight = () => {
      if (scrollContainer.value) {
        scrollContainer.value.scrollBy({ left: 300, behavior: 'smooth' });
      }
    };

    const updateScrollButtons = () => {
      if (!scrollContainer.value) return;

      const container = scrollContainer.value;
      canScrollLeft.value = container.scrollLeft > 0;
      canScrollRight.value = 
        container.scrollLeft < container.scrollWidth - container.clientWidth - 10;
    };

    // Product actions
    const showProductDetails = (product) => {
      emit('product-clicked', product);
    };

    const addToQuote = (product) => {
      cartStore.addItem({
        id: product.id,
        name: product.name,
        image: product.image,
        price: product.price,
      });
      toastService.success(`Added ${product.name} to quote!`);
    };

    const viewAllProducts = () => {
      router.push('/products');
    };

    // Lifecycle
    onMounted(() => {
      if (scrollContainer.value) {
        scrollContainer.value.addEventListener('scroll', updateScrollButtons);
        updateScrollButtons();
      }

      // Update scroll buttons on window resize
      window.addEventListener('resize', updateScrollButtons);
    });

    onBeforeUnmount(() => {
      if (scrollContainer.value) {
        scrollContainer.value.removeEventListener('scroll', updateScrollButtons);
      }
      window.removeEventListener('resize', updateScrollButtons);
    });

    return {
      filteredProducts,
      scrollContainer,
      canScrollLeft,
      canScrollRight,
      cardClasses,
      titleClasses,
      priceClasses,
      addToQuoteButtonClasses,
      buttonClasses,
      scrollLeft,
      scrollRight,
      updateScrollButtons,
      showProductDetails,
      addToQuote,
      viewAllProducts,
    };
  }
};
</script>

<style scoped>
/* Hide scrollbar but keep functionality */
.scrollbar-hide {
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.scrollbar-hide::-webkit-scrollbar {
  display: none;
}

/* Line clamp utilities */
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
