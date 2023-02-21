<template>
    <div>
        <v-container>
            <titleBar class="mb" :title="title" :routes="routes"></titleBar>
            <v-row>
                <v-col cols="cols">
                    <panelComponentVue
                        icon="mdi-account"
                        title="Admins"
                        value="10"
                    ></panelComponentVue>
                </v-col>
                <v-col cols="cols">
                    <panelComponentVue
                        icon="mdi-cart"
                        title="Products"
                        value="30"
                    ></panelComponentVue>
                </v-col>
                <v-col cols="cols">
                    <panelComponentVue
                        icon="mdi-newspaper-variant"
                        title="News"
                        value="20"
                    ></panelComponentVue>
                </v-col>
                <v-col cols="cols">
                    <panelComponentVue
                        icon="mdi-earth"
                        title="Visitors"
                        value="1250"
                    ></panelComponentVue>
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="cols">
                    <chartComponentVue></chartComponentVue>
                </v-col>
                <v-col cols="cols">
                    <popularProductComponentVue></popularProductComponentVue>
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="cols">
                    <trafficComponentVue></trafficComponentVue>
                </v-col>

                <v-col cols="cols">
                    <activityComponent></activityComponent>
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="cols">
                    <footerComponent></footerComponent>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import titleBar from "../components/titlebar/titlebar-component.vue";
import panelComponentVue from "../components/dashboard/panel-component.vue";
import chartComponentVue from "../components/dashboard/chart-component.vue";
import popularProductComponentVue from "../components/dashboard/popular-product-component.vue";
import trafficComponentVue from "../components/dashboard/traffic-component.vue";
import activityComponent from "../components/dashboard/activity-component.vue";
import footerComponent from "../components/footer/footer-component.vue";
export default {
    components: {
        titleBar,
        panelComponentVue,
        chartComponentVue,
        popularProductComponentVue,
        trafficComponentVue,
        activityComponent,
        footerComponent,
    },
    data() {
        return {
            title: "Dashboard",
            routes: [
                {
                    title: "Dashboard",
                    disabled: false,
                    href: "/",
                },
            ],
        };
    },
};
</script>

<style scoped>
.mb {
    margin-bottom: 15px;
}
.main-bg {
    background-color: rgb(227, 227, 221);
    height: 100%;
}
</style>
