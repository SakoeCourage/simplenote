<template>
    <nav class="
      
     
      inline-block
      justify-start
      items-center
      text-sm
      rounded-md
      mb-2
      ml-2
    ">
        <span class="
        rounded-lg
        text-sm
        border
        inline-flex
        gap-2
        text-gray-600
        items-center
      ">
            <span class="order-2 text-gray-500 px-3 font-bold leading-10">{{ CurrentItems }} notes</span>
            <button @click="handleSwitchitems()" class="order-3 border-2 p-2 px-3 rounded-r-md">
                <font-awesome-icon icon="chevron-right" />
            </button>
            <button @click="handleSwitchitems()" class="border-2 p-2 px-3 rounded-l-md">
                <font-awesome-icon icon="chevron-left" />
            </button>
        </span>
        <span class="overflow-hidden ">
            <ul class="mt-5 flex gap-5 text-sm text-gray-500 ">

                <li class=" py-1 opacity-60" :class="{'active': CurrentFilter=='desc'}"><inertia-link :href="CurrentRoute()" method="get" :data="{sort: 'desc' ,search: $page.props.filters.search}">Recent</inertia-link></li>
                <li class=" py-1 opacity-60" :class="{'active': CurrentFilter=='asc'}"><inertia-link :href="CurrentRoute()" method="get" :data="{sort: 'asc',search: $page.props.filters.search}">Old</inertia-link></li>
             

            </ul>

        </span>

    </nav>
</template>
<script setup>
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import { computed, onMounted, ref } from "vue";

let CurrentItems = computed(() => usePage().props.value.currentItems);

let CurrentFilter = computed(()=>usePage().props.value.filters?.sort)

let CurrentRoute = ()=>location.href

let handleSwitchitems = () => {
    if (CurrentItems.value == "All") {
        Inertia.post(String(CurrentRoute()), {
            user_id: usePage().props.value.auth.user?.id ?? null,
        });
    } else {
        Inertia.get("/");
    }
};

onMounted(()=>{

    
})

</script>



<style scoped>


    .active{
        position: relative;
        opacity: unset;



    }

    .active::before{
        content: "";
        position: absolute;
        margin-top: 1rem;
        bottom: 0;
        right: 0;
        height: 1rem;
        
        width: 50%;
        background-color:#94a3b8;
        height: 1px;
    }
</style>