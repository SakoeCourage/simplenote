import { createApp, h } from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3'
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome"
import { library } from "@fortawesome/fontawesome-svg-core"
import { faChevronRight, faUser, faKey, faEdit, faTrash, faClose, faChevronLeft, faPenToSquare, faFileZipper, faTrashCan, faMagnifyingGlass, faClock, faPalette,faCheck,faBoxArchive,faListUl,faCircleInfo } from "@fortawesome/free-solid-svg-icons"
import Layout from "./Layout.vue"
library.add(faChevronRight, faUser, faKey, faEdit, faTrash, faClose, faChevronLeft, faPenToSquare, faFileZipper, faTrashCan, faMagnifyingGlass, faClock, faPalette,faCheck,faBoxArchive,faListUl,faCircleInfo)



InertiaProgress.init()

createInertiaApp({
    resolve: async name => {
        let exceptLayout = ['Login','Signup']
        const comps =import.meta.glob('./Pages/**/*.vue');
        const match = comps[`./Pages/${name}.vue`];
        const page = (await match()).default
        
        if(!exceptLayout.includes(String(page.__name)))
        {page.layout??=Layout;
        }

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