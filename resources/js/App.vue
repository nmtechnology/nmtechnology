<template>
    <div>
        <header class="fixed inset-x-0 top-0 z-30 h-20 bg-gray-900">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1 -mt-12 lg:-mx-12">
                    <router-link to="/" class="fixed mx-5">
                        <img class="md:box-border h-16 max-w-32 size-full flex-initial fixed mx-5 z-30"
                            src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo"></router-link>
                    <router-link to="/"
                        class="fixed italic text-lg font-extrabold leading-6 text-white flex-initial mx-36 mr10 lg:mt-5 md:mt-5 sm:mt-5 mt-5 z-40">Technology</router-link>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white"
                        @click="mobileMenuOpen = true">
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-5 gap-x-10">
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400 active:text-green-400 rounded-sm">CCTV
                    </router-link>
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">Security
                        Systems</router-link>
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">Fire Alarms
                    </router-link>
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">Networking</router-link>
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">Strucured Cabling
                    </router-link>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Log in <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
            </nav>
            <Dialog class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
                <div class="fixed inset-0 z-30" />
                <DialogPanel
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto hover:bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <router-link to="/" class="md:box-border h-16 max-w-32 size-full fixed mx-5 z-30">
                            <img class="md:box-border h-16 max-w-32 size-full flex-initial fixed mx-5 z-30"
                                src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo"></router-link>
                        <router-link to="/"
                            class="italic text-lg font-extrabold leading-6 text-white flex-initial mx-36 mr10 lg:mt-5 md:mt-5 sm:mt-5 mt-5 z-40">Technology</router-link>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-white"
                            @click="mobileMenuOpen = false">
                            <span class="sr-only">Close menu</span>
                            <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-white-500/10">
                            <div class="space-y-2 py-6">
                                <a v-for="item in navigation" :key="item.name" :href="item.href"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{
                                    item.name }}</a>
                            </div>
                            <div class="py-6">
                                <router-link to="cctv" class="text-sm font-semibold leading-6 text-white">Security
                                    Cameras</router-link>
                            </div>
                        </div>
                    </div>
                </DialogPanel>
            </Dialog>
        </header>
    </div>
    <router-view></router-view>

</template>

<script>
import { ref } from 'vue'

import { Dialog, DialogPanel } from '@headlessui/vue'
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline'
import MobileMenu from './components/MobileMenu.vue'

const mobileMenuOpen = ref(true)
</script>

<style>
@media (min-width: 2560px) {
    #navbar {
        width: 100%;
        height: 60px;
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;

    }
}

@media (min-width: 322px) {
    #mobile-nav {
        display: none;
    }
}
</style>
