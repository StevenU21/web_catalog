<script setup lang="ts">
import {
    faFacebook,
    faInstagram,
    faTiktok,
    faWhatsapp,
} from '@fortawesome/free-brands-svg-icons';
import {
    faArrowUpRightFromSquare,
    faCheck,
    faClock,
    faCopy,
    faEnvelope,
    faGem,
    faLocationDot,
} from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { index as catalogIndex } from '@/routes/catalog';

const googleMapsUrl = 'https://goo.gl/maps/6SiG6aqwFKSgkrqY6';
const mapEmbedSrc =
    'https://maps.google.com/maps?q=13.091400,-86.358900&hl=es&z=17&output=embed';
const contactEmail = 'Jolismarstore@gmail.com';
const contactPhone = '+505 8843-8783';
const whatsappUrl = 'https://wa.me/50588438783';

const copied = ref(false);

const copyToClipboard = async (text: string) => {
    try {
        await navigator.clipboard.writeText(text);
        copied.value = true;
        setTimeout(() => {
            copied.value = false;
        }, 2500);
    } catch (e) {
        console.error('Error al copiar:', e);
    }
};
</script>

<template>
    <Head title="Sobre Nosotros | Jolismar Store" />

    <AppLayout>
        <main
            class="mx-auto max-w-7xl px-4 pt-8 pb-20 sm:px-6 sm:pt-12 md:pb-24 lg:px-8"
        >
            <!-- Story & Founder Presentation (Wide 2-column) -->
            <section
                class="mb-16 grid grid-cols-1 items-center gap-8 sm:mb-20 lg:grid-cols-12 lg:gap-12"
            >
                <!-- Left Visual Card (5 cols) -->
                <div class="flex flex-col items-center lg:col-span-5">
                    <div
                        class="group relative w-full max-w-md overflow-hidden rounded-2xl border border-[#DAB6C4]/30 bg-white p-8 text-center shadow-sm sm:p-10"
                    >
                        <!-- Decorative background glow -->
                        <div
                            class="pointer-events-none absolute -top-16 -right-16 h-36 w-36 rounded-full bg-[#DAB6C4]/20 blur-2xl"
                        ></div>
                        <div
                            class="pointer-events-none absolute -bottom-16 -left-16 h-36 w-36 rounded-full bg-[#A388A9]/15 blur-2xl"
                        ></div>

                        <!-- Brand Logo -->
                        <div
                            class="relative mx-auto mb-6 h-44 w-44 sm:h-52 sm:w-52"
                        >
                            <img
                                src="/img/logo03.jpg"
                                alt="Jolismar Store"
                                class="h-full w-full rounded-full border-4 border-[#F7F5F8] object-cover shadow-md transition-transform duration-500 group-hover:scale-105"
                            />
                        </div>

                        <h2
                            class="mb-1 font-serif text-2xl font-bold text-[#8C6A5D]"
                        >
                            Jolismar Store
                        </h2>
                        <p
                            class="mb-4 text-xs font-semibold tracking-widest text-[#A388A9] uppercase"
                        >
                            Estelí, Nicaragua &bull; Est. 2025
                        </p>

                        <!-- Slogan Pill -->
                        <div
                            class="rounded-xl border border-[#DAB6C4]/30 bg-[#F7F5F8] p-3.5 text-xs text-[#2C2C2C]/80 italic sm:text-sm"
                        >
                            &ldquo;Tu piel, tu aroma y tu brillo... en un solo
                            lugar.&rdquo;
                        </div>

                    </div>
                </div>

                <!-- Right Narrative (7 cols) -->
                <div class="space-y-6 lg:col-span-7">
                    <div>
                        <span
                            class="mb-1 block text-xs font-bold tracking-wider text-[#A388A9] uppercase"
                            >Pasión por el Cuidado y la Belleza</span
                        >
                        <h2
                            class="font-serif text-3xl font-bold text-[#8C6A5D] sm:text-4xl"
                        >
                            ¿Quiénes Somos?
                        </h2>
                    </div>

                    <div
                        class="space-y-4 font-sans text-base leading-relaxed text-[#2C2C2C]/85 sm:text-lg"
                    >
                        <p>
                            <strong class="text-[#8C6A5D]"
                                >Jolismar Store</strong
                            >
                            nació en el año 2025 en la ciudad de Estelí con una
                            misión clara y decidida: brindar a clientes de toda
                            Nicaragua acceso confiable, transparente e inmediato
                            a productos originales de cosmética de alta gama,
                            tratamientos dermatológicos de renombre y las más
                            exclusivas fragancias árabes.
                        </p>
                        <p>
                            Fundada y liderada por
                            <strong class="text-[#8C6A5D]"
                                >Daysi Lisbeth Peralta Pastrana</strong
                            >, nuestra tienda surge para resolver una de las
                            mayores preocupaciones de los amantes del cuidado
                            personal: la certeza de adquirir productos 100%
                            auténticos que cuiden la salud de su piel y
                            potencien su estilo con resultados comprobados.
                        </p>
                        <p class="text-sm text-[#2C2C2C]/75 sm:text-base">
                            En Jolismar Store no solo vendemos productos;
                            brindamos una asesoría cercana para que elijas
                            exactamente los activos adecuados para tu tipo de
                            piel (Niacinamida, Retinol, Ácido Hialurónico,
                            Ceramidas) y las notas olfativas que te definan.
                        </p>
                    </div>

                    <!-- Highlights row -->
                    <div
                        class="grid grid-cols-2 gap-3 pt-2 sm:grid-cols-3 sm:gap-4"
                    >
                        <div
                            class="rounded-xl border border-[#DAB6C4]/30 bg-white p-3.5 shadow-2xs"
                        >
                            <span
                                class="block font-serif text-xl font-bold text-[#8C6A5D]"
                                >100%</span
                            >
                            <span class="text-xs font-medium text-[#2C2C2C]/70"
                                >Marcas Originales</span
                            >
                        </div>
                        <div
                            class="rounded-xl border border-[#DAB6C4]/30 bg-white p-3.5 shadow-2xs"
                        >
                            <span
                                class="block font-serif text-xl font-bold text-[#8C6A5D]"
                                >Nacional</span
                            >
                            <span class="text-xs font-medium text-[#2C2C2C]/70"
                                >Cobertura de Envío</span
                            >
                        </div>
                        <div
                            class="col-span-2 rounded-xl border border-[#DAB6C4]/30 bg-white p-3.5 shadow-2xs sm:col-span-1"
                        >
                            <span
                                class="block font-serif text-xl font-bold text-[#8C6A5D]"
                                >1 a 1</span
                            >
                            <span class="text-xs font-medium text-[#2C2C2C]/70"
                                >Asesoría Dedicada</span
                            >
                        </div>
                    </div>
                </div>
            </section>


            <!-- Location, Contact & Interactive Map Section -->
            <section
                class="mb-16 rounded-3xl border border-[#DAB6C4]/30 bg-white p-6 shadow-sm sm:mb-20 sm:p-8 lg:p-12"
            >
                <div class="mb-8 max-w-3xl sm:mb-10">
                    <span
                        class="mb-1 block text-xs font-bold tracking-wider text-[#A388A9] uppercase"
                        >Encuéntranos & Contáctanos</span
                    >
                    <h2
                        class="mb-3 font-serif text-3xl font-bold text-[#8C6A5D] sm:text-4xl"
                    >
                        Ubicación y Canales de Atención
                    </h2>
                    <p class="text-sm text-[#2C2C2C]/75 sm:text-base">
                        Estamos ubicados en Estelí y realizamos envíos a toda
                        Nicaragua. Escríbenos directamente o visítanos con
                        previa cita.
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 items-stretch gap-8 lg:grid-cols-12 lg:gap-10"
                >
                    <!-- Left: Contact Details Cards (5 cols) -->
                    <div
                        class="flex flex-col justify-between space-y-6 lg:col-span-5"
                    >
                        <div class="space-y-4">
                            <!-- Physical Address Card -->
                            <div
                                class="flex items-start gap-4 rounded-2xl border border-[#DAB6C4]/30 bg-[#F7F5F8] p-4 sm:p-5"
                            >
                                <div
                                    class="mt-0.5 flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-[#8C6A5D] shadow-2xs"
                                >
                                    <FontAwesomeIcon
                                        :icon="faLocationDot"
                                        class="text-lg"
                                    />
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4
                                        class="mb-1 text-xs font-bold tracking-wider text-[#8C6A5D] uppercase"
                                    >
                                        Dirección Física
                                    </h4>
                                    <p
                                        class="mb-2 text-sm leading-snug font-medium text-[#2C2C2C]"
                                    >
                                        Estelí, Esquina de los bancos 1c y media
                                        al oeste (En cerrajería Multiservicios),
                                        Estelí, Nicaragua.
                                    </p>
                                    <a
                                        :href="googleMapsUrl"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="inline-flex items-center gap-1.5 text-xs font-bold text-[#A388A9] transition-colors hover:text-[#8C6A5D]"
                                    >
                                        <span>Abrir en Google Maps</span>
                                        <FontAwesomeIcon
                                            :icon="faArrowUpRightFromSquare"
                                            class="text-[10px]"
                                        />
                                    </a>
                                </div>
                            </div>

                            <!-- Email Card -->
                            <div
                                class="flex items-start gap-4 rounded-2xl border border-[#DAB6C4]/30 bg-[#F7F5F8] p-4 sm:p-5"
                            >
                                <div
                                    class="mt-0.5 flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-[#8C6A5D] shadow-2xs"
                                >
                                    <FontAwesomeIcon
                                        :icon="faEnvelope"
                                        class="text-lg"
                                    />
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4
                                        class="mb-1 text-xs font-bold tracking-wider text-[#8C6A5D] uppercase"
                                    >
                                        Correo Electrónico
                                    </h4>
                                    <div
                                        class="flex flex-wrap items-center gap-2"
                                    >
                                        <a
                                            :href="`mailto:${contactEmail}`"
                                            class="text-sm font-semibold break-all text-[#2C2C2C] transition-colors hover:text-[#8C6A5D]"
                                        >
                                            {{ contactEmail }}
                                        </a>
                                        <button
                                            type="button"
                                            @click="
                                                copyToClipboard(contactEmail)
                                            "
                                            class="inline-flex cursor-pointer items-center gap-1 rounded-md border border-[#DAB6C4]/40 bg-white px-2.5 py-1 text-xs text-[#8C6A5D] shadow-2xs transition-all hover:bg-[#A388A9] hover:text-white"
                                            :title="'Copiar correo'"
                                        >
                                            <FontAwesomeIcon
                                                :icon="
                                                    copied ? faCheck : faCopy
                                                "
                                                class="text-xs"
                                            />
                                            <span>{{
                                                copied ? '¡Copiado!' : 'Copiar'
                                            }}</span>
                                        </button>
                                    </div>
                                    <p class="mt-1 text-xs text-[#2C2C2C]/60">
                                        Consultas formales, pedidos y
                                        colaboraciones.
                                    </p>
                                </div>
                            </div>

                            <!-- WhatsApp / Phone Card -->
                            <div
                                class="flex items-start gap-4 rounded-2xl border border-[#DAB6C4]/30 bg-[#F7F5F8] p-4 sm:p-5"
                            >
                                <div
                                    class="mt-0.5 flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-[#8C6A5D] shadow-2xs"
                                >
                                    <FontAwesomeIcon
                                        :icon="faWhatsapp"
                                        class="text-xl text-emerald-600"
                                    />
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4
                                        class="mb-1 text-xs font-bold tracking-wider text-[#8C6A5D] uppercase"
                                    >
                                        WhatsApp & Pedidos
                                    </h4>
                                    <p
                                        class="mb-1 text-sm font-semibold text-[#2C2C2C]"
                                    >
                                        {{ contactPhone }}
                                    </p>
                                    <a
                                        :href="whatsappUrl"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 transition-colors hover:text-emerald-800"
                                    >
                                        <span>Chatear por WhatsApp</span>
                                        <FontAwesomeIcon
                                            :icon="faArrowUpRightFromSquare"
                                            class="text-[10px]"
                                        />
                                    </a>
                                </div>
                            </div>

                            <!-- Hours / Appointment Card -->
                            <div
                                class="flex items-start gap-4 rounded-2xl border border-[#DAB6C4]/30 bg-[#F7F5F8] p-4 sm:p-5"
                            >
                                <div
                                    class="mt-0.5 flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-[#8C6A5D] shadow-2xs"
                                >
                                    <FontAwesomeIcon
                                        :icon="faClock"
                                        class="text-lg"
                                    />
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4
                                        class="mb-1 text-xs font-bold tracking-wider text-[#8C6A5D] uppercase"
                                    >
                                        Horario y Atención
                                    </h4>
                                    <p
                                        class="text-sm leading-snug text-[#2C2C2C]"
                                    >
                                        <strong>Tienda física:</strong> Solo con
                                        cita previa para garantizar atención
                                        exclusiva.
                                    </p>
                                    <p class="mt-1 text-xs text-[#2C2C2C]/70">
                                        <strong
                                            >Atención en línea & envíos:</strong
                                        >
                                        Abierto y activo todos los días a nivel
                                        nacional.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media Channels Bar -->
                        <div class="pt-2">
                            <span
                                class="mb-3 block text-xs font-bold tracking-wider text-[#8C6A5D] uppercase"
                                >Síguenos en Redes Sociales</span
                            >
                            <div class="flex items-center gap-3">
                                <a
                                    href="https://www.instagram.com/jolismar_store/"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="Instagram"
                                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-[#DAB6C4]/40 bg-[#F7F5F8] text-[#8C6A5D] shadow-2xs transition-all hover:bg-[#A388A9] hover:text-white"
                                >
                                    <FontAwesomeIcon
                                        :icon="faInstagram"
                                        class="text-lg"
                                    />
                                </a>
                                <a
                                    href="https://www.tiktok.com/@jolismar_store"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="TikTok"
                                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-[#DAB6C4]/40 bg-[#F7F5F8] text-[#8C6A5D] shadow-2xs transition-all hover:bg-[#A388A9] hover:text-white"
                                >
                                    <FontAwesomeIcon
                                        :icon="faTiktok"
                                        class="text-lg"
                                    />
                                </a>
                                <a
                                    href="https://www.facebook.com/JolismarStore/"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="Facebook"
                                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-[#DAB6C4]/40 bg-[#F7F5F8] text-[#8C6A5D] shadow-2xs transition-all hover:bg-[#A388A9] hover:text-white"
                                >
                                    <FontAwesomeIcon
                                        :icon="faFacebook"
                                        class="text-lg"
                                    />
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Google Maps Frame (7 cols) -->
                    <div class="flex flex-col lg:col-span-7">
                        <div
                            class="relative flex h-full min-h-[380px] w-full flex-col overflow-hidden rounded-2xl border border-[#DAB6C4]/40 bg-[#F7F5F8] shadow-sm lg:min-h-[480px]"
                        >
                            <!-- Header overlay with Google Maps quick action -->
                            <div
                                class="pointer-events-none absolute top-4 right-4 left-4 z-10 flex items-center justify-between"
                            >
                                <div
                                    class="pointer-events-auto flex items-center gap-2 rounded-full border border-[#DAB6C4]/40 bg-white/95 px-3.5 py-1.5 shadow-sm backdrop-blur-xs"
                                >
                                    <FontAwesomeIcon
                                        :icon="faLocationDot"
                                        class="text-xs text-[#8C6A5D]"
                                    />
                                    <span
                                        class="text-xs font-bold text-[#8C6A5D]"
                                        >Jolismar Store &bull; Estelí</span
                                    >
                                </div>

                                <a
                                    :href="googleMapsUrl"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="pointer-events-auto flex items-center gap-1.5 rounded-full bg-[#8C6A5D] px-3 py-1.5 text-xs font-semibold text-white shadow-md transition-all hover:bg-[#A388A9]"
                                >
                                    <span>Ver en Google Maps</span>
                                    <FontAwesomeIcon
                                        :icon="faArrowUpRightFromSquare"
                                        class="text-[10px]"
                                    />
                                </a>
                            </div>

                            <!-- Embedded Map Iframe -->
                            <iframe
                                title="Ubicación de Jolismar Store en Estelí"
                                :src="mapEmbedSrc"
                                class="w-full flex-1 rounded-2xl border-0"
                                loading="lazy"
                                allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>


                        </div>
                    </div>
                </div>
            </section>

            <!-- Bottom CTA Banner -->
            <section
                class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#8C6A5D] to-[#6c4f44] p-8 text-center text-white shadow-lg sm:p-12 lg:p-14"
            >
                <!-- Background decorative elements -->
                <div
                    class="pointer-events-none absolute -top-24 -right-24 h-72 w-72 rounded-full bg-[#DAB6C4]/20 blur-3xl"
                ></div>
                <div
                    class="pointer-events-none absolute -bottom-24 -left-24 h-72 w-72 rounded-full bg-[#A388A9]/25 blur-3xl"
                ></div>

                <div class="relative z-10 mx-auto max-w-3xl space-y-6">
                    <span
                        class="block text-xs font-bold tracking-widest text-[#DAB6C4] uppercase"
                        >Explora Nuestra Colección</span
                    >
                    <h2
                        class="font-serif text-3xl leading-tight font-bold sm:text-4xl lg:text-5xl"
                    >
                        Descubre tu Rutina y Fragancia Ideal
                    </h2>
                    <p
                        class="font-sans text-base leading-relaxed text-white/85 sm:text-lg"
                    >
                        Navega por nuestro catálogo completo con precios
                        transparentes y disponibilidad en tiempo real. O
                        contáctanos para asesorarte de manera personalizada.
                    </p>

                    <div
                        class="flex flex-col items-center justify-center gap-4 pt-2 sm:flex-row"
                    >
                        <Link
                            :href="catalogIndex.url()"
                            class="inline-flex w-full transform items-center justify-center gap-2 rounded-xl bg-[#F7F5F8] px-8 py-3.5 font-sans text-base font-bold text-[#8C6A5D] shadow-md transition-all duration-300 hover:-translate-y-0.5 hover:bg-white hover:shadow-lg sm:w-auto"
                        >
                            Explorar Catálogo
                        </Link>
                        <a
                            :href="whatsappUrl"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex w-full transform items-center justify-center gap-2 rounded-xl bg-[#A388A9] px-8 py-3.5 font-sans text-base font-bold text-white shadow-md transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#927598] hover:shadow-lg sm:w-auto"
                        >
                            <FontAwesomeIcon
                                :icon="faWhatsapp"
                                class="text-lg"
                            />
                            <span>Escríbenos a WhatsApp</span>
                        </a>
                    </div>
                </div>
            </section>
        </main>
    </AppLayout>
</template>
