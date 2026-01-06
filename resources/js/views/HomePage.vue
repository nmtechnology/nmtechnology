<template>
  <div class="site-wrapper">
    <!-- Main Content Starts -->
    <main class="site-content bg-gradient-to-b from-black via-gray-900 to-gray-900/10">
      <!-- Hero Section -->
      <section class="relative isolate overflow-hidden">
        <!-- Decorative Background Blurs -->
        <div
          class="absolute top-1/4 left-0 w-[600px] h-[600px] bg-gradient-to-br from-green-500/10 to-lime-500/5 rounded-full blur-3xl -z-10"
          aria-hidden="true"
        ></div>
        <div
          class="absolute top-1/2 right-0 w-[500px] h-[500px] bg-gradient-to-tl from-lime-500/10 to-green-500/10 rounded-full blur-3xl -z-10"
          aria-hidden="true"
        ></div>

        <svg
          class="absolute inset-x-0 top-0 -z-10 h-[64rem] w-full stroke-green-600/10 [mask-image:radial-gradient(22rem_22rem_at_center,white,transparent)]"
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
        <div class="overflow-hidden">
          <div class="mx-auto max-w-7xl px-6 pb-32 pt-36 sm:pt-60 lg:px-8 lg:pt-32">
            <div
              class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center"
            >
              <div class="w-full max-w-xl lg:shrink-0 xl:max-w-2xl">
                <!-- Badge -->
                <div
                  class="inline-flex items-center gap-2 px-4 py-2 bg-green-500/10 border border-green-500/20 rounded-full mb-6 backdrop-blur-sm"
                >
                  <svg
                    class="w-4 h-4 text-lime-400"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  <span class="text-sm font-semibold text-green-400"
                    >New Mexico's Trusted Security Experts</span
                  >
                </div>

                <h1
                  class="text-4xl font-bold tracking-tight sm:text-6xl flex flex-wrap items-center gap-2 mb-6"
                >
                  <span class="text-white">We're Changing The Way You Are</span>
                  <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
                    >Protected & Served</span
                  >
                  <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-green-100 to-white/30"
                    >Right Here In</span
                  >
                  <img
                    class="w-12 h-12 sm:w-16 sm:h-16 inline-block"
                    :src="ziaSymbol"
                    alt="New Mexico Logo"
                  />
                  <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-green-100 to-white/30"
                    >New Mexico</span
                  >
                </h1>

                <p
                  class="relative mt-6 text-lg leading-8 text-gray-300 sm:max-w-md lg:max-w-none"
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

                <div
                  class="mt-10 flex flex-col sm:flex-row items-stretch sm:items-center gap-4 sm:gap-x-6"
                >
                  <button
                    @click="openContactModal"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 text-white rounded-lg font-semibold shadow-lg shadow-green-500/30 transition-all duration-300 transform hover:scale-105"
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
                        d="M13 10V3L4 14h7v7l9-11h-7z"
                      />
                    </svg>
                    Contact Us
                  </button>
                  <button
                    @click="generateQuote"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-700/50 text-green-400 ring-1 ring-inset ring-green-600/50 hover:bg-gray-700 hover:ring-green-500 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105"
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
              <div
                class="mt-14 flex justify-end gap-8 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0"
              >
                <div
                  class="ml-auto w-44 flex-none space-y-8 pt-32 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-80"
                >
                  <div class="relative group">
                    <img
                      src="/public/images/google-doorbellcam.webp"
                      alt=""
                      class="aspect-[2/3] w-full rounded-2xl bg-gray-900/5 object-cover shadow-xl transition-all duration-300 group-hover:shadow-2xl group-hover:shadow-green-500/20"
                    />
                    <div
                      class="pointer-events-none absolute inset-0 rounded-2xl ring-1 ring-inset ring-green-500/20 group-hover:ring-green-500/40 transition-all duration-300"
                    ></div>
                  </div>
                </div>
                <div class="mr-auto w-44 flex-none space-y-8 sm:mr-0 sm:pt-52 lg:pt-36">
                  <div class="relative group">
                    <img
                      src="/public/images/security-cam-1.webp"
                      alt=""
                      class="aspect-[2/3] w-full rounded-2xl bg-gray-900/5 object-cover shadow-xl transition-all duration-300 group-hover:shadow-2xl group-hover:shadow-green-500/20"
                    />
                    <div
                      class="pointer-events-none absolute inset-0 rounded-2xl ring-1 ring-inset ring-green-500/20 group-hover:ring-green-500/40 transition-all duration-300"
                    ></div>
                  </div>
                  <div class="relative group">
                    <img
                      src="/public/images/smart-access-control.webp"
                      alt=""
                      class="aspect-[2/3] w-full rounded-2xl bg-gray-900/5 object-cover shadow-xl transition-all duration-300 group-hover:shadow-2xl group-hover:shadow-green-500/20"
                    />
                    <div
                      class="pointer-events-none absolute inset-0 rounded-2xl ring-1 ring-inset ring-green-500/20 group-hover:ring-green-500/40 transition-all duration-300"
                    ></div>
                  </div>
                </div>
                <div class="w-44 flex-none space-y-8 pt-32 sm:pt-0">
                  <div class="relative group">
                    <img
                      src="/public/images/IT-rack.webp"
                      alt=""
                      class="aspect-[2/3] w-full rounded-2xl bg-gray-900/5 object-cover shadow-xl transition-all duration-300 group-hover:shadow-2xl group-hover:shadow-green-500/20"
                    />
                    <div
                      class="pointer-events-none absolute inset-0 rounded-2xl ring-1 ring-inset ring-green-500/20 group-hover:ring-green-500/40 transition-all duration-300"
                    ></div>
                  </div>
                  <div class="relative group">
                    <img
                      src="/public/images/code-dev.webp"
                      alt=""
                      class="aspect-[2/3] w-full rounded-2xl bg-gray-900/5 object-cover shadow-xl transition-all duration-300 group-hover:shadow-2xl group-hover:shadow-green-500/20"
                    />
                    <div
                      class="pointer-events-none absolute inset-0 rounded-2xl ring-1 ring-inset ring-green-500/20 group-hover:ring-green-500/40 transition-all duration-300"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Components with Better Organization -->

      <!-- Services Section -->

      <div class="relative">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 mb-12"></div>
        <SectionService />
      </div>
     
      <!-- Commercial Solutions Section -->
     
      <SectionOne />
      <WorkCollage />

      <!-- Pricing Section -->

      <Pricing />

      <!-- Footer -->
      <HomeFooter />
    </main>
  </div>
</template>

<script setup>
import { inject } from "vue";
import { useRouter } from "vue-router";
import SectionService from "../components/SectionService.vue";
import SectionOne from "../components/SectionOne.vue";
import HomeFooter from "../components/HomeFooter.vue";
import Pricing from "../components/Pricing.vue";
import WorkCollage from "../components/WorkCollage.vue";
import ziaSymbol from '/images/zia-symbol.webp';

const router = useRouter();
const openContactModal = inject("openContactModal");

const generateQuote = () => {
  router.push("/products");
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
      rgba(174, 248, 0, 0.08) 0%,
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
