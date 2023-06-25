<template>
    <div class="bg-blue-950">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="mx-auto bg-blue-950 flex max-w-7xl items-center justify-between p-6 lg:px-8 bg-gradient-to-r from-blue-950" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">NM Technology</span>
                        <img class="h-8 w-auto flex" src="/images/nm-logo-rmbg.webp" alt="nmtechnology-logo">
                    </a><a href="#" class="text-sm -space-x-0 font-bold leading-6 text-white flex-initial">Technology</a>
                </div>

                <div class="flex lg:hidden">
                    <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-skin-base">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
<!--                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />-->
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#" class="text-sm font-semibold leading-6 text-white">CCTV</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Security Systems</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Access Control</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">IT Consulting</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Web Development</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">

                </div>
            </nav>

            <!-- Mobile menu, show/hide based on menu open state. -->
            <div class="lg:hidden" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-50"></div>
                <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-blue-950 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto flex-none" src="/images/nm-logo-rmbg.webp" alt="nmtechnology-logo">
                        </a><a href="#" class="text-sm italic font-bold leading-6 text-white flex-initial">Technology</a>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
<!--                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">-->
<!--                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />-->
<!--                            </svg>-->
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">CCTV</a>
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Security Systems</a>
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Access Control</a>
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Web Development</a>
                            </div>
                            <div class="mt-16 sm:mt-24 lg:mt-0 lg:flex-shrink-0 lg:flex-grow">
                                <svg viewBox="0 0 366 729" role="img" class="mx-auto w-[22.875rem] max-w-full drop-shadow-xl">
                                    <title>App screenshot</title>
                                    <defs>
                                        <clipPath id="2ade4387-9c63-4fc4-b754-10e687a0d332">
                                            <rect width="316" height="684" rx="36" />
                                        </clipPath>
                                    </defs>
                                    <path fill="#4B5563" d="M363.315 64.213C363.315 22.99 341.312 1 300.092 1H66.751C25.53 1 3.528 22.99 3.528 64.213v44.68l-.857.143A2 2 0 0 0 1 111.009v24.611a2 2 0 0 0 1.671 1.973l.95.158a2.26 2.26 0 0 1-.093.236v26.173c.212.1.398.296.541.643l-1.398.233A2 2 0 0 0 1 167.009v47.611a2 2 0 0 0 1.671 1.973l1.368.228c-.139.319-.314.533-.511.653v16.637c.221.104.414.313.56.689l-1.417.236A2 2 0 0 0 1 237.009v47.611a2 2 0 0 0 1.671 1.973l1.347.225c-.135.294-.302.493-.49.607v377.681c0 41.213 22 63.208 63.223 63.208h95.074c.947-.504 2.717-.843 4.745-.843l.141.001h.194l.086-.001 33.704.005c1.849.043 3.442.37 4.323.838h95.074c41.222 0 63.223-21.999 63.223-63.212v-394.63c-.259-.275-.48-.796-.63-1.47l-.011-.133 1.655-.276A2 2 0 0 0 366 266.62v-77.611a2 2 0 0 0-1.671-1.973l-1.712-.285c.148-.839.396-1.491.698-1.811V64.213Z" />
                                    <path fill="#343E4E" d="M16 59c0-23.748 19.252-43 43-43h246c23.748 0 43 19.252 43 43v615c0 23.196-18.804 42-42 42H58c-23.196 0-42-18.804-42-42V59Z" />
                                    <foreignObject width="316" height="684" transform="translate(24 24)" clip-path="url(#2ade4387-9c63-4fc4-b754-10e687a0d332)">
                                        <img src="https://tailwindui.com/img/component-images/mobile-app-screenshot.png" alt="" />
                                    </foreignObject>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="relative isolate">
                <svg class="absolute inset-x-0 top-0 -z-10 h-[64rem] w-full stroke-gray-200 [mask-image:radial-gradient(32rem_32rem_at_center,white,transparent)]" aria-hidden="true">
                    <defs>
                        <pattern id="1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                            <path d="M.5 200V.5H200" fill="none" />
                        </pattern>
                    </defs>
                    <svg x="50%" y="-1" class="overflow-visible">
                        <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" stroke-width="0" />
                    </svg>
                    <rect width="100%" height="100%" stroke-width="0" fill="url(#1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84)" />
                </svg>
                <div class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48" aria-hidden="true">
                    <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30"
                         style="clip-path: polygon(63.1% 29.5%, 100% 17.1%, 76.6% 3%, 48.4% 0%, 44.6% 4.7%, 54.5% 25.3%, 59.8% 49%, 55.2% 57.8%, 44.4% 57.2%, 27.8% 47.9%, 35.1% 81.5%, 0% 97.7%, 39.2% 100%, 35.2% 81.4%, 97.2% 52.8%, 63.1% 29.5%)"></div>
                </div>
                <div class="overflow-hidden">
                    <div class="mx-auto max-w-7xl px-6 pb-32 pt-36 sm:pt-60 lg:px-8 lg:pt-32">
                        <div class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center">
                            <div class="w-full max-w-xl lg:shrink-0 xl:max-w-2xl">
                                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">We’re changing the way you are protected.</h1>
                                <p class="relative mt-6 text-lg leading-8 text-white sm:max-w-md lg:max-w-none">By utilizing integrated technology here in New Mexico to
                                    protect your home or business, you can automate routine tasks and create customized settings based on your preferences.
                                    By offering a full range of security services and products that address both physical and cyber threats, we can protect
                                    organizations of all types and sizes protect their people, assets, and data. In addition, we offer ongoing maintenance
                                    and support services to ensure that these systems continue to function effectively over time.</p>
                            </div>




                            <div class="mt-14 flex justify-end gap-8 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0">
                                <div class="ml-auto w-44 flex-none space-y-8 pt-32 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-80">
                                    <div class="relative">
                                        <img src="/images/google-doorbellcam.webp" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                        <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
                                    </div>
                                </div>
                                <div class="mr-auto w-44 flex-none space-y-8 sm:mr-0 sm:pt-52 lg:pt-36">
                                    <div class="relative">
                                        <img src="/images/security-cam-1.webp" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                        <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
                                    </div>
                                    <div class="relative">
                                        <img src="/images/smart-access-control.webp" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                        <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
                                    </div>
                                </div>
                                <div class="w-44 flex-none space-y-8 pt-32 sm:pt-0">
                                    <div class="relative">
                                        <img src="/images/IT-rack.webp" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                        <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
                                    </div>
                                    <div class="relative">
                                        <img src="/images/code-dev.webp" alt="" class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                                        <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <SectionService />
    <Grecaptcha />
    <Footer />

</template>

<script>
import { ref } from 'vue'
import Footer from './Footer.vue'
import SectionService from "./SectionService.vue"
import Grecaptcha from "./Grecaptcha.vue"

export default {
    name: 'nmtechnology',
    components: {
        Footer, SectionService, Grecaptcha
    }
}


const navigation = [
    { name: 'CCTV', href: '#' },
    { name: 'Security Systems', href: '#' },
    { name: 'Access Control', href: '#' },
    { name: 'Web Development', href: '#' },
]

const mobileMenuOpen = ref(false)

</script>

