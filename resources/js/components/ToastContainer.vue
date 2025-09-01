<template>
  <div class="fixed top-5 right-5 z-50 space-y-4">
    <ToastNotification
      v-for="notification in notifications"
      :key="notification.id"
      :message="notification.message"
      :type="notification.type"
      :duration="notification.duration"
      :show="notification.show"
      @close="closeNotification(notification.id)"
    />
  </div>
</template>

<script>
import { ref, computed, watch } from 'vue';
import ToastNotification from './ToastNotification.vue';
import { toastService } from '../services/toastService';

export default {
  name: 'ToastContainer',
  components: {
    ToastNotification
  },
  setup() {
    const notifications = computed(() => toastService.getAll());

    const closeNotification = (id) => {
      toastService.hide(id);
    };

    return {
      notifications,
      closeNotification
    };
  }
};
</script>
