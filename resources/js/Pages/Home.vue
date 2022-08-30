<template>
<div>
   
  <div class=" relative">
    
   
    <nav class="px-8  mt-1 flex justify-end"><span class="py-2 px-5 rounded-full border-gray-400 text-sm border-2 inline-flex gap-2 text-gray-700"><span>Showing all items</span><span><font-awesome-icon icon="chevron-right"/></span></span></nav>
       <div class="w-full text-center text-gray-500" v-if="post.data == 0"><span>no post found </span> <inertia-link href="/post" class="bg-blue-100  py-1 px-2 rounded-md text-blue-500 ">add</inertia-link ></div>
    <div class="mt-2 grid lg:grid-cols-4 gap-y-6 grid-cols-1 md:grid-cols-2 min-h-screen ">
       <Postitem v-for="(post,i) in post.data" :key="i"
        :image="post.image"
        :caption="post.caption"
        :canEdit="post.canEdit"
        :slug="post.slug"
        :author="post.author"
       

        

       />
       
 </div>
      <Viewnote  v-if="showViewnote" :data="post.data[0].noteDetails"/>







</div>


      <div class=" my-5 flex gap-4  justify-center">
          <inertia-link as="button" v-for="(link,i) in paginationLlinks" :key="i" v-html="link.label" class="bg-blue-400 rounded-md p-2 px-4 text-white"  v-show="link.url" :href="link.url">

          
          </inertia-link >


      </div>

</div>




</template>
<script setup>

import Header from '../components/Header.vue';
import Postitem from '../components/Postitem.vue';
import Viewnote from './Partials/Viewnote.vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3';


import {computed, defineComponent,defineProps,onMounted, watch,ref} from 'vue'

 defineComponent(['Header','Postitem'])

 let paginationLlinks = ref(null)
 


  let props = defineProps({post:Object})


  
  let showViewnote = computed(()=> props.post.data.some(item => item.noteDetails != 0) )
 
  onMounted(()=>{
     paginationLlinks.value = props.post.links  
     console.log(props.post) 
    
  })


</script>

