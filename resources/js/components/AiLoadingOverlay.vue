<script setup lang="ts">
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faWandMagicSparkles, faCircleNotch } from '@fortawesome/free-solid-svg-icons';

defineProps<{
    show: boolean;
}>();
</script>

<template>
    <Transition
        enter-active-class="transition ease-out duration-300"
        enter-from-class="opacity-0 scale-95"
        enter-to-class="opacity-100 scale-100"
        leave-active-class="transition ease-in duration-200"
        leave-from-class="opacity-100 scale-100"
        leave-to-class="opacity-0 scale-95"
    >
        <div v-if="show" class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-[#F7F5F8]/80 backdrop-blur-sm p-6">
            <div class="relative flex items-center justify-center mb-6">
                <!-- Anillo exterior girando -->
                <FontAwesomeIcon :icon="faCircleNotch" class="w-16 h-16 text-[#DAB6C4] animate-spin" />
                <!-- Icono de magia en el centro con pulso -->
                <FontAwesomeIcon :icon="faWandMagicSparkles" class="absolute w-6 h-6 text-[#A388A9] animate-pulse" />
            </div>
            
            <h3 class="text-[#8C6A5D] font-serif text-xl sm:text-2xl font-semibold mb-2 text-center animate-pulse">
                Nuestra IA está trabajando...
            </h3>
            
            <p class="text-[#2C2C2C]/80 font-sans text-sm sm:text-base text-center max-w-sm">
                Seleccionando los productos ideales para tu piel.
            </p>
        </div>
    </Transition>
</template>
