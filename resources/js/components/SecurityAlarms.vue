<template>
    <main
      class="pt-[60px] pb-24 flex-grow relative z-20 bg-gradient-to-b from-black via-gray-900 to-gray-900"
    >
      <!-- Decorative Background Blurs -->
      <div
        class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-gradient-to-br from-green-500/10 to-lime-500/5 rounded-full blur-3xl -z-10"
        aria-hidden="true"
      ></div>
      <div
        class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-gradient-to-tl from-lime-500/10 to-green-500/10 rounded-full blur-3xl -z-10"
        aria-hidden="true"
      ></div>

      <!-- Hero -->
      <section class="relative">
        <div class="mx-auto max-w-7xl px-6 pt-12 sm:pt-16 lg:px-8 lg:pt-20">
          <div class="flex justify-center mb-6">
            <div
              class="inline-flex items-center gap-2 px-4 py-2 bg-green-500/10 border border-green-500/20 rounded-full backdrop-blur-sm"
            >
              <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                  clip-rule="evenodd"
                />
              </svg>
              <span class="text-sm font-semibold text-green-400">Security Alarm Installation & Service</span>
            </div>
          </div>

          <h1 class="text-4xl sm:text-5xl font-extrabold text-center mb-6">
            <span class="text-white">Protect What Matters With </span>
            <span
              class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
              >Professional Security Alarm Systems</span
            >
          </h1>

          <!-- Alarm Keypad Image with Green Glow -->
          <div class="flex justify-center mb-8">
            <div class="relative">
              <!-- Green glow effect behind the image -->
              <div class="absolute inset-0 bg-green-400/30 blur-3xl rounded-full scale-110" aria-hidden="true"></div>
              <!-- Image -->
              <img
                :src="alarmKeypadImg"
                alt="Security Alarm Keypad"
                class="relative w-48 h-48 sm:w-64 sm:h-64 object-contain animate-fadeIn"
              />
            </div>
          </div>

          <p class="text-gray-300 text-lg text-center max-w-4xl mx-auto leading-relaxed animate-fadeIn">
            From new installs to troubleshooting and upgrades, NM Technology designs, installs,
            and services intrusion alarm systems that fit your home or business — built clean,
            tested thoroughly, and supported after the job is done.
          </p>

          <div class="mt-10 flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-4">
            <button
              type="button"
              @click="contactUs"
              class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 text-white rounded-lg font-semibold shadow-lg shadow-green-500/30 transition-all duration-300 transform hover:scale-105"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 8a2 2 0 01-2 2H7l-4 4V6a2 2 0 012-2h14a2 2 0 012 2v2z"
                />
              </svg>
              Contact Us
            </button>

            <button
              type="button"
              @click="getQuote"
              class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-700/50 text-green-400 ring-1 ring-inset ring-green-600/50 hover:bg-gray-700 hover:ring-green-500 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                />
              </svg>
              Get Quote
            </button>
          </div>

          <div class="mt-12 grid gap-4 sm:grid-cols-3 max-w-5xl mx-auto">
            <div class="rounded-2xl border border-green-500/20 bg-gray-900/40 p-5 ring-1 ring-green-500/10">
              <p class="text-sm font-semibold text-green-400">Clean installs</p>
              <p class="mt-2 text-sm text-gray-300">Professional wiring, mounting, and labeling — no messy surprises.</p>
            </div>
            <div class="rounded-2xl border border-green-500/20 bg-gray-900/40 p-5 ring-1 ring-green-500/10">
              <p class="text-sm font-semibold text-green-400">Fast service</p>
              <p class="mt-2 text-sm text-gray-300">Diagnostics, repairs, and replacement parts to restore reliability.</p>
            </div>
            <div class="rounded-2xl border border-green-500/20 bg-gray-900/40 p-5 ring-1 ring-green-500/10">
              <p class="text-sm font-semibold text-green-400">Ongoing support</p>
              <p class="mt-2 text-sm text-gray-300">We help you keep systems maintained and ready when it counts.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Services -->
      <section class="mt-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="max-w-3xl">
            <h2 class="text-2xl sm:text-3xl font-bold text-white">
              Security alarm services that fit your building
            </h2>
            <p class="mt-3 text-gray-300">
              Whether you're starting from scratch or fixing an existing system, we'll recommend
              the right components and get everything tested end-to-end.
            </p>
          </div>

          <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div
              v-for="service in services"
              :key="service.title"
              class="rounded-2xl bg-gradient-to-br from-gray-800 to-gray-900 border border-green-500/20 ring-1 ring-green-500/10 p-6 shadow-xl"
            >
              <div class="flex items-start gap-3">
                <div
                  class="mt-1 flex h-10 w-10 items-center justify-center rounded-xl bg-green-500/10 border border-green-500/20"
                >
                  <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                    />
                  </svg>
                </div>
                <div class="flex-1">
                  <h3 class="text-white font-semibold text-lg">{{ service.title }}</h3>
                  <p class="mt-2 text-sm text-gray-300 leading-relaxed">{{ service.description }}</p>
                </div>
              </div>

              <ul class="mt-4 space-y-2">
                <li v-for="item in service.highlights" :key="item" class="flex items-start gap-2 text-sm text-gray-300">
                  <svg class="mt-0.5 h-4 w-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  <span>{{ item }}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <!-- Process -->
      <section class="mt-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="rounded-3xl border border-green-500/20 bg-gray-900/40 ring-1 ring-green-500/10 p-8 sm:p-10">
            <div class="max-w-3xl">
              <h2 class="text-2xl sm:text-3xl font-bold text-white">How we deliver reliable security alarm protection</h2>
              <p class="mt-3 text-gray-300">
                A straightforward process, clear expectations, and clean work — so you know what's installed
                and why it works.
              </p>
            </div>

            <div class="mt-8 grid gap-6 lg:grid-cols-4">
              <div v-for="step in steps" :key="step.title" class="rounded-2xl bg-gray-900/30 border border-green-500/10 p-6">
                <p class="text-sm font-semibold text-green-400">{{ step.kicker }}</p>
                <p class="mt-2 text-white font-semibold">{{ step.title }}</p>
                <p class="mt-2 text-sm text-gray-300">{{ step.description }}</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- CTA -->
      <section class="mt-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div
            class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-gray-900 via-gray-900 to-gray-800 border border-green-500/20 ring-1 ring-green-500/10 p-8 sm:p-10"
          >
            <div
              class="absolute -top-20 -right-20 h-72 w-72 rounded-full bg-gradient-to-br from-green-500/15 to-lime-500/10 blur-3xl"
              aria-hidden="true"
            ></div>
            <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
              <div class="max-w-2xl">
                <h3 class="text-2xl font-bold text-white">Ready to schedule an install or service call?</h3>
                <p class="mt-3 text-gray-300">
                  Tell us what you have (or what you want), and we'll recommend the best next step.
                </p>
              </div>
              <div class="flex flex-col sm:flex-row gap-4">
                <button
                  type="button"
                  @click="contactUs"
                  class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 text-white rounded-lg font-semibold shadow-lg shadow-green-500/30 transition-all duration-300"
                >
                  Contact Us
                </button>
                <button
                  type="button"
                  @click="getQuote"
                  class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-700/50 text-green-400 ring-1 ring-inset ring-green-600/50 hover:bg-gray-700 hover:ring-green-500 rounded-lg font-semibold transition-all duration-300"
                >
                  Get Quote
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </template>

  <script setup>
  import { inject } from "vue";
  import { useRouter } from "vue-router";
  const alarmKeypadImg = '/images/alarm-keypad-iso.webp';

  const router = useRouter();
  const openContactModal = inject("openContactModal", null);

  const contactUs = () => {
    if (typeof openContactModal === "function") {
      openContactModal();
      return;
    }
    router.push("/contact");
  };

  const getQuote = () => {
    router.push("/products");
  };

  const services = [
    {
      title: "New alarm installations",
      description:
        "Design and install intrusion alarm systems for homes and businesses — sized correctly, laid out cleanly, and tested thoroughly.",
      highlights: [
        "Panel + keypad placement that makes sense",
        "Door/window contacts, motion sensors, glass-break (as needed)",
        "Siren/strobe options for clear deterrence",
      ],
    },
    {
      title: "Service, repairs & troubleshooting",
      description:
        "False alarms, dead zones, battery issues, wiring faults — we diagnose quickly and fix the root cause so your system stays dependable.",
      highlights: [
        "Sensor replacements and re-alignment",
        "Battery and power issues",
        "Wiring checks and cleanup",
      ],
    },
    {
      title: "Upgrades & takeovers",
      description:
        "Already have a system? We can modernize it — upgrade hardware, rework problem areas, and document what you have.",
      highlights: [
        "Panel/keypad upgrades",
        "Add zones / expand coverage",
        "Better reliability and usability",
      ],
    },
    {
      title: "Commercial-grade options",
      description:
        "For offices, retail, warehouses, and multi-site operations — consistent installs and scalable setups that support growth.",
      highlights: [
        "Multi-door / multi-zone layouts",
        "After-hours arming workflows",
        "Service plans available",
      ],
    },
    {
      title: "System testing & maintenance",
      description:
        "Prevent issues before they become emergencies. We verify sensors, power, and communication so your system performs when needed.",
      highlights: [
        "Inspection-style verification",
        "Sensor health checks",
        "Keep records for your team",
      ],
    },
    {
      title: "Integration-ready setups",
      description:
        "We plan installs that can grow with you — adding cameras, access control, or networking later without redoing everything.",
      highlights: [
        "Clean cable management",
        "Labeling and documentation",
        "Designed for future expansion",
      ],
    },
  ];

  const steps = [
    {
      kicker: "Step 1",
      title: "Walkthrough & requirements",
      description: "We learn your layout, risks, and how you want the system to be used day-to-day.",
    },
    {
      kicker: "Step 2",
      title: "Design & recommendations",
      description: "We map sensors and equipment for the right coverage — no wasted hardware, no blind spots.",
    },
    {
      kicker: "Step 3",
      title: "Install & verification",
      description: "We install cleanly, test every zone/device, and confirm the full system behavior.",
    },
    {
      kicker: "Step 4",
      title: "Support & service",
      description: "If something changes, we're here — adjustments, repairs, expansions, and ongoing maintenance.",
    },
  ];
  </script>

  <style scoped>
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(16px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-fadeIn {
    animation: fadeIn 0.8s ease-out;
  }
</style>
