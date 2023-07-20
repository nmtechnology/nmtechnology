<template>
    <div class="root">
        <button class="button" v-on:click="isOpen = true">open</button>
        <teleport to="body">
            <div class="modal" v-if="isOpen">
                <ContactForm />
            </div>
        </teleport>
    </div>
</template>

<script setup>
import { ref } from "vue";
import ContactForm from "./ContactForm.vue";

const isOpen = ref(false);
</script>
<style>
.button {
    background-color: #111827;
    text-decoration-color: white;
}

.root {
    position: relative;
    background-color: #111827;
    text-decoration-color: white;
}

.modal {
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.1);
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal > div {
    background-color: #fff;
    padding: 50px;
    border-radius: 10px;
}
</style>
