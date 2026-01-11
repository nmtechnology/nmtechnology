<template>
  <section id="fire-alarm-cabling" class="scroll-mt-28 mb-14">
    <div class="bg-gray-900/40 rounded-xl border border-green-600/30 p-6 md:p-8">
      <h2 class="text-2xl md:text-3xl font-bold">Fire Alarm Wiring Standards & Cabling Basics</h2>
      <p class="mt-3 text-gray-300 max-w-3xl">
        Fire alarm work is code-driven and inspected. This guide explains the terminology people search for (FPL/FPLR/FPLP,
        NAC/SLC, Class A vs Class B) so you can plan a project and ask better questions.
      </p>

      <div class="mt-6 rounded-lg border border-yellow-600/30 bg-yellow-900/10 p-4">
        <p class="text-sm text-yellow-100">
          This is general information, not a substitute for design/inspection requirements. Final requirements depend on
          the adopted code version and your AHJ (Authority Having Jurisdiction).
        </p>
      </div>

      <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-black/30 border border-gray-800 rounded-lg p-5">
          <h3 class="font-semibold text-green-300">Key terms (plain English)</h3>
          <dl class="mt-3 space-y-3 text-sm">
            <div>
              <dt class="font-semibold text-white">NAC</dt>
              <dd class="text-gray-300">Notification Appliance Circuit (horns/strobes). Often supervised and power-limited.</dd>
            </div>
            <div>
              <dt class="font-semibold text-white">IDC / Initiating</dt>
              <dd class="text-gray-300">Input circuits for devices like pull stations or heat detectors (varies by panel/system type).</dd>
            </div>
            <div>
              <dt class="font-semibold text-white">SLC</dt>
              <dd class="text-gray-300">Signaling Line Circuit on addressable systems (devices have addresses and report status).</dd>
            </div>
            <div>
              <dt class="font-semibold text-white">Class A vs Class B</dt>
              <dd class="text-gray-300">Wiring styles describing survivability/return paths; used for planning and troubleshooting.</dd>
            </div>
          </dl>
        </div>

        <div class="bg-black/30 border border-gray-800 rounded-lg p-5">
          <h3 class="font-semibold text-green-300">Cable type quick selector</h3>
          <p class="mt-2 text-sm text-gray-300">Select the environment and circuit type to get a starting point for questions to ask.</p>

          <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm text-gray-300">Environment</label>
              <select v-model="environment" class="mt-2 w-full bg-gray-900 border border-gray-700 rounded-md p-2 text-white">
                <option value="general">General spaces</option>
                <option value="riser">Risers / vertical runs</option>
                <option value="plenum">Plenum (air-handling space)</option>
              </select>
            </div>
            <div>
              <label class="block text-sm text-gray-300">Circuit type</label>
              <select v-model="circuit" class="mt-2 w-full bg-gray-900 border border-gray-700 rounded-md p-2 text-white">
                <option value="nac">NAC (horn/strobe)</option>
                <option value="slc">SLC (addressable loop)</option>
                <option value="initiating">Initiating / IDC</option>
              </select>
            </div>
          </div>

          <div class="mt-5 rounded-lg border border-gray-700 bg-gray-900/60 p-4">
            <p class="text-sm text-gray-300">
              Suggested starting point:
              <span class="font-semibold text-white">{{ suggestion.cable }}</span>
            </p>
            <p class="mt-2 text-sm text-gray-400">{{ suggestion.notes }}</p>
            <ul class="mt-3 text-sm text-gray-300 list-disc pl-5 space-y-1">
              <li>Ask your AHJ/inspector if shielding is expected for this run.</li>
              <li>Confirm conductor size (AWG) based on voltage drop and device load.</li>
              <li>Confirm separation rules from non‑power‑limited circuits.</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="mt-8 bg-black/30 border border-gray-800 rounded-lg p-5">
        <h3 class="font-semibold text-green-300">Common standards people reference</h3>
        <ul class="mt-3 text-sm text-gray-300 list-disc pl-5 space-y-2">
          <li>NFPA 72: Fire Alarm and Signaling Code (system performance, inspection/testing, documentation).</li>
          <li>NFPA 70 (NEC): Electrical Code requirements (including wiring methods and listings).</li>
          <li>NEC Article 760 is commonly referenced for fire alarm circuits and cable listings.</li>
        </ul>
      </div>
    </div>
  </section>
</template>

<script setup>
import { computed, ref } from 'vue'

const environment = ref('general')
const circuit = ref('nac')

const suggestion = computed(() => {
  const env = environment.value
  const circ = circuit.value

  const cableByEnv = {
    general: 'FPL (general-purpose fire alarm cable)',
    riser: 'FPLR (riser-rated fire alarm cable)',
    plenum: 'FPLP (plenum-rated fire alarm cable)'
  }

  const circuitNotes = {
    nac: 'NAC runs are often the first place voltage-drop issues show up, especially with strobes and long distances.',
    slc: 'SLC wiring depends on the manufacturer (topology, shielding, and style). Follow the panel documentation closely.',
    initiating: 'Initiating/IDC circuits may be conventional or addressable depending on the system; supervision matters.'
  }

  return {
    cable: cableByEnv[env],
    notes: circuitNotes[circ]
  }
})
</script>
