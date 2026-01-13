<template>
    <div
        class="relative isolate overflow-hidden py-24 sm:py-32 bg-gradient-to-b from-black via-gray-900 to-gray-900"
    >
        <div class="absolute top-1/2 left-0 -translate-y-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-gradient-to-br from-green-500/10 to-lime-500/5 rounded-full blur-3xl" aria-hidden="true"></div>
        <div class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-1/2 w-[500px] h-[500px] bg-gradient-to-tl from-lime-500/10 to-green-500/10 rounded-full blur-3xl" aria-hidden="true"></div>
        
        <div
            class="absolute -bottom-8 -left-96 -z-10 transform-gpu blur-3xl sm:-bottom-64 sm:-left-40 lg:-bottom-32 lg:left-8 xl:-left-10 opacity-0"
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
        <div class="relative max-w-5xl mx-auto px-6 lg:px-8">
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-md rounded-3xl border border-green-500/30 p-12 sm:p-16 shadow-2xl ring-2 ring-green-500/20 shadow-green-500/20 text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-500/10 border border-green-500/20 rounded-full mb-6 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm font-semibold text-green-400">Serving New Mexico</span>
                </div>
                
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-6 animate-fadeIn">
                    <span class="text-white">Albuquerque's Trusted Installers for</span><br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400">Commercial CCTV & Security</span>
                </h2>
                
                <p class="text-lg text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Professional installation and 24/7 service for all your security infrastructure needs across New Mexico
                </p>
            </div>
        </div>
    </div>
</template>
<script setup></script>

<style scoped>
.animate-fadeIn {
  animation: fadeIn 1.2s ease-out;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>
