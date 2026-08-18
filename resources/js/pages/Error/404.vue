<script lang="ts">
import AppLayout from '../../layouts/AppLayout.vue';
import { defineComponent } from 'vue';

export default defineComponent({
    layout: AppLayout
});
</script>

<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faHouse, faGhost } from '@fortawesome/free-solid-svg-icons';

defineProps<{ status?: number }>();
</script>

<template>
    <Head title="Página no encontrada" />

    <div class="h-full flex flex-col items-center justify-center px-4 py-6 md:py-8">
        <div class="max-w-md w-full text-center space-y-5">
            <div class="relative w-full flex items-center justify-center">
                <div class="w-20 h-20 bg-white/70 shadow-2xs rounded-full flex items-center justify-center">
                    <FontAwesomeIcon :icon="faGhost" class="text-3xl text-[#DAB6C4] animate-bounce" />
                </div>
            </div>
            
            <div class="space-y-2">
                <h1 class="text-5xl font-serif font-bold text-[#8C6A5D]">404</h1>
                <h2 class="text-xl font-bold text-[#2C2C2C]">Página no encontrada</h2>
                <p class="text-sm text-gray-600 leading-relaxed">Lo sentimos, no pudimos encontrar el producto o página que estás buscando. Es posible que el enlace esté roto o haya sido eliminado.</p>
            </div>

            <div class="pt-2">
                <Link 
                    href="/" 
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#A388A9] text-white font-medium rounded-xl hover:bg-[#8C6A5D] transition-colors min-h-[44px] text-sm shadow-xs"
                >
                    <FontAwesomeIcon :icon="faHouse" />
                    Volver al Inicio
                </Link>
            </div>
        </div>
    </div>
</template>
