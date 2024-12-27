<template>
    <div>
        <header class="fixed inset-x-0 top-0 z-30 h-20 bg-gray-900">
            <nav class="flex items-center justify-between p-6 lg:px-8 w-screen" aria-label="Global">
                <div class="flex lg:flex-1 -mt-8 lg:-mt-8 md:-mt-8 sm:-mt-8 lg:-mx-8 md:mx-16 sm:-mx-8">
                    <router-link to="/" class="fixed">
                        <img class="md:box-border h-10 w-18 fixed mx-12 z-30"
                            src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo"></router-link>
                    <router-link to="/"
                        class="fixed italic text-lg font-extrabold leading-1 text-white mx-28 lg:mt-1 md:mt-1 sm:mt-1 mt-1 z-40">Technology</router-link>
                </div>
                <!-- mobile menu button -->
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-green-400"
                        @click="mobileMenuOpen = true">
                        <span class="sr-only">Open main menu</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" className="size-4">
  <path fillRule="evenodd" d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clipRule="evenodd" />
</svg>

                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-5 gap-x-10">
                    <router-link to="cctv" class="nav-item text-sm font-semibold leading-6 text-white hover:text-green-400 active:text-green-400 rounded-sm">CCTV
                    </router-link>
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">Security Systems
                    </router-link>
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">Fire Alarms
                    </router-link>
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">Networking
                    </router-link>
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">Structured Cabling
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
                        <div class="-my-6 divide-y divide-white-500/40">
                            <div class="space-y-2 py-6">
                                <a v-for="item in navigation" :key="item.name" :href="item.href"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-500">{{
                                    item.name }}</a>
                            </div>
                            <div class="hidden lg:flex lg:gap-x-5 gap-x-10">
                    <router-link to="cctv" class="nav-item text-sm font-semibold leading-6 text-white hover:text-green-400 active:text-green-400 rounded-sm">CCTV
                    </router-link>
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">Security Systems</router-link>
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">Fire Alarms</router-link>
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">Networking</router-link>
                    <router-link to="cctv" class="text-sm font-semibold leading-6 text-white hover:text-green-400">Structured Cabling</router-link>
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

const mobileMenuOpen = ref(false)
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
