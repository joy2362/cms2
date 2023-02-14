<template>
    <v-app :theme="theme">
        <layoutAppVue v-on:tema="tema"></layoutAppVue>
        <layoutViewVue></layoutViewVue>
    </v-app>
</template>

<script>
    import layoutAppVue from './layout-app.vue';
    import layoutViewVue from './layout-view.vue';
    export default {
        components: {
            layoutAppVue,
            layoutViewVue
        },
        data() {
            return {
                theme: 'light',
                is_dark: false
            }
        },
        mounted() {
            this.getTheme()
        },
        methods: {
            tema() {
                this.is_dark = !this.is_dark;
                if(this.is_dark === true) {
                    this.theme = 'dark';
                    this.themeStorage();
                } else {
                    this.theme = 'light';
                    this.themeStorage();
                }
            },
            themeStorage() {
                localStorage.setItem('theme', this.theme);
            },
            getTheme() {
                this.theme = localStorage.getItem('theme');
            }
        }
    }
</script>
