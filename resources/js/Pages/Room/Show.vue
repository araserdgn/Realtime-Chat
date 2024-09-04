<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    room: {
        type:Object,
        required: true,
    },

    // messages: {
    //     type:Array,
    //     required:true,
    // },
})

</script>

<template>
    <Head title="ChatPage" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Message Area</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ room }}
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
