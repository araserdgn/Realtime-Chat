import axios from "axios";
import { defineStore } from "pinia";

export const useMessagesStore = defineStore("messages", {
    state: () => ({
        page: 1,
        messages: []
    }),

    actions: {
        fetchMessages(roomSlug, page = 1) {
            axios.get(`/rooms/${roomSlug}/messages?page=${page}`)
                .then((response) => {
                    // Verileri birleştir
                    this.messages = [...this.messages, ...response.data.data];
                    // Sayfa bilgisini güncelle
                    this.page = response.data.meta.current_page;
                })
                .catch(error => {
                    console.error('Fetch Messages Error:', error);
                });
        }
    },

    getters: {
        allMessages(state) {
            return state.messages;
        }
    }
});
