<template>
  <transition name="slide-down">
    <div
      v-if="isVisible && !isDismissed"
      class="fixed top-20 left-0 right-0 z-40 bg-gradient-to-r from-green-600 via-green-500 to-lime-500 shadow-2xl border-b-4 border-green-700"
    >
      <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 py-3 sm:py-4">
        <!-- Desktop Layout -->
        <div class="hidden sm:flex items-center justify-between gap-4">
          <!-- Icon and Message -->
          <div class="flex items-center gap-4 flex-1 min-w-0">
            <div class="flex-shrink-0">
              <svg
                class="w-8 h-8 text-white animate-pulse"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M13 10V3L4 14h7v7l9-11h-7z"
                />
              </svg>
            </div>
            <div class="flex-1 min-w-0">
              <h3 class="text-white font-bold text-lg lg:text-xl mb-1">
                🎉 Coming Soon: Online Store & Customer Portal!
              </h3>
              <p class="text-white/90 text-sm lg:text-base">
                {{ currentQuestion.text }}
              </p>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex items-center gap-3 flex-shrink-0">
            <button
              v-if="!showThankYou"
              @click="submitAnswer('yes')"
              :disabled="isSubmitting"
              class="px-5 lg:px-6 py-2 bg-white text-green-600 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed text-sm lg:text-base whitespace-nowrap"
            >
              {{ isSubmitting ? "Submitting..." : "Yes! 👍" }}
            </button>
            <button
              v-if="!showThankYou"
              @click="submitAnswer('no')"
              :disabled="isSubmitting"
              class="px-5 lg:px-6 py-2 bg-white/20 text-white border-2 border-white rounded-lg font-semibold hover:bg-white/30 transition-all duration-200 transform hover:scale-105 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed text-sm lg:text-base whitespace-nowrap"
            >
              {{ isSubmitting ? "Submitting..." : "Not Sure 🤔" }}
            </button>
            <button
              @click="dismiss"
              class="p-2 text-white/80 hover:text-white hover:bg-white/20 rounded-full transition-colors duration-200"
              aria-label="Dismiss banner"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>

        <!-- Mobile Layout -->
        <div class="sm:hidden">
          <!-- Header with close button -->
          <div class="flex items-start justify-between gap-2 mb-3">
            <div class="flex items-center gap-2 flex-1 min-w-0">
              <svg
                class="w-6 h-6 text-white animate-pulse flex-shrink-0"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M13 10V3L4 14h7v7l9-11h-7z"
                />
              </svg>
              <h3 class="text-white font-bold text-base leading-tight">
                🎉 Coming Soon!
              </h3>
            </div>
            <button
              @click="dismiss"
              class="p-1.5 text-white/80 hover:text-white hover:bg-white/20 rounded-full transition-colors duration-200 flex-shrink-0"
              aria-label="Dismiss banner"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>

          <!-- Question text -->
          <p class="text-white/95 text-sm font-medium mb-3 leading-relaxed">
            {{ currentQuestion.text }}
          </p>

          <!-- Action buttons full width on mobile -->
          <div v-if="!showThankYou" class="flex flex-col gap-2">
            <button
              @click="submitAnswer('yes')"
              :disabled="isSubmitting"
              class="w-full px-4 py-2.5 bg-white text-green-600 rounded-lg font-semibold hover:bg-gray-100 active:scale-98 transition-all duration-200 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed text-sm"
            >
              {{ isSubmitting ? "Submitting..." : "Yes! 👍" }}
            </button>
            <button
              @click="submitAnswer('no')"
              :disabled="isSubmitting"
              class="w-full px-4 py-2.5 bg-white/20 text-white border-2 border-white rounded-lg font-semibold hover:bg-white/30 active:scale-98 transition-all duration-200 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed text-sm"
            >
              {{ isSubmitting ? "Submitting..." : "Not Sure 🤔" }}
            </button>
          </div>
        </div>

        <!-- Thank You Message (shared between layouts) -->
        <transition name="fade">
          <div
            v-if="showThankYou"
            class="mt-3 sm:mt-4 p-3 sm:p-4 bg-white/20 backdrop-blur-sm rounded-lg border-2 border-white/40"
          >
            <p class="text-white font-semibold text-center text-sm sm:text-base">
              🙏 Thank you for your feedback! Your response helps us build better features
              for you.
            </p>
          </div>
        </transition>

        <!-- Progress Indicator (shared between layouts) -->
        <div v-if="!showThankYou" class="mt-3 flex items-center gap-2">
          <span class="text-white/80 text-xs font-medium whitespace-nowrap"
            >{{ currentQuestionIndex + 1 }}/{{ questions.length }}</span
          >
          <div class="flex-1 h-1.5 bg-white/30 rounded-full overflow-hidden">
            <div
              class="h-full bg-white rounded-full transition-all duration-500"
              :style="{
                width: `${((currentQuestionIndex + 1) / questions.length) * 100}%`,
              }"
            ></div>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import axios from "axios";

// Survey questions
const questions = [
  {
    id: "online_store",
    text: "Would you buy security products directly from our website?",
    category: "Online Store Interest",
  },
  {
    id: "customer_portal",
    text: "Would you use a customer portal to manage your security monitoring services?",
    category: "Customer Portal Interest",
  },
  {
    id: "online_quotes",
    text:
      "Would you prefer getting instant online quotes instead of waiting for a call back?",
    category: "Online Quotes Interest",
  },
  {
    id: "product_reviews",
    text: "Would customer reviews and ratings help you choose security products?",
    category: "Product Reviews Interest",
  },
  {
    id: "live_chat",
    text: "Would you use live chat support for quick questions about products?",
    category: "Live Chat Interest",
  },
];

const isVisible = ref(false);
const isDismissed = ref(false);
const currentQuestionIndex = ref(0);
const showThankYou = ref(false);
const isSubmitting = ref(false);
const answers = ref([]);

const currentQuestion = computed(() => {
  const idx = currentQuestionIndex.value;
  if (idx >= 0 && idx < questions.length) {
    return questions[idx];
  }
  return { id: '', text: '', category: '' }; // Return safe default
});

// Check if user has already seen/dismissed the banner
const checkDismissed = () => {
  const dismissed = localStorage.getItem("surveyBannerDismissed");
  const lastShown = localStorage.getItem("surveyBannerLastShown");
  const answeredQuestions = JSON.parse(
    localStorage.getItem("surveyAnsweredQuestions") || "[]"
  );

  // Show again after 7 days
  if (dismissed && lastShown) {
    const daysSinceLastShown = (Date.now() - parseInt(lastShown)) / (1000 * 60 * 60 * 24);
    if (daysSinceLastShown < 7) {
      isDismissed.value = true;
      return;
    }
  }

  // Skip already answered questions
  currentQuestionIndex.value = questions.findIndex(
    (q) => !answeredQuestions.includes(q.id)
  );

  // If all questions answered, don't show
  if (currentQuestionIndex.value === -1) {
    isDismissed.value = true;
    return;
  }

  // Show banner after 3 seconds
  setTimeout(() => {
    isVisible.value = true;
  }, 3000);
};

// Submit answer and collect responses
const submitAnswer = async (answer) => {
  if (isSubmitting.value) return;

  isSubmitting.value = true;

  try {
    const response = {
      question: currentQuestion.value.text,
      category: currentQuestion.value.category,
      answer: answer === "yes" ? "Yes" : "Not Sure / No",
      questionId: currentQuestion.value.id,
    };

    // Store answer locally
    answers.value.push(response);

    // Mark question as answered
    const answeredQuestions = JSON.parse(
      localStorage.getItem("surveyAnsweredQuestions") || "[]"
    );
    answeredQuestions.push(currentQuestion.value.id);
    localStorage.setItem("surveyAnsweredQuestions", JSON.stringify(answeredQuestions));

    // Show thank you message
    showThankYou.value = true;

    // Move to next question or send all answers after 2 seconds
    setTimeout(async () => {
      showThankYou.value = false;
      currentQuestionIndex.value++;

      // Check if more questions exist
      const nextQuestionIndex = questions.findIndex(
        (q, idx) => idx >= currentQuestionIndex.value && !answeredQuestions.includes(q.id)
      );

      if (nextQuestionIndex === -1 || currentQuestionIndex.value >= questions.length) {
        // All questions answered - send all answers in one email
        await sendAllAnswers();
        dismiss();
      } else {
        currentQuestionIndex.value = nextQuestionIndex;
      }
    }, 2000);
  } catch (error) {
    console.error("Error recording survey response:", error);
    // Still allow progression even if there's an error
    showThankYou.value = true;
    setTimeout(() => {
      showThankYou.value = false;
      dismiss();
    }, 2000);
  } finally {
    isSubmitting.value = false;
  }
};

// Send all collected answers in one email
const sendAllAnswers = async () => {
  if (answers.value.length === 0) return;

  try {
    await axios.post("/api/survey-responses", {
      responses: answers.value,
      timestamp: new Date().toISOString(),
      page: window.location.pathname,
      userAgent: navigator.userAgent,
    });

    console.log("All survey responses sent successfully");
  } catch (error) {
    console.error("Error sending survey responses:", error);
  }
};

// Dismiss banner
const dismiss = () => {
  isVisible.value = false;
  localStorage.setItem("surveyBannerDismissed", "true");
  localStorage.setItem("surveyBannerLastShown", Date.now().toString());

  setTimeout(() => {
    isDismissed.value = true;
  }, 300);
};

onMounted(() => {
  checkDismissed();
});
</script>

<style scoped>
.slide-down-enter-active,
.slide-down-leave-active {
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.slide-down-enter-from {
  transform: translateY(-100%);
  opacity: 0;
}

.slide-down-leave-to {
  transform: translateY(-100%);
  opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
