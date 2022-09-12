<template>
    <div class=" py-5  w-max h-max  md:h-screen  ">
        <ul class=" text-gray-500 space-y-4 w-full">
            <li  :class="{'active': $page.url == '/' }" class=" flex gap-4 items-center  px-5 w-full py-1">
               <font-awesome-icon icon="list-ul" />
               <inertia-link href="/">All notes </inertia-link>

            </li>
            <li :class="{'active': $page.url == '/create' }" class=" flex gap-4 items-center px-5 w-full py-1">
               <font-awesome-icon icon="pen-to-square" />
               <inertia-link  href="/create">Add note</inertia-link>

            </li>
            <li :class="{'active': $page.url == '/archive' }" class=" flex gap-4 items-center px-5 w-full py-1">
               <font-awesome-icon icon="file-zipper" />
               <inertia-link   href="/archive">Archive</inertia-link>

            </li>
            <li :class="{'active': $page.url == '/trash' }"  class=" flex gap-4 items-center px-5 w-full py-1">
               <font-awesome-icon icon="trash-can" />
               <inertia-link href="/trash ">Trash</inertia-link>

            </li>


        </ul>

    </div>
</template>

<script setup>




</script>

<style scoped>
   .active{
      /* background-color: #155e75;
      color: white; */
      @apply text-blue-400 border-y-2 relative border-x-2

   }

   .active::before{
      /* content: '';
 
      @apply bg-blue-300;
      position: absolute;
      right: 0;
      top: 0;
      bottom: 0;
      width: 0.2rem; */

   }




</style>