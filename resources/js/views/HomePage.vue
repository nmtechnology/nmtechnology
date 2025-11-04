<template>
  <div class="site-wrapper">
    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-gray-900 border-b border-green-600/30">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
          <!-- Logo Section - Matching quote route style -->
          <div class="flex lg:flex-1 items-center">
            <router-link to="/home" class="relative flex items-center group">
              <img
                class="h-10 w-auto mr-2 transition-transform duration-300 group-hover:scale-105"
                src="/public/images/nm-logo-rmbg.webp"
                alt="nmtechnology-logo"
              />
              <span
                class="italic text-lg font-extrabold text-white -ml-5 transition-colors duration-300 group-hover:text-green-400"
                >Technology</span
              >
            </router-link>
          </div>

          <!-- Mobile menu button -->
          <div class="flex lg:hidden">
            <button
              type="button"
              class="inline-flex items-center justify-center rounded-md p-2.5 text-green-400 hover:text-green-300 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500 transition-all duration-200"
              @click="mobileMenuOpen = true"
            >
              <span class="sr-only">Open main menu</span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 16 16"
                fill="currentColor"
                class="size-5"
              >
                <path
                  fill-rule="evenodd"
                  d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>
          </div>

          <!-- Desktop navigation links -->
          <div class="hidden lg:flex lg:gap-x-1 gap-x-3">
            <router-link
              v-for="item in navigation.filter((i) => i.name !== 'Home')"
              :key="item.name"
              :to="item.href"
              class="relative px-3 py-2 text-sm font-semibold text-white hover:text-green-400 transition-colors duration-200 rounded-md group"
              :class="{ 'text-green-400': isActiveRoute(item.href) }"
            >
              {{ item.name }}
              <span
                class="absolute bottom-0 left-0 w-full h-0.5 bg-green-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-200 origin-left"
              ></span>
              <span
                v-if="isActiveRoute(item.href)"
                class="absolute bottom-0 left-0 w-full h-0.5 bg-green-500"
              ></span>
            </router-link>
          </div>

          <!-- Desktop Action Buttons -->
          <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center gap-3">
            <button
              @click="openContactModal"
              class="flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-500 text-white rounded-lg transition-all duration-300 transform hover:scale-105 font-semibold text-sm"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                />
              </svg>
              Contact Us
            </button>
            <button
              @click="generateQuote"
              class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition-all duration-300 transform hover:scale-105 font-semibold text-sm"
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
        </div>
      </div>
    </nav>

    <!-- Mobile menu -->
    <div
      v-if="mobileMenuOpen"
      class="lg:hidden fixed inset-0 z-50"
      @click.self="mobileMenuOpen = false"
    >
      <div class="fixed inset-0 bg-gray-900/80" @click="mobileMenuOpen = false" />
      <div
        class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 px-6 py-6 sm:max-w-sm border-l-4 border-green-600 shadow-2xl"
      >
        <div class="flex items-center justify-between mb-6">
          <router-link to="/home" class="relative flex items-center">
            <img
              class="h-10 w-auto mr-2"
              src="/public/images/nm-logo-rmbg.webp"
              alt="nmtechnology-logo"
            />
            <span class="italic text-lg font-extrabold text-white -ml-1">Technology</span>
          </router-link>
          <button
            type="button"
            class="rounded-md p-2.5 text-white hover:text-green-400 transition-colors duration-200 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500/50"
            @click="mobileMenuOpen = false"
          >
            <span class="sr-only">Close menu</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
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
          </button>
        </div>

        <div class="mt-2 flow-root">
          <div class="divide-y divide-gray-800/50">
            <div class="space-y-1 py-4">
              <router-link
                v-for="item in navigation"
                :key="item.name"
                :to="item.href"
                @click="mobileMenuOpen = false"
                class="flex items-center px-4 py-3 text-base font-semibold text-white hover:bg-gradient-to-r hover:from-gray-800 hover:to-gray-800/70 hover:text-green-400 transition-all duration-200 rounded-lg border-l-2 border-transparent hover:border-green-600"
                :class="{
                  'bg-gray-800/50 text-green-400 border-l-2 border-green-600': isActiveRoute(
                    item.href
                  ),
                }"
              >
                {{ item.name }}
              </router-link>
            </div>

            <!-- Mobile Action Buttons -->
            <div class="space-y-3 py-6">
              <button
                @click="
                  openContactModal();
                  mobileMenuOpen = false;
                "
                class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-green-600 hover:bg-green-500 text-white rounded-lg transition-all duration-300 font-semibold text-sm"
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
              <button
                @click="
                  generateQuote();
                  mobileMenuOpen = false;
                "
                class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition-all duration-300 font-semibold text-sm"
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
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                  />
                </svg>
                Get Quote
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content Starts -->
    <main class="site-content bg-gray-900">
      <!-- Hero Section - Old Template Style -->
      <section class="relative isolate">
        <svg
          class="absolute inset-x-0 top-0 -z-10 h-[64rem] w-full stroke-lime-400 [mask-image:radial-gradient(22rem_22rem_at_center,white,transparent)]"
          aria-hidden="true"
        >
          <defs>
            <pattern
              id="1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84"
              width="200"
              height="200"
              x="50%"
              y="-1"
              patternUnits="userSpaceOnUse"
            >
              <path d="M.5 200V.5H200" fill="none" />
            </pattern>
          </defs>
          <svg x="50%" y="-1" class="overflow-visible">
            <path
              d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
              stroke-width="0"
            />
          </svg>
          <rect
            width="100%"
            height="100%"
            stroke-width="0"
            fill="url(#1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84)"
          />
        </svg>
        <div
          class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
          aria-hidden="true"
        >
          <div
            class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30"
            style="
              clip-path: polygon(
                63.1% 29.5%,
                100% 17.1%,
                76.6% 3%,
                48.4% 0%,
                44.6% 4.7%,
                54.5% 25.3%,
                59.8% 49%,
                55.2% 57.8%,
                44.4% 57.2%,
                27.8% 47.9%,
                35.1% 81.5%,
                0% 97.7%,
                39.2% 100%,
                35.2% 81.4%,
                97.2% 52.8%,
                63.1% 29.5%
              );
            "
          ></div>
        </div>
        <div class="overflow-hidden">
          <div class="mx-auto max-w-7xl px-6 pb-32 pt-36 sm:pt-60 lg:px-8 lg:pt-32">
            <div
              class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center"
            >
              <div class="w-full max-w-xl lg:shrink-0 xl:max-w-2xl">
                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                  We're changing the way you are protected and Served Right Here In <img class="w-16 h-16" src="/public/images/zia-symbol.webp" alt="New Mexico Logo"></img>
                  <h1 class="text-yellow-400">New Mexico</h1>
                </h1>
                <p
                  class="relative mt-6 text-lg leading-8 text-white sm:max-w-md lg:max-w-none"
                >
                  By utilizing integrated technology here in New Mexico to protect your
                  home or business, customers can automate routine tasks and create
                  customized settings based on your preferences. By offering a full range
                  of security services and products that address both physical and cyber
                  threats, we can protect organizations of all types and sizes protect
                  their people, assets, and data. In addition, we offer ongoing
                  maintenance and support services to ensure that these systems continue
                  to function effectively over time.
                </p>

                <div class="mt-10 flex items-center gap-x-6">
                  <button
                    @click="openContactModal"
                    class="rounded-md bg-green-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 transition-all duration-300"
                  >
                    Get started
                  </button>
                  <button
                    @click="generateQuote"
                    class="rounded-md bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 transition-all duration-300"
                  >
                    Get Quote
                  </button>
                </div>
              </div>
              <div
                class="mt-14 flex justify-end gap-8 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0"
              >
                <div
                  class="ml-auto w-44 flex-none space-y-8 pt-32 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-80"
                >
                  <div class="relative">
                    <img
                      src="/public/images/google-doorbellcam.webp"
                      alt=""
                      class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg"
                    />
                    <div
                      class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"
                    ></div>
                  </div>
                </div>
                <div class="mr-auto w-44 flex-none space-y-8 sm:mr-0 sm:pt-52 lg:pt-36">
                  <div class="relative">
                    <img
                      src="/public/images/security-cam-1.webp"
                      alt=""
                      class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg"
                    />
                    <div
                      class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"
                    ></div>
                  </div>
                  <div class="relative">
                    <img
                      src="/public/images/smart-access-control.webp"
                      alt=""
                      class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg"
                    />
                    <div
                      class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"
                    ></div>
                  </div>
                </div>
                <div class="w-44 flex-none space-y-8 pt-32 sm:pt-0">
                  <div class="relative">
                    <img
                      src="/public/images/IT-rack.webp"
                      alt=""
                      class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg"
                    />
                    <div
                      class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"
                    ></div>
                  </div>
                  <div class="relative">
                    <img
                      src="/public/images/code-dev.webp"
                      alt=""
                      class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg"
                    />
                    <div
                      class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Components -->
      <Pricing />
      <BlackGradient />
      <SectionService />
      <SectionOne />
      <HomeFooter />
    </main>

    <!-- Modals -->
    <ContactModal ref="contactModalRef" />
  </div>
</template>

<script setup>
import SectionService from "../components/SectionService.vue";
import SectionOne from "../components/SectionOne.vue";
import BlackGradient from "../components/BlackGradient.vue";
import HomeFooter from "../components/HomeFooter.vue";
import Pricing from "../components/Pricing.vue";
import ContactModal from "../components/ContactModal.vue";
import { ref, provide } from "vue";
import { useRouter } from "vue-router";

const contactModalRef = ref(null);
const router = useRouter();
const mobileMenuOpen = ref(false);

// Navigation items
const navigation = [
  { name: "Home", href: "/home" },
  { name: "CCTV", href: "/cctv" },
  { name: "Security Systems", href: "/cctv" },
  { name: "Fire Alarms", href: "/cctv" },
  { name: "Networking", href: "/cctv" },
  { name: "Structured Cabling", href: "/cctv" },
];

const openContactModal = () => {
  if (contactModalRef.value) {
    contactModalRef.value.openModalFromOptions();
  }
};

// Provide the openContactModal function to child components
provide("openContactModal", openContactModal);
const generateQuote = () => {
  router.push("/cctv");
};

// Check if route is active
const isActiveRoute = (href) => {
  return router.currentRoute.value.path === href;
};
</script>

<style scoped>
.site-wrapper {
  position: relative;
  overflow-x: hidden;
  min-height: 100vh;
  background: #0a0f1a;
}

/* Modern Glowing Orb Background Effects */
.site-wrapper::before {
  content: "";
  position: fixed;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(
      circle at 20% 20%,
      rgba(74, 222, 128, 0.08) 0%,
      transparent 25%
    ),
    radial-gradient(circle at 80% 80%, rgba(34, 197, 94, 0.06) 0%, transparent 25%),
    radial-gradient(circle at 50% 50%, rgba(16, 185, 129, 0.04) 0%, transparent 30%);
  animation: orbitGlow 30s ease-in-out infinite;
  z-index: 1;
  pointer-events: none;
  filter: blur(60px);
}

@keyframes orbitGlow {
  0%,
  100% {
    transform: translate(0, 0) rotate(0deg);
    opacity: 0.4;
  }
  33% {
    transform: translate(5%, -5%) rotate(120deg);
    opacity: 0.6;
  }
  66% {
    transform: translate(-5%, 5%) rotate(240deg);
    opacity: 0.5;
  }
}

/* Mesh Gradient Overlay */
.site-wrapper::after {
  content: "";
  position: fixed;
  inset: 0;
  background: linear-gradient(
      135deg,
      transparent 0%,
      rgba(74, 222, 128, 0.02) 50%,
      transparent 100%
    ),
    linear-gradient(
      225deg,
      transparent 0%,
      rgba(34, 197, 94, 0.015) 50%,
      transparent 100%
    );
  z-index: 1;
  pointer-events: none;
  animation: meshShift 20s ease-in-out infinite alternate;
}

@keyframes meshShift {
  0% {
    opacity: 0.3;
  }
  100% {
    opacity: 0.7;
  }
}

/* Modern Glowing Orb Background Effects */
.site-wrapper::before {
  content: "";
  position: fixed;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(
      circle at 20% 20%,
      rgba(74, 222, 128, 0.08) 0%,
      transparent 25%
    ),
    radial-gradient(circle at 80% 80%, rgba(34, 197, 94, 0.06) 0%, transparent 25%),
    radial-gradient(circle at 50% 50%, rgba(16, 185, 129, 0.04) 0%, transparent 30%);
  animation: orbitGlow 30s ease-in-out infinite;
  z-index: 1;
  pointer-events: none;
  filter: blur(60px);
}

@keyframes orbitGlow {
  0%,
  100% {
    transform: translate(0, 0) rotate(0deg);
    opacity: 0.4;
  }
  33% {
    transform: translate(5%, -5%) rotate(120deg);
    opacity: 0.6;
  }
  66% {
    transform: translate(-5%, 5%) rotate(240deg);
    opacity: 0.5;
  }
}

/* Mesh Gradient Overlay */
.site-wrapper::after {
  content: "";
  position: fixed;
  inset: 0;
  background: linear-gradient(
      135deg,
      transparent 0%,
      rgba(74, 222, 128, 0.02) 50%,
      transparent 100%
    ),
    linear-gradient(
      225deg,
      transparent 0%,
      rgba(34, 197, 94, 0.015) 50%,
      transparent 100%
    );
  z-index: 1;
  pointer-events: none;
  animation: meshShift 20s ease-in-out infinite alternate;
}

@keyframes meshShift {
  0% {
    opacity: 0.3;
  }
  100% {
    opacity: 0.7;
  }
}

.site-content {
  position: relative;
  z-index: 10;
}

/* Enhanced Desert Parallax Background */
.fixed-parallax {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  z-index: 0;
  opacity: 0.25;
  filter: brightness(0.7) contrast(1.1);
  transition: opacity 0.5s ease;
}

.fixed-parallax::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to bottom,
    rgba(10, 15, 26, 0.4) 0%,
    rgba(15, 23, 42, 0.7) 50%,
    rgba(10, 15, 26, 0.9) 100%
  );
  z-index: 1;
  pointer-events: none;
}

.fixed-parallax::after {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(
      circle at 20% 30%,
      rgba(74, 222, 128, 0.03) 0%,
      transparent 40%
    ),
    radial-gradient(circle at 80% 70%, rgba(34, 197, 94, 0.02) 0%, transparent 40%);
  z-index: 2;
  pointer-events: none;
  animation: parallaxGlow 15s ease-in-out infinite alternate;
}

@keyframes parallaxGlow {
  0% {
    opacity: 0.3;
  }
  100% {
    opacity: 0.6;
  }
}

/* Enhanced Security Hero Section with Modern Glow */
.hero-section {
  position: relative;
  min-height: 90vh;
  padding: 8rem 0 6rem;
  overflow: hidden;
  background: radial-gradient(
      ellipse at 30% 20%,
      rgba(74, 222, 128, 0.12) 0%,
      transparent 40%
    ),
    radial-gradient(ellipse at 70% 80%, rgba(34, 197, 94, 0.08) 0%, transparent 40%),
    radial-gradient(circle at 50% 0%, rgba(16, 185, 129, 0.06) 0%, transparent 50%),
    linear-gradient(180deg, rgba(10, 15, 26, 0.2) 0%, rgba(15, 23, 42, 0.7) 100%);
  animation: heroGlow 10s ease-in-out infinite alternate;
  backdrop-filter: blur(0.5px);
}

/* Floating light particles effect */
.hero-section::after {
  content: "";
  position: absolute;
  inset: 0;
  background-image: radial-gradient(circle, rgba(74, 222, 128, 0.4) 1px, transparent 1px),
    radial-gradient(circle, rgba(34, 197, 94, 0.3) 1px, transparent 1px);
  background-size: 50px 50px, 80px 80px;
  background-position: 0 0, 40px 40px;
  opacity: 0.1;
  animation: particleFloat 40s linear infinite;
  pointer-events: none;
}

@keyframes particleFloat {
  0% {
    transform: translateY(0);
  }
  100% {
    transform: translateY(-100px);
  }
}

@keyframes heroGlow {
  0% {
    background-position: 0% 0%, 100% 100%;
  }
  100% {
    background-position: 100% 100%, 0% 0%;
  }
}

/* Enhanced Security Section Styling */
.content-section {
  position: relative;
  padding: 6rem 1.5rem;
  background: linear-gradient(
    165deg,
    rgba(15, 23, 42, 0.95) 0%,
    rgba(17, 24, 39, 0.95) 100%
  );
  overflow: hidden;
  border-bottom: 1px solid rgba(74, 222, 128, 0.1);
}

.content-section::before {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(
      ellipse 900px 700px at 120% 50%,
      rgba(74, 222, 128, 0.1) 0%,
      transparent 50%
    ),
    radial-gradient(
      ellipse 700px 900px at -20% 50%,
      rgba(34, 197, 94, 0.08) 0%,
      transparent 50%
    ),
    radial-gradient(circle 500px at 50% 0%, rgba(16, 185, 129, 0.05) 0%, transparent 50%);
  pointer-events: none;
  animation: sectionGlow 15s ease-in-out infinite alternate;
  filter: blur(50px);
  z-index: 0;
}

/* Security Grid Pattern Overlay */
.content-section::after {
  content: "";
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(74, 222, 128, 0.02) 1px, transparent 1px),
    linear-gradient(90deg, rgba(74, 222, 128, 0.02) 1px, transparent 1px);
  background-size: 50px 50px;
  pointer-events: none;
  opacity: 0.3;
  animation: gridPulse 20s ease-in-out infinite;
}

@keyframes gridPulse {
  0%,
  100% {
    opacity: 0.2;
  }
  50% {
    opacity: 0.4;
  }
}

@keyframes sectionGlow {
  0% {
    opacity: 0.3;
  }
  100% {
    opacity: 0.6;
  }
}

.content-section.alt {
  background: linear-gradient(165deg, #0a0f1a 0%, #0f172a 100%);
}

.content-section.alt::before {
  background: radial-gradient(
      circle at -20% 50%,
      rgba(74, 222, 128, 0.04) 0%,
      transparent 50%
    ),
    radial-gradient(circle at 120% 50%, rgba(34, 197, 94, 0.02) 0%, transparent 50%);
}

/* Content wrapper */
.content-wrapper {
  position: relative;
  max-width: 1400px;
  margin: 0 auto;
  z-index: 1;
}

/* Section header with tag and line */
.section-header {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  margin-bottom: 3rem;
  opacity: 0;
  transform: translateY(20px);
  animation: fadeInUp 0.8s ease forwards;
}

.section-tag {
  position: relative;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.75rem 1.5rem;
  font-size: 0.875rem;
  font-weight: 600;
  letter-spacing: 0.05em;
  text-transform: uppercase;
  color: #4ade80;
  background: rgba(74, 222, 128, 0.1);
  border: 1px solid rgba(74, 222, 128, 0.2);
  border-radius: 9999px;
  white-space: nowrap;
  transition: all 0.3s ease;
  overflow: hidden;
}

.section-tag::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
  transform: translateX(-100%);
  animation: shimmerMove 3s ease-in-out infinite;
}

@keyframes shimmerMove {
  to {
    transform: translateX(100%);
  }
}

.section-line {
  flex: 1;
  height: 1px;
  background: linear-gradient(
    90deg,
    rgba(74, 222, 128, 0.3) 0%,
    rgba(74, 222, 128, 0.1) 70%,
    transparent 100%
  );
  position: relative;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .section-header {
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
  }

  .section-line {
    width: 100%;
  }

  .content-section {
    padding: 4rem 1.5rem;
  }
}
.security-card.featured {
  background: linear-gradient(
    135deg,
    rgba(22, 163, 74, 0.08) 0%,
    rgba(17, 24, 39, 0.98) 40%,
    rgba(15, 23, 42, 0.98) 60%,
    rgba(34, 197, 94, 0.06) 100%
  );
  border: 1px solid rgba(74, 222, 128, 0.12);
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
}

.security-card.featured::before {
  background: radial-gradient(
      circle at 0% 0%,
      rgba(74, 222, 128, 0.08) 0%,
      transparent 50%
    ),
    radial-gradient(circle at 100% 100%, rgba(34, 197, 94, 0.06) 0%, transparent 50%);
}

.security-card.featured:hover {
  background: linear-gradient(
    135deg,
    rgba(22, 163, 74, 0.12) 0%,
    rgba(17, 24, 39, 0.98) 40%,
    rgba(15, 23, 42, 0.98) 60%,
    rgba(34, 197, 94, 0.1) 100%
  );
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.4), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
}

.security-card.featured:hover::before {
  background: radial-gradient(
      circle at 0% 0%,
      rgba(74, 222, 128, 0.12) 0%,
      transparent 50%
    ),
    radial-gradient(circle at 100% 100%, rgba(34, 197, 94, 0.1) 0%, transparent 50%);
}

/* Card Icons */
.security-icon {
  width: 3rem;
  height: 3rem;
  background: linear-gradient(135deg, #22c55e, #16a34a);
  border-radius: 0.75rem;
  padding: 0.75rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 0 20px rgba(74, 222, 128, 0.2);
}

/* Enhanced Security Badge */
.security-badge {
  display: inline-flex;
  align-items: center;
  background: linear-gradient(135deg, rgba(74, 222, 128, 0.15), rgba(34, 197, 94, 0.1));
  color: #4ade80;
  font-size: 0.875rem;
  font-weight: 700;
  padding: 0.5rem 1rem;
  border-radius: 9999px;
  margin-bottom: 1.5rem;
  border: 1px solid rgba(74, 222, 128, 0.25);
  box-shadow: 0 4px 6px -1px rgba(74, 222, 128, 0.1),
    0 2px 4px -1px rgba(74, 222, 128, 0.06), inset 0 1px 0 rgba(255, 255, 255, 0.05);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  backdrop-filter: blur(10px);
  position: relative;
  overflow: hidden;
}

.security-badge::before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    90deg,
    transparent,
    rgba(255, 255, 255, 0.2),
    rgba(74, 222, 128, 0.3),
    rgba(255, 255, 255, 0.2),
    transparent
  );
  animation: shimmerMove 3s ease-in-out infinite;
}

@keyframes shimmerMove {
  0% {
    left: -100%;
  }
  50%,
  100% {
    left: 200%;
  }
}

.security-badge:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 8px -2px rgba(74, 222, 128, 0.15),
    0 3px 4px -1px rgba(74, 222, 128, 0.1);
  border-color: rgba(74, 222, 128, 0.35);
  background: linear-gradient(135deg, rgba(74, 222, 128, 0.18), rgba(34, 197, 94, 0.12));
}

.security-badge:hover::before {
  animation-duration: 1s;
}

.security-badge svg {
  width: 1.125rem;
  height: 1.125rem;
  margin-right: 0.5rem;
}

/* Smooth Scroll Enhancement */
html {
  scroll-behavior: smooth;
}

/* Enhanced Section Transitions */
.security-section,
.security-card,
.security-badge {
  animation: fadeInUp 0.8s ease-out;
  animation-fill-mode: both;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Staggered animation delays for sections */
.security-section:nth-child(1) {
  animation-delay: 0.1s;
}
.security-section:nth-child(2) {
  animation-delay: 0.2s;
}
.security-section:nth-child(3) {
  animation-delay: 0.3s;
}
.security-section:nth-child(4) {
  animation-delay: 0.4s;
}
.security-section:nth-child(5) {
  animation-delay: 0.5s;
}

/* Responsive Design */
@media (max-width: 640px) {
  .hero-section {
    padding: 6rem 0 4rem;
    min-height: 80vh;
  }

  .security-section {
    padding: 3rem 1rem;
  }

  .security-container {
    padding: 0 1rem;
  }

  .security-card {
    padding: 2rem 1.5rem;
    border-radius: 1.25rem;
  }

  .security-badge {
    font-size: 0.8125rem;
    padding: 0.4rem 0.875rem;
  }
}

@media (min-width: 641px) and (max-width: 1023px) {
  .security-section {
    padding: 4.5rem 1.5rem;
  }

  .security-card {
    padding: 2.75rem 2.25rem;
    border-radius: 1.375rem;
  }
}

@media (min-width: 1024px) {
  .hero-section {
    min-height: 92vh;
  }

  .security-section {
    padding: 7rem 2rem;
  }

  .security-card {
    padding: 3.5rem 3rem;
  }
}

@media (min-width: 1280px) {
  .security-section {
    padding: 8rem 2rem;
  }

  .security-card {
    padding: 4rem 3.5rem;
  }

  .security-badge {
    font-size: 0.9375rem;
    padding: 0.625rem 1.25rem;
  }
}

/* Add smooth transitions for all interactive elements */
* {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Improve focus states for accessibility */
:focus-visible {
  outline: 2px solid rgba(74, 222, 128, 0.5);
  outline-offset: 2px;
  border-radius: 0.25rem;
}

/* Enhanced hover effects for links and buttons */
a,
button {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Subtle parallax effect on scroll */
@media (prefers-reduced-motion: no-preference) {
  .security-section::before {
    animation: parallaxFloat 20s ease-in-out infinite;
  }
}

@keyframes parallaxFloat {
  0%,
  100% {
    transform: translateY(0) scale(1);
  }
  50% {
    transform: translateY(-10px) scale(1.05);
  }
} /* Wave Transition Styling */
.wave-transition {
  position: relative;
  width: 100%;
  height: 60px;
  z-index: 40;
  margin-bottom: -1px;
}

.wave-transition--gradient {
  height: 60px;
}

.wave-gradient-overlay {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 30px;
  pointer-events: none;
  background: linear-gradient(
    to bottom,
    rgba(17, 24, 39, 0) 0%,
    rgba(17, 24, 39, 0.5) 60%,
    rgba(17, 24, 39, 0) 100%
  );
  z-index: 42;
}

.wave-transition.accent-wave {
  margin-top: 0;
  margin-bottom: 0;
}

.divider-line {
  position: absolute;
  height: 2px;
  width: 100%;
  top: 50%;
  z-index: 42;
  background: linear-gradient(
    90deg,
    transparent 0%,
    rgba(74, 222, 128, 0.5) 50%,
    transparent 100%
  );
  box-shadow: 0 0 10px rgba(74, 222, 128, 0.3), 0 0 20px rgba(74, 222, 128, 0.2);
  animation: dividerPulse 3s ease-in-out infinite;
}

@keyframes dividerPulse {
  0%,
  100% {
    opacity: 0.5;
    transform: scaleX(0.95);
  }
  50% {
    opacity: 1;
    transform: scaleX(1);
  }
}

.wave-svg {
  margin-top: -20px;
}

.wave-transition svg {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  z-index: 41;
}

@media (min-width: 640px) {
  .wave-transition {
    height: 80px;
  }

  .wave-transition--gradient {
    height: 80px;
  }

  .wave-gradient-overlay {
    height: 40px;
  }

  .divider-line {
    height: 2px;
  }
}

@media (min-width: 768px) {
  .wave-transition {
    height: 90px;
  }

  .wave-transition--gradient {
    height: 90px;
  }

  .wave-gradient-overlay {
    height: 45px;
  }

  .divider-line {
    height: 2px;
  }
}

/* Noise Texture Overlay for Depth */
.site-content::before {
  content: "";
  position: fixed;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.03'/%3E%3C/svg%3E");
  opacity: 0.4;
  pointer-events: none;
  z-index: 100;
  mix-blend-mode: overlay;
}

/* Aurora-like gradient animation */
.hero-section,
.security-section {
  position: relative;
}

.hero-section > *:not(::before):not(::after),
.security-section > *:not(::before):not(::after) {
  position: relative;
  z-index: 2;
}

/* Animation Classes */
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
  animation: fadeIn 1.2s ease-out;
}

.animate-fadeIn-delay {
  animation: fadeIn 1.4s ease-out 0.3s forwards;
  opacity: 0;
}

@keyframes pulse {
  0%,
  100% {
    opacity: 1;
  }
  50% {
    opacity: 0.5;
  }
}

/* Mobile Responsiveness */
@media (max-width: 640px) {
  .hero-section {
    padding-top: 3.5rem;
    padding-bottom: 3.5rem;
    min-height: 85vh;
  }

  h1 {
    font-size: 1.75rem !important;
    line-height: 1.25 !important;
  }

  h2 {
    font-size: 1.5rem !important;
  }

  p {
    font-size: 0.938rem !important;
    line-height: 1.5 !important;
  }
}
</style>
