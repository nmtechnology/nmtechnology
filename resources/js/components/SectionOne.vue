<template>
    <div class="relative isolate overflow-hidden py-24 sm:py-32">
        <img
            src="/images/spaceman.webp"
            alt=""
            class="absolute inset-0 -z-10 h-full w-full object-cover"
        />
        <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
            <div
                class="absolute -bottom-8 -left-96 -z-10 transform-gpu blur-3xl sm:-bottom-64 sm:-left-40 lg:-bottom-32 lg:left-8 xl:-left-10"
                aria-hidden="true"
            >
                <div
                    class="aspect-[1266/975] w-[64.125rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-10"
                    style="
                        clip-path: polygon(
                            74.1% 44.1%,
                            100% 61.6%,
                            97.5% 26.9%,
                            85.5% 0.1%,
                            80.7% 2%,
                            72.5% 32.5%,
                            60.2% 62.4%,
                            52.4% 68.1%,
                            47.5% 58.3%,
                            45.2% 34.5%,
                            27.5% 76.7%,
                            0.1% 64.9%,
                            17.9% 100%,
                            27.6% 76.8%,
                            76.1% 97.7%,
                            74.1% 44.1%
                        );
                    "
                />
            </div>
            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-xl">
                <div class="flex lg:flex-1">
                    <img
                        class="h-8 w-auto flex"
                        src="/images/nm-logo-rmbg.webp"
                        alt="nmtechnology-logo"
                    />
                    <p
                        class="text-sm -space-x-0 font-bold leading-6 text-white flex-initial"
                    >
                        Technology
                    </p>
                </div>
                <br />
                <br />
                <h2 class="text-base font-semibold leading-8 text-lime-400">
                    Our track record
                </h2>
                <p
                    class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl"
                >
                    Trusted by thousands of corporations worldwide
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-300">
                    Join countless satisfied users who have leveraged our
                    platform to enhance safety awareness and drive positive
                    change. Whether it's improving workplace safety, analyzing
                    community crime rates, or identifying areas for improvement
                    in your personal routine—we've got you covered.
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
  { id: 4, name: 'Customer Revenue Saved', value: '$' }
]
</script>
