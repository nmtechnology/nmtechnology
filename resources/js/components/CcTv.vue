<template>
  <!-- Halloween Promotional Banner at the top -->
  <PromoBanner :maxHeight="80" link="/halloween-special" fixed dismissible
    linkAriaLabel="View our Halloween security system special offers" @dismissed="handleBannerDismiss">
    <div class="absolute inset-0 bg-black bg-opacity-40 md:flex items-center justify-center hidden">
      <div class="text-center">
        <h3 class="text-xl md:text-5xl font-bold text-orange-500">Halloween Security Special!</h3>
        <p class="text-white text-lg md:text-lg">Get 10% off all security systems until October 31st</p>
      </div>
    </div>
  </PromoBanner>

  <div class="bg-gray-900 min-h-screen flex flex-col">
    <main class="pt-[60px] flex-grow">
      <!-- Reduced padding to account for the fixed banner, flex-grow to push footer down -->
      <div class="relative isolate">
        <!-- SVG Background Pattern (Same as HomePage) - Now Fixed Position -->
        <svg
          class="fixed inset-x-0 top-0 -z-40 h-screen w-full stroke-slate-600 [mask-image:radial-gradient(40rem_30rem_at_center,white,transparent)]"
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

        <div class="overflow-visible relative z-10">
          <div
            class="mx-auto max-w-7xl px-6 pb-16 pt-12 sm:pt-16 lg:px-8 lg:pt-20 bg-gray-900/40 rounded-lg backdrop-blur-sm shadow-xl">
            <h1 class="text-4xl font-extrabold text-center text-white mb-8 relative">
              <span v-if="activeCategory === 'package'">
                Complete <span class="text-green-500">Security Packages</span>
              </span>
              <span v-else>
                Intelligent <span class="text-green-600 dark:text-blue-500">CCTV</span> Security Products
              </span>
            </h1>
            <p class="text-white text-sm mb-10 text-center relative">
              <span v-if="activeCategory === 'package'">
                Our comprehensive security packages offer everything you need for complete protection. Choose the tier
                that fits your needs and add it to your quote cart - our team will reach out with detailed pricing and
                installation options.
              </span>
              <span v-else>
                Here are our most popular products. Select what you need for your project, add them to your quote cart, and
                when you're ready to check out, our system will send this quote cart to our team as an inquiry. We'll get back
                to you with pricing and availability as soon as possible.
              </span>
            </p>

            <!-- Product Filter -->
            <div id="product-section">
              <ProductFilter :initialCategory="activeCategory" @filter-change="filterProducts" />
            </div>

            <!-- Special Package Info Box -->
            <div v-if="activeCategory === 'package'" id="package-section"
              class="bg-green-900/20 border border-green-600/30 rounded-lg p-4 mb-8">
              <div class="flex flex-col md:flex-row items-center gap-4">
                <div class="flex-1">
                  <h3 class="text-green-500 text-lg font-bold mb-2">Complete Security Solutions</h3>
                  <p class="text-gray-300 text-sm">
                    Our security packages are designed to provide complete coverage for properties of all sizes. Each
                    package includes cameras, recording equipment, storage, and all necessary accessories. As you move
                    up in tiers, you'll get higher resolution, more storage, and additional advanced features.
                  </p>
                </div>
                <div class="flex-shrink-0">
                  <button @click="showPackageComparison = !showPackageComparison"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                    <span>Compare All Packages</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                      :class="{'rotate-180': showPackageComparison}" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </button>
                </div>
              </div>

              <!-- Package Comparison Table -->
              <transition name="slide">
                <div v-if="showPackageComparison" class="mt-4 overflow-x-auto">
                  <table class="w-full text-left text-sm">
                    <thead class="bg-gray-800/50">
                      <tr>
                        <th class="px-4 py-2 text-gray-400">Package</th>
                        <th class="px-4 py-2 text-gray-400">Cameras</th>
                        <th class="px-4 py-2 text-gray-400">Resolution</th>
                        <th class="px-4 py-2 text-gray-400">Storage</th>
                        <th class="px-4 py-2 text-gray-400">Price</th>
                        <th class="px-4 py-2 text-gray-400"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="product in packageProducts" :key="product.id"
                        class="border-b border-gray-800 hover:bg-gray-800/30 transition-colors">
                        <td class="px-4 py-3 text-white font-medium">{{ product.name }}</td>
                        <td class="px-4 py-3 text-gray-300">{{ product.specs?.cameraCount }}</td>
                        <td class="px-4 py-3 text-gray-300">{{ product.specs?.resolution }}</td>
                        <td class="px-4 py-3 text-gray-300">{{ product.specs?.storage }}</td>
                        <td class="px-4 py-3 text-green-500 font-bold">${{ product.price?.toFixed(2) }}</td>
                        <td class="px-4 py-3">
                          <button @click="showProductDetails(product)" class="text-blue-400 hover:text-blue-300">
                            Details
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </transition>
            </div>

            <!-- Product Grid -->
            <div id="product-grid" class="scroll-mt-32 pt-4">
              <div v-if="!groupedProducts || Object.keys(groupedProducts || {}).length === 0"
                class="text-center text-white py-10">
                No products found. Please try a different filter.
              </div>

              <div v-for="(brandGroup, brand) in groupedProducts || {}" :key="brand" class="mb-16" v-else
                :id="brand === 'NM Technology Security Monitoring' ? 'monitoring-section' : null">
              <h2 class="text-left text-wrap text-green-600 text-bold text-2xl font-extrabold mb-5">{{ brand }}</h2>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="product in brandGroup" :key="product.id"
                  :class="['rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:transform hover:scale-[1.02] backdrop-blur-sm cursor-pointer',
                      product.category === 'package' ? 'bg-gray-800/70 border border-green-600/30' : 
                      product.category === 'monitoring' ? 'bg-gray-800/70 border border-purple-600/30' : 'bg-gray-800/50']"
                  @click="showProductDetails(product)"
                  role="button"
                  :aria-label="`View details for ${product.name}`">
                  <div v-if="product.category === 'package'"
                    class="bg-green-600/20 text-green-500 text-xs font-bold px-3 py-1 text-center flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    CCTV SECURITY PACKAGE
                  </div>
                  <div v-if="product.category === 'monitoring'"
                    class="bg-purple-600/20 text-purple-400 text-xs font-bold px-3 py-1 text-center flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                    </svg>
                    SECURITY MONITORING
                  </div>
                  <img :src="product.image || '/images/axis-dome-side.webp'" :alt="product.name"
                    class="w-full h-48 object-scale-down" @error="$event.target.src = '/images/axis-dome-side.webp'">
                  <div class="p-4">
                    <h2 class="text-2xl font-bold" :class="{
                          'text-green-400 font-extrabold': product.category === 'package',
                          'text-purple-500 font-extrabold': product.category === 'monitoring',
                          'text-green-600 font-bold': product.category !== 'package' && product.category !== 'monitoring'
                        }">
                      {{ product.name }}
                    </h2>
                    <p class="text-gray-400 mt-2">{{ product.description }}</p>

                    <!-- Features -->
                    <div class="mt-3 flex flex-wrap gap-2">
                      <span v-for="feature in product.features.slice(0, product.category === 'package' ? 3 : 2)"
                        :key="feature"
                        class="inline-block px-2 py-1 text-xs font-medium bg-gray-700 text-gray-300 rounded-md">
                        {{ feature }}
                      </span>
                      <span v-if="product.features.length > (product.category === 'package' ? 3 : 2)"
                        class="inline-block px-2 py-1 text-xs font-medium bg-gray-700 text-gray-300 rounded-md">
                        +{{ product.features.length - (product.category === 'package' ? 3 : 2) }} more
                      </span>
                    </div>

                    <div class="flex items-center mt-4">
                      <span :class="[
                        'font-bold', 
                        product.category === 'package' ? 'text-xl text-green-500' : 
                        product.category === 'monitoring' ? 'text-xl text-purple-500' : 
                        'text-lg text-green-600'
                      ]">
                        {{ product.price ? `$${product.price.toFixed(2)}${product.recurring ? '/mo' : ''}` : 'Call For Price' }}
                      </span>
                      <span v-if="product.recurring"
                        class="ml-2 bg-purple-600/20 text-purple-400 text-xs px-2 py-0.5 rounded-full">
                        MONTHLY
                      </span>
                    </div>

                    <div v-if="product.category === 'package'" class="mt-2 text-xs text-gray-400">
                      {{ product.specs?.cameraCount || '' }} cameras · {{ product.specs?.resolution || '' }}
                    </div>
                    <div v-if="product.category === 'monitoring'" class="mt-2 text-xs text-gray-400">
                      {{ product.specs?.doorContacts || '' }} door contacts · {{ product.specs?.windowSensors || '' }}
                      window sensors
                    </div>
                    <div class="flex gap-2 mt-4">
                      <button @click.stop="addToCart(product)" :class="[
                                'flex-1 py-2 rounded-l text-white transition-colors flex items-center justify-center',
                                product.category === 'package' 
                                  ? 'bg-green-600 hover:bg-green-700' 
                                  : product.category === 'monitoring'
                                    ? 'bg-purple-600 hover:bg-purple-700'
                                    : 'bg-blue-500 hover:bg-blue-600'
                              ]">
                        <span v-if="product.category === 'package'" class="mr-1">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg>
                        </span>
                        <span v-else-if="product.category === 'monitoring'" class="mr-1">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                          </svg>
                        </span>
                        {{ product.category === 'monitoring' ? 'Subscribe' : 'Add to Quote Cart' }}
                      </button>
                      <button @click.stop="showProductDetails(product)" :class="[
                                'text-white px-3 py-2 rounded-r transition-colors cursor-pointer',
                                product.category === 'package' 
                                  ? 'bg-gray-800 hover:bg-gray-700' 
                                  : product.category === 'monitoring'
                                    ? 'bg-gray-800 hover:bg-gray-700'
                                    : 'bg-gray-700 hover:bg-gray-600'
                              ]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
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
      </div>
    </main>
  </div>

  <!-- Recently Viewed Products Footer - Fixed at bottom -->
  <transition name="fade">
    <footer v-if="hasRecentProducts" class="bg-gray-900/90 border-t border-gray-700 w-full relative left-0 z-40">
      <!-- Toggle button -->
      <button @click="toggleRecentlyViewed"
        class="absolute right-6 bg-gray-900/90 border rounded-t-md px-4 py-1 text-xs text-gray-300 hover:text-white">
        {{ isRecentlyViewedExpanded ? 'Hide' : 'Show' }} Recently Viewed
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline ml-1"
          :class="{'rotate-180': !isRecentlyViewedExpanded}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                  <div v-for="product in recentlyViewedProducts" :key="product.id" @click="showProductDetails(product)"
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
  <ProductDetailsModal v-if="selectedProduct" :isOpen="productDetailsOpen" :product="selectedProduct"
    @close="closeProductDetails" />
</template>

<script>
import { ref, computed, onMounted } from 'vue';
import { useRouter } from 'vue-router';
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
    
    // Package comparison toggle state
    const showPackageComparison = ref(false);
    
    // Check if we were directed here with a hash and handle it appropriately
    const { currentRoute } = useRouter();
    
    // Add onMounted hook to handle hash navigation
    onMounted(() => {
      // Check for hash in URL
      if (window.location.hash) {
        const targetId = window.location.hash.substring(1); // Remove the '#' character
        
        // Wait longer for the DOM to fully render and products to load
        setTimeout(() => {
          if (targetId === 'product-grid') {
            const element = document.getElementById('product-grid');
            if (element) {
              console.log('CcTv: Scrolling to product-grid');
              element.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else {
              console.warn('CcTv: Could not find #product-grid element');
            }
          }
        }, 600); // Increased timeout to ensure component is fully rendered
      }
    });
    
    // Get all package products for comparison table
    const packageProducts = computed(() => {
      return allProducts.value.filter(product => product.category === 'package')
        .sort((a, b) => (a.price || 0) - (b.price || 0));
    });
    
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
          
          // Sort packages by price (ascending)
          if (grouped['NM Technology Security Packages']) {
            grouped['NM Technology Security Packages'].sort((a, b) => {
              return (a.price || 0) - (b.price || 0);
            });
          }
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
    
    // Handle scroll-to events from SecurityFAQs component
    const handleScrollTo = (targetId) => {
      let targetElement = null;
      
      if (targetId === 'packages') {
        // Filter for packages and scroll to the top of the results
        filterProducts('package');
        targetElement = document.querySelector('#package-section');
      } else if (targetId === 'monitoring') {
        // Filter for monitoring packages and scroll to the top of the results
        filterProducts('monitoring');
        targetElement = document.querySelector('#monitoring-section');
      } else if (targetId === 'products' || targetId === 'product-grid') {
        // Show all products
        filterProducts('all');
        targetElement = document.querySelector('#product-grid');
      }
      
      // Scroll to the target element if found
      if (targetElement) {
        setTimeout(() => {
          targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 100); // Short delay to ensure filter has applied
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
      showPackageComparison,
      packageProducts,
      filterProducts,
      addToCart,
      openCart,
      showProductDetails,
      closeProductDetails,
      handleBannerDismiss,
      formatTimeAgo,
      toggleRecentlyViewed,
      handleScrollTo
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
.bg-gray-800:hover,
.bg-gray-800\/70:hover,
.bg-gray-800\/50:hover {
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  transform: translateY(-4px);
  transition: all 0.3s ease;
}

/* Clickable product tile indication */
.cursor-pointer:hover {
  position: relative;
}

.cursor-pointer:hover::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  border-radius: 0.5rem;
  box-shadow: inset 0 0 0 2px rgba(22, 163, 74, 0.4);
  pointer-events: none;
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

/* Slide animation for footer content and package comparison */
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

/* Special styles for package cards */
.bg-gray-800\/70.border-green-600\/30 {
  transition: all 0.3s ease;
}

.bg-gray-800\/70.border-green-600\/30:hover {
  border-color: rgba(22, 163, 74, 0.5); /* More visible border on hover */
  box-shadow: 0 0 15px rgba(22, 163, 74, 0.2); /* Green glow effect */
}

/* Special styles for monitoring cards */
.bg-gray-800\/70.border-purple-600\/30 {
  transition: all 0.3s ease;
}

.bg-gray-800\/70.border-purple-600\/30:hover {
  border-color: rgba(147, 51, 234, 0.5); /* More visible border on hover */
  box-shadow: 0 0 15px rgba(147, 51, 234, 0.2); /* Purple glow effect */
}

/* Package comparison table styles */
table {
  border-collapse: separate;
  border-spacing: 0;
  border-radius: 8px;
  overflow: hidden;
}

th:first-child {
  border-top-left-radius: 8px;
}

th:last-child {
  border-top-right-radius: 8px;
}

/* Smooth scrolling for FAQ section */
html {
  scroll-behavior: smooth;
}



/* Animation styles for scroll transitions */
.scroll-transition {
  transition: all 0.5s ease;
}
</style>

