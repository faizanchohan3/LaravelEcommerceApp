import { createWebHistory, createRouter } from 'vue-router'
import test from './test.vue'
import home from './home.vue'
import Layout from './front_view/layout.vue';
import Index from './front_view/Index.vue';
import Category from './front_view/Category.vue';
import cart from './front_view/cart.vue';
import Product from './front_view/Product.vue';

const routes = [

    {
        name: 'Index',
        path: '/',
        component: Index,

    },

    {
        name: 'Category',
        path: '/category/:slug?',
        component:Category,

    },
    {
        name: 'Product',
        path: '/product/:item_code?/:slug?',
        component:Product,

    },
    {
        name: 'Cart',
        path: '/cart',
        component:cart,

    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
