import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth',{
    state:()=>{
        return {
            token: localStorage.getItem("token") ?? ''
        }
    },
    getters: {
        getToken(state){
            return state.token;
        }
    },
    actions: {
        setToken(token){
            localStorage.setItem('token',token);
        },
        removeToken(token){
            localStorage.setItem('token',null);
        }
    }
})
