<template>
    <div class="bg-gray-100 flex items-center p-1 px-3 rounded-md ">
        <font-awesome-icon class=" text-gray-400 mr-1" icon="magnifying-glass" />
        <input v-model="searchvalue" class=" bg-inherit py-2 grow px-2 border-none outline-none focus:border-none focus:outline-none " type="search" name="" id="" placeholder="search"/>
    </div>
</template>

<script setup>
    
import { Inertia } from "@inertiajs/inertia";
import { ref } from "@vue/reactivity";
import { computed, onMounted, watch } from "@vue/runtime-core";





import { usePage } from '@inertiajs/inertia-vue3';


    

    let searchvalue = ref(usePage().props.value.filters?.search)
    
    let sortvalue = computed(()=>usePage().props.value.filters.sort)
    let CurrentRoute = ()=> location.href.toString()

    let fxnSearch = (value) =>{
             Inertia.get(CurrentRoute(),{search: value,sort: sortvalue.value},{
                preserveState:true,
                replace: true
            })
    }


    watch(searchvalue, (value)=>{
       
  
        fxnSearch(value)

       

     
    

    })

    onMounted(()=>{
        // let routeParams = {}
        // let currnetUrl = new URL(location.href)
        // let search = currnetUrl.searchParams.keys()
        // for( const item of search){
        //     routeParams = {...routeParams, item: 'hey'}
        //     // console.log(currnetUrl.searchParams.get(String(item)))
            
        // }
        // console.log(routeParams)
     




        
    })


</script>