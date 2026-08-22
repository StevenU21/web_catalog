<script setup lang="ts">
import { faMagnifyingGlass, faWandMagicSparkles, faSpinner } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { ref } from 'vue';

const ALL_SUGGESTIONS = [
    'Piel grasa con acné',
    'Perfume dulce y avainillado',
    'Protector solar sin efecto blanco',
    'Sérum de Ácido Hialurónico',
    'Base mate para clima cálido',
    'K-Beauty para calmar rojeces',
    'Perfume árabe de larga duración',
    'Limpiador facial suave',
    'Manchas y textura con Niacinamida',
    'Corrector de alta cobertura',
    'Centella Asiática para restaurar barrera',
    'Perfume fresco y cítrico',
    'Exfoliante con Ácido Glicólico',
    'Labial mate de larga duración',
    'Contorno de ojos para ojeras',
    'Crema hidratante ligera no grasa',
    'Rubor líquido acabado natural',
    'Fijador de maquillaje profesional',
    'Sérum de Retinol anti-edad',
    'Perfume árabe amaderado y especiado',
    'Protector solar en barra acabado mate',
    'Polvo fijador para control de brillo',
    'Peeling químico iluminador',
    'Gloss voluminizador con ácido hialurónico',
    'Bálsamo desmaquillante limpiador',
    'Perfume femenino floral y elegante',
    'Sérum con Ácido Azelaico',
    'Sérum para pestañas y cejas',
    'Primer minimizador de poros',
    'Kit de viaje de skincare coreano',
];

const props = withDefaults(
    defineProps<{
        modelValue?: string;
        placeholder?: string;
        loading?: boolean;
        suggestionsPool?: string[];
        suggestionsCount?: number;
    }>(),
    {
        modelValue: '',
        placeholder: '¿Qué buscas hoy?',
        loading: false,
        suggestionsCount: 3,
    }
);

const emit = defineEmits<{
    (e: 'update:modelValue', value: string): void;
    (e: 'submit', query: string): void;
}>();

const inputQuery = ref(props.modelValue);

function getRandomSuggestions(count: number = 3): string[] {
    const pool = props.suggestionsPool && props.suggestionsPool.length > 0 
        ? [...props.suggestionsPool] 
        : [...ALL_SUGGESTIONS];
    
    // Fisher-Yates shuffle
    for (let i = pool.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [pool[i], pool[j]] = [pool[j], pool[i]];
    }

    return pool.slice(0, count);
}

const activeSuggestions = ref<string[]>(getRandomSuggestions(props.suggestionsCount));

function handleInput(event: Event) {
    const target = event.target as HTMLInputElement;
    inputQuery.value = target.value;
    emit('update:modelValue', target.value);
}

function handleSubmit() {
    emit('submit', inputQuery.value);
}

function applySuggestion(suggestion: string) {
    inputQuery.value = suggestion;
    emit('update:modelValue', suggestion);
    emit('submit', suggestion);
}
</script>

<template>
    <div class="w-full flex flex-col items-start gap-3">
        <form @submit.prevent="handleSubmit" class="w-full relative group">
            <div class="absolute inset-y-0 left-0 pl-4 sm:pl-5 flex items-center pointer-events-none text-[#8C6A5D]">
                <FontAwesomeIcon :icon="faMagnifyingGlass" class="w-4 h-4 text-sm" />
            </div>

            <input 
                type="text" 
                :value="modelValue" 
                @input="handleInput"
                class="block w-full pl-11 sm:pl-14 pr-32 sm:pr-40 py-3.5 sm:py-4 border border-[#DAB6C4] rounded-full bg-white shadow-xs focus:ring-2 focus:ring-[#A388A9] focus:border-transparent transition-all outline-hidden text-[#2C2C2C] placeholder:text-[#2C2C2C]/50 text-sm sm:text-base md:text-lg" 
                :placeholder="placeholder"
            >

            <div class="absolute inset-y-0 right-1.5 sm:right-2 flex items-center">
                <button 
                    type="submit" 
                    :disabled="loading"
                    class="flex items-center gap-1.5 sm:gap-2 px-3.5 sm:px-5 py-2 sm:py-2.5 bg-[#A388A9] text-white rounded-full hover:bg-[#8C6A5D] disabled:opacity-50 transition-colors font-medium text-xs sm:text-sm shadow-xs group-hover:shadow-md cursor-pointer focus:ring-2 focus:ring-[#A388A9] focus:outline-hidden"
                >
                    <FontAwesomeIcon v-if="!loading" :icon="faWandMagicSparkles" class="text-xs" />
                    <FontAwesomeIcon v-else :icon="faSpinner" spin class="text-xs" />
                    <span>Consultar IA</span>
                </button>
            </div>
        </form>

        <!-- Quick AI Suggestion Badges -->
        <div class="w-full flex items-center justify-start gap-2 pt-1 text-xs text-[#2C2C2C]/70 overflow-x-auto [scrollbar-width:none] [&::-webkit-scrollbar]:hidden sm:flex-wrap sm:overflow-visible pb-1">
            <span class="text-[#8C6A5D] font-medium shrink-0">Sugerencias:</span>
            <button
                v-for="item in activeSuggestions"
                :key="item"
                type="button"
                @click="applySuggestion(item)"
                class="px-3 py-1 rounded-full bg-white border border-[#DAB6C4]/50 hover:border-[#A388A9] hover:text-[#8C6A5D] hover:bg-[#F7F5F8] transition-all cursor-pointer shadow-2xs whitespace-nowrap shrink-0"
            >
                {{ item }}
            </button>
        </div>
    </div>
</template>
