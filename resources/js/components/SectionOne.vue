<template>
  <section
    class="z-40 relative isolate overflow-hidden py-24 sm:py-32 bg-gradient-to-b from-black via-gray-900 to-gray-900"
  >
    <!-- Decorative Background Blurs -->
    <div
      class="absolute top-0 left-0 -translate-y-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-gradient-to-br from-green-500/10 to-lime-500/5 rounded-full blur-3xl"
      aria-hidden="true"
    ></div>
    <div
      class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-gradient-to-tl from-lime-500/10 to-green-500/10 rounded-full blur-3xl"
      aria-hidden="true"
    ></div>

    <img
      src="/public/images/spaceman.webp"
      alt="spaceman-image"
      class="absolute inset-0 h-full w-full object-cover opacity-20 animate-fadeIn"
    />

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
      <div class="text-center max-w-5xl mx-auto">
        <!-- Badge -->
        <div
          class="inline-flex items-center gap-2 px-4 py-2 bg-green-500/10 border border-green-500/20 rounded-full mb-6 backdrop-blur-sm"
        >
          <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
              clip-rule="evenodd"
            />
          </svg>
          <span class="text-sm font-semibold text-green-400"
            >Professional Excellence</span
          >
        </div>

        <h2 class="text-4xl sm:text-5xl font-bold mb-6 animate-fadeIn">
          <span class="text-white">Professional</span>
          <span
            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
          >
            Installation & Service</span
          >
        </h2>
        <p
          class="text-xl sm:text-2xl font-semibold mb-6 animate-fadeIn-delay text-transparent bg-clip-text bg-gradient-to-r from-green-300 to-lime-300"
        >
          New Mexico's Premier Security Systems Provider
        </p>
        <p
          class="text-lg text-gray-300 mb-12 leading-relaxed animate-fadeIn-delay-2 max-w-4xl mx-auto"
        >
          NM Technology specializes in the installation and service of CCTV surveillance
          systems, security systems, fire alarm systems, access control, and structured
          cabling across New Mexico. We partner with national contractors to deliver
          top-notch service every time, and provide professional onsite representation for
          companies outside New Mexico who have customers here—servicing their needs on
          their behalf with the same commitment to excellence.
        </p>

        <!-- Service Cards with Pricing-style -->
        <div class="grid sm:grid-cols-3 gap-6 mt-12 text-left">
          <div
            class="bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-sm p-6 rounded-2xl border border-green-500/20 hover:border-green-500/40 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl hover:shadow-green-500/10 group"
          >
            <div
              class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center mb-4 group-hover:bg-green-500/30 transition-colors"
            >
              <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                <path
                  fill-rule="evenodd"
                  d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                  clip-rule="evenodd"
                />
              </svg>
            </div>
            <h3 class="text-lg font-bold text-white mb-2">CCTV & Security Systems</h3>
            <p class="text-sm text-gray-300 leading-relaxed">
              Expert installation and maintenance of surveillance and security systems for
              complete property protection
            </p>
          </div>
          <div
            class="bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-sm p-6 rounded-2xl border border-green-500/20 hover:border-green-500/40 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl hover:shadow-green-500/10 ring-2 ring-green-500 shadow-2xl shadow-green-500/20 relative group"
          >
            <div
              class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 bg-gradient-to-r from-green-500 to-lime-500 text-white text-xs font-bold rounded-full shadow-lg"
            >
              MOST POPULAR
            </div>
            <div
              class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center mb-4 group-hover:bg-green-500/30 transition-colors"
            >
              <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                  clip-rule="evenodd"
                />
              </svg>
            </div>
            <h3 class="text-lg font-bold text-white mb-2">
              Fire Alarms & Access Control
            </h3>
            <p class="text-sm text-gray-300 leading-relaxed">
              Professional fire alarm installation and access control systems to keep your
              property safe and code-compliant
            </p>
          </div>
          <div
            class="bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-sm p-6 rounded-2xl border border-green-500/20 hover:border-green-500/40 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl hover:shadow-green-500/10 group"
          >
            <div
              class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center mb-4 group-hover:bg-green-500/30 transition-colors"
            >
              <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z"
                  clip-rule="evenodd"
                />
              </svg>
            </div>
            <h3 class="text-lg font-bold text-white mb-2">
              Structured Cabling & Onsite Rep
            </h3>
            <p class="text-sm text-gray-300 leading-relaxed">
              Network infrastructure installation plus professional onsite representation
              for out-of-state contractors
            </p>
          </div>
        </div>
      </div>
      <!-- Stats Section -->
      <dl
        class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-6 sm:grid-cols-2 lg:max-w-none lg:grid-cols-4"
      >
        <div
          v-for="stat in stats"
          :key="stat.id"
          class="bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-sm p-6 rounded-2xl border border-green-500/20 hover:border-green-500/40 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl hover:shadow-green-500/10"
        >
          <dt class="text-sm leading-6 text-gray-400 mb-2">{{ stat.name }}</dt>
          <dd
            class="text-4xl font-bold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
          >
            {{ stat.value }}
          </dd>
        </div>
      </dl>
    </div>
  </section>
</template>

<script setup>
const stats = [
  { id: 1, name: "Work Orders Completed", value: "3,000+" },
  { id: 2, name: "Satisfaction Rate", value: "97%" },
  { id: 3, name: "Safety Efficiency", value: "100%" },
  { id: 4, name: "Customer Revenue Saved", value: "$309,003+" },
];
</script>

<style scoped>
.animate-fadeIn {
  animation: fadeIn 1.2s ease-out;
}
.animate-fadeIn-delay {
  animation: fadeIn 1.4s ease-out 0.2s forwards;
  opacity: 0;
}
.animate-fadeIn-delay-2 {
  animation: fadeIn 1.6s ease-out 0.4s forwards;
  opacity: 0;
}
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
