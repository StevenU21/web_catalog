<script setup lang="ts">
import AppHeader from '@/components/AppHeader.vue';
import AppFooter from '@/components/AppFooter.vue';
import MobileTabBar from '@/components/MobileTabBar.vue';

defineProps<{
    cartCount?: number;
}>();
</script>

<template>
    <div class="min-h-screen bg-[#F7F5F8] text-[#2C2C2C] font-sans selection:bg-[#DAB6C4] selection:text-[#2C2C2C] flex flex-col pb-20 md:pb-0">
        <AppHeader :cart-count="cartCount" />

        <div class="flex-1">
            <slot />
        </div>

        <AppFooter />
        <MobileTabBar :cart-count="cartCount" />
    </div>
</template>
