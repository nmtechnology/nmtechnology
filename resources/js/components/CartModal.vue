<template>
  <div v-if="cartStore.isCartOpen()" class="fixed inset-0 overflow-y-auto z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Background overlay with backdrop blur -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" aria-hidden="true" @click="cartStore.closeCart()"></div>

    <!-- Centered modal container -->
    <div class="flex items-center justify-center min-h-screen p-4">
      <!-- Modal panel with modern design -->
      <div class="relative w-full max-w-md sm:max-w-lg lg:max-w-xl bg-gray-900 rounded-xl shadow-2xl transform transition-all border border-gray-700/50">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 px-6 py-4 border-b border-gray-700/50 rounded-t-xl">
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
              <div class="p-2 bg-green-600/20 rounded-lg">
                <svg class="w-5 h-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </div>
              <div>
                <h3 class="text-lg font-semibold text-white" id="modal-title">Quote Cart</h3>
                <p class="text-sm text-gray-400">{{ cartStore.getItems().length }} {{ cartStore.getItems().length === 1 ? 'item' : 'items' }}</p>
              </div>
            </div>
            <button 
              @click="cartStore.closeCart()" 
              class="p-2 text-gray-400 hover:text-white hover:bg-gray-700/50 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-green-500/50"
            >
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Cart Contents -->
        <div class="px-6 py-4 max-h-96 overflow-y-auto">
          <!-- Empty State -->
          <div v-if="cartStore.getItems().length === 0" class="text-center py-12">
            <div class="mx-auto w-16 h-16 bg-gray-700/30 rounded-full flex items-center justify-center mb-4">
              <svg class="w-8 h-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <p class="text-gray-400 text-sm">Your quote cart is empty</p>
            <p class="text-gray-500 text-xs mt-1">Add products to get started</p>
          </div>

          <!-- Cart Items -->
          <div v-else class="space-y-3">
            <div v-for="item in cartStore.getItems()" :key="item.id" class="group relative bg-gray-800/50 hover:bg-gray-800/70 rounded-lg p-3 border border-gray-700/50 transition-all duration-200">
              <!-- Product Info -->
              <div class="flex items-start space-x-3">
                <div class="flex-shrink-0">
                  <div class="w-14 h-14 bg-gray-700 rounded-lg overflow-hidden border border-gray-600/50">
                    <img :src="item.image" :alt="item.name" class="w-full h-full object-cover">
                  </div>
                </div>
                
                <div class="flex-1 min-w-0">
                  <h4 class="text-white font-medium text-sm leading-tight mb-1">{{ item.name }}</h4>
                  <p class="text-green-400 font-semibold text-sm">{{ item.price ? `$${item.price.toFixed(2)}` : 'Call for price' }}</p>
                  
                  <!-- Quantity Controls -->
                  <div class="flex items-center justify-between mt-3">
                    <div class="flex items-center bg-gray-700/50 rounded-lg border border-gray-600/50">
                      <button 
                        @click="decreaseQuantity(item)" 
                        class="p-2 text-gray-300 hover:text-white hover:bg-gray-600/50 rounded-l-lg transition-colors"
                      >
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                      </button>
                      <input 
                        type="number" 
                        min="1" 
                        v-model.number="item.quantity" 
                        @change="updateQuantity(item)"
                        class="w-12 px-2 py-2 bg-transparent text-center text-white text-sm border-0 focus:outline-none"
                      />
                      <button 
                        @click="increaseQuantity(item)" 
                        class="p-2 text-gray-300 hover:text-white hover:bg-gray-600/50 rounded-r-lg transition-colors"
                      >
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                      </button>
                    </div>
                    
                    <!-- Remove Button -->
                    <button 
                      @click="removeItem(item.id)" 
                      class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors"
                    >
                      Remove
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Subtotal Section -->
        <div v-if="cartStore.getItems().length > 0" class="px-6 py-4 border-t border-gray-700/50 bg-gray-800/30">
          <div class="flex justify-between items-center mb-2">
            <span class="text-gray-300 font-medium">Subtotal</span>
            <span class="text-white font-bold text-lg">{{ calculateSubtotalText() }}</span>
          </div>
          <p class="text-gray-500 text-xs">Final pricing determined after consultation</p>
        </div>

        <!-- Order History Section -->
        <div v-if="showOrderHistory && hasOrderHistory" class="border-t border-gray-700/50">
          <OrderHistory />
        </div>

        <!-- Footer Actions -->
        <div class="bg-gray-800/50 px-6 py-4 border-t border-gray-700/50 rounded-b-xl">
          <!-- Primary Actions -->
          <div class="space-y-3">
            <button 
              v-if="cartStore.getItems().length > 0" 
              @click="checkout" 
              class="w-full bg-green-600 hover:bg-green-500 text-white font-semibold py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-green-500/50"
            >
              Request Quote
            </button>
            
            <!-- Secondary Actions -->
            <div class="flex space-x-3">
              <button 
                @click="cartStore.closeCart()" 
                class="flex-1 bg-gray-700 hover:bg-gray-600 text-gray-200 font-medium py-2 px-3 rounded-lg transition-colors text-sm"
              >
                Continue Shopping
              </button>
              
              <button 
                v-if="cartStore.getItems().length > 0" 
                @click="cartStore.clearCart()" 
                class="flex-1 bg-red-600/20 hover:bg-red-600/30 text-red-400 border border-red-600/50 font-medium py-2 px-3 rounded-lg transition-colors text-sm"
              >
                Clear Cart
              </button>
            </div>
          </div>
          
          <!-- Order History Toggle -->
          <div class="mt-4 text-center">
            <button @click="toggleOrderHistory" class="text-sm text-gray-400 hover:text-gray-300 transition-colors">
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

/* Quantity controls and item card styling to match site theme */
.cart-item-card {
  background: rgba(17,24,39,0.45); /* subtle translucent layering */
}

.qty-btn {
  background: #1f2937; /* gray-800 */
  color: #fff;
  padding: 6px 10px;
  border: 1px solid rgba(156,163,175,0.08);
  cursor: pointer;
  transition: background-color 0.15s ease;
}

.qty-btn:hover { background: #374151; }

.qty-input {
  width: 48px;
  padding: 6px 8px;
  background: #111827;
  color: #fff;
  border-top: 1px solid rgba(156,163,175,0.06);
  border-bottom: 1px solid rgba(156,163,175,0.06);
  outline: none;
}

/* Outlined / transparent button utility consistent with theme */
.button-outlined {
  background: transparent;
  border: 1px solid rgba(156,163,175,0.08);
  color: #d1fae5;
}

/* Ensure images and truncated names behave nicely */
.cart-item-card img { object-fit: cover; }
.cart-item-card h3 { max-width: 38ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

/* small responsive tweaks */
@media (max-width: 640px) {
  .qty-input { width: 56px; }
  .cart-item-card { flex-direction: row; }
}

/* NM Technology Theme Enhancements for Quote Cart */
.bg-gray-800 { background-color: #111827 !important; }
.bg-gray-900 { background-color: #0b1220 !important; }
.text-white { color: #f3f4f6 !important; }
.text-gray-300 { color: #d1d5db !important; }
.text-gray-400 { color: #9ca3af !important; }
.border-gray-700 { border-color: #374151 !important; }
</style>