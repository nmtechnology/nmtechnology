<template>
  <NmtSurface class="security-faqs bg-black rounded-lg backdrop-blur-sm p-6 mb-8 overflow-hidden">
    <!-- Header (aligned with Learn page style) -->
    <header class="mb-8 text-center">
      <div class="flex justify-center mb-4">
        <div class="relative">
          <div class="absolute -inset-2 bg-black/20 rounded-full blur-lg animate-pulse"></div>
          <div class="relative bg-black-600 p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
          </div>
        </div>
      </div>

      <h2 class="text-3xl md:text-4xl font-bold tracking-tight text-white mb-3">Security System FAQs</h2>
      <p class="mt-2 text-gray-300 max-w-3xl mx-auto">Discover why investing in a modern security system is one of the smartest decisions you can make for your home or business.</p>
    </header>

    <!-- Why Invest in Security - Visual Statistics Section -->
    <div class="mb-16">
      <h3 class="text-2xl font-bold text-white mb-8 text-center">Why Invest in Security?</h3>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Statistic Card 1 -->
        <div @mouseenter="animateCounter('burglaryCounter', 30)" class="nmt-card hover:scale-105 transition-transform duration-300 animate-fadeIn">
          <div class="flex justify-center mb-4">
            <div class="bg-red-600/20 p-3 rounded-full animate-float">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
              </svg>
            </div>
          </div>
          <h4 class="text-lg font-semibold text-white text-center">Every</h4>
          <div class="text-4xl font-extrabold text-center text-red-400 my-2">
            {{ burglaryCounter }}<span class="text-lg">sec</span>
          </div>
          <p class="text-center text-gray-300">A home burglary occurs in the United States</p>
        </div>

        <!-- Statistic Card 2 -->
        <div @mouseenter="animateCounter('preventionCounter', 300)" class="nmt-card hover:scale-105 transition-transform duration-300 animate-fadeIn">
          <div class="flex justify-center mb-4">
            <div class="bg-green-600/20 p-3 rounded-full animate-float">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
          </div>
          <h4 class="text-lg font-semibold text-white text-center"><span class="text-3xl text-green-400 font-extrabold">{{ preventionCounter }}%</span></h4>
          <p class="text-center text-gray-300 mt-3">Higher chance of burglary for homes without security systems</p>
        </div>

        <!-- Statistic Card 3 -->
        <div @mouseenter="animateCounter('savingsCounter', 20)" class="nmt-card hover:scale-105 transition-transform duration-300 animate-fadeIn">
          <div class="flex justify-center mb-4">
            <div class="bg-yellow-600/20 p-3 rounded-full animate-float">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
          </div>
          <h4 class="text-lg font-semibold text-white text-center">Up to</h4>
          <div class="text-4xl font-extrabold text-center text-yellow-400 my-2">
            {{ savingsCounter }}<span class="text-lg">%</span>
          </div>
          <p class="text-center text-gray-300">Savings on home insurance premiums</p>
        </div>

        <!-- Statistic Card 4 -->
        <div @mouseenter="animateCounter('responseCounter', 50)" class="nmt-card hover:scale-105 transition-transform duration-300 animate-fadeIn">
          <div class="flex justify-center mb-4">
            <div class="bg-blue-600/20 p-3 rounded-full animate-float">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
          </div>
          <h4 class="text-lg font-semibold text-white text-center">Reduces response time by</h4>
          <div class="text-4xl font-extrabold text-center text-blue-400 my-2">
            {{ responseCounter }}<span class="text-lg">%</span>
          </div>
          <p class="text-center text-gray-300">Monitored security systems significantly reduce emergency response times</p>
        </div>
      </div>
    </div>

    <!-- With vs Without Security System Comparison -->
    <div class="mb-16">
      <h3 class="text-2xl font-bold text-white mb-8 text-center">The Security Difference</h3>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-4">
        <!-- Without Security -->
        <div class="nmt-card border-red-900/30 relative overflow-hidden animate-fadeIn">
          <div class="absolute top-0 right-0 bg-red-900/40 text-white px-4 py-1 rounded-bl-lg font-medium">WITHOUT SECURITY</div>
          
          <div class="mt-6">
            <div class="flex items-center mb-4">
              <div class="mr-4 bg-red-600/20 p-2 rounded-full animate-float">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
              <p class="text-gray-300">Higher risk of break-ins and property loss</p>
            </div>
            
            <div class="flex items-center mb-4">
              <div class="mr-4 bg-red-600/20 p-2 rounded-full animate-float">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
              <p class="text-gray-300">No video evidence for insurance claims or police reports</p>
            </div>            
            <div class="flex items-center mb-4">
              <div class="mr-4 bg-red-600/20 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
              <p class="text-gray-300">Longer emergency response times in crisis situations</p>
            </div>
            
            <div class="flex items-center mb-4">
              <div class="mr-4 bg-red-600/20 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
              <p class="text-gray-300">No deterrent for potential intruders</p>
            </div>
            
            <div class="flex items-center mb-4">
              <div class="mr-4 bg-red-600/20 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
              <p class="text-gray-300">Higher insurance premiums</p>
            </div>
            
            <div class="flex items-center">
              <div class="mr-4 bg-red-600/20 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
              <p class="text-gray-300">Constant worry about property when away from home</p>
            </div>
          </div>
        </div>
        
        <!-- With Security -->
        <div class="nmt-card border-green-900/30 relative overflow-hidden animate-fadeIn">
          <div class="absolute top-0 right-0 bg-green-900/40 text-white px-4 py-1 rounded-bl-lg font-medium">WITH SECURITY</div>
          
          <div class="mt-6">
            <div class="flex items-center mb-4">
              <div class="mr-4 bg-green-600/20 p-2 rounded-full animate-float">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <p class="text-gray-300">Significantly reduced risk of break-ins (up to 83%)</p>
            </div>            
            <div class="flex items-center mb-4">
              <div class="mr-4 bg-green-600/20 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <p class="text-gray-300">Video evidence for police investigations and insurance claims</p>
            </div>
            
            <div class="flex items-center mb-4">
              <div class="mr-4 bg-green-600/20 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <p class="text-gray-300">Rapid emergency response from monitoring services</p>
            </div>
            
            <div class="flex items-center mb-4">
              <div class="mr-4 bg-green-600/20 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <p class="text-gray-300">Strong visual deterrent for potential criminals</p>
            </div>
            
            <div class="flex items-center mb-4">
              <div class="mr-4 bg-green-600/20 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <p class="text-gray-300">Reduced insurance premiums (up to 20%)</p>
            </div>
            
            <div class="flex items-center">
              <div class="mr-4 bg-green-600/20 p-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <p class="text-gray-300">Peace of mind knowing your property is protected</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="text-center">
        <p class="text-lg text-blue-400 font-medium mb-4">The choice is clear.</p>
        <button @click="scrollToProducts" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg text-lg font-medium transition-all duration-200 transform hover:scale-105">
          Explore Security Options
        </button>
      </div>
    </div>
    
    <!-- FAQ Accordion Section -->
    <div class="mb-16">
      <h3 class="text-2xl font-bold text-white mb-8 text-center">Frequently Asked Questions</h3>
      
      <div class="space-y-4">
        <div v-for="(faq, index) in faqs" :key="index" class="bg-gray-800/50 rounded-lg border border-blue-900/30 overflow-hidden">
          <button 
            @click="toggleFAQ(index)" 
            class="w-full px-6 py-4 flex justify-between items-center text-left focus:outline-none"
            :class="{'border-b border-blue-900/30': faq.open}"
          >
            <h4 class="text-lg font-medium text-white">{{ faq.question }}</h4>
            <div class="bg-blue-600/20 p-2 rounded-full transform transition-transform duration-300"
                :class="{'rotate-180': faq.open}">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div v-show="faq.open" class="px-6 py-4 text-gray-300 bg-gray-800/30">
            <p>{{ faq.answer }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Security Benefits Grid -->
    <div class="mb-16">
      <h3 class="text-2xl font-bold text-white mb-8 text-center">Security System Benefits</h3>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Benefit 1 -->
        <div class="bg-gray-800/50 rounded-lg p-6 border-l-4 border-blue-600 transform hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-blue-900/20">
          <h4 class="text-xl font-bold text-white mb-3">Crime Deterrence</h4>
          <p class="text-gray-300">Security cameras and visible alarm systems serve as powerful deterrents, significantly reducing the likelihood of break-ins.</p>
        </div>
        
        <!-- Benefit 2 -->
        <div class="bg-gray-800/50 rounded-lg p-6 border-l-4 border-green-600 transform hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-green-900/20">
          <h4 class="text-xl font-bold text-white mb-3">Remote Monitoring</h4>
          <p class="text-gray-300">Access live video feeds and security alerts from anywhere using your smartphone, tablet, or computer.</p>
        </div>
        
        <!-- Benefit 3 -->
        <div class="bg-gray-800/50 rounded-lg p-6 border-l-4 border-purple-600 transform hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-purple-900/20">
          <h4 class="text-xl font-bold text-white mb-3">Evidence Collection</h4>
          <p class="text-gray-300">In case of an incident, recorded footage provides crucial evidence for police investigations and insurance claims.</p>
        </div>
        
        <!-- Benefit 4 -->
        <div class="bg-gray-800/50 rounded-lg p-6 border-l-4 border-yellow-600 transform hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-yellow-900/20">
          <h4 class="text-xl font-bold text-white mb-3">Peace of Mind</h4>
          <p class="text-gray-300">Enjoy greater tranquility knowing your home or business is protected, even when you're away.</p>
        </div>
        
        <!-- Benefit 5 -->
        <div class="bg-gray-800/50 rounded-lg p-6 border-l-4 border-red-600 transform hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-red-900/20">
          <h4 class="text-xl font-bold text-white mb-3">Insurance Benefits</h4>
          <p class="text-gray-300">Many insurance providers offer reduced premiums for properties with professionally installed security systems.</p>
        </div>
        
        <!-- Benefit 6 -->
        <div class="bg-gray-800/50 rounded-lg p-6 border-l-4 border-pink-600 transform hover:scale-105 transition-all duration-300 hover:shadow-lg hover:shadow-pink-900/20">
          <h4 class="text-xl font-bold text-white mb-3">Home Automation</h4>
          <p class="text-gray-300">Modern security systems integrate with smart home features for lighting, temperature control, and more.</p>
        </div>
      </div>
    </div>
    
    <!-- Call-to-Action -->
    <div class="bg-gradient-to-r from-blue-900/30 to-purple-900/30 rounded-lg p-8 text-center">
      <h3 class="text-2xl font-bold text-white mb-4">Ready to Secure Your Property?</h3>
      <p class="text-gray-300 mb-6 max-w-2xl mx-auto">Our experts are ready to help you choose the perfect security solution for your needs and budget.</p>
      <div class="flex flex-wrap justify-center gap-4">
        <button @click="scrollToPackages" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg text-lg font-medium transition-all duration-200 transform hover:scale-105">
          View Security Packages
        </button>
        <button @click="scrollToMonitoring" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg text-lg font-medium transition-all duration-200 transform hover:scale-105">
          Explore Monitoring Plans
        </button>
      </div>
    </div>
  </NmtSurface>
</template>

<script>
import { ref, onMounted } from 'vue';
import NmtSurface from './ui/NmtSurface.vue';
export default {
  name: 'SecurityFAQs',
  components: { NmtSurface },
  // Define emitted events
  emits: ['scroll-to'],
  setup(props, { emit }) {
    // Counter animations
    const burglaryCounter = ref(60);
    const preventionCounter = ref(0);
    const savingsCounter = ref(0);
    const responseCounter = ref(0);
    
    // FAQ data with open/closed state
    const faqs = ref([
      {
        question: 'Do I really need a security system?',
        answer: 'While every situation is different, security systems provide crucial protection against break-ins, theft, and vandalism. With a burglary occurring every 30 seconds in the United States and homes without security systems being 300% more likely to be targeted, the statistics strongly suggest that security systems are a worthwhile investment for most properties.',
        open: true
      },
      {
        question: "What's the difference between monitored and unmonitored security systems?",
        answer: "Monitored security systems connect to a professional monitoring center that responds to alarms by contacting you and dispatching emergency services if needed. Unmonitored systems rely on you to notice alerts and contact authorities yourself. Monitored systems provide greater peace of mind and faster response times, especially when you're away from home or asleep.",
        open: false
      },
      {
        question: 'How much does a good security system cost?',
        answer: 'Security system costs vary based on property size, equipment needs, and whether you choose professional monitoring. Basic systems start around $699, while comprehensive solutions for larger properties may cost several thousand dollars. Monthly monitoring typically ranges from $39.99 to $119.99 depending on the level of service. Many homeowners find that insurance discounts help offset these costs over time.',
        open: false
      },
      {
        question: 'Can I install a security system myself or do I need professional installation?',
        answer: 'While DIY installation is possible for some basic systems, professional installation ensures proper placement of cameras, sensors, and other components for optimal coverage. Professionals can also help customize your system to address specific vulnerabilities in your property. For complex systems with multiple cameras, professional installation is highly recommended to ensure proper functionality.',
        open: false
      },
      {
        question: 'How do security cameras work at night?',
        answer: "Modern security cameras use infrared (IR) LEDs to see in low-light or no-light conditions. These LEDs emit infrared light that's invisible to the human eye but allows the camera to capture clear black-and-white footage. Some advanced cameras feature \"starlight\" technology for color night vision, while others use built-in spotlights to illuminate areas when motion is detected.",
        open: false
      },
      {
        question: 'Will my security system work during power outages?',
        answer: 'Most quality security systems include battery backups that keep the system running during power outages. More advanced systems may also feature cellular connections that continue to function when internet service is disrupted. For extended protection during outages, some systems can be connected to backup generators or uninterruptible power supplies (UPS).',
        open: false
      }
    ]);
    
    // Animation functions
    const animateCounter = (counterName, target) => {
      // Get the reference to the reactive counter based on name
      const counterRef = {
        'burglaryCounter': burglaryCounter,
        'preventionCounter': preventionCounter,
        'savingsCounter': savingsCounter,
        'responseCounter': responseCounter
      }[counterName];
      
      if (!counterRef || counterRef.value === target) return;
      
      let startValue = 0;
      const duration = 1500;
      const startTime = Date.now();
      
      const updateCounter = () => {
        const currentTime = Date.now();
        const elapsedTime = currentTime - startTime;
        
        if (elapsedTime < duration) {
          const progress = elapsedTime / duration;
          const easedProgress = easeOutQuad(progress);
          const newValue = Math.floor(easedProgress * target);
          counterRef.value = newValue;
          requestAnimationFrame(updateCounter);
        } else {
          counterRef.value = target;
        }
      };
      
      updateCounter();
    };
    
    // Easing function for smoother animations
    const easeOutQuad = (t) => {
      return t * (2 - t);
    };
    
    // Toggle FAQ open/closed
    const toggleFAQ = (index) => {
      faqs.value[index].open = !faqs.value[index].open;
    };
    
    // Scroll functions
    const scrollToPackages = () => {
      emit('scroll-to', 'packages');
    };
    
    const scrollToMonitoring = () => {
      emit('scroll-to', 'monitoring');
    };
    
    const scrollToProducts = () => {
      emit('scroll-to', 'products');
    };
    
    // Initiate animations when component mounts
    onMounted(() => {
      setTimeout(() => {
        animateCounter('burglaryCounter', 30);
        setTimeout(() => animateCounter('preventionCounter', 300), 200);
        setTimeout(() => animateCounter('savingsCounter', 20), 400);
        setTimeout(() => animateCounter('responseCounter', 50), 600);
      }, 500);
    });
    
    return {
      burglaryCounter,
      preventionCounter,
      savingsCounter,
      responseCounter,
      faqs,
      toggleFAQ,
      animateCounter,
      scrollToPackages,
      scrollToMonitoring,
      scrollToProducts
    };
  }
};
</script>

<style scoped>
/* Animated background elements */
@keyframes fadeIn {
  0% { opacity: 0; transform: translateY(20px); }
  100% { opacity: 1; transform: translateY(0); }
}

@keyframes pulse {
  0% { transform: scale(1); opacity: 0.8; }
  50% { transform: scale(1.05); opacity: 1; }
  100% { transform: scale(1); opacity: 0.8; }
}

@keyframes float {
  0% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
  100% { transform: translateY(0px); }
}

.animate-fadeIn {
  animation: fadeIn 1s ease-out forwards;
}

.animate-fadeIn-delay {
  animation: fadeIn 1s ease-out 0.3s forwards;
  opacity: 0;
}

.animate-pulse {
  animation: pulse 3s infinite ease-in-out;
}

.animate-float {
  animation: float 6s infinite ease-in-out;
}

/* Additional hover effects */
.security-faqs .benefit-card:hover {
  box-shadow: 0 0 25px rgba(59, 130, 246, 0.3);
}
</style>
