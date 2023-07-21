<template>
    <div class="bg-gray-900 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-lime-400">
                    Deploy faster
                </h2>
                <p
                    class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl"
                >
                    Everything you need to deploy your website to the world!
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-300">
                    Our company specializes in developing custom websites and
                    web applications tailored to the unique needs of small
                    businesses. We understand that every business is different,
                    which is why we take a personalized approach to each project
                    we undertake. From simple brochure sites to complex
                    e-commerce solutions, We also pride ourselves on our
                    commitment to customer service.
                </p>
            </div>
            <div
                class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none"
            >
                <dl
                    class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3"
                >
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
import ContactModal from '../components/ContactModal.vue'

const features = [
  {
    name: 'Web Development',
    description:
            'We work closely with our clients throughout the development process to make sure their vision is realized and their goals are achieved. And even after launch, we provide ongoing support and maintenance to ensure your website or application remains up-to-date and running smoothly. \n' +
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
