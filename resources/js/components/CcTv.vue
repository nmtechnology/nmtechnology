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
              <span class="text-sm font-semibold text-green-400">Alarm Installation & Service</span>
            </div>
          </div>

          <h1 class="text-4xl sm:text-5xl font-extrabold text-center mb-6">
            <span class="text-white">Protect What Matters With </span>
            <span
              class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
              >Professional Alarm Systems</span
            >
          </h1>

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
              Alarm services that fit your building
            </h2>
            <p class="mt-3 text-gray-300">
              Whether you’re starting from scratch or fixing an existing system, we’ll recommend
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
                      d="M12 11c1.657 0 3-1.567 3-3.5S13.657 4 12 4 9 5.567 9 7.5 10.343 11 12 11zm0 0c-3.866 0-7 2.239-7 5v2h14v-2c0-2.761-3.134-5-7-5z"
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
              <h2 class="text-2xl sm:text-3xl font-bold text-white">How we deliver reliable alarm protection</h2>
              <p class="mt-3 text-gray-300">
                A straightforward process, clear expectations, and clean work — so you know what’s installed
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
      description: "If something changes, we’re here — adjustments, repairs, expansions, and ongoing maintenance.",
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

<docs>
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-4 w-4"
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
                      </span>
                      {{
                        product.category === "monitoring"
                          ? "Subscribe"
                          : "Add to Quote Cart"
                      }}
                    </button>
                    <button
                      @click.stop="showProductDetails(product)"
                      :class="[
                        'px-4 py-3 rounded-lg transition-all duration-300 cursor-pointer border transform hover:scale-105',
                        product.category === 'package'
                          ? 'border-green-500/50 hover:border-green-400 text-green-400 hover:text-green-300 hover:bg-green-900/20'
                          : product.category === 'monitoring'
                          ? 'border-purple-500/50 hover:border-purple-400 text-purple-400 hover:text-purple-300 hover:bg-purple-900/20'
                          : product.category === 'security' && product.color === 'blue'
                          ? 'border-blue-500/50 hover:border-blue-400 text-blue-400 hover:text-blue-300 hover:bg-blue-900/20'
                          : product.brand === 'NM Solar' && product.color === 'yellow'
                          ? 'border-yellow-500/50 hover:border-yellow-400 text-yellow-400 hover:text-yellow-300 hover:bg-yellow-900/20'
                          : 'border-blue-500/50 hover:border-blue-400 text-blue-400 hover:text-blue-300 hover:bg-blue-900/20',
                      ]"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                        />
                      </svg>
                    </button>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>
  </main>

  <!-- Recently Viewed Products Footer -->
  <transition name="fade">
    <div
      v-if="hasRecentProducts"
      class="recently-viewed-footer fixed w-full"
      :class="{ collapsed: !isRecentlyViewedExpanded }"
      role="region"
      aria-label="Recently viewed products"
      style="
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        max-height: 45px;
        z-index: 30;
      "
    >
      <!-- Toggle button -->
      <button
        @click="toggleRecentlyViewed"
        class="absolute -top-5 right-6 bg-gray-900/90 border border-gray-700 rounded-t-md px-2 py-0.5 text-xs text-gray-300 hover:text-white transition-colors duration-300 hover:bg-gray-800 shadow-md"
        :aria-expanded="isRecentlyViewedExpanded.toString()"
        aria-controls="recently-viewed-content"
      >
        {{ isRecentlyViewedExpanded ? "Hide" : "Show" }} Recently Viewed
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-3.5 w-3.5 inline ml-1 transition-transform duration-300"
          :class="{ 'rotate-180': !isRecentlyViewedExpanded }"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          />
        </svg>
      </button>

      <!-- Footer content with transition -->
      <transition name="slide">
        <div
          v-if="isRecentlyViewedExpanded"
          id="recently-viewed-content"
          class="bg-gray-900/90 border-t border-gray-700 py-0.5"
          style="max-height: 40px; overflow: hidden"
        >
          <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-xs font-bold text-white mb-0">Recently Viewed Products</h2>
            <div
              class="recently-viewed-scroller overflow-x-auto pb-0.5"
              style="max-height: 36px"
            >
              <div class="flex space-x-1 md:space-x-1.5" style="min-width: min-content">
                <transition-group
                  name="product-list"
                  tag="div"
                  class="flex space-x-0.5 md:space-x-1"
                >
                  <div
                    v-for="product in recentlyViewedProducts"
                    :key="product.id"
                    @click="showProductDetails(product)"
                    class="recently-viewed-item flex-shrink-0 w-16 sm:w-18 md:w-20 rounded shadow-sm overflow-hidden cursor-pointer transition-all duration-300 hover:-translate-y-0.5 bg-gray-800/60 border"
                    :class="[
                      product.category === 'package'
                        ? 'border-green-600/30 hover:shadow hover:shadow-green-500/10 hover:border-green-500/40'
                        : product.category === 'monitoring'
                        ? 'border-purple-600/30 hover:shadow hover:shadow-purple-500/10 hover:border-purple-500/40'
                        : product.category === 'security' && product.color === 'blue'
                        ? 'border-blue-600/30 hover:shadow hover:shadow-blue-500/10 hover:border-blue-500/40'
                        : product.brand === 'NM Solar' && product.color === 'yellow'
                        ? 'border-yellow-600/30 hover:shadow hover:shadow-yellow-500/10 hover:border-yellow-500/40'
                        : 'border-blue-600/30 hover:shadow hover:shadow-blue-500/10 hover:border-blue-500/40',
                    ]"
                    role="button"
                    :aria-label="`View details for ${product.name}`"
                  >
                    <img
                      :src="product.image"
                      :alt="product.name"
                      class="w-full h-7 object-scale-down p-0.5 bg-gray-900/50"
                    />
                    <div class="p-0.5">
                      <h3
                        :class="[
                          'text-[0.6rem] font-medium truncate leading-tight',
                          product.category === 'package'
                            ? 'text-green-400'
                            : product.category === 'monitoring'
                            ? 'text-purple-400'
                            : product.category === 'security' && product.color === 'blue'
                            ? 'text-blue-400'
                            : product.brand === 'NM Solar' && product.color === 'yellow'
                            ? 'text-yellow-400'
                            : 'text-blue-400',
                        ]"
                      >
                        {{ product.name }}
                      </h3>
                      <p class="text-[0.55rem] text-gray-400 mt-0 leading-tight">
                        {{ formatTimeAgo(product.timestamp) }}
                      </p>
                    </div>
                  </div>
                </transition-group>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
  </transition>

  <!-- Cart Modal -->
  <CartModal class="relative z-50" :key="'cart-modal'" />

  <!-- Product Details Modal -->
  <ProductDetailsModal
    :isOpen="productDetailsOpen"
    :product="selectedProduct"
    class="relative z-[100]"
    :key="'product-details-modal'"
    @close="closeProductDetails"
  />
</template>

<script>
import { ref, computed, onMounted } from "vue";
import { useRouter } from "vue-router";
import CartModal from "../components/CartModal.vue";
import ProductFilter from "../components/ProductFilter.vue";
import BackgroundPattern from "../components/BackgroundPattern.vue";
import ProductDetailsModal from "../components/ProductDetailsModal.vue";
import RecentlyViewedProducts from "../components/RecentlyViewedProducts.vue";
import PromoBanner from "../components/PromoBanner.vue";
import { cartStore } from "../store/cartStore.js";
import { toastService } from "../services/toastService.js";
import { recentlyViewedService } from "../services/recentlyViewedService.js";
import { cameraProducts } from "../data/productData.js";
import "./RecentlyViewedFooter.css";

export default {
  name: "CcTv",
  components: {
    CartModal,
    ProductFilter,
    ProductDetailsModal,
    RecentlyViewedProducts,
    BackgroundPattern,
    PromoBanner,
  },
  setup() {
    const cartItemCount = computed(() => cartStore.getItemCount.value);
    // Ensure we have valid product data or use an empty array as fallback
    const allProducts = ref(Array.isArray(cameraProducts) ? cameraProducts : []);
    const filteredProducts = ref(
      Array.isArray(cameraProducts) ? [...cameraProducts] : []
    );
    const activeCategory = ref("all");
    const productDetailsOpen = ref(false);
    const selectedProduct = ref(null);
    const recentlyViewedProducts = computed(() => recentlyViewedService.getProducts());
    const hasRecentProducts = computed(() => recentlyViewedService.hasProducts());

    // Recently viewed products footer toggle state
    const isRecentlyViewedExpanded = ref(false);

    // Package comparison toggle state
    const showPackageComparison = ref(false);

    // Check if we were directed here with a hash and handle it appropriately
    const { currentRoute } = useRouter();

    // Add onMounted hook to handle hash navigation and fix recently viewed footer
    onMounted(() => {
      // Check for hash in URL
      if (window.location.hash) {
        const targetId = window.location.hash.substring(1); // Remove the '#' character

        // Wait longer for the DOM to fully render and products to load
        setTimeout(() => {
          if (targetId === "product-grid") {
            const element = document.getElementById("product-grid");
            if (element) {
              console.log("CcTv: Scrolling to product-grid");
              element.scrollIntoView({ behavior: "smooth", block: "start" });
            } else {
              console.warn("CcTv: Could not find #product-grid element");
            }
          }
        }, 600); // Increased timeout to ensure component is fully rendered
      }

      // Fix the position of the recently viewed footer
      const fixFooterPosition = () => {
        const footer = document.querySelector(".recently-viewed-footer");
        if (footer) {
          footer.style.position = "fixed";
          footer.style.bottom = "0";
          footer.style.left = "0";
          footer.style.width = "100%";
          footer.style.zIndex = "40";
          footer.style.maxHeight = "45px";

          // Set initial state (collapsed by default)
          if (!isRecentlyViewedExpanded.value) {
            footer.classList.add("collapsed");
          } else {
            footer.classList.remove("collapsed");
          }
        }
      };

      // Apply immediately and also after a short delay to ensure it works after all rendering
      fixFooterPosition();
      setTimeout(fixFooterPosition, 500);

      // Also fix position when window is resized
      window.addEventListener("resize", fixFooterPosition);

      // Cleanup on component unmount
      return () => {
        window.removeEventListener("resize", fixFooterPosition);
      };
    });

    // Get all package products for comparison table
    const packageProducts = computed(() => {
      return allProducts.value
        .filter((product) => product.category === "package")
        .sort((a, b) => (a.price || 0) - (b.price || 0));
    });

    // Toggle recently viewed products footer visibility
    const toggleRecentlyViewed = () => {
      isRecentlyViewedExpanded.value = !isRecentlyViewedExpanded.value;

      // Auto-hide after 10 seconds if expanded
      if (isRecentlyViewedExpanded.value) {
        setTimeout(() => {
          if (isRecentlyViewedExpanded.value) {
            isRecentlyViewedExpanded.value = false;
            try {
              localStorage.setItem("recentlyViewedExpanded", "false");
            } catch (e) {
              console.error("Error saving auto-hide preference to localStorage:", e);
            }
          }
        }, 10000); // Auto-hide after 10 seconds
      }

      // Save preference to localStorage
      try {
        localStorage.setItem(
          "recentlyViewedExpanded",
          isRecentlyViewedExpanded.value ? "true" : "false"
        );
      } catch (e) {
        console.error("Error saving preference to localStorage:", e);
      }
    };

    // Load preference from localStorage on component mount
    try {
      const savedPreference = localStorage.getItem("recentlyViewedExpanded");
      if (savedPreference !== null) {
        isRecentlyViewedExpanded.value = savedPreference === "true";
      } else {
        // By default, keep it collapsed
        isRecentlyViewedExpanded.value = false;
      }
    } catch (e) {
      console.error("Error loading preference from localStorage:", e);
    }

    // Handler for banner dismissal
    const handleBannerDismiss = () => {
      console.log("Banner dismissed!");
      // You could add additional logic here if needed
      localStorage.setItem("halloweenBannerDismissed", "true");
    };

    // Filter products by category
    const filterProducts = (categoryId) => {
      activeCategory.value = categoryId || "all";

      if (!Array.isArray(allProducts.value)) {
        console.error("Product data is not an array:", allProducts.value);
        filteredProducts.value = [];
        return;
      }

      if (categoryId === "all") {
        filteredProducts.value = [...allProducts.value];
      } else {
        filteredProducts.value = allProducts.value.filter(
          (product) => product && product.category === categoryId
        );
      }
    };

    // Group products by brand
    const groupedProducts = computed(() => {
      // Start with an empty object
      const grouped = {};

      try {
        // Make sure filteredProducts.value is an array before processing
        if (filteredProducts.value && Array.isArray(filteredProducts.value)) {
          filteredProducts.value.forEach((product) => {
            if (!product) return;
            const brandKey = product.brand || "Other";
            if (!grouped[brandKey]) {
              grouped[brandKey] = [];
            }
            grouped[brandKey].push(product);
          });

          // Sort packages by price (ascending)
          if (grouped["NM Technology Security Packages"]) {
            grouped["NM Technology Security Packages"].sort((a, b) => {
              return (a.price || 0) - (b.price || 0);
            });
          }
        }
      } catch (error) {
        console.error("Error grouping products:", error);
        // Return empty object in case of error
      }

      return grouped;
    });

    // Cart operations
    const addToCart = (product) => {
      cartStore.addItem({
        id: product.id,
        name: product.name,
        image: product.image,
        price: product.price,
      });

      // Add cart badge animation class
      const cartBadges = document.querySelectorAll(".cart-badge");
      cartBadges.forEach((badge) => {
        badge.classList.add("cart-badge-pulse");
        setTimeout(() => {
          badge.classList.remove("cart-badge-pulse");
        }, 1000);
      });

      toastService.success(`Added ${product.name} to cart!`);
    };

    const openCart = () => {
      cartStore.openCart();
    };

    // Product details modal
    const showProductDetails = (product) => {
      console.log('showProductDetails called with:', product);
      
      if (!product) {
        console.warn('No product provided to showProductDetails');
        return;
      }

      // If we receive a product with just an ID (from RecentlyViewed)
      // we need to find the full product data
      if (product && product.id && !product.features) {
        const fullProduct = allProducts.value.find((p) => p.id === product.id);
        if (fullProduct) {
          selectedProduct.value = fullProduct;
          // Add to recently viewed
          recentlyViewedService.addProduct(fullProduct);
        } else {
          selectedProduct.value = product; // Use limited data if full not found
        }
      } else {
        selectedProduct.value = product;
        // Add to recently viewed
        if (product) {
          // Make sure color property is included for proper theming
          if (product.category === "security" && !product.color) {
            product.color = "blue";
          }
          recentlyViewedService.addProduct(product);
        }
      }

      console.log('Setting productDetailsOpen to true, selectedProduct:', selectedProduct.value);
      productDetailsOpen.value = true;
    };

    const closeProductDetails = () => {
      console.log('closeProductDetails called');
      productDetailsOpen.value = false;
      // Restore scroll immediately
      document.body.style.overflow = '';
      setTimeout(() => {
        selectedProduct.value = null;
      }, 200); // Small delay to allow for animation
    };

    // Format time ago for recently viewed products
    const formatTimeAgo = (timestamp) => {
      try {
        const date = new Date(timestamp);
        const now = new Date();
        const diffMs = now - date;

        // Convert to minutes, hours, and days
        const diffMinutes = Math.floor(diffMs / 60000);
        const diffHours = Math.floor(diffMinutes / 60);
        const diffDays = Math.floor(diffHours / 24);

        if (diffDays > 0) {
          return `${diffDays} ${diffDays === 1 ? "day" : "days"} ago`;
        } else if (diffHours > 0) {
          return `${diffHours} ${diffHours === 1 ? "hour" : "hours"} ago`;
        } else if (diffMinutes > 0) {
          return `${diffMinutes} ${diffMinutes === 1 ? "minute" : "minutes"} ago`;
        } else {
          return "Just now";
        }
      } catch (e) {
        return "";
      }
    };

    // Handle scroll-to events from SecurityFAQs component
    const handleScrollTo = (targetId) => {
      let targetElement = null;

      if (targetId === "packages") {
        // Filter for packages and scroll to the top of the results
        filterProducts("package");
        targetElement = document.querySelector("#package-section");
      } else if (targetId === "monitoring") {
        // Filter for monitoring packages and scroll to the top of the results
        filterProducts("monitoring");
        targetElement = document.querySelector("#monitoring-section");
      } else if (targetId === "products" || targetId === "product-grid") {
        // Show all products
        filterProducts("all");
        targetElement = document.querySelector("#product-grid");
      }

      // Scroll to the target element if found
      if (targetElement) {
        // Use a longer delay to ensure the DOM is fully rendered after filtering
        setTimeout(() => {
          console.log(`CcTv: Scrolling to ${targetId} element`);
          targetElement.scrollIntoView({ behavior: "smooth", block: "start" });
        }, 300); // Longer delay to ensure filter has applied and DOM is updated
      } else {
        console.warn(`CcTv: Could not find element with ID: ${targetId}`);
        // Try one more time with an even longer delay if element wasn't found
        setTimeout(() => {
          const retryElement = document.querySelector(
            targetId === "products" ? "#product-grid" : `#${targetId}`
          );
          if (retryElement) {
            console.log(`CcTv: Found ${targetId} element on retry, scrolling now`);
            retryElement.scrollIntoView({ behavior: "smooth", block: "start" });
          }
        }, 600);
      }
    };

    return {
      cartItemCount,
      groupedProducts,
      activeCategory,
      productDetailsOpen,
      selectedProduct,
      recentlyViewedProducts,
      hasRecentProducts,
      isRecentlyViewedExpanded,
      showPackageComparison,
      packageProducts,
      filterProducts,
      addToCart,
      openCart,
      showProductDetails,
      closeProductDetails,
      handleBannerDismiss,
      formatTimeAgo,
      toggleRecentlyViewed,
      handleScrollTo,
    };
  },
};
</script>

<style scoped>
/* Base layout and background */
.bg-gray-900 {
  position: relative;
  min-height: 100vh;
}

/* Content area should be above background but below modals */
main {
  position: relative;
  z-index: 10; /* Lower z-index to ensure footer appears above */
}

/* Product cards should be clickable */
.rounded-lg {
  position: relative;
  z-index: 30;
}

/* Main content container */
.mx-auto.max-w-7xl {
  position: relative;
  background: rgba(17, 24, 39, 0.4);
  backdrop-filter: blur(4px);
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  margin-bottom: 2rem;
}

/* Make sure modals appear on top */
:deep(.modal-overlay) {
  z-index: 45;
}

:deep(.modal-container) {
  z-index: 50;
}

/* Keep recently viewed footer above content but below modals */
.recently-viewed-footer.fixed {
  z-index: 40 !important; /* Below modals but above main content */
  height: auto !important;
  max-height: 250px !important;
  background: rgba(17, 24, 39, 0.95) !important;
  border-top: 1px solid rgba(55, 65, 81, 0.5) !important;
  box-shadow: 0 -8px 16px -2px rgba(0, 0, 0, 0.3) !important;
  backdrop-filter: blur(12px) !important;
}

/* Footer toggle button */
.recently-viewed-footer .absolute {
  z-index: 41;
}

/* Background patterns should stay in back */
svg.fixed {
  z-index: -10;
}

/* Ensure product cards are clickable */
.cursor-pointer {
  position: relative;
  z-index: 30;
}

/* Improve text readability against the complex background */
h1,
p {
  text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

/* Product card hover effects */
.bg-gray-800:hover,
.bg-gray-800\/70:hover,
.bg-gray-800\/50:hover {
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  transform: translateY(-4px);
  transition: all 0.3s ease;
}

/* Clickable product tile indication */
.cursor-pointer:hover {
  position: relative;
}

.cursor-pointer:hover::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  border-radius: 0.5rem;
  box-shadow: inset 0 0 0 2px rgba(22, 163, 74, 0.4);
  pointer-events: none;
}

/* Make sure SVG background doesn't interfere with interactive elements */
svg.fixed,
svg.absolute {
  pointer-events: none;
}

/* Ensure fixed backgrounds cover the full viewport */
.fixed {
  min-height: 100vh;
  width: 100%;
}

/* Add margin-top to account for the TopBanner and PromoBanner */
main {
  margin-top: 30px;
  padding-bottom: 150px; /* Extra padding to account for fixed footer */
}

/* Add some spacing between brand sections */
.mb-16 {
  position: relative;
  z-index: 10;
}

/* Recently viewed products footer styling */
.recently-viewed-footer {
  border-top: 1px solid rgba(55, 65, 81, 0.5);
  box-shadow: 0 -8px 16px -2px rgba(0, 0, 0, 0.3), 0 -4px 8px -2px rgba(0, 0, 0, 0.2);
  backdrop-filter: blur(12px);
  transition: transform 0.3s ease;
  max-height: 250px; /* Limit the height of the footer */
  overflow: auto;
}

/* Footer container styles */
.recently-viewed-footer .container {
  max-width: 100%;
  margin: 0 auto;
}

/* Product list container in footer */
.recently-viewed-footer .overflow-x-auto {
  max-height: 150px; /* Leave room for the header */
  overflow-y: auto;
  overflow-x: auto;
}

/* Recently viewed toggle button */
.recently-viewed-footer button.absolute {
  z-index: 41; /* Ensure the toggle button is always clickable */
}

/* Hide scrollbar for Chrome, Safari and Opera */
.overflow-x-auto::-webkit-scrollbar {
  height: 6px;
  width: 6px;
}

.overflow-x-auto::-webkit-scrollbar-track {
  background: rgba(31, 41, 55, 0.5);
  border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
  background: rgba(75, 85, 99, 0.5);
  border-radius: 10px;
}

/* Main content area padding to prevent content from being hidden behind footer */
main {
  padding-bottom: 320px; /* Increased padding to account for footer height */
}

/* Transition animations for recently viewed products */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.product-list-enter-active,
.product-list-leave-active {
  transition: all 0.5s ease;
}

.product-list-enter-from {
  opacity: 0;
  transform: translateY(30px);
}

.product-list-leave-to {
  opacity: 0;
  transform: translateX(-30px);
}

.product-list-move {
  transition: transform 0.5s ease;
}

/* Slide animation for footer content and package comparison */
.slide-enter-active,
.slide-leave-active {
  transition: max-height 0.3s ease, opacity 0.3s ease;
  max-height: 250px;
  overflow: hidden;
}

.slide-enter-from,
.slide-leave-to {
  max-height: 0;
  opacity: 0;
  overflow: hidden;
}

/* Special styles for package cards */
.bg-gray-800\/70.border-green-600\/30 {
  transition: all 0.3s ease;
}

.bg-gray-800\/70.border-green-600\/30:hover {
  border-color: rgba(22, 163, 74, 0.5); /* More visible border on hover */
  box-shadow: 0 0 15px rgba(22, 163, 74, 0.2); /* Green glow effect */
}

/* Special styles for monitoring cards */
.bg-gray-800\/70.border-purple-600\/30 {
  transition: all 0.3s ease;
}

.bg-gray-800\/70.border-purple-600\/30:hover {
  border-color: rgba(147, 51, 234, 0.5); /* More visible border on hover */
  box-shadow: 0 0 15px rgba(147, 51, 234, 0.2); /* Purple glow effect */
}

/* Special styles for security cards */
.bg-gray-800\/70.border-blue-600\/30 {
  transition: all 0.3s ease;
}

.bg-gray-800\/70.border-blue-600\/30:hover {
  border-color: rgba(37, 99, 235, 0.5); /* More visible border on hover */
  box-shadow: 0 0 15px rgba(37, 99, 235, 0.2); /* Blue glow effect */
}

/* Special styles for solar powered cards */
.bg-gray-800\/70.border-yellow-600\/30 {
  transition: all 0.3s ease;
}

.bg-gray-800\/70.border-yellow-600\/30:hover {
  border-color: rgba(234, 179, 8, 0.5); /* More visible border on hover */
  box-shadow: 0 0 15px rgba(234, 179, 8, 0.2); /* Yellow glow effect */
}

/* Special styles for blue security cards */
.bg-gray-800\/70.border-blue-600\/30 {
  transition: all 0.3s ease;
}

.bg-gray-800\/70.border-blue-600\/30:hover {
  border-color: rgba(37, 99, 235, 0.5); /* More visible blue border on hover */
  box-shadow: 0 0 15px rgba(37, 99, 235, 0.2); /* Blue glow effect */
}

/* Package comparison table styles */
table {
  border-collapse: separate;
  border-spacing: 0;
  border-radius: 8px;
  overflow: hidden;
}

th:first-child {
  border-top-left-radius: 8px;
}

th:last-child {
  border-top-right-radius: 8px;
}

/* Smooth scrolling for FAQ section */
html {
  scroll-behavior: smooth;
}

/* Animation styles for scroll transitions */
.scroll-transition {
  transition: all 0.5s ease;
}

/* Base layout styling */
main {
  position: relative;
  margin-top: 30px;
  padding-bottom: 150px; /* Space for footer */
  z-index: 1; /* Lower z-index for main content */
}

/* Content container */
.mx-auto.max-w-7xl {
  position: relative;
  z-index: 1;
  background: rgba(17, 24, 39, 0.4);
  backdrop-filter: blur(4px);
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  margin-bottom: 2rem;
}

/* Product grid and cards */
#product-grid {
  position: relative;
  z-index: 2;
}

.cursor-pointer {
  position: relative;
  z-index: 2;
}

/* Recently viewed footer styling */
.recently-viewed-footer.fixed {
  position: fixed !important;
  bottom: 0 !important;
  left: 0 !important;
  right: 0 !important;
  z-index: 40 !important; /* Reduced z-index to stay below modals */
  height: auto !important;
  max-height: 250px !important;
  background: rgba(17, 24, 39, 0.95) !important;
  border-top: 1px solid rgba(55, 65, 81, 0.5) !important;
  box-shadow: 0 -8px 16px -2px rgba(0, 0, 0, 0.3) !important;
  backdrop-filter: blur(12px) !important;
}

/* Footer toggle button */
.recently-viewed-footer .absolute {
  z-index: 41;
}

/* Footer content container */
.recently-viewed-footer .container {
  position: relative;
  height: 100%;
  max-height: 200px;
  overflow-y: auto;
}

/* Product list in recently viewed footer */
.recently-viewed-footer .overflow-x-auto {
  max-height: 150px;
  overflow-y: hidden;
}

/* Modal z-indices */
:deep(.modal-overlay) {
  z-index: 45;
}

:deep(.modal-container) {
  z-index: 50;
}

/* Background pattern */
svg.fixed {
  z-index: -10;
}

/* Transition animations */
.slide-enter-active,
.slide-leave-active {
  transition: all 0.3s ease;
  max-height: 500px;
  overflow: hidden;
}

.slide-enter-from,
.slide-leave-to {
  max-height: 0;
  opacity: 0;
  overflow: hidden;
}

/* Hide scrollbar for cleaner look */
.overflow-x-auto::-webkit-scrollbar {
  height: 6px;
  width: 6px;
}

.overflow-x-auto::-webkit-scrollbar-track {
  background: rgba(31, 41, 55, 0.5);
  border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
  background: rgba(75, 85, 99, 0.5);
  border-radius: 10px;
}

/* Recently viewed products footer styling */
.recently-viewed-footer .container {
  position: relative;
  max-height: 250px;
  overflow-y: auto;
}

/* Recently viewed items styles */
.recently-viewed-scroller {
  padding-bottom: 0.75rem;
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: thin; /* Firefox */
}

.recently-viewed-scroller::-webkit-scrollbar {
  height: 6px;
}

.recently-viewed-scroller::-webkit-scrollbar-track {
  background: rgba(17, 24, 39, 0.4);
  border-radius: 10px;
}

.recently-viewed-scroller::-webkit-scrollbar-thumb {
  background: rgba(55, 65, 81, 0.7);
  border-radius: 10px;
}

.recently-viewed-scroller::-webkit-scrollbar-thumb:hover {
  background: rgba(75, 85, 99, 0.9);
}

.recently-viewed-item {
  transition: all 0.3s ease;
}

.recently-viewed-item:hover {
  transform: translateY(-4px);
}

/* Add this at the end of your <style> section */

/* Reset for recently viewed footer to ensure proper display */
.recently-viewed-footer {
  display: block !important;
  position: fixed !important;
  bottom: 0 !important;
  left: 0 !important;
  width: 100% !important;
  height: auto !important;
  max-height: 120px !important;
  overflow: visible !important;
  z-index: 30 !important;
}

.recently-viewed-footer > div {
  max-height: 100px !important;
  overflow-y: auto !important;
}

.recently-viewed-scroller {
  max-height: 70px !important;
  overflow-x: auto !important;
  overflow-y: hidden !important;
}

/* Make sure content doesn't get hidden behind the footer */
.bg-gray-900 {
  padding-bottom: 150px !important;
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
.animate-fadeIn {
  animation: fadeIn 1s ease-out;
}
</style>

</docs>
