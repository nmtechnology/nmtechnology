<template>
    <!-- Global notification live region, render this permanently at the end of the document -->
    <div aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6">
      <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
        <!-- Notification panel, dynamically insert this into the live region when it needs to be displayed -->
        <transition enter-active-class="transform ease-out duration-300 transition" enter-from-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2" enter-to-class="translate-y-0 opacity-100 sm:translate-x-0" leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
          <div v-if="show" class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="p-4">
              <div class="flex items-start">
                <div class="flex-shrink-0">
                  <CheckCircleIcon class="h-6 w-6 text-green-400" aria-hidden="true" />
                </div>
                <div class="grid grid-rows-1 p-12 justify-center">
            <img class="h-12" src="/public/images/nm-logo-rmbg.webp" alt="nmtechnology-logo"><a href="#" class="text-sm italic font-bold leading-6 text-white flex-initial">Technology</a>
            </div>
                <p
                    class="text-3xl font-bold tracking-tight text-white sm:text-4xl text-center"
                >
                    Let's Get You Verified
                </p>
                <p
                    class="text-lg leading-8 flex-auto flex-col text-gray-300 text-center"
                >
                    As you can see were all about security, please utilize our
                    verification to continue to our site, thank you!
                </p>
                <div>
                    <br />
                    <a href="/" class="offset-md-2 offset-lg-2 offset-sm-3">
                        <button
                            data-sitekey="6LevCN0mAAAAAC2CnQAlJf1RlTYrZz9jCdlbDQ_8"
                            data-callback="enableBtn"
                            class="g-recaptcha justify-items-center rounded-md bg-lime-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            type="button"
                            value="Get Started"
                            data-expired-callback="enableBtn"
                            disabled="disabled"
                        >
                            Get Started
                        </button></a
                    >
                </div>
                <!-- <div class="ml-3 w-0 flex-1 pt-0.5">
                  <p class="text-sm font-medium text-gray-900">Successfully saved!</p>
                  <p class="mt-1 text-sm text-gray-500">Anyone with a link can now view this file.</p>
                </div> -->
                <div class="ml-4 flex flex-shrink-0">
                  <button type="button1" @click="show = false" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <span class="sr-only">Close</span>
                    <XMarkIcon class="h-5 w-5" aria-hidden="true" />
                  </button>
                </div>
              </div>
            </div>
          </div>
        </transition>
      </div>
    </div>
  </template>

<script setup>
import { ref } from 'vue'
import { CheckCircleIcon } from '@heroicons/vue/24/outline'
import { XMarkIcon } from '@heroicons/vue/20/solid'
const show = ref(true)

function enableBtn () {
  document.getElementById('button1').disabled = false
  alert('Thanks For Verifying You Are Human, You May Now Click Enter!')
}

const onloadCallback = function () {
  grecaptcha.render(
    'g-form',
    {
      sitekey: '6LevCN0mAAAAAC2CnQAlJf1RlTYrZz9jCdlbDQ_8',
      callback: 'enableBtn',
      theme: 'dark'
    },
    ('g-form').click(onloadCallback)
  )
}

// export default {
// components: {
// grecaptcha,
//     mounted() {
//       onloadCallback(),
//        enableBtn()
//     },
//     },
// };
</script>

<!-- <template>
    <div class="grid grid-cols-1 relative isolate bg-blue-950">
        <div class="justify-content-baseline">
            <div class="m-20">
                <div class="justify-content-start">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="lime"
                        class="w-14 h-12 items-center"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33"
                        />
                    </svg>
                </div>
                <p
                    class="text-3xl font-bold tracking-tight text-white sm:text-4xl text-center"
                >
                    Let's Get You Verified
                </p>
                <p
                    class="text-lg leading-8 flex-auto flex-col text-gray-300 text-center"
                >
                    As you can see were all about security, please utilize our
                    verification to continue to our site, thank you!
                </p>
                <div>
                    <br />
                    <a href="/" class="offset-md-2 offset-lg-2 offset-sm-3">
                        <button
                            data-sitekey="6LevCN0mAAAAAC2CnQAlJf1RlTYrZz9jCdlbDQ_8"
                            data-callback="enableBtn"
                            class="g-recaptcha justify-items-center rounded-md bg-lime-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            type="button"
                            value="Get Started"
                            data-expired-callback="enableBtn"
                            disabled="disabled"
                        >
                            Get Started
                        </button></a
                    >
                </div>
                <div
                    class="grid grid-cols-1absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                    aria-hidden="true"
                >
                    <div
                        class="justify-items-center aspect-[801/1000] w-[20.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30"
                        style="
                            clip-path: polygon(
                                63.1% 29.5%,
                                100% 17.1%,
                                76.6% 3%,
                                48.4% 0%,
                                44.6% 4.7%,
                                54.5% 25.3%,
                                59.8% 49%,
                                55.2% 57.8%,
                                44.4% 57.2%,
                                27.8% 47.9%,
                                35.1% 90.5%,
                                0% 97.7%,
                                39.2% 100%,
                                35.2% 81.4%,
                                97.2% 52.8%,
                                63.1% 29.5%
                            );
                        "
                    ></div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style> -->
