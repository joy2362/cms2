import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/admin/login',
    name: 'admin.login',
    meta: {
      title: 'Login',
      redirectIfAuthenticated: true,
    },
    component: () => import(/* webpackChunkName: "login" */'../views/auth/login.vue'),
  },
  {

    path: '/',
    component: () => import('../layouts/main/layout-bar.vue'),
    name: 'layout',
    children: [
      {
        path: 'admin/dashboard',
        name: 'admin.dashboard',
        meta: {
          title: 'Dashboard',
          requireAuth: true
        },
        component: () => import(/* webpackChunkName: "home" */ '../views/index.vue'),

      },
      {
        path: 'admin/profile',
        name: 'admin.profile',
        meta: {
          title: 'Profile',
          requireAuth: true
        },
        component: () => import(/* webpackChunkName: "Profile" */'../views/user/admin/profile.vue')
      },
      {
        path: 'admin/chat',
        name: 'admin.chat',
        meta: {
          title: 'Messenger'
        },
        component: () => import(/* webpackChunkName: "Profile" */'../views/chat/chat.vue')
      }
    ],
  },
]

function setTitle (title) {
  document.title = title ? title + ' | ' + import.meta.env.VITE_APP_NAME : import.meta.env.VITE_APP_NAME ?? 'cms'
}

const token = () => {
  return localStorage.getItem('token') ?? ''
}

const clearToken = () => {
  localStorage.removeItem('token')
}

export const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  if (to.meta.title) {
    setTitle(to.meta.title)
  }
  if (to.meta.requireAuth) {
    if (token()) {
      axios.get('/api/admin/me', {
        headers: {
          Authorization: `Bearer ${token()}`
        }
      }).then(res => {
        next()
      }).catch(err => {
        if (err.response.status === 401) {
          clearToken()
          next({ name: 'admin.login' })
        }
      })
    }else {
      next({ name: 'admin.login' })
    }
  } else if (to.meta.redirectIfAuthenticated) {
    if (!token()) {
      next()
    } else {
      next({ name: 'admin.dashboard' })
    }
  } else {
    next()
  }

})
