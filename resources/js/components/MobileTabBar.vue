<script setup lang="ts">
import { usePage, Link } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { 
    faHouse, 
    faSpa,
    faBrush,
    faSprayCanSparkles
} from '@fortawesome/free-solid-svg-icons';

const page = usePage();

// Simple route matching logic for active state
const isActive = (path: string) => {
    return page.url === path || (path !== '/' && page.url.startsWith(path));
};
</script>

<template>
    <!-- Tab Bar -->
    <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur-md border-t border-[#DAB6C4]/30 z-[45] pb-safe shadow-[0_-4px_20px_rgba(0,0,0,0.05)]">
        <div class="flex justify-around items-center px-2 py-2">
            
            <!-- Home -->
            <Link href="/" class="flex flex-col items-center justify-center w-16 min-h-[44px] transition-colors" :class="isActive('/') ? 'text-[#8C6A5D]' : 'text-[#2C2C2C]/50 hover:text-[#A388A9]'">
                <FontAwesomeIcon :icon="faHouse" class="text-xl mb-1" />
                <span class="text-[10px] font-medium">Inicio</span>
            </Link>

            <!-- Skincare -->
            <Link href="#" class="flex flex-col items-center justify-center w-16 min-h-[44px] transition-colors" :class="isActive('/skincare') ? 'text-[#8C6A5D]' : 'text-[#2C2C2C]/50 hover:text-[#A388A9]'">
                <FontAwesomeIcon :icon="faSpa" class="text-xl mb-1" />
                <span class="text-[10px] font-medium">Skincare</span>
            </Link>

            <!-- Maquillaje -->
            <Link href="#" class="flex flex-col items-center justify-center w-16 min-h-[44px] transition-colors" :class="isActive('/maquillaje') ? 'text-[#8C6A5D]' : 'text-[#2C2C2C]/50 hover:text-[#A388A9]'">
                <FontAwesomeIcon :icon="faBrush" class="text-xl mb-1" />
                <span class="text-[10px] font-medium">Maquillaje</span>
            </Link>

            <!-- Perfumería -->
            <Link href="#" class="flex flex-col items-center justify-center w-16 min-h-[44px] transition-colors" :class="isActive('/perfumeria') ? 'text-[#8C6A5D]' : 'text-[#2C2C2C]/50 hover:text-[#A388A9]'">
                <FontAwesomeIcon :icon="faSprayCanSparkles" class="text-xl mb-1" />
                <span class="text-[10px] font-medium">Perfumería</span>
            </Link>

        </div>
    </div>


</template>
