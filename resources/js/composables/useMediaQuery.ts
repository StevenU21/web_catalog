import { ref, onMounted, onUnmounted } from 'vue';

export function useMediaQuery(query: string) {
    const matches = ref(false);
    let mediaQueryList: MediaQueryList | null = null;

    const updateMatches = (e: MediaQueryListEvent | MediaQueryList) => {
        matches.value = e.matches;
    };

    onMounted(() => {
        mediaQueryList = window.matchMedia(query);
        matches.value = mediaQueryList.matches;
        mediaQueryList.addEventListener('change', updateMatches);
    });

    onUnmounted(() => {
        if (mediaQueryList) {
            mediaQueryList.removeEventListener('change', updateMatches);
        }
    });

    return matches;
}
