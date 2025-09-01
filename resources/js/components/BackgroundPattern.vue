<template>
  <!-- Fixed Background Pattern Component -->
  <div class="fixed-background">
    <!-- SVG Background Pattern -->
    <svg class="fixed inset-x-0 top-0 -z-40 h-screen w-full stroke-slate-600 [mask-image:radial-gradient(40rem_30rem_at_center,white,transparent)]"
      aria-hidden="true">
      <defs>
        <pattern id="background-pattern" width="200" height="200" x="50%" y="-1"
          patternUnits="userSpaceOnUse">
          <path d="M.5 300V.5H200" fill="none" />
        </pattern>
      </defs>
      <svg x="50%" y="-1" class="overflow-visible">
        <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
          stroke-width="0" />
      </svg>
      <rect width="100%" height="100%" stroke-width="0" fill="url(#background-pattern)" />
    </svg>
    
    <!-- Gradient Blur Effect -->
    <div class="fixed left-1/2 right-0 top-0 -z-40 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
      aria-hidden="true">
      <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#3b71ab] to-[#9689fc] opacity-30"
        style="
          clip-path: polygon(
            63.1% 29.5%,
            100% 17.1%,
            76.6% 3%,
            69.4% 0%,
            44.6% 4.7%,
            40.5% 25.3%,
            59.8% 49%,
            55.2% 57.8%,
            44.4% 57.2%,
            27.8% 47.9%,
            35.1% 81.5%,
            0% 97.7%,
            39.2% 100%,
            35.2% 81.4%,
            97.2% 52.8%,
            30.1% 29.5%
          );
        ">
      </div>
    </div>
  </div>
</template>

<style scoped>
.fixed-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -50;
  pointer-events: none;
}
</style>
