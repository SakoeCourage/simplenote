<template>

    <div ref="main" class="main isolate relative  bg-no-repeat bg-inherit transition-[background-image] ease-linear duration-500 ">
        
            
            <form @submit.prevent="fxnSubmitform" class="mx-auto flex w-full max-w-sm space-x-3 ">
 <div ref="notecard" class="bg-gray-100/40 relative transition-[background-image] ease-linear duration-500  object-cover w-full max-w-2xl  m-auto mt-10 bg-white rounded-lg shadow border-2 ">
      
       
  

       <div  class=" applybg text-xl px-4 rounded-t-lg bg-gray-100/80 h-20 relative font-light text-center text-gray-500  w-full  mx-auto transition-[Background-color] duration-1000 ease-in-out ">
                  <nav class="  absolute bottom-2 inset-x-0 px-2 flex w-full justify-center">
                   
                    <span class="text-white"><font-awesome-icon icon="pen-to-square" size="xs" /> <span>new note</span></span>
                  </nav>  
        </div>
        <div class="grid max-w-xl grid-cols-2 gap-4 m-auto px-5 py-10">
            
                <div class="col-span-2 lg:col-span-2">
                    <div class=" relative ">
                        <input type="text" v-model="formData.caption"  class=" rounded-lg border flex-1 appearance-none  border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent" placeholder="caption"/>
                        </div>
                        <div class="text-red-400 text-sm pl-2  mt-1"> {{ errors.caption }}</div>
                    </div>
                    <div> </div>
                    <div class="col-span-2">
                            <TrixEditor @get-noteBody="setnoteBody"/>
                           
                 <div class="text-red-400 text-sm pl-2  mt-1">{{ errors.body }}</div>
                           
                        <nav class=" flex gap-2 text-gray-500 text-md">
                            <nav class="inline mr-2">Color tag:</nav>
                            <nav class="inline "><Colorpalette @changeBackgroundColor="setBackgroundColor" /></nav>
                        </nav>

                    </div>
                    <div class="col-span-2 text-right">
                        <button  type="submit" class=" applybg py-2 px-4  bg-[#6b728066] hover:bg-blue-700  text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md   rounded-lg ">
                            Send
                        </button>
                    </div>
                </div>
            </div>
        </form>


    </div>




</template>
<script setup>
import Colorpalette from '../components/Colorpalette.vue'
import { onMounted,ref, watch,defineProps} from 'vue'
import TrixEditor from '../components/TrixEditor.vue'
import { useForm} from '@inertiajs/inertia-vue3'
import { Inertia} from '@inertiajs/inertia'





let notecard = ref(null)
let bgisLoading = ref(false)
let main = ref(null)
let bgHead = ref(null)



let props = defineProps({
    errors:Object

})




let formData = useForm({
    caption : '',
    image:  '#6b728066' ,
    body: ''
    
});

let setBackgroundColor = (color)=>{
  
    document.querySelectorAll('.applybg').forEach(item => {
       item.style.backgroundColor = String(color)
        
    });
    formData.image = String(color)


}

let setnoteBody =(data)=>{
    formData.body = data
    
}


watch(()=>props.errors,(value)=>console.log(value))






let fxnSubmitform = () =>{
    Inertia.post('/post/create',formData) 

}




onMounted(()=>{

})








</script>

<style  scoped>

.main{
    background-size: 100% 100%;
   

}

</style>

