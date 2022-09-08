<template>
    <div>
        <Transition name="slide-fade">
        <div class="flex items-center justify-between gap-2 fixed z-10 bottom-1 text-sm right-1 rounded-sm bg-black/70 px-5 text-gray-100 py-2" v-if="$page.props.flash.message">
            <font-awesome-icon icon="circle-info" />
            <span> {{ $page.props.flash.message }}</span></div>
     </Transition> 
    </div>
</template>

<script setup>

import {
    usePage
} from '@inertiajs/inertia-vue3';

import {computed,watch} from 'vue'

let flashMessage=computed(()=>usePage().props.value.flash.message)

let resetFlashMessage = () =>{
    usePage().props.value.flash.message=null
}


let toggleFlashMessage = () =>{
   
    setTimeout(()=>{
           
            resetFlashMessage()

    },2000)
}

watch(flashMessage,(value)=>{
    toggleFlashMessage()
   
  



})



</script>


<style>

    .slide-fade-enter-active {
      transition: all 0.3s ease-out;
    }
    
    .slide-fade-leave-active {
      transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
    }
    
    .slide-fade-enter-from,
    .slide-fade-leave-to {
      transform: translateY(20px);
      opacity: 0;
    }
    </style>
    