<template>
  <div>
    <GlobalLoading/>
    <v-container>
      <TitleBar :routes="routes"></TitleBar>
      <ProfileBanner class="mb"></ProfileBanner>
      <v-row>
        <v-col lg="6" sm="12">
          <ProfileUpdate></ProfileUpdate>
        </v-col>
        <v-col lg="6" sm="12">
          <PasswordUpdate></PasswordUpdate>
        </v-col>
      </v-row>
      <v-row>
        <FooterSection></FooterSection>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import ProfileBanner from '../../components/profile/ProfileBanner.vue'
import ProfileUpdate from '../../components/profile/ProfileUpdate.vue'
import PasswordUpdate from '../../components/profile/PasswordUpdate.vue'
import FooterSection from '../../components/footer/FooterSection.vue'
import TitleBar from '../../components/common/TitleBar.vue'

export default {
  name: 'AdminProfile',
  components: {
    TitleBar,
    ProfileBanner,
    ProfileUpdate,
    PasswordUpdate,
    FooterSection
  },

  data: () => ({
    routes: [
      {
        title: 'Dashboard',
        disabled: false,
        href: '/admin/dashboard',
      },
      {
        title: 'Profile',
        disabled: true,
        href: '',
      },
    ],
  }),
  methods: {}

}
</script>

<style scoped>
.mb {
  margin-bottom: 15px;
}
</style>
