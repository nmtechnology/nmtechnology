<template>
  <section id="alarm-insurance" class="scroll-mt-28">
    <div class="bg-gray-900/40 rounded-xl border border-green-600/30 p-6 md:p-8">
      <h2 class="text-2xl md:text-3xl font-bold">Why a Security Alarm Helps (and Insurance FAQ)</h2>
      <p class="mt-3 text-gray-300 max-w-3xl">
        People shop alarms for peace of mind, deterrence, and faster response. Insurance discounts are often a bonus —
        but the details depend on the insurer and whether the system is professionally monitored.
      </p>

      <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-black/30 border border-gray-800 rounded-lg p-5">
          <h3 class="font-semibold text-green-300">How alarms increase security</h3>
          <ul class="mt-3 text-sm text-gray-300 list-disc pl-5 space-y-2">
            <li><span class="font-semibold">Deterrence:</span> visible keypads, stickers, and sirens can change attacker behavior.</li>
            <li><span class="font-semibold">Detection:</span> perimeter + interior sensors catch events early.</li>
            <li><span class="font-semibold">Response:</span> monitored systems can dispatch when you can’t answer a phone.</li>
            <li><span class="font-semibold">Documentation:</span> paired cameras/events help reconstruct what happened.</li>
          </ul>
        </div>

        <div class="bg-black/30 border border-gray-800 rounded-lg p-5">
          <h3 class="font-semibold text-green-300">Insurance value (what’s realistic)</h3>
          <ul class="mt-3 text-sm text-gray-300 list-disc pl-5 space-y-2">
            <li>Many insurers offer discounts for monitored burglar and/or fire alarms.</li>
            <li>They often want proof (alarm certificate, monitoring letter, or installer documentation).</li>
            <li>Discounts vary by carrier, location, and coverage — confirm before buying just for savings.</li>
          </ul>
        </div>
      </div>

      <div class="mt-8 bg-black/30 border border-gray-800 rounded-lg p-5">
        <h3 class="font-semibold text-green-300">FAQs</h3>

        <div class="mt-4 space-y-3">
          <div
            v-for="(item, idx) in faqs"
            :key="item.q"
            class="rounded-lg border border-gray-800 bg-gray-900/50"
          >
            <button
              class="w-full text-left px-4 py-3 flex items-center justify-between gap-4"
              @click="toggle(idx)"
              :aria-expanded="openIndex === idx ? 'true' : 'false'"
            >
              <span class="font-semibold text-white">{{ item.q }}</span>
              <span class="text-green-300 font-semibold">{{ openIndex === idx ? '−' : '+' }}</span>
            </button>
            <div v-if="openIndex === idx" class="px-4 pb-4 text-sm text-gray-300">
              {{ item.a }}
            </div>
          </div>
        </div>

        <p class="mt-4 text-xs text-gray-400">
          If you want, we can recommend a system sized for your home/business and provide documentation for your insurer.
        </p>
      </div>
    </div>
  </section>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import { injectSchema } from '../../composables/useSEO'

const openIndex = ref(0)

const faqs = [
  {
    q: 'Is a monitored alarm “worth it” versus self-monitoring?',
    a: 'Self-monitoring can work, but monitored service helps when you miss a notification, lose cell service, or are asleep. If fast dispatch and redundancy matter, monitoring is usually the upgrade people keep.'
  },
  {
    q: 'Do I need a permit for a burglar alarm?',
    a: 'Many cities require permits/registration for alarm systems to reduce false dispatches. Requirements vary by jurisdiction, so it’s best to check local rules before installation.'
  },
  {
    q: 'Will my insurance company give a discount?',
    a: 'Often yes, especially for monitored burglar and/or fire alarms, but the amount varies. Ask what proof they need and whether the discount applies to burglary, fire, or both.'
  },
  {
    q: 'What’s the difference between burglary and fire monitoring?',
    a: 'Burglary monitoring focuses on intrusion sensors (doors/windows/motion). Fire monitoring adds smoke/heat detection reporting and often has stricter requirements for reliability and documentation.'
  },
  {
    q: 'Do security cameras replace an alarm system?',
    a: 'Cameras are great for verification and evidence, but alarms are designed for immediate detection and response. Many strong setups use both: cameras + intrusion sensors + monitoring.'
  }
]

function toggle(idx) {
  openIndex.value = openIndex.value === idx ? -1 : idx
}

onMounted(() => {
  const schema = {
    '@context': 'https://schema.org',
    '@type': 'FAQPage',
    mainEntity: faqs.map((f) => ({
      '@type': 'Question',
      name: f.q,
      acceptedAnswer: { '@type': 'Answer', text: f.a }
    }))
  }

  injectSchema(schema, 'alarm-insurance-faq')
})
</script>
