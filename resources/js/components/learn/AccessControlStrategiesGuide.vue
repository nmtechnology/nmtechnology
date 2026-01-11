<template>
  <section id="access-control" class="scroll-mt-28 mb-14">
    <div class="bg-gray-900/40 rounded-xl border border-green-600/30 p-6 md:p-8">
      <h2 class="text-2xl md:text-3xl font-bold">Access Control Security Schemes & Strategies</h2>
      <p class="mt-3 text-gray-300 max-w-3xl">
        Access control is more than “card reader on a door.” The strategy is about risk, safety, auditability, and how you
        want doors to behave during power loss, fire alarm, and normal business operations.
      </p>

      <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-black/30 border border-gray-800 rounded-lg p-5">
          <h3 class="font-semibold text-green-300">Scheme chooser</h3>
          <p class="mt-2 text-sm text-gray-300">Pick a scenario for a practical starting architecture.</p>

          <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm text-gray-300">Site type</label>
              <select v-model="siteType" class="mt-2 w-full bg-gray-900 border border-gray-700 rounded-md p-2 text-white">
                <option value="small-business">Small business</option>
                <option value="multi-tenant">Multi-tenant / office</option>
                <option value="industrial">Industrial / warehouse</option>
                <option value="residential">Residential / gated</option>
              </select>
            </div>
            <div>
              <label class="block text-sm text-gray-300">Security level</label>
              <select v-model="securityLevel" class="mt-2 w-full bg-gray-900 border border-gray-700 rounded-md p-2 text-white">
                <option value="basic">Basic</option>
                <option value="standard">Standard</option>
                <option value="high">High</option>
              </select>
            </div>
          </div>

          <div class="mt-5 rounded-lg border border-gray-700 bg-gray-900/60 p-4">
            <h4 class="font-semibold text-white">Recommended starting plan</h4>
            <ul class="mt-3 text-sm text-gray-300 list-disc pl-5 space-y-2">
              <li><span class="font-semibold">Reader protocol:</span> {{ recommendation.readerProtocol }}</li>
              <li><span class="font-semibold">Credentials:</span> {{ recommendation.credentials }}</li>
              <li><span class="font-semibold">Door monitoring:</span> {{ recommendation.doorMonitoring }}</li>
              <li><span class="font-semibold">Life safety:</span> {{ recommendation.lifeSafety }}</li>
              <li><span class="font-semibold">Audit + operations:</span> {{ recommendation.auditOps }}</li>
            </ul>
          </div>
        </div>

        <div class="bg-black/30 border border-gray-800 rounded-lg p-5">
          <h3 class="font-semibold text-green-300">Core building blocks</h3>
          <div class="mt-3 space-y-4 text-sm text-gray-300">
            <div>
              <p class="font-semibold text-white">Reader → Controller</p>
              <p class="mt-1">Legacy Wiegand is common, but modern installs often prefer OSDP where supported.</p>
            </div>
            <div>
              <p class="font-semibold text-white">Controller → Lock hardware</p>
              <p class="mt-1">Electric strike, maglock, or electrified lever sets. Choose based on door type and egress rules.</p>
            </div>
            <div>
              <p class="font-semibold text-white">Inputs</p>
              <p class="mt-1">Door position switch (DPS) + request-to-exit (REX) let you log forced/held-open events.</p>
            </div>
            <div>
              <p class="font-semibold text-white">System integrations</p>
              <p class="mt-1">Common integrations: camera call-up on door events, intrusion alarm arming by schedule, and elevator controls.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-8 bg-black/30 border border-gray-800 rounded-lg p-5">
        <h3 class="font-semibold text-green-300">Design questions people forget (but should ask)</h3>
        <ul class="mt-3 text-sm text-gray-300 list-disc pl-5 space-y-2">
          <li>Do doors need to be <span class="font-semibold">fail-safe</span> or <span class="font-semibold">fail-secure</span> for power loss?</li>
          <li>What happens during a fire alarm event (unlock? selectively unlock? stairwell behavior)?</li>
          <li>Do you need anti-passback, schedules, visitor management, or remote unlock?</li>
          <li>Do you want tamper supervision and “door forced/held” reporting (DPS + REX)?</li>
        </ul>
      </div>
    </div>
  </section>
</template>

<script setup>
import { computed, ref } from 'vue'

const siteType = ref('small-business')
const securityLevel = ref('standard')

const recommendation = computed(() => {
  const high = securityLevel.value === 'high'
  const basic = securityLevel.value === 'basic'

  const readerProtocol = high ? 'OSDP (preferred when supported)' : 'OSDP if available, otherwise Wiegand'
  const credentials = high
    ? 'Mobile credential or modern encrypted card + optional PIN for sensitive doors'
    : basic
      ? 'Card or keypad (keep it simple)'
      : 'Card or mobile credential; add PIN for after-hours areas'

  const doorMonitoring = high
    ? 'DPS + REX on controlled doors, with forced/held alarms'
    : 'At least DPS on key doors; add REX where you need auditability'

  const lifeSafety = siteType.value === 'industrial'
    ? 'Coordinate lock behavior with egress and fire alarm requirements; confirm AHJ expectations'
    : 'Confirm safe egress and fire alarm interface requirements for your door hardware'

  const auditOps = high
    ? 'Centralized controller(s), role-based access, detailed reporting, and event-to-video integrations'
    : basic
      ? 'Simple schedules and user management; plan for expansion'
      : 'Schedules + basic reporting; consider remote management and backups'

  return { readerProtocol, credentials, doorMonitoring, lifeSafety, auditOps }
})
</script>
