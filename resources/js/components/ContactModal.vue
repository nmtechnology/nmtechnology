<!-- eslint-disable no-mixed-spaces-and-tabs -->
<!-- eslint-disable no-tabs -->
<template>
  <!-- Modal is opened via inject/provide from parent components (navbar, footer, etc.) -->
  <teleport to="body">
    <div v-if="isOpen" class="relative z-50">
      <!-- Backdrop -->
      <div class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm" aria-hidden="true"></div>

      <!-- Modal container -->
      <div class="fixed inset-0 z-50 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
          <!-- Modal panel -->
          <div
            class="relative w-full max-w-4xl bg-gradient-to-br from-gray-900 to-gray-800 border border-green-600/50 rounded-xl shadow-2xl shadow-green-500/20 transform transition-all duration-300"
          >
            <!-- Header -->
            <div
              class="relative px-6 py-8 bg-gradient-to-r from-green-600/20 to-lime-600/20 border-b border-gray-700/50 rounded-t-xl"
            >
              <div
                class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-lime-500/5 rounded-t-xl"
              ></div>
              <div class="relative flex items-center justify-between">
                <div class="flex items-center space-x-4">
                  <img
                    src="/public/images/nm-logo-rmbg.webp"
                    alt="NM Technology Logo"
                    class="h-12 w-auto"
                  />
                  <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-white">
                      Contact
                      <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
                        >Us!</span
                      >
                    </h2>
                    <p class="mt-2 text-gray-300">
                      Get expert security solutions tailored to your needs
                    </p>
                  </div>
                </div>
                <button
                  @click="closeModal"
                  class="rounded-full p-2 text-gray-400 hover:text-white hover:bg-gray-700/50 transition-all duration-200"
                >
                  <svg
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M6 18L18 6M6 6l12 12"
                    />
                  </svg>
                </button>
              </div>
            </div>

            <!-- Form Content -->
            <div class="px-6 py-8 max-h-[calc(100vh-200px)] overflow-y-auto">
              <!-- Service Information Section -->
              <div
                class="mb-8 p-6 bg-gradient-to-br from-gray-800/80 to-gray-800/60 rounded-lg border border-green-600/30 shadow-lg"
              >
                <h3 class="text-green-500 text-xl font-semibold mb-4 flex items-center">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 mr-3"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                    <path
                      fill-rule="evenodd"
                      d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  How We Can Help You
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-300 text-sm">
                  <div
                    class="flex items-start bg-gray-700/30 rounded-md p-3 hover:bg-gray-700/50 transition-colors duration-200"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-green-500 mr-3 flex-shrink-0 mt-0.5"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 616 0z"
                        clip-rule="evenodd"
                      />
                    </svg>
                    <div>
                      <strong class="text-green-400">Security Consultations:</strong>
                      <span class="block mt-1"
                        >Request an assessment of your security needs for home or
                        business.</span
                      >
                    </div>
                  </div>
                  <div
                    class="flex items-start bg-gray-700/30 rounded-md p-3 hover:bg-gray-700/50 transition-colors duration-200"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-green-500 mr-3 flex-shrink-0 mt-0.5"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"
                      />
                    </svg>
                    <div>
                      <strong class="text-green-400">Installation Quotes:</strong>
                      <span class="block mt-1"
                        >Get detailed pricing for CCTV systems or monitoring
                        services.</span
                      >
                    </div>
                  </div>
                  <div
                    class="flex items-start bg-gray-700/30 rounded-md p-3 hover:bg-gray-700/50 transition-colors duration-200"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-green-500 mr-3 flex-shrink-0 mt-0.5"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                        clip-rule="evenodd"
                      />
                    </svg>
                    <div>
                      <strong class="text-green-400">Technical Support:</strong>
                      <span class="block mt-1"
                        >Assistance with existing security systems and
                        troubleshooting.</span
                      >
                    </div>
                  </div>
                  <div
                    class="flex items-start bg-gray-700/30 rounded-md p-3 hover:bg-gray-700/50 transition-colors duration-200"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 text-green-500 mr-3 flex-shrink-0 mt-0.5"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z"
                      />
                      <path
                        d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z"
                      />
                      <path
                        d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z"
                      />
                    </svg>
                    <div>
                      <strong class="text-green-400">Custom Solutions:</strong>
                      <span class="block mt-1"
                        >Specialized security requirements for unique properties.</span
                      >
                    </div>
                  </div>
                </div>
                <div
                  class="mt-4 p-3 bg-green-500/10 border border-green-500/30 rounded-md"
                >
                  <p class="text-green-400 text-sm font-medium">💡 Pro Tip:</p>
                  <p class="text-gray-300 text-sm mt-1">
                    The more details you provide about your security needs, the better we
                    can assist you with a tailored solution.
                  </p>
                </div>

                <!-- Apply Now Section -->
                <div class="mt-6 pt-6 border-t border-gray-700/50">
                  <div class="text-center">
                    <h4 class="text-lg font-semibold text-white mb-2">
                      Looking for Employment Opportunities?
                    </h4>
                    <p class="text-gray-400 text-sm mb-4">
                      Join our growing team of security professionals and technology
                      experts.
                    </p>
                    <button
                      @click="
                        openApplicationModal();
                        closeModal();
                      "
                      class="inline-flex items-center gap-2 px-6 py-3 bg-lime-400 hover:bg-lime-500 text-outline text-gray-900 hover:text-black rounded-lg font-semibold text-sm shadow-lg shadow-lime-400/30 transition-all duration-300 transform hover:scale-105"
                    >
                      <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"
                        />
                      </svg>
                      Apply Now
                    </button>
                  </div>
                </div>
              </div>

              <!-- Confirmation Screen -->
              <div v-if="showConfirmationScreen" class="text-center">
                <div class="animate__animated animate__fadeIn">
                  <div
                    class="mb-6 mx-auto w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-12 w-12 text-green-500"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </div>
                  <h2 class="text-2xl font-bold text-green-500 mb-4">
                    Message Sent Successfully!
                  </h2>
                  <p class="text-gray-300 text-lg mb-6">
                    Thank you for contacting NM Technology. Your message has been
                    received, and our team will get back to you shortly.
                  </p>

                  <div class="mt-8 bg-gray-800/50 p-4 rounded-lg border border-gray-700">
                    <h3
                      class="text-white font-semibold mb-3 flex items-center justify-center"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 mr-2 text-green-500"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                          clip-rule="evenodd"
                        />
                      </svg>
                      What happens next?
                    </h3>
                    <ul
                      class="text-gray-300 text-sm space-y-2 list-disc text-left max-w-md mx-auto"
                    >
                      <li>Our team will review your inquiry within 1 business day</li>
                      <li>
                        You will receive an email confirmation to the address you provided
                      </li>
                      <li>
                        One of our security experts will contact you to discuss your
                        requirements
                      </li>
                      <li>
                        We may request additional information to better assist with your
                        security needs
                      </li>
                    </ul>
                  </div>

                  <div class="mt-8">
                    <button
                      @click="closeFromConfirmation"
                      class="px-6 py-3 bg-gray-800 hover:bg-gray-700 text-white rounded-md transition-colors duration-300 inline-flex items-center justify-center font-semibold"
                    >
                      Close
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 ml-2"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Contact Form -->
              <form
                v-else
                id="contact-form"
                novalidate="novalidate"
                @submit.prevent="sendContact"
                method="post"
                class="space-y-6"
              >
                <div
                  v-if="errorMessage"
                  class="mb-6 p-4 bg-gradient-to-br from-red-900/40 to-red-900/20 border border-red-500/30 text-red-400 rounded-md text-center font-medium animate__animated animate__fadeIn shadow-md"
                >
                  <div class="flex items-center justify-center">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-6 w-6 mr-2 text-red-500"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd"
                      />
                    </svg>
                    {{ errorMessage }}
                  </div>
                </div>

                <!-- Form Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label
                      for="firstName"
                      class="flex items-center text-sm font-semibold leading-6 text-white mb-2"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 mr-2 text-green-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                        />
                      </svg>
                      First name
                    </label>
                    <input
                      type="text"
                      v-model="form.firstName"
                      id="first-name"
                      autocomplete="given-name"
                      class="block w-full rounded-md border-0 bg-white/5 px-3 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 hover:ring-green-500/50 focus:ring-2 focus:ring-inset focus:ring-green-500 text-base leading-6 transition-all duration-200"
                      placeholder="Your first name"
                    />
                    <div
                      v-if="validationErrors.firstName"
                      class="text-sm text-red-500 mt-1 flex items-center"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 mr-1"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                        />
                      </svg>
                      {{ validationErrors.firstName[0] }}
                    </div>
                  </div>

                  <div>
                    <label
                      for="last-name"
                      class="flex items-center text-sm font-semibold leading-6 text-white mb-2"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 mr-2 text-green-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                        />
                      </svg>
                      Last name
                    </label>
                    <input
                      type="text"
                      v-model="form.lastName"
                      id="last-name"
                      autocomplete="family-name"
                      class="block w-full rounded-md border-0 bg-white/5 px-3 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 hover:ring-green-500/50 focus:ring-2 focus:ring-inset focus:ring-green-500 text-base leading-6 transition-all duration-200"
                      placeholder="Your last name"
                    />
                    <div
                      v-if="validationErrors.lastName"
                      class="text-sm text-red-500 mt-1 flex items-center"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 mr-1"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                        />
                      </svg>
                      {{ validationErrors.lastName[0] }}
                    </div>
                  </div>

                  <div>
                    <label
                      for="email"
                      class="flex items-center text-sm font-semibold leading-6 text-white mb-2"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 mr-2 text-green-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                        />
                      </svg>
                      Email
                    </label>
                    <input
                      type="email"
                      v-model="form.email"
                      id="email"
                      autocomplete="email"
                      class="block w-full rounded-md border-0 bg-white/5 px-3 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 hover:ring-green-500/50 focus:ring-2 focus:ring-inset focus:ring-green-500 text-base leading-6 transition-all duration-200"
                      placeholder="your.email@example.com"
                    />
                    <div
                      v-if="validationErrors.email"
                      class="text-sm text-red-500 mt-1 flex items-center"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 mr-1"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                        />
                      </svg>
                      {{ validationErrors.email[0] }}
                    </div>
                  </div>

                  <div>
                    <label
                      for="phone-number"
                      class="flex items-center text-sm font-semibold leading-6 text-white mb-2"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 mr-2 text-green-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                        />
                      </svg>
                      Phone number
                    </label>
                    <input
                      type="tel"
                      v-model="form.phoneNumber"
                      id="phone-number"
                      autocomplete="tel"
                      class="block w-full rounded-md border-0 bg-white/5 px-3 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 hover:ring-green-500/50 focus:ring-2 focus:ring-inset focus:ring-green-500 text-base leading-6 transition-all duration-200"
                      placeholder="(555) 123-4567"
                    />
                    <div
                      v-if="validationErrors.phoneNumber"
                      class="text-sm text-red-500 mt-1 flex items-center"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 mr-1"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                        />
                      </svg>
                      {{ validationErrors.phoneNumber[0] }}
                    </div>
                  </div>
                </div>

                <div class="md:col-span-2">
                  <label
                    for="message"
                    class="flex items-center text-sm font-semibold leading-6 text-white mb-2"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-4 w-4 mr-2 text-green-500"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                      />
                    </svg>
                    Message
                  </label>
                  <textarea
                    v-model="form.message"
                    id="message"
                    rows="4"
                    class="block w-full rounded-md border-0 bg-white/5 px-3 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 hover:ring-green-500/50 focus:ring-2 focus:ring-inset focus:ring-green-500 text-base leading-6 transition-all duration-200 resize-none"
                    placeholder="Please include details about your security needs, property size, or specific questions about our services. The more information you provide, the better we can assist you."
                  ></textarea>
                  <div
                    v-if="validationErrors.message"
                    class="text-sm text-red-500 mt-1 flex items-center"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-4 w-4 mr-1"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                      />
                    </svg>
                    {{ validationErrors.message[0] }}
                  </div>
                </div>

                <!-- Blueprint File Upload -->
                <div class="md:col-span-2">
                  <div class="bg-gray-800/50 p-6 rounded-lg border border-gray-700/50">
                    <h4 class="text-lg font-semibold text-white mb-4 flex items-center">
                      <svg
                        class="h-5 w-5 mr-2 text-green-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                        />
                      </svg>
                      Attach Files (Optional)
                    </h4>
                    <div>
                      <label class="block text-sm font-medium text-gray-300 mb-2"
                        >Blueprints, Plans, or Documents</label
                      >
                      <div class="relative">
                        <input
                          ref="blueprintInput"
                          type="file"
                          accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.tiff,.bmp,.xls,.xlsx,.txt"
                          @change="handleBlueprintUpload"
                          class="hidden"
                        />
                        <button
                          type="button"
                          @click="$refs.blueprintInput.click()"
                          class="w-full flex items-center justify-center px-4 py-3 bg-gray-700/50 border border-gray-600 rounded-lg text-gray-300 hover:border-green-500 hover:bg-gray-700 transition-colors duration-300"
                          :class="{ 'border-green-500 bg-gray-700': form.blueprintFile }"
                        >
                          <svg
                            class="h-5 w-5 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                            />
                          </svg>
                          {{
                            form.blueprintFile
                              ? form.blueprintFile.name
                              : "Choose File to Upload"
                          }}
                        </button>
                      </div>
                      <p class="text-xs text-gray-400 mt-1">
                        PDF, DOC, DOCX, images, or spreadsheet files. Max size: 10MB
                      </p>

                      <!-- File Upload Status -->
                      <div v-if="uploadStatus" class="mt-2 flex items-center text-sm">
                        <div
                          v-if="uploadStatus === 'uploading'"
                          class="flex items-center text-yellow-400"
                        >
                          <svg
                            class="animate-spin h-4 w-4 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                          >
                            <circle
                              class="opacity-25"
                              cx="12"
                              cy="12"
                              r="10"
                              stroke="currentColor"
                              stroke-width="4"
                            ></circle>
                            <path
                              class="opacity-75"
                              fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                            ></path>
                          </svg>
                          Uploading and scanning...
                        </div>
                        <div
                          v-else-if="uploadStatus === 'scanning'"
                          class="flex items-center text-blue-400"
                        >
                          <svg
                            class="animate-pulse h-4 w-4 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                          </svg>
                          Virus scanning...
                        </div>
                        <div
                          v-else-if="uploadStatus === 'success'"
                          class="flex items-center text-green-400"
                        >
                          <svg
                            class="h-4 w-4 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 13l4 4L19 7"
                            />
                          </svg>
                          File verified and ready
                        </div>
                        <div
                          v-else-if="uploadStatus === 'error'"
                          class="flex items-center text-red-400"
                        >
                          <svg
                            class="h-4 w-4 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"
                            />
                          </svg>
                          Upload failed or virus detected
                        </div>
                      </div>

                      <!-- Security Information -->
                      <div
                        class="mt-4 p-3 bg-blue-500/10 border border-blue-500/30 rounded-md"
                      >
                        <div class="flex items-start">
                          <svg
                            class="h-5 w-5 text-blue-400 mr-2 flex-shrink-0 mt-0.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                            />
                          </svg>
                          <div>
                            <p class="text-blue-300 font-medium mb-1">
                              Document Security
                            </p>
                            <p class="text-blue-200 text-sm">
                              All uploaded files are automatically scanned for viruses and
                              malware before being processed. Only clean, verified files
                              will be included with your message.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Human Verification -->
                <div class="md:col-span-2">
                  <div class="bg-gray-800/50 p-6 rounded-lg border border-gray-700/50">
                    <h4 class="text-lg font-semibold text-white mb-4 flex items-center">
                      <svg
                        class="h-5 w-5 mr-2 text-green-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                        />
                      </svg>
                      Human Verification
                    </h4>
                    <div
                      class="p-4 bg-gradient-to-br from-gray-800/80 to-gray-800/60 rounded-md border border-gray-700/50 shadow-md"
                    >
                      <div class="flex items-center gap-2 mb-3">
                        <span class="text-white font-medium">Math Problem:</span>
                        <span class="text-green-400 font-bold text-lg">{{
                          mathProblem
                        }}</span>
                        <button
                          type="button"
                          @click="generateMathProblem"
                          class="ml-2 inline-flex items-center text-sm text-green-400 hover:text-green-300 bg-gray-700/80 hover:bg-gray-600/80 px-3 py-1.5 rounded-md transition-colors duration-200"
                          aria-label="Get a new math problem"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 mr-1"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                            />
                          </svg>
                          Try different problem
                        </button>
                      </div>
                      <div class="flex items-center gap-3">
                        <label class="text-gray-300 font-medium">Answer:</label>
                        <input
                          v-model="mathAnswer"
                          type="number"
                          required
                          class="w-24 px-3 py-2 bg-gray-700/60 border border-gray-600 rounded-md text-white text-center focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-colors duration-300"
                          placeholder="?"
                        />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="flex justify-end mt-8">
                  <button
                    type="submit"
                    :disabled="isSubmitting"
                    class="relative overflow-hidden group inline-flex items-center justify-center rounded-md bg-gradient-to-r from-green-600 to-green-500 px-6 py-3 text-center text-sm font-semibold text-white shadow-lg hover:from-green-700 hover:to-green-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500 transition-all duration-300 transform hover:scale-[1.03] disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:scale-100"
                  >
                    <span
                      class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-full bg-gradient-to-r from-green-500/30 via-green-400/10 to-green-500/0 group-hover:translate-x-0"
                    ></span>
                    <span v-if="isSubmitting" class="relative flex items-center">
                      <svg
                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                      >
                        <circle
                          class="opacity-25"
                          cx="12"
                          cy="12"
                          r="10"
                          stroke="currentColor"
                          stroke-width="4"
                        ></circle>
                        <path
                          class="opacity-75"
                          fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                        ></path>
                      </svg>
                      Sending...
                    </span>
                    <span v-else class="relative flex items-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 mr-2"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"
                        />
                      </svg>
                      Send Message
                    </span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </teleport>
</template>

<script>
import { ref, reactive, inject } from "vue";
import axios from "axios";

export default {
  setup() {
    const isOpen = ref(false);
    const isSubmitting = ref(false);
    const showConfirmationScreen = ref(false);
    const errorMessage = ref("");
    const validationErrors = reactive({});

    // File upload status tracking
    const uploadStatus = ref(null);

    // Inject the openApplicationModal function
    const openApplicationModal = inject("openApplicationModal");

    const form = reactive({
      firstName: "",
      lastName: "",
      email: "",
      phoneNumber: "",
      message: "",
      blueprintFile: null,
      blueprintFileId: null,
    });

    // Math puzzle for human verification
    const mathProblem = ref("");
    const mathAnswer = ref("");
    const correctAnswer = ref(0);

    // Generate math problem for human verification
    const generateMathProblem = () => {
      const operations = [
        () => {
          const a = Math.floor(Math.random() * 10) + 1;
          const b = Math.floor(Math.random() * 10) + 1;
          correctAnswer.value = a + b;
          return `${a} + ${b} = ?`;
        },
        () => {
          const a = Math.floor(Math.random() * 10) + 5;
          const b = Math.floor(Math.random() * 5) + 1;
          correctAnswer.value = a - b;
          return `${a} - ${b} = ?`;
        },
        () => {
          const a = Math.floor(Math.random() * 10) + 1;
          const b = Math.floor(Math.random() * 10) + 1;
          correctAnswer.value = a * b;
          return `${a} × ${b} = ?`;
        },
      ];
      const randomOperation = operations[Math.floor(Math.random() * operations.length)];
      mathProblem.value = randomOperation();
      mathAnswer.value = "";
    };

    const openModal = () => {
      isOpen.value = true;
      resetForm();
      generateMathProblem();
    };

    const closeModal = () => {
      isOpen.value = false;
      resetForm();
    };

    const closeFromConfirmation = () => {
      showConfirmationScreen.value = false;
      resetForm();
      closeModal();
    };

    const resetForm = () => {
      showConfirmationScreen.value = false;
      errorMessage.value = "";
      uploadStatus.value = null;
      Object.keys(validationErrors).forEach((key) => {
        delete validationErrors[key];
      });
      form.firstName = "";
      form.lastName = "";
      form.email = "";
      form.phoneNumber = "";
      form.message = "";
      form.blueprintFile = null;
      form.blueprintFileId = null;
      mathAnswer.value = "";
      generateMathProblem();
    };

    // File validation function
    const validateFile = (file) => {
      // Check file size (10MB max for blueprints)
      const maxSize = 10 * 1024 * 1024; // 10MB in bytes
      if (file.size > maxSize) {
        alert("File size must be less than 10MB");
        return false;
      }

      // Check file type - allow common blueprint/document formats
      const allowedTypes = [
        "application/pdf",
        "application/msword",
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
        "image/jpeg",
        "image/jpg",
        "image/png",
        "image/tiff",
        "image/bmp",
        "application/vnd.ms-excel",
        "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        "text/plain",
      ];

      if (!allowedTypes.includes(file.type)) {
        alert(
          "File type not allowed. Please upload PDF, DOC, DOCX, images, or spreadsheet files."
        );
        return false;
      }

      return true;
    };

    // File upload function with virus scanning
    const uploadFile = async (file, type) => {
      const formData = new FormData();
      formData.append("file", file);
      formData.append("type", type);

      // First upload the file
      const uploadResponse = await axios.post("/api/upload-document", formData, {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      });

      if (uploadResponse.data.success) {
        // Update status to scanning
        uploadStatus.value = "scanning";

        // Wait for virus scanning
        await new Promise((resolve) => setTimeout(resolve, 2000));

        return uploadResponse.data;
      } else {
        throw new Error(uploadResponse.data.message || "Upload failed");
      }
    };

    // Handle blueprint file upload
    const handleBlueprintUpload = async (event) => {
      const file = event.target.files[0];
      if (!file) return;

      // Validate file
      if (!validateFile(file)) return;

      form.blueprintFile = file;
      uploadStatus.value = "uploading";

      try {
        const result = await uploadFile(file, "blueprint");
        form.blueprintFileId = result.fileId;
        uploadStatus.value = "success";
      } catch (error) {
        uploadStatus.value = "error";
        form.blueprintFile = null;
        console.error("Blueprint upload failed:", error);
        alert("Blueprint upload failed. Please try again or contact support.");
      }
    };

    const sendContact = async () => {
      try {
        // Validate math answer first
        if (parseInt(mathAnswer.value) !== correctAnswer.value) {
          alert("Please solve the math problem correctly to verify you are human.");
          return;
        }

        isSubmitting.value = true;
        errorMessage.value = "";
        Object.keys(validationErrors).forEach((key) => {
          delete validationErrors[key];
        });

        // Prepare form data for file upload
        const formData = new FormData();
        Object.keys(form).forEach((key) => {
          formData.append(key, form[key]);
        });

        // Add math answer to form data
        formData.append("mathAnswer", mathAnswer.value);

        const response = await axios.post("/api/contact", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        });

        if (response.status === 200) {
          showConfirmationScreen.value = true;
        }
      } catch (error) {
        if (error.response && error.response.status === 422) {
          const errors = error.response.data.errors;
          Object.keys(errors).forEach((field) => {
            validationErrors[field] = errors[field];
          });
        } else {
          errorMessage.value =
            error.response?.data?.message ||
            "An error occurred while sending your message. Please try again.";
        }
      } finally {
        isSubmitting.value = false;
      }
    };

    return {
      isOpen,
      isSubmitting,
      showConfirmationScreen,
      errorMessage,
      validationErrors,
      uploadStatus,
      form,
      mathProblem,
      mathAnswer,
      correctAnswer,
      openModal,
      closeModal,
      closeFromConfirmation,
      sendContact,
      openApplicationModal,
      handleBlueprintUpload,
      generateMathProblem,
    };
  },
};
</script>

<style scoped>
/* Optional: Add any additional styles here */
</style>
