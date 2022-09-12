<template>
    <div>
    <section>

        <p>Name : Amount</p>
        <!-- <p v-for="(user, i) in users" :key="i"  >{{ user.id }} : {{ checkNumber(i) }}  </p> -->

        

    </section>                    
    </div>

</template>

<script setup>
import {defineProps, nextTick, onMounted, watch} from 'vue';



let props = defineProps({ users:Object })

// let filterEven =props.users.filter((item)=>{
//     return item.id % 2 == 0
// })

let checkNumber = (i) =>{

    if(i == 0 ){
        return "you are first"
    }else{
        return "you are not first"
    }
}

watch(()=>props.users,(value)=>{
    console.log("hello")

})


onMounted(()=>{ 
    // props.users.forEach((item)=>{
    //     console.log(item)
    // })
        console.log(props.users)
})
    
</script>
