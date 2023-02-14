export const routes = [
    {
        path: '/',
        component: () => import('../layouts/main/layout-bar.vue'),
        meta: {
            title: 'Welcome to Dashboard'
        },
        children: [
            {
                path: '',
                name: 'Dashboard',
                // route level code-splitting
                // this generates a separate chunk (about.[hash].js) for this route
                // which is lazy-loaded when the route is visited.
                component: () => import(/* webpackChunkName: "home" */ '../views/index.vue'),
            },
        ],
    },
    {
        path: '/login',
        component: () => import(/* webpackChunkName: "login" */'../views/auth/login.vue'),
        meta: {
            title: 'Swing :: Login Page'
        },
    }

]
