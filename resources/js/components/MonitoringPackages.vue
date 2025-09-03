<template>
  <div class="bg-gray-900/40 rounded-lg backdrop-blur-sm p-6 mb-8">
    <h2 class="text-2xl font-bold text-center text-white mb-6">
      24/7 Professional Security Monitoring
    </h2>
    <p class="text-gray-300 text-center mb-8 max-w-3xl mx-auto">
      Our professional monitoring packages provide round-the-clock protection for your home or business, with rapid response times and customizable alert options. Choose the coverage that's right for your needs.
    </p>
    
    <!-- Package Benefits -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
      <div class="bg-gray-800/50 rounded-lg p-5 backdrop-blur-sm border border-blue-900/30">
        <div class="flex items-center mb-3">
          <div class="rounded-full bg-blue-600/20 p-2 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-white">24/7 Professional Monitoring</h3>
        </div>
        <p class="text-gray-400">Our professional monitoring center is staffed 24/7/365, ensuring your home is always protected, even when you're away.</p>
      </div>
      
      <div class="bg-gray-800/50 rounded-lg p-5 backdrop-blur-sm border border-blue-900/30">
        <div class="flex items-center mb-3">
          <div class="rounded-full bg-blue-600/20 p-2 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-white">Fast Response Times</h3>
        </div>
        <p class="text-gray-400">When an alarm is triggered, our monitoring center responds within seconds, dispatching emergency services if needed.</p>
      </div>
      
      <div class="bg-gray-800/50 rounded-lg p-5 backdrop-blur-sm border border-blue-900/30">
        <div class="flex items-center mb-3">
          <div class="rounded-full bg-blue-600/20 p-2 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-white">Flexible Plans</h3>
        </div>
        <p class="text-gray-400">Choose the plan that fits your needs with no long-term contracts and easy customization options for your security system.</p>
      </div>
    </div>
    
    <!-- Monitoring Package Comparison -->
    <div class="overflow-x-auto mb-12">
      <table class="min-w-full bg-gray-800/50 rounded-lg backdrop-blur-sm">
        <thead class="bg-gray-700/50">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Package</th>
            <th class="px-4 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">Door Sensors</th>
            <th class="px-4 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">Window Sensors</th>
            <th class="px-4 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">Motion Detectors</th>
            <th class="px-4 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">IP Sirens</th>
            <th class="px-4 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">Smart Devices</th>
            <th class="px-4 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">Monthly</th>
            <th class="px-4 py-3"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-700/50">
          <tr v-for="(package, index) in monitoringPackages" :key="package.id" 
              :class="{'bg-blue-900/20': index === 2, 'hover:bg-gray-700/30': index !== 2, 'hover:bg-blue-900/30': index === 2}"
              class="transition-colors">
            <td class="px-4 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="ml-4">
                  <div :class="[index === 2 ? 'text-blue-400 font-bold' : 'text-white', 'text-sm font-medium']">
                    {{ package.name }}
                  </div>
                  <div class="text-sm text-gray-400 max-w-xs truncate">{{ package.description }}</div>
                </div>
              </div>
            </td>
            <td class="px-4 py-4 whitespace-nowrap text-center text-sm text-gray-300">{{ package.specs.doorContacts }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-center text-sm text-gray-300">{{ package.specs.windowSensors }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-center text-sm text-gray-300">{{ package.specs.motionDetectors }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-center text-sm text-gray-300">{{ package.specs.ipSirens }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-center text-sm text-gray-300">{{ package.specs.smartDevices }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-center text-sm font-medium">
              <span :class="[index === 2 ? 'text-blue-400 font-bold' : 'text-green-500']">
                ${{ package.price.toFixed(2) }}/mo
              </span>
            </td>
            <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
              <button @click="viewDetails(package)"
                      :class="[index === 2 ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-700 hover:bg-gray-600', 'px-3 py-1 rounded text-white text-xs']">
                Details
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <!-- Savings Over Time Charts -->
    <div class="mb-12">
      <h3 class="text-xl font-bold text-white mb-6 text-center">See Your Savings Over Time</h3>
      <p class="text-gray-300 mb-6 text-center max-w-3xl mx-auto">
        Our monitoring plans offer significant savings compared to traditional security companies. The chart below shows how much you can save over time with our plans.
      </p>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-gray-800/60 rounded-lg p-4 backdrop-blur-sm">
          <h4 class="text-lg font-semibold text-white mb-2 text-center">1 Year Savings</h4>
          <div class="h-52 relative">
            <div v-for="(package, index) in monitoringPackages" :key="`year1-${package.id}`" 
                 class="absolute bottom-0 w-8 bg-gradient-to-t transition-all duration-500 ease-in-out"
                 :class="chartBarColors[index % chartBarColors.length]"
                 :style="{
                   height: `${(package.savings.yearOne / maxSavings.yearOne) * 100}%`,
                   left: `${(index * 32) + 24}px`
                 }">
              <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-xs font-medium text-gray-300">
                ${{ package.savings.yearOne }}
              </div>
              <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 text-xs text-gray-400 whitespace-nowrap">
                {{ shortenName(package.name) }}
              </div>
            </div>
          </div>
        </div>
        
        <div class="bg-gray-800/60 rounded-lg p-4 backdrop-blur-sm">
          <h4 class="text-lg font-semibold text-white mb-2 text-center">3 Year Savings</h4>
          <div class="h-52 relative">
            <div v-for="(package, index) in monitoringPackages" :key="`year3-${package.id}`" 
                 class="absolute bottom-0 w-8 bg-gradient-to-t transition-all duration-500 ease-in-out"
                 :class="chartBarColors[index % chartBarColors.length]"
                 :style="{
                   height: `${(package.savings.yearThree / maxSavings.yearThree) * 100}%`,
                   left: `${(index * 32) + 24}px`
                 }">
              <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-xs font-medium text-gray-300">
                ${{ package.savings.yearThree }}
              </div>
              <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 text-xs text-gray-400 whitespace-nowrap">
                {{ shortenName(package.name) }}
              </div>
            </div>
          </div>
        </div>
        
        <div class="bg-gray-800/60 rounded-lg p-4 backdrop-blur-sm">
          <h4 class="text-lg font-semibold text-white mb-2 text-center">5 Year Savings</h4>
          <div class="h-52 relative">
            <div v-for="(package, index) in monitoringPackages" :key="`year5-${package.id}`" 
                 class="absolute bottom-0 w-8 bg-gradient-to-t transition-all duration-500 ease-in-out"
                 :class="chartBarColors[index % chartBarColors.length]"
                 :style="{
                   height: `${(package.savings.yearFive / maxSavings.yearFive) * 100}%`,
                   left: `${(index * 32) + 24}px`
                 }">
              <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-xs font-medium text-gray-300">
                ${{ package.savings.yearFive }}
              </div>
              <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 text-xs text-gray-400 whitespace-nowrap">
                {{ shortenName(package.name) }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Security Facts Section -->
    <div class="mb-12">
      <h3 class="text-xl font-bold text-white mb-6 text-center">Home Security Facts</h3>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Security Fact 1 -->
        <div class="bg-gray-800/50 rounded-lg p-5 backdrop-blur-sm border-l-4 border-red-600">
          <h4 class="text-lg font-semibold text-white mb-2">Burglary Statistics</h4>
          <ul class="list-disc list-inside text-gray-300 space-y-2">
            <li>A burglary occurs approximately every 30 seconds in the United States</li>
            <li>The average property loss per burglary is over $2,500</li>
            <li>Most burglaries occur between 10:00 AM and 3:00 PM when homes are empty</li>
            <li>Only 13.6% of burglaries result in arrests due to lack of evidence</li>
          </ul>
        </div>
        
        <!-- Security Fact 2 -->
        <div class="bg-gray-800/50 rounded-lg p-5 backdrop-blur-sm border-l-4 border-green-600">
          <h4 class="text-lg font-semibold text-white mb-2">Prevention Effectiveness</h4>
          <ul class="list-disc list-inside text-gray-300 space-y-2">
            <li>Homes without security systems are 300% more likely to be burglarized</li>
            <li>83% of burglars check for security systems before attempting a break-in</li>
            <li>60% of burglars will seek an alternative target when security systems are present</li>
            <li>Monitored security systems reduce average response time by over 50%</li>
          </ul>
        </div>
        
        <!-- Security Fact 3 -->
        <div class="bg-gray-800/50 rounded-lg p-5 backdrop-blur-sm border-l-4 border-blue-600">
          <h4 class="text-lg font-semibold text-white mb-2">Insurance Benefits</h4>
          <ul class="list-disc list-inside text-gray-300 space-y-2">
            <li>Installing a monitored security system can reduce home insurance premiums by up to 20%</li>
            <li>Average annual savings on insurance: $200-$500</li>
            <li>Many insurance companies offer additional discounts for smart home integration</li>
            <li>Video surveillance improves claim processing speed by 40%</li>
          </ul>
        </div>
        
        <!-- Security Fact 4 -->
        <div class="bg-gray-800/50 rounded-lg p-5 backdrop-blur-sm border-l-4 border-yellow-600">
          <h4 class="text-lg font-semibold text-white mb-2">Entry Points</h4>
          <ul class="list-disc list-inside text-gray-300 space-y-2">
            <li>34% of burglars enter through the front door</li>
            <li>23% enter through first-floor windows</li>
            <li>22% enter through the back door</li>
            <li>9% enter through the garage</li>
            <li>Door sensors and window contacts are critical protection points</li>
          </ul>
        </div>
        
        <!-- Security Fact 5 -->
        <div class="bg-gray-800/50 rounded-lg p-5 backdrop-blur-sm border-l-4 border-purple-600">
          <h4 class="text-lg font-semibold text-white mb-2">Beyond Burglary Protection</h4>
          <ul class="list-disc list-inside text-gray-300 space-y-2">
            <li>Security systems detect fire and smoke up to 20 minutes faster than non-monitored systems</li>
            <li>Carbon monoxide detection prevents over 50,000 emergency room visits annually</li>
            <li>Water leak detection can save homeowners an average of $7,000 in water damage</li>
            <li>Medical emergency buttons reduce response time by up to 40%</li>
          </ul>
        </div>
        
        <!-- Security Fact 6 -->
        <div class="bg-gray-800/50 rounded-lg p-5 backdrop-blur-sm border-l-4 border-pink-600">
          <h4 class="text-lg font-semibold text-white mb-2">Peace of Mind</h4>
          <ul class="list-disc list-inside text-gray-300 space-y-2">
            <li>94% of homeowners feel increased peace of mind with monitored security</li>
            <li>Remote monitoring enables checking on homes and loved ones from anywhere</li>
            <li>Smart device integrations allow for lighting control to deter break-ins</li>
            <li>Real-time notifications provide immediate awareness of potential issues</li>
          </ul>
        </div>
      </div>
      
      <div class="text-center">
        <button @click="scrollToPackages" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg text-lg font-medium transition-all duration-200 transform hover:scale-105">
          Choose Your Monitoring Plan
        </button>
      </div>
    </div>
    
    <!-- Why Choose NM Security -->
    <div class="bg-blue-900/20 rounded-lg p-6 backdrop-blur-sm">
      <h3 class="text-xl font-bold text-white mb-4 text-center">Why Choose NM Security Monitoring?</h3>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-10 w-10 rounded-md bg-blue-600 text-white">
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
          </div>
          <div class="ml-4">
            <h4 class="text-lg font-medium text-white">No Long-Term Contracts</h4>
            <p class="mt-1 text-gray-300">Our services are month-to-month with no long-term commitments or cancellation fees.</p>
          </div>
        </div>
        
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-10 w-10 rounded-md bg-blue-600 text-white">
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
          </div>
          <div class="ml-4">
            <h4 class="text-lg font-medium text-white">Rapid Response Times</h4>
            <p class="mt-1 text-gray-300">Our monitoring center responds in seconds, not minutes, with direct emergency dispatch.</p>
          </div>
        </div>
        
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-10 w-10 rounded-md bg-blue-600 text-white">
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
              </svg>
            </div>
          </div>
          <div class="ml-4">
            <h4 class="text-lg font-medium text-white">Customizable Alerts</h4>
            <p class="mt-1 text-gray-300">Choose how and when you receive alerts with customizable notification settings.</p>
          </div>
        </div>
        
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-10 w-10 rounded-md bg-blue-600 text-white">
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
              </svg>
            </div>
          </div>
          <div class="ml-4">
            <h4 class="text-lg font-medium text-white">Latest Technology</h4>
            <p class="mt-1 text-gray-300">We use the latest security technology including AI-enhanced detection and smart home integration.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed, onMounted } from 'vue';
import { cameraProducts } from '../data/productData.js';

export default {
  name: 'MonitoringPackages',
  emits: ['view-details'],
  setup(props, { emit }) {
    const monitoringPackages = computed(() => {
      return cameraProducts.filter(product => product.category === 'monitoring')
        .sort((a, b) => a.price - b.price);
    });
    
    const chartBarColors = [
      'from-green-500 to-green-700',
      'from-blue-500 to-blue-700',
      'from-purple-500 to-purple-700',
      'from-yellow-500 to-yellow-700',
      'from-pink-500 to-pink-700',
      'from-indigo-500 to-indigo-700'
    ];
    
    // Calculate maximum savings for chart scaling
    const maxSavings = computed(() => {
      let yearOne = 0, yearThree = 0, yearFive = 0;
      
      monitoringPackages.value.forEach(pkg => {
        yearOne = Math.max(yearOne, pkg.savings.yearOne);
        yearThree = Math.max(yearThree, pkg.savings.yearThree);
        yearFive = Math.max(yearFive, pkg.savings.yearFive);
      });
      
      return { yearOne, yearThree, yearFive };
    });
    
    // Shorten package name for chart labels
    const shortenName = (name) => {
      return name.replace('Monitoring', '').trim();
    };
    
    // View package details
    const viewDetails = (product) => {
      emit('view-details', product);
    };
    
    // Scroll to packages
    const scrollToPackages = () => {
      const element = document.getElementById('monitoring-packages');
      if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
      }
    };
    
    return {
      monitoringPackages,
      chartBarColors,
      maxSavings,
      shortenName,
      viewDetails,
      scrollToPackages
    };
  }
};
</script>

<style scoped>
/* Animation for charts */
.bg-gradient-to-t {
  transition: height 1s ease-out;
}

/* Table styles */
table {
  border-collapse: separate;
  border-spacing: 0;
}

table th:first-child {
  border-top-left-radius: 0.5rem;
}

table th:last-child {
  border-top-right-radius: 0.5rem;
}

table tr:last-child td:first-child {
  border-bottom-left-radius: 0.5rem;
}

table tr:last-child td:last-child {
  border-bottom-right-radius: 0.5rem;
}
</style>
