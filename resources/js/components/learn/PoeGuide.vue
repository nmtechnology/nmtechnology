<template>
  <section id="poe" class="scroll-mt-28 mb-14">
    <div class="bg-gray-900/40 rounded-xl border border-green-600/30 p-6 md:p-8">
      <h2 class="text-2xl md:text-3xl font-bold">PoE (Power over Ethernet) Standards & Classifications</h2>
      <p class="mt-3 text-gray-300 max-w-3xl">
        PoE lets one Ethernet cable carry both data and power. The confusing part is power “classes” and standards.
        If your cameras reboot at night or your access control reader drops offline, PoE budgeting is often the reason.
      </p>

      <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-black/30 border border-gray-800 rounded-lg p-5">
          <h3 class="font-semibold text-green-300">Cheat sheet (common IEEE PoE)</h3>
          <div class="mt-3 overflow-x-auto">
            <table class="w-full text-sm border border-gray-800 rounded-lg overflow-hidden">
              <thead class="bg-gray-900">
                <tr>
                  <th class="text-left p-3 text-green-300">Standard</th>
                  <th class="text-left p-3 text-green-300">Often called</th>
                  <th class="text-left p-3 text-green-300">Max from switch (PSE)</th>
                  <th class="text-left p-3 text-green-300">Use cases</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-800">
                <tr class="bg-black/20">
                  <td class="p-3 font-semibold">802.3af</td>
                  <td class="p-3 text-gray-300">PoE</td>
                  <td class="p-3 text-gray-300">15.4 W</td>
                  <td class="p-3 text-gray-300">Basic cameras, small sensors, VoIP phones</td>
                </tr>
                <tr class="bg-black/10">
                  <td class="p-3 font-semibold">802.3at</td>
                  <td class="p-3 text-gray-300">PoE+</td>
                  <td class="p-3 text-gray-300">30 W</td>
                  <td class="p-3 text-gray-300">Better cameras, dual‑band APs, some intercoms</td>
                </tr>
                <tr class="bg-black/20">
                  <td class="p-3 font-semibold">802.3bt (Type 3)</td>
                  <td class="p-3 text-gray-300">PoE++</td>
                  <td class="p-3 text-gray-300">60 W</td>
                  <td class="p-3 text-gray-300">PTZ cameras, multi‑radio APs, small displays</td>
                </tr>
                <tr class="bg-black/10">
                  <td class="p-3 font-semibold">802.3bt (Type 4)</td>
                  <td class="p-3 text-gray-300">PoE++ / Hi‑PoE</td>
                  <td class="p-3 text-gray-300">90 W</td>
                  <td class="p-3 text-gray-300">High‑power PTZ, heaters/blowers, some endpoints</td>
                </tr>
              </tbody>
            </table>
          </div>
          <p class="mt-3 text-xs text-gray-400">
            Note: device-available watts can be lower due to cable loss; always check device “PoE draw” specs.
          </p>
        </div>

        <div class="bg-black/30 border border-gray-800 rounded-lg p-5">
          <h3 class="font-semibold text-green-300">PoE budget calculator</h3>
          <p class="mt-2 text-sm text-gray-300">
            Enter your device count and watts to estimate whether a switch’s power budget is enough.
          </p>

          <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm text-gray-300">Number of devices</label>
              <input
                v-model.number="deviceCount"
                type="number"
                min="0"
                class="mt-2 w-full bg-gray-900 border border-gray-700 rounded-md p-2 text-white"
              />
            </div>
            <div>
              <label class="block text-sm text-gray-300">Watts per device (avg)</label>
              <input
                v-model.number="wattsPerDevice"
                type="number"
                min="0"
                step="0.1"
                class="mt-2 w-full bg-gray-900 border border-gray-700 rounded-md p-2 text-white"
              />
            </div>
            <div>
              <label class="block text-sm text-gray-300">Switch PoE budget (W)</label>
              <input
                v-model.number="switchBudget"
                type="number"
                min="0"
                step="1"
                class="mt-2 w-full bg-gray-900 border border-gray-700 rounded-md p-2 text-white"
              />
            </div>
            <div>
              <label class="block text-sm text-gray-300">Design headroom</label>
              <select v-model.number="headroomPct" class="mt-2 w-full bg-gray-900 border border-gray-700 rounded-md p-2 text-white">
                <option :value="10">10%</option>
                <option :value="20">20%</option>
                <option :value="30">30%</option>
              </select>
            </div>
          </div>

          <div class="mt-5 rounded-lg border border-gray-700 bg-gray-900/60 p-4">
            <div class="flex items-center justify-between text-sm">
              <span class="text-gray-300">Estimated load</span>
              <span class="font-semibold text-white">{{ estimatedLoad.toFixed(1) }} W</span>
            </div>
            <div class="mt-2 flex items-center justify-between text-sm">
              <span class="text-gray-300">With headroom</span>
              <span class="font-semibold text-white">{{ estimatedWithHeadroom.toFixed(1) }} W</span>
            </div>
            <div class="mt-3">
              <div
                class="rounded-md px-3 py-2 text-sm"
                :class="
                  fitsBudget
                    ? 'bg-green-900/30 border border-green-600/30 text-green-200'
                    : 'bg-red-900/30 border border-red-600/30 text-red-200'
                "
              >
                <span class="font-semibold">{{ fitsBudget ? 'Looks OK' : 'Likely underpowered' }}</span>
                <span class="ml-2">{{ recommendation }}</span>
              </div>
            </div>
          </div>

          <p class="mt-3 text-xs text-gray-400">
            If you have PTZ cameras with heaters/IR, use their maximum draw (nighttime is the usual worst case).
          </p>
        </div>
      </div>

      <div class="mt-8 bg-black/30 border border-gray-800 rounded-lg p-5">
        <h3 class="font-semibold text-green-300">Common “why did it reboot?” reasons</h3>
        <ul class="mt-3 text-sm text-gray-300 list-disc pl-5 space-y-2">
          <li>Total switch PoE budget exceeded (especially after upgrades).</li>
          <li>Per‑port limit hit (device needs PoE+ but port is PoE).</li>
          <li>Long cable runs increase loss; borderline devices brown‑out.</li>
          <li>Cold weather heaters/IR push draw above average.</li>
        </ul>
      </div>
    </div>
  </section>
</template>

<script setup>
import { computed, ref } from 'vue'

const deviceCount = ref(8)
const wattsPerDevice = ref(8)
const switchBudget = ref(120)
const headroomPct = ref(20)

const estimatedLoad = computed(() => Math.max(0, deviceCount.value) * Math.max(0, wattsPerDevice.value))
const estimatedWithHeadroom = computed(() => estimatedLoad.value * (1 + Math.max(0, headroomPct.value) / 100))
const fitsBudget = computed(() => estimatedWithHeadroom.value <= Math.max(0, switchBudget.value))

const recommendation = computed(() => {
  if (deviceCount.value === 0) return 'Add devices to estimate your budget.'
  if (fitsBudget.value) return 'You have headroom for spikes and future adds.'

  const deficit = estimatedWithHeadroom.value - Math.max(0, switchBudget.value)
  if (deficit <= 10) return 'You are very close — consider a higher PoE budget or reducing per-device draw.'
  return 'Increase switch PoE budget, use fewer endpoints per switch, or use PoE injectors for high‑draw devices.'
})
</script>
