<template>
<section class="">
    <div>
        <Header ref="header" />

        <section class="max-w-8xl mx-auto  section flex  ">

            <div class="basis-0 opacity-0 md:opacity-100 md:basis-[15%] relative">
                <Sidebar class="fixed overflow-hidden" />
            </div>

            <div class=" flex-grow bg-gray-200/50  ">
                <div class=" p-10">
                    <slot />
                </div>
            </div>

        </section>

    </div>
    <!-- flash message -->
    <Flashmessage />
   
</section>
</template>

<script setup>
import {computed,nextTick,onMounted,watch,ref} from 'vue'
import { usePage} from '@inertiajs/inertia-vue3';

import Sidebar from './components/Sidebar.vue';

import Header from "./components/Header.vue"
import Flashmessage from "./components/Flashmessage.vue"

let excepts = ["Login", "Signup"]



let currentPage = computed(() => usePage().component.value)

let ShowHeader = computed(() => excepts.includes(currentPage.value))

let scrollHeight = nextTick(() => document.querySelector('#header').scrollHeight)

let setMargin = async () => {
    let heightValue = await scrollHeight
    document.querySelector('.section').style.marginTop = `${heightValue+5}px`

}


onMounted(() => {
    setMargin()

    

})
</script>




