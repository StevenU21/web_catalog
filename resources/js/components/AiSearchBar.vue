<script setup lang="ts">
import { ref } from 'vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faMagnifyingGlass, faWandMagicSparkles, faSpinner } from '@fortawesome/free-solid-svg-icons';

const props = withDefaults(
    defineProps<{
        modelValue?: string;
        placeholder?: string;
        loading?: boolean;
    }>(),
    {
        modelValue: '',
        placeholder: "¿Qué buscas hoy? Ej. Serum para manchas o piel grasa...",
        loading: false,
    }
);

const emit = defineEmits<{
    (e: 'update:modelValue', value: string): void;
    (e: 'submit', query: string): void;
}>();

const inputQuery = ref(props.modelValue);

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

const suggestions = [
    'Piel grasa con acné',
    'Serum Vitamina C',
    'Hidratante piel sensible',
    'Perfume floral',
];
</script>

<template>
    <div class="w-full max-w-2xl md:max-w-3xl flex flex-col items-center gap-3">
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
        <div class="flex flex-wrap items-center justify-center gap-2 pt-1 text-xs text-[#2C2C2C]/70">
            <span class="text-[#8C6A5D] font-medium hidden sm:inline">Sugerencias:</span>
            <button
                v-for="item in suggestions"
                :key="item"
                type="button"
                @click="applySuggestion(item)"
                class="px-3 py-1 rounded-full bg-white border border-[#DAB6C4]/50 hover:border-[#A388A9] hover:text-[#8C6A5D] hover:bg-[#F7F5F8] transition-all cursor-pointer shadow-2xs"
            >
                {{ item }}
            </button>
        </div>
    </div>
</template>
