<template>
  <div
    class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-900 to-gray-800 flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8 py-12 relative overflow-hidden"
  >
    <LoadingScreen v-if="showLoadingScreen" ref="loadingScreen" />

    <!-- Modern animated background with grid -->
    <div class="absolute inset-0 -z-10">
      <!-- Animated grid pattern -->
      <svg class="absolute inset-0 h-full w-full stroke-green-500/5" aria-hidden="true">
        <defs>
          <pattern id="modern-grid" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M0 40V.5H40" fill="none" stroke-width="0.5" />
          </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#modern-grid)" />
      </svg>

      <!-- Decorative blur orbs -->
      <div
        class="absolute top-1/4 left-0 w-[600px] h-[600px] bg-gradient-to-br from-green-500/10 to-lime-500/5 rounded-full blur-3xl"
        aria-hidden="true"
      ></div>
      <div
        class="absolute bottom-1/4 right-0 w-[500px] h-[500px] bg-gradient-to-tl from-lime-500/10 to-green-500/10 rounded-full blur-3xl"
        aria-hidden="true"
      ></div>
    </div>

    <!-- Product Collage - Modern card design -->
    <div class="w-full max-w-6xl px-4 mb-12 animate-fadeIn">
      <!-- Header with better alignment -->
      <div class="text-center mb-8">
        <!-- Badge -->
        <div
          class="inline-flex items-center gap-2 px-4 py-2 bg-green-500/10 border border-green-500/20 rounded-full mb-6 backdrop-blur-sm"
        >
          <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
              clip-rule="evenodd"
            />
          </svg>
          <span class="text-sm font-semibold text-green-400"
            >New Mexico's Premier Security Provider</span
          >
        </div>

        <img src="/public/images/NM-logo-main.webp" class="brand-logo mx-auto block" alt="NM Technology Logo" />
        <h1 class="text-2xl md:text-3xl font-bold mb-4 max-w-3xl mx-auto leading-tight">
          <span class="text-white">Advanced Security & Surveillance Solutions for </span>
          <span
            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
            >New Mexico</span
          >
        </h1>
      </div>

      <!-- Features List with modern cards -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8 max-w-4xl mx-auto">
        <div
          class="flex items-center justify-center gap-3 bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-sm rounded-xl p-4 border border-green-500/20 ring-1 ring-green-500/20 hover:border-green-500/40 hover:ring-green-500/30 transition-all duration-300 transform hover:scale-[1.02] shadow-lg group"
        >
          <div
            class="flex-shrink-0 w-10 h-10 rounded-full bg-green-500/10 flex items-center justify-center group-hover:bg-green-500/20 transition-colors"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 text-green-400"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
          <span class="text-white font-medium text-sm">Professional Installation</span>
        </div>
        <div
          class="flex items-center justify-center gap-3 bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-sm rounded-xl p-4 border border-green-500/20 ring-1 ring-green-500/20 hover:border-green-500/40 hover:ring-green-500/30 transition-all duration-300 transform hover:scale-[1.02] shadow-lg group"
        >
          <div
            class="flex-shrink-0 w-10 h-10 rounded-full bg-green-500/10 flex items-center justify-center group-hover:bg-green-500/20 transition-colors"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 text-green-400"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
          <span class="text-white font-medium text-sm">24/7 Support</span>
        </div>
        <div
          class="flex items-center justify-center gap-3 bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-sm rounded-xl p-4 border border-green-500/20 ring-1 ring-green-500/20 hover:border-green-500/40 hover:ring-green-500/30 transition-all duration-300 transform hover:scale-[1.02] shadow-lg group"
        >
          <div
            class="flex-shrink-0 w-10 h-10 rounded-full bg-green-500/10 flex items-center justify-center group-hover:bg-green-500/20 transition-colors"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 text-green-400"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
          <span class="text-white font-medium text-sm">Custom Solutions</span>
        </div>
      </div>

      <!-- Product Gallery with modern cards -->
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 mb-8">
        <!-- Camera Images with Modern Hover Effects -->
        <div
          class="relative overflow-hidden rounded-2xl group h-56 md:h-64 border border-gray-700/50 hover:border-green-500/50 transition-all duration-300 shadow-lg hover:shadow-green-500/20"
        >
          <img
            :src="axisBulletCam"
            alt="Bullet Camera"
            class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1"
          />
          <div
            class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300 flex items-end p-4"
          >
            <div
              class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300"
            >
              <span class="text-white font-bold text-base block">Bullet Camera</span>
              <span class="text-green-400 text-xs">High-Resolution Surveillance</span>
            </div>
          </div>
        </div>

        <div
          class="relative overflow-hidden rounded-2xl group h-56 md:h-64 border border-gray-700/50 hover:border-green-500/50 transition-all duration-300 shadow-lg hover:shadow-green-500/20"
        >
          <img
            :src="axisDome"
            alt="Dome Camera"
            class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1"
          />
          <div
            class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300 flex items-end p-4"
          >
            <div
              class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300"
            >
              <span class="text-white font-bold text-base block">Dome Camera</span>
              <span class="text-green-400 text-xs">360° Coverage</span>
            </div>
          </div>
        </div>

        <div
          class="relative overflow-hidden rounded-2xl group h-56 md:h-64 border border-gray-700/50 hover:border-green-500/50 transition-all duration-300 shadow-lg hover:shadow-green-500/20"
        >
          <img
            :src="cctvCorner"
            alt="Corner CCTV"
            class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1"
          />
          <div
            class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300 flex items-end p-4"
          >
            <div
              class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300"
            >
              <span class="text-white font-bold text-base block"
                >Corner Installation</span
              >
              <span class="text-green-400 text-xs">Strategic Positioning</span>
            </div>
          </div>
        </div>

        <div
          class="relative overflow-hidden rounded-2xl group h-56 md:h-64 border border-gray-700/50 hover:border-green-500/50 transition-all duration-300 shadow-lg hover:shadow-green-500/20"
        >
          <img
            :src="googleDoorbellcam"
            alt="Doorbell Camera"
            class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1"
          />
          <div
            class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300 flex items-end p-4"
          >
            <div
              class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300"
            >
              <span class="text-white font-bold text-base block">Doorbell Camera</span>
              <span class="text-green-400 text-xs">Smart Home Integration</span>
            </div>
          </div>
        </div>

        <div
          class="relative overflow-hidden rounded-2xl group h-56 md:h-64 border border-gray-700/50 hover:border-green-500/50 transition-all duration-300 shadow-lg hover:shadow-green-500/20"
        >
          <img
            :src="nvrRecorder"
            alt="NVR System"
            class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1"
          />
          <div
            class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300 flex items-end p-4"
          >
            <div
              class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300"
            >
              <span class="text-white font-bold text-base block">NVR Recording</span>
              <span class="text-green-400 text-xs">24/7 Recording System</span>
            </div>
          </div>
        </div>

        <div
          class="relative overflow-hidden rounded-2xl group h-56 md:h-64 border border-gray-700/50 hover:border-green-500/50 transition-all duration-300 shadow-lg hover:shadow-green-500/20"
        >
          <img
            :src="smartAccessControl"
            alt="Smart Access"
            class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1"
          />
          <div
            class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300 flex items-end p-4"
          >
            <div
              class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300"
            >
              <span class="text-white font-bold text-base block"
                >Smart Access Control</span
              >
              <span class="text-green-400 text-xs">Keyless Entry Systems</span>
            </div>
          </div>
        </div>

        <div
          class="relative overflow-hidden rounded-2xl group h-56 md:h-64 border border-gray-700/50 hover:border-green-500/50 transition-all duration-300 shadow-lg hover:shadow-green-500/20"
        >
          <img
            :src="fireAlarm1"
            alt="Fire Alarm System"
            class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1"
          />
          <div
            class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300 flex items-end p-4"
          >
            <div
              class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300"
            >
              <span class="text-white font-bold text-base block">Fire Alarm Systems</span>
              <span class="text-green-400 text-xs">AHJ & NM Fire Code Compliant</span>
            </div>
          </div>
        </div>

        <div
          class="relative overflow-hidden rounded-2xl group h-56 md:h-64 border border-gray-700/50 hover:border-green-500/50 transition-all duration-300 shadow-lg hover:shadow-green-500/20"
        >
          <img
            :src="fireAlarm2"
            alt="Fire Alarm Installation"
            class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1"
          />
          <div
            class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300 flex items-end p-4"
          >
            <div
              class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300"
            >
              <span class="text-white font-bold text-base block">Professional Installation</span>
              <span class="text-green-400 text-xs">IBC & OSHA Standards</span>
            </div>
          </div>
        </div>

        <div
          class="relative overflow-hidden rounded-2xl group h-56 md:h-64 border border-gray-700/50 hover:border-green-500/50 transition-all duration-300 shadow-lg hover:shadow-green-500/20"
        >
          <img
            :src="fireAlarm3"
            alt="Fire Alarm Design"
            class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110 group-hover:rotate-1"
          />
          <div
            class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300 flex items-end p-4"
          >
            <div
              class="transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300"
            >
              <span class="text-white font-bold text-base block">Custom Fire Alarm Design</span>
              <span class="text-green-400 text-xs">Code-Compliant Solutions</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Brands Section with modern card -->
      <div
        class="bg-gradient-to-br from-gray-800 to-gray-900 backdrop-blur-sm rounded-2xl p-6 border border-green-500/20 ring-1 ring-green-500/20 shadow-xl mb-8"
      >
        <p
          class="text-center text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400 text-xs uppercase tracking-wider mb-4 font-semibold"
        >
          Trusted Brands
        </p>
        <div class="flex flex-wrap justify-center items-center gap-8">
          <img
            :src="axiscommLogo"
            alt="Axis Communications"
            class="h-10 grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
          />
          <img
            :src="honeywellLogo"
            alt="Honeywell"
            class="h-10 grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
          />
          <img
            :src="dscLogo"
            alt="DSC"
            class="h-10 grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
          />
          <img
            :src="ubiquityLogo"
            alt="Ubiquiti"
            class="h-10 grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110"
          />
        </div>
      </div>

      <div class="text-center max-w-2xl mx-auto">
        <p class="text-gray-300 text-base md:text-lg font-medium mb-3">
          Securing homes and businesses across
          <span
            class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400 font-bold"
            >New Mexico</span
          >
        </p>
        <p
          class="text-white text-lg md:text-xl font-bold mb-6 flex items-center justify-center gap-2"
        >
          <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
              clip-rule="evenodd"
            />
          </svg>
          Verify Access to Continue
        </p>
        <div class="inline-flex items-center gap-2 text-sm text-gray-400">
          <span class="animate-bounce">↓</span>
          <span>Complete verification below</span>
          <span class="animate-bounce">↓</span>
        </div>
      </div>
    </div>

    <!-- Verification Form - Modern Glass Design -->
    <div
      class="w-full max-w-lg space-y-6 bg-gradient-to-br from-gray-800/90 to-gray-900/90 backdrop-blur-xl p-8 md:p-10 rounded-3xl shadow-2xl relative z-10 border border-green-500/20 ring-1 ring-green-500/20 animate-form-appear"
    >
      <!-- Decorative gradient border effect -->
      <div
        class="absolute inset-0 rounded-3xl bg-gradient-to-br from-green-500/10 to-lime-500/5 -z-10 blur-xl"
      ></div>

      <!-- Logo and Header -->
      <div class="flex flex-col items-center space-y-4">
        <div class="relative">
          <!-- Security Badge with Glow -->
          <div
            class="absolute inset-0 bg-green-500/20 rounded-full blur-2xl animate-pulse"
          ></div>
          <div
            class="relative flex items-center justify-center bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl p-4 w-20 h-20 border border-green-500/30 ring-1 ring-green-500/20 shadow-lg shadow-green-500/20"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-10 w-10 text-green-400"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
        </div>

        <div class="text-center">
          <h2 class="text-2xl md:text-3xl font-bold mb-2">
            <span
              class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-lime-400"
              >Security</span
            >
            <span class="text-white"> Verification</span>
          </h2>
          <div
            class="w-20 h-1 bg-gradient-to-r from-transparent via-green-500 to-transparent mx-auto mb-3 rounded-full"
          ></div>
          <p class="text-sm text-gray-300 max-w-sm">
            Solve the problem below to verify you're human and access our catalog
          </p>
        </div>
      </div>

      <!-- Verification Form -->
      <form class="space-y-6" @submit.prevent="verifyAnswer">
        <div class="space-y-5">
          <div
            class="bg-gradient-to-br from-gray-700/70 to-gray-800/70 p-6 rounded-2xl border border-gray-600/50 shadow-inner"
          >
            <label for="answer" class="block text-center mb-6">
              <span
                class="text-gray-400 text-sm font-medium mb-3 block uppercase tracking-wider"
                >Math Challenge</span
              >
              <div
                class="text-4xl md:text-5xl font-bold text-white mb-2 font-mono tracking-tight"
              >
                {{ firstNumber }} {{ operator }} {{ secondNumber }} = ?
              </div>
              <div
                class="w-16 h-1 bg-gradient-to-r from-transparent via-green-500 to-transparent mx-auto rounded-full"
              ></div>
            </label>
            <div class="mt-2">
              <input
                id="answer"
                name="answer"
                type="number"
                v-model.number="userAnswer"
                required
                class="block w-full rounded-md border-0 py-3 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600 text-center text-xl"
                placeholder="Enter your answer"
                autofocus
              />
            </div>
          </div>

          <!-- Error Message -->
          <div
            v-if="errorMessage"
            class="text-center text-red-500 text-sm p-2 bg-red-500/10 rounded-md border border-red-500/20"
          >
            {{ errorMessage }}
          </div>

          <!-- Submit Button -->
          <div>
            <button
              type="submit"
              :disabled="isSubmitting"
              class="w-full flex justify-center items-center gap-2 py-3 px-4 rounded-lg text-base font-semibold text-white bg-gradient-to-r from-green-600 to-green-500 hover:from-green-500 hover:to-green-400 shadow-lg shadow-green-500/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 transform hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
            >
              <svg v-if="!isSubmitting" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              <svg v-else class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              <span>{{ isSubmitting ? 'Verifying...' : 'Verify & Continue' }}</span>
            </button>
          </div>
        </div>
      </form>

      <!-- Footer Text -->
      <div class="text-center text-xs text-gray-400 bg-gray-700/30 py-2 px-4 rounded-md">
        <p>
          This verification helps us protect our website and customers from automated
          traffic.
        </p>
      </div>
    </div>

    <!-- Footer -->
    <div class="mt-8 text-center">
      <div class="flex items-center justify-center gap-4 mb-3">
        <img
          src="/public/images/zia-symbol.webp"
          alt="New Mexico Zia Symbol"
          class="h-6 w-6 opacity-50"
        />
        <p class="text-sm text-gray-400">
          &copy; {{ new Date().getFullYear() }} NM Technology. All rights reserved.
        </p>
        <img src="/public/images/usa-flag.webp" alt="USA Flag" class="h-6 opacity-50" />
      </div>
      <div class="text-xs text-gray-500">
        Serving all of New Mexico with professional security solutions
      </div>
    </div>

    <!-- Loading Screen -->
    <LoadingScreen v-if="showLoadingScreen" />
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import { useRouter } from "vue-router";
import { toastService } from "../services/toastService.js";
import LoadingScreen from "../components/LoadingScreen.vue";
import NMLogo from "../components/NMLogo.vue";
import { logAction, startVisitorSession } from "../utils/analytics.js";
import axiscommLogo from "../../images/axiscomm-logo.webp";
import honeywellLogo from "../../images/honeywell-logo1.webp";
import dscLogo from "../../images/DSC-logo.webp";
import ubiquityLogo from "../../images/ubiquity-logo.webp";
import axisBulletCam from "../../images/axis-bullet-cam.webp";
import axisDome from "../../images/axis-dome.webp";
import cctvCorner from "../../images/cctv-corner.webp";
import googleDoorbellcam from "../../images/google-doorbellcam.webp";
import nvrRecorder from "../../images/nvr-recorder.webp";
import smartAccessControl from "../../images/smart-access-control.webp";
import fireAlarm1 from "../../images/fire-alarm-1.webp";
import fireAlarm2 from "../../images/fire-alarm-2.webp";
import fireAlarm3 from "../../images/fire-alarm-3.jpg";

const router = useRouter();
const firstNumber = ref(0);
const secondNumber = ref(0);
const operatorType = ref("");
const userAnswer = ref(null);
const errorMessage = ref("");
const maxAttempts = ref(3);
const attempts = ref(0); // Attempts for current problem
const totalAttempts = ref(0); // Total attempts across all problems
const showLoadingScreen = ref(false);
const loadingScreen = ref(null);
const startTime = ref(Date.now());
const isLockedOut = ref(false);
const isSubmitting = ref(false); // Prevent duplicate submissions

// Generate the operator symbol (+, -, *)
const operator = computed(() => {
  switch (operatorType.value) {
    case "add":
      return "+";
    case "subtract":
      return "-";
    case "multiply":
      return "×";
    default:
      return "+";
  }
});

// Calculate the correct answer
const correctAnswer = computed(() => {
  switch (operatorType.value) {
    case "add":
      return firstNumber.value + secondNumber.value;
    case "subtract":
      return firstNumber.value - secondNumber.value;
    case "multiply":
      return firstNumber.value * secondNumber.value;
    default:
      return 0;
  }
});

// Generate a new math problem
const generateMathProblem = () => {
  // Reset fields
  userAnswer.value = null;
  errorMessage.value = "";

  // Choose a random operation (add, subtract, or multiply)
  const operations = ["add", "subtract", "multiply"];
  operatorType.value = operations[Math.floor(Math.random() * operations.length)];

  // Generate appropriate numbers based on the operation
  if (operatorType.value === "add") {
    // Addition: numbers between 1 and 20
    firstNumber.value = Math.floor(Math.random() * 20) + 1;
    secondNumber.value = Math.floor(Math.random() * 20) + 1;
  } else if (operatorType.value === "subtract") {
    // Subtraction: ensure first number is larger (no negative results)
    firstNumber.value = Math.floor(Math.random() * 15) + 6; // 6 to 20
    secondNumber.value = Math.floor(Math.random() * firstNumber.value) + 1; // 1 to firstNumber
  } else {
    // Multiplication: smaller numbers to keep it simple
    firstNumber.value = Math.floor(Math.random() * 9) + 1; // 1 to 9
    secondNumber.value = Math.floor(Math.random() * 9) + 1; // 1 to 9
  }
};

// Verify the user's answer
const verifyAnswer = async () => {
  // Prevent duplicate submissions
  if (isSubmitting.value) {
    return;
  }
  
  if (isLockedOut.value) {
    errorMessage.value =
      "You have been locked out due to too many failed attempts. Please try again in 24 hours.";
    return;
  }
  
  // Set submitting state immediately
  isSubmitting.value = true;
  errorMessage.value = "";
  
  const userAnswerNum = Number(userAnswer.value);
  const correctAnswerNum = Number(correctAnswer.value);
  totalAttempts.value += 1;

  // Calculate time spent on page
  const timeSpentMs = Date.now() - startTime.value;
  const timeSpentSec = Math.floor(timeSpentMs / 1000);

  // Gather comprehensive visitor data
  const gatherVisitorData = () => {
    return {
      screen_resolution: `${window.screen.width}x${window.screen.height}`,
      viewport_size: `${window.innerWidth}x${window.innerHeight}`,
      timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
      platform: navigator.platform,
      connection_type: navigator.connection?.effectiveType || 'unknown',
      color_depth: window.screen.colorDepth,
      pixel_ratio: window.devicePixelRatio || 1,
      online: navigator.onLine,
      cookies_enabled: navigator.cookieEnabled,
      do_not_track: navigator.doNotTrack || 'unknown',
      touch_support: 'ontouchstart' in window || navigator.maxTouchPoints > 0,
      hardware_concurrency: navigator.hardwareConcurrency || 'unknown',
      device_memory: navigator.deviceMemory || 'unknown',
    };
  };

  // Prepare payload for backend
  const payload = {
    answer: userAnswerNum,
    correct: userAnswerNum === correctAnswerNum,
    time_spent: timeSpentSec,
    attempts: totalAttempts.value,
    landing_page: window.location.pathname,
    ...gatherVisitorData(),
  };

  // Send verification attempt to backend
  let response;
  try {
    response = await fetch("/api/verify-math", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
      credentials: "same-origin",
    });
    const data = await response.json();
    if (data.us_only) {
      errorMessage.value = "Access restricted to US visitors.";
      isSubmitting.value = false;
      return;
    }
    if (data.locked_out) {
      isLockedOut.value = true;
      errorMessage.value =
        "You have been locked out due to too many failed attempts. Please try again in 24 hours.";
      isSubmitting.value = false;
      return;
    }
  } catch (e) {
    errorMessage.value = "Verification service unavailable. Please try again later.";
    isSubmitting.value = false;
    return;
  }

  if (userAnswerNum === correctAnswerNum) {
    localStorage.setItem("humanVerified", "true");
    localStorage.setItem("humanVerifiedTimestamp", Date.now().toString());
    localStorage.setItem("isInitialVerification", "true");
    // Start visitor session tracking
    startVisitorSession();
    showLoadingScreen.value = true;
    setTimeout(() => {
      loadingScreen.value?.startLeaving();
    }, 2500);
    setTimeout(() => {
      router.push("/home");
    }, 3000);
  } else {
    // Reset submitting state for incorrect answers
    isSubmitting.value = false;
    
    attempts.value += 1;
    if (attempts.value >= maxAttempts.value) {
      errorMessage.value = "Too many incorrect attempts. Let's try a new problem.";
      attempts.value = 0;
      generateMathProblem();
    } else {
      errorMessage.value = `Incorrect answer. You have ${
        maxAttempts.value - attempts.value
      } attempts remaining.`;
      userAnswer.value = null;
    }
    // If totalAttempts reaches 6, lock out
    if (totalAttempts.value >= 6) {
      isLockedOut.value = true;
      errorMessage.value =
        "You have been locked out due to too many failed attempts. Please try again in 24 hours.";
    }
  }
};

// Example: log button click
function onContactClick() {
  logAction("ContactButton", "Clicked contact button");
}

// Generate a math problem when the component mounts
onMounted(() => {
  const verifiedTimestamp = localStorage.getItem("humanVerifiedTimestamp");
  if (verifiedTimestamp) {
    const elapsed = Date.now() - parseInt(verifiedTimestamp);
    const dayInMs = 24 * 60 * 60 * 1000;
    if (elapsed < dayInMs) {
      router.push("/home");
      return;
    }
  }
  startTime.value = Date.now();
  generateMathProblem();
});
</script>

<style scoped>
.animate-fadeIn {
  animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Image hover effects */
.group:hover img {
  filter: brightness(1.1);
}

/* Animated background glow effect */
.bg-gray-800 {
  position: relative;
  overflow: hidden;
}

.brand-logo {
            height: 100px;
            width: auto;
            margin-bottom: 10px;

        }

.bg-gray-800::after {
  content: "";
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(
    circle,
    rgba(52, 211, 153, 0.1) 0%,
    rgba(255, 255, 255, 0) 60%
  );
  animation: rotate 30s linear infinite;
  z-index: -1;
}

@keyframes rotate {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

/* Form appearance animation */
.animate-form-appear {
  animation: formAppear 0.8s ease-out;
}

@keyframes formAppear {
  0% {
    opacity: 0;
    transform: translateY(30px);
    box-shadow: 0 0 0 rgba(16, 185, 129, 0);
  }
  70% {
    opacity: 1;
    transform: translateY(-10px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
    box-shadow: 0 0 20px rgba(16, 185, 129, 0.3);
  }
}
</style>
