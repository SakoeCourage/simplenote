<template>
<section class="">
    <div>
        <Header ref="header" @showMenu="showSidebar" />

        <section class="max-w-8xl mx-auto  section flex  ">

            <div v-if="toggleMenu" class="block md:hidden basis-0  md:opacity-100 sm:w-[100%]    md:basis-[15%] relative bg-white">
                <Sidebar class="fixed overflow-hidden m-0 z-20 w-[100%] md:w-[15%]  bg-white " />
            </div>
            <div class="hidden md:block basis-0  md:opacity-100 sm:w-[100%]    md:basis-[15%] relative bg-white">
                <Sidebar class="fixed overflow-hidden m-0 z-20 w-[100%] md:w-[15%]  bg-white " />
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
let toggleMenu = ref(false);


let currentPage = computed(() => usePage().component.value)

let ShowHeader = computed(() => excepts.includes(currentPage.value))

let showSidebar = () =>{
    toggleMenu.value= !toggleMenu.value;
   

}


let scrollHeight = nextTick(() => document.querySelector('#header').scrollHeight)

let setMargin = async () => {
    let heightValue = await scrollHeight
    document.querySelector('.section').style.marginTop = `${heightValue}px`

}


onMounted(() => {
    setMargin()

    

})
</script>




