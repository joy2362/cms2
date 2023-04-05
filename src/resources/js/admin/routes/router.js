import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/admin/login',
    name: 'admin.login',
    meta: {
      title: 'Login',
      redirectIfAuthenticated: true,
    },
    component: () => import(/* webpackChunkName: "admin.login" */'../views/auth/login.vue'),
  },
  {
    path: '/admin/forget-password',
    name: 'admin.forget.password',
    meta: {
      title: 'Forget password',
      redirectIfAuthenticated: true,
    },
    component: () => import(/* webpackChunkName: "admin.forget.password" */'../views/auth/forgetPassword.vue'),
  },
  {
    path: '/admin/password-reset/:email/:token',
    name: 'admin.password.reset',
    meta: {
      title: 'Password reset',
      redirectIfAuthenticated: true,
    },
    component: () => import(/* webpackChunkName: "admin.password.reset" */'../views/auth/passwordReset.vue'),
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
        component: () => import(/* webpackChunkName: "admin.dashboard" */ '../views/index.vue'),

      },
      {
        path: 'admin/profile',
        name: 'admin.profile',
        meta: {
          title: 'Profile',
          requireAuth: true
        },
        component: () => import(/* webpackChunkName: "admin.Profile" */'../views/profile/index.vue')
      },
      {
        path: 'admin/chat',
        name: 'admin.chat',
        meta: {
          title: 'Messenger',
          requireAuth: true
        },
        component: () => import(/* webpackChunkName: "admin.chat" */'../views/chat/chat.vue')
      },
      {
        path: 'admin/role',
        name: 'admin.role',
        meta: {
          title: 'Role',
          requireAuth: true
        },
        component: () => import(/* webpackChunkName: "admin.role" */'../views/role/index.vue')
      },
      {
        path: 'admin/role/store',
        name: 'admin.role.store',
        meta: {
          title: 'Create Role',
          requireAuth: true
        },
        component: () => import(/* webpackChunkName: "admin.role.store" */'../views/role/create.vue')
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
      }).then(() => {
        next()
      }).catch(err => {
        if (err.response.status === 401) {
          clearToken()
          next({ name: 'admin.login' })
        }
      })
    } else {
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
