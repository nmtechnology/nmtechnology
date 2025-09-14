<template>
  <div v-if="hasProducts" class="bg-gray-900 p-6 md:p-16 border-t border-gray-700">
    <h2 class="text-2xl font-bold text-white mb-6">Recently Viewed Products</h2>
    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <div v-for="product in recentProducts" :key="product.id" 
           :class="[
             'rounded-lg overflow-hidden cursor-pointer transition-all duration-300 backdrop-blur-sm hover:transform hover:scale-[1.02]',
             product.category === 'package' ? 'bg-gray-800/70 border border-green-600/30 hover:shadow-lg hover:shadow-green-500/20 hover:border-green-500/50' : 
             product.category === 'monitoring' ? 'bg-gray-800/70 border border-purple-600/30 hover:shadow-lg hover:shadow-purple-500/20 hover:border-purple-500/50' :
             (product.category === 'security' && product.color === 'blue') ? 'bg-gray-800/70 border border-blue-600/30 hover:shadow-lg hover:shadow-blue-500/20 hover:border-blue-500/50' :
             (product.brand === 'NM Solar' && product.color === 'yellow') ? 'bg-gray-800/70 border border-yellow-600/30 hover:shadow-lg hover:shadow-yellow-500/20 hover:border-yellow-500/50' : 
             'bg-gray-800/50 border border-blue-600/30 hover:shadow-lg hover:shadow-blue-500/20 hover:border-blue-500/50'
           ]"
           @click="viewProductDetails(product)">
        <img :src="product.image" :alt="product.name" class="w-full h-32 object-scale-down p-2 bg-gray-900/50">
        <div class="p-3">
          <h3 :class="[
            'text-sm font-medium truncate mb-1',
            product.category === 'package' ? 'text-green-400' : 
            product.category === 'monitoring' ? 'text-purple-400' : 
            (product.category === 'security' && product.color === 'blue') ? 'text-blue-400' :
            (product.brand === 'NM Solar' && product.color === 'yellow') ? 'text-yellow-400' :
            'text-blue-400'
          ]">{{ product.name }}</h3>
          <div :class="[
            'text-[10px] px-1.5 py-0.5 rounded-full inline-block',
            product.category === 'package' ? 'bg-green-500/20 text-green-300' : 
            product.category === 'monitoring' ? 'bg-purple-500/20 text-purple-300' : 
            (product.category === 'security' && product.color === 'blue') ? 'bg-blue-500/20 text-blue-300' :
            (product.brand === 'NM Solar' && product.color === 'yellow') ? 'bg-yellow-500/20 text-yellow-300' :
            'bg-blue-500/20 text-blue-300'
          ]">{{ categoryName(product.category) }}</div>
          <p class="text-xs text-gray-400 mt-2">{{ formatTimeAgo(product.timestamp) }}</p>
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

    const categoryName = (category) => {
      const categories = {
        'camera': 'Security Camera',
        'recorder': 'Recorder & NVR',
        'accessory': 'Accessory',
        'network': 'Networking',
        'package': 'Security Package',
        'monitoring': 'Security Monitoring',
        'security': 'Home Security'
      };
      return categories[category] || category;
    };
    
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
      viewProductDetails,
      categoryName
    };
  }
};
</script>
