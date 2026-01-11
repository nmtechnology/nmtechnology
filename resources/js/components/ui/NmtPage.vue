<template>
  <div class="nmt-page">
    <main class="nmt-container nmt-main">
      <header v-if="title" class="mb-10">
        <h1 class="text-3xl md:text-4xl font-bold tracking-tight">{{ title }}</h1>
        <p v-if="subtitle" class="mt-3 text-gray-300 max-w-3xl">{{ subtitle }}</p>
        <div v-if="$slots.header" class="mt-6">
          <slot name="header" />
        </div>
      </header>

      <slot />
    </main>
  </div>
</template>

<script setup>
defineProps({
  title: { type: String, default: '' },
  subtitle: { type: String, default: '' }
})
</script>
