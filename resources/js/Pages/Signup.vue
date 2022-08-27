<template>
<div class="">

{{ errors }}
     
    <div class=" grid place-items-center h-screen">

     <form @submit.prevent="fxnSignup" class=" border-2 border-gray-200 rounded-md p-5 sm:w-full md:w-2/5">
        <label for="" class="text-gray-500 inline-block my-5">Sign In Here or <inertia-link href="/login" class="text-gray-500 underline font-semibold"> sign in</inertia-link></label>
    <div class="flex relative mb-4">
    <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
        <font-awesome-icon icon="user" />
    </span>
    <input v-model="formData.name" type="text" id="email-with-icon" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent" name="email" placeholder="name"/>
    </div>
    <div class="flex relative ">
    <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
        <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
            <path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z">
            </path>
        </svg>
    </span>
    <input v-model="formData.email" type="text" id="email-with-icon" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent" name="email" placeholder="Your email"/>
    </div>
    <div class="flex relative mt-5 ">
    <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
        <font-awesome-icon icon="key" />
    </span>
    <input v-model="formData.password" type="password" id="passord-with-icon" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent" name="password" placeholder="Your password"/>
    </div>
    <div class="flex relative mt-5 ">
    <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
        <font-awesome-icon icon="key" />
    </span>
    <input v-model="formData.password_confirmation" type="password" id="passord-with-icon" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent" name="password_confirm" placeholder="confirm password"/>
    </div>

        <nav class="w-full flex justify-end">
            <button type="submit" class=" px-4 py-2 rounded-sm bg-gray-400 mt-5 text-gray-50 hover:bg-gray-500 ">sign in</button>
        </nav>
        </form>

</div>
</div>

    


</template>

<script setup >
import {useForm} from "@inertiajs/inertia-vue3"
import {Inertia} from '@inertiajs/inertia'
import { defineProps} from "vue";


let props = defineProps({
    errors: Object

})

let formData = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null


})


let fxnSignup = () =>{
   Inertia.post('/register', formData)


}


</script>