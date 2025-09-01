<template>
  <div v-if="hasProducts" class="bg-gray-900 p-6 md:p-16 border-t border-gray-800">
    <h2 class="text-2xl font-bold text-white mb-6">Recently Viewed Products</h2>
    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <div v-for="product in recentProducts" :key="product.id" 
           class="bg-gray-800 rounded-lg overflow-hidden cursor-pointer hover:shadow-lg transition-shadow"
           @click="viewProductDetails(product)">
        <img :src="product.image" :alt="product.name" class="w-full h-32 object-scale-down p-2">
        <div class="p-3">
          <h3 class="text-sm font-medium text-white truncate">{{ product.name }}</h3>
          <p class="text-xs text-gray-400 mt-1">{{ formatTimeAgo(product.timestamp) }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed } from 'vue';
import { recentlyViewedService } from '../services/recentlyViewedService.js';

export default {
  name: 'RecentlyViewedProducts',
  emits: ['view-product'],
  setup(props, { emit }) {
    const recentProducts = computed(() => recentlyViewedService.getProducts());
    const hasProducts = computed(() => recentlyViewedService.hasProducts());
    
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
    
    const viewProductDetails = (product) => {
      emit('view-product', product);
    };
    
    return {
      recentProducts,
      hasProducts,
      formatTimeAgo,
      viewProductDetails
    };
  }
};
</script>
