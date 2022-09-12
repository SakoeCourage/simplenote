<template>



        <nav id="header"
            class="  bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 ">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <inertia-link href="/" class="flex items-center">
                    
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white border p-1 px-2 rounded-md bg-blue-500 text-gray-50">Note</span>
                </inertia-link >
                <div class="flex md:order-2">
                    <button type="button"
                        class="text-white flex  ring-2 focus:outline-none focus:ring-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 ">
                            <nav class=" text-gray-600 mr-2">{{ $page.props.auth.user?.name }}</nav>
                            <svg width="20" fill="currentColor" height="20" class="text-gray-800" viewBox="0 0 1792 1792"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1523 1339q-22-155-87.5-257.5t-184.5-118.5q-67 74-159.5 115.5t-195.5 41.5-195.5-41.5-159.5-115.5q-119 16-184.5 118.5t-87.5 257.5q106 150 271 237.5t356 87.5 356-87.5 271-237.5zm-243-699q0-159-112.5-271.5t-271.5-112.5-271.5 112.5-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5zm512 256q0 182-71 347.5t-190.5 286-285.5 191.5-349 71q-182 0-348-71t-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                            </path>
                        </svg></button>
                    <button data-collapse-toggle="navbar-sticky" @click="$emit('showMenu')" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div  class="  justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
     
                    <Searchbar />

                </div>
            </div>
        </nav>




</template>
<script setup>
import { computed, ref, defineProps, onMounted, watch } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import Searchbar from './Searchbar.vue'

let showdrop = ref(false)

const authUser = computed(() => usePage().props.value.auth.user)

let getCurrentPageComponent = computed(() => Inertia.page.component);








</script>

<style scoped>
.active {
    @apply md:text-blue-700 md:bg-white text-gray-50 bg-blue-500 dark:md:bg-blue-100 
}
</style>




