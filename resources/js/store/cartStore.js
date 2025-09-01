import { reactive, computed, watchEffect } from 'vue';

// Load cart from localStorage if available
const loadCart = () => {
  try {
    const savedCart = localStorage.getItem('nm_technology_cart');
    return savedCart ? JSON.parse(savedCart) : [];
  } catch (error) {
    console.error('Error loading cart from localStorage:', error);
    return [];
  }
};

// Create a reactive cart store
const state = reactive({
  items: loadCart(),
  isOpen: false
});

// Save cart to localStorage whenever it changes
watchEffect(() => {
  try {
    localStorage.setItem('nm_technology_cart', JSON.stringify(state.items));
  } catch (error) {
    console.error('Error saving cart to localStorage:', error);
  }
});

// Cart methods
export const cartStore = {
  // State getters
  getItems: () => state.items,
  getTotal: computed(() => {
    return state.items.reduce((total, item) => {
      return total + (item.price || 0) * item.quantity;
    }, 0);
  }),
  getItemCount: computed(() => {
    return state.items.reduce((count, item) => count + item.quantity, 0);
  }),
  isCartOpen: () => state.isOpen,
  
  // State mutations
  addItem(product) {
    const existingItem = state.items.find(item => item.id === product.id);
    
    if (existingItem) {
      existingItem.quantity += 1;
    } else {
      state.items.push({
        id: product.id,
        name: product.name,
        price: product.price,
        image: product.image,
        quantity: 1
      });
    }
  },
  
  removeItem(itemId) {
    const index = state.items.findIndex(item => item.id === itemId);
    if (index !== -1) {
      state.items.splice(index, 1);
    }
  },
  
  updateQuantity(itemId, newQuantity) {
    const item = state.items.find(item => item.id === itemId);
    if (item) {
      if (newQuantity <= 0) {
        this.removeItem(itemId);
      } else {
        item.quantity = newQuantity;
      }
    }
  },
  
  clearCart() {
    state.items = [];
  },
  
  openCart() {
    state.isOpen = true;
  },
  
  closeCart() {
    state.isOpen = false;
  },
  
  toggleCart() {
    state.isOpen = !state.isOpen;
  }
};
