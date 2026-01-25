<template>
    <main
      class="pt-[60px] pb-24 flex-grow relative z-20 bg-gradient-to-b from-black via-gray-900 to-gray-900"
    >
      <!-- Decorative Background Blurs -->
      <div
        class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-gradient-to-br from-blue-500/10 to-cyan-500/5 rounded-full blur-3xl -z-10"
        aria-hidden="true"
      ></div>
      <div
        class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-gradient-to-tl from-cyan-500/10 to-blue-500/10 rounded-full blur-3xl -z-10"
        aria-hidden="true"
      ></div>

      <!-- Hero -->
      <section class="relative">
        <div class="mx-auto max-w-7xl px-6 pt-12 sm:pt-16 lg:px-8 lg:pt-20">
          <div class="flex justify-center mb-6">
            <div
              class="inline-flex items-center gap-2 px-4 py-2 bg-blue-500/10 border border-blue-500/20 rounded-full backdrop-blur-sm"
            >
              <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z"
                  clip-rule="evenodd"
                />
              </svg>
              <span class="text-sm font-semibold text-blue-400">Video Surveillance & CCTV</span>
            </div>
          </div>

          <h1 class="text-4xl sm:text-5xl font-extrabold text-center mb-6">
            <span class="text-white">See Everything, </span>
            <span
              class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400"
              >Anywhere, Anytime</span
            >
          </h1>

          <!-- NMTech Bot Image with Blue Glow -->
          <div class="flex justify-center mb-8">
            <div class="relative">
              <!-- Blue glow effect behind the image -->
              <div class="absolute inset-0 bg-blue-400/30 blur-3xl rounded-full scale-110" aria-hidden="true"></div>
              <!-- Image -->
              <img
                src="/public/images/nmtech-bot.webp"
                alt="NM Technology Bot"
                class="relative w-48 h-48 sm:w-64 sm:h-64 object-contain animate-fadeIn"
              />
            </div>
          </div>

          <p class="text-gray-300 text-lg text-center max-w-4xl mx-auto leading-relaxed animate-fadeIn">
            Professional CCTV installation and surveillance solutions for your home or business. 
            From IP cameras to full NVR systems, we deliver crystal-clear footage with remote access — 
            designed for New Mexico's unique environment and built to last.
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
              Build Quote
            </button>
          </div>

          <div class="mt-12 grid gap-4 sm:grid-cols-3 max-w-5xl mx-auto">
            <div class="rounded-2xl border border-blue-500/20 bg-gray-900/40 p-5 ring-1 ring-blue-500/10">
              <p class="text-sm font-semibold text-blue-400">HD & 4K clarity</p>
              <p class="mt-2 text-sm text-gray-300">Crisp footage day and night with smart analytics and motion detection.</p>
            </div>
            <div class="rounded-2xl border border-blue-500/20 bg-gray-900/40 p-5 ring-1 ring-blue-500/10">
              <p class="text-sm font-semibold text-blue-400">Remote access</p>
              <p class="mt-2 text-sm text-gray-300">View your cameras from anywhere with mobile and web access.</p>
            </div>
            <div class="rounded-2xl border border-blue-500/20 bg-gray-900/40 p-5 ring-1 ring-blue-500/10">
              <p class="text-sm font-semibold text-blue-400">Full support</p>
              <p class="mt-2 text-sm text-gray-300">Installation, service, and ongoing maintenance for worry-free operation.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Services -->
      <section class="mt-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="max-w-3xl">
            <h2 class="text-2xl sm:text-3xl font-bold text-white">
              Video surveillance solutions for every need
            </h2>
            <p class="mt-3 text-gray-300">
              From single-camera setups to enterprise-wide systems, we design, install, and maintain
              surveillance solutions that capture what matters — 24/7 recording, smart alerts, and seamless playback.
            </p>
          </div>

          <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div
              v-for="service in services"
              :key="service.title"
              class="rounded-2xl bg-gradient-to-br from-gray-800 to-gray-900 border border-blue-500/20 ring-1 ring-blue-500/10 p-6 shadow-xl"
            >
              <div class="flex items-start gap-3">
                <div
                  class="mt-1 flex h-10 w-10 items-center justify-center rounded-xl bg-blue-500/10 border border-blue-500/20"
                >
                  <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
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
                  <svg class="mt-0.5 h-4 w-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
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
          <div class="rounded-3xl border border-blue-500/20 bg-gray-900/40 ring-1 ring-blue-500/10 p-8 sm:p-10">
            <div class="max-w-3xl">
              <h2 class="text-2xl sm:text-3xl font-bold text-white">How we deliver reliable video surveillance</h2>
              <p class="mt-3 text-gray-300">
                A straightforward process, clear expectations, and professional installation — so you have
                eyes on what matters, with footage you can trust.
              </p>
            </div>

            <div class="mt-8 grid gap-6 lg:grid-cols-4">
              <div v-for="step in steps" :key="step.title" class="rounded-2xl bg-gray-900/30 border border-blue-500/10 p-6">
                <p class="text-sm font-semibold text-blue-400">{{ step.kicker }}</p>
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
            class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-gray-900 via-gray-900 to-gray-800 border border-blue-500/20 ring-1 ring-blue-500/10 p-8 sm:p-10"
          >
            <div
              class="absolute -top-20 -right-20 h-72 w-72 rounded-full bg-gradient-to-br from-blue-500/15 to-cyan-500/10 blur-3xl"
              aria-hidden="true"
            ></div>
            <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
              <div class="max-w-2xl">
                <h3 class="text-2xl font-bold text-white">Ready to schedule an install or service call?</h3>
                <p class="mt-3 text-gray-300">
                  Tell us what you have (or what you want), and we’ll recommend the best next step.
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
                  Build Quote
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </template>

  <script setup>
  import { inject, onMounted, ref } from "vue";
  import { useRouter } from "vue-router";
  import { useAISEO } from "../composables/useAISEO";
  import RelatedProducts from "./RelatedProducts.vue";

  const router = useRouter();
  const selectedProduct = ref(null);
  const productDetailsOpen = ref(false);
  const { setCCTVPageSEO } = useAISEO();

  // Set AI-optimized SEO on page load
  onMounted(() => {
    setCCTVPageSEO();
  });

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

  const handleProductClick = (product) => {
    // Navigate to products page with the product selected
    router.push({ 
      path: '/products',
      query: { productId: product.id }
    });
  };

  const services = [
    {
      title: "New CCTV installations",
      description:
        "Design and install complete video surveillance systems — from single cameras to multi-site networks. IP cameras, NVRs, PoE switches, and remote viewing.",
      highlights: [
        "HD, 4K, and PTZ camera options",
        "Network video recorders with storage planning",
        "Mobile app setup for remote viewing",
      ],
    },
    {
      title: "Camera upgrades & expansions",
      description:
        "Add cameras to existing systems or upgrade outdated analog setups to modern IP-based surveillance with better resolution and features.",
      highlights: [
        "Analog-to-IP migration",
        "Expand coverage areas",
        "Integrate with existing infrastructure",
      ],
    },
    {
      title: "Service & troubleshooting",
      description:
        "Camera down? Blurry footage? Connection issues? We diagnose and fix problems quickly — camera replacements, network tweaks, and storage fixes.",
      highlights: [
        "Camera repairs and replacements",
        "Network and connectivity troubleshooting",
        "Storage and playback issues",
      ],
    },
    {
      title: "Commercial surveillance systems",
      description:
        "Multi-location businesses, retail, warehouses, and offices — scalable systems with centralized management and analytics.",
      highlights: [
        "Enterprise-grade NVR platforms",
        "License plate recognition (LPR)",
        "Video analytics and alerts",
      ],
    },
    {
      title: "Remote monitoring setup",
      description:
        "Access your cameras from anywhere. We configure mobile apps, web portals, and secure remote access so you're always connected.",
      highlights: [
        "Mobile app configuration (iOS/Android)",
        "Cloud and local recording options",
        "Secure VPN access",
      ],
    },
    {
      title: "Integration & automation",
      description:
        "Connect your CCTV system with access control, alarms, and smart building automation for unified security management.",
      highlights: [
        "Alarm-triggered recording",
        "Access control integration",
        "Smart home and automation compatibility",
      ],
    },
  ];

  const steps = [
    {
      kicker: "Step 1",
      title: "Site survey & requirements",
      description: "We walk your property, identify coverage needs, and discuss camera placement, blind spots, and recording goals.",
    },
    {
      kicker: "Step 2",
      title: "Design & equipment selection",
      description: "We design a system with the right cameras, NVR, and network setup — optimized for your environment and budget.",
    },
    {
      kicker: "Step 3",
      title: "Installation & configuration",
      description: "Professional installation with clean cable runs, secure mounting, and full system configuration including remote access.",
    },
    {
      kicker: "Step 4",
      title: "Training & ongoing support",
      description: "We show you how to use your system and stay available for service, expansions, and future upgrades.",
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
