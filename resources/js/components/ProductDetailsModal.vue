<template>
  <div v-if="isOpen" class="fixed inset-0 overflow-y-auto z-50" aria-labelledby="product-details-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Background overlay -->
      <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true" @click="close"></div>

      <!-- Modal panel -->
      <div class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
        <div class="bg-gray-800 px-4 pt-5 pb-4 sm:p-6">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium leading-6 text-white" id="product-details-title">
              {{ product.name }}
            </h3>
            <button @click="close" class="text-gray-400 hover:text-white focus:outline-none">
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- Product details -->
          <div class="mt-3">
            <div class="flex flex-col lg:flex-row gap-6">
              <!-- Product image -->
              <div class="w-full lg:w-1/2">
                <img :src="product.image" :alt="product.name" class="w-full h-64 object-contain bg-gray-700 rounded-lg">
              </div>
              
              <!-- Product info -->
              <div class="w-full lg:w-1/2">
                <div class="mb-4">
                  <span class="inline-block bg-green-600 text-white text-xs px-2 py-1 rounded-full">{{ product.brand }}</span>
                  <span class="inline-block bg-blue-600 text-white text-xs px-2 py-1 rounded-full ml-2">{{ categoryName }}</span>
                </div>
                
                <p class="text-gray-300 mb-4">{{ product.description }}</p>
                
                <h4 class="text-white font-medium mb-2">Key Features:</h4>
                <ul class="list-disc list-inside mb-4 text-gray-300">
                  <li v-for="feature in product.features" :key="feature">{{ feature }}</li>
                </ul>
                
                <div class="mt-4">
                  <span class="text-xl font-bold text-green-600 block">{{ product.price ? `$${product.price.toFixed(2)}` : 'Call For Price' }}</span>
                </div>
              </div>
            </div>
            
            <!-- Detailed specifications section -->
            <div v-if="product.specs" class="mt-8 border-t border-gray-700 pt-4">
              <h4 class="text-white font-medium mb-4">
                <span v-if="product.category === 'package'" class="text-green-500">Package</span>
                Technical Specifications:
              </h4>
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div v-for="(value, key) in product.specs" :key="key" 
                     :class="['flex flex-col p-2', product.category === 'package' ? 'bg-gray-700/30 rounded' : '']">
                  <span :class="['text-sm', product.category === 'package' ? 'text-green-400' : 'text-gray-400']">
                    {{ formatSpecName(key) }}
                  </span>
                  <span class="text-white">{{ value }}</span>
                </div>
              </div>
              
              <!-- Special call to action for packages -->
              <div v-if="product.category === 'package'" class="mt-6 bg-green-900/20 border border-green-600/30 rounded-lg p-4">
                <h5 class="text-green-500 font-semibold mb-2">Complete Security Solution</h5>
                <p class="text-gray-300 text-sm">
                  This package includes everything you need for a complete security setup: cameras, NVR, storage, 
                  and all necessary cables and mounting hardware. Professional installation available.
                </p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Modal footer with action buttons -->
        <div class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button @click="addToCartAndClose" 
                  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
            Add to Cart
          </button>
          <button @click="close" 
                  class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-gray-700 text-base font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed } from 'vue';
import { cartStore } from '../store/cartStore.js';
import { toastService } from '../services/toastService.js';

export default {
  name: 'ProductDetailsModal',
  props: {
    isOpen: {
      type: Boolean,
      required: true
    },
    product: {
      type: Object,
      required: true
    }
  },
  emits: ['close'],
  setup(props, { emit }) {
    // Convert category ID to friendly name
    const categoryName = computed(() => {
      const categories = {
        'camera': 'Security Camera',
        'recorder': 'Recorder & NVR',
        'accessory': 'Accessory',
        'network': 'Networking Equipment',
        'package': 'Security Package',
        'monitoring': 'Security Monitoring'
      };
      
      return categories[props.product.category] || props.product.category;
    });
    
    const close = () => {
      emit('close');
    };
    
    const addToCartAndClose = () => {
      cartStore.addItem({
        id: props.product.id,
        name: props.product.name,
        image: props.product.image,
        price: props.product.price
      });
      
      toastService.success(`Added ${props.product.name} to cart!`);
      close();
    };

    const formatSpecName = (key) => {
      const specNames = {
        'dimensions': 'Dimensions',
        'wifi': 'WiFi Standard',
        'range': 'Coverage Range',
        'weatherproofing': 'Weatherproofing',
        'cameraCount': 'Number of Cameras',
        'resolution': 'Camera Resolution',
        'nvr': 'NVR Specification',
        'storage': 'Storage Capacity',
        'poe': 'PoE Capability',
        'coverage': 'Coverage Area',
        'warranty': 'Warranty',
        'doorContacts': 'Door Contacts',
        'windowSensors': 'Window Sensors',
        'motionDetectors': 'Motion Detectors',
        'ipSirens': 'IP Sirens',
        'smartDevices': 'Smart Devices',
        'responseTimes': 'Response Time',
        'contractLength': 'Contract Length',
        'installation': 'Installation',
        'monthlyFee': 'Monthly Fee',
        'idealFor': 'Ideal For',
        'power': 'Power Supply',
        'antenna': 'Antenna Gain',
        'maxTxPower': 'Max TX Power',
        'interfaces': 'Interfaces',
        'temperature': 'Operating Temperature',
        'frequency': 'Frequency',
        'mountOptions': 'Mounting Options',
        'resolution': 'Resolution',
        'nightVision': 'Night Vision Range',
        'fov': 'Field of View',
        'smartDetections': 'Smart Detections',
        'audio': 'Audio',
        'tamperResistance': 'Tamper Resistance',
        'networkInterface': 'Network Interface',
        'maxFrameRate': 'Max Frame Rate',
        'sensor': 'Image Sensor',
        'lens': 'Lens',
        'powerConsumption': 'Power Consumption',
        'processor': 'Processor',
        'memory': 'Memory',
        'storage': 'Storage',
        'powerInput': 'Power Input',
        'operating': 'Operating System',
        'mounting': 'Mounting Options',
        'totalPorts': 'Total Ports',
        'switching': 'Switching Capacity',
        'forwarding': 'Forwarding Rate',
        'poeInterfaces': 'PoE Standards',
        'poeBudget': 'Total PoE Budget',
        'maxPoePerPort': 'Max Power Per Port',
        'management': 'Management Interface',
        'zoom': 'Optical Zoom'
      };
      
      // Use predefined name if available, otherwise format the key
      return specNames[key] || key.replace(/_/g, ' ').replace(/\b\w/g, char => char.toUpperCase());
    };
    
    return {
      categoryName,
      close,
      addToCartAndClose,
      formatSpecName
    };
  }
};
</script>
