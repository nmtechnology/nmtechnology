<template>
    <TopBanner />
<div class="bg-gray-900 ">
        <header class="inset-x-0 top-0 z-50">
            <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex">
                    <a href="#" class="">
                        <img class="md:box-border h-25 w-32 static" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo">
                    </a><a href="#" class="italic text-lg font-extrabold leading-6 text-white flex-initial mr10 lg:mt-5 md:mt-5 sm:mt-5 xs:mt-3">Technology</a>
                </div>

                <div>
                </div>
                <div class="hidden lg:flex lg:gap-x-12 justify-center ml-40">
                    <a href="#" class="text-sm font-semibold leading-6 text-white">CCTV</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Security Systems</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Access Control</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Fire Alarms</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Network</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Structured Cabling</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Automation</a>

                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">

                </div>
            </nav>
            <MobileMenu />
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
