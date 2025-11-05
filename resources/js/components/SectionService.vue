<template>
  <div
    class="relative bg-gradient-to-b from-gray-900 via-black to-gray-900 py-16 sm:py-24 overflow-hidden"
  >
    <!-- Decorative Background Blurs -->
    <div
      class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-gradient-to-br from-green-500/10 to-lime-500/10 rounded-full blur-3xl -z-10"
      aria-hidden="true"
    ></div>
    <div
      class="absolute bottom-0 right-0 translate-y-1/2 translate-x-1/2 w-[600px] h-[600px] bg-gradient-to-tl from-lime-500/10 to-green-500/5 rounded-full blur-3xl -z-10"
      aria-hidden="true"
    ></div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
      <!-- Logo Header with Glass Effect -->
      <div
        class="flex items-center justify-center mb-12 bg-gray-800/30 backdrop-blur-sm rounded-2xl border border-green-500/20 py-4 px-6 w-fit mx-auto shadow-lg"
      >
        <img
          class="h-12 w-auto"
          src="/public/images/nm-logo-rmbg.webp"
          alt="nmtechnology-logo"
        />
        <span class="text-xl italic font-extrabold text-white -ml-3">Technology</span>
      </div>

      <!-- Main Content Card -->
      <div class="mx-auto max-w-4xl text-center mt-16">
        <div
          class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-lime-500/10 to-green-500/10 backdrop-blur-sm border border-lime-500/30 rounded-full mb-6 shadow-lg"
        >
          <svg class="w-5 h-5 text-lime-400" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
              clip-rule="evenodd"
            />
          </svg>
          <span class="text-sm font-semibold text-lime-400"
            >Installation & Service Excellence</span
          >
        </div>

        <h2
          class="text-center text-4xl sm:text-5xl font-bold drop-shadow-lg animate-fadeIn mb-6 text-white"
        >
          Complete
          <span
            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
            >Security & Infrastructure</span
          ><span
            class="text-transparent bg-clip-text bg-gradient-to-r from-green-100 to-white/30"
          >
            Solutions</span
          >
        </h2>

        <p class="text-xl text-gray-300 leading-relaxed mb-12 max-w-3xl mx-auto">
          Expert installation and service of CCTV, security systems, fire alarms, access
          control, and structured cabling. Available 24/7 to serve your needs across New
          Mexico.
        </p>
      </div>

      <!-- Why Choose Section with Glass Card -->
      <div
        class="bg-gray-800/40 backdrop-blur-md rounded-2xl border border-green-500/20 p-8 sm:p-12 shadow-2xl mt-16"
      >
        <h2
          class="text-center text-4xl sm:text-5xl font-bold drop-shadow-lg animate-fadeIn mb-6 text-white"
        >
          Why Choose
          <span
            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
            >NM Technology?</span
          >
        </h2>
        <p
          class="text-lg text-gray-300 text-center mb-10 animate-fadeIn-delay leading-relaxed"
        >
          We handle the complete installation and ongoing service of
          <strong class="text-green-400"
            >CCTV surveillance systems, security systems, fire alarm systems, access
            control, and structured cabling</strong
          >
          throughout New Mexico. Our certified technicians work directly with national
          contractors to provide top-notch service every time.<br /><br />
          For companies outside New Mexico with customers here, we provide professional
          onsite representation—servicing your clients' needs on your behalf with the same
          dedication and expertise. Partner with us for reliable, professional service you
          can trust.
        </p>

        <!-- Partner Logos -->
        <div
          class="flex flex-wrap justify-center items-center gap-10 mt-12 pt-8 border-t border-green-600/20"
        >
          <img
            src="/public/images/ubiquity-logo.webp"
            class="h-14 object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
            alt="Ubiquity"
          />
          <img
            src="/public/images/linovision-logo.webp"
            class="h-14 object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
            alt="Linovision"
          />
          <img
            src="/public/images/zwave-logo.webp"
            class="h-14 object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
            alt="ZWave"
          />
          <img
            src="/public/images/allegion-logo.webp"
            class="h-14 object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
            alt="Allegion"
          />
          <img
            src="/public/images/teltonika-logo.webp"
            class="h-14 object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
            alt="Teltonika"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup></script>

<style scoped>
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(30px) scale(0.95);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}
@keyframes fadeIn-delay {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.animate-fadeIn {
  animation: fadeIn 1.2s ease-out;
}
.animate-fadeIn-delay {
  animation: fadeIn-delay 1.4s ease-out 0.3s forwards;
  opacity: 0;
}
</style>
