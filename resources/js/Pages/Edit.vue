<template>
     <div ref="main" class="main isolate relative bg-blue-500 h-screen bg-no-repeat bg-inherit transition-[background-image] ease-linear duration-500 ">
         <nav class=" absolute z-[-1] inset-0 bg-gray-500/40 "></nav>
            
<form @submit.prevent="fxnSubmit()"  class="mx-auto flex w-full max-w-sm space-x-3 ">
    <div ref="notecard" class="bg-gray-100/40 relative transition-[background-image] ease-linear duration-500  object-cover w-full max-w-2xl px-5 py-10 m-auto mt-10 bg-white rounded-lg shadow border-2 ">
      
   
           


       <div class="mb-6 text-3xl px-4 rounded-lg   font-light text-center text-gray-500  w-max  mx-auto ">
            <span class="flex gap-2">
                <span class="bg-gray-50 Edit Note px-4">Edit Note</span> 
                <button @click.prevent="deletnote()"  class="cursor-pointer"><font-awesome-icon icon="trash" size="sm" class="text-red-300 hover:text-red-400 "/></button>
            </span>
        </div>
        
        <div class="grid max-w-xl grid-cols-2 gap-4 m-auto">
            
                <div class="col-span-2 lg:col-span-2">
                    <div class=" relative ">
                        <input type="text" v-model="formData.caption"  class=" rounded-lg border flex-1 appearance-none  border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent" placeholder="caption"/>
                        </div>
                        <div class="text-red-400 text-sm pl-2 bg-gray-200/50 mt-1"> {{ errors.caption }}</div>
                    </div>
                    <div> </div>
                    <div class="col-span-2">
                        
                            <textarea v-model="formData.body" class="flex-1  border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent"  placeholder="enter details here..."  rows="5" cols="40" />
                            <div class="text-red-400 text-sm pl-2 bg-gray-200/50 mt-1">{{ errors.body }}</div>
                           
                     
                    </div>
                    <div class="col-span-2 text-right">
                        <button type="submit" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                            Send
                        </button>
                    </div>
                </div>
            </div>
        </form>


    </div>




</template>


<script setup>
    import { useForm} from '@inertiajs/inertia-vue3'
    import {defineProps, onMounted} from 'vue'
    import {Inertia} from '@inertiajs/inertia'
import axios from 'axios'

    let props = defineProps({
            errors:Object,
            Post:Object
    })


    let formData = useForm({
            caption: '',
            body: ''

    })

    let fxnSubmit = () =>{
                Inertia.post( `/post/edit/${props.Post.slug}`,formData)

    }

    let deletnote= () =>{
            Inertia.post(`/post/delete/${props.Post.id}`)

    }


        onMounted(()=>{
            let Post = props.Post
            formData.caption = Post.caption
            formData.body = Post.body
          

        })






</script>