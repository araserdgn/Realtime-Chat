<script setup>

import { Head } from '@inertiajs/vue3';
import Nav from "@/Components/Chat/Nav.vue";
import Header from "@/Components/Chat/Header.vue";
import Messages from "@/Components/Chat/Messages.vue";
import Footer from "@/Components/Chat/Footer.vue";



</script>

<template>

    <Head title="Messages Area" />

    <div>
        <!--  Container -->
        <div
            id="page-container"
            class="relative mx-auto h-screen min-w-[320px] bg-white lg:ms-80"
        >
            <!--  Sidebar -->
            <Nav />
            <!-- END Sidebar -->

            <!--  Header -->
            <Header/>

            <!-- END  Header -->

            <!--  Content -->
            <Messages  />
            <!-- END  Content -->

            <!-- Footer -->
            <Footer v-on:valid="console.log($event)"
            />
            <!-- END Footer -->

        </div>
        <!-- END Page Container -->
    </div>

</template>
