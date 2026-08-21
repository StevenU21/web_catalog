<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { index as catalogIndex } from '@/routes/catalog';
</script>

<template>
    <Head title="Sobre Nosotros | Jolismar Store" />

    <AppLayout>
        <main class="max-w-4xl mx-auto px-4 sm:px-6 pt-12 pb-24 md:pt-16">
            
            <div class="text-center mb-16">
                <span class="text-sm font-semibold uppercase tracking-widest text-[#A388A9] mb-2 block">Nuestra Historia</span>
                <h1 class="text-4xl md:text-5xl font-serif text-[#8C6A5D] leading-tight mb-6">
                    Sobre Nosotros
                </h1>
                <p class="text-lg text-[#2C2C2C]/80 font-sans max-w-2xl mx-auto leading-relaxed">
                    Elegancia en cada gota. Somos tu destino confiable para encontrar lo mejor en cuidado de la piel, maquillaje y perfumería original en Nicaragua.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-24">
                <div class="aspect-square bg-white rounded-lg shadow-sm border border-[#DAB6C4]/30 overflow-hidden flex items-center justify-center p-8">
                    <img src="/img/logo03.jpg" alt="Jolismar Store Logo" class="w-full h-full object-cover rounded-full shadow-md border-4 border-[#F7F5F8]">
                </div>
                <div>
                    <h2 class="text-3xl font-serif text-[#8C6A5D] mb-6">¿Quiénes Somos?</h2>
                    <div class="space-y-6 text-[#2C2C2C] font-sans leading-relaxed">
                        <p>
                            <strong>Jolismar Store</strong> nació en 2025 en la vibrante ciudad de Estelí con una visión clara: ofrecer acceso directo y confiable a cosméticos de alta gama, productos dermatológicos y perfumería árabe original a clientes de todo el país.
                        </p>
                        <p>
                            Fundada y liderada por <strong>Daysi Lisbeth Peralta Pastrana</strong>, nuestra tienda se dedica a brindar una experiencia de compra premium. Entendemos que el cuidado personal es una inversión en ti mismo, y por eso nos esforzamos por garantizar la autenticidad y calidad de cada producto en nuestro catálogo.
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-[#DAB6C4]/30 p-8 md:p-12 mb-16 text-center">
                <h2 class="text-2xl font-serif text-[#8C6A5D] mb-8">Nuestro Compromiso</h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-left">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-[#F7F5F8] rounded-full flex items-center justify-center mb-4 text-[#A388A9]">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#8C6A5D] mb-2 font-serif">100% Original</h3>
                        <p class="text-sm text-[#2C2C2C]/70">Garantizamos la autenticidad de todas nuestras marcas, desde CeraVe hasta The Ordinary.</p>
                    </div>
                    
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-[#F7F5F8] rounded-full flex items-center justify-center mb-4 text-[#A388A9]">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#8C6A5D] mb-2 font-serif">Envío Nacional</h3>
                        <p class="text-sm text-[#2C2C2C]/70">Llevamos tus productos favoritos hasta la puerta de tu casa en cualquier parte de Nicaragua.</p>
                    </div>

                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-[#F7F5F8] rounded-full flex items-center justify-center mb-4 text-[#A388A9]">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-bold text-[#8C6A5D] mb-2 font-serif">Asesoría Confiable</h3>
                        <p class="text-sm text-[#2C2C2C]/70">Te ayudamos a encontrar el producto ideal para tu tipo de piel y tus necesidades específicas.</p>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <Link 
                    :href="catalogIndex.url()"
                    class="inline-flex items-center gap-2 bg-[#A388A9] hover:bg-[#8C6A5D] text-white font-sans font-semibold text-lg px-8 py-4 rounded-sm transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5"
                >
                    Explorar nuestro catálogo
                </Link>
            </div>

        </main>
    </AppLayout>
</template>
