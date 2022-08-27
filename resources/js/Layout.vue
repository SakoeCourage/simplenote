<template>
    <section>
        <div>
            <Header />
            
        <section class="max-w-7xl mx-auto px-8"> 
            <slot />

        </section>
           
        </div>

    </section>


</template>

<script setup>
import {defineComponent} from 'vue'

import Header from "./components/Header.vue"




</script>