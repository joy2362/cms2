import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: '/',
        component: () => import('../layouts/main/layout-bar.vue'),
        beforeEnter: setTitle,
        meta: {
            title: 'Dashboard'
        },
        children: [
            {
                path: '',
                name: 'Dashboard',
                component: () => import(/* webpackChunkName: "home" */ '../views/index.vue'),

            },
        ],
    },
    {
        path: '/login',
        component: () => import(/* webpackChunkName: "login" */'../views/auth/login.vue'),
        beforeEnter: setTitle,
        meta: {
            title: 'Login'
        },
    },

    {
        path: '/profile',
        component: () => import('../layouts/main/layout-bar.vue'),
        beforeEnter: setTitle,
        meta: {
            title: 'Profile'
        },
        children: [
            {
                path: '',
                name: 'Profile',
                component: () => import(/* webpackChunkName: "Profile" */'../views/user/admin/profile.vue')
            }
        ]
    },
    {
        path: '/chat',
        component: () => import('../layouts/main/layout-bar.vue'),
        beforeEnter: setTitle,
        meta: {
            title: 'Chat'
        },
        children: [
            {
                path: '',
                name: 'Chat Box',
                component: () => import(/* webpackChunkName: "Profile" */'../views/chat/chat.vue')
            }
        ]
    }
];

function setTitle(to) {
    document.title = to.meta.title ? to.meta.title + ' | ' + import.meta.env.VITE_APP_NAME : import.meta.env.VITE_APP_NAME ?? "cms"
}

export const router = createRouter({
    history: createWebHistory(),
    routes
})

