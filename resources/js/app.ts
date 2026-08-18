import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import '@fontsource-variable/inter';
import '@fontsource-variable/playfair-display';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    setup({ el, App, props, plugin }) {
        if (!el) {
            return;
        }

        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('font-awesome-icon', FontAwesomeIcon)
            .component('FontAwesomeIcon', FontAwesomeIcon)
            .mount(el);
    },
    progress: {
        color: '#A388A9',
    },
});

