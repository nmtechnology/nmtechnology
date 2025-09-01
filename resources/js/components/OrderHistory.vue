<template>
  <div class="mt-4">
    <h3 class="text-lg font-medium text-white mb-2">Recent Orders</h3>
    
    <div v-if="!hasOrders" class="text-gray-400 italic">
      No recent orders
    </div>
    
    <div v-else>
      <div v-for="order in recentOrders" :key="order.id" class="bg-gray-700 rounded-lg p-3 mb-3">
        <div class="flex justify-between items-center mb-2">
          <div>
            <span class="text-green-400">{{ formatDate(order.timestamp) }}</span>
          </div>
          <div class="text-sm text-white bg-blue-500 py-1 px-2 rounded-full">
            {{ order.status }}
          </div>
        </div>
        
        <div class="text-sm text-gray-300">
          <div><span class="font-medium">Items:</span> {{ formatItems(order.items) }}</div>
          <div><span class="font-medium">Total:</span> {{ order.total }}</div>
        </div>
      </div>
      
      <button 
        @click="clearHistory" 
        class="text-sm text-red-400 hover:text-red-300 mt-2 flex items-center"
      >
        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        Clear History
      </button>
    </div>
  </div>
</template>

<script>
import { computed } from 'vue';
import { orderHistoryService } from '../services/orderHistoryService.js';
import { toastService } from '../services/toastService.js';

export default {
  name: 'OrderHistory',
  setup() {
    // Get recent orders from service
    const recentOrders = computed(() => orderHistoryService.getRecentOrders(5));
    const hasOrders = computed(() => orderHistoryService.hasOrders());
    
    const formatDate = (timestamp) => {
      try {
        const date = new Date(timestamp);
        return date.toLocaleDateString('en-US', {
          month: 'short',
          day: 'numeric',
          year: 'numeric',
          hour: '2-digit',
          minute: '2-digit'
        });
      } catch (e) {
        return 'Unknown date';
      }
    };
    
    const formatItems = (items) => {
      return items.map(item => `${item.name} (${item.quantity})`).join(', ');
    };
    
    const clearHistory = () => {
      orderHistoryService.clearHistory();
      toastService.info('Order history cleared');
    };
    
    return {
      recentOrders,
      hasOrders,
      formatDate,
      formatItems,
      clearHistory
    };
  }
};
</script>
