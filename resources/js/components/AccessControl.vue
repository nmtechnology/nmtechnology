<template>
    <main
      class="pt-[60px] pb-24 flex-grow relative z-20 bg-gradient-to-b from-black via-gray-900 to-gray-900"
    >
      <!-- Decorative Background Blurs -->
      <div
        class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-gradient-to-br from-orange-500/10 to-amber-500/5 rounded-full blur-3xl -z-10"
        aria-hidden="true"
      ></div>
      <div
        class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-gradient-to-tl from-amber-500/10 to-orange-500/10 rounded-full blur-3xl -z-10"
        aria-hidden="true"
      ></div>

      <!-- Hero -->
      <section class="relative">
        <div class="mx-auto max-w-7xl px-6 pt-12 sm:pt-16 lg:px-8 lg:pt-20">
          <div class="flex justify-center mb-6">
            <div
              class="inline-flex items-center gap-2 px-4 py-2 bg-orange-500/10 border border-orange-500/20 rounded-full backdrop-blur-sm"
            >
              <svg class="w-4 h-4 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                  clip-rule="evenodd"
                />
              </svg>
              <span class="text-sm font-semibold text-orange-400">Access Control Systems & Solutions</span>
            </div>
          </div>

          <h1 class="text-4xl sm:text-5xl font-extrabold text-center mb-6">
            <span class="text-white">Control Access With </span>
            <span
              class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-400"
              >Smart Access Control Solutions</span
            >
          </h1>

          <!-- Card Reader Image with Orange Glow -->
          <div class="flex justify-center mb-8">
            <div class="relative">
              <!-- Orange glow effect behind the image -->
              <div class="absolute inset-0 bg-orange-400/30 blur-3xl rounded-full scale-110" aria-hidden="true"></div>
              <!-- Image -->
              <img
                :src="cardReaderImg"
                alt="Access Control Card Reader"
                class="relative w-48 h-48 sm:w-64 sm:h-64 object-contain animate-fadeIn"
              />
            </div>
          </div>

          <p class="text-gray-300 text-lg text-center max-w-4xl mx-auto leading-relaxed animate-fadeIn">
            Professional access control system design, installation, and management across New Mexico. 
            We implement secure entry solutions for commercial facilities — from card readers and keypads 
            to complete multi-door systems with centralized management and audit trails.
          </p>

          <div class="mt-10 flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-4">
            <button
              type="button"
              @click="contactUs"
              class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-500 hover:to-orange-400 text-white rounded-lg font-semibold shadow-lg shadow-orange-500/30 transition-all duration-300 transform hover:scale-105"
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
              class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-700/50 text-orange-400 ring-1 ring-inset ring-orange-600/50 hover:bg-gray-700 hover:ring-orange-500 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105"
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
            <div class="rounded-2xl border border-orange-500/20 bg-gray-900/40 p-5 ring-1 ring-orange-500/10">
              <p class="text-sm font-semibold text-orange-400">Secure facilities</p>
              <p class="mt-2 text-sm text-gray-300">Control who enters your building with smart credentials and tracking.</p>
            </div>
            <div class="rounded-2xl border border-orange-500/20 bg-gray-900/40 p-5 ring-1 ring-orange-500/10">
              <p class="text-sm font-semibold text-orange-400">Audit & compliance</p>
              <p class="mt-2 text-sm text-gray-300">Complete entry logs and reports for security and compliance needs.</p>
            </div>
            <div class="rounded-2xl border border-orange-500/20 bg-gray-900/40 p-5 ring-1 ring-orange-500/10">
              <p class="text-sm font-semibold text-orange-400">Flexible management</p>
              <p class="mt-2 text-sm text-gray-300">Add users, adjust schedules, and manage permissions from anywhere.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Services -->
      <section class="mt-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="max-w-3xl">
            <h2 class="text-2xl sm:text-3xl font-bold text-white">
              Access control solutions for secure facilities
            </h2>
            <p class="mt-3 text-gray-300">
              From single-door installations to enterprise multi-site systems, we design and deploy 
              access control solutions that protect your facility and provide accountability.
            </p>
          </div>

          <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div
              v-for="service in services"
              :key="service.title"
              class="rounded-2xl bg-gradient-to-br from-gray-800 to-gray-900 border border-orange-500/20 ring-1 ring-orange-500/10 p-6 shadow-xl"
            >
              <div class="flex items-start gap-3">
                <div
                  class="mt-1 flex h-10 w-10 items-center justify-center rounded-xl bg-orange-500/10 border border-orange-500/20"
                >
                  <svg class="h-5 w-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"
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
                  <svg class="mt-0.5 h-4 w-4 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
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
          <div class="rounded-3xl border border-orange-500/20 bg-gray-900/40 ring-1 ring-orange-500/10 p-8 sm:p-10">
            <div class="max-w-3xl">
              <h2 class="text-2xl sm:text-3xl font-bold text-white">How we deliver secure access control systems</h2>
              <p class="mt-3 text-gray-300">
                A comprehensive approach from security assessment to system deployment — we design access control 
                that fits your facility's security needs and operational workflow.
              </p>
            </div>

            <div class="mt-8 grid gap-6 lg:grid-cols-4">
              <div v-for="step in steps" :key="step.title" class="rounded-2xl bg-gray-900/30 border border-orange-500/10 p-6">
                <p class="text-sm font-semibold text-orange-400">{{ step.kicker }}</p>
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
            class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-gray-900 via-gray-900 to-gray-800 border border-orange-500/20 ring-1 ring-orange-500/10 p-8 sm:p-10"
          >
            <div
              class="absolute -top-20 -right-20 h-72 w-72 rounded-full bg-gradient-to-br from-orange-500/15 to-amber-500/10 blur-3xl"
              aria-hidden="true"
            ></div>
            <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
              <div class="max-w-2xl">
                <h3 class="text-2xl font-bold text-white">Need to secure your facility with access control?</h3>
                <p class="mt-3 text-gray-300">
                  From new installations to system upgrades and expansions — we design and implement 
                  access control solutions that protect your people and assets.
                </p>
              </div>
              <div class="flex flex-col sm:flex-row gap-4">
                <button
                  type="button"
                  @click="contactUs"
                  class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-500 hover:to-orange-400 text-white rounded-lg font-semibold shadow-lg shadow-orange-500/30 transition-all duration-300"
                >
                  Contact Us
                </button>
                <button
                  type="button"
                  @click="getQuote"
                  class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-700/50 text-orange-400 ring-1 ring-inset ring-orange-600/50 hover:bg-gray-700 hover:ring-orange-500 rounded-lg font-semibold transition-all duration-300"
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
  
  const cardReaderImg = '/images/card-reader-iso.webp';

  const router = useRouter();
  const openContactModal = inject("openContactModal", null);

  const contactUs = () => {
    if (typeof openContactModal === "function") {
      openContactModal();
      return;
    }
    // Fallback to direct navigation if modal not available
    window.location.href = '/#contact';
  };

  const getQuote = () => {
    router.push("/products");
  };

  const services = [
    {
      title: "Card access systems",
      description:
        "Install proximity card readers, key fob systems, and credential management for secure, keyless entry — perfect for offices, warehouses, and multi-tenant buildings.",
      highlights: [
        "Proximity and smart card readers",
        "Key fobs and mobile credentials",
        "Multi-door controller systems",
      ],
    },
    {
      title: "Biometric access control",
      description:
        "Fingerprint and facial recognition systems for high-security areas where traditional credentials aren't enough — eliminate credential sharing and lost cards.",
      highlights: [
        "Fingerprint scanners and readers",
        "Facial recognition systems",
        "Multi-factor authentication options",
      ],
    },
    {
      title: "Keypad & PIN entry systems",
      description:
        "Simple code-based entry systems for areas where cards aren't practical — gates, secure rooms, and employee-only zones with easy code management.",
      highlights: [
        "Weatherproof outdoor keypads",
        "Temporary and scheduled PIN codes",
        "Integration with existing systems",
      ],
    },
    {
      title: "Intercom & video entry",
      description:
        "Video intercoms and door stations that let you see and speak with visitors before granting access — ideal for lobbies, gates, and multi-tenant facilities.",
      highlights: [
        "Video intercom stations",
        "Remote unlock from mobile devices",
        "Integration with access control panels",
      ],
    },
    {
      title: "Electric locks & hardware",
      description:
        "Maglocks, electric strikes, and motorized locks properly installed and integrated with your access control system for reliable physical security.",
      highlights: [
        "Magnetic locks and electric strikes",
        "Fail-safe and fail-secure options",
        "Request-to-exit sensors and buttons",
      ],
    },
    {
      title: "System management & reporting",
      description:
        "Cloud-based or on-premise access control software with real-time monitoring, entry logs, and user management — see who entered where and when.",
      highlights: [
        "Centralized user and credential management",
        "Entry logs and audit reports",
        "Alerts for unauthorized access attempts",
      ],
    },
  ];

  const steps = [
    {
      kicker: "Step 1",
      title: "Security assessment",
      description: "We evaluate your facility layout, security needs, and access patterns to design the right solution.",
    },
    {
      kicker: "Step 2",
      title: "System design & planning",
      description: "Create detailed plans for reader placement, lock hardware, controller locations, and network integration.",
    },
    {
      kicker: "Step 3",
      title: "Installation & integration",
      description: "Professional installation of readers, locks, controllers, and software with proper wiring and configuration.",
    },
    {
      kicker: "Step 4",
      title: "Training & support",
      description: "User training on system management, credential provisioning, and ongoing support for updates and expansions.",
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
