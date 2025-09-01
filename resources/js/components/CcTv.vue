<template>
  <TopBanner />
  <div class="bg-gray-900">
    <main>
      <div class="relative isolate">
        <!-- Background SVG pattern - Fixed position -->
        <svg class="fixed inset-x-0 top-0 -z-40 h-screen w-full stroke-slate-600 [mask-image:radial-gradient(40rem_30rem_at_center,white,transparent)]"
            aria-hidden="true">
          <defs>
            <pattern id="cctv-pattern" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
              <path d="M.5 300V.5H200" fill="none" />
            </pattern>
          </defs>
          <svg x="50%" y="-1" class="overflow-visible">
            <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
              stroke-width="0" />
          </svg>
          <rect width="100%" height="200%" stroke-width="0" fill="url(#cctv-pattern)" />
        </svg>
        
        
        <div class="overflow-hidden">
          <div class="mx-auto max-w-7xl px-6 pb-32 pt-12 sm:pt-16 lg:px-8 lg:pt-20">
            <h1 class="text-3xl font-bold text-center text-white mb-8 relative">Intelligent <span class="text-green-600 dark:text-blue-500">CCTV</span> Security Products</h1>
            <p class="text-white text-sm mb-10 text-center relative">Our top of the line security camera products come with many AI features that can help identify certain people in crowds by what they are wearing or complete facial recognition.</p>
    
            <!-- Product Filter -->
            <ProductFilter :initialCategory="activeCategory" @filter-change="filterProducts" />
            
            <!-- Product Grid -->
            <div v-if="Object.keys(groupedProducts).length === 0" class="text-center text-white py-10">
              No products found. Please try a different filter.
            </div>
            
            <div v-for="(brandGroup, brand) in groupedProducts" :key="brand" class="mb-16" v-else>
              <h2 class="text-left text-wrap text-green-600 text-bold mb-5">{{ brand }}</h2>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="product in brandGroup" :key="product.id" 
                     class="bg-gray-800 rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:transform hover:scale-[1.02]">
                  <img :src="product.image || '/public/images/axis-dome-side.webp'" 
                       :alt="product.name" 
                       class="w-full h-48 object-scale-down"
                       @error="$event.target.src = '/public/images/axis-dome-side.webp'">
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
import TopBanner from '../components/TopBanner.vue';
import CartModal from '../components/CartModal.vue';
import ProductFilter from '../components/ProductFilter.vue';
import ProductDetailsModal from '../components/ProductDetailsModal.vue';
import RecentlyViewedProducts from '../components/RecentlyViewedProducts.vue';
import { cartStore } from '../store/cartStore.js';
import { toastService } from '../services/toastService.js';
import { recentlyViewedService } from '../services/recentlyViewedService.js';
import { cameraProducts } from '../data/productData.js';

export default {
  name: 'CcTv',
  components: {
    TopBanner,
    CartModal,
    ProductFilter,
    ProductDetailsModal,
    RecentlyViewedProducts
  },
  setup() {
    const cartItemCount = computed(() => cartStore.getItemCount.value);
    // Ensure we have valid product data or use an empty array as fallback
    const allProducts = ref(Array.isArray(cameraProducts) ? cameraProducts : []);
    const filteredProducts = ref(Array.isArray(cameraProducts) ? [...cameraProducts] : []);
    const activeCategory = ref('all');
    const productDetailsOpen = ref(false);
    const selectedProduct = ref(null);

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
      const grouped = {};
      
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
      
      return grouped || {};
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
    
    return {
      cartItemCount,
      groupedProducts,
      activeCategory,
      productDetailsOpen,
      selectedProduct,
      filterProducts,
      addToCart,
      openCart,
      showProductDetails,
      closeProductDetails
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

/* Main scrollable content container */
.overflow-hidden {
  position: relative;
  z-index: 10;
  overflow-y: auto;
  overflow-x: hidden;
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
</style>

