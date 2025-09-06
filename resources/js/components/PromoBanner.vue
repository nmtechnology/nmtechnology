<template>
  <div 
    v-if="isVisible"
    class="w-full bg-black overflow-hidden" 
    :class="[
      fullWidth ? 'px-0' : 'px-4 sm:px-6 lg:px-8', 
      fixed ? 'fixed left-0 right-0 z-10' : 'relative',
      fixed ? 'top-[128px]' : '', /* Position below navbar (80px) + TopBanner (48px) */
      customClass
    ]"
  >
    <!-- Banner Container -->
    <div class="mx-auto" :class="{'max-w-7xl': !fullWidth}">
      <!-- Background Image -->
      <div class="w-full overflow-hidden" :style="{ maxHeight: maxHeight ? `${maxHeight}px` : '100px' }">
        <img 
          :src="imageUrl || '/images/halloween-promo-banner.webp'" 
          :alt="altText || 'Promotional Banner'" 
          class="w-full object-contain mx-auto"
          :style="{
            height: height ? `${height}px` : 'auto',
            maxHeight: maxHeight ? `${maxHeight}px` : '50px'
          }"
        />
      </div>
      
      <!-- Optional Content Overlay -->
      <div 
        v-if="$slots.default" 
        class="absolute inset-0 flex items-center justify-center"
      >
        <slot></slot>
      </div>
      
      <!-- Click-through Link -->
      <a 
        v-if="link" 
        :href="link" 
        class="absolute inset-0 z-10 cursor-pointer" 
        :target="openInNewTab ? '_blank' : '_self'"
        :rel="openInNewTab ? 'noopener noreferrer' : ''"
        :aria-label="linkAriaLabel || 'Learn more'"
      ></a>
      
      <!-- Optional Close Button (Higher z-index to appear above the link) -->
      <button 
        v-if="dismissible" 
        @click="dismiss" 
        class="absolute top-2 right-2 text-white hover:text-gray-200 transition-colors z-20"
        aria-label="Close banner"
      >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';

// Props
const props = defineProps({
  imageUrl: {
    type: String,
    default: '/images/halloween-promo-banner.webp'
  },
  altText: {
    type: String,
    default: 'Halloween Promotion Banner'
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
    default: false
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
  // Date-based visibility options
  startDate: {
    type: [Date, String],
    default: null
  },
  endDate: {
    type: [Date, String],
    default: null
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
const emit = defineEmits(['dismissed', 'displayed']);

// Component state
const visible = ref(true);

// Computed property to determine if banner should be shown
const isVisible = computed(() => {
  // If already dismissed by user and not forced, don't show
  if (!props.forceShow && localStorage.getItem(props.storageKey) === 'true') {
    return false;
  }
  
  // If visible state is false (user dismissed during current session)
  if (!visible.value) {
    return false;
  }
  
  // Check date constraints if provided
  if (props.startDate || props.endDate) {
    const now = new Date();
    
    if (props.startDate) {
      const startDate = new Date(props.startDate);
      if (now < startDate) return false;
    }
    
    if (props.endDate) {
      const endDate = new Date(props.endDate);
      if (now > endDate) return false;
    }
  }
  
  return true;
});

// Methods
const dismiss = () => {
  visible.value = false;
  
  if (props.dismissible) {
    // Save dismissal to localStorage if feature is enabled
    localStorage.setItem(props.storageKey, 'true');
  }
  
  emit('dismissed');
};

// When the component is mounted, emit displayed event if shown
onMounted(() => {
  if (isVisible.value) {
    emit('displayed');
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
  from { transform: translateY(-20px); }
  to { transform: translateY(0); }
}

.w-full {
  animation: fadeIn 0.5s ease-in-out, slideDown 0.5s ease-in-out;
}

/* Responsive styling for mobile */
@media (max-width: 640px) {
  /* Ensure the banner isn't too tall on mobile */
  img {
    max-height: 60px !important;
    object-position: center;
  }
  
  /* Make dismiss button more tappable on mobile */
  button {
    width: 35px;
    height: 35px;
    padding: 6px;
    top: 4px;
    right: 4px;
  }
  
  /* Adjust fixed position on mobile for smaller top bar */
  .fixed.top-\[60px\] {
    top: 60px; /* Same as desktop since the navbar height is consistent */
  }
}

/* Button hover effects */
button {
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.4);
  border-radius: 50%;
  padding: 5px;
  transition: all 0.2s ease;
}

button:hover {
  background-color: rgba(0, 0, 0, 0.7);
}

button:hover svg {
  transform: scale(1.1);
  transition: transform 0.2s ease;
}

/* Ensure image displays correctly */
img.w-full {
  display: block;
  margin: 0 auto;
  max-width: 100%;
}
</style>
