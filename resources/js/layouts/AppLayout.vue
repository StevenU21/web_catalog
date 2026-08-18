<script setup lang="ts">
import AppHeader from '@/components/AppHeader.vue';
import AppFooter from '@/components/AppFooter.vue';

defineProps<{
    cartCount?: number;
}>();
</script>

<template>
    <div class="min-h-screen bg-[#F7F5F8] text-[#2C2C2C] font-sans selection:bg-[#DAB6C4] selection:text-[#2C2C2C] flex flex-col">
        <AppHeader :cart-count="cartCount" />

        <div class="flex-1">
            <slot />
        </div>

        <AppFooter />
    </div>
</template>
