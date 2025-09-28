<template>
  <div class="relative z-40">
    <!-- Section Header -->
    <h2 class="text-white text-bold text-center text-4xl drop-shadow-lg animate-fadeIn mt-12 mb-6">
      QSR Franchise Security Systems
    </h2>
    <p class="text-center text-gray-300 text-lg mb-10 animate-fadeIn-delay max-w-4xl mx-auto px-4">
      Protecting restaurants, retail, and franchises across New Mexico with advanced CCTV and access control solutions.
    </p>
    
    <!-- Main Gallery - Modern Card-Based Layout -->
    <div class="relative container bg-gray-900/80 backdrop-blur-sm mx-auto mb-10 sm:mb-16 px-3 sm:px-6 lg:px-8 py-6 sm:py-8 rounded-xl shadow-xl">
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
    <h2 class="text-white text-bold text-center text-3xl md:text-4xl drop-shadow-lg animate-fadeIn mt-12 sm:mt-20 mb-4 sm:mb-6">
      Commercial Retail CCTV
    </h2>
    <p class="text-center text-gray-300 text-base sm:text-lg mb-8 sm:mb-10 animate-fadeIn-delay max-w-4xl mx-auto px-4">
      Comprehensive video surveillance for retail, offices, and commercial spaces. Deter theft, monitor operations, and keep your business secure 24/7.
    </p>
    
    <!-- Fire Alarm Section -->
    <h2 class="text-white text-bold text-center text-2xl sm:text-3xl md:text-4xl drop-shadow-lg mt-12 sm:mt-20 mb-4 sm:mb-6">
      Commercial Fire Alarm Service & Installation
    </h2>
    <div class="text-center mb-8 sm:mb-10">
      <button @click="openContactModal"
        class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 transition duration-300 transform hover:scale-105">
        Request a Quote
      </button>
    </div>
import { inject } from 'vue'

// Inject the contact modal function from the parent component
const openContactModal = inject('openContactModal', () => {
  // Fallback: scroll to footer if modal not available
  document.querySelector('footer')?.scrollIntoView({ behavior: 'smooth' })
})
    
    <!-- On-site Section -->
    <h2 class="text-lime-400 text-bold text-center text-3xl md:text-4xl drop-shadow-lg mt-20 mb-8">
      On-site Representation
    </h2>
    
    <!-- Bottom Section -->
    <section class="bg-gray-900/80 backdrop-blur-sm py-16 animate-fadeIn mt-12 rounded-lg">
      <h2 class="text-2xl md:text-3xl font-bold text-green-400 text-center mb-8 drop-shadow-lg">
        CCTV Installation & Security Projects
      </h2>
      <p class="text-lg text-gray-300 text-center mb-10 animate-fadeIn-delay max-w-4xl mx-auto px-4">
        NM Technology is Albuquerque's leader in <strong class="text-green-400">CCTV installation</strong>, security systems, and smart automation. Our portfolio showcases work for restaurants, retail, offices, and industrial sites across New Mexico.<br><br>
        We deliver rapid service, expert installation, and ongoing support—helping businesses protect assets, reduce theft, and appear in search results for <strong>"CCTV installation Albuquerque"</strong> and related security services.
      </p>
      
      <h3 class="text-xl font-semibold text-lime-400 text-center mt-8 animate-fadeIn">
        Trusted by New Mexico's Top Businesses & Franchises
      </h3>
    </section>
  </div>
</template>

<style scoped>
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
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
  border-radius: 0.75rem;
  height: 300px;
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  transform: translateZ(0);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  z-index: 10;
}

.gallery-card:hover {
  transform: scale(1.03);
  box-shadow: 0 20px 25px -5px rgba(34, 197, 94, 0.1), 0 10px 10px -5px rgba(34, 197, 94, 0.04);
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
  background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 50%, transparent 100%);
  padding: 1.5rem 1rem;
  color: white;
  font-weight: 600;
  z-index: 20;
  transform: translateY(20%);
  opacity: 0;
  transition: transform 0.3s ease, opacity 0.3s ease;
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
    background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.6) 50%, transparent 100%);
  }
}
</style>
