<template>
    <div class="relative isolate overflow-hidden py-24 sm:py-32">
        <img
            src="/public/images/spaceman.webp"
            alt="spaceman-image"
            class="absolute inset-0 -z-10 h-full w-full object-cover"
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
            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-xl">
                <div class="flex lg:flex-1">
                    <img
                        class="h-12 w-auto flex"
                        src="/public/images/nm-logo-rmbg.webp"
                        alt="nmtechnology-logo"
                    />
                    <p class="text-lg mt-3 -space-x-0 font-bold leading-6 text-white flex-initial">
                        Technology
                    </p>
                </div>
                <br />
                <br />
                <h2 class="text-base font-semibold leading-8 text-lime-400">
                    Our track record
                </h2>
                <p
                    class="mt-2 text-3xl font-bold tracking-tight text-green-600 sm:text-4xl"
                >
                    Trusted by hundreds of corporations worldwide
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-200">
                    Join countless satisfied national contractors and clients who have leveraged our
                    services to enhance safety and drive efficient
                    change. Whether it's improving workplace safety, reducing theft and asset loss, or 
                    protecting your home or business we've got you covered.
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
    </div>
</template>

<script setup>
const stats = [
  { id: 1, name: 'Work Orders Completed', value: '3,000+' },
  { id: 2, name: 'Satisfaction Rate', value: '97%' },
  { id: 3, name: 'Safety Efficiency', value: '100%' },
  { id: 4, name: 'Customer Revenue Saved', value: '$309,003+' }
]
</script>
