<template>
    
<div>

    
    <nav class="bg-white  shadow z-20 ">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex items-center justify-between h-16">
                <div class=" flex items-center">
                 
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <inertia-link :class="{ 'text-gray-800': $page.component == 'Home' }" class="text-gray-300  hover:text-gray-800  px-3 py-2 rounded-md text-sm md:text-lg font-medium" href="/">
                                Home
                            </inertia-link>
                            <inertia-link :class="{ 'text-gray-800': $page.component == 'Post' }" class="  hover:text-gray-800  text-gray-300 px-3 py-2 rounded-md text-sm md:text-lg font-medium" href="/post">
                                Post 
                            </inertia-link>
                        
                        </div>
                        <div>{{ authUser }}</div>
                    </div>
                </div>
                <div class="block z-20">
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="ml-3 relative">
                            <div class="relative inline-block text-left">
                                <div>
                                    <button @click="showdrop=!showdrop" type="button" class="hidden  md:flex items-center justify-center w-full rounded-md  px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-gray-500" id="options-menu">
                                        <svg width="20" fill="currentColor" height="20" class="text-gray-800" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1523 1339q-22-155-87.5-257.5t-184.5-118.5q-67 74-159.5 115.5t-195.5 41.5-195.5-41.5-159.5-115.5q-119 16-184.5 118.5t-87.5 257.5q106 150 271 237.5t356 87.5 356-87.5 271-237.5zm-243-699q0-159-112.5-271.5t-271.5-112.5-271.5 112.5-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5zm512 256q0 182-71 347.5t-190.5 286-285.5 191.5-349 71q-182 0-348-71t-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <div v-if="showdrop" class="hidden md:block origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white  ring-1 ring-black ring-opacity-5">
                                    <div class="py-1 " role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <a href="#" class="block  px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                            <span class="flex flex-col">
                                                <span>
                                                    Settings
                                                </span>
                                            </span>
                                        </a>
                                        <a href="#" class="block  px-4 py-2 text-md text-gray-700" role="menuitem">
                                            <span class="flex flex-col">
                                                <inertia-link v-if="authUser" href="/logout" method="post"> Logout </inertia-link>

                                                <inertia-link href="/login" v-else >
                                                   login
                                                </inertia-link>

                                            </span>
                                        </a>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <button @click="showdrop=!showdrop" class="text-gray-800  hover:text-gray-300 inline-flex items-center justify-center p-2 rounded-md focus:outline-none">
                        <svg width="20" height="20" fill="currentColor" class="h-8 w-8" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="md:hidden " v-if="showdrop">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <inertia-link :class="{ 'text-gray-800': $page.url === '/' }" class="text-gray-300 hover:text-gray-800  px-3 py-2 rounded-md text-base font-medium" href="/">
                    Home
                </inertia-link>
                <inertia-link :class="{ 'text-gray-800': $page.url === '/post' }"  class=" text gray-300 block px-3 py-2 rounded-md text-base font-medium" href="/post">
                    Post 
                </inertia-link>
              
            </div>
        </div>
    </nav>
</div>



</template>
<script setup>
import { computed,ref,defineProps } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

let showdrop = ref(false)

 const authUser = computed(()=> usePage().props.value.auth.user)







</script>




