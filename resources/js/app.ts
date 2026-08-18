import { createInertiaApp } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import '@fontsource-variable/inter';
import '@fontsource-variable/playfair-display';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    withApp(app) {
        app.component('font-awesome-icon', FontAwesomeIcon);
        app.component('FontAwesomeIcon', FontAwesomeIcon);
    },
    progress: {
        color: '#A388A9',
    },
});

