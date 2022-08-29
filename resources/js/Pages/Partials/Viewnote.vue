<template>

  <Backdrop class="flex items-center justify-center shadow-md ">  
        <Modal> 
            <div class="flex flex-col h-full rounded-t-md ">
              <div ref="imageHead" class=" basis-[30%] rounded-sm setbg relative" > 
                <inertia-link href="/" as="button" preserve-scroll class="absolute top-1 right-2 text-white bg-gray-600 px-2  rounded-full"><font-awesome-icon icon="close" class=""/></inertia-link>
              </div>
              <div class="grow p-5 overflow-y-scroll scrollbar ">
                <nav class=" text-gray-500 flex items-center text-sm "> <font-awesome-icon icon="user" size="sm" class="mr-2"/> <span>{{ data[0].user.name }}</span></nav>
                <nav class="w-full my-2 inline-block text-gray-700 leading-normal  font-semibold text-lg">{{ data[0].caption }}</nav>
                <nav class="text-sm text-gray-500">
                 
                  {{ data[0].body }}
                </nav>
    
                



              </div>

            </div>
        </Modal>

  </Backdrop >

</template>

<script setup>

    import Backdrop from '../../components/Backdrop.vue';
    import Modal from '../../components/Modal.vue';
    import { Inertia } from '@inertiajs/inertia'
    import {defineProps, onMounted,ref} from 'vue'
    let props = defineProps({data:Object})
    let imageHead = ref(null)

    
   let setBgImage = () =>{
        let imageUrl = props.data[0].image
        imageHead.value.style.backgroundImage = `url(${imageUrl})`


   }

   onMounted(()=>{
        setBgImage()

   })

   
    

</script>


<style>
.setbg{
  background-size:cover ;
  background-repeat: no-repeat;


}

.scrollbar::-webkit-scrollbar{

        width: 4px;

}

</style>