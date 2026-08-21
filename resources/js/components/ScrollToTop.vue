<script setup lang="ts">
import { faArrowUp } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { ref, onMounted, onUnmounted } from 'vue';

const isVisible = ref(false);

const checkScroll = () => {
    isVisible.value = window.scrollY > 300;
};

const scrollToTop = () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
};

onMounted(() => {
    window.addEventListener('scroll', checkScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', checkScroll);
});
</script>

<template>
    <transition
        enter-active-class="transition ease-out duration-300"
        enter-from-class="opacity-0 translate-y-4"
        enter-to-class="opacity-100 translate-y-0"
        leave-active-class="transition ease-in duration-200"
        leave-from-class="opacity-100 translate-y-0"
        leave-to-class="opacity-0 translate-y-4"
    >
        <button 
            v-show="isVisible"
            @click="scrollToTop"
            class="fixed bottom-24 md:bottom-6 right-6 z-40 w-12 h-12 rounded-full bg-[#A388A9] text-white shadow-lg hover:bg-[#8C6A5D] hover:scale-105 active:scale-95 transition-all flex items-center justify-center focus:outline-none focus:ring-4 focus:ring-[#DAB6C4]/50"
            aria-label="Volver arriba"
        >
            <FontAwesomeIcon :icon="faArrowUp" class="text-lg" />
        </button>
    </transition>
</template>
