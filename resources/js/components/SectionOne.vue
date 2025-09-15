<template>
    <section class="z-40 relative isolate overflow-hidden py-24 sm:py-32 bg-gray-900">
        <img
            src="/public/images/spaceman.webp"
            alt="spaceman-image"
            class="absolute inset-0 z-20 h-full w-full object-cover opacity-80 animate-fadeIn"
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
            <div class="text-center">
                <h2 class="text-3xl sm:text-4xl font-bold text-lime-400 mb-4 animate-fadeIn">
                    Commercial Security & CCTV Installation for New Mexico Businesses
                </h2>
                <p class="text-lg text-gray-300 mb-8 animate-fadeIn-delay">
                    NM Technology delivers advanced security solutions, including
                    <strong class="text-green-400">CCTV installation</strong>, fire alarms, and network
                    infrastructure. Our Albuquerque-based team is trusted by hundreds of corporations and
                    franchises for reliable, rapid service and ongoing support.<br /><br />
                    We help you automate safety, reduce theft, and protect your business with the latest
                    technology. Contact us for a free consultation and discover why we’re New Mexico’s
                    preferred security partner.
                </p>
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
  animation: fadeIn 1.4s ease-out 0.3s forwards;
  opacity: 0;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>
