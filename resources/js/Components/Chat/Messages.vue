
<script setup>
import { useMessagesStore } from '@/Store/useMessagesStore';

const messagesStore = useMessagesStore();

</script>

<template>
    <main id="page-content" class="absolute inset-0">
        <div
            class="container mx-auto space-y-6 space-y-reverse px-4 py-24 lg:p-8 lg:pb-28 xl:max-w-7xl flex flex-col-reverse h-full overflow-y-auto">
            <div v-for="message in messagesStore.allMessages" :key="message.id"
                class="flex w-5/6 flex-col gap-2 lg:w-2/3 xl:w-1/3 items-start">
                <p v-if="message.user.id != $page.props.auth.user.id" class="text-sm font-medium text-slate-500">
                    {{ message.user.name }}
                </p>

                <div class="rounded-2xl px-5 py-3 bg-gray-100">
                    <p class="font-semibold">
                        {{ message.content }}
                    </p>
                </div>

                <p class="text-xs font-medium text-slate-500">
                    {{ message.created_at }}
                </p>
            </div>

            <div ref="target" class="translate-y-20"></div>
        </div>
    </main>
</template>
