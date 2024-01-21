<template>
    <div class="bg-gray-900 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-lime-400">
                    Stay Protected 24/7
                </h2>
                <p
                    class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl"
                >
                    Leverage Modern Technology!
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-300">
                    NM Technology has the experience to protect what matters most for you. Our team of experienced technicians are available 24/7 to provide comprehensive support, ensuring your surveillance systems are always up and running at their best. Call or email us today and we can place you on our schedule right away!
                We work with top industry vendors and can provide you with the right solution for your property. Take a look at our partner list.
                </p>
            </div>
            <div class="grid lg:grid-cols-8 sm:grid-cols-8 p-12">
                <img src="/images/axiscomm-logo.png" class="flex flex-col h-9">
                <img src="/images/DSC-logo.png" class="flex flex-col p-3 h-9">
                <img src="/images/qolsys-logo.png" class="flex flex-col p-1 h-9">
                <img src="/images/ubiquity-logo.png" class="flex flex-col h-12">
                <img src="/images/linovision-logo.png" class="flex flex-col mt-3 h-9">
                <img src="/images/assaabloy-logo.png" class="flex flex-col mt-5 p-4s h-5">
                <img src="/images/allegion-logo.png" class="flex flex-col h-9">
                <img src="/images/teltonika-logo.png" class="flex flex-col mt-4 h-9">
            </div>
            <div class="grid lg:grid-cols-8 sm:grid-cols-8 p-12">
                <img src="/images/honeywell-logo.png" class="flex flex-col h-32">
                <img src="/images/doorbird-logo.png" class="flex flex-col mt-9 h-5">
                <img src="/images/leviton-logo.png" class="flex flex-col p-3 mb-9">
                <img src="/images/napco-logo.png" class="flex flex-col p-4">
                <img src="/images/zwave-logo.png" class="flex flex-col mt-6 h-9">
                <img src="/images/firelite-logo.png" class="flex flex-col mt-5">
                <img src="/images/dmp-logo.png" class="flex flex-col p-3 h-5">
                <img src="/images/teltonika-logo.png" class="flex flex-col mt-4 h-9">
            </div>
            <div class="w-full p-1 lg:p-2">
                </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    <div
                        v-for="feature in features"
                        :key="feature.name"
                        class="flex flex-col"
                    >
                        <dt
                            class="flex items-center gap-x-3 text-base font-semibold leading-7 text-white"
                        >
                            <component
                                :is="feature.icon"
                                class="h-5 w-5 flex-none text-lime-400"
                                aria-hidden="true"
                            />
                            {{ feature.name }}
                        </dt>
                        <dd
                            class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-300"
                        >
                            <p class="flex-auto">{{ feature.description }}</p>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</template>

<script setup>
import {
  ArrowPathIcon,
  CloudArrowUpIcon,
  LockClosedIcon
} from '@heroicons/vue/20/solid'

const features = [
  {
    name: '',
    description:
            '. \n' +
            "                    In today's digital age, having a strong online presence is crucial for any small business. Let us help you bring your vision to life and reach your target audience through the power of the internet.",
    href: '#',
    icon: CloudArrowUpIcon
  },
  {
    name: 'SSL certificates',
    description:
            'Pellentesque enim a commodo malesuada turpis eleifend risus. Facilisis donec placerat sapien consequat tempor fermentum nibh.',
    href: '#',
    icon: LockClosedIcon
  },
  {
    name: 'Simple queues',
    description:
            'Pellentesque sit elit congue ante nec amet. Dolor aenean curabitur viverra suspendisse iaculis eget. Nec mollis placerat ultricies euismod ut condimentum.',
    href: '#',
    icon: ArrowPathIcon
  }
]
</script>
