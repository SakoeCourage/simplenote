<template>
<div>
   
  <div class="">
    <nav class="px-8  mt-1 flex justify-end"><span class="py-2 px-5 rounded-full border-gray-400 border-2 inline-flex gap-2 text-gray-700"><span>Showing all items</span><span><font-awesome-icon icon="chevron-right"/></span></span></nav>

    <div class="mt-2 grid grid-cols-4 gap-y-6 ">
       <Postitem v-for="(post,i) in post.data" :key="i"
        :image="post.image"
        :caption="post.caption"
        :canEdit="post.canEdit"
        :slug="post.slug"
        :author="post.author"

       />
       <Postitem/>

    </div>



</div>


</div>




</template>
<script setup>

import Header from '../components/Header.vue';
import Postitem from '../components/Postitem.vue';

import {defineComponent,defineProps} from 'vue'
 defineComponent(['Header','Postitem'])


  let props = defineProps({post:Object})

  console.log(props.post)
</script>