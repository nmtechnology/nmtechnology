<template>
  <div v-if="cartStore.isCartOpen()" class="fixed inset-0 overflow-y-auto z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Background overlay -->
      <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true" @click="cartStore.closeCart()"></div>

      <!-- Modal panel -->
      <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full md:max-w-xl lg:max-w-2xl">
        <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium leading-6 text-white" id="modal-title">
              <i class="fas fa-shopping-cart mr-2"></i>Your Quote Cart
            </h3>
            <button @click="cartStore.closeCart()" class="text-gray-400 hover:text-white focus:outline-none">
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- Cart contents -->
          <div class="mt-3 text-center sm:text-left">
            <div v-if="cartStore.getItems().length === 0" class="text-gray-300 py-10 text-center">
              Your quote cart is empty.
            </div>
            <div v-else>
              <!-- Cart items list -->
              <div class="max-h-96 overflow-y-auto pr-2">
                <div v-for="item in cartStore.getItems()" :key="item.id" class="flex items-center border-b border-gray-700 py-4">
                  <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md border border-gray-700">
                    <img :src="item.image" :alt="item.name" class="h-full w-full object-cover object-center">
                  </div>
                  <div class="ml-4 flex flex-1 flex-col">
                    <div class="flex justify-between text-base font-medium text-white">
                      <h3>{{ item.name }}</h3>
                      <p class="ml-4">{{ item.price ? `$${item.price.toFixed(2)}` : 'Call for price' }}</p>
                    </div>
                    <div class="flex flex-1 items-center justify-between text-sm mt-2">
                      <!-- Quantity selector -->
                      <div class="flex items-center">
                        <button @click="decreaseQuantity(item)" class="bg-gray-700 text-white px-2 rounded-l-md">-</button>
                        <input type="number" min="1" v-model.number="item.quantity" @change="updateQuantity(item)"
                               class="bg-gray-600 text-white text-center w-12 px-1 py-1 border-0">
                        <button @click="increaseQuantity(item)" class="bg-gray-700 text-white px-2 rounded-r-md">+</button>
                      </div>
                      <!-- Remove button -->
                      <div class="flex">
                        <button @click="removeItem(item.id)" class="font-medium text-red-400 hover:text-red-300">
                          Remove
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Subtotal -->
              <div class="border-t border-gray-700 pt-4 mt-2">
                <div class="flex justify-between text-base font-medium text-white">
                  <p>Subtotal</p>
                  <p>{{ calculateSubtotalText() }}</p>
                </div>
                <p class="mt-0.5 text-sm text-gray-400">Shipping and taxes calculated at checkout.</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Order History Section -->
      <div v-if="showOrderHistory && hasOrderHistory" class="border-t border-gray-700 mt-4 pt-4">
        <OrderHistory />
      </div>
      
      <!-- Modal footer with action buttons -->
        <div class="bg-gray-900 px-4 py-3 sm:px-6">
          <div class="sm:flex sm:flex-row-reverse">
            <button v-if="cartStore.getItems().length > 0" @click="checkout" 
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
              Request Quote
            </button>
            <button @click="cartStore.closeCart()" 
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
              Continue Shopping
            </button>
            <button v-if="cartStore.getItems().length > 0" @click="cartStore.clearCart()" 
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-red-700 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-red-400 hover:text-red-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:w-auto sm:text-sm">
              Clear Quote Cart
            </button>
          </div>
          
          <div class="mt-3 text-center">
            <button @click="toggleOrderHistory" class="text-sm text-gray-400 hover:text-white">
              {{ showOrderHistory ? 'Hide Order History' : 'Show Order History' }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Checkout Form Modal -->
  <div v-if="checkoutFormOpen && !showConfirmation" class="fixed inset-0 overflow-y-auto z-50" aria-labelledby="checkout-modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Background overlay -->
      <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- Modal panel -->
      <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium leading-6 text-white" id="checkout-modal-title">
              Complete Your Quote Request
            </h3>
            <button @click="checkoutFormOpen = false" class="text-gray-400 hover:text-white focus:outline-none">
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          
          <!-- Checkout Form -->
          <form @submit.prevent="validateAndMoveToConfirmation" class="space-y-4">
            <div class="grid grid-cols-1 gap-y-4">
              <div>
                <label for="firstName" class="block text-sm font-medium text-gray-300">First Name</label>
                <input v-model="checkoutForm.firstName" type="text" name="firstName" id="firstName" required
                       :class="['mt-1 block w-full rounded-md bg-gray-700 text-white shadow-sm focus:ring-green-500 sm:text-sm', 
                               formErrors.firstName ? 'border-red-500 focus:border-red-500' : 'border-gray-600 focus:border-green-500']">
                <p v-if="formErrors.firstName" class="mt-1 text-sm text-red-400">{{ formErrors.firstName }}</p>
              </div>
              <div>
                <label for="lastName" class="block text-sm font-medium text-gray-300">Last Name</label>
                <input v-model="checkoutForm.lastName" type="text" name="lastName" id="lastName" required
                       :class="['mt-1 block w-full rounded-md bg-gray-700 text-white shadow-sm focus:ring-green-500 sm:text-sm', 
                               formErrors.lastName ? 'border-red-500 focus:border-red-500' : 'border-gray-600 focus:border-green-500']">
                <p v-if="formErrors.lastName" class="mt-1 text-sm text-red-400">{{ formErrors.lastName }}</p>
              </div>
              <div>
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input v-model="checkoutForm.email" type="email" name="email" id="email" required
                       :class="['mt-1 block w-full rounded-md bg-gray-700 text-white shadow-sm focus:ring-green-500 sm:text-sm', 
                               formErrors.email ? 'border-red-500 focus:border-red-500' : 'border-gray-600 focus:border-green-500']">
                <p v-if="formErrors.email" class="mt-1 text-sm text-red-400">{{ formErrors.email }}</p>
              </div>
              <div>
                <label for="phone" class="block text-sm font-medium text-gray-300">Phone</label>
                <input v-model="checkoutForm.phone" type="tel" name="phone" id="phone" required
                       :class="['mt-1 block w-full rounded-md bg-gray-700 text-white shadow-sm focus:ring-green-500 sm:text-sm', 
                               formErrors.phone ? 'border-red-500 focus:border-red-500' : 'border-gray-600 focus:border-green-500']">
                <p v-if="formErrors.phone" class="mt-1 text-sm text-red-400">{{ formErrors.phone }}</p>
              </div>
              <div>
                <label for="comments" class="block text-sm font-medium text-gray-300">Additional Comments</label>
                <textarea v-model="checkoutForm.comments" name="comments" id="comments" rows="3"
                          class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"></textarea>
              </div>
            </div>

            <div class="bg-gray-900 px-4 py-3 text-right sm:px-6 sm:rounded-b-lg">
              <button type="submit" 
                      class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">
                Review Quote
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Order Confirmation Modal -->
  <div v-if="checkoutFormOpen && showConfirmation" class="fixed inset-0 overflow-y-auto z-50" aria-labelledby="confirmation-modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Background overlay -->
      <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- Modal panel -->
      <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium leading-6 text-white" id="confirmation-modal-title">
              Review Your Quote Request
            </h3>
            <button @click="checkoutFormOpen = false" class="text-gray-400 hover:text-white focus:outline-none">
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          
          <OrderConfirmation 
            :is-visible="showConfirmation" 
            :item-count="cartStore.getItemCount.value" 
            :subtotal-text="calculateSubtotalText()" 
            :customer-name="`${checkoutForm.firstName} ${checkoutForm.lastName}`"
            :customer-email="checkoutForm.email"
            @back="showConfirmation = false"
            @confirm="submitOrder"
          />
        </div>
      </div>
    </div>
  </div>
  
  <!-- Success Message Modal -->
  <div v-if="orderSubmitted" class="fixed inset-0 overflow-y-auto z-50" aria-labelledby="success-modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Background overlay -->
      <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- Modal panel -->
      <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full">
        <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
              <!-- Success icon -->
              <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-white" id="success-modal-title">
                Quote Request Submitted Successfully
              </h3>
              <div class="mt-4">
                <div class="bg-green-900/20 border border-green-600/30 rounded-lg p-4 mb-4">
                  <div class="flex items-center">
                    <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-green-400 font-medium">Quote Request Successfully Submitted!</p>
                  </div>
                </div>
                
                <div class="text-sm text-gray-300 space-y-3">
                  <p>Thank you for submitting your quote request! Here's what happens next:</p>
                  
                  <ul class="list-disc list-inside space-y-2 ml-2">
                    <li>Our team will review your request within 1 business day</li>
                    <li>We'll prepare a detailed quote based on your specific requirements</li>
                    <li>A security specialist will contact you at {checkoutForm.email} to discuss your needs</li>
                    <li>We'll answer any questions and can adjust the quote as needed</li>
                  </ul>
                  
                  <p class="mt-4 text-sm text-gray-400">
                    If you need immediate assistance, please don't hesitate to call us directly.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" @click="closeSuccessModal"
                  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
            Got it, thanks!
          </button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Error Message Modal -->
  <div v-if="orderError" class="fixed inset-0 overflow-y-auto z-50" aria-labelledby="error-modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Background overlay -->
      <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- Modal panel -->
      <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full">
        <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
              <!-- Error icon -->
              <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-white" id="error-modal-title">
                Error Submitting Order
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-300">
                  There was an error submitting your order. Please try again or contact us directly.
                </p>
                <p class="text-sm text-gray-400 mt-2">
                  Error details: {{ errorMessage }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" @click="orderError = false"
                  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed } from 'vue';
import { cartStore } from '../store/cartStore.js';
import { toastService } from '../services/toastService.js';
import { orderHistoryService } from '../services/orderHistoryService.js';
import OrderConfirmation from './OrderConfirmation.vue';
import axios from 'axios';

export default {
  name: 'CartModal',
  components: {
    OrderHistory: () => import('./OrderHistory.vue'),
    OrderConfirmation
  },
  setup() {
    const checkoutFormOpen = ref(false);
    const orderSubmitted = ref(false);
    const orderError = ref(false);
    const errorMessage = ref('');
    const isSubmitting = ref(false);
    const showOrderHistory = ref(false);
    const showConfirmation = ref(false);
    
    // Check if there are any orders in history
    const hasOrderHistory = computed(() => orderHistoryService.hasOrders());
    
    // Toggle order history visibility
    const toggleOrderHistory = () => {
      showOrderHistory.value = !showOrderHistory.value;
    };
    
    const checkoutForm = ref({
      firstName: '',
      lastName: '',
      email: '',
      phone: '',
      comments: ''
    });
    
    const formErrors = ref({
      firstName: '',
      lastName: '',
      email: '',
      phone: ''
    });
    
    // Methods for cart item management
    const decreaseQuantity = (item) => {
      if (item.quantity > 1) {
        cartStore.updateQuantity(item.id, item.quantity - 1);
      } else {
        cartStore.removeItem(item.id);
      }
    };
    
    const increaseQuantity = (item) => {
      cartStore.updateQuantity(item.id, item.quantity + 1);
    };
    
    const updateQuantity = (item) => {
      if (isNaN(item.quantity) || item.quantity < 1) {
        item.quantity = 1;
      }
      cartStore.updateQuantity(item.id, item.quantity);
    };
    
    const removeItem = (itemId) => {
      cartStore.removeItem(itemId);
    };
    
    const calculateSubtotalText = () => {
      const hasItemsWithoutPrice = cartStore.getItems().some(item => !item.price);
      if (hasItemsWithoutPrice) {
        return 'Contact for pricing';
      } else {
        return `$${cartStore.getTotal.value.toFixed(2)}`;
      }
    };
    
    // Checkout process
    const checkout = () => {
      checkoutFormOpen.value = true;
      // Clear form errors when opening the form
      formErrors.value = {
        firstName: '',
        lastName: '',
        email: '',
        phone: ''
      };
    };
    
    const validateAndMoveToConfirmation = () => {
      // Reset form errors
      formErrors.value = {
        firstName: '',
        lastName: '',
        email: '',
        phone: ''
      };
      
      // Validate form
      let isValid = true;
      
      if (!checkoutForm.value.firstName.trim()) {
        formErrors.value.firstName = 'First name is required';
        isValid = false;
      }
      
      if (!checkoutForm.value.lastName.trim()) {
        formErrors.value.lastName = 'Last name is required';
        isValid = false;
      }
      
      if (!checkoutForm.value.email.trim()) {
        formErrors.value.email = 'Email is required';
        isValid = false;
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(checkoutForm.value.email)) {
        formErrors.value.email = 'Please enter a valid email address';
        isValid = false;
      }
      
      if (!checkoutForm.value.phone.trim()) {
        formErrors.value.phone = 'Phone number is required';
        isValid = false;
      }
      
      if (isValid) {
        showConfirmation.value = true;
      } else {
        // Show error toast
        toastService.error('Please correct the errors in the form');
      }
    };
    
    const submitOrder = async () => {
      try {
        isSubmitting.value = true;
        
        // Prepare order data
        const orderData = {
          customer: {
            firstName: checkoutForm.value.firstName,
            lastName: checkoutForm.value.lastName,
            email: checkoutForm.value.email,
            phone: checkoutForm.value.phone,
          },
          comments: checkoutForm.value.comments,
          items: cartStore.getItems(),
          total: calculateSubtotalText(),
        };
        
        // Send order via API
        const response = await axios.post('/api/orders/submit', orderData);
        
        // Add to order history
        orderHistoryService.addOrder({
          id: `order-${Date.now()}`,
          timestamp: new Date().toISOString(),
          customer: orderData.customer,
          items: orderData.items,
          total: orderData.total,
          status: 'submitted'
        });
        
        // Reset and show success
        checkoutFormOpen.value = false;
        orderSubmitted.value = true;
        cartStore.clearCart();
        
        // Show success toast notification
        toastService.success('Your order has been submitted successfully!');
        
        console.log('Order submitted successfully:', response.data);
      } catch (error) {
        console.error('Error submitting order:', error);
        errorMessage.value = error.response?.data?.message || error.message || 'Unknown error';
        orderError.value = true;
        
        // Show error toast notification
        toastService.error('Error submitting order. Please try again.');
      } finally {
        isSubmitting.value = false;
      }
    };
    
    const closeSuccessModal = () => {
      orderSubmitted.value = false;
      cartStore.closeCart();
      toastService.success('Quote request submitted successfully! We\'ll be in touch soon.');
    };

    return {
      cartStore,
      checkoutFormOpen,
      checkoutForm,
      orderSubmitted,
      orderError,
      errorMessage,
      isSubmitting,
      formErrors,
      showOrderHistory,
      hasOrderHistory,
      decreaseQuantity,
      increaseQuantity,
      updateQuantity,
      removeItem,
      calculateSubtotalText,
      checkout,
      validateAndMoveToConfirmation,
      submitOrder,
      closeSuccessModal,
      toggleOrderHistory,
      showConfirmation
    };
  }
};
</script>

<style scoped>
/* Custom scrollbar for the cart items list */
.overflow-y-auto::-webkit-scrollbar {
  width: 6px;
}

.overflow-y-auto::-webkit-scrollbar-track {
  background: #374151;
  border-radius: 8px;
}

.overflow-y-auto::-webkit-scrollbar-thumb {
  background-color: #4B5563;
  border-radius: 8px;
}

.overflow-y-auto::-webkit-scrollbar-thumb:hover {
  background-color: #6B7280;
}

/* Remove arrows from number input */
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] {
  -moz-appearance: textfield;
  appearance: textfield;
}

/* Item animation */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translate3d(0, 20px, 0);
  }
  to {
    opacity: 1;
    transform: translate3d(0, 0, 0);
  }
}

.flex.items-center.border-b {
  animation: fadeInUp 0.3s ease-out;
}

/* Responsive improvements for mobile */
@media (max-width: 640px) {
  /* Increase touch targets for mobile */
  button {
    min-height: 42px;
    padding: 8px 16px;
  }
  
  /* Improve form fields for touch */
  input, textarea, select {
    font-size: 16px !important;  /* Prevent iOS zoom on focus */
    padding: 10px !important;
  }
  
  /* Better spacing for mobile form */
  .space-y-4 {
    margin-bottom: 24px;
  }
  
  /* Make quantity controls easier to tap */
  .flex.items-center button {
    min-width: 36px;
  }
  
  /* Adjust product image size for mobile */
  .h-16.w-16 {
    height: 64px;
    width: 64px;
  }
  
  /* Improve cart item layout on small screens */
  .flex.items-center.border-b {
    padding: 12px 0;
    flex-wrap: wrap;
  }
  
  .flex.items-center.border-b .flex.flex-1.flex-col {
    margin-left: 12px;
    flex: 1;
    min-width: 0;
  }
}

/* Add animation for the cart badge */
@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.2);
  }
  100% {
    transform: scale(1);
  }
}

.cart-badge-pulse {
  animation: pulse 1s ease-in-out;
}

/* NM Technology Theme Enhancements for Quote Cart */
.bg-gray-800 {
  background-color: #111827 !important;
}
.bg-gray-900 {
  background-color: #0a0f1c !important;
}
.text-white {
  color: #f3f4f6 !important;
}
.text-gray-300 {
  color: #d1d5db !important;
}
.text-gray-400 {
  color: #9ca3af !important;
}
.text-gray-700 {
  color: #374151 !important;
}
.border-gray-700 {
  border-color: #374151 !important;
}
.border-gray-600 {
  border-color: #4b5563 !important;
}
.bg-blue-500 {
  background-color: #2563eb !important;
}
.bg-blue-600 {
  background-color: #1d4ed8 !important;
}
.bg-green-600 {
  background-color: #22c55e !important;
}
.bg-green-700 {
  background-color: #15803d !important;
}
.text-green-400 {
  color: #4ade80 !important;
}
.text-green-500 {
  color: #22c55e !important;
}
.border-green-600 {
  border-color: #22c55e !important;
}
.shadow-xl {
  box-shadow: 0 8px 32px rgba(37,99,235,0.12), 0 1.5px 4px rgba(22,163,74,0.08);
}
/* Button hover and focus states for brand feel */
button.bg-blue-500:hover, button.bg-blue-500:focus {
  background-color: #1e40af !important;
}
button.bg-green-600:hover, button.bg-green-600:focus {
  background-color: #16a34a !important;
}
button.bg-gray-700:hover, button.bg-gray-700:focus {
  background-color: #374151 !important;
}
button.bg-red-600:hover, button.bg-red-600:focus {
  background-color: #991b1b !important;
}
/* Card and modal border radius for modern look */
.rounded-lg {
  border-radius: 14px !important;
}
/* Subtle glass effect for modal panels */
.inline-block.align-bottom.bg-gray-800 {
  background: linear-gradient(135deg, #111827 80%, #2563eb 100%);
  box-shadow: 0 8px 32px rgba(37,99,235,0.12), 0 1.5px 4px rgba(22,163,74,0.08);
  border: 1px solid #374151;
}
</style>