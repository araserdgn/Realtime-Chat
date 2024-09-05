import { defineStore } from "pinia";

export const useMessagesStore = defineStore('messages', {
    state: () => {
         return {page:1, messages: []}
        },

    actions: {

    },

    getters: {
        allMessages(state) {
            return state.messages
        }
    },
  })
