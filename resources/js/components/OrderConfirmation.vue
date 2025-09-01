<template>
  <div v-if="isVisible" class="text-white">
    <div class="mb-6 px-4 py-3 bg-green-600 bg-opacity-20 border border-green-600 rounded-md">
      <div class="flex items-start">
        <!-- Success icon -->
        <svg class="w-5 h-5 text-green-500 mt-0.5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div>
          <h3 class="font-medium text-green-400">Order Confirmation</h3>
          <p class="text-sm text-gray-300 mt-1">
            Please review your order summary below before proceeding.
          </p>
        </div>
      </div>
    </div>

    <div class="mb-6">
      <h4 class="text-lg font-medium mb-3">Order Summary</h4>
      
      <div class="bg-gray-700 rounded-md p-4 mb-4">
        <div class="flex justify-between mb-2">
          <span class="text-gray-300">Items:</span>
          <span class="font-medium">{{ itemCount }} {{ itemCount === 1 ? 'product' : 'products' }}</span>
        </div>
        <div class="flex justify-between mb-2">
          <span class="text-gray-300">Subtotal:</span>
          <span class="font-medium">{{ subtotalText }}</span>
        </div>
        <div class="flex justify-between mb-2">
          <span class="text-gray-300">Customer:</span>
          <span class="font-medium">{{ customerName }}</span>
        </div>
        <div class="flex justify-between">
          <span class="text-gray-300">Contact:</span>
          <span class="font-medium">{{ customerEmail }}</span>
        </div>
      </div>
    </div>
    
    <!-- Human Verification Section -->
    <div class="mb-6">
      <h4 class="text-lg font-medium mb-3">Human Verification</h4>
      <div class="bg-gray-700 rounded-md p-4">
        <p class="text-sm text-gray-300 mb-3">To verify you're human, please solve this simple math problem:</p>
        
        <div class="flex items-center">
          <div class="text-base sm:text-lg font-medium text-white px-4 py-2 bg-gray-600 rounded-md">
            {{ mathProblem.question }} = ?
          </div>
          <div class="ml-3 relative flex-1">
            <input 
              type="number" 
              v-model="userMathAnswer" 
              class="block w-full rounded-md border-0 bg-gray-800 px-3 py-1.5 text-white shadow-sm ring-1 ring-inset ring-gray-500 focus:ring-2 focus:ring-inset focus:ring-green-500 text-sm sm:text-base sm:leading-6"
              placeholder="Your answer" 
              aria-label="Math answer"
            />
          </div>
          <button 
            type="button" 
            @click="generateMathProblem" 
            class="ml-3 inline-flex items-center rounded-md bg-gray-600 p-2 text-gray-200 hover:bg-gray-500 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600"
            title="New problem"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
        
        <div v-if="mathVerificationError" class="mt-2 text-sm text-red-500 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          {{ mathVerificationError }}
        </div>
      </div>
    </div>
    
    <div class="flex justify-between">
      <button @click="goBack" class="px-4 py-2 text-gray-300 border border-gray-600 rounded hover:bg-gray-700">
        Edit Order
      </button>
      <button @click="confirmOrder" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
        Confirm and Submit
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'OrderConfirmation',
  props: {
    isVisible: {
      type: Boolean,
      required: true
    },
    itemCount: {
      type: Number,
      required: true
    },
    subtotalText: {
      type: String,
      required: true
    },
    customerName: {
      type: String,
      required: true
    },
    customerEmail: {
      type: String,
      required: true
    }
  },
  emits: ['back', 'confirm'],
  data() {
    return {
      mathProblem: {
        question: '',
        answer: null
      },
      userMathAnswer: null,
      mathVerificationError: ''
    };
  },
  mounted() {
    // Generate a math problem when component is mounted
    this.generateMathProblem();
  },
  methods: {
    generateMathProblem() {
      // Create 3rd grade level math problems (addition and subtraction)
      const operations = ['+', '-'];
      const operation = operations[Math.floor(Math.random() * operations.length)];
      
      let num1, num2, answer;
      
      if (operation === '+') {
        // Addition: numbers between 1-20
        num1 = Math.floor(Math.random() * 20) + 1;
        num2 = Math.floor(Math.random() * 20) + 1;
        answer = num1 + num2;
      } else {
        // Subtraction: ensure positive answer (num1 > num2)
        num1 = Math.floor(Math.random() * 20) + 10; // 10-29
        num2 = Math.floor(Math.random() * num1); // 0 to num1-1
        answer = num1 - num2;
      }
      
      this.mathProblem.question = `${num1} ${operation} ${num2}`;
      this.mathProblem.answer = answer;
      this.userMathAnswer = null;
      this.mathVerificationError = '';
    },
    goBack() {
      this.$emit('back');
    },
    confirmOrder() {
      // Verify math problem answer before submission
      if (parseInt(this.userMathAnswer) !== this.mathProblem.answer) {
        this.mathVerificationError = 'Incorrect answer to the math problem. Please try again.';
        return;
      }
      
      // Proceed with order confirmation
      this.$emit('confirm');
    }
  }
};
</script>
