<!-- eslint-disable no-mixed-spaces-and-tabs -->
<!-- eslint-disable no-tabs -->
<template>
    <div class="root">
        <button class="text-white text-center text-lg" id="button" @click="isOpen = true">Contact Us</button>
        <teleport to="body">
            <div class="modal" v-if="isOpen">
                <!-- TAILWIND FORM START -->
                <div class="relative isolate bg-blue-950">
      <div><button class="text-white float-right mr-9 mt-9" @click="isOpen = false">X</button></div>
      <div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2">
        <div class="relative px-6 pb-20 pt-24 sm:pt-32 lg:static lg:px-8 lg:py-48">
          <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
            <div class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden ring-1 ring-white/5 lg:w-1/2">
              <svg class="absolute inset-0 h-full w-full stroke-gray-700 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
                <defs>
                  <pattern id="54f88622-e7f8-4f1d-aaf9-c2f5e46dd1f2" width="200" height="200" x="100%" y="-1" patternUnits="userSpaceOnUse">
                    <path d="M130 200V.5M.5 .5H200" fill="none" />
                  </pattern>
                </defs>
                <svg x="100%" y="-1" class="overflow-visible fill-gray-950/30">
                  <path d="M-470.5 0h201v201h-201Z" stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#54f88622-e7f8-4f1d-aaf9-c2f5e46dd1f2)" />
              </svg>
              <div class="absolute -left-56 top-[calc(100%-13rem)] transform-gpu blur-3xl lg:left-[max(-14rem,calc(100%-59rem))] lg:top-[calc(50%-7rem)]" aria-hidden="true">
                <div class="aspect-[1155/678] w-[72.1875rem] bg-gradient-to-br from-[#80caff] to-[#4f46e5] opacity-20" style="clip-path: polygon(74.1% 56.1%, 100% 38.6%, 97.5% 73.3%, 85.5% 100%, 80.7% 98.2%, 72.5% 67.7%, 60.2% 37.8%, 52.4% 32.2%, 47.5% 41.9%, 45.2% 65.8%, 27.5% 23.5%, 0.1% 35.4%, 17.9% 0.1%, 27.6% 23.5%, 76.1% 2.6%, 74.1% 56.1%)" />
              </div>
            </div>
            <h2 class="text-3xl font-bold tracking-tight text-white">Get in touch</h2>
            <p class="mt-6 text-lg leading-8 text-gray-300">Proin volutpat consequat porttitor cras nullam gravida at. Orci molestie a eu arcu. Sed ut tincidunt integer elementum id sem. Arcu sed malesuada et magna.</p>
            <dl class="mt-10 space-y-4 text-base leading-7 text-gray-300">
              <div class="flex gap-x-4">
                <dt class="flex-none">
                  <span class="sr-only">Address</span>
                  <BuildingOffice2Icon class="h-7 w-6 text-gray-400" aria-hidden="true" />
                </dt>
                <dd>12900 Juan Tabo<br />Albuquerque, NM 87112</dd>
              </div>
              <div class="flex gap-x-4">
                <dt class="flex-none">
                  <span class="sr-only">Telephone</span>
                  <PhoneIcon class="h-7 w-6 text-gray-400" aria-hidden="true" />
                </dt>
                <dd><a class="hover:text-white" href="tel:+1 (505) 659-5097">+1 (505) 659-5097</a></dd>
              </div>
              <div class="flex gap-x-4">
                <dt class="flex-none">
                  <span class="sr-only">Email</span>
                  <EnvelopeIcon class="h-7 w-6 text-gray-400" aria-hidden="true" />
                </dt>
                <dd><a class="hover:text-white" href="mailto:hello@example.com">hello@example.com</a></dd>
              </div>
            </dl>
          </div>
        </div>
        <div>

<!-- FORM STARTS HERE DUMBASS -->

<div class="asana-embed-container"><link rel="stylesheet" href="https://form.asana.com/static/asana-form-embed-style.css"/><iframe class="asana-embed-iframe" height="533" width = "800" src="https://form.asana.com/?k=6pAvMCcJt27tVtR9CNkprQ&d=1201840591062137&embed=true"></iframe><div class="asana-embed-footer"><a rel="nofollow noopener" target="_blank" class="asana-embed-footer-link" href="https://asana.com/?utm_source=embedded_form"><span class="asana-embed-footer-text">Form powered by NM Technology</span></a></div></div>
        <!-- <form id="contact-form" novalidate="novalidate" action="../../php" method="POST" class="px-6 pb-24 pt-20 sm:pb-32 lg:px-8 lg:py-48">
          <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
              <div>
                <label for="first-name" class="block text-sm font-semibold leading-6 text-white">First name</label>
                <div class="mt-2.5">
                  <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" />
                </div>
              </div>
              <div>
                <label for="last-name" class="block text-sm font-semibold leading-6 text-white">Last name</label>
                <div class="mt-2.5">
                  <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" />
                </div>
              </div>
              <div class="sm:col-span-2">
                <label for="email" class="block text-sm font-semibold leading-6 text-white">Email</label>
                <div class="mt-2.5">
                  <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" />
                </div>
              </div>
              <div class="sm:col-span-2">
                <label for="phone-number" class="block text-sm font-semibold leading-6 text-white">Phone number</label>
                <div class="mt-2.5">
                  <input type="tel" name="phone-number" id="phone-number" autocomplete="tel" class="block w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" />
                </div>
              </div>
              <div class="sm:col-span-2">
                <label for="message" class="block text-sm font-semibold leading-6 text-white">Message</label>
                <div class="mt-2.5">
                  <textarea name="message" id="message" rows="4" class="block w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" />
                </div>
              </div>
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit" class="rounded-md bg-lime-600 px-3.5 py-1.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-lime-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Send message</button>
            </div>
          </div>
        </form> -->
        <!--empty area for form error/success output-->
		<div>
		    <div>
			    <div id="output-area">
			    </div>
            </div>
        </div>
      </div>
    </div>
    </div>
            </div>
        </teleport>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { BuildingOffice2Icon, EnvelopeIcon, PhoneIcon } from '@heroicons/vue/24/outline'
const isOpen = ref(false)
</script>
<style>

#button {
    background-color: #15803d;
    border-radius: 30px;
    padding: 5%;
    width: 200px;
    transition: opacity 0.3s ease;
    justify-content: center;
}

.root {
    position: relative;
    text-decoration-color: white;
}

.modal {
    z-index: 1000;
    position: sticky;
    padding-top: 17%;
    top: 0;
    left: 0;
    background-color: rgba(3, 13, 30, 0.67);
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    border-color: #15803d;
}

@media (max-width: 375px) {
    .modal {
        padding-top: 300%;
    }
}

@media (max-width: 900px) {
    .modal {
        padding-top: 100%;
    }
}

@media (max-width: 1024px) {
    .modal {
        padding-top: 100%;
    }
}

.modal > div {
    background-color: #111827;
    padding: 10px;
    border-radius: 50px;
}
</style>
