<script setup lang="ts">
import { ref } from 'vue';

const props = withDefaults(
    defineProps<{
        modelValue?: string;
        placeholder?: string;
        loading?: boolean;
    }>(),
    {
        modelValue: '',
        placeholder: "Pregúntale a nuestra IA... ej: 'Serum hidratante para piel grasa con acné'",
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
</script>

<template>
    <form @submit.prevent="handleSubmit" class="w-full max-w-2xl relative group">
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-[#8C6A5D]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <input 
            type="text" 
            :value="modelValue" 
            @input="handleInput"
            class="block w-full pl-14 pr-36 py-4 border border-[#DAB6C4] rounded-full bg-white shadow-xs focus:ring-2 focus:ring-[#A388A9] focus:border-transparent transition-all outline-hidden text-[#2C2C2C] placeholder:text-[#2C2C2C]/50 text-base md:text-lg" 
            :placeholder="placeholder"
        >

        <div class="absolute inset-y-0 right-2 flex items-center">
            <button 
                type="submit" 
                :disabled="loading"
                class="flex items-center gap-2 px-5 py-2.5 bg-[#A388A9] text-white rounded-full hover:bg-[#8C6A5D] disabled:opacity-50 transition-colors font-medium text-sm shadow-xs group-hover:shadow-md cursor-pointer focus:ring-2 focus:ring-[#A388A9] focus:outline-hidden"
            >
                <svg v-if="!loading" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <svg v-else class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z" />
                </svg>
                <span>Consultar IA</span>
            </button>
        </div>
    </form>
</template>
