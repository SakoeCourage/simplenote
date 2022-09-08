<template>
  <div>
    <input id="x" ref="trix_val" type="hidden" key="trix" />
    <trix-editor
      placeholder="note body goes here..."
      input="x"
      v-model="noteBody"
      class="
        trix-editor
        dark:border-0
        dark:text-gray-300
        dark:bg-gray-700
        dark:ring-1
        dark:ring-slate-400/50
        focus:border-2 focus:border-gray-500 focus:outline-none
        rounded-lg
        min-h-[10rem]
      "
    >
    </trix-editor>
  </div>
</template>

<script setup>
import "trix/dist/trix";
import "trix/dist/trix.css";
import { ref, watch, defineEmits, defineProps, onMounted, nextTick } from "vue";

let noteBody = ref(null);
let emit = defineEmits(["get-noteBody"]);
let props = defineProps({ data: String });

let setData = () => {
  if (props.data) {
    noteBody.value = props.data;
  }
};

watch(noteBody, (value) => {
  emit("get-noteBody", value);
});

onMounted(() => {
  nextTick(() => setData());
});
</script>

<style >
trix-editor ul,
.trix-editor ul {
  list-style-type: disc !important;
  margin-left: 1rem !important;
}

trix-editor ol,
.trix-editor ol {
  list-style-type: decimal !important;
  margin-left: 1rem !important;
}

.trix-button-row::-webkit-scrollbar {
  overflow: hidden;
  display: none;
}

.trix-button--icon-strike,
.trix-button--icon-link,
.trix-button--icon-code,
.trix-button--icon-quote,
.trix-button--icon-heading-1,
.trix-button--icon-attach {
  display: none;
}

.trix-button--icon {
  border-radius: 5rem;
  transform: scale(0.8);
}
</style>