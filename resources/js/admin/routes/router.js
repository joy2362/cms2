import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: '/admin/login',
        component: () => import(/* webpackChunkName: "login" */'../views/auth/login.vue'),
        beforeEnter: setTitle,
        meta: {
            title: 'Login'
        },
    },
    {

        path: '/',
        component: () => import('../layouts/main/layout-bar.vue'),
        name: 'layout',
        children: [
            {
                path: 'admin/dashboard',
                name: 'Dashboard',
                meta: {
                    title: 'Dashboard'
                },
                beforeEnter: setTitle,

                component: () => import(/* webpackChunkName: "home" */ '../views/index.vue'),

            },
            {
                path: 'admin/profile',
                name: 'Profile',
                meta: {
                    title: 'Profile'
                },
                component: () => import(/* webpackChunkName: "Profile" */'../views/user/admin/profile.vue')
            },
            {
                path: 'admin/chat',
                name: 'Messenger',
                meta: {
                    title: 'Messenger'
                },
                component: () => import(/* webpackChunkName: "Profile" */'../views/chat/chat.vue')
            }
        ],
    },
];

function setTitle(to) {
    document.title = to.meta.title ? to.meta.title + ' | ' + import.meta.env.VITE_APP_NAME : import.meta.env.VITE_APP_NAME ?? "cms"
}

export const router = createRouter({
    history: createWebHistory(),
    routes
})

