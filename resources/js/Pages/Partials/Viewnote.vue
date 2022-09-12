<template>

  <Backdrop class="flex items-center justify-center shadow-md ">  
        <Modal> 
            <div class="flex flex-col h-full rounded-t-md ">
              <div ref="imageHead" class=" basis-[30%] rounded-t-md setbg relative" > 
                <nav v-if="isLoading" class=" bg-gray-500/60 absolute inset-0 animate-pulse"></nav>
                <button @click="$emit('resetSlug')" as="button" preserve-scroll class="absolute top-1 right-2 text-white  px-2 py-1 rounded-full"><font-awesome-icon icon="close" class=""/></button>
                <div v-if="c_canEdit">
                <inertia-link 
                 
                  as="button" 
                  :href="'/archive/removefromArchive/'+id"
                  method="post"
                  v-if="c_noteDetails.isArchive"
                 class="bg-gray-300/50 text-sm text-gray-500 px-2 rounded-md absolute bottom-1 right-1 flex items-center justify-between gap-2"><font-awesome-icon icon="box-archive" size="xs" />  <span>remove</span> </inertia-link >
                <inertia-link as="button" 
                 
                  :href="'/archive/marksAsArchive/'+id"
                  method="post"
                  v-if="!c_noteDetails.isArchive"
                 class="bg-gray-300/50 text-sm text-gray-500 px-2 rounded-md absolute bottom-1 right-1 flex items-center justify-between gap-2"><font-awesome-icon icon="box-archive" size="xs" />  <span>archive</span> </inertia-link >
                </div>
                </div>
              <div class="grow p-5 overflow-y-scroll scrollbar ">
                <nav v-if="!isLoading" class=" text-gray-500 flex items-center text-sm "> <font-awesome-icon icon="user" size="sm" class="mr-2"/> <span>{{c_noteDetails?.user.name }}</span></nav>
                <nav v-if="isLoading" class=" bg-gray-500/20 rounded-lg animate-pulse flex items-center text-sm ">  <span>&nbsp;</span></nav>
                <nav v-if="!isLoading" class="w-full my-2 inline-block text-gray-700 leading-normal  font-semibold text-lg">{{ c_noteDetails?.caption }}</nav>
                <nav v-if="isLoading" class="w-2/3 my-2 inline-block bg-gray-500/20 leading-normal  font-semibold text-lg rounded-lg">&nbsp;</nav>
                <nav v-if="!isLoading" class="text-sm text-gray-500 trix-editor" v-html="c_noteDetails?.body" >
                 
                 
                </nav>
                <nav v-if="isLoading" class=" bg-gray-500/20 rounded-lg animate-pulse flex items-center text-sm  mb-2">  <span>&nbsp;</span></nav>
                <nav v-if="isLoading" class=" bg-gray-500/20 rounded-lg animate-pulse flex items-center text-sm  mb-2">  <span>&nbsp;</span></nav>
                <nav v-if="isLoading" class=" bg-gray-500/20 rounded-lg animate-pulse flex items-center text-sm ">  <span>&nbsp;</span></nav>

    
                



              </div>

            </div>
        </Modal>

  </Backdrop >

</template>

<script setup>

    import Backdrop from '../../components/Backdrop.vue';
    import Modal from '../../components/Modal.vue';
    import { Inertia } from '@inertiajs/inertia'
    import {defineProps, onMounted,ref,defineEmits} from 'vue'
    import axios from 'axios'
    let props = defineProps({slug:String})
   
    
    let isLoading = ref(true)
    let imageHead = ref(null)
    let id = ref(null)
    let c_noteDetails = ref(null)
    let c_canEdit = ref(false)
    
   let setBgImage = () =>{
        let imageUrl = c_noteDetails.value.image
      
        imageHead.value.style.backgroundColor = `${imageUrl}`


   }



  let getNotedata = ()=>{
    isLoading.value = true
  axios.get(`/${props.slug}/json`).then((res)=>{
    const {canEdit , noteDetails} =  res.data
    c_noteDetails.value = noteDetails
    c_canEdit.value = canEdit
    id.value = noteDetails.id 
    setBgImage()
    isLoading.value = false
  }).catch(err=>{
    console.log(err)
    isLoading.value = false
  })
 
};


   onMounted(()=>{
        getNotedata()
  
       
        

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