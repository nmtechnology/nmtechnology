<template>
<div class="bg-gray-900">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="mx-auto bg-transparent flex max-w-7xl items-center justify-between p-6 lg:px-8 bg-gradient-to-r from-transparent" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">NM Technology</span>
                        <img class="h-10 w-10 w-auto flex z-10" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo">
                    </a><a href="#" class="z-12 italic text-sm -space-x-0 font-extrabold leading-6 text-white flex-initial mr10">Technology</a>
                </div>

                <div class="flex lg:hidden">
                    <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-skin-base">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#" class="text-sm font-semibold leading-6 text-white">CCTV</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Security Systems</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Access Control</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Fire Alarms</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Networking</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Structured Cabling</a>

                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">

                </div>
            </nav>

            <!-- Mobile menu, show/hide based on menu open state. -->
            <!-- <div class="lg:hidden" role="dialog" aria-modal="true"> -->
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <!-- <div class="fixed inset-0 z-50"></div>
                <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto flex-none" src="/images/nm-logo-rmbg.webp" alt="nmtechnology-logo">
                        </a><a href="#" class="text-sm italic font-bold leading-6 text-white flex-initial">Technology</a>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                           <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                               <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                           </svg>
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
                        </div>
                    </div>
                </div>
            </div> -->
        </header>
    </div>
<router-view></router-view>

</template>

<script>
import { ref } from 'vue'
const mobileMenuOpen = ref(false)
</script>

<style>

</style>
