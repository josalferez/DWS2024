import { createRouter, createWebHistory } from "vue-router";    
import BookList from '@/components/BooksList.vue';
import HelloWorld from '@/components/HelloWorld.vue';

const routes = [
    {
        path : '/libros',
        component : BookList,
    }
];

const router = createRouter({
    history : createWebHistory(),
    routes,
});

export default router 
