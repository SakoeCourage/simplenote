import { createApp, h } from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3'
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome"
import { library } from "@fortawesome/fontawesome-svg-core"
import { faChevronRight, faUser, faKey, faEdit, faTrash,faClose } from "@fortawesome/free-solid-svg-icons"
import Layout from "./Layout.vue"

library.add(faChevronRight, faUser, faKey, faEdit, faTrash,faClose)



InertiaProgress.init()

createInertiaApp({
    resolve: async name => {
        let page = await
        import (`./Pages/${name}.vue`)

        if (page.default.layout === undefined) {
            page.default.layout = Layout;
        }

        if (page.default.props?.layout === null) {
            page.default.layout = undefined;
        }
        // console.log(page.default)

        return page;

    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("inertia-link", Link)
            .component("font-awesome-icon", FontAwesomeIcon)
            .mount(el)
    },
})