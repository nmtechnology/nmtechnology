<template>
  <!-- Halloween Promotional Banner at the top -->
  <PromoBanner 
    :maxHeight="80"
    link="/halloween-special"
    fixed
    dismissible
    linkAriaLabel="View our Halloween security system special offers"
    @dismissed="handleBannerDismiss"
  >
    <div class="absolute inset-0 bg-black bg-opacity-40 md:flex items-center justify-center hidden">
      <div class="text-center">
        <h3 class="text-xl md:text-2xl font-bold text-orange-500">Halloween Security Special!</h3>
        <p class="text-white text-sm md:text-lg">Get 20% off all security systems until October 31st</p>
      </div>
    </div>
  </PromoBanner>
  
  <div class="bg-gray-900 min-h-screen flex flex-col">
    <main class="pt-[60px] flex-grow"> <!-- Reduced padding to account for the fixed banner, flex-grow to push footer down -->
      <div class="relative isolate">
        <!-- SVG Background Pattern (Same as HomePage) - Now Fixed Position -->
        <svg class="fixed inset-x-0 top-0 -z-40 h-screen w-full stroke-slate-600 [mask-image:radial-gradient(40rem_30rem_at_center,white,transparent)]"
            aria-hidden="true">
            <defs>
                <pattern id="1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84" width="200" height="200" x="50%" y="-1"
                    patternUnits="userSpaceOnUse">
                    <path d="M.5 300V.5H200" fill="none" />
                </pattern>
            </defs>
            <svg x="50%" y="-1" class="overflow-visible">
                <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
                    stroke-width="0" />
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84)" />
        </svg>
        
        <!-- Gradient Blur Effect (Same as HomePage) - Now Fixed Position -->
        <div class="fixed left-1/2 right-0 top-0 -z-30 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
            aria-hidden="true">
            <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#3b71ab] to-[#9689fc] opacity-30"
                style="clip-path: polygon(63.1% 29.5%, 100% 17.1%, 76.6% 3%, 69.4% 0%, 44.6% 4.7%, 40.5% 25.3%, 59.8% 49%, 55.2% 57.8%, 44.4% 57.2%, 27.8% 47.9%, 35.1% 81.5%, 0% 97.7%, 39.2% 100%, 35.2% 81.4%, 97.2% 52.8%, 30.1% 29.5%);">
            </div>
        </div>
        
        <div class="overflow-visible relative z-10">
          <div class="mx-auto max-w-7xl px-6 pb-16 pt-12 sm:pt-16 lg:px-8 lg:pt-20 bg-gray-900/40 rounded-lg backdrop-blur-sm shadow-xl">
            <h1 class="text-3xl font-bold text-center text-white mb-8 relative">Intelligent <span class="text-green-600 dark:text-blue-500">CCTV</span> Security Products</h1>
            <p class="text-white text-sm mb-10 text-center relative">Here are our most popualr products, here you can select the products that you may already know what you need for your project, add them to your cart and then when your ready you can check out
              and our system will send this cart to our team as an inquiry and we will get back to you with pricing and availability as soon as possible.
            </p>
    
            <!-- Product Filter -->
            <ProductFilter :initialCategory="activeCategory" @filter-change="filterProducts" />
            
            <!-- Product Grid -->
            <div v-if="!groupedProducts || Object.keys(groupedProducts || {}).length === 0" class="text-center text-white py-10">
              No products found. Please try a different filter.
            </div>
            
            <div v-for="(brandGroup, brand) in groupedProducts || {}" :key="brand" class="mb-16" v-else>
              <h2 class="text-left text-wrap text-green-600 text-bold mb-5">{{ brand }}</h2>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="product in brandGroup" :key="product.id" 
                     class="bg-gray-800/50 rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:transform hover:scale-[1.02] backdrop-blur-sm">
                  <img :src="product.image || '/images/axis-dome-side.webp'" 
                       :alt="product.name" 
                       class="w-full h-48 object-scale-down"
                       @error="$event.target.src = '/images/axis-dome-side.webp'">
                  <div class="p-4">
                    <h2 class="text-xl text-green-600 font-semibold">{{ product.name }}</h2>
                    <p class="text-gray-400 mt-2">{{ product.description }}</p>
                    
                    <!-- Features -->
                    <div class="mt-3 flex flex-wrap gap-2">
                      <span v-for="feature in product.features.slice(0, 2)" :key="feature" 
                            class="inline-block px-2 py-1 text-xs font-medium bg-gray-700 text-gray-300 rounded-md">
                        {{ feature }}
                      </span>
                      <span v-if="product.features.length > 2" 
                            class="inline-block px-2 py-1 text-xs font-medium bg-gray-700 text-gray-300 rounded-md">
                        +{{ product.features.length - 2 }} more
                      </span>
                    </div>
                    
                    <span class="text-lg font-bold text-green-600 mt-4 block">{{ product.price ? `$${product.price.toFixed(2)}` : 'Call For Price' }}</span>
                    <div class="flex gap-2 mt-4">
                      <button @click="addToCart(product)" 
                              class="flex-1 bg-blue-500 text-white py-2 rounded-l hover:bg-blue-600 transition-colors">
                        Add to Cart
                      </button>
                      <button @click="showProductDetails(product)" 
                              class="bg-gray-700 text-white px-3 py-2 rounded-r hover:bg-gray-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  
  <!-- Recently Viewed Products Footer - Fixed at bottom -->
  <transition name="fade">
    <footer v-if="hasRecentProducts" class="bg-gray-900/90 border-t border-gray-700 w-full relative left-0 z-40">
      <!-- Toggle button -->
      <button @click="toggleRecentlyViewed" class="absolute right-6 bg-gray-900/90 border rounded-t-md px-4 py-1 text-xs text-gray-300 hover:text-white">
        {{ isRecentlyViewedExpanded ? 'Hide' : 'Show' }} Recently Viewed
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline ml-1" :class="{'rotate-180': !isRecentlyViewedExpanded}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
      
      <!-- Footer content with transition -->
      <transition name="slide">
        <div v-if="isRecentlyViewedExpanded" class="py-6">
          <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-2xl font-bold text-white mb-4">Recently Viewed Products</h2>
            <div class="overflow-x-auto pb-3" style="scrollbar-width: thin;">
              <div class="flex space-x-4 md:space-x-6" style="min-width: min-content;">
                <transition-group name="product-list" tag="div" class="flex space-x-4 md:space-x-6">
                  <div v-for="product in recentlyViewedProducts" :key="product.id" 
                      @click="showProductDetails(product)"
                      class="flex-shrink-0 w-36 sm:w-48 md:w-56 bg-gray-800/60 rounded-lg shadow-md overflow-hidden cursor-pointer hover:shadow-lg transition-all duration-300 hover:bg-gray-800/80 hover:-translate-y-1">
                    <img :src="product.image" :alt="product.name" class="w-full h-32 object-scale-down p-2">
                    <div class="p-3">
                      <h3 class="text-sm font-medium text-white truncate">{{ product.name }}</h3>
                      <p class="text-xs text-gray-400 mt-1">{{ formatTimeAgo(product.timestamp) }}</p>
                    </div>
                  </div>
                </transition-group>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </footer>
  </transition>

  <!-- Cart Modal -->
  <CartModal />
  
  <!-- Product Details Modal -->
  <ProductDetailsModal 
    v-if="selectedProduct"
    :isOpen="productDetailsOpen"
    :product="selectedProduct"
    @close="closeProductDetails"
  />
</template>

<script>
import { ref, computed, watch } from 'vue';
import CartModal from '../components/CartModal.vue';
import ProductFilter from '../components/ProductFilter.vue';
import BackgroundPattern from '../components/BackgroundPattern.vue';
import ProductDetailsModal from '../components/ProductDetailsModal.vue';
import RecentlyViewedProducts from '../components/RecentlyViewedProducts.vue';
import PromoBanner from '../components/PromoBanner.vue';
import { cartStore } from '../store/cartStore.js';
import { toastService } from '../services/toastService.js';
import { recentlyViewedService } from '../services/recentlyViewedService.js';
import { cameraProducts } from '../data/productData.js';


export default {
  name: 'CcTv',
  components: {
    CartModal,
    ProductFilter,
    ProductDetailsModal,
    RecentlyViewedProducts,
    BackgroundPattern,
    PromoBanner
  },
  setup() {
    const cartItemCount = computed(() => cartStore.getItemCount.value);
    // Ensure we have valid product data or use an empty array as fallback
    const allProducts = ref(Array.isArray(cameraProducts) ? cameraProducts : []);
    const filteredProducts = ref(Array.isArray(cameraProducts) ? [...cameraProducts] : []);
    const activeCategory = ref('all');
    const productDetailsOpen = ref(false);
    const selectedProduct = ref(null);
    const recentlyViewedProducts = computed(() => recentlyViewedService.getProducts());
    const hasRecentProducts = computed(() => recentlyViewedService.hasProducts());
    
    // Recently viewed products footer toggle state
    const isRecentlyViewedExpanded = ref(true);
    
    // Toggle recently viewed products footer visibility
    const toggleRecentlyViewed = () => {
      isRecentlyViewedExpanded.value = !isRecentlyViewedExpanded.value;
      // Save preference to localStorage
      try {
        localStorage.setItem('recentlyViewedExpanded', isRecentlyViewedExpanded.value ? 'true' : 'false');
      } catch (e) {
        console.error('Error saving preference to localStorage:', e);
      }
    };
    
    // Load preference from localStorage on component mount
    try {
      const savedPreference = localStorage.getItem('recentlyViewedExpanded');
      if (savedPreference !== null) {
        isRecentlyViewedExpanded.value = savedPreference === 'true';
      }
    } catch (e) {
      console.error('Error loading preference from localStorage:', e);
    }

    // Handler for banner dismissal
    const handleBannerDismiss = () => {
      console.log('Banner dismissed!');
      // You could add additional logic here if needed
      localStorage.setItem('halloweenBannerDismissed', 'true');
    };

    // Filter products by category
    const filterProducts = (categoryId) => {
      activeCategory.value = categoryId || 'all';
      
      if (!Array.isArray(allProducts.value)) {
        console.error('Product data is not an array:', allProducts.value);
        filteredProducts.value = [];
        return;
      }
      
      if (categoryId === 'all') {
        filteredProducts.value = [...allProducts.value];
      } else {
        filteredProducts.value = allProducts.value.filter(product => 
          product && product.category === categoryId
        );
      }
    };
    
    // Group products by brand
    const groupedProducts = computed(() => {
      // Start with an empty object
      const grouped = {};
      
      try {
        // Make sure filteredProducts.value is an array before processing
        if (filteredProducts.value && Array.isArray(filteredProducts.value)) {
          filteredProducts.value.forEach(product => {
            if (product && product.brand) {
              if (!grouped[product.brand]) {
                grouped[product.brand] = [];
              }
              grouped[product.brand].push(product);
            }
          });
        }
      } catch (error) {
        console.error('Error grouping products:', error);
        // Return empty object in case of error
      }
      
      return grouped;
    });
    
    // Cart operations
    const addToCart = (product) => {
      cartStore.addItem({
        id: product.id,
        name: product.name,
        image: product.image,
        price: product.price
      });
      
      // Add cart badge animation class
      const cartBadges = document.querySelectorAll('.cart-badge');
      cartBadges.forEach(badge => {
        badge.classList.add('cart-badge-pulse');
        setTimeout(() => {
          badge.classList.remove('cart-badge-pulse');
        }, 1000);
      });
      
      toastService.success(`Added ${product.name} to cart!`);
    };
    
    const openCart = () => {
      cartStore.openCart();
    };
    
    // Product details modal
    const showProductDetails = (product) => {
      // If we receive a product with just an ID (from RecentlyViewed)
      // we need to find the full product data
      if (product && product.id && !product.features) {
        const fullProduct = allProducts.value.find(p => p.id === product.id);
        if (fullProduct) {
          selectedProduct.value = fullProduct;
          // Add to recently viewed
          recentlyViewedService.addProduct(fullProduct);
        } else {
          selectedProduct.value = product; // Use limited data if full not found
        }
      } else {
        selectedProduct.value = product;
        // Add to recently viewed
        if (product) {
          recentlyViewedService.addProduct(product);
        }
      }
      
      productDetailsOpen.value = true;
    };
    
    const closeProductDetails = () => {
      productDetailsOpen.value = false;
      setTimeout(() => {
        selectedProduct.value = null;
      }, 200); // Small delay to allow for animation
    };
    
    // Format time ago for recently viewed products
    const formatTimeAgo = (timestamp) => {
      try {
        const date = new Date(timestamp);
        const now = new Date();
        const diffMs = now - date;
        
        // Convert to minutes, hours, and days
        const diffMinutes = Math.floor(diffMs / 60000);
        const diffHours = Math.floor(diffMinutes / 60);
        const diffDays = Math.floor(diffHours / 24);
        
        if (diffDays > 0) {
          return `${diffDays} ${diffDays === 1 ? 'day' : 'days'} ago`;
        } else if (diffHours > 0) {
          return `${diffHours} ${diffHours === 1 ? 'hour' : 'hours'} ago`;
        } else if (diffMinutes > 0) {
          return `${diffMinutes} ${diffMinutes === 1 ? 'minute' : 'minutes'} ago`;
        } else {
          return 'Just now';
        }
      } catch (e) {
        return '';
      }
    };
    
    return {
      cartItemCount,
      groupedProducts,
      activeCategory,
      productDetailsOpen,
      selectedProduct,
      recentlyViewedProducts,
      hasRecentProducts,
      isRecentlyViewedExpanded,
      filterProducts,
      addToCart,
      openCart,
      showProductDetails,
      closeProductDetails,
      handleBannerDismiss,
      formatTimeAgo,
      toggleRecentlyViewed
    };
  }
};
</script>

<style scoped>
/* Background styling to match homepage */
.bg-gray-900 {
  position: relative;
  min-height: 100vh;
}

/* Ensure content is positioned properly relative to background elements */
.relative {
  position: relative;
  z-index: 1;
}

/* Main scrollable content container with improved styling for overlay effect */
.overflow-visible {
  position: relative;
  z-index: 10;
}

/* Content container with more transparent background */
.mx-auto.max-w-7xl {
  background: rgba(17, 24, 39, 0.4);
  backdrop-filter: blur(4px);
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  margin-bottom: 2rem;
}

/* Improve text readability against the complex background */
h1, p {
  text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

/* Product card hover effects */
.bg-gray-800:hover {
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  transform: translateY(-4px);
  transition: all 0.3s ease;
}

/* Make sure SVG background doesn't interfere with interactive elements */
svg.fixed, svg.absolute {
  pointer-events: none;
}

/* Ensure fixed backgrounds cover the full viewport */
.fixed {
  min-height: 100vh;
  width: 100%;
}

/* Add margin-top to account for the TopBanner and PromoBanner */
main {
  margin-top: 30px;
  padding-bottom: 10rem; /* Extra padding to account for fixed footer */
}

/* Add some spacing between brand sections */
.mb-16 {
  position: relative;
  z-index: 10;
}

/* Footer with recently viewed products styling */
footer {
  border-top: 1px solid rgba(55, 65, 81, 0.5);
  box-shadow: 0 -8px 16px -2px rgba(0, 0, 0, 0.3), 0 -4px 8px -2px rgba(0, 0, 0, 0.2);
  z-index: 40;
  backdrop-filter: blur(12px);
}

/* Scrollable container for products */
.overflow-x-auto {
  scrollbar-width: thin;
  scrollbar-color: rgba(75, 85, 99, 0.5) rgba(31, 41, 55, 0.5);
}

.overflow-x-auto::-webkit-scrollbar {
  height: 6px;
}

.overflow-x-auto::-webkit-scrollbar-track {
  background: rgba(31, 41, 55, 0.5);
  border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
  background: rgba(75, 85, 99, 0.5);
  border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
  background: rgba(75, 85, 99, 0.7);
}

/* Transition animations for recently viewed products */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.product-list-enter-active,
.product-list-leave-active {
  transition: all 0.5s ease;
}

.product-list-enter-from {
  opacity: 0;
  transform: translateY(30px);
}

.product-list-leave-to {
  opacity: 0;
  transform: translateX(-30px);
}

.product-list-move {
  transition: transform 0.5s ease;
}

/* Slide animation for footer content */
.slide-enter-active,
.slide-leave-active {
  transition: max-height 0.5s ease, opacity 0.4s ease;
  max-height: 500px;
  overflow: hidden;
}

.slide-enter-from,
.slide-leave-to {
  max-height: 0;
  opacity: 0;
  overflow: hidden;
}
</style>

