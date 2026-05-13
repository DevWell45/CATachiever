import { createApp } from 'vue'

import Category from './vue/Users/Category.vue';
import Users from './vue/Admin/Users.vue';

const app = createApp({});

app.component('category-lists', Category);
app.component('users-lists', Users);

app.mount('#app')

