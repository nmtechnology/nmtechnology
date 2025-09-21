<template>
  <div class="bg-gray-900 py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-4xl text-center">
        <h2 class="text-base font-semibold leading-7 text-green-400">Pricing</h2>
        <p class="mt-2 text-4xl font-bold tracking-tight text-gray-100 sm:text-5xl">Pricing plans for teams of&nbsp;all&nbsp;sizes</p>
      </div>
      <p class="mx-auto mt-6 max-w-2xl text-center text-lg leading-8 text-gray-300">Choose an affordable plan that’s packed with the best features for engaging your audience, creating customer loyalty, and driving sales.</p>

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
        <div v-for="tier in tiers" :key="tier.id" :class="[tier.mostPopular ? 'ring-2 ring-lime-500' : 'ring-1 ring-gray-800', 'rounded-3xl p-8 bg-gray-800 text-gray-200 shadow-lg transform-gpu transition-all duration-300 hover:scale-[1.015]']">
          <h3 :id="tier.id" :class="[tier.mostPopular ? 'text-green-300' : 'text-gray-100', 'text-lg font-semibold leading-8']">{{ tier.name }}</h3>
          <p class="mt-4 text-sm leading-6 text-gray-300">{{ tier.description }}</p>
          <p class="mt-6 flex items-baseline gap-x-1">
            <span class="text-4xl font-bold tracking-tight text-gray-100">{{ tier.price[frequency.value] }}</span>
            <span class="text-sm font-semibold leading-6 text-gray-400">{{ frequency.priceSuffix }}</span>
          </p>

          <button @click="addPlanToCart(tier)" type="button" :aria-describedby="tier.id" :class="[tier.mostPopular ? 'bg-green-600 text-white shadow-sm hover:bg-green-500' : 'text-green-500 ring-1 ring-inset ring-green-700 hover:ring-green-500', 'mt-6 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600']">Buy plan</button>

          <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300">
            <li v-for="feature in tier.features" :key="feature" class="flex gap-x-3 items-start">
              <CheckIcon class="h-6 w-5 flex-none text-green-400 mt-0.5" aria-hidden="true" />
              <span class="text-sm">{{ feature }}</span>
            </li>
          </ul>
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