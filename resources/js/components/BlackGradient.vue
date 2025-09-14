<template>
    <div
        class="relative isolate overflow-hidden py-24 sm:py-32 bg-gradient-to-t from-black from-33% via-black via-33% to-gray-900 to-33%"
    >
        <div
            class="absolute -bottom-8 -left-96 -z-10 transform-gpu blur-3xl sm:-bottom-64 sm:-left-40 lg:-bottom-32 lg:left-8 xl:-left-10"
            aria-hidden="true"
        >
            <div class="aspect-[1266/975] w-[00.125rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                style="
                    clip-path: polygon(
                        25.1% 44.1%,
                        65% 61.6%,
                        25.5% 26.9%,
                        85.5% 0.1%,
                        80.7% 2%,
                        72.5% 32.5%,
                        0.2% 62.4%,
                        52.4% 68.1%,
                        47.5% 58.3%,
                        45.2% 34.5%,
                        27.5% 76.7%,
                        0.1% 23.9%,
                        9.9% 100%,
                        92.6% 92.8%,
                        76.1% 97.7%,
                        10.1% 89.1%
                    );
                "></div>
        </div>
        <div class="relative w-full h-32 sm:h-40 bg-gradient-to-r from-gray-900 via-blue-900 to-green-900 animate-gradientMove">
            <div class="absolute inset-0 flex items-center justify-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-green-400 drop-shadow-lg animate-fadeIn text-center">
                    Albuquerque’s Trusted Experts for Commercial CCTV & Security
                </h2>
            </div>
        </div>
    </div>
</template>
<script setup></script>

<style scoped>
@keyframes gradientMove {
  0% { background-position: 0% 50%; }
  100% { background-position: 100% 50%; }
}
.animate-gradientMove {
  background-size: 200% 200%;
  animation: gradientMove 12s linear infinite;
}
.animate-fadeIn {
  animation: fadeIn 1.2s ease-out;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>
