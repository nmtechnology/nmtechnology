<template>
  <transition name="toast">
    <div v-if="visible" 
         class="fixed top-5 right-5 z-50 bg-gray-800 text-white px-4 py-2 rounded-lg shadow-lg flex items-center"
         :class="typeClass">
      <div class="mr-2">
        <!-- Success icon -->
        <svg v-if="type === 'success'" class="w-5 h-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        
        <!-- Info icon -->
        <svg v-else-if="type === 'info'" class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        
        <!-- Warning icon -->
        <svg v-else-if="type === 'warning'" class="w-5 h-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
        
        <!-- Error icon -->
        <svg v-else-if="type === 'error'" class="w-5 h-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
      <div>{{ message }}</div>
      <button @click="close" class="ml-4 text-gray-400 hover:text-white">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </transition>
</template>

<script>
import { ref, watch, onMounted, onBeforeUnmount } from 'vue';

export default {
  name: 'ToastNotification',
  props: {
    message: {
      type: String,
      required: true
    },
    duration: {
      type: Number,
      default: 3000
    },
    type: {
      type: String,
      default: 'success',
      validator: (value) => ['success', 'info', 'warning', 'error'].includes(value)
    },
    show: {
      type: Boolean,
      default: false
    }
  },
  emits: ['close'],
  setup(props, { emit }) {
    const visible = ref(props.show);
    let timer = null;
    
    const typeClass = ref({
      'border-l-4 border-green-500': props.type === 'success',
      'border-l-4 border-blue-500': props.type === 'info',
      'border-l-4 border-yellow-500': props.type === 'warning',
      'border-l-4 border-red-500': props.type === 'error'
    });
    
    const close = () => {
      visible.value = false;
      emit('close');
    };
    
    const startTimer = () => {
      clearTimeout(timer);
      timer = setTimeout(() => {
        close();
      }, props.duration);
    };
    
    watch(() => props.show, (newVal) => {
      visible.value = newVal;
      if (newVal) {
        startTimer();
      }
    });
    
    onMounted(() => {
      if (props.show) {
        startTimer();
      }
    });
    
    onBeforeUnmount(() => {
      clearTimeout(timer);
    });
    
    return {
      visible,
      typeClass,
      close
    };
  }
};
</script>

<style scoped>
.toast-enter-active,
.toast-leave-active {
  transition: transform 0.3s ease, opacity 0.3s ease;
}

.toast-enter-from {
  transform: translateX(100%);
  opacity: 0;
}

.toast-leave-to {
  transform: translateX(100%);
  opacity: 0;
}
</style>
