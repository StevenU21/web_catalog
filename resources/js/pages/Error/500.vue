<script setup lang="ts">
import { computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faServer } from '@fortawesome/free-solid-svg-icons';

const props = defineProps<{ status: number }>();

const title = computed(() => {
    if (props.status === 403) return 'Acceso Denegado';
    return 'Mantenimiento del Servidor';
});

const description = computed(() => {
    if (props.status === 403) return 'No tienes permiso para acceder a este recurso.';
    return 'Nuestros servidores están experimentando dificultades técnicas. Nuestro equipo técnico ya ha sido notificado y está trabajando para restaurar el servicio. Por favor, intenta de nuevo en unos minutos.';
});
</script>

<template>
    <Head :title="title" />

    <div class="min-h-screen bg-[#F7F5F8] flex flex-col items-center justify-center px-4">
        <div class="max-w-lg w-full text-center space-y-8 p-10 bg-white rounded-3xl shadow-sm border border-gray-100">
            <div class="flex justify-center">
                <div class="w-24 h-24 bg-red-50 text-red-400 rounded-full flex items-center justify-center">
                    <FontAwesomeIcon :icon="faServer" class="text-4xl animate-pulse" />
                </div>
            </div>
            
            <div class="space-y-4">
                <h1 class="text-5xl font-serif font-bold text-[#8C6A5D]">{{ status }}</h1>
                <h2 class="text-2xl font-bold text-[#2C2C2C]">{{ title }}</h2>
                <p class="text-gray-600 leading-relaxed">{{ description }}</p>
            </div>

            <div class="pt-8 border-t border-gray-100 text-sm text-gray-400 font-medium">
                Jolismar Store &copy; {{ new Date().getFullYear() }}
            </div>
        </div>
    </div>
</template>
