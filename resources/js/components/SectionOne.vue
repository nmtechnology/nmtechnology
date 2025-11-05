<template>
    <section class="z-40 relative isolate overflow-hidden py-24 sm:py-32 bg-gray-900">
        <img
            src="/public/images/spaceman.webp"
            alt="spaceman-image"
            class="absolute inset-0 h-full w-full object-cover opacity-80 animate-fadeIn"
        />
        <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
            <div
                class="absolute -bottom-8 -left-96 -z-10 transform-gpu blur-3xl sm:-bottom-64 sm:-left-40 lg:-bottom-32 lg:left-8 xl:-left-10"
                aria-hidden="true"
            >
                <div
                    class="aspect-[1300/999] w-[54.125rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-10"
                    style="
                        clip-path: polygon(
                            25.1% 44.1%,
                            100% 61.6%,
                            97.5% 2.9%,
                            10.5% 0.1%,
                            80.7% 2%,
                            72.5% 10.5%,
                            10.2% 62.4%,
                            89.4% 68.1%,
                            80.5% 58.3%,
                            45.2% 34.5%,
                            10.5% 76.7%,
                            0.1% 64.9%,
                            17.9% 100%,
                            27.6% 76.8%,
                            76.1% 97.7%,
                            10.1% 50.1%,
                            90% 10%
                        );
                    "
                />
            </div>
            <div class="text-center max-w-5xl mx-auto">
                <h2 class="text-4xl sm:text-5xl font-bold text-lime-400 mb-6 animate-fadeIn">
                    Commercial CCTV & Security Systems
                </h2>
                <p class="text-xl sm:text-2xl text-green-300 font-semibold mb-6 animate-fadeIn-delay">
                    Albuquerque's Trusted Leader in Commercial Security Solutions
                </p>
                <p class="text-lg text-gray-300 mb-8 leading-relaxed animate-fadeIn-delay-2">
                    NM Technology delivers comprehensive video surveillance, fire alarm systems, and security installations for retail, offices, and commercial spaces across New Mexico. Our certified technicians provide 24/7 support, rapid installation, and ongoing maintenance to protect your assets and operations.
                </p>
                <div class="grid sm:grid-cols-3 gap-6 mt-12 text-left">
                    <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-green-500/20 hover:border-green-500/40 transition-all duration-300">
                        <h3 class="text-lg font-bold text-green-400 mb-2">CCTV Installation</h3>
                        <p class="text-sm text-gray-300">Professional surveillance systems to deter theft and monitor operations 24/7</p>
                    </div>
                    <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-green-500/20 hover:border-green-500/40 transition-all duration-300">
                        <h3 class="text-lg font-bold text-green-400 mb-2">Fire Alarm Systems</h3>
                        <p class="text-sm text-gray-300">Expert installation and service to keep your property safe and compliant</p>
                    </div>
                    <div class="bg-gray-800/50 backdrop-blur-sm p-6 rounded-lg border border-green-500/20 hover:border-green-500/40 transition-all duration-300">
                        <h3 class="text-lg font-bold text-green-400 mb-2">Smart Automation</h3>
                        <p class="text-sm text-gray-300">Integrated security solutions with network infrastructure and access control</p>
                    </div>
                </div>
            </div>
            <dl
                class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-10 text-lime-400 sm:mt-20 sm:grid-cols-2 sm:gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-4"
            >
                <div
                    v-for="stat in stats"
                    :key="stat.id"
                    class="flex flex-col gap-y-3 border-l border-white/10 pl-6"
                >
                    <dt class="text-sm leading-6">{{ stat.name }}</dt>
                    <dd
                        class="order-first text-3xl font-semibold tracking-tight"
                    >
                        {{ stat.value }}
                    </dd>
                </div>
            </dl>
        </div>
    </section>
</template>

<script setup>
const stats = [
  { id: 1, name: 'Work Orders Completed', value: '3,000+' },
  { id: 2, name: 'Satisfaction Rate', value: '97%' },
  { id: 3, name: 'Safety Efficiency', value: '100%' },
  { id: 4, name: 'Customer Revenue Saved', value: '$309,003+' }
]
</script>

<style scoped>
.animate-fadeIn {
  animation: fadeIn 1.2s ease-out;
}
.animate-fadeIn-delay {
  animation: fadeIn 1.4s ease-out 0.2s forwards;
  opacity: 0;
}
.animate-fadeIn-delay-2 {
  animation: fadeIn 1.6s ease-out 0.4s forwards;
  opacity: 0;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>
