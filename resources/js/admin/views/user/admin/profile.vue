<template>
    <div>
        <v-container>
            <titlebarComponent :title="title" :routes="routes"></titlebarComponent>
            <profileBanner class="mb"></profileBanner>
            <v-row>
                <v-col lg="6" sm="12">
                    <profileActivity></profileActivity>
                </v-col>
                <v-col lg="6" sm="12">
                    <profileData></profileData>
                </v-col>
            </v-row>
            <v-row>
                <myFooter></myFooter>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import titlebarComponent from '../../../components/titlebar/titlebar-component.vue';
import profileBanner from '../../../components/profile/profile-banner-component.vue';
import profileActivity from '../../../components/profile/profile-activity-component.vue';
import profileData from '../../../components/profile/profile-data-component.vue';
import myFooter from '../../../components/footer/footer-component.vue';

export default {
    components: {
        titlebarComponent,
        profileBanner,
        profileActivity,
        profileData,
        myFooter
    },
    data: () => ({
        title: 'Profile',
        routes: [
            {
                title: "Profile",
                disabled: false,
                href: "/profile",
            },
        ],
    })
}
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
