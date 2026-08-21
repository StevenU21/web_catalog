<script setup lang="ts">
import AppFooter from '@/components/AppFooter.vue';
import AppHeader from '@/components/AppHeader.vue';
import MobileTabBar from '@/components/MobileTabBar.vue';

</script>

<template>
    <div class="min-h-screen bg-[#F7F5F8] text-[#2C2C2C] font-sans selection:bg-[#DAB6C4] selection:text-[#2C2C2C] flex flex-col pb-28 md:pb-0">
        <AppHeader />

        <div class="flex-1">
            <slot />
        </div>

        <AppFooter />
        <MobileTabBar />
    </div>
</template>
