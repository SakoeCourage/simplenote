<template>

  <Backdrop class="flex items-center justify-center shadow-md ">  
        <Modal> 
            <div class="flex flex-col h-full rounded-t-md ">
              <div ref="imageHead" class=" basis-[30%] rounded-t-md setbg relative" > 
                <inertia-link @click="navigateback()" as="button" preserve-scroll class="absolute top-1 right-2 text-white  px-2 py-1 rounded-full"><font-awesome-icon icon="close" class=""/></inertia-link>
                <div v-if="canEdit">
                <inertia-link 
                  v-if="props.data[0].isArchive"
                  as="button" 
                  :href="'/archive/removefromArchive/'+id"
                  method="post"
                  
                 class="bg-gray-300/50 text-sm text-gray-500 px-2 rounded-md absolute bottom-1 right-1 flex items-center justify-between gap-2"><font-awesome-icon icon="box-archive" size="xs" />  <span>remove</span> </inertia-link >
                <inertia-link as="button" 
                   v-if="!props.data[0].isArchive"
                  :href="'/archive/marksAsArchive/'+id"
                  method="post"
                  
                 class="bg-gray-300/50 text-sm text-gray-500 px-2 rounded-md absolute bottom-1 right-1 flex items-center justify-between gap-2"><font-awesome-icon icon="box-archive" size="xs" />  <span>archive</span> </inertia-link >
                </div>
                </div>
              <div class="grow p-5 overflow-y-scroll scrollbar ">
                <nav class=" text-gray-500 flex items-center text-sm "> <font-awesome-icon icon="user" size="sm" class="mr-2"/> <span>{{ data[0].user.name }}</span></nav>
                <nav class="w-full my-2 inline-block text-gray-700 leading-normal  font-semibold text-lg">{{ data[0].caption }}</nav>
                <nav class="text-sm text-gray-500 trix-editor" v-html="data[0].body">
                 
                 
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
    let props = defineProps({data:Object, canEdit:Boolean})
    let imageHead = ref(null)
    let id = props.data[0].id

    
   let setBgImage = () =>{
        let imageUrl = props.data[0].image
        imageHead.value.style.backgroundColor = `${imageUrl}`


   }

   let navigateback = () =>{
    history.back();
    return false;

   }


   onMounted(()=>{
        setBgImage()
        
        console.log(Boolean(props.data[0].isArchive))
        

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

.trix-editor ul {

list-style-type: disc !important;
    margin-left: 1rem !important;
}

 .trix-editor ol {
    list-style-type: decimal !important;
    margin-left: 1rem !important;
}


</style>