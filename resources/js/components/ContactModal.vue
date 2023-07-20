<template>
    <div class="root">
        <button class="text-white text-center text-lg" id="button" v-on:click="isOpen = true">Contact Us</button>
        <teleport to="#space">
            <div class="modal" v-if="isOpen">
                <ContactForm />
            </div>
        </teleport>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import ContactForm from './ContactForm.vue'

const isOpen = ref(false)
</script>
<style>
#button {
    background-color: #5fc500;
    border-radius: 13px;
    padding: 10%;
    width: 200px
}

.root {
    position: relative;
    text-decoration-color: white;
}

.modal {
    position: absolute;
    padding-top: 17%;
    top: 0;
    left: 0;
    background-color: rgba(3, 13, 30, 0.67);
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

@media (max-width: 375px) {
    .modal {
        padding-top: 95%;
    }
}

@media (max-width: 900px) {
    .modal {
        padding-top: 80%;
    }
}

@media (max-width: 1024px) {
    .modal {
        padding-top: 75%;
    }
}

.modal > div {
    background-color: #111827;
    padding: 10px;
    border-radius: 50px;
}
</style>
