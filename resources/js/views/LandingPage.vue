<template>
  <div class="min-h-screen bg-gray-900 flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8 relative">
    <!-- Background pattern similar to the main site -->
    <svg class="absolute inset-x-0 top-0 -z-40 h-full w-full stroke-slate-600 [mask-image:radial-gradient(40rem_30rem_at_center,white,transparent)]"
        aria-hidden="true">
      <defs>
        <pattern id="verification-pattern" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
          <path d="M.5 300V.5H200" fill="none" />
        </pattern>
      </defs>
      <svg x="50%" y="-1" class="overflow-visible">
        <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
            stroke-width="0" />
      </svg>
      <rect width="100%" height="100%" stroke-width="0" fill="url(#verification-pattern)" />
    </svg>
    
    <!-- Product Collage - This shows before the verification form -->
    <div class="w-full max-w-4xl px-4 mb-8 animate-fadeIn">
      <h1 class="text-center text-3xl md:text-4xl font-bold text-white mb-4">Advanced Security & Surveillance Solutions</h1>
      
      <!-- Features List -->
      <div class="flex flex-wrap justify-center gap-x-6 gap-y-2 mb-6">
        <div class="flex items-center text-green-400 text-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
          <span>Professional Installation</span>
        </div>
        <div class="flex items-center text-green-400 text-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
          <span>24/7 Support</span>
        </div>
        <div class="flex items-center text-green-400 text-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
          <span>Custom Solutions</span>
        </div>
      </div>
      
      <!-- Product Gallery -->
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 mb-6">
        <!-- Camera Images with Hover Effects -->
        <div class="relative overflow-hidden rounded-lg group h-44 md:h-52">
          <img src="/public/images/axis-bullet-cam.webp" alt="Bullet Camera" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
            <span class="text-white font-semibold text-sm">Bullet Camera</span>
          </div>
        </div>
        
        <div class="relative overflow-hidden rounded-lg group h-44 md:h-52">
          <img src="/public/images/axis-dome.webp" alt="Dome Camera" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
            <span class="text-white font-semibold text-sm">Dome Camera</span>
          </div>
        </div>
        
        <div class="relative overflow-hidden rounded-lg group h-44 md:h-52">
          <img src="/public/images/cctv-corner.webp" alt="Corner CCTV" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
            <span class="text-white font-semibold text-sm">Corner Installation</span>
          </div>
        </div>
        
        <div class="relative overflow-hidden rounded-lg group h-44 md:h-52">
          <img src="/public/images/google-doorbellcam.webp" alt="Doorbell Camera" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
            <span class="text-white font-semibold text-sm">Doorbell Camera</span>
          </div>
        </div>
        
        <div class="relative overflow-hidden rounded-lg group h-44 md:h-52">
          <img src="/public/images/nvr-recorder.webp" alt="NVR System" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
            <span class="text-white font-semibold text-sm">NVR Recording System</span>
          </div>
        </div>
        
        <div class="relative overflow-hidden rounded-lg group h-44 md:h-52">
          <img src="/public/images/smart-access-control.webp" alt="Smart Access" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
            <span class="text-white font-semibold text-sm">Smart Access Control</span>
          </div>
        </div>
      </div>

      <!-- Brands Section -->
      <div class="flex flex-wrap justify-center gap-4 mt-2 mb-6">
        <img src="/public/images/axiscomm-logo.webp" alt="Axis Communications" class="h-8 grayscale hover:grayscale-0 transition-all">
        <img src="/public/images/honeywell-logo.webp" alt="Honeywell" class="h-8 grayscale hover:grayscale-0 transition-all">
        <img src="/public/images/DSC-logo.webp" alt="DSC" class="h-8 grayscale hover:grayscale-0 transition-all">
        <img src="/public/images/ubiquity-logo.webp" alt="Ubiquiti" class="h-8 grayscale hover:grayscale-0 transition-all">
      </div>
      
      <div class="text-center">
        <p class="text-gray-300 text-sm md:text-base font-medium mb-2">Securing homes and businesses across New Mexico</p>
        <p class="text-white text-base md:text-lg font-semibold mb-4">Complete verification below to explore our full product range</p>
        <div class="inline-block animate-bounce">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
          </svg>
        </div>
      </div>
    </div>

    <!-- Content -->
    <div class="w-full max-w-md space-y-8 bg-gray-800 p-8 rounded-lg shadow-xl relative z-10 border border-gray-700 animate-form-appear">
      <!-- Logo and Header -->
      <div class="flex flex-col items-center">
        <div class="flex items-center">
          <img class="h-16 w-auto mr-2" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo">
          <span class="italic text-lg font-extrabold text-white -ml-5">Technology</span>
        </div>
        <h2 class="mt-6 text-center text-2xl font-bold text-white">
          <span class="text-green-500">Security</span> Specialists
        </h2>
        <div class="border-b border-green-500/30 w-16 mx-auto my-3"></div>
        <p class="mt-2 text-center text-sm text-gray-300">
          Please solve the math problem to access our full product catalog
        </p>
      </div>

      <!-- Security Badge -->
      <div class="flex items-center justify-center mb-2">
        <div class="flex items-center justify-center bg-gray-700/50 rounded-full p-2 w-12 h-12">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
        </div>
      </div>

      <!-- Verification Form -->
      <form class="mt-4 space-y-6" @submit.prevent="verifyAnswer">
        <div class="space-y-4">
          <div class="bg-gray-700/50 p-4 rounded-lg">
            <label for="answer" class="block text-center text-xl font-medium text-white mb-4">
              {{ firstNumber }} {{ operator }} {{ secondNumber }} = ?
            </label>
            <div class="mt-2">
              <input
                id="answer"
                name="answer"
                type="number"
                v-model.number="userAnswer"
                required
                class="block w-full rounded-md border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 text-center text-xl"
                placeholder="Enter your answer"
                autofocus
              />
            </div>
          </div>
          
          <!-- Error Message -->
          <div v-if="errorMessage" class="text-center text-red-500 text-sm p-2 bg-red-500/10 rounded-md border border-red-500/20">
            {{ errorMessage }}
          </div>

          <!-- Submit Button -->
          <div>
            <button
              type="submit"
              class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors relative overflow-hidden group"
              @click="verifyAnswer"
            >
              <span class="relative z-10">Verify & Continue</span>
              <span class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-green-500 to-green-700 opacity-0 group-hover:opacity-100 transition-opacity"></span>
            </button>
          </div>
        </div>
      </form>

      <!-- Footer Text -->
      <div class="text-center text-xs text-gray-400 bg-gray-700/30 py-2 px-4 rounded-md">
        <p>This verification helps us protect our website and customers from automated traffic.</p>
      </div>
    </div>

    <!-- Footer -->
    <div class="mt-8 text-center">
      <div class="flex items-center justify-center gap-4 mb-3">
        <img src="/public/images/zia-symbol.webp" alt="New Mexico Zia Symbol" class="h-6 w-6 opacity-50" />
        <p class="text-sm text-gray-400">&copy; {{ new Date().getFullYear() }} NM Technology. All rights reserved.</p>
        <img src="/public/images/usa-flag.webp" alt="USA Flag" class="h-6 opacity-50" />
      </div>
      <div class="text-xs text-gray-500">Serving all of New Mexico with professional security solutions</div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { toastService } from '../services/toastService.js';

const router = useRouter();
const firstNumber = ref(0);
const secondNumber = ref(0);
const operatorType = ref('');
const userAnswer = ref(null);
const errorMessage = ref('');
const maxAttempts = ref(3);
const attempts = ref(0);

// Generate the operator symbol (+, -, *)
const operator = computed(() => {
  switch (operatorType.value) {
    case 'add': return '+';
    case 'subtract': return '-';
    case 'multiply': return '×';
    default: return '+';
  }
});

// Calculate the correct answer
const correctAnswer = computed(() => {
  switch (operatorType.value) {
    case 'add': return firstNumber.value + secondNumber.value;
    case 'subtract': return firstNumber.value - secondNumber.value;
    case 'multiply': return firstNumber.value * secondNumber.value;
    default: return 0;
  }
});

// Generate a new math problem
const generateMathProblem = () => {
  // Reset fields
  userAnswer.value = null;
  errorMessage.value = '';
  
  // Choose a random operation (add, subtract, or multiply)
  const operations = ['add', 'subtract', 'multiply'];
  operatorType.value = operations[Math.floor(Math.random() * operations.length)];
  
  // Generate appropriate numbers based on the operation
  if (operatorType.value === 'add') {
    // Addition: numbers between 1 and 20
    firstNumber.value = Math.floor(Math.random() * 20) + 1;
    secondNumber.value = Math.floor(Math.random() * 20) + 1;
  } else if (operatorType.value === 'subtract') {
    // Subtraction: ensure first number is larger (no negative results)
    firstNumber.value = Math.floor(Math.random() * 15) + 6;  // 6 to 20
    secondNumber.value = Math.floor(Math.random() * firstNumber.value) + 1;  // 1 to firstNumber
  } else {
    // Multiplication: smaller numbers to keep it simple
    firstNumber.value = Math.floor(Math.random() * 9) + 1;  // 1 to 9
    secondNumber.value = Math.floor(Math.random() * 9) + 1;  // 1 to 9
  }
};

// Verify the user's answer
const verifyAnswer = () => {
  // Ensure we're comparing numbers, not strings
  const userAnswerNum = Number(userAnswer.value);
  const correctAnswerNum = Number(correctAnswer.value);
  
  console.log('Verifying answer:', userAnswerNum, 'Correct answer:', correctAnswerNum);
  
  if (userAnswerNum === correctAnswerNum) {
    // Correct answer - store verification in local storage and show success message before redirect
    console.log('Correct answer! Redirecting to /home');
    localStorage.setItem('humanVerified', 'true');
    localStorage.setItem('humanVerifiedTimestamp', Date.now().toString());
    
    // Show success confirmation message
    toastService.success('Verification successful! Welcome to NM Technology.');
    
    // Short delay before redirect to allow user to see the confirmation message
    setTimeout(() => {
      router.push('/home');
    }, 1500);
  } else {
    attempts.value += 1;
    if (attempts.value >= maxAttempts.value) {
      errorMessage.value = "Too many incorrect attempts. Let's try a new problem.";
      attempts.value = 0;
      generateMathProblem();
    } else {
      errorMessage.value = `Incorrect answer. You have ${maxAttempts.value - attempts.value} attempts remaining.`;
      userAnswer.value = null;
    }
  }
};

// Generate a math problem when the component mounts
onMounted(() => {
  // Check if already verified recently (within 24 hours)
  const verifiedTimestamp = localStorage.getItem('humanVerifiedTimestamp');
  if (verifiedTimestamp) {
    const elapsed = Date.now() - parseInt(verifiedTimestamp);
    const dayInMs = 24 * 60 * 60 * 1000;
    
    if (elapsed < dayInMs) {
      // Already verified within the last 24 hours, redirect to homepage
      router.push('/home');
      return;
    }
  }
  
  generateMathProblem();
});
</script>

<style scoped>
.animate-fadeIn {
  animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Image hover effects */
.group:hover img {
  filter: brightness(1.1);
}

/* Animated background glow effect */
.bg-gray-800 {
  position: relative;
  overflow: hidden;
}

.bg-gray-800::after {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle, rgba(52, 211, 153, 0.1) 0%, rgba(255,255,255,0) 60%);
  animation: rotate 30s linear infinite;
  z-index: -1;
}

@keyframes rotate {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

/* Form appearance animation */
.animate-form-appear {
  animation: formAppear 0.8s ease-out;
}

@keyframes formAppear {
  0% {
    opacity: 0;
    transform: translateY(30px);
    box-shadow: 0 0 0 rgba(16, 185, 129, 0);
  }
  70% {
    opacity: 1;
    transform: translateY(-10px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
    box-shadow: 0 0 20px rgba(16, 185, 129, 0.3);
  }
}
</style>
