<template>
    <div>
        
<div ref="postcard"   class=" shadow-lg rounded-2xl min-h-max  bg-white w-64 h-64 m-auto p-2 postcard relative overflow-hidden flex items-end transform hover:scale-105 transition-transform duration-150 ease-linear ">
    <nav @click="getNotedata(slug)"  class="absolute inset-0 bg-gray-100/10 hover:bg-transparent transition-all duration-150 ease-linear" ></nav>
    <div class="w-full">
      <nav class=" w-full  flex justify-between  items-center">
          <nav class=" font-bold p-2 bg-gray-50 w-max rounded-lg text-sm text-gray-700 flex items-center gap-1">
        <font-awesome-icon icon="user" class=" text-xs  "/><span>{{author ?? 'Sk Jaykey' }}</span>
    </nav>
    <inertia-link v-if="canEdit" :href="'/post/edit/'+slug" class="z-10 hover:bg-blue-600 px-2 rounded-md ">
        
        <font-awesome-icon icon="edit" class="text-gray-50 "  />
    </inertia-link>
    
      </nav>
    <nav class=" bg-gray-800/50 text-gray-100 p-2 mt-2 rounded-md  ">
     {{ caption }}

    </nav>
    </div>

</div>


    </div>
</template>
<script setup>
    import { Inertia } from '@inertiajs/inertia';
    import { defineProps,onMounted,ref, watch } from 'vue';
    let postcard = ref('postcard')
    let props = defineProps({
            author:String,
            caption:String,
            slug:String,
            image:String,
            canEdit:Boolean
            
    });

 
    let getNotedata = (slug) =>{
         Inertia.visit(`/${slug}/view`,{
      // only:['noteDetails']
      preserveScroll: true,
      
    })

    }
    

    

    watch(()=>props.image ,(value)=>{
         console.log(value)
            // postcard.value.style.backgroundImage = `url(${value})`

    })

    onMounted(()=>{
        // console.log(postcard.value)
          postcard.value.style.backgroundImage = `url(${props.image})`
    })

</script>


<style scoped>

    .postcard{
        background-image: url('https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="adidas" class="w-32 p-4 h-36 m-auto');
        background-size:cover;
        

    }

</style>


