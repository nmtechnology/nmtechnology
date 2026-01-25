<template>
    <main
      class="pt-[60px] pb-24 flex-grow relative z-20 bg-gradient-to-b from-black via-gray-900 to-gray-900"
    >
      <!-- Decorative Background Blurs -->
      <div
        class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-gradient-to-br from-purple-500/10 to-violet-500/5 rounded-full blur-3xl -z-10"
        aria-hidden="true"
      ></div>
      <div
        class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-gradient-to-tl from-violet-500/10 to-purple-500/10 rounded-full blur-3xl -z-10"
        aria-hidden="true"
      ></div>

      <!-- Hero -->
      <section class="relative">
        <div class="mx-auto max-w-7xl px-6 pt-12 sm:pt-16 lg:px-8 lg:pt-20">
          <div class="flex justify-center mb-6">
            <div
              class="inline-flex items-center gap-2 px-4 py-2 bg-purple-500/10 border border-purple-500/20 rounded-full backdrop-blur-sm"
            >
              <svg class="w-4 h-4 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"
                />
              </svg>
              <span class="text-sm font-semibold text-purple-400">Network Infrastructure & Solutions</span>
            </div>
          </div>

          <h1 class="text-4xl sm:text-5xl font-extrabold text-center mb-6">
            <span class="text-white">Build Reliable Networks With </span>
            <span
              class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-violet-400"
              >Enterprise-Grade Infrastructure</span
            >
          </h1>

          <!-- Network Image with Purple Glow -->
          <div class="flex justify-center mb-8">
            <div class="relative">
              <!-- Purple glow effect behind the image -->
              <div class="absolute inset-0 bg-purple-400/30 blur-3xl rounded-full scale-110" aria-hidden="true"></div>
              <!-- Image -->
              <img
                :src="networkImg"
                alt="Network Infrastructure"
                class="relative w-48 h-48 sm:w-64 sm:h-64 object-contain animate-fadeIn"
              />
            </div>
          </div>

          <p class="text-gray-300 text-lg text-center max-w-4xl mx-auto leading-relaxed animate-fadeIn">
            Professional network design, installation, and support across New Mexico. 
            We build scalable, secure network infrastructure for businesses — from switches and access points 
            to structured cabling, VLANs, and complete network solutions that grow with your needs.
          </p>

          <div class="mt-10 flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-4">
            <button
              type="button"
              @click="contactUs"
              class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-500 hover:from-purple-500 hover:to-purple-400 text-white rounded-lg font-semibold shadow-lg shadow-purple-500/30 transition-all duration-300 transform hover:scale-105"
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
              class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-700/50 text-purple-400 ring-1 ring-inset ring-purple-600/50 hover:bg-gray-700 hover:ring-purple-500 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105"
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
            <div class="rounded-2xl border border-purple-500/20 bg-gray-900/40 p-5 ring-1 ring-purple-500/10">
              <p class="text-sm font-semibold text-purple-400">Scalable design</p>
              <p class="mt-2 text-sm text-gray-300">Infrastructure built to support current needs and future growth.</p>
            </div>
            <div class="rounded-2xl border border-purple-500/20 bg-gray-900/40 p-5 ring-1 ring-purple-500/10">
              <p class="text-sm font-semibold text-purple-400">Reliable performance</p>
              <p class="mt-2 text-sm text-gray-300">Enterprise-grade equipment and proper configuration for stability.</p>
            </div>
            <div class="rounded-2xl border border-purple-500/20 bg-gray-900/40 p-5 ring-1 ring-purple-500/10">
              <p class="text-sm font-semibold text-purple-400">Expert support</p>
              <p class="mt-2 text-sm text-gray-300">Troubleshooting, upgrades, and ongoing maintenance when you need it.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Services -->
      <section class="mt-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="max-w-3xl">
            <h2 class="text-2xl sm:text-3xl font-bold text-white">
              Network infrastructure services for growing businesses
            </h2>
            <p class="mt-3 text-gray-300">
              From small office networks to multi-site deployments, we handle network design, 
              installation, configuration, and support — ensuring reliable connectivity and performance.
            </p>
          </div>

          <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div
              v-for="service in services"
              :key="service.title"
              class="rounded-2xl bg-gradient-to-br from-gray-800 to-gray-900 border border-purple-500/20 ring-1 ring-purple-500/10 p-6 shadow-xl"
            >
              <div class="flex items-start gap-3">
                <div
                  class="mt-1 flex h-10 w-10 items-center justify-center rounded-xl bg-purple-500/10 border border-purple-500/20"
                >
                  <svg class="h-5 w-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"
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
                  <svg class="mt-0.5 h-4 w-4 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
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
          <div class="rounded-3xl border border-purple-500/20 bg-gray-900/40 ring-1 ring-purple-500/10 p-8 sm:p-10">
            <div class="max-w-3xl">
              <h2 class="text-2xl sm:text-3xl font-bold text-white">How we deliver reliable network infrastructure</h2>
              <p class="mt-3 text-gray-300">
                A proven process from assessment to deployment — we design networks that perform well today 
                and scale with your business tomorrow.
              </p>
            </div>

            <div class="mt-8 grid gap-6 lg:grid-cols-4">
              <div v-for="step in steps" :key="step.title" class="rounded-2xl bg-gray-900/30 border border-purple-500/10 p-6">
                <p class="text-sm font-semibold text-purple-400">{{ step.kicker }}</p>
                <p class="mt-2 text-white font-semibold">{{ step.title }}</p>
                <p class="mt-2 text-sm text-gray-300">{{ step.description }}</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Related Products Section -->
      <RelatedProducts
        category="network"
        title="Network Infrastructure"
        subtitle="Switches, routers, and network management solutions"
        theme="blue"
        :max-products="10"
        @product-clicked="handleProductClick"
      />

      <!-- CTA -->
      <section class="mt-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div
            class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-gray-900 via-gray-900 to-gray-800 border border-purple-500/20 ring-1 ring-purple-500/10 p-8 sm:p-10"
          >
            <div
              class="absolute -top-20 -right-20 h-72 w-72 rounded-full bg-gradient-to-br from-purple-500/15 to-violet-500/10 blur-3xl"
              aria-hidden="true"
            ></div>
            <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
              <div class="max-w-2xl">
                <h3 class="text-2xl font-bold text-white">Need to upgrade or expand your network?</h3>
                <p class="mt-3 text-gray-300">
                  From new installations to network troubleshooting and upgrades — we design and deliver 
                  solutions that keep your business connected.
                </p>
              </div>
              <div class="flex flex-col sm:flex-row gap-4">
                <button
                  type="button"
                  @click="contactUs"
                  class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-500 hover:from-purple-500 hover:to-purple-400 text-white rounded-lg font-semibold shadow-lg shadow-purple-500/30 transition-all duration-300"
                >
                  Contact Us
                </button>
                <button
                  type="button"
                  @click="getQuote"
                  class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-700/50 text-purple-400 ring-1 ring-inset ring-purple-600/50 hover:bg-gray-700 hover:ring-purple-500 rounded-lg font-semibold transition-all duration-300"
                >
                  Build Quote
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Product Details Modal -->
    <ProductDetailsModal
      :is-open="productDetailsOpen"
      :product="selectedProduct"
      @close="closeProductDetails"
    />
  </template>

  <script setup>
  import { inject, onMounted, ref } from "vue";
  import { useRouter } from "vue-router";
  import { useAISEO } from "../composables/useAISEO";
  import RelatedProducts from "./RelatedProducts.vue";
  import ProductDetailsModal from "./ProductDetailsModal.vue";

  const { setNetworkingPageSEO } = useAISEO();

  // Set AI-optimized SEO on page load
  onMounted(() => {
    setNetworkingPageSEO();
  });
  
  const networkImg = '/images/network-iso.webp';

  const router = useRouter();
  const openContactModal = inject("openContactModal", null);
  const selectedProduct = ref(null);
  const productDetailsOpen = ref(false);

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

  const handleProductClick = (product) => {
    selectedProduct.value = product;
    productDetailsOpen.value = true;
  };

  const closeProductDetails = () => {
    productDetailsOpen.value = false;
    selectedProduct.value = null;
  };

  const services = [
    {
      title: "Network design & installation",
      description:
        "Complete network infrastructure design and installation for offices, warehouses, and multi-site facilities — switches, routers, access points, and structured cabling.",
      highlights: [
        "Network topology planning and documentation",
        "Enterprise switches and managed access points",
        "VLAN segmentation and QoS configuration",
      ],
    },
    {
      title: "Structured cabling & fiber",
      description:
        "Professional cable installation for data networks — Cat5e/Cat6/Cat6a drops, patch panels, fiber runs, and cable management for clean, maintainable installations.",
      highlights: [
        "Horizontal and vertical cable runs",
        "Fiber optic installation and termination",
        "Cable certification and testing",
      ],
    },
    {
      title: "WiFi network deployment",
      description:
        "Enterprise WiFi solutions with proper coverage planning, access point placement, and controller configuration for reliable wireless connectivity across your facility.",
      highlights: [
        "Site surveys and heat mapping",
        "Multiple SSID and guest network setup",
        "Seamless roaming and load balancing",
      ],
    },
    {
      title: "Network security & segmentation",
      description:
        "Implement network security best practices — firewall configuration, VLAN isolation, access controls, and traffic monitoring to protect your business.",
      highlights: [
        "Firewall rules and policies",
        "Network segmentation (guest, IoT, production)",
        "VPN setup for remote access",
      ],
    },
    {
      title: "Network troubleshooting & support",
      description:
        "Fast response for network issues — connectivity problems, slow performance, switch failures, and configuration errors. We diagnose and resolve issues quickly.",
      highlights: [
        "Performance analysis and optimization",
        "Equipment replacement and upgrades",
        "Configuration backup and recovery",
      ],
    },
    {
      title: "Network monitoring & maintenance",
      description:
        "Proactive network monitoring and scheduled maintenance to catch issues before they impact operations — firmware updates, health checks, and capacity planning.",
      highlights: [
        "Network monitoring and alerts",
        "Regular firmware and patch updates",
        "Performance trending and capacity planning",
      ],
    },
  ];

  const steps = [
    {
      kicker: "Step 1",
      title: "Assessment & planning",
      description: "We review your current setup, bandwidth needs, user count, and growth plans to design the right network architecture.",
    },
    {
      kicker: "Step 2",
      title: "Design & documentation",
      description: "Create detailed network diagrams, equipment lists, and cable plans before installation begins.",
    },
    {
      kicker: "Step 3",
      title: "Installation & configuration",
      description: "Professional installation of switches, access points, and cabling with proper configuration, VLANs, and security settings.",
    },
    {
      kicker: "Step 4",
      title: "Testing & support",
      description: "Thorough testing of all connections, bandwidth verification, and documentation handoff — plus ongoing support when you need it.",
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
