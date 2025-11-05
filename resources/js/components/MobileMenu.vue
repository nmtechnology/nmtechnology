<template>
  <Popover>
    <PopoverButton
      class="inline-flex items-center gap-x-1 text-sm font-semibold leading-6 text-green-400 hover:text-lime-400 transition-colors duration-300"
    >
      <span>Solutions</span>
      <ChevronDownIcon class="h-5 w-5 text-lime-400" aria-hidden="true" />
    </PopoverButton>
    <transition
      enter-active-class="transition ease-out duration-200"
      enter-from-class="opacity-0 translate-y-1"
      enter-to-class="opacity-100 translate-y-0"
      leave-active-class="transition ease-in duration-150"
      leave-from-class="opacity-100 translate-y-0"
      leave-to-class="opacity-0 translate-y-1"
    >
      <PopoverPanel
        class="absolute left-1/2 z-10 mt-5 flex w-screen max-w-min -translate-x-1/2 px-4"
      >
        <div
          class="w-64 shrink rounded-2xl bg-gray-800/90 backdrop-blur-md p-5 text-sm font-semibold leading-6 text-white shadow-2xl ring-1 ring-green-500/30 border border-green-600/20"
        >
          <div class="mb-4 pb-3 border-b border-green-600/20">
            <div
              class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400 font-bold text-center text-base"
            >
              Protecting New Mexico with Smart Security
            </div>
          </div>
          <a
            v-for="item in solutions"
            :key="item.name"
            :href="item.href"
            class="block p-3 rounded-lg hover:text-green-400 hover:bg-gray-700/50 hover:border-green-500/30 border border-transparent transition-all duration-300 mb-1"
          >
            {{ item.name }}
          </a>
        </div>
      </PopoverPanel>
    </transition>
  </Popover>
</template>
<script setup>
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import { ChevronDownIcon } from "@heroicons/vue/20/solid";

const solutions = [
  { name: "Security Cameras", href: "CcTv" },
  { name: "Security Systems", href: "#" },
  { name: "Fire Alarms", href: "#" },
  { name: "Access Control", href: "#" },
  { name: "Structured Cabling", href: "#" },
  { name: "Automation", href: "#" },
];
</script>
