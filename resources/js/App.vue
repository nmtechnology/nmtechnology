<template>
<div class="bg-gray-900 fixed z-40">
        <header class="w-screen">
            <nav class="p-6 lg:px-8 flex mx-30" aria-label="Global">
                <div class="px-16 flex">
                    <a href="#" class="flex max-w-32">
                        <img class="md:box-border h-16 max-w-32 size-full flex-initial fixed mx-5 z-30" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo">
                    </a>
                    <a href="#" class="italic text-lg font-extrabold leading-6 text-white flex-initial mx-32 mr10 lg:mt-5 md:mt-5 sm:mt-5 xs:mt-3 z-40">Technology</a>
                </div>
                    <div class="md:hidden lg:flex lg:gap-x-6 sm:gap-x-6 mx-10 mt-2 flex">
                    <a href="#" class="text-sm font-semibold leading-6 text-white">CCTV</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Security Systems</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Access Control</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Fire Alarms</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Network</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Structured Cabling</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Automation</a>

                </div>
            </nav>
        </header>
    </div>
<router-view></router-view>

</template>

<script>
import { ref } from 'vue'
import TopBanner from './components/TopBanner.vue'
import MobileMenu from './components/MobileMenu.vue'
const mobileMenuOpen = ref(false)
</script>

<style>

</style>
