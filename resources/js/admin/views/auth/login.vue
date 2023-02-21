<template>
    <v-app :theme="theme">
        <div class="main-bg">
            <v-card
                elevation="2"
                class="card-login"
            >
                <v-card-title class="d-flex justify-center">
                    <div v-if="theme === 'light'">
                        <img :src="logo" class="login-logo" alt="Logo">
                    </div>
                    <div v-else>
                        <img :src="logo" class="login-logo" alt="Logo">
                    </div>
                </v-card-title>

                <v-form
                    ref="form"
                    lazy-validation
                    class="form-width"
                >

                    <div class="form-login">
                        <v-text-field
                            label="Email"
                            density="compact"
                            variant="underlined"
                            color="primary"
                            v-model="form.email"
                            type="email"
                            :error="!!errors.email"
                            :error-messages="errors.email"
                        ></v-text-field>

                        <v-text-field
                            density="compact"
                            variant="underlined"
                            color="primary"
                            label="Password"
                            v-model="form.password"
                            :append-icon="showPass ? 'mdi-eye' : 'mdi-eye-off'"
                            @click:append="showPass = !showPass"
                            :type="showPass ? 'text' : 'password'"
                            :error="!!errors.password"
                            :error-messages="errors.password"
                        ></v-text-field>
                    </div>


                    <div class="login-button">
                        <v-btn
                            class="ma-2"
                            color="primary"
                            @click="login"
                            :disabled="loading"
                            :loading="loading"
                        >
                            Login
                        </v-btn>
                    </div>
                </v-form>
            </v-card>
        </div>
    </v-app>
</template>

<script>
import { mapActions } from 'pinia'
import { useAuthStore } from '../../stores/auth'

export default {
    data() {
        return {
            logo: this.asset + '/assets/logo/logo.png',
            showPass: false,
            form: {
                email: '',
                password: '',
            },
            type: 'password',
            valid: true,
            errors: [],
            loading: false,
            theme: localStorage.getItem('theme')
        }
    },
    methods: {

        ...mapActions(useAuthStore, {authToken:'setToken'}),
        async login() {
            this.loading = true;
            const formData = new FormData();
            formData.append('email', this.form.email);
            formData.append('password', this.form.password);

            const res = await this.$post('/api/admin/login', formData);

            if(res.data?.success){
                this.authToken(res.data.token)
                this.$success(res.data.message);
                this.$router.push('/admin/dashboard');
            }
            if(res.errors?.error){
                this.$error(res.errors?.error);
            }
            if(res.errors?.errors){
                this.errors = res.errors?.errors;
            }
            this.loading = false;

        }
    },
    mounted() {
        this.auth = useAuthStore()
    }
}
</script>

<style scoped>
.mb {
    margin-bottom: 60px;
}

.main-bg {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    background-color: rgb(227, 227, 221);
    padding: 120px 0px;
}

.margin {
    margin-top: 29%;
}

.card-login {
    width: 600px;
}

@media screen and (max-width: 450px) {
    .card-login {
        width: 80%;
    }
}

.login-logo {
    width: 270px;
    height: auto;
}

@media screen and (max-width: 450px) {
    .login-logo {
        width: 150px;
    }
}

.form-login {
    width: 80%;
    margin: auto;
}

.login-button {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;
    margin-bottom: 35px;
}

.btn-vendor {
    margin-left: 10px;
}
</style>
