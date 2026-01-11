<template>
  <section id="onvif" class="scroll-mt-28 mb-14">
    <div class="bg-gray-900/40 rounded-xl border border-green-600/30 p-6 md:p-8">
      <div class="flex items-start justify-between gap-6 flex-col md:flex-row">
        <div>
          <h2 class="text-2xl md:text-3xl font-bold">ONVIF Protocols (Camera Compatibility Guide)</h2>
          <p class="mt-3 text-gray-300 max-w-3xl">
            People usually search “ONVIF” when they want to mix camera brands, replace an NVR, or confirm a camera
            will work with existing software. ONVIF helps interoperability, but it isn’t a magic “everything works” label.
          </p>
        </div>

        <div class="w-full md:w-96 bg-black/40 border border-gray-700 rounded-lg p-4">
          <h3 class="font-semibold text-green-300">Quick picker</h3>
          <label class="block mt-3 text-sm text-gray-300">What are you trying to do?</label>
          <select v-model="goal" class="mt-2 w-full bg-gray-900 border border-gray-700 rounded-md p-2 text-white">
            <option value="discover">Discover & add cameras to an NVR/VMS</option>
            <option value="stream">Pull video (live + basic settings)</option>
            <option value="ptz">Control PTZ</option>
            <option value="events">Use motion/analytics events</option>
          </select>

          <div class="mt-4 rounded-md bg-gray-900/60 border border-gray-700 p-3">
            <p class="text-sm text-gray-300">
              Suggested ONVIF focus:
              <span class="font-semibold text-white">{{ suggestedProfile.title }}</span>
            </p>
            <p class="mt-2 text-sm text-gray-400">{{ suggestedProfile.detail }}</p>
          </div>
        </div>
      </div>

      <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-black/30 border border-gray-800 rounded-lg p-5">
          <h3 class="font-semibold text-green-300">What ONVIF is</h3>
          <p class="mt-2 text-gray-300 text-sm">
            ONVIF is an open standard for IP security products. In practice it defines how devices like cameras and NVRs
            discover each other, authenticate, stream video, and exchange control/events.
          </p>
        </div>

        <div class="bg-black/30 border border-gray-800 rounded-lg p-5">
          <h3 class="font-semibold text-green-300">What ONVIF is not</h3>
          <ul class="mt-2 text-gray-300 text-sm space-y-2 list-disc pl-5">
            <li>Not a guarantee every feature works across brands.</li>
            <li>Not always “plug and play” (credentials, ports, profiles matter).</li>
            <li>Not the only compatibility layer (RTSP, vendor APIs, SDKs exist).</li>
          </ul>
        </div>

        <div class="bg-black/30 border border-gray-800 rounded-lg p-5">
          <h3 class="font-semibold text-green-300">Fast compatibility checklist</h3>
          <ul class="mt-2 text-gray-300 text-sm space-y-2 list-disc pl-5">
            <li>Match ONVIF profiles you need (S/G/T are common).</li>
            <li>Confirm codec support (H.264/H.265) and resolution/FPS limits.</li>
            <li>Confirm authentication method and user roles.</li>
            <li>Test time sync (NTP) so events/timestamps are accurate.</li>
          </ul>
        </div>
      </div>

      <div class="mt-8 overflow-x-auto">
        <table class="w-full text-sm border border-gray-800 rounded-lg overflow-hidden">
          <thead class="bg-gray-900">
            <tr>
              <th class="text-left p-3 text-green-300">Common profile</th>
              <th class="text-left p-3 text-green-300">What it usually covers</th>
              <th class="text-left p-3 text-green-300">When people care</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-800">
            <tr class="bg-black/20">
              <td class="p-3 font-semibold">Profile S</td>
              <td class="p-3 text-gray-300">Streaming + basic device discovery/configuration</td>
              <td class="p-3 text-gray-300">Replacing an NVR/VMS or mixing camera brands</td>
            </tr>
            <tr class="bg-black/10">
              <td class="p-3 font-semibold">Profile G</td>
              <td class="p-3 text-gray-300">Edge storage / recording access (SD card use cases)</td>
              <td class="p-3 text-gray-300">Failover recording, camera-side storage workflows</td>
            </tr>
            <tr class="bg-black/20">
              <td class="p-3 font-semibold">Profile T</td>
              <td class="p-3 text-gray-300">Modern streaming features (more current streaming options)</td>
              <td class="p-3 text-gray-300">Newer systems that want higher efficiency/secure transport</td>
            </tr>
          </tbody>
        </table>
      </div>

      <p class="mt-6 text-xs text-gray-400">
        Tip: If you’re troubleshooting “ONVIF won’t add,” verify IP/subnet, credentials, time sync, and whether the camera’s
        ONVIF service is enabled.
      </p>
    </div>
  </section>
</template>

<script setup>
import { computed, ref } from 'vue'

const goal = ref('discover')

const suggestedProfile = computed(() => {
  switch (goal.value) {
    case 'discover':
      return {
        title: 'Profile S (baseline)',
        detail: 'Start here for discovery + streaming. Most “will this camera work with my NVR?” questions live here.'
      }
    case 'stream':
      return {
        title: 'Profile S or T',
        detail: 'Profile S is common; Profile T is often mentioned for newer streaming/security capabilities.'
      }
    case 'ptz':
      return {
        title: 'PTZ support + Profile S',
        detail: 'Many PTZ controls ride alongside general ONVIF services; confirm your VMS explicitly lists PTZ compatibility.'
      }
    case 'events':
      return {
        title: 'Events/analytics support',
        detail: 'Event interoperability varies a lot by vendor. Validate the specific event types you need (motion, line-crossing, etc.).'
      }
    default:
      return { title: 'Profile S', detail: 'A good starting point for most camera/NVR integrations.' }
  }
})
</script>
