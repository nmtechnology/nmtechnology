import { ref, reactive } from 'vue';

// Create reactive state for toast notifications
const state = reactive({
  notifications: [],
  notificationId: 0
});

export const toastService = {
  // Add a new toast notification
  show(message, options = {}) {
    const id = state.notificationId++;
    const notification = {
      id,
      message,
      type: options.type || 'success',
      duration: options.duration || 3000,
      show: true
    };
    
    state.notifications.push(notification);
    
    // Auto-remove after duration
    setTimeout(() => {
      this.hide(id);
    }, notification.duration);
    
    return id;
  },
  
  // Hide a specific notification by ID
  hide(id) {
    const index = state.notifications.findIndex(n => n.id === id);
    if (index !== -1) {
      state.notifications[index].show = false;
      
      // Remove from array after animation completes
      setTimeout(() => {
        const removeIndex = state.notifications.findIndex(n => n.id === id);
        if (removeIndex !== -1) {
          state.notifications.splice(removeIndex, 1);
        }
      }, 300); // Animation duration
    }
  },
  
  // Success notification shorthand
  success(message, options = {}) {
    return this.show(message, { ...options, type: 'success' });
  },
  
  // Info notification shorthand
  info(message, options = {}) {
    return this.show(message, { ...options, type: 'info' });
  },
  
  // Warning notification shorthand
  warning(message, options = {}) {
    return this.show(message, { ...options, type: 'warning' });
  },
  
  // Error notification shorthand
  error(message, options = {}) {
    return this.show(message, { ...options, type: 'error' });
  },
  
  // Get all current notifications
  getAll() {
    return state.notifications;
  }
};
