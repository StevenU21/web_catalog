<script setup lang="ts">
import { faWhatsapp, faInstagram, faTiktok, faFacebook } from '@fortawesome/free-brands-svg-icons';
import { faLocationDot } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const currentYear = new Date().getFullYear();
</script>

<template>
    <footer class="w-full border-t border-[#DAB6C4]/30 py-6 mt-8 sm:mt-12 bg-[#F7F5F8]">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6 text-sm text-[#2C2C2C]/70">
            <!-- Brand & Tagline -->
            <div class="flex flex-col items-center md:items-start gap-2">
                <div class="flex items-center gap-2.5">
                    <img src="/img/logo03.jpg" alt="Jolismar Store" class="h-8 w-8 sm:h-9 sm:w-9 object-cover rounded-full shadow-2xs" />
                    <span class="font-serif text-[#8C6A5D] font-bold text-lg">Jolismar Store</span>
                </div>
                <span class="text-xs text-[#2C2C2C]/60">&copy; {{ currentYear }} Jolismar Store. Elegancia en cada gota.</span>
            </div>

            <!-- Social Links -->
            <div class="flex items-center gap-4 text-[#8C6A5D]">
                <a 
                    href="https://wa.me/c/50588438783" 
                    target="_blank" 
                    rel="noopener noreferrer" 
                    aria-label="WhatsApp Catálogo" 
                    class="w-9 h-9 rounded-full bg-white border border-[#DAB6C4]/40 flex items-center justify-center hover:bg-[#A388A9] hover:text-white hover:border-transparent transition-all shadow-2xs"
                >
                    <FontAwesomeIcon :icon="faWhatsapp" class="text-base" />
                </a>
                <a 
                    href="https://www.instagram.com/jolismar_store/" 
                    target="_blank" 
                    rel="noopener noreferrer" 
                    aria-label="Instagram" 
                    class="w-9 h-9 rounded-full bg-white border border-[#DAB6C4]/40 flex items-center justify-center hover:bg-[#A388A9] hover:text-white hover:border-transparent transition-all shadow-2xs"
                >
                    <FontAwesomeIcon :icon="faInstagram" class="text-base" />
                </a>
                <a 
                    href="https://www.tiktok.com/@jolismar_store" 
                    target="_blank" 
                    rel="noopener noreferrer" 
                    aria-label="TikTok" 
                    class="w-9 h-9 rounded-full bg-white border border-[#DAB6C4]/40 flex items-center justify-center hover:bg-[#A388A9] hover:text-white hover:border-transparent transition-all shadow-2xs"
                >
                    <FontAwesomeIcon :icon="faTiktok" class="text-base" />
                </a>
                <a 
                    href="https://www.facebook.com/JolismarStore/" 
                    target="_blank" 
                    rel="noopener noreferrer" 
                    aria-label="Facebook" 
                    class="w-9 h-9 rounded-full bg-white border border-[#DAB6C4]/40 flex items-center justify-center hover:bg-[#A388A9] hover:text-white hover:border-transparent transition-all shadow-2xs"
                >
                    <FontAwesomeIcon :icon="faFacebook" class="text-base" />
                </a>
            </div>

            <!-- Location & Shipping -->
            <div class="text-xs text-[#2C2C2C]/60 flex items-center gap-1.5">
                <FontAwesomeIcon :icon="faLocationDot" class="text-[#8C6A5D]" />
                <span>Estelí, Nicaragua &bull; Envíos a todo el país</span>
            </div>
        </div>
    </footer>
</template>
