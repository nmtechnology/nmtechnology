// recentlyViewedService.js - Service for managing recently viewed products
import { ref, reactive, watchEffect } from 'vue';

const STORAGE_KEY = 'nm_technology_recently_viewed';
const MAX_ITEMS = 8; // Maximum number of recently viewed products to store

// Load from localStorage if available
const loadRecent = () => {
  try {
    const stored = localStorage.getItem(STORAGE_KEY);
    return stored ? JSON.parse(stored) : [];
  } catch (error) {
    console.error('Error loading recently viewed from localStorage:', error);
    return [];
  }
};

// Create reactive state
const state = reactive({
  products: loadRecent()
});

// Save to localStorage whenever it changes
watchEffect(() => {
  try {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(state.products));
  } catch (error) {
    console.error('Error saving recently viewed to localStorage:', error);
  }
});

export const recentlyViewedService = {
  // Get all recently viewed products
  getProducts() {
    return state.products;
  },
  
  // Add a product to recently viewed
  addProduct(product) {
    // First remove it if already exists to avoid duplicates
    const index = state.products.findIndex(p => p.id === product.id);
    if (index !== -1) {
      state.products.splice(index, 1);
    }
    
    // Add to the front of the array
    state.products.unshift({
      id: product.id,
      name: product.name,
      image: product.image,
      price: product.price,
      category: product.category,
      color: product.color,
      brand: product.brand,
      timestamp: new Date().toISOString()
    });
    
    // Limit the size
    if (state.products.length > MAX_ITEMS) {
      state.products.splice(MAX_ITEMS);
    }
    
    return state.products;
  },
  
  // Clear recently viewed products
  clearAll() {
    state.products = [];
  },
  
  // Check if there are any products
  hasProducts() {
    return state.products.length > 0;
  }
};
