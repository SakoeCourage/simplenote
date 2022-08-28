<template>

  <Backdrop class="flex items-center justify-center shadow-md ">  
        <Modal> 
            <div class="flex flex-col h-full rounded-t-md ">
              <div class=" basis-[30%] rounded-sm setbg relative" style=" background-image : url('https://source.unsplash.com/collection/928423/480x480')"> 
                <inertia-link href="/" as="button" preserve-scroll class="absolute top-1 right-2"><font-awesome-icon icon="close" class=""/></inertia-link>
              </div>
              <div class="grow p-5 overflow-y-scroll scrollbar ">
                <nav class=" text-gray-500 flex items-center text-sm "> <font-awesome-icon icon="user" size="sm" class="mr-2"/> <span>author name</span></nav>
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
    import {defineProps, onMounted} from 'vue'
    let props = defineProps({data:Object})

    onMounted(()=>console.log(props.data))
    

</script>


<style>
.setbg{
  background-size: 100% 100% ;
  background-repeat: no-repeat;


}

.scrollbar::-webkit-scrollbar{

        width: 4px;

}

</style>