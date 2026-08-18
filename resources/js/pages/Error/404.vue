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

    <div class="min-h-[60vh] flex flex-col items-center justify-center px-4 py-16">
        <div class="max-w-md w-full text-center space-y-8">
            <div class="relative w-full flex items-center justify-center">
                <div class="w-32 h-32 bg-[#F7F5F8] rounded-full flex items-center justify-center">
                    <FontAwesomeIcon :icon="faGhost" class="text-5xl text-[#DAB6C4] animate-bounce" />
                </div>
            </div>
            
            <div class="space-y-3">
                <h1 class="text-6xl font-serif font-bold text-[#8C6A5D]">404</h1>
                <h2 class="text-2xl font-bold text-[#2C2C2C]">Página no encontrada</h2>
                <p class="text-gray-600 leading-relaxed">Lo sentimos, no pudimos encontrar el producto o página que estás buscando. Es posible que el enlace esté roto o haya sido eliminado.</p>
            </div>

            <div class="pt-6">
                <Link 
                    href="/" 
                    class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#A388A9] text-white font-medium rounded-xl hover:bg-[#8C6A5D] transition-colors min-h-[44px]"
                >
                    <FontAwesomeIcon :icon="faHouse" />
                    Volver al Inicio
                </Link>
            </div>
        </div>
    </div>
</template>
