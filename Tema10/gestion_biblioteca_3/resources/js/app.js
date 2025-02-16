import './bootstrap';

import { createApp } from 'vue';
import BookList from '@/components/BooksList.vue';
import HelloWorld from '@/components/HelloWorld.vue';
import router from './router';

// Creamos la instancia de Vue
//createApp(HelloWorld).mount('#app');
createApp(HelloWorld).use(router).mount('#app');


