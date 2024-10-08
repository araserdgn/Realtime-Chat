<script setup>
import { useMessagesStore } from "@/Store/useMessagesStore";

import { useIntersectionObserver } from '@vueuse/core'
import { ref } from "vue";

const target = ref(null)
const targetIsVisible = ref(false)


const props = defineProps({
    room: {
        type: Object,
        required: true,
    },
});


const messagesStore = useMessagesStore();

const { stop } = useIntersectionObserver(
    target,
    ([{ isIntersecting }], observerElement) => {
        if (isIntersecting && messagesStore.getIsLoaded) {
            messagesStore.fetchPreviousMessages(props.room.slug);
        }
    },
)

</script>

<template>

    <head title="Messages Area" />
    <div>
        <!-- Page Container -->
        <div id="page-container" class="relative mx-auto h-screen min-w-[320px] bg-white lg:ms-80">

            <!-- Page Content -->
            <main id="page-content" class="absolute inset-0">
                    <div
                        class="container mx-auto space-y-6 space-y-reverse px-4 py-24 lg:p-8 lg:pb-28 xl:max-w-7xl flex flex-col-reverse h-full overflow-y-auto">
                        <div v-for="message in messagesStore.allMessages" :key="message.id"
                            class="flex w-5/6 flex-col gap-2 lg:w-2/3 xl:w-1/3" :class="{
                                'items-start': message.user.id != $page.props.auth.user.id,
                                'items-end ms-auto':
                                    message.user.id == $page.props.auth.user.id,
                            }">
                            <p v-if="message.user.id != $page.props.auth.user.id"
                                class="text-sm font-medium text-slate-500">
                                {{ message.user.name }}
                            </p>
                            <div class="rounded-2xl px-5 py-3 bg-gray-100" :class="{
                                'bg-indigo-600 text-white rounded-br-none':
                                    message.user.id == $page.props.auth.user.id,
                                'rounded-tl-none':
                                    message.user.id != $page.props.auth.user.id,
                            }">
                                <p class="font-semibold" :class="{
                                    'text-white':
                                        message.user.id == $page.props.auth.user.id,
                                    'text-slate-500':
                                        message.user.id != $page.props.auth.user.id,
                                }">
                                    {{ message.content }}
                                </p>
                            </div>
                            <p class="text-xs font-medium text-slate-500" :class="{
                                'text-right':
                                    message.user.id == $page.props.auth.user.id,
                            }">
                                {{ message.created_at }}
                            </p>
                        </div>

                        <div ref="target" class="translate-y-20"></div>

                    </div>
            </main>
            <!-- END Page Content -->

            <!-- Page Footer -->
            <footer id="page-footer"
                class="fixed bottom-0 end-0 start-0 items-center border-t border-slate-200/75 bg-white lg:start-80">
                <form class="container mx-auto flex h-20 items-center gap-2 px-4 lg:px-8 xl:max-w-7xl"
                    onsubmit="return false;">
                    <input type="text"
                        class="-mx-5 block w-full rounded-lg border-0 px-5 py-4 leading-6 focus:border-indigo-500 focus:ring focus:ring-indigo-500/75"
                        placeholder="Type a new message and hit enter.." />
                </form>
            </footer>
            <!-- END Page Footer -->

        </div>
        <!-- END Page Container -->
    </div>
</template>
