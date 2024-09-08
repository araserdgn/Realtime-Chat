<script setup>
import { ref } from "vue";

const message = ref("");
const shift = ref(false);
const emit = defineEmits();

const handleEnter = (e) => {
    if (shift.value && message.value.length) {
        message.value = message.value + "\n";
        return;
    }

    if (message.value.length) {
        emit("valid", message.value); // gelen mesajı dışarı iletir , Show kısmında valid ile dinler
        message.value = "";
        handleFinishedTyping();
    }
};

let typingTimeout = null;

const handleTyping = () => {
    clearTimeout(typingTimeout); // önceden başlayan timeoutları sil
    emit("typing",true)

   // 1 saniye içinde typing durdurulur
    typingTimeout = setTimeout(handleFinishedTyping, 1000)

}

const handleFinishedTyping = () => {
    clearTimeout(typingTimeout)
    emit("typing", false)
}


</script>

<template>
    <footer
        id="page-footer"
        class="fixed bottom-0 end-0 start-0 items-center border-t border-slate-200/75 bg-white lg:start-80"
    >
        <textarea
            v-model="message"
            v-on:keydown.enter.prevent="handleEnter"
            v-on:keydown.shift="shift = true"
            v-on:keyup="shift = false"
            v-on:keydown ="handleTyping"
            class="w-11/12 rounded-lg border-0 px-5 ml-4 py-4 focus:border-indigo-500 focus:ring focus:ring-indigo-500/75"
            placeholder="Mesajınızı yazınız.."
        ></textarea>
    </footer>
</template>
