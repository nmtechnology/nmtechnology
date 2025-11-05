<template>
  <div
    class="relative bg-gradient-to-b from-gray-900 via-gray-900 to-black py-24 sm:py-32 overflow-hidden"
  >
    <!-- Decorative gradient blob -->
    <div
      class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-[600px] h-[600px] bg-gradient-to-br from-green-500/10 to-lime-500/5 rounded-full blur-3xl"
      aria-hidden="true"
    ></div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
      <!-- Header Section -->
      <div class="text-center mb-16">
        <h2 class="text-4xl sm:text-5xl font-bold text-white mb-6">
          Trusted by
          <span
            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
            >Industry Leaders</span
          >
        </h2>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">
          We work with national contractors and businesses across New Mexico, providing professional installation, service, and onsite representation for all your security infrastructure needs.
        </p>
      </div>

      <div class="grid grid-cols-1 items-start gap-x-12 gap-y-16 lg:grid-cols-2">
        <!-- Left Column - Main Content -->
        <div class="mx-auto w-full max-w-xl lg:mx-0">
          <div
            class="bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-sm p-8 rounded-2xl border border-green-500/20 shadow-2xl ring-2 ring-green-500 shadow-green-500/20 relative"
          >
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 bg-gradient-to-r from-green-500 to-lime-500 text-white text-xs font-bold rounded-full shadow-lg">
              SERVICE EXCELLENCE
            </div>
            <h3 class="text-2xl font-bold mb-4">
              <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400">
                Complete Installation & Service Excellence
              </span>
            </h3>
            <p class="text-lg text-gray-300 leading-relaxed mb-6">
              Our certified technicians handle installation and ongoing service for CCTV surveillance systems, security systems, fire alarm systems, access control, and structured cabling. We respond within 24 hours and work directly with national contractors to deliver top-notch service every time—keeping your critical security infrastructure operational.
            </p>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
              <button
                @click="openContactModal"
                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 text-white rounded-lg font-semibold shadow-lg shadow-green-500/30 transition-all duration-300 transform hover:scale-105"
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
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                  />
                </svg>
                Contact Us
              </button>
              <a
                href="#"
                class="inline-flex items-center gap-2 text-green-400 hover:text-green-300 font-semibold transition-colors duration-300 group"
              >
                Learn more
                <svg
                  class="w-5 h-5 group-hover:translate-x-1 transition-transform"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 8l4 4m0 0l-4 4m4-4H3"
                  />
                </svg>
              </a>
            </div>
          </div>
        </div>

        <!-- Right Column - Partner Logos -->
        <div class="mx-auto w-full max-w-xl lg:mx-0">
          <div
            class="bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-sm p-8 rounded-2xl border border-green-500/20"
          >
            <p class="text-sm font-semibold text-green-400 mb-6 text-center">
              TRUSTED PARTNERS
            </p>
            <div class="grid grid-cols-2 gap-8 items-center">
              <img
                class="max-h-12 w-full object-contain grayscale hover:grayscale-0 opacity-70 hover:opacity-100 transition-all duration-300"
                src="https://tailwindui.com/plus/img/logos/tuple-logo-white.svg"
                alt="Tuple"
                width="105"
                height="48"
              />
              <img
                class="max-h-12 w-full object-contain grayscale hover:grayscale-0 opacity-70 hover:opacity-100 transition-all duration-300"
                src="https://tailwindui.com/plus/img/logos/reform-logo-white.svg"
                alt="Reform"
                width="104"
                height="48"
              />
              <img
                class="max-h-12 w-full object-contain grayscale hover:grayscale-0 opacity-70 hover:opacity-100 transition-all duration-300"
                src="https://tailwindui.com/plus/img/logos/savvycal-logo-white.svg"
                alt="SavvyCal"
                width="140"
                height="48"
              />
              <img
                class="max-h-12 w-full object-contain grayscale hover:grayscale-0 opacity-70 hover:opacity-100 transition-all duration-300"
                src="https://tailwindui.com/plus/img/logos/laravel-logo-white.svg"
                alt="Laravel"
                width="136"
                height="48"
              />
              <img
                class="max-h-12 w-full object-contain grayscale hover:grayscale-0 opacity-70 hover:opacity-100 transition-all duration-300"
                src="https://tailwindui.com/plus/img/logos/transistor-logo-white.svg"
                alt="Transistor"
                width="158"
                height="48"
              />
              <img
                class="max-h-12 w-full object-contain grayscale hover:grayscale-0 opacity-70 hover:opacity-100 transition-all duration-300"
                src="https://tailwindui.com/plus/img/logos/statamic-logo-white.svg"
                alt="Statamic"
                width="147"
                height="48"
              />
            </div>
          </div>
        </div>
      </div>

      <!-- Features Section -->
      <div class="mt-24">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
          <div
            v-for="(feature, index) in features"
            :key="feature.name"
            :class="[
              index === 1 ? 'ring-2 ring-green-500 shadow-2xl shadow-green-500/20 relative' : '',
              'group bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-sm p-8 rounded-2xl border border-green-500/20 hover:border-green-500/40 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl hover:shadow-green-500/10'
            ]"
          >
            <div v-if="index === 1" class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 bg-gradient-to-r from-green-500 to-lime-500 text-white text-xs font-bold rounded-full shadow-lg">
              FEATURED
            </div>
            <div class="flex items-center gap-4 mb-4">
              <div
                class="flex-shrink-0 w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center group-hover:bg-green-500/30 transition-colors"
              >
                <component
                  :is="feature.icon"
                  class="h-6 w-6 text-white"
                  aria-hidden="true"
                />
              </div>
              <h3 class="text-lg font-bold text-white">{{ feature.name }}</h3>
            </div>
            <p class="text-gray-300 leading-relaxed">{{ feature.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ArrowPathIcon, CloudArrowUpIcon, LockClosedIcon } from "@heroicons/vue/20/solid";
import { inject } from "vue";

// Inject the contact modal function from the parent component
const openContactModal = inject("openContactModal", () => {
  // If not provided, try to find ContactModal in the parent component
  const parentApp = document.querySelector("#app").__vue_app__;
  if (parentApp && parentApp._context) {
    // Try to find any ContactModal component and call its open method
    const contactModal = document.querySelector("#contactModal");
    if (contactModal && contactModal.__vueParentComponent) {
      contactModal.__vueParentComponent.proxy.openModalFromOptions();
    } else {
      // Fallback to scrolling to the footer contact form
      document.querySelector("footer")?.scrollIntoView({ behavior: "smooth" });
    }
  }
});

const features = [
  {
    name: "Professional Onsite Representation",
    description:
      "For companies outside New Mexico with customers here, we provide professional onsite representation—servicing your clients on your behalf with the same dedication and expertise you'd expect from your own team.",
    href: "#",
    icon: CloudArrowUpIcon,
  },
  {
    name: "National Contractor Partnerships",
    description:
      "We work directly with national contractors to provide top-notch installation and service for CCTV, security systems, fire alarms, access control, and structured cabling—delivering excellence on every project.",
    href: "#",
    icon: LockClosedIcon,
  },
  {
    name: "24/7 Emergency Service",
    description:
      "Our certified technicians are available around the clock to handle installations, repairs, and maintenance. We respond within 24 hours to keep your critical security infrastructure operational.",
    href: "#",
    icon: ArrowPathIcon,
  },
];
</script>
