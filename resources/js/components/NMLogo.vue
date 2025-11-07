<template>
  <div :class="containerClass">
    <img :src="logoSrc" :alt="logoAlt" :class="logoClass" />
    <span :class="textClass">Technology</span>
  </div>
</template>

<script>
export default {
  name: "NMLogo",
  props: {
    // Logo variants: 'header', 'email', 'modal', 'service', 'footer', 'loading'
    variant: {
      type: String,
      default: "service",
      validator: (value) =>
        ["header", "email", "modal", "service", "footer", "loading"].includes(value),
    },
    size: {
      type: String,
      default: "medium",
      validator: (value) => ["small", "medium", "large", "xl"].includes(value),
    },
    showBorder: {
      type: Boolean,
      default: true,
    },
  },
  computed: {
    logoSrc() {
      // Use the correct logo path for different environments
      if (this.variant === "email") {
        return "https://nmtechnology.us/images/nm-logo-rmbg.webp";
      }
      return "/public/images/nm-logo-rmbg.webp";
    },
    logoAlt() {
      return "NM Technology Logo";
    },
    containerClass() {
      const baseClasses = ["flex", "items-center", "justify-center"];

      // Default to service variant styling (the green border design)
      if (this.variant === "service" || this.showBorder) {
        return [
          ...baseClasses,
          "mb-12",
          "bg-gray-800/30",
          "backdrop-blur-sm",
          "rounded-2xl",
          "border",
          "border-green-500/20",
          "py-4",
          "px-6",
          "w-fit",
          "mx-auto",
          "shadow-lg",
          "group",
        ].join(" ");
      }

      // Size classes for non-service variants
      const sizeClasses = {
        small: ["gap-1"],
        medium: ["gap-2"],
        large: ["gap-3"],
        xl: ["gap-4"],
      };

      // Variant-specific classes
      const variantClasses = {
        header: ["group"],
        email: ["gap-1"],
        modal: ["space-x-4"],
        footer: ["justify-start", "lg:justify-end"],
        loading: ["mb-8"],
      };

      return [
        ...baseClasses,
        ...sizeClasses[this.size],
        ...variantClasses[this.variant],
      ].join(" ");
    },
    logoClass() {
      const sizeClasses = {
        small: ["h-6", "w-auto"],
        medium: ["h-10", "w-auto"],
        large: ["h-12", "w-auto"],
        xl: ["h-16", "w-auto"],
      };

      // Service variant (green border) always uses large size and hover effects
      if (this.variant === "service" || this.showBorder) {
        return [
          "h-12",
          "w-auto",
          "transition-transform",
          "duration-300",
          "group-hover:scale-105",
        ].join(" ");
      }

      const variantClasses = {
        header: ["mr-2", "transition-transform", "duration-300", "group-hover:scale-105"],
        email: [],
        modal: [],
        footer: ["mr-2"],
        loading: ["w-48", "h-auto"],
      };

      return [...sizeClasses[this.size], ...variantClasses[this.variant]].join(" ");
    },
    textClass() {
      const sizeClasses = {
        small: ["text-sm"],
        medium: ["text-lg"],
        large: ["text-xl"],
        xl: ["text-2xl"],
      };

      // Service variant (green border) always uses the exact styling from original
      if (this.variant === "service" || this.showBorder) {
        return [
          "text-xl",
          "italic",
          "font-extrabold",
          "text-white",
          "-ml-3",
          "transition-colors",
          "duration-300",
          "group-hover:text-green-400",
        ].join(" ");
      }

      const variantClasses = {
        header: [
          "italic",
          "font-extrabold",
          "text-white",
          "-ml-5",
          "transition-colors",
          "duration-300",
          "group-hover:text-green-400",
        ],
        email: [
          "color-white",
          "font-size-14px",
          "font-style-italic",
          "font-weight-bold",
          "text-decoration-none",
          "display-inline-block",
        ],
        modal: ["text-2xl", "sm:text-3xl", "font-bold", "text-white"],
        footer: ["italic", "text-lg", "font-extrabold", "text-white", "-ml-5"],
        loading: ["text-4xl", "sm:text-5xl", "font-bold", "text-white"],
      };

      return [...sizeClasses[this.size], ...variantClasses[this.variant]].join(" ");
    },
  },
};
</script>

<style scoped>
/* Email-specific styles that can't be done with Tailwind */
.variant-email .company-name {
  color: white;
  font-size: 14px;
  font-style: italic;
  font-weight: bold;
  text-decoration: none;
  display: inline-block;
}
</style>
