// Touch directive for handling swipe gestures
export const vTouch = {
  mounted(el, binding) {
    const touchStart = {
      x: 0,
      y: 0,
      time: 0
    };

    const minSwipeDistance = 50; // Minimum swipe distance in pixels
    const maxSwipeTime = 300; // Maximum time for a swipe in milliseconds

    el.addEventListener('touchstart', (e) => {
      const touch = e.touches[0];
      touchStart.x = touch.clientX;
      touchStart.y = touch.clientY;
      touchStart.time = Date.now();
    });

    el.addEventListener('touchend', (e) => {
      const touch = e.changedTouches[0];
      const deltaX = touch.clientX - touchStart.x;
      const deltaY = touch.clientY - touchStart.y;
      const deltaTime = Date.now() - touchStart.time;

      if (deltaTime > maxSwipeTime) return; // Swipe took too long

      const absX = Math.abs(deltaX);
      const absY = Math.abs(deltaY);

      // Determine if the swipe was horizontal or vertical
      if (absX > absY) {
        // Horizontal swipe
        if (absX > minSwipeDistance) {
          if (deltaX > 0) {
            if (binding.value && binding.arg === 'right') binding.value();
          } else {
            if (binding.value && binding.arg === 'left') binding.value();
          }
        }
      } else {
        // Vertical swipe
        if (absY > minSwipeDistance) {
          if (deltaY > 0) {
            if (binding.value && binding.arg === 'down') binding.value();
          } else {
            if (binding.value && binding.arg === 'up') binding.value();
          }
        }
      }
    });
  }
};
