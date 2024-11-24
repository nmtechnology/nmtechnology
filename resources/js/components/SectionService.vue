<template>
    <div class="bg-gray-900">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-rows-1 p-12 justify-center ">
            <img class="h-12 z-20" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo"><a href="#" class="text-sm italic font-bold leading-6 text-white flex-initial">Technology</a>
            </div>
            <work-collage></work-collage>
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-lime-400">
                    Stay Protected 24/7!
                </h2>
                <p
                    class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl"
                >
                    Leverage Modern Technology
                </p>
                <p class="mt-6 mb-12 text-lg leading-8 text-gray-300">
                    NM Technology has the experience and know-how to professionally install and protect what matters most for you. 
                    Our team of experienced technicians are available 24/7 to provide comprehensive support, ensuring your surveillance systems 
                    are always up and running at their best. Call or email us today and we can place you on our schedule right away!
                We work with top industry vendors and can provide you with the right solution for your property. Take a look at our partner list.  
                </p>
            </div>
            <div class="grid lg:columns-8 sm:columns-2 flex-row lg:grid-cols-8 sm:grid-cols-8">
                <img src="/public/images/axiscomm-logo.png" class="flex flex-row h-9 object-contain">
                <img src="/public/images/DSC-logo.png" class="flex flex-row p-3 h-9">
                <img src="/public/images/qolsys-logo.png" class="flex flex-row p-1 h-9">
                <img src="/public/images/ubiquity-logo.png" class="flex flex-row h-9 object-fill">
                <img src="/public/images/linovision-logo.png" class="flex flex-row mt-3 h-9">
                <img src="/public/images/zwave-logo.png" class="flex flex-col h-9">
                <img src="/public/images/allegion-logo.png" class="flex flex-row h-9">
                <img src="/public/images/teltonika-logo.png" class="flex flex-row h-9">
            </div>
            <div class="w-full p-1 lg:p-2">
                </div>
            
        </div>
    </div>
</template>

<script setup>
import WorkCollage from './WorkCollage.vue';

</script>
