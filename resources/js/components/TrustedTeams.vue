<template>
    <div class="bg-gray-900 py-24 sm:py-32">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-x-8 gap-y-16 lg:grid-cols-2">
          <div class="mx-auto w-full max-w-xl lg:mx-0">
            <h2 class="text-pretty text-4xl font-semibold tracking-tight text-white sm:text-5xl">Trusted by the most innovative teams</h2>
            <p class="mt-6 text-lg/8 text-gray-300">We work closely with national contractors and quick service food franchises in order to keep their facilities running at their best and protecting your employees. We can have a technician 
                onsite within 24 hours and getting the issue resolved. We can service cctv security cameras, security systems, fire alarms and data network infrastructure. These are crucial components that keep you running!
            </p>
            <div class="mt-8 flex items-center gap-x-6">
              <a href="#" class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Create account</a>
              <a href="#" class="text-sm font-semibold text-white">Contact us <span aria-hidden="true">&rarr;</span></a>
            </div>
          </div>
          <div class="mx-auto grid w-full max-w-xl grid-cols-2 items-center gap-y-12 sm:gap-y-14 lg:mx-0 lg:max-w-none lg:pl-8">
            <img class="max-h-12 w-full object-contain object-left" src="https://tailwindui.com/plus/img/logos/tuple-logo-white.svg" alt="Tuple" width="105" height="48" />
            <img class="max-h-12 w-full object-contain object-left" src="https://tailwindui.com/plus/img/logos/reform-logo-white.svg" alt="Reform" width="104" height="48" />
            <img class="max-h-12 w-full object-contain object-left" src="https://tailwindui.com/plus/img/logos/savvycal-logo-white.svg" alt="SavvyCal" width="140" height="48" />
            <img class="max-h-12 w-full object-contain object-left" src="https://tailwindui.com/plus/img/logos/laravel-logo-white.svg" alt="Laravel" width="136" height="48" />
            <img class="max-h-12 w-full object-contain object-left" src="https://tailwindui.com/plus/img/logos/transistor-logo-white.svg" alt="Transistor" width="158" height="48" />
            <img class="max-h-12 w-full object-contain object-left" src="https://tailwindui.com/plus/img/logos/statamic-logo-white.svg" alt="Statamic" width="147" height="48" />
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
    </div>
  </template>
  

<script>
import {
  ArrowPathIcon,
  CloudArrowUpIcon,
  LockClosedIcon
} from '@heroicons/vue/20/solid'

const features = [
  {
    name: 'Max Uptime',
    description:
            "In today's digital age, having your network functioning fast is crucial for any business. We can keep you connected with the latest updates on your firmware and software.",
    href: '#',
    icon: CloudArrowUpIcon
  },
  {
    name: 'Fast Tech Service',
    description:
            'A fast response to your tech issues can provide you with a reliable experience from all your devices and framework Give us a call and we can provide service today!',
    href: '#',
    icon: LockClosedIcon
  },
  {
    name: 'Affordable Pricing',
    description:
            'Pellentesque sit elit congue ante nec amet. Dolor aenean curabitur viverra suspendisse iaculis eget. Nec mollis placerat ultricies euismod ut condimentum.',
    href: '#',
    icon: ArrowPathIcon
  }
]
</script>