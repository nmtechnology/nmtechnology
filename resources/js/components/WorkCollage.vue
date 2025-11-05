<template>
  <div class="relative z-40 bg-gradient-to-b from-black via-gray-900 to-gray-900">
    <!-- Decorative blur orbs -->
    <div
      class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-gradient-to-br from-green-500/10 to-lime-500/5 rounded-full blur-3xl pointer-events-none"
    ></div>
    <div
      class="absolute top-1/3 right-1/4 w-[500px] h-[500px] bg-gradient-to-br from-lime-500/10 to-green-500/5 rounded-full blur-3xl pointer-events-none"
    ></div>

    <!-- Section Header -->
    <div class="relative pt-12">
      <!-- Badge -->
      <div class="flex justify-center mb-6 animate-fadeIn">
        <div
          class="inline-flex items-center gap-2 px-4 py-2 bg-green-500/10 border border-green-500/20 rounded-full backdrop-blur-sm"
        >
          <svg
            class="w-5 h-5 text-green-400"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
            />
          </svg>
          <span class="text-sm font-semibold text-green-400"
            >Advanced Security Solutions</span
          >
        </div>
      </div>

      <h2
        class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400 text-center text-4xl sm:text-5xl font-bold drop-shadow-lg animate-fadeIn mb-6"
      >
        QSR Franchise Security Systems
      </h2>
      <p
        class="text-center text-gray-300 text-lg leading-relaxed mb-10 animate-fadeIn-delay max-w-4xl mx-auto px-4"
      >
        Protecting restaurants, retail, and franchises across New Mexico with advanced
        CCTV and access control solutions.
      </p>
    </div>

    <!-- Main Gallery - Modern Card-Based Layout -->
    <div
      class="relative container bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-md border border-green-500/30 mx-auto mb-10 sm:mb-16 px-3 sm:px-6 lg:px-8 py-6 sm:py-8 rounded-2xl shadow-xl ring-1 ring-green-500/20"
    >
      <!-- Gallery grid with improved mobile layout -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
        <div class="gallery-card">
          <img
            src="/public/images/m3125lve_w_weather_shield_2406_hi_Mediaportal - Web PNG.webp"
            alt="Security Camera"
            class="gallery-image"
            loading="lazy"
          />
          <div class="gallery-overlay">
            <span>HD CCTV Systems</span>
          </div>
        </div>

        <div class="gallery-card">
          <img
            src="/public/images/mobile-lock.webp"
            alt="Mobile Security"
            class="gallery-image"
            loading="lazy"
          />
          <div class="gallery-overlay">
            <span>Mobile Access Control</span>
          </div>
        </div>

        <div class="gallery-card">
          <img
            src="/public/images/retail-clothing-cctv.webp"
            alt="Retail CCTV"
            class="gallery-image"
            loading="lazy"
          />
          <div class="gallery-overlay">
            <span>Retail Security</span>
          </div>
        </div>

        <div class="gallery-card">
          <img
            src="/public/images/cctv-store.webp"
            alt="Store CCTV"
            class="gallery-image"
            loading="lazy"
          />
          <div class="gallery-overlay">
            <span>Store Surveillance</span>
          </div>
        </div>

        <div class="gallery-card">
          <img
            src="/public/images/cctv-restaurant.webp"
            alt="Restaurant CCTV"
            class="gallery-image"
            loading="lazy"
          />
          <div class="gallery-overlay">
            <span>Restaurant Security</span>
          </div>
        </div>

        <div class="gallery-card">
          <img
            src="/public/images/cctv-corner.webp"
            alt="Corner CCTV"
            class="gallery-image"
            loading="lazy"
          />
          <div class="gallery-overlay">
            <span>Corner Monitoring</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Commercial Section -->
    <div class="relative mt-12 sm:mt-20">
      <h2
        class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400 text-center text-3xl md:text-4xl font-bold drop-shadow-lg animate-fadeIn mb-4 sm:mb-6"
      >
        Commercial Retail CCTV
      </h2>
      <p
        class="text-center text-gray-300 text-base sm:text-lg leading-relaxed mb-8 sm:mb-10 animate-fadeIn-delay max-w-4xl mx-auto px-4"
      >
        Comprehensive video surveillance for retail, offices, and commercial spaces. Deter
        theft, monitor operations, and keep your business secure 24/7.
      </p>
    </div>

    <!-- Fire Alarm Section -->
    <div class="relative mt-12 sm:mt-20">
      <h2
        class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400 text-center text-2xl sm:text-3xl md:text-4xl font-bold drop-shadow-lg mb-4 sm:mb-6"
      >
        Commercial Fire Alarm Service & Installation
      </h2>
      <div class="text-center mb-8 sm:mb-10">
        <button
          @click="openContactModal"
          class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 text-white rounded-lg font-semibold shadow-lg shadow-green-500/30 transition-all duration-300 transform hover:scale-105"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
            />
          </svg>
          Request a Quote
        </button>
      </div>
    </div>

    <!-- On-site Section -->
    <div class="relative mt-20">
      <h2
        class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400 text-center text-3xl md:text-4xl font-bold drop-shadow-lg mb-8"
      >
        On-site Representation
      </h2>
    </div>

    <!-- Bottom Section -->
    <section
      class="relative bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-md border border-green-500/30 py-16 animate-fadeIn mt-12 rounded-2xl shadow-xl ring-1 ring-green-500/20"
    >
      <h2
        class="text-2xl md:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400 text-center mb-8 drop-shadow-lg"
      >
        CCTV Installation & Security Projects
      </h2>
      <p
        class="text-lg text-gray-300 text-center leading-relaxed mb-10 animate-fadeIn-delay max-w-4xl mx-auto px-4"
      >
        NM Technology is Albuquerque's leader in
        <strong
          class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
          >CCTV installation</strong
        >, security systems, and smart automation. Our portfolio showcases work for
        restaurants, retail, offices, and industrial sites across New Mexico.<br /><br />
        We deliver rapid service, expert installation, and ongoing support—helping
        businesses protect assets, reduce theft, and appear in search results for
        <strong
          class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
          >"CCTV installation Albuquerque"</strong
        >
        and related security services.
      </p>

      <h3
        class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400 text-center mt-8 animate-fadeIn"
      >
        Trusted by New Mexico's Top Businesses & Franchises
      </h3>
    </section>
  </div>
</template>

<style scoped>
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

/* Modern Card Styling */
.gallery-card {
  position: relative;
  overflow: hidden;
  border-radius: 1rem;
  height: 300px;
  background: linear-gradient(to bottom right, rgb(31, 41, 55), rgb(17, 24, 39));
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(34, 197, 94, 0.2);
  transform: translateZ(0);
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
  z-index: 10;
}

.gallery-card:hover {
  transform: scale(1.05);
  box-shadow: 0 20px 25px -5px rgba(34, 197, 94, 0.3),
    0 10px 10px -5px rgba(34, 197, 94, 0.2);
  border-color: rgba(34, 197, 94, 0.4);
}

.gallery-image {
  position: relative;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  z-index: 10;
  transition: transform 0.6s ease;
}

.gallery-card:hover .gallery-image {
  transform: scale(1.08);
}

.gallery-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(
    to top,
    rgba(0, 0, 0, 0.9) 0%,
    rgba(0, 0, 0, 0.6) 50%,
    transparent 100%
  );
  padding: 1.5rem 1rem;
  z-index: 20;
  transform: translateY(20%);
  opacity: 0;
  transition: transform 0.3s ease, opacity 0.3s ease;
}

.gallery-overlay span {
  background: linear-gradient(to right, rgb(74, 222, 128), rgb(163, 230, 53));
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  font-weight: 700;
  font-size: 1.125rem;
}

.gallery-card:hover .gallery-overlay {
  transform: translateY(0);
  opacity: 1;
}

@media (max-width: 640px) {
  .gallery-card {
    height: 200px;
  }

  h2.text-4xl {
    font-size: 1.75rem;
    line-height: 2.25rem;
  }

  h2.text-3xl {
    font-size: 1.5rem;
    line-height: 2rem;
  }

  p.text-lg {
    font-size: 1rem;
    line-height: 1.5rem;
  }
}

@media (max-width: 480px) {
  .gallery-card {
    height: 180px;
  }

  .gallery-overlay {
    padding: 1rem 0.75rem;
    transform: translateY(0);
    opacity: 0.9;
    background: linear-gradient(
      to top,
      rgba(0, 0, 0, 0.9) 0%,
      rgba(0, 0, 0, 0.6) 50%,
      transparent 100%
    );
  }
}
</style>

<script setup>
import { inject } from "vue";

// Inject the contact modal function from the parent component
const openContactModal = inject("openContactModal", () => {
  // Fallback: scroll to footer if modal not available
  document.querySelector("footer")?.scrollIntoView({ behavior: "smooth" });
});
</script>
