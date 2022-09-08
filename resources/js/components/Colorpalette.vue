<template>
<div>
    <ul class="
        flex
        gap-2
        items-center
        px-2
        border-gray-200
        bg-inherit
        rounded-full
      ">
        <li>
            <font-awesome-icon icon="palette" class="transform -rotate-45" size="xs" />
        </li>

        <li v-for="(color, i) in colorThemes" @click="setBackgroundColor(i)" :key="i" :id="'colorlistat' + i" :style="{ 'background-color': color }" class="
          h-4
          w-4
          rounded-full
          grid
          place-items-center
          cursor-pointer
          text-gray-500
        ">
            <font-awesome-icon v-if="currIndex == i" icon="check" class="text-white" size="xs" />
        </li>
    </ul>
</div>
</template>

<script setup>
import {
    ref,
    defineEmits
} from "vue";
let colorThemes = [
    "#fed7aa",
    "#84cc16",
    "#818cf8",
    "#fca5a5",
    "#06b6d4",
    "#f9a8d4",
];
let currIndex = ref(null);
let emit = defineEmits("changeBackgroundColor");

let setBackgroundColor = (i) => {
    currIndex.value = i;
    emit("changeBackgroundColor", colorThemes[i]);
};
</script>
