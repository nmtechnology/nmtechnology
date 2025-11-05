<template>
  <div class="relative bg-gradient-to-b from-black via-gray-900 to-gray-900 py-24 sm:py-32 overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 left-0 -translate-y-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-gradient-to-br from-green-500/10 to-lime-500/5 rounded-full blur-3xl" aria-hidden="true"></div>
    
    <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
      <div class="mx-auto max-w-4xl text-center">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-500/10 border border-green-500/20 rounded-full mb-6">
          <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
          </svg>
          <span class="text-sm font-semibold text-green-400">Flexible Pricing</span>
        </div>
        <h2 class="text-4xl font-bold tracking-tight text-white sm:text-5xl mb-6">
          Plans for <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400">Every Need</span>
        </h2>
        <p class="text-xl text-gray-300 leading-relaxed">Choose an affordable monitoring plan with premium features to protect your property, assets, and peace of mind.</p>
      </div>

      <div class="mt-16 flex justify-center">
        <RadioGroup v-model="frequency" class="grid grid-cols-2 gap-x-1 rounded-full p-1 text-center text-xs font-semibold leading-5 ring-1 ring-inset ring-gray-700">
          <RadioGroupLabel class="sr-only">Payment frequency</RadioGroupLabel>
          <RadioGroupOption as="template" v-for="option in frequencies" :key="option.value" :value="option" v-slot="{ checked }">
            <div :class="[checked ? 'bg-green-600 text-white' : 'text-gray-300', 'cursor-pointer rounded-full px-2.5 py-1']">
              <span>{{ option.label }}</span>
            </div>
          </RadioGroupOption>
        </RadioGroup>
      </div>

      <div class="isolate mx-auto mt-10 grid max-w-md grid-cols-1 gap-8 md:max-w-2xl md:grid-cols-2 lg:max-w-4xl xl:mx-0 xl:max-w-none xl:grid-cols-4">
        <div v-for="tier in tiers" :key="tier.id" :class="[
          tier.mostPopular ? 'ring-2 ring-green-500 shadow-2xl shadow-green-500/20' : 'ring-1 ring-gray-700/50', 
          'relative rounded-2xl p-8 bg-gradient-to-br from-gray-800 to-gray-900 text-gray-200 backdrop-blur-sm transform-gpu transition-all duration-300 hover:scale-[1.02] hover:shadow-xl group'
        ]">
          <!-- Popular Badge -->
          <div v-if="tier.mostPopular" class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 bg-gradient-to-r from-green-500 to-lime-500 text-white text-xs font-bold rounded-full shadow-lg">
            MOST POPULAR
          </div>
          
          <div class="flex flex-col h-full">
            <div class="flex-grow">
              <h3 :id="tier.id" class="text-xl font-bold text-white mb-3">{{ tier.name }}</h3>
              <p class="text-sm leading-6 text-gray-400 mb-6">{{ tier.description }}</p>
              
              <div class="mb-6">
                <div class="flex items-baseline gap-x-2">
                  <span class="text-5xl font-bold tracking-tight text-white">{{ tier.price[frequency.value] }}</span>
                  <span class="text-sm font-semibold text-gray-400">{{ frequency.priceSuffix }}</span>
                </div>
              </div>

              <button 
                @click="addPlanToCart(tier)" 
                type="button" 
                :aria-describedby="tier.id" 
                :class="[
                  tier.mostPopular 
                    ? 'bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 text-white shadow-lg shadow-green-500/30' 
                    : 'bg-gray-700/50 text-green-400 ring-1 ring-inset ring-green-600/50 hover:bg-gray-700 hover:ring-green-500', 
                  'w-full rounded-lg py-3 px-4 text-center text-sm font-bold transition-all duration-300 transform hover:scale-105 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500'
                ]">
                Select Plan
              </button>
            </div>

            <ul role="list" class="mt-8 space-y-3 text-sm border-t border-gray-700/50 pt-6">
              <li v-for="feature in tier.features" :key="feature" class="flex gap-x-3 items-start">
                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-green-500/20 flex items-center justify-center mt-0.5">
                  <CheckIcon class="h-3 w-3 text-green-400" aria-hidden="true" />
                </div>
                <span class="text-gray-300 leading-relaxed">{{ feature }}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'
import { CheckIcon } from '@heroicons/vue/20/solid'
import { cameraProducts } from '../data/productData.js'
import { cartStore } from '../store/cartStore.js'
import { toastService } from '../services/toastService.js'

const frequencies = [
  { value: 'monthly', label: 'Monthly', priceSuffix: '/month' },
  { value: 'annually', label: 'Annually', priceSuffix: '/year' },
]

const frequency = ref(frequencies[0])

const monitoringProducts = computed(() => {
  return cameraProducts.filter(p => p.category === 'monitoring' || p.recurring === true)
})

const tiers = computed(() => {
  return monitoringProducts.value.map(prod => {
    // determine numeric monthly price if available
    const numericPrice = (typeof prod.price === 'number')
      ? prod.price
      : (prod.specs && typeof prod.specs.monthlyFee === 'string')
        ? parseFloat(prod.specs.monthlyFee.replace(/[^0-9.]/g, ''))
        : null

    const monthlyStr = numericPrice ? `$${numericPrice}` : (prod.price ? `$${prod.price}` : (prod.specs?.monthlyFee ?? 'Call for price'))
    const annuallyStr = numericPrice ? `$${(numericPrice * 12).toFixed(2)}` : (prod.annualPrice ? `$${prod.annualPrice}` : 'Call for price')

    return {
      name: prod.name,
      id: prod.id,
      href: prod.href || '#',
      price: { monthly: monthlyStr, annually: annuallyStr },
      description: prod.description || '',
      features: prod.features || [],
      mostPopular: prod.mostPopular || false,
      // add raw numeric price and image for cart operations
      numericPrice: numericPrice,
      image: prod.image || null
    }
  })
})

const addPlanToCart = (tier) => {
  const item = {
    id: tier.id,
    name: tier.name,
    image: tier.image,
    // pass numeric price when available, otherwise null so cart subtotal logic can detect
    price: (typeof tier.numericPrice === 'number') ? tier.numericPrice : null
  }

  cartStore.addItem(item)
  cartStore.openCart()
  toastService.success(`Added ${tier.name} to quote cart!`)
}
</script>

<style scoped>
/* subtle card border highlight for popular tiers */
.ring-lime-500 {
  --tw-ring-color: rgba(132, 204, 22, 0.15);
}

/* small responsive tweaks */
@media (max-width: 640px) {
  .isolate > div {
    padding: 1.5rem !important;
  }
}
</style>