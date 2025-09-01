// orderHistoryService.js - Service for managing order history using localStorage
import { ref, reactive } from 'vue';

const STORAGE_KEY = 'nm_technology_order_history';
const MAX_HISTORY_ITEMS = 20;

// Initialize state from localStorage if available
const loadHistory = () => {
  try {
    const stored = localStorage.getItem(STORAGE_KEY);
    return stored ? JSON.parse(stored) : [];
  } catch (error) {
    console.error('Error loading order history from localStorage:', error);
    return [];
  }
};

// Create reactive state
const state = reactive({
  orders: loadHistory()
});

export const orderHistoryService = {
  // Get all orders from history
  getOrders() {
    return state.orders;
  },
  
  // Get the most recent orders (limited by count)
  getRecentOrders(count = 5) {
    return state.orders.slice(0, count);
  },
  
  // Add a new order to history
  addOrder(order) {
    // Add timestamp if not present
    const orderWithTimestamp = {
      ...order,
      timestamp: order.timestamp || new Date().toISOString()
    };
    
    // Add to front of array
    state.orders.unshift(orderWithTimestamp);
    
    // Limit the size of history
    if (state.orders.length > MAX_HISTORY_ITEMS) {
      state.orders.splice(MAX_HISTORY_ITEMS);
    }
    
    // Save to localStorage
    this.saveToLocalStorage();
    
    return orderWithTimestamp;
  },
  
  // Clear order history
  clearHistory() {
    state.orders = [];
    this.saveToLocalStorage();
  },
  
  // Save current state to localStorage
  saveToLocalStorage() {
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(state.orders));
    } catch (error) {
      console.error('Error saving order history to localStorage:', error);
    }
  },
  
  // Check if there are any orders in history
  hasOrders() {
    return state.orders.length > 0;
  }
};
