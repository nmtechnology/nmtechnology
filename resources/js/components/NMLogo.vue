<template>
  <div :class="containerClasses">
   <img src="/public/images/NM-logo-main.webp" class="sm:h-20 w-auto" alt="NM Technology Logo" />

  </div>
</template>

<script setup>
import { computed } from "vue";

// Props
const props = defineProps({
  variant: {
    type: String,
    default: "header",
    validator: (value) =>
      ["header", "service", "mobile", "footer", "landing", "modal", "loading"].includes(
        value
      ),
  },
  size: {
    type: String,
    default: "medium",
    validator: (value) => ["small", "medium", "large", "xl"].includes(value),
  },
  showSubtitle: {
    type: Boolean,
    default: false,
  },
});

// Computed classes based on variant and size
const containerClasses = computed(() => {
  const baseClasses = ["flex", "items-center"];

  const variantClasses = {
    header: ["lg:flex-1", "justify-start", "group", "flex-shrink-0"],
    service: [
      "justify-center",
      "mb-8",
      "sm:mb-12",
      "bg-gray-800/30",
      "backdrop-blur-sm",
      "rounded-xl",
      "sm:rounded-2xl",
      "border",
      "border-green-500/20",
      "py-3",
      "sm:py-4",
      "px-4",
      "sm:px-6",
      "w-fit",
      "mx-auto",
      "shadow-lg",
      "group",
    ],
    mobile: ["justify-start", "flex-shrink-0"],
    footer: ["justify-start", "lg:justify-end", "flex-shrink-0"],
    landing: ["justify-center", "mb-4", "sm:mb-6", "mt-3"],
    modal: ["space-x-2", "sm:space-x-4", "flex-shrink-0"],
    loading: ["justify-center", "mb-4"],
  };

  return [...baseClasses, ...variantClasses[props.variant]];
});

const logoClasses = computed(() => {
  const sizeClasses = {
    small: ["h-6", "sm:h-8", "w-auto"],
    medium: ["h-8", "sm:h-10", "w-auto"],
    large: ["h-10", "sm:h-12", "w-auto"],
    xl: ["h-16", "sm:h-20", "w-auto"],
  };

  const variantClasses = {
    header: [
      "mr-1",
      "sm:mr-2",
      "transition-transform",
      "duration-300",
      "group-hover:scale-105",
    ],
    service: ["transition-transform", "duration-300", "group-hover:scale-105"],
    mobile: ["mr-1", "sm:mr-2"],
    footer: ["mr-1", "sm:mr-2"],
    landing: ["mr-1", "sm:mr-2", "transition-transform", "duration-300"],
    modal: [],
    loading: ["mr-1", "sm:mr-2"],
  };

  return [...sizeClasses[props.size], ...variantClasses[props.variant]];
});

const textClasses = computed(() => {
  const sizeClasses = {
    small: ["text-sm", "sm:text-base"],
    medium: ["text-base", "sm:text-lg"],
    large: ["text-lg", "sm:text-xl"],
    xl: ["text-2xl", "sm:text-3xl", "md:text-4xl", "lg:text-5xl"],
  };

  const variantClasses = {
    header: [
      "italic",
      "font-extrabold",
      "text-white",
      "-ml-3",
      "sm:-ml-5",
      "transition-colors",
      "duration-300",
      "group-hover:text-green-400",
      "whitespace-nowrap",
    ],
    service: [
      "italic",
      "font-extrabold",
      "text-white",
      "-ml-2",
      "sm:-ml-3",
      "transition-colors",
      "duration-300",
      "group-hover:text-green-400",
    ],
    mobile: ["italic", "font-extrabold", "text-white", "-ml-1", "whitespace-nowrap"],
    footer: [
      "italic",
      "font-extrabold",
      "text-white",
      "-ml-3",
      "sm:-ml-5",
      "whitespace-nowrap",
    ],
    landing: [
      "italic",
      "font-extrabold",
      "text-white",
      "transition-colors",
      "duration-300",
    ],
    modal: ["text-xl", "sm:text-2xl", "lg:text-3xl", "font-bold", "text-white"],
    loading: [
      "italic",
      "font-extrabold",
      "text-white",
      "-ml-3",
      "sm:-ml-5",
      "text-3xl",
      "sm:text-4xl",
      "lg:text-5xl",
    ],
  };

  return [...sizeClasses[props.size], ...variantClasses[props.variant]];
});
</script>
