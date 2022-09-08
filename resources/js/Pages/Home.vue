<template>
  <div>
    <div class="relative">
      <Horizontalwheel />
      <div class="w-full text-center text-gray-500" v-if="post.data == 0">
        <span>no post found </span>
        <inertia-link
          href="/create"
          class="bg-blue-100 py-1 px-2 rounded-md text-blue-500"
          >add
        </inertia-link>
      </div>
      <div
        class="
          mt-2
          grid
          lg:grid-cols-4
          gap-y-6
         
          grid-cols-1
          md:grid-cols-2
          min-h-screen
        "
      >
        <Postitem
          v-for="(post, i) in post.data"
          :key="i"
          :image="post.image"
          :caption="post.caption"
          :canEdit="post.canEdit"
          :slug="post.slug"
          :author="post.author"
          :created_at="post.created_at"
        />
      </div>
      <Viewnote v-if="showViewnote" :data="props.noteDetails.noteDetails" :canEdit="props.noteDetails.canEdit" />
    </div>

    <div class="my-5 flex gap-4 justify-center">
      <inertia-link
        as="button"
        v-for="(link, i) in paginationLlinks"
        :key="i"
        v-html="link.label"
        class="bg-blue-400 rounded-md p-2 px-4 text-white"
        v-show="link.url"
        :href="link.url"
      >
      </inertia-link>
    </div>
  </div>
</template>

<script setup>
import Header from "../components/Header.vue";
import Postitem from "../components/Postitem.vue";
import Viewnote from "./Partials/Viewnote.vue";
import Horizontalwheel from "../components/Horizontalwheel.vue";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";

import {
  computed,
  defineComponent,
  defineProps,
  onMounted,
  watch,
  ref,
} from "vue";

defineComponent(["Header", "Postitem"]);

let paginationLlinks = ref(null);

let props = defineProps({
  post: Object,
  currentItems: String,
  noteDetails: Object,
});

let showViewnote = computed(() => props.noteDetails.noteDetails.length != 0);

onMounted(() => {
  paginationLlinks.value = props.post.links;


});
</script>
