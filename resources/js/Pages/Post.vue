<template>

    <div ref="main" class="main isolate relative bg-blue-500 h-screen bg-no-repeat bg-inherit transition-[background-image] ease-linear duration-500 ">
         <nav class=" absolute z-[-1] inset-0 bg-gray-500/40 "></nav>
            
<form @submit.prevent="fxnSubmitform" class="mx-auto flex w-full max-w-sm space-x-3 ">
    <div ref="notecard" class="bg-gray-100/40 relative transition-[background-image] ease-linear duration-500  object-cover w-full max-w-2xl px-5 py-10 m-auto mt-10 bg-white rounded-lg shadow border-2 ">
      
       
       <button @click.prevent="getRandomimage" class="absolute top-1 right-1" v-if="!bgisLoading">
            <nav class="bg-gray-100 text-gray-400 px-2 shadow-lg rounded-md">change Background</nav>
        </button>
        <div role="status">
           
           <!-- spinner -->
    <svg aria-hidden="true" v-if="bgisLoading" class=" absolute top-1 right-1 mr-2 w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    <span class="sr-only">Loading...</span>
</div>

       <div class="mb-6 text-3xl px-4 rounded-lg bg-gray-50  font-light text-center text-gray-500 border w-max  mx-auto ">
            New Note
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

import { onMounted,ref, watch,defineProps} from 'vue'
import axios from 'axios';
import { useForm} from '@inertiajs/inertia-vue3'
import { Inertia} from '@inertiajs/inertia'



let randimage = ref(null)
let notecard = ref(null)
let bgisLoading = ref(false)
let main = ref(null)


let props = defineProps({
    errors:Object

})



let formData = useForm({
    caption : '',
    image:  'https://source.unsplash.com/collection/928423/480x480' ,
    body: ''

});


watch(()=>props.errors,(value)=>console.log(value))





let getRandomimage = async() =>{
        bgisLoading.value = true
       

        try {
        let image = await axios({
        method:'get',
        url:'https://source.unsplash.com/collection/928423/480x480',
        responseType: 'blob'
            })
         let  curimage =  image?.request.responseURL
           curimage && (randimage.value = curimage)
        curimage && (bgisLoading.value = false)
            
        } catch (error) {
            console.log(error)
            bgisLoading.value = false
        }    

}

let fxnSubmitform = () =>{
    Inertia.post('/post/create',formData) 

}


watch(randimage, (value )=>{
    formData.image = value
    // notecard.value.style.backgroundImage = `url(${value})`
    main.value.style.backgroundImage = `url(${value})`
    

})

onMounted(()=>{
getRandomimage()

})








</script>

<style  scoped>

.main{
    background-size: 100% 100%;
   

}

</style>

