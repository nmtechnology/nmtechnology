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
        class="text-center text-4xl sm:text-5xl font-bold drop-shadow-lg animate-fadeIn mb-6 text-white"
      >
        QSR Franchise
        <span
          class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
          >Security Systems</span
        >
      </h2>
      <p
        class="text-center text-gray-300 text-lg leading-relaxed mb-10 animate-fadeIn-delay max-w-4xl mx-auto px-4"
      >
        Protecting restaurants, retail, and QSR franchises across New Mexico with advanced
        CCTV and access control solutions and service. Our expert team ensures your
        business stays secure, compliant, and operational 24/7.
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
            src="/public/images/m3125lve_restaurant_2406_hi_Mediaportal - Web PNG.webp"
            alt="Bar Security"
            class="gallery-image"
            loading="lazy"
          />
          <div class="gallery-overlay">
            <span>Bar Security</span>
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
              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
            />
          </svg>
          <span class="text-sm font-semibold text-green-400">Retail Solutions</span>
        </div>
      </div>

      <h2
        class="text-center text-3xl md:text-4xl font-bold drop-shadow-lg animate-fadeIn mb-4 sm:mb-6 text-white"
      >
        Commercial
        <span
          class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
          >Retail CCTV</span
        >
      </h2>
      <p
        class="text-center text-gray-300 text-base sm:text-lg leading-relaxed mb-8 sm:mb-10 animate-fadeIn-delay max-w-4xl mx-auto px-4"
      >
        Comprehensive video surveillance for retail, offices, and commercial spaces. Deter
        theft, monitor operations, and keep your business secure 24/7. Prevent loss ahead of time or over time and track incidents with crystal-clear footage.
      </p>
    </div>
    
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
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
            />
          </svg>
          <span class="text-sm font-semibold text-green-400">Professional Service</span>
        </div>
      </div>

      <h2
        class="text-center text-3xl md:text-4xl font-bold drop-shadow-lg mb-8 text-white"
      >
        <span
          class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
          >On-site</span
        >
        Representation
      </h2>
      <p class="text-center text-gray-300 text-base sm:text-lg leading-relaxed mb-8 sm:mb-10 animate-fadeIn-delay max-w-4xl mx-auto px-4"> We can represent your company on-site for all your customers security needs. If you are not located in New Mexico but you have customers in New Mexico we can help you serve them, we provide professional world-class onsite reperesentation for your company!</p>
    </div>

    <!-- Bottom Section -->
    <section
      class="relative container bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-md border border-green-500/30 py-16 animate-fadeIn mt-12 rounded-2xl shadow-xl ring-1 ring-green-500/20"
    >
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
              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
            />
          </svg>
          <span class="text-sm font-semibold text-green-400">Our Portfolio</span>
        </div>
      </div>

      <h2
        class="text-2xl md:text-3xl font-bold text-center mb-8 drop-shadow-lg text-white"
      >
        <span
          class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
          >CCTV Installation</span
        >
        & Service Projects
      </h2>
      <p
        class="text-lg text-gray-300 text-center leading-relaxed mb-10 animate-fadeIn-delay max-w-4xl mx-auto px-4"
      >
        NM Technology is Albuquerque's leader in
        <strong
          class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
          >CCTV installation</strong
        >, security systems, and smart automation. Our portfolio showcases work for
        restaurants, retail, offices, baking institutions and industrial sites across New Mexico.
      </p>

      <div class="my-6 flex justify-center">
        <ul class="flex flex-wrap gap-3 sm:gap-4 justify-center list-none p-0 m-0" aria-label="Trusted customers">
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Brink's</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">GuardaWorld</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Chase Bank</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Dutch Bros. Coffee</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Whataburger</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Ulta Beauty</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Sephorah</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Marshall's</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">TJ Maxx</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Facebook</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Michael's</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Wal Mart</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Target</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Einstien Bagels</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Starbucks Coffee</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">Mister Carwash</li>
          <li class="inline-flex items-center px-3 py-1 rounded-full bg-gray-800/40 border border-green-500/20 text-gray-200 text-sm font-medium hover:bg-green-500/10 transition-colors">ABF Freight</li>
        </ul>
      </div>

      <p class="text-lg text-gray-300 text-center leading-relaxed mb-10 animate-fadeIn-delay max-w-4xl mx-auto px-4">
        We deliver rapid service, expert installation, and ongoing support—helping
        businesses protect assets, reduce theft, and reduce
        <strong
          class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
          >"CCTV installation Albuquerque"</strong
        >
        theft.
      </p>

      <div class="flex justify-center mt-8 mb-4">
        <div
          class="inline-flex items-center gap-2 px-4 py-2 bg-green-500/10 border border-green-500/20 rounded-full backdrop-blur-sm"
        >
          <svg
            class="w-4 h-4 text-green-400"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"
            />
          </svg>
          <span class="text-sm font-semibold text-green-400">Trusted Partner</span>
        </div>
      </div>

      <h3 class="text-xl font-semibold text-center animate-fadeIn text-white">
        Trusted by
        <span
          class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
          >New Mexico's Top Businesses & Franchises</span
        >
      </h3>
    </section>
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
