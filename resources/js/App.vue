<template>
<div class="bg-gray-900 fixed z-40">
        <header class="w-screen sticky shadow-lg">
            <nav class="flex-row sm:flex-row p-10 lg:px-8 flex mx-30" aria-label="Global">
                <div class="px-16 flex -mt-8">
                    <router-link to="/" class="md:box-border h-16 max-w-32 size-full fixed mx-5 z-30">
                        <img class="md:box-border h-16 max-w-32 size-full flex-initial fixed mx-5 z-30" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo"></router-link>
                    <router-link to="/" class="italic text-lg font-extrabold leading-6 text-white flex-initial mx-36 mr10 lg:mt-5 md:mt-5 sm:mt-5 mt-5 z-40">Technology</router-link>
                </div>
                    <div class="lg:flex flex-col sm:flex-row gap-9">
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white">Security Cameras</router-link>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Security Systems</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Access Control</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Fire Alarms</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Network</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Structured Cabling</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Automation</a>
                    <MobileMenu />
                </div>
            </nav>
        </header>
    </div>
<router-view></router-view>

</template>

<script>
import { ref } from 'vue'
import MobileMenu from './components/MobileMenu.vue'
const mobileMenuOpen = ref(true)
</script>

<style>

</style>
