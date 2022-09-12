<template>
  <div>
    <div
      ref="postcard"
      class="
        shadow-lg
        rounded-2xl
        min-h-max
        w-64
        h-64
        m-auto
        p-2
        postcard
        relative
        overflow-hidden
        flex
        items-end
        transform
        hover:scale-105
        transition-transform
        duration-150
        ease-linear
      "
    >
      <nav
        @click="$emit('getNotedata',slug)"
        class="
          absolute
          inset-0
          bg-gray-100/20
          hover:bg-transparent
          transition-all
          duration-150
          ease-linear
        "
      ></nav>
      <nav
        class="
          absolute
          top-2
          right-2
          text-gray-500
          flex
          items-center
          gap-1
          text-xs
        "
      >
        <font-awesome-icon icon="clock" />
        <span>{{ getDate().diffForHumans }}</span>
      </nav>

      <div class="w-full">
        <nav class="w-full flex justify-between items-center">
          <nav
            class="
              p-2
              bg-gray-50/30
              w-max
              rounded-lg
              text-sm text-gray-600
              flex
              items-center
              gap-1
            "
          >
            <font-awesome-icon icon="user" class="text-xs" /><span>{{
              author ?? "Sk Jaykey"
            }}</span>
          </nav>
          <inertia-link
            v-if="canEdit"
            :href="'/post/edit/' + slug"
            class="z-10 hover:bg-blue-400 px-2 rounded-md"
          >
            <font-awesome-icon icon="edit" class="text-gray-50" />
          </inertia-link>
        </nav>
        <nav class="bg-gray-800/50 text-gray-100 p-2 mt-2 rounded-md">
          {{ caption }}
        </nav>
      </div>
    </div>
  </div>
</template>
<script setup>
import { Inertia } from "@inertiajs/inertia";
import { defineProps, onMounted, ref, watch } from "vue";
import moment from "moment";
import axios from 'axios'

let postcard = ref("postcard");
let defaultBg = "rgba(107, 114, 128, 0.4)";

let props = defineProps({
  author: String,
  caption: String,
  slug: String,
  image: String,
  canEdit: Boolean,
  created_at: String,
});

// let getNotedata = (slug) => {
//   Inertia.visit(`/${slug}/view`, {
//     only: ["noteDetails"],
//     preserveScroll: true,
//   });
// };
// let getNotedata = (slug) => {
//   axios.get(`/${slug}/json`).then((res)=>{
//     console.log(res.data)
//   }).catch(err=>{
//     console.log(err.response.data.error)
//   })
 
// };

let getDate = () => {
  let currDate = moment(props.created_at);
  return {
    diffForHumans: currDate.fromNow(),
    Date: currDate.format("l"),
  };
};

let setBackgroundColor = () => {
  postcard.value.style.backgroundColor =
    String(props.image) ?? String(defaultBg);
};

onMounted(() => {
  setBackgroundColor();
});
</script>


<style scoped>
.postcard {
  /* background-image: url('https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="adidas" class="w-32 p-4 h-36 m-auto'); */
}
</style>


