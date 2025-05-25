import { createWebHistory, createRouter } from 'vue-router'
import test from './test.vue'
import home from './home.vue'
import Layout from './front_view/layout.vue';
import Index from './front_view/Index.vue';

const routes = [

    {
        name: 'Index',
        path: '/',
        component: Index,

    },


];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
