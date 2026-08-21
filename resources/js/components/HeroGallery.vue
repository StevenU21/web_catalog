<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';

const props = withDefaults(
    defineProps<{
        largeImages?: string[];
        squareImages?: string[];
    }>(),
    {
        largeImages: () => [],
        squareImages: () => [],
    }
);

const visibleLarge = ref<string>(props.largeImages[0] || '');

const visibleSquare1 = ref<string>(props.squareImages[0] || '');
const visibleSquare2 = ref<string>(props.squareImages[1] || props.squareImages[0] || '');

let intervalId: ReturnType<typeof setInterval> | null = null;

const rotateGallery = () => {
    const target = Math.floor(Math.random() * 3);

    if (target === 0 && props.largeImages.length > 1) {
        const available = props.largeImages.filter(img => img !== visibleLarge.value);

        if (available.length > 0) {
            visibleLarge.value = available[Math.floor(Math.random() * available.length)];
        }
    } else if (props.squareImages.length > 2) {
        const available = props.squareImages.filter(
            img => img !== visibleSquare1.value && img !== visibleSquare2.value
        );

        if (available.length > 0) {
            const nextImg = available[Math.floor(Math.random() * available.length)];

            if (target === 1) {
                visibleSquare1.value = nextImg;
            } else {
                visibleSquare2.value = nextImg;
            }
        }
    }
};

onMounted(() => {
    const canRotateLarge = props.largeImages.length > 1;
    const canRotateSquares = props.squareImages.length > 2;

    if (canRotateLarge || canRotateSquares) {
        intervalId = setInterval(rotateGallery, 3500);
    }
});

onUnmounted(() => {
    if (intervalId) {
clearInterval(intervalId);
}
});
</script>

<template>
    <div class="hidden lg:grid grid-cols-2 gap-3 sm:gap-4 lg:h-[450px] xl:h-[480px] min-h-0">
        <div class="group relative w-full h-full rounded-2xl sm:rounded-3xl overflow-hidden bg-gray-100 shadow-sm transition-transform duration-500 hover:-translate-y-1 hover:shadow-md cursor-pointer">
            <transition name="hero-fade">
                <img :key="visibleLarge" :src="visibleLarge" alt="Jolismar Store Collection" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out" />
            </transition>
        </div>

        <div class="grid grid-rows-2 gap-3 sm:gap-4 h-full min-h-0">
            <div class="group relative w-full h-full rounded-2xl sm:rounded-3xl overflow-hidden bg-gray-100 shadow-sm transition-transform duration-500 hover:-translate-y-1 hover:shadow-md cursor-pointer">
                <transition name="hero-fade">
                    <img :key="visibleSquare1" :src="visibleSquare1" alt="Skincare Collection" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out" />
                </transition>
            </div>
            <div class="group relative w-full h-full rounded-2xl sm:rounded-3xl overflow-hidden bg-gray-100 shadow-sm transition-transform duration-500 hover:-translate-y-1 hover:shadow-md cursor-pointer">
                <transition name="hero-fade">
                    <img :key="visibleSquare2" :src="visibleSquare2" alt="Makeup Collection" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out" />
                </transition>
            </div>
        </div>
    </div>
</template>

<style scoped>
.hero-fade-enter-active,
.hero-fade-leave-active {
    transition: opacity 1.5s ease-in-out;
}

.hero-fade-enter-from,
.hero-fade-leave-to {
    opacity: 0;
}
</style>
