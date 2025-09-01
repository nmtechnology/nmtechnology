<!-- eslint-disable no-mixed-spaces-and-tabs -->
<!-- eslint-disable no-tabs -->
<template>
    <div class="root">
        <button class="text-white text-center text-lg" id="button" @click="isOpen = true">Contact Us</button>
        <teleport to="body">
            <div class="modal" v-if="isOpen">
                <!-- TAILWIND FORM START -->
                <div class="isolate bg-blue-950 modal-content">
                  <div class="modal-header">
                    <button class="text-white close-button" @click="isOpen = false">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                      </svg>
                    </button>
                  </div>
      <div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2 shadow-xl rounded-md">
        <div class="relative px-4 sm:px-6 pb-12 sm:pb-20 pt-12 sm:pt-24 lg:static lg:px-8 lg:py-48">
          <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
            <div class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden ring-1 ring-white/5 lg:w-1/2">
              <!-- <svg class="absolute inset-0 h-full w-full stroke-gray-800 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true"> -->
                <defs>
                  <pattern id="54f88622-e7f8-4f1d-aaf9-c2f5e46dd1f2" width="200" height="200" x="100%" patternUnits="userSpaceOnUse">
                    <path d="M130 400V.5M.5 .5H200" fill="none" />
                  </pattern>
                </defs>
                <svg x="100%" y="-1" class="overflow-visible fill-gray-950/30">
                  <path d="M-470.5 0h201v201h-301Z" stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#54f88622-e7f8-4f1d-aaf9-c2f5e46dd1f2)" />
              
              <div class="absolute -left-56 top-[calc(100%-13rem)] transform-gpu blur-3xl lg:left-[max(-14rem,calc(100%-59rem))] lg:top-[calc(50%-7rem)]" aria-hidden="true">
                <div class="aspect-[1155/678] w-[30.1875rem] bg-gradient-to-br from-[#80caff] to-[#4f46e5] opacity-20" style="clip-path: polygon(74.1% 56.1%, 100% 38.6%, 97.5% 73.3%, 85.5% 100%, 80.7% 98.2%, 72.5% 67.7%, 60.2% 37.8%, 52.4% 32.2%, 47.5% 41.9%, 45.2% 65.8%, 27.5% 23.5%, 0.1% 35.4%, 17.9% 0.1%, 27.6% 23.5%, 76.1% 2.6%, 74.1% 56.1%)" />
              </div>
            </div>
            <div class="grid grid-rows-1 p-4 sm:p-8 lg:p-12">
            <img class="h-10 sm:h-12" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo"><a href="#" class="text-sm italic font-bold leading-6 text-white flex-initial">Technology</a>
            <br>
            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-green-600">Service Request Form</h2>
        
            
            <br>
            <p class="text-white text-sm sm:text-base">If you are having issues with submitting a request please reach out to our support team by email or phone, thank you!</p>
    
            <dl class="mt-6 sm:mt-10 space-y-4 text-sm sm:text-base leading-7 text-gray-300">
              <div class="flex gap-x-4">
                <dt class="flex-none">
                  <span class="sr-only">Telephone</span>
                  <PhoneIcon class="h-6 w-5 sm:h-7 sm:w-6 text-gray-400" aria-hidden="true" />
                </dt>
                <dd><a class="hover:text-white" href="tel:+1 (505) 659-5097">+1 (505) 659-5097</a></dd>
              </div>
              <div class="flex gap-x-4">
                <dt class="flex-none">
                  <span class="sr-only">Email</span>
                  <EnvelopeIcon class="h-6 w-5 sm:h-7 sm:w-6 text-gray-400" aria-hidden="true" />
                </dt>
                <dd><a class="hover:text-white" href="mailto:hello@example.com">support@nmtechnology.us</a></dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
        <div>
<!-- Contact Form -->
        <form id="contact-form" novalidate="novalidate" @submit.prevent="sendContact" method="post" class="px-4 sm:px-6 pb-16 sm:pb-24 pt-10 sm:pt-20 lg:px-8 lg:py-48">
          <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
            <div v-if="successMessage" class="mb-6 p-4 bg-green-100 text-green-700 rounded-md text-center font-semibold animate__animated animate__fadeIn">
              {{ successMessage }}
            </div>
            <div v-if="errorMessage" class="mb-6 p-4 bg-red-100 text-red-700 rounded-md text-center font-semibold animate__animated animate__fadeIn">
              {{ errorMessage }}
            </div>
            <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:gap-y-6 sm:grid-cols-2">
              <div>
                <label for="firstName" class="block text-sm font-semibold leading-6 text-white">First name</label>
                <div class="mt-2">
                  <input type="text" v-model="form.firstName" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 bg-white/5 px-3 py-1.5 sm:py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 text-sm sm:text-base sm:leading-6" />
                </div>
                <div v-if="validationErrors.firstName" class="text-xs sm:text-sm text-red-500 mt-1">{{ validationErrors.firstName[0] }}</div>
              </div>
              <div>
                <label for="lastName" class="block text-sm font-semibold leading-6 text-white">Last name</label>
                <div class="mt-2">
                  <input type="text" v-model="form.lastName" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 bg-white/5 px-3 py-1.5 sm:py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 text-sm sm:text-base sm:leading-6" />
                </div>
                <div v-if="validationErrors.lastName" class="text-xs sm:text-sm text-red-500 mt-1">{{ validationErrors.lastName[0] }}</div>
              </div>
              <div class="sm:col-span-2">
                <label for="email" class="block text-sm font-semibold leading-6 text-white">Email</label>
                <div class="mt-2">
                  <input type="email" v-model="form.email" id="email" autocomplete="email" class="block w-full rounded-md border-0 bg-white/5 px-3 py-1.5 sm:py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 text-sm sm:text-base sm:leading-6" />
                </div>
                <div v-if="validationErrors.email" class="text-xs sm:text-sm text-red-500 mt-1">{{ validationErrors.email[0] }}</div>
              </div>
              <div class="sm:col-span-2">
                <label for="phoneNumber" class="block text-sm font-semibold leading-6 text-white">Phone number</label>
                <div class="mt-2">
                  <input type="tel" v-model="form.phoneNumber" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 bg-white/5 px-3 py-1.5 sm:py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 text-sm sm:text-base sm:leading-6" />
                </div>
                <div v-if="validationErrors.phoneNumber" class="text-xs sm:text-sm text-red-500 mt-1">{{ validationErrors.phoneNumber[0] }}</div>
              </div>
              <div class="sm:col-span-2">
                <label for="message" class="block text-sm font-semibold leading-6 text-white">Message</label>
                <div class="mt-2">
                  <textarea v-model="form.message" id="message" rows="3" class="block w-full rounded-md border-0 bg-white/5 px-3 py-1.5 sm:py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 text-sm sm:text-base sm:leading-6"></textarea>
                </div>
                <div v-if="validationErrors.message" class="text-xs sm:text-sm text-red-500 mt-1">{{ validationErrors.message[0] }}</div>
              </div>
              
              <!-- Human Verification - Math Problem -->
              <div class="sm:col-span-2 mt-2 sm:mt-4">
                <label class="block text-sm font-semibold leading-6 text-white">Human Verification</label>
                <div class="mt-2 p-4 sm:p-5 bg-gray-800 rounded-md border border-gray-700">
                  <div class="flex items-center gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-sm sm:text-base text-white font-medium">Please solve this simple math problem to verify you're human:</p>
                  </div>
                  
                  <div class="flex flex-wrap items-center gap-3 bg-gray-700/50 p-3 rounded-md">
                    <span class="text-lg sm:text-xl text-white font-medium">{{ mathProblem.question }}</span>
                    <span class="text-white font-bold">=</span>
                    <div class="relative">
                      <input 
                        type="number" 
                        v-model.number="userMathAnswer" 
                        class="block w-20 rounded-md border-0 bg-white/10 px-3 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/20 focus:ring-2 focus:ring-inset focus:ring-green-500 text-base sm:leading-6" 
                        placeholder="?"
                        aria-label="Enter your answer"
                      />
                    </div>
                    <button 
                      type="button" 
                      @click="generateMathProblem" 
                      class="ml-2 inline-flex items-center text-sm text-blue-400 hover:text-blue-300 bg-gray-700/80 px-2 py-1 rounded-md"
                      aria-label="Get a new math problem"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                      </svg>
                      Try different problem
                    </button>
                  </div>
                  
                  <div v-if="mathVerificationError" class="mt-3 p-2 bg-red-500/20 border border-red-600/30 rounded text-xs sm:text-sm text-red-400">
                    <div class="flex items-start">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 mr-1 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                      </svg>
                      {{ mathVerificationError }}
                    </div>
                  </div>
                  
                  <p class="text-xs text-gray-400 mt-3">This helps us prevent spam and automated submissions.</p>
                </div>
              </div>
            </div>
            <div class="mt-6 sm:mt-8 flex justify-end">
                <button type="submit" :disabled="isSubmitting" class="rounded-md bg-lime-600 px-3 py-1.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-lime-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                  <span v-if="isSubmitting">Sending...</span>
                  <span v-else>Send message</span>
                </button>
            </div>
          </div>
        </form>
        <!--empty area for form error/success output-->
        <div>
		    <div>
			    <div id="output-area">
			    </div>
            </div>
        </div>
      </div>
    </div>
    </div>
            </div>
        </teleport>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { BuildingOffice2Icon, EnvelopeIcon, PhoneIcon } from '@heroicons/vue/24/outline'

const isOpen = ref(false)
</script>
<script>
import axios from 'axios'

export default {
  data () {
    return {
      form: {
        firstName: '',
        lastName: '',
        phoneNumber: '',
        email: '',
        message: ''
      },
      isSubmitting: false,
      successMessage: '',
      errorMessage: '',
      validationErrors: {},
      mathProblem: {
        question: '',
        answer: null
      },
      userMathAnswer: null,
      mathVerificationError: ''
    }
  },
  methods: {
    sendContact () {
      this.isSubmitting = true
      this.successMessage = ''
      this.errorMessage = ''
      this.validationErrors = {}
      this.mathVerificationError = ''

      if (this.userMathAnswer !== this.mathProblem.answer) {
        this.mathVerificationError = 'Incorrect answer to the math problem. Please try again.'
        this.isSubmitting = false
        return
      }
      
      axios.post('/api/send-contact', {
        firstName: this.form.firstName,
        lastName: this.form.lastName,
        phoneNumber: this.form.phoneNumber,
        email: this.form.email,
        message: this.form.message
      })
      .then(res => {
        console.log('Success response:', res)
        this.successMessage = "Thank you! Your message has been sent successfully to NM Technology. Our team will contact you soon."
        this.clearForm()
        // Close modal after 3 seconds of showing success message
        setTimeout(() => {
          this.isOpen = false
          this.successMessage = ''
        }, 3000)
      })
      .catch(error => {
        console.error('Contact form error:', error)
        if (error.response) {
          if (error.response.status === 422) {
            // Validation errors
            this.validationErrors = error.response.data.errors
            this.errorMessage = 'Please correct the errors in the form.'
          } else {
            // General error
            this.errorMessage = error.response.data || 'An error occurred while sending your message. Please try again.'
          }
        } else if (error.request) {
          this.errorMessage = 'No response received from the server. Please try again later.'
        } else {
          this.errorMessage = 'Network error. Please check your internet connection and try again.'
        }
      })
      .finally(() => {
        this.isSubmitting = false
      })
    },
    clearForm () {
      this.form.firstName = ''
      this.form.lastName = ''
      this.form.phoneNumber = ''
      this.form.email = ''
      this.form.message = ''
      this.userMathAnswer = null
      this.generateMathProblem()
    },
    generateMathProblem () {
      // Create 3rd grade level math problems (addition and subtraction)
      const operations = ['+', '-']
      const operation = operations[Math.floor(Math.random() * operations.length)]
      
      let num1, num2, answer
      
      if (operation === '+') {
        // Addition: numbers between 1-20
        num1 = Math.floor(Math.random() * 20) + 1
        num2 = Math.floor(Math.random() * 20) + 1
        answer = num1 + num2
      } else {
        // Subtraction: ensure positive answer (num1 > num2)
        num1 = Math.floor(Math.random() * 20) + 10 // 10-29
        num2 = Math.floor(Math.random() * num1) // 0 to num1-1
        answer = num1 - num2
      }
      
      this.mathProblem.question = `${num1} ${operation} ${num2}`
      this.mathProblem.answer = answer
      this.userMathAnswer = null
      this.mathVerificationError = ''
    }
  },
  mounted () {
    this.generateMathProblem()
  }
}
</script>

<style>
#button {
    background-color: #15a34a;
    border-radius: 13px;
    padding: 5%;
    width: 200px;
    transition: opacity 0.3s ease;
}

/* All delay classes will take 2x longer to start */
:root {
  --animate-delay: 2s;
}

.root {
    position: relative;
    text-decoration-color: white;
}

.modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(3, 13, 30, 0.85);
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    overflow-y: auto;
    z-index: 50;
    padding: 1rem;
}

.modal-content {
    margin-top: 2rem;
    margin-bottom: 2rem;
    width: 100%;
    max-width: 1200px;
    border-radius: 1.5rem;
    position: relative;
}

.modal-header {
    position: relative;
    padding-top: 1rem;
    padding-right: 1rem;
    display: flex;
    justify-content: flex-end;
}

.close-button {
    border-radius: 9999px;
    padding: 0.5rem;
    background-color: rgba(255, 255, 255, 0.1);
    transition: background-color 0.2s;
}

.close-button:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

@media (max-width: 640px) {
    #button {
        width: 150px;
        font-size: 0.9rem;
        padding: 4%;
    }
    
    .modal-content {
        margin-top: 1rem;
    }
}

@media (min-width: 768px) {
    .modal {
        align-items: center;
        padding: 2rem;
    }
    
    .modal-content {
        margin-top: 0;
    }
}
</style>
