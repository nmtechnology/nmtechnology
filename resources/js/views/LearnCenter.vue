<template>
  <NmtPage
    title="Security & Networking Learning Center"
    subtitle="Plain‑English guides for people comparing ONVIF cameras, PoE power standards, fire alarm cabling, and access control design. Built to answer the “what does this mean?” questions before you buy."
  >
    <template #header>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="nmt-card">
          <h2 class="text-lg font-semibold text-green-300">Quick topics</h2>
          <div class="mt-3 flex flex-wrap gap-2">
            <router-link class="nmt-chip-link" :to="{ path: '/learn', hash: '#onvif' }">ONVIF protocols</router-link>
            <router-link class="nmt-chip-link" :to="{ path: '/learn', hash: '#poe' }">PoE classes</router-link>
            <router-link class="nmt-chip-link" :to="{ path: '/learn', hash: '#fire-alarm-cabling' }">Fire alarm wiring</router-link>
            <router-link class="nmt-chip-link" :to="{ path: '/learn', hash: '#access-control' }">Access control schemes</router-link>
            <router-link class="nmt-chip-link" :to="{ path: '/learn', hash: '#alarm-insurance' }">Alarm & insurance FAQs</router-link>
          </div>
        </div>

        <div class="nmt-card">
          <h2 class="text-lg font-semibold text-green-300">Need design help?</h2>
          <p class="mt-2 text-gray-300 text-sm">
            If you’re planning an upgrade in Albuquerque / New Mexico, we can spec switches, power budgets,
            camera compatibility, and door hardware.
          </p>
          <router-link
            to="/products"
            class="inline-flex mt-3 px-4 py-2 rounded-lg bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 text-white font-semibold text-sm"
          >
            Explore products & request a quote
          </router-link>
        </div>
      </div>
    </template>

    <OnvifGuide />
    <PoeGuide />
    <FireAlarmCablingGuide />
    <AccessControlStrategiesGuide />
    <SecurityAlarmInsuranceFAQ />
  </NmtPage>
</template>

<script setup>
import { onMounted, watch, nextTick } from 'vue'
import { injectSchema, useSEO } from '../composables/useSEO'

// Allow optional initial hash when embedding the Learn page inline so a parent
// can open a specific section inside a modal.
const props = defineProps({
  initialHash: {
    type: String,
    default: ''
  }
})

// When embedded with an initialHash, scroll to that section once mounted or when changed
const scrollToHash = async (hash) => {
  if (!hash) return
  await nextTick()
  try {
    const el = document.querySelector(hash)
    if (el) {
      el.scrollIntoView({ behavior: 'smooth', block: 'start' })
      // Also set focus for accessibility
      el.setAttribute('tabindex', '-1')
      el.focus({ preventScroll: true })
    } else {
      console.warn('LearnCenter: Could not find element for hash', hash)
    }
  } catch (e) {
    console.error('LearnCenter: scrollToHash error', e)
  }
}

onMounted(() => {
  if (props.initialHash) scrollToHash(props.initialHash)
})

watch(() => props.initialHash, (h) => {
  if (h) scrollToHash(h)
})

import NmtPage from '../components/ui/NmtPage.vue'

import OnvifGuide from '../components/learn/OnvifGuide.vue'
import PoeGuide from '../components/learn/PoeGuide.vue'
import FireAlarmCablingGuide from '../components/learn/FireAlarmCablingGuide.vue'
import AccessControlStrategiesGuide from '../components/learn/AccessControlStrategiesGuide.vue'
import SecurityAlarmInsuranceFAQ from '../components/learn/SecurityAlarmInsuranceFAQ.vue'

useSEO({
  title: 'ONVIF, PoE Classes, Fire Alarm Cabling & Access Control Schemes | NM Technology',
  description:
    'Learn ONVIF profiles, PoE power classifications (802.3af/at/bt), fire alarm wiring and cabling basics, access control security strategies, and alarm/insurance FAQs. Simple guides built for buyers and DIY researchers.',
  keywords:
    'ONVIF profiles, ONVIF protocol, PoE classes, power over ethernet classifications, 802.3af 802.3at 802.3bt, fire alarm cabling FPL FPLR FPLP, NFPA 72 wiring basics, access control schemes OSDP Wiegand, security alarm insurance discount',
  path: '/learn'
})

onMounted(() => {
  const faqSchema = {
    '@context': 'https://schema.org',
    '@type': 'FAQPage',
    mainEntity: [
      {
        '@type': 'Question',
        name: 'What does ONVIF mean for security cameras?',
        acceptedAnswer: {
          '@type': 'Answer',
          text: 'ONVIF is a common interoperability standard that helps cameras, NVRs, and VMS software talk to each other. It can simplify mixing brands, but features still depend on specific ONVIF profiles and each device’s implementation.'
        }
      },
      {
        '@type': 'Question',
        name: 'What are PoE classes and why do they matter?',
        acceptedAnswer: {
          '@type': 'Answer',
          text: 'PoE classes help a switch budget and allocate power per port. Knowing your device watts and switch power budget helps prevent random reboots and lets you size the right PoE switch or injectors.'
        }
      },
      {
        '@type': 'Question',
        name: 'What cable is typically used for fire alarm wiring?',
        acceptedAnswer: {
          '@type': 'Answer',
          text: 'Fire alarm circuits commonly use listed fire alarm cable such as FPL/FPLR/FPLP depending on the space (general, riser, or plenum). Final requirements depend on NFPA/NEC and the Authority Having Jurisdiction.'
        }
      },
      {
        '@type': 'Question',
        name: 'Is OSDP better than Wiegand for access control?',
        acceptedAnswer: {
          '@type': 'Answer',
          text: 'OSDP is generally preferred for modern installs because it supports stronger security features and supervised communication compared to legacy Wiegand, but compatibility and existing wiring can influence the choice.'
        }
      },
      {
        '@type': 'Question',
        name: 'Does a monitored security alarm reduce homeowners insurance?',
        acceptedAnswer: {
          '@type': 'Answer',
          text: 'Many insurers offer a discount for monitored burglar/fire alarms, but the discount and eligibility vary. Ask your insurer what documentation they need (often an alarm certificate or monitoring letter).'
        }
      }
    ]
  }

  injectSchema(faqSchema, 'learn-center-faq')
})
</script>
