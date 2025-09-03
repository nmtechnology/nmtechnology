<template>
  <div class="mb-8">
    <div class="flex flex-wrap gap-3 justify-center mb-4">
      <button 
        v-for="category in categories" 
        :key="category.id"
        @click="selectCategory(category.id)"
        :class="[
          'px-4 py-2 rounded-full text-sm font-medium transition-all duration-200',
          selectedCategory === category.id 
            ? 'bg-green-600 text-white shadow-md' 
            : 'bg-gray-700 text-gray-300 hover:bg-gray-600'
        ]"
      >
        {{ category.name }}
      </button>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';

export default {
  name: 'ProductFilter',
  props: {
    initialCategory: {
      type: String,
      default: 'all'
    }
  },
  emits: ['filter-change'],
  setup(props, { emit }) {
    const categories = [
      { id: 'all', name: 'All Products' },
      { id: 'monitoring', name: 'Security Monitoring' },
      { id: 'package', name: 'Security Packages' },
      { id: 'camera', name: 'Security Cameras' },
      { id: 'recorder', name: 'Recorders & NVRs' },
      { id: 'network', name: 'Networking' },
      { id: 'accessory', name: 'Accessories' }
    ];
    
    const selectedCategory = ref(props.initialCategory);
    
    const selectCategory = (categoryId) => {
      selectedCategory.value = categoryId;
      emit('filter-change', categoryId);
    };
    
    return {
      categories,
      selectedCategory,
      selectCategory
    };
  }
};
</script>
