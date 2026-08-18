<script setup lang="ts">
const currentYear = new Date().getFullYear();
</script>

<template>
    <footer class="w-full border-t border-[#DAB6C4]/30 py-8 mt-20 bg-[#F7F5F8]">
        <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-[#2C2C2C]/70">
            <div class="font-serif text-[#8C6A5D] font-medium">
                Jolismar Store
            </div>
            <div>
                &copy; {{ currentYear }} Jolismar Store. Elegance in every drop.
            </div>
            <div class="text-xs text-[#2C2C2C]/50">
                Estelí, Nicaragua &bull; Envíos a todo el país
            </div>
        </div>
    </footer>
</template>
