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

                <div class="d-flex justify-center mb">
                    <v-btn prepend-icon="mdi-google" variant="tonal" color="red" size="small">
                        SignIn
                    </v-btn>
                    <v-btn prepend-icon="mdi-facebook" variant="tonal" class="btn-vendor" color="blue" size="small">
                        SignIn
                    </v-btn>
                </div>

                <div class="d-flex justify-center mb">
                    <b>OR</b>
                </div>

                <v-form
                    ref="form"
                    v-model="valid"
                    lazy-validation
                    class="form-width"
                >

                    <div class="form-login">
                        <v-text-field
                            label="Username"
                            density="compact"
                            variant="underlined"
                            color="primary"
                            v-model="login.username"
                            :rules="usernameRules"
                            type="text"
                            required
                        ></v-text-field>

                        <v-text-field
                            density="compact"
                            variant="underlined"
                            color="primary"
                            label="Password"
                            v-model="login.password"
                            :rules="passwordRules"
                            :append-icon="showPass ? 'mdi-eye' : 'mdi-eye-off'"
                            @click:append="showPass = !showPass"
                            :type="showPass ? 'text' : 'password'"
                            required
                        ></v-text-field>
                    </div>


                    <div class="login-button">
                        <v-btn
                            class="ma-2"
                            color="primary"
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
export default {
    data () {
        return {
            logo: import.meta.env.VITE_APP_URL + '/assets/logo/logo.png' ,
            showPass: false,
            login: {
                username: '',
                password: '',
            },
            type: 'password',
            usernameRules: [
                v => !!v || 'Username required',
            ],
            passwordRules: [
                v => !!v || 'Password harus diisi',
            ],
            valid: true,
            token: '',
            theme: localStorage.getItem('theme')
        }
    },
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
