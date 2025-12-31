<template>
  <div 
    v-if="isVisible"
    class="w-full bg-gradient-to-r from-gray-900 via-black to-gray-900 overflow-hidden border-y border-green-500/30" 
    :class="[
      fullWidth ? 'px-0' : 'px-4 sm:px-6 lg:px-8', 
      fixed ? 'fixed left-0 right-0 z-10' : 'relative',
      fixed ? 'top-[128px]' : '', /* Position below navbar (80px) + TopBanner (48px) */
      customClass
    ]"
  >
    <!-- Banner Container -->
    <div class="mx-auto py-3 px-4" :class="{'max-w-7xl': !fullWidth}">
      <!-- Dynamic Promo Content -->
      <div class="flex items-center justify-center gap-4 flex-wrap">
        <!-- Promo Icon -->
        <div class="flex-shrink-0">
          <span class="text-3xl" v-if="currentPromo.icon">{{ currentPromo.icon }}</span>
        </div>
        
        <!-- Promo Text -->
        <div class="text-center">
          <p class="text-white font-bold text-lg sm:text-xl">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400">
              {{ currentPromo.title }}
            </span>
          </p>
          <p class="text-gray-300 text-sm sm:text-base">
            {{ currentPromo.description }}
            <span class="text-green-400 font-semibold">{{ currentPromo.discount }}</span>
            <span v-if="currentPromo.code" class="ml-2 px-2 py-0.5 bg-green-500/20 border border-green-500/50 rounded text-green-400 font-mono text-xs">
              {{ currentPromo.code }}
            </span>
          </p>
          <p class="text-gray-500 text-xs mt-1">
            Ends {{ currentPromo.endDateFormatted }}
          </p>
        </div>
        
        <!-- CTA Button -->
        <button 
          @click="handleCTA"
          class="flex-shrink-0 px-4 py-2 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 text-white rounded-lg font-semibold text-sm shadow-lg shadow-green-500/30 transition-all duration-300 transform hover:scale-105"
        >
          {{ currentPromo.ctaText }}
        </button>
      </div>
      
      <!-- Optional Close Button -->
      <button 
        v-if="dismissible" 
        @click="dismiss" 
        class="absolute top-2 right-2 text-gray-400 hover:text-white transition-colors z-20"
        aria-label="Close banner"
      >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, inject } from 'vue';

// Inject modal functions from App.vue
const openContactModal = inject('openContactModal', () => {});

// Define promotional campaigns with date ranges for the entire year
const promos = {
  // JANUARY - New Year Sale
  newYear: {
    id: 'newyear2025',
    title: '🎆 New Year Sale!',
    icon: '🎉',
    description: 'Start 2025 secure! Get',
    discount: '10% OFF',
    code: 'NEWYEAR25',
    ctaText: 'Get Quote',
    startDate: new Date('2025-01-01'),
    endDate: new Date('2025-02-13T23:59:59'),
    endDateFormatted: 'February 13th'
  },
  // FEBRUARY - Valentine's Day
  valentines: {
    id: 'valentines2025',
    title: '💕 Valentine\'s Sale!',
    icon: '❤️',
    description: 'Love your security! Get',
    discount: '10% OFF',
    code: 'LOVE10',
    ctaText: 'Get Quote',
    startDate: new Date('2025-02-14'),
    endDate: new Date('2025-03-16T23:59:59'),
    endDateFormatted: 'March 16th'
  },
  // MARCH - St. Patrick's Day
  stPatricks: {
    id: 'stpatricks2025',
    title: '🍀 Lucky Security Sale!',
    icon: '☘️',
    description: 'Get lucky with savings! Get',
    discount: '10% OFF',
    code: 'LUCKY10',
    ctaText: 'Get Quote',
    startDate: new Date('2025-03-17'),
    endDate: new Date('2025-04-19T23:59:59'),
    endDateFormatted: 'April 19th'
  },
  // APRIL - Easter / Spring
  easter: {
    id: 'easter2025',
    title: '🐰 Spring Security Sale!',
    icon: '🌷',
    description: 'Spring into savings! Get',
    discount: '10% OFF',
    code: 'SPRING10',
    ctaText: 'Get Quote',
    startDate: new Date('2025-04-20'),
    endDate: new Date('2025-05-04T23:59:59'),
    endDateFormatted: 'May 4th'
  },
  // MAY - Cinco de Mayo (Big in New Mexico!)
  cincoDeMayo: {
    id: 'cincodemayo2025',
    title: '🎊 Cinco de Mayo Sale!',
    icon: '🇲🇽',
    description: '¡Celebra con ahorros! Get',
    discount: '10% OFF',
    code: 'CINCO10',
    ctaText: 'Get Quote',
    startDate: new Date('2025-05-05'),
    endDate: new Date('2025-05-25T23:59:59'),
    endDateFormatted: 'May 25th'
  },
  // MAY - Memorial Day
  memorialDay: {
    id: 'memorialday2025',
    title: '🇺🇸 Memorial Day Sale!',
    icon: '🎖️',
    description: 'Honoring heroes! Get',
    discount: '10% OFF',
    code: 'MEMORIAL10',
    ctaText: 'Get Quote',
    startDate: new Date('2025-05-26'),
    endDate: new Date('2025-06-30T23:59:59'),
    endDateFormatted: 'June 30th'
  },
  // JULY - Independence Day
  july4th: {
    id: 'july4th2025',
    title: '🎆 4th of July Sale!',
    icon: '🇺🇸',
    description: 'Celebrate freedom securely! Get',
    discount: '10% OFF',
    code: 'FREEDOM10',
    ctaText: 'Get Quote',
    startDate: new Date('2025-07-01'),
    endDate: new Date('2025-09-01T23:59:59'),
    endDateFormatted: 'September 1st'
  },
  // SEPTEMBER - Labor Day
  laborDay: {
    id: 'laborday2025',
    title: '👷 Labor Day Sale!',
    icon: '🔧',
    description: 'Hard work deserves savings! Get',
    discount: '10% OFF',
    code: 'LABOR10',
    ctaText: 'Get Quote',
    startDate: new Date('2025-09-01'),
    endDate: new Date('2025-09-30T23:59:59'),
    endDateFormatted: 'September 30th'
  },
  // OCTOBER - Halloween
  halloween: {
    id: 'halloween2025',
    title: '🎃 Spooky Security Sale!',
    icon: '👻',
    description: 'Scary good savings! Get',
    discount: '10% OFF',
    code: 'SPOOKY10',
    ctaText: 'Get Quote',
    startDate: new Date('2025-10-01'),
    endDate: new Date('2025-11-10T23:59:59'),
    endDateFormatted: 'November 10th'
  },
  // NOVEMBER - Veterans Day
  veteransDay: {
    id: 'veteransday2025',
    title: '🎖️ Veterans Day Sale!',
    icon: '🇺🇸',
    description: 'Thank you for your service! Get',
    discount: '10% OFF',
    code: 'VETERANS10',
    ctaText: 'Get Quote',
    startDate: new Date('2025-11-11'),
    endDate: new Date('2025-11-26T23:59:59'),
    endDateFormatted: 'November 26th'
  },
  // NOVEMBER - Black Friday / Cyber Monday
  blackFriday: {
    id: 'blackfriday2025',
    title: '🛒 Black Friday Deals!',
    icon: '💰',
    description: 'Biggest savings of the year! Get',
    discount: '10% OFF',
    code: 'BLACK10',
    ctaText: 'Get Quote',
    startDate: new Date('2025-11-27'),
    endDate: new Date('2025-12-02T23:59:59'),
    endDateFormatted: 'December 2nd'
  },
  // DECEMBER - Holiday Season
  holiday: {
    id: 'holiday2025',
    title: '🎄 Holiday Security Sale!',
    icon: '🎁',
    description: 'Give the gift of security! Get',
    discount: '10% OFF',
    code: 'HOLIDAY10',
    ctaText: 'Get Quote',
    startDate: new Date('2025-12-03'),
    endDate: new Date('2025-12-31T23:59:59'),
    endDateFormatted: 'December 31st'
  },
  // Fallback default promo (used if no seasonal promo matches)
  default: {
    id: 'default2025',
    title: '🔒 Security Special!',
    icon: '🛡️',
    description: 'Protect your property! Get',
    discount: '10% OFF',
    code: 'SECURE10',
    ctaText: 'Get Quote',
    startDate: new Date('2025-01-01'),
    endDate: new Date('2025-12-31T23:59:59'),
    endDateFormatted: 'Limited Time'
  }
};

// Ordered list of promos for date checking (order matters!)
const promoOrder = [
  'newYear',
  'valentines', 
  'stPatricks',
  'easter',
  'cincoDeMayo',
  'memorialDay',
  'july4th',
  'laborDay',
  'halloween',
  'veteransDay',
  'blackFriday',
  'holiday'
];

// Props
const props = defineProps({
  imageUrl: {
    type: String,
    default: ''
  },
  altText: {
    type: String,
    default: 'Promotional Banner'
  },
  height: {
    type: Number,
    default: null
  },
  maxHeight: {
    type: Number,
    default: 80
  },
  link: {
    type: String,
    default: ''
  },
  linkAriaLabel: {
    type: String,
    default: 'Learn more about this promotion'
  },
  openInNewTab: {
    type: Boolean,
    default: false
  },
  dismissible: {
    type: Boolean,
    default: true
  },
  fixed: {
    type: Boolean,
    default: false
  },
  fullWidth: {
    type: Boolean,
    default: true
  },
  customClass: {
    type: String,
    default: ''
  },
  // Override automatic promo selection
  forcePromo: {
    type: String,
    default: null // Options: 'newYear', 'valentines', 'stPatricks', 'easter', 'cincoDeMayo', 'memorialDay', 'july4th', 'laborDay', 'halloween', 'veteransDay', 'blackFriday', 'holiday', 'default'
  },
  // Local storage key for remembering dismissal
  storageKey: {
    type: String,
    default: 'promoBannerDismissed'
  },
  // Force visibility (override dismissal)
  forceShow: {
    type: Boolean,
    default: false
  }
});

// Events
const emit = defineEmits(['dismissed', 'displayed', 'ctaClicked']);

// Component state
const visible = ref(true);

// Determine current promo based on date
const currentPromo = computed(() => {
  if (props.forcePromo && promos[props.forcePromo]) {
    return promos[props.forcePromo];
  }
  
  const now = new Date();
  
  // Check each promo in order to find the active one
  for (const promoKey of promoOrder) {
    const promo = promos[promoKey];
    if (now >= promo.startDate && now <= promo.endDate) {
      return promo;
    }
  }
  
  // Return default promo if no seasonal promo matches
  return promos.default;
});

// Build storage key with promo ID to reset dismissal for new promos
const effectiveStorageKey = computed(() => {
  return `${props.storageKey}_${currentPromo.value.id}`;
});

// Computed property to determine if banner should be shown
const isVisible = computed(() => {
  // If already dismissed by user for this specific promo and not forced, don't show
  if (!props.forceShow && localStorage.getItem(effectiveStorageKey.value) === 'true') {
    return false;
  }
  
  // If visible state is false (user dismissed during current session)
  if (!visible.value) {
    return false;
  }
  
  // Check if current promo is within its date range
  const now = new Date();
  if (now < currentPromo.value.startDate || now > currentPromo.value.endDate) {
    return false;
  }
  
  return true;
});

// Methods
const dismiss = () => {
  visible.value = false;
  
  if (props.dismissible) {
    // Save dismissal to localStorage for this specific promo
    localStorage.setItem(effectiveStorageKey.value, 'true');
  }
  
  emit('dismissed');
};

const handleCTA = () => {
  emit('ctaClicked', currentPromo.value);
  // Navigate users to products page for Get Quote CTAs
  window.location.href = '/products';
};

// When the component is mounted, emit displayed event if shown
onMounted(() => {
  if (isVisible.value) {
    emit('displayed', currentPromo.value);
  }
});
</script>

<style scoped>
/* Optional animations */
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideDown {
  from { transform: translateY(-10px); opacity: 0; }
  to { transform: translateY(0); opacity: 1; }
}

.w-full {
  animation: fadeIn 0.4s ease-out, slideDown 0.4s ease-out;
}

/* Responsive styling for mobile */
@media (max-width: 640px) {
  /* Make dismiss button more tappable on mobile */
  button[aria-label="Close banner"] {
    width: 32px;
    height: 32px;
    padding: 6px;
    top: 4px;
    right: 4px;
  }
}

/* Button hover effects for close button */
button[aria-label="Close banner"] {
  width: 28px;
  height: 28px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.3);
  border-radius: 50%;
  padding: 4px;
  transition: all 0.2s ease;
}

button[aria-label="Close banner"]:hover {
  background-color: rgba(0, 0, 0, 0.6);
}

button[aria-label="Close banner"]:hover svg {
  transform: scale(1.1);
  transition: transform 0.2s ease;
}
</style>
