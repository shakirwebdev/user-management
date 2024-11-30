import './bootstrap';

import { createApp } from "vue/dist/vue.esm-bundler";
import UserForm from "./components/UserForm.vue";
import UserList from "./components/UserList.vue";
import axios from "axios";

axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

const token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
}

const app = createApp({
    components: {
        UserForm,
        UserList,
    },
});

app.mount("#app");