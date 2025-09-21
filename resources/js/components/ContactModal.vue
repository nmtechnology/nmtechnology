<!-- eslint-disable no-mixed-spaces-and-tabs -->
<!-- eslint-disable no-tabs -->
<template>
  <div class="root w-full">
    <button class="w-full sm:w-auto inline-flex items-center justify-center px-3 py-1.5 bg-green-600 border border-transparent rounded-md font-medium text-white text-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300" @click="openModalFromOptions">
      Contact Us
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
      </svg>
    </button>
    <teleport to="body">
      <div class="modal" v-if="isOpen" @click.self="closeModal">
        <!-- TAILWIND FORM START -->
        <div class="isolate bg-gray-900 modal-content">
          <div class="modal-header">
            <button class="text-white close-button" @click="closeModal">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                  d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                  clip-rule="evenodd" />
              </svg>
            </button>
          </div>
          <div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2 shadow-xl rounded-md">
            <div class="relative px-4 sm:px-6 pb-12 sm:pb-20 pt-12 sm:pt-24 lg:static lg:px-8 lg:py-48">
              <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
                <div class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden ring-1 ring-white/5 lg:w-1/2">
                  <svg class="absolute inset-0 h-full w-full stroke-gray-800" aria-hidden="true">
                    <defs>
                      <pattern id="54f88622-e7f8-4f1d-aaf9-c2f5e46dd1f2" width="200" height="200" x="100%"
                        patternUnits="userSpaceOnUse">
                        <path d="M130 400V.5M.5 .5H200" fill="none" />
                      </pattern>
                    </defs>
                    <svg x="100%" y="-1" class="overflow-visible fill-gray-950/30">
                      <path d="M-470.5 0h201v201h-301Z" stroke-width="0" />
                    </svg>
                    <rect width="100%" height="100%" stroke-width="0"
                      fill="url(#54f88622-e7f8-4f1d-aaf9-c2f5e46dd1f2)" />
                  </svg>

                  <div
                    class="absolute -left-56 top-[calc(100%-13rem)] transform-gpu blur-3xl lg:left-[max(-14rem,calc(100%-59rem))] lg:top-[calc(50%-7rem)]"
                    aria-hidden="true">
                    <div
                      class="aspect-[1155/678] w-[30.1875rem] bg-gradient-to-br from-[#80caff] to-[#4f46e5] opacity-20"
                      style="clip-path: polygon(74.1% 56.1%, 100% 38.6%, 97.5% 73.3%, 85.5% 100%, 80.7% 98.2%, 72.5% 67.7%, 60.2% 37.8%, 52.4% 32.2%, 47.5% 41.9%, 45.2% 65.8%, 27.5% 23.5%, 0.1% 35.4%, 17.9% 0.1%, 27.6% 23.5%, 76.1% 2.6%, 74.1% 56.1%)" />
                  </div>
                </div>
                <div class="grid grid-rows-1 p-4 sm:p-8 lg:p-12">
                  <img class="h-10 sm:h-12" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo">
                  <a href="#" class="text-sm italic font-bold leading-6 text-white flex-initial">Technology</a>
                  <br>
                  <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-green-500">Security Service Request</h2>
                  <p class="mt-2 text-sm sm:text-base text-gray-300">Get expert security solutions tailored to your
                    needs. Our team specializes in CCTV installation, monitoring systems, and comprehensive security
                    assessments.</p>

                  <div
                    class="mt-4 bg-gradient-to-br from-gray-800/80 to-gray-800/60 rounded-lg border border-green-600/30 p-4 shadow-lg">
                    <h3 class="text-green-500 text-lg font-semibold mb-2 flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd"
                          d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                          clip-rule="evenodd" />
                      </svg>
                      How We Can Help You
                    </h3>
                    <div class="grid grid-cols-1 gap-3 text-gray-300 text-sm">
                      <div
                        class="flex items-start bg-gray-700/30 rounded-md p-2 hover:bg-gray-700/50 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5"
                          viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                        </svg>
                        <div>
                          <strong class="text-green-400">Security Consultations:</strong>
                          <span>Request an assessment of your security needs for home or business. We evaluate
                            vulnerabilities and recommend tailored security solutions.</span>
                        </div>
                      </div>
                      <div
                        class="flex items-start bg-gray-700/30 rounded-md p-2 hover:bg-gray-700/50 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5"
                          viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd" />
                        </svg>
                        <div>
                          <strong class="text-green-400">Installation Quotes:</strong>
                          <span>Get detailed pricing for CCTV systems or monitoring services based on your property size
                            and specific requirements.</span>
                        </div>
                      </div>
                      <div
                        class="flex items-start bg-gray-700/30 rounded-md p-2 hover:bg-gray-700/50 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5"
                          viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                            clip-rule="evenodd" />
                        </svg>
                        <div>
                          <strong class="text-green-400">Technical Support:</strong>
                          <span>Assistance with existing security systems, troubleshooting, repairs, or maintenance of
                            your security equipment.</span>
                        </div>
                      </div>
                      <div
                        class="flex items-start bg-gray-700/30 rounded-md p-2 hover:bg-gray-700/50 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5"
                          viewBox="0 0 20 20" fill="currentColor">
                          <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />
                          <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />
                          <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />
                        </svg>
                        <div>
                          <strong class="text-green-400">Custom Solutions:</strong>
                          <span>Specialized security requirements for unique properties, businesses, or complex
                            integration with existing systems.</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <p class="text-white text-sm sm:text-base mt-4">If you are having issues with submitting a request
                    please reach out to our support team by email or phone, thank you!</p>

                  <dl class="mt-6 sm:mt-10 space-y-4 text-sm sm:text-base leading-7 text-gray-300">
                    <div class="flex gap-x-4">
                      <dt class="flex-none">
                        <span class="sr-only">Telephone</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 sm:h-7 sm:w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                      </dt>
                      <dd><a class="hover:text-white" href="tel:+1 (505) 659-5097">+1 (505) 659-5097</a></dd>
                    </div>
                    <div class="flex gap-x-4">
                      <dt class="flex-none">
                        <span class="sr-only">Email</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 sm:h-7 sm:w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                      </dt>
                      <dd><a class="hover:text-white" href="mailto:hello@example.com">support@nmtechnology.us</a></dd>
                    </div>
                  </dl>
                </div>
              </div>
            </div>
            <div>
              <!-- Confirmation Screen -->
              <div v-if="showConfirmationScreen" class="px-4 sm:px-6 pb-16 sm:pb-24 pt-10 sm:pt-20 lg:px-8 lg:py-48">
                <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
                  <div class="animate__animated animate__fadeIn">
                    <div class="text-center">
                      <div class="mb-6 mx-auto w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                      </div>
                      <h2 class="text-2xl font-bold text-green-500 mb-4">Message Sent Successfully!</h2>
                      <p class="text-gray-300 text-lg mb-6">
                        Thank you for contacting NM Technology. Your message has been received, and our team will get back to you shortly.
                      </p>
                    </div>
                    
                    <div class="mt-8 bg-gray-800/50 p-4 rounded-lg border border-gray-700">
                      <h3 class="text-white font-semibold mb-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd" />
                        </svg>
                        What happens next?
                      </h3>
                      <ul class="text-gray-300 text-sm space-y-2 pl-6 list-disc">
                        <li>Our team will review your inquiry within 1 business day</li>
                        <li>You will receive an email confirmation to the address you provided</li>
                        <li>One of our security experts will contact you to discuss your requirements</li>
                        <li>We may request additional information to better assist with your security needs</li>
                      </ul>
                    </div>
                    
                    <div class="mt-8 text-center">
                      <button 
                        @click="closeFromConfirmation"
                        class="px-6 py-3 bg-gray-800 hover:bg-gray-700 text-white rounded-md transition-colors duration-300 inline-flex items-center justify-center font-semibold">
                        Close
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Contact Form -->
              <form v-else id="contact-form" novalidate="novalidate" @submit.prevent="sendContact" method="post"
                class="px-4 sm:px-6 pb-16 sm:pb-24 pt-10 sm:pt-20 lg:px-8 lg:py-48">
                <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
                  <div v-if="errorMessage"
                    class="mb-6 p-4 bg-gradient-to-br from-red-900/40 to-red-900/20 border border-red-500/30 text-red-400 rounded-md text-center font-medium animate__animated animate__fadeIn shadow-md">
                    <div class="flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-red-500" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                          clip-rule="evenodd" />
                      </svg>
                      {{ errorMessage }}
                    </div>
                  </div>
                  <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:gap-y-6 sm:grid-cols-2">
                    <div>
                      <label for="firstName" class="flex items-center text-sm font-semibold leading-6 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        First name
                      </label>
                      <div class="mt-2">
                        <input type="text" v-model="form.firstName" id="first-name" autocomplete="given-name"
                          class="block w-full rounded-md border-0 bg-white/5 px-3 py-1.5 sm:py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 hover:ring-green-500/50 focus:ring-2 focus:ring-inset focus:ring-green-500 text-sm sm:text-base sm:leading-6 transition-all duration-200"
                          placeholder="Your first name" />
                      </div>
                      <div v-if="validationErrors.firstName"
                        class="text-xs sm:text-sm text-red-500 mt-1 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        {{ validationErrors.firstName[0] }}
                      </div>
                    </div>
                    <div>
                      <label for="lastName" class="flex items-center text-sm font-semibold leading-6 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Last name
                      </label>
                      <div class="mt-2">
                        <input type="text" v-model="form.lastName" id="last-name" autocomplete="family-name"
                          class="block w-full rounded-md border-0 bg-white/5 px-3 py-1.5 sm:py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 hover:ring-green-500/50 focus:ring-2 focus:ring-inset focus:ring-green-500 text-sm sm:text-base sm:leading-6 transition-all duration-200"
                          placeholder="Your last name" />
                      </div>
                      <div v-if="validationErrors.lastName"
                        class="text-xs sm:text-sm text-red-500 mt-1 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        {{ validationErrors.lastName[0] }}
                      </div>
                    </div>
                    <div class="sm:col-span-2">
                      <label for="email" class="flex items-center text-sm font-semibold leading-6 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Email
                      </label>
                      <div class="mt-2">
                        <input type="email" v-model="form.email" id="email" autocomplete="email"
                          class="block w-full rounded-md border-0 bg-white/5 px-3 py-1.5 sm:py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 hover:ring-green-500/50 focus:ring-2 focus:ring-inset focus:ring-green-500 text-sm sm:text-base sm:leading-6 transition-all duration-200"
                          placeholder="your.email@example.com" />
                      </div>
                      <div v-if="validationErrors.email" class="text-xs sm:text-sm text-red-500 mt-1 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        {{ validationErrors.email[0] }}
                      </div>
                    </div>
                    <div class="sm:col-span-2">
                      <label for="phoneNumber" class="flex items-center text-sm font-semibold leading-6 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Phone number
                      </label>
                      <div class="mt-2">
                        <input type="tel" v-model="form.phoneNumber" id="phone-number" autocomplete="tel"
                          class="block w-full rounded-md border-0 bg-white/5 px-3 py-1.5 sm:py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 hover:ring-green-500/50 focus:ring-2 focus:ring-inset focus:ring-green-500 text-sm sm:text-base sm:leading-6 transition-all duration-200"
                          placeholder="(123) 456-7890" />
                      </div>
                      <div v-if="validationErrors.phoneNumber"
                        class="text-xs sm:text-sm text-red-500 mt-1 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        {{ validationErrors.phoneNumber[0] }}
                      </div>
                    </div>
                    <div class="sm:col-span-2">
                      <label for="message" class="flex items-center text-sm font-semibold leading-6 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        Your Message
                      </label>
                      <div class="mt-2 relative">
                        <textarea v-model="form.message" id="message" rows="4"
                          class="block w-full rounded-md border-0 bg-white/5 px-3 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-green-500 text-sm sm:text-base sm:leading-6 transition duration-200"
                          placeholder="Please include details about your security needs, property size, or specific questions about our services. The more information you provide, the better we can assist you."></textarea>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none opacity-50">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                          </svg>
                        </div>
                      </div>
                      <div class="mt-3 bg-gray-800/50 border border-gray-700/50 rounded-md p-3">
                        <p class="text-xs sm:text-sm font-medium text-green-400 mb-1">Tips for a detailed message:</p>
                        <ul class="text-xs text-gray-300 space-y-1 ml-1">
                          <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg"
                              class="h-3.5 w-3.5 text-green-500 mr-1 flex-shrink-0 mt-0.5" viewBox="0 0 20 20"
                              fill="currentColor">
                              <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                            </svg>
                            <span><strong>Property details:</strong> Size, layout, existing security measures</span>
                          </li>
                          <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg"
                              class="h-3.5 w-3.5 text-green-500 mr-1 flex-shrink-0 mt-0.5" viewBox="0 0 20 20"
                              fill="currentColor">
                              <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                            </svg>
                            <span><strong>Timeline:</strong> When you need service or installation</span>
                          </li>
                          <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg"
                              class="h-3.5 w-3.5 text-green-500 mr-1 flex-shrink-0 mt-0.5" viewBox="0 0 20 20"
                              fill="currentColor">
                              <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                            </svg>
                            <span><strong>Budget considerations:</strong> General price range for planning</span>
                          </li>
                          <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg"
                              class="h-3.5 w-3.5 text-green-500 mr-1 flex-shrink-0 mt-0.5" viewBox="0 0 20 20"
                              fill="currentColor">
                              <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                            </svg>
                            <span><strong>Specific concerns:</strong> Areas of vulnerability or special
                              requirements</span>
                          </li>
                        </ul>
                      </div>
                      <div v-if="validationErrors.message"
                        class="text-xs sm:text-sm text-red-500 mt-1 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        {{ validationErrors.message[0] }}
                      </div>
                    </div>
                    <div class="sm:col-span-2">
                      <label for="fileUpload" class="flex items-center text-sm font-semibold leading-6 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16h16V4H4zm4 4h8v8H8V8z" />
                        </svg>
                        Upload Files (Blueprints, Documents, Images)
                      </label>
                      <div class="mt-2">
                        <input type="file" id="fileUpload" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.bmp,.tiff,.svg,.webp,.zip,.rar,.dwg,.dxf,.xlsx,.xls,.ppt,.pptx,.txt,.csv" @change="handleFileChange" class="block w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-600 file:text-white hover:file:bg-green-700" />
                        <div v-if="fileErrors.length" class="text-xs text-red-500 mt-1">
                          <div v-for="err in fileErrors" :key="err">{{ err }}</div>
                        </div>
                        <div v-if="selectedFiles.length" class="mt-2 text-xs text-green-400">
                          <div v-for="file in selectedFiles" :key="file.name">{{ file.name }} ({{ (file.size/1024).toFixed(1) }} KB)</div>
                        </div>
                      </div>
                    </div>
                    <!-- Human Verification - Math Problem -->
                    <div class="sm:col-span-2 mt-2 sm:mt-4">
                      <label class="flex items-center text-sm font-semibold leading-6 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        Human Verification
                      </label>
                      <div
                        class="mt-2 p-4 sm:p-5 bg-gradient-to-br from-gray-800/80 to-gray-800/60 rounded-md border border-gray-700/50 shadow-md">
                        <div class="flex items-center gap-2 mb-3">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd" />
                          </svg>
                          <p class="text-sm sm:text-base text-white font-medium">Please solve this simple math problem
                            to verify you're human:</p>
                        </div>

                        <div
                          class="flex flex-wrap items-center gap-3 bg-gradient-to-br from-gray-700/60 to-gray-700/40 p-3 rounded-md border border-gray-600/20">
                          <span class="text-lg sm:text-xl text-white font-medium">{{ mathProblem.question }}</span>
                          <span class="text-green-400 font-bold">=</span>
                          <div class="relative">
                            <input type="number" v-model.number="userMathAnswer"
                              class="block w-20 rounded-md border-0 bg-white/10 px-3 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/20 focus:ring-2 focus:ring-inset focus:ring-green-500 text-base sm:leading-6 transition-colors duration-200"
                              placeholder="?" aria-label="Enter your answer" />
                          </div>
                          <button type="button" @click="generateMathProblem"
                            class="ml-2 inline-flex items-center text-sm text-green-400 hover:text-green-300 bg-gray-700/80 hover:bg-gray-600/80 px-3 py-1.5 rounded-md transition-colors duration-200"
                            aria-label="Get a new math problem">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Try different problem
                          </button>
                        </div>

                        <div v-if="mathVerificationError"
                          class="mt-3 p-3 bg-gradient-to-r from-red-900/30 to-red-800/20 border border-red-600/30 rounded-md text-xs sm:text-sm text-red-400 animate__animated animate__fadeIn">
                          <div class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 mr-1 mt-0.5"
                              viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                            </svg>
                            {{ mathVerificationError }}
                          </div>
                        </div>

                        <div class="flex items-center mt-3 p-2 bg-gray-700/30 rounded-md border border-gray-600/20">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500 mr-1.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                          <p class="text-xs text-gray-300">This verification helps us prevent spam submissions and
                            ensures our team receives only legitimate service requests.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mt-6 sm:mt-8 flex justify-end">
                    <button type="submit" :disabled="isSubmitting"
                      class="relative overflow-hidden group inline-flex items-center justify-center rounded-md bg-gradient-to-r from-green-600 to-green-500 px-6 py-3 text-center text-sm font-semibold text-white shadow-lg hover:from-green-700 hover:to-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500 transition-all duration-300 transform hover:scale-[1.03] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:scale-100">
                      <span
                        class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-full bg-gradient-to-r from-green-500/30 via-green-400/10 to-green-500/0 group-hover:translate-x-0"></span>
                      <span v-if="isSubmitting" class="relative flex items-center">
                        <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                          fill="none" viewBox="0 0 24 24">
                          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                          </circle>
                          <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                          </path>
                        </svg>
                        Sending...
                      </span>
                      <span v-else class="relative flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18-9-2zm0 0v-8" />
                        </svg>
                        Send Message
                      </span>
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

<script>
import axios from 'axios'

export default {
  data () {
    return {
      isOpen: false,
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
      showConfirmationScreen: false,
      mathProblem: {
        question: '',
        answer: null
      },
      userMathAnswer: null,
      mathVerificationError: '',
      selectedFiles: [],
      fileErrors: []
    }
  },
  methods: {
    // Close modal function
    closeModal() {
      this.isOpen = false
      this.$emit('close')
    },
    // Open modal function with reset state
    openModalFromOptions() {
      // Reset confirmation screen and error states when opening modal
      this.showConfirmationScreen = false;
      this.successMessage = '';
      this.errorMessage = '';
      this.validationErrors = {};
      this.isOpen = true;
    },
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
      
      // Prepare form data for file upload
      const formData = new FormData();
      formData.append('firstName', this.form.firstName);
      formData.append('lastName', this.form.lastName);
      formData.append('phoneNumber', this.form.phoneNumber);
      formData.append('email', this.form.email);
      formData.append('message', this.form.message);
      if (this.selectedFiles.length) {
        this.selectedFiles.forEach((file, idx) => {
          formData.append('files[]', file);
        });
      }
      // Math verification
      formData.append('userMathAnswer', this.userMathAnswer);
      formData.append('mathProblemAnswer', this.mathProblem.answer);

      axios.post('/api/send-contact', formData, {
        headers: { 'Content-Type': 'multipart/form-data' }
      })
      .then(res => {
        console.log('Success response:', res)
        this.successMessage = "Thank you! Your message has been sent successfully to NM Technology. Our team will contact you soon."
        this.clearForm()
        // Show confirmation screen instead of closing automatically
        this.showConfirmationScreen = true
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
      this.selectedFiles = []
      this.fileErrors = []
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
    },
    handleFileChange(e) {
      this.fileErrors = [];
      this.selectedFiles = [];
      const files = Array.from(e.target.files);
      const allowedTypes = [
        'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'image/jpeg', 'image/png', 'image/bmp', 'image/tiff', 'image/svg+xml', 'image/webp',
        'application/zip', 'application/x-rar-compressed',
        'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'text/plain', 'text/csv', 'application/octet-stream',
        'application/acad', 'application/x-autocad', 'application/x-dwg', 'application/x-dxf'
      ];
      const maxSize = 10 * 1024 * 1024; // 10MB
      files.forEach(file => {
        if (!allowedTypes.includes(file.type) && !file.name.match(/\.(pdf|doc|docx|jpg|jpeg|png|bmp|tiff|svg|webp|zip|rar|dwg|dxf|xlsx|xls|ppt|pptx|txt|csv)$/i)) {
          this.fileErrors.push(`${file.name}: Unsupported file type.`);
        } else if (file.size > maxSize) {
          this.fileErrors.push(`${file.name}: File too large (max 10MB).`);
        } else {
          this.selectedFiles.push(file);
        }
      });
    },
    closeFromConfirmation() {
      this.showConfirmationScreen = false
      this.successMessage = ''
      this.closeModal()
    }
  },
  mounted () {
    this.generateMathProblem()
  }
}
</script>

<style>

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
    z-index: 100; /* Increased z-index to be above everything else */
    padding: 1rem;
}

.modal-content {
    margin-top: 2rem; /* Reduced top margin */
    margin-bottom: 2rem;
    width: 100%;
    max-width: 1200px;
    border-radius: 1.5rem;
    position: relative;
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
    animation: modalSlideDown 0.3s ease-out;
    border: 3px solid #16a34a; /* Adding green border with site's green theme color */
    max-height: calc(100vh - 4rem); /* Ensure modal doesn't exceed viewport height */
    overflow-y: auto; /* Add scrolling to the modal content itself */
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
    .modal-content {
        margin-top: 1rem;
    }
}

@media (min-width: 768px) {
    .modal {
        align-items: flex-start; /* Changed from center to flex-start to keep modal at top */
        padding: 2rem;
    }
    
    .modal-content {
        margin-top: 120px; /* Consistent with smaller screens */
    }
}

/* Animation for modal appearance */
@keyframes modalSlideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
