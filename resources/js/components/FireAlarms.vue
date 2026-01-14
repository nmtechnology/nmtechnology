<template>
    <main
      class="pt-[60px] pb-24 flex-grow relative z-20 bg-gradient-to-b from-black via-gray-900 to-gray-900"
    >
      <!-- Decorative Background Blurs -->
      <div
        class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-gradient-to-br from-red-500/10 to-orange-500/5 rounded-full blur-3xl -z-10"
        aria-hidden="true"
      ></div>
      <div
        class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-gradient-to-tl from-orange-500/10 to-red-500/10 rounded-full blur-3xl -z-10"
        aria-hidden="true"
      ></div>

      <!-- Hero -->
      <section class="relative">
        <div class="mx-auto max-w-7xl px-6 pt-12 sm:pt-16 lg:px-8 lg:pt-20">
          <div class="flex justify-center mb-6">
            <div
              class="inline-flex items-center gap-2 px-4 py-2 bg-red-500/10 border border-red-500/20 rounded-full backdrop-blur-sm"
            >
              <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                  clip-rule="evenodd"
                />
              </svg>
              <span class="text-sm font-semibold text-red-400">Fire Alarm Systems & Life Safety</span>
            </div>
          </div>

          <h1 class="text-4xl sm:text-5xl font-extrabold text-center mb-6">
            <span class="text-white">Protect Lives With </span>
            <span
              class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-orange-400"
              >Code-Compliant Fire Alarm Systems</span
            >
          </h1>

          <!-- NMTech Bot Image with Red Glow -->
          <div class="flex justify-center mb-8">
            <div class="relative">
              <!-- Red glow effect behind the image -->
              <div class="absolute inset-0 bg-red-400/30 blur-3xl rounded-full scale-110" aria-hidden="true"></div>
              <!-- Image -->
              <img
                src="/public/images/nmtech-bot.webp"
                alt="NM Technology Bot"
                class="relative w-48 h-48 sm:w-64 sm:h-64 object-contain animate-fadeIn"
              />
            </div>
          </div>

          <p class="text-gray-300 text-lg text-center max-w-4xl mx-auto leading-relaxed animate-fadeIn">
            Professional fire alarm installation, inspection, and service across New Mexico. 
            We design and install NFPA-compliant systems that meet NM State Fire Marshal requirements 
            and local AHJ specifications — from new construction to retrofits, testing, and ongoing maintenance.
          </p>

          <div class="mt-10 flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-4">
            <button
              type="button"
              @click="contactUs"
              class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-red-600 to-red-500 hover:from-red-500 hover:to-red-400 text-white rounded-lg font-semibold shadow-lg shadow-red-500/30 transition-all duration-300 transform hover:scale-105"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 8a2 2 0 01-2 2H7l-4 4V6a2 2 0 012-2h14a2 2 0 012 2v2z"
                />
              </svg>
              Contact Us
            </button>

            <button
              type="button"
              @click="getQuote"
              class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-700/50 text-red-400 ring-1 ring-inset ring-red-600/50 hover:bg-gray-700 hover:ring-red-500 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                />
              </svg>
              Get Quote
            </button>
          </div>

          <div class="mt-12 grid gap-4 sm:grid-cols-3 max-w-5xl mx-auto">
            <div class="rounded-2xl border border-red-500/20 bg-gray-900/40 p-5 ring-1 ring-red-500/10">
              <p class="text-sm font-semibold text-red-400">Code compliant</p>
              <p class="mt-2 text-sm text-gray-300">NFPA, NM Fire Marshal, and local AHJ requirements met on every install.</p>
            </div>
            <div class="rounded-2xl border border-red-500/20 bg-gray-900/40 p-5 ring-1 ring-red-500/10">
              <p class="text-sm font-semibold text-red-400">Licensed & certified</p>
              <p class="mt-2 text-sm text-gray-300">Experienced technicians with proper credentials and training.</p>
            </div>
            <div class="rounded-2xl border border-red-500/20 bg-gray-900/40 p-5 ring-1 ring-red-500/10">
              <p class="text-sm font-semibold text-red-400">Full lifecycle support</p>
              <p class="mt-2 text-sm text-gray-300">Design, installation, inspection, testing, and ongoing maintenance.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Services -->
      <section class="mt-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="max-w-3xl">
            <h2 class="text-2xl sm:text-3xl font-bold text-white">
              Fire alarm services for commercial & residential properties
            </h2>
            <p class="mt-3 text-gray-300">
              From small tenant improvements to large commercial buildings, we handle fire alarm 
              design, installation, inspection, and service — ensuring code compliance and reliable life safety protection.
            </p>
          </div>

          <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div
              v-for="service in services"
              :key="service.title"
              class="rounded-2xl bg-gradient-to-br from-gray-800 to-gray-900 border border-red-500/20 ring-1 ring-red-500/10 p-6 shadow-xl"
            >
              <div class="flex items-start gap-3">
                <div
                  class="mt-1 flex h-10 w-10 items-center justify-center rounded-xl bg-red-500/10 border border-red-500/20"
                >
                  <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"
                    />
                  </svg>
                </div>
                <div class="flex-1">
                  <h3 class="text-white font-semibold text-lg">{{ service.title }}</h3>
                  <p class="mt-2 text-sm text-gray-300 leading-relaxed">{{ service.description }}</p>
                </div>
              </div>

              <ul class="mt-4 space-y-2">
                <li v-for="item in service.highlights" :key="item" class="flex items-start gap-2 text-sm text-gray-300">
                  <svg class="mt-0.5 h-4 w-4 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  <span>{{ item }}</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <!-- Process -->
      <section class="mt-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="rounded-3xl border border-red-500/20 bg-gray-900/40 ring-1 ring-red-500/10 p-8 sm:p-10">
            <div class="max-w-3xl">
              <h2 class="text-2xl sm:text-3xl font-bold text-white">How we deliver compliant fire alarm systems</h2>
              <p class="mt-3 text-gray-300">
                A proven process from design to final inspection — we handle code research, permitting, 
                installation, testing, and AHJ sign-off so your system passes inspection the first time.
              </p>
            </div>

            <div class="mt-8 grid gap-6 lg:grid-cols-4">
              <div v-for="step in steps" :key="step.title" class="rounded-2xl bg-gray-900/30 border border-red-500/10 p-6">
                <p class="text-sm font-semibold text-red-400">{{ step.kicker }}</p>
                <p class="mt-2 text-white font-semibold">{{ step.title }}</p>
                <p class="mt-2 text-sm text-gray-300">{{ step.description }}</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- CTA -->
      <section class="mt-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div
            class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-gray-900 via-gray-900 to-gray-800 border border-red-500/20 ring-1 ring-red-500/10 p-8 sm:p-10"
          >
            <div
              class="absolute -top-20 -right-20 h-72 w-72 rounded-full bg-gradient-to-br from-red-500/15 to-orange-500/10 blur-3xl"
              aria-hidden="true"
            ></div>
            <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
              <div class="max-w-2xl">
                <h3 class="text-2xl font-bold text-white">Need a fire alarm system designed or serviced?</h3>
                <p class="mt-3 text-gray-300">
                  From new construction to existing building retrofits — we handle design, permitting, 
                  installation, and inspection coordination.
                </p>
              </div>
              <div class="flex flex-col sm:flex-row gap-4">
                <button
                  type="button"
                  @click="contactUs"
                  class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-red-600 to-red-500 hover:from-red-500 hover:to-red-400 text-white rounded-lg font-semibold shadow-lg shadow-red-500/30 transition-all duration-300"
                >
                  Contact Us
                </button>
                <button
                  type="button"
                  @click="getQuote"
                  class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-700/50 text-red-400 ring-1 ring-inset ring-red-600/50 hover:bg-gray-700 hover:ring-red-500 rounded-lg font-semibold transition-all duration-300"
                >
                  Get Quote
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </template>

  <script setup>
  import { inject } from "vue";
  import { useRouter } from "vue-router";

  const router = useRouter();
  const openContactModal = inject("openContactModal", null);

  const contactUs = () => {
    if (typeof openContactModal === "function") {
      openContactModal();
      return;
    }
    router.push("/contact");
  };

  const getQuote = () => {
    router.push("/products");
  };

  const services = [
    {
      title: "New fire alarm installations",
      description:
        "Complete fire alarm system design and installation for commercial buildings, multi-family housing, and industrial facilities — engineered to meet NFPA 72 and local code requirements.",
      highlights: [
        "Addressable and conventional systems",
        "Smoke detectors, heat detectors, pull stations",
        "Notification appliances (horns, strobes, speakers)",
      ],
    },
    {
      title: "Fire alarm inspections & testing",
      description:
        "Annual, semi-annual, and quarterly inspections per NFPA 72 requirements. Full system testing with detailed reports for AHJ submittal and building owner records.",
      highlights: [
        "NFPA 72 compliant testing procedures",
        "Detector sensitivity testing",
        "Battery backup and power supervision tests",
      ],
    },
    {
      title: "System upgrades & retrofits",
      description:
        "Upgrade outdated fire alarm panels, add coverage to existing systems, or retrofit older buildings to meet current code during renovations.",
      highlights: [
        "Panel replacements and expansions",
        "Add zones and devices to existing systems",
        "Code compliance upgrades for renovations",
      ],
    },
    {
      title: "Service & troubleshooting",
      description:
        "Fast response for fire alarm troubles, false alarms, and system faults. We diagnose issues quickly and restore systems to full operation with proper documentation.",
      highlights: [
        "Trouble signal diagnosis and repair",
        "Device replacements (detectors, modules, NACs)",
        "System programming and configuration",
      ],
    },
    {
      title: "Monitoring & central station connections",
      description:
        "Connect your fire alarm system to UL-listed central monitoring stations for 24/7 alarm response and fire department notification.",
      highlights: [
        "Cellular and IP communicators",
        "Central station activation and testing",
        "Municipal fire department tie-ins",
      ],
    },
    {
      title: "Permit coordination & AHJ approval",
      description:
        "We handle permit applications, plan submittals, code research, and final inspection coordination with the New Mexico State Fire Marshal and local AHJs.",
      highlights: [
        "Fire alarm plan reviews and submittals",
        "Permit acquisition and tracking",
        "Final inspection scheduling and support",
      ],
    },
  ];

  const steps = [
    {
      kicker: "Step 1",
      title: "Code research & design",
      description: "We review occupancy type, building size, and local amendments to design a compliant system with proper device placement and coverage.",
    },
    {
      kicker: "Step 2",
      title: "Permitting & plan review",
      description: "Submit fire alarm plans to the AHJ, address plan review comments, and secure installation permits before starting work.",
    },
    {
      kicker: "Step 3",
      title: "Installation & programming",
      description: "Professional installation with clean wiring, proper device mounting, panel programming, and full system integration.",
    },
    {
      kicker: "Step 4",
      title: "Testing & inspection sign-off",
      description: "Complete NFPA 72 acceptance testing, coordinate final inspection with the AHJ, and provide as-built documentation.",
    },
  ];
  </script>

  <style scoped>
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(16px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-fadeIn {
    animation: fadeIn 0.8s ease-out;
  }
</style>
