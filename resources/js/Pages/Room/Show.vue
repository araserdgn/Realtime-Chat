<script setup>

import {onUnmounted} from "vue";
import { Head } from '@inertiajs/vue3';
import Nav from "@/Components/Chat/Nav.vue";
import Header from "@/Components/Chat/Header.vue";
import Messages from "@/Components/Chat/Messages.vue";
import Footer from "@/Components/Chat/Footer.vue";

import { useMessagesStore } from '@/Store/useMessagesStore';
import { useUsersStore } from '@/Store/useUsersStore';
// import Echo from 'laravel-echo';

const props = defineProps({
    room: {
        type: Object,
        required: true,
    },
})


onUnmounted(() => {
    Echo.leave(`room.${props.room.id}`)
});

const messagesStore = useMessagesStore();
const usersStore = useUsersStore();

const storeMessage = (payload) => {
    messagesStore.storeMessage(props.room.slug, payload);
}

const channel = Echo.join(`room.${props.room.id}`)

channel.listen("MessageCreated", (e) => {

    messagesStore.pushMessage(e);
})
.here((users) => usersStore.setUsers(users))
.joining((user) => usersStore.addUser(user))
.leaving((user) => usersStore.removeUser(user))
.listenForWhisper("typing", (e) => {
    usersStore.setTyping(e);
})


// console.log(Echo.socketId());

    messagesStore.fetchMessages(props.room.slug);

</script>

<template>

    <Head title="Messages Area" />

    <div>
        <!--  Container -->
        <div
            id="page-container"
            class="relative mx-auto h-screen min-w-[320px] bg-white"
        >
            <!--  Sidebar -->
            <Nav />
            <!-- END Sidebar -->

            <!--  Header -->
            <Header/>

            <!-- END  Header -->

            <!--  Content -->
            <Messages :room="room" />
            <!-- END  Content -->

            <!-- Footer -->
            <Footer
            v-on:valid="storeMessage({content: $event})"
            v-on:typing="channel.whisper('typing',{
                user_id: $page.props.auth.user.id,
                typing:$event,
            })"/>
            <!-- END Footer -->

        </div>
        <!-- END Page Container -->
    </div>

</template>
