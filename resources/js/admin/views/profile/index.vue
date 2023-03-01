<template>
  <div>
    <v-container>
      <TitleBarSection :routes="routes"></TitleBarSection>
      <ProfileBanner class="mb" :profile="profile" @onChangeAvatar="onChangeAvatar"></ProfileBanner>
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
import TitleBarSection from '../../components/titlebar/TitleBarSection.vue'
import ProfileBanner from '../../components/profile/ProfileBanner.vue'
import ProfileUpdate from '../../components/profile/ProfileUpdate.vue'
import PasswordUpdate from '../../components/profile/PasswordUpdate.vue'
import FooterSection from '../../components/footer/FooterSection.vue'
import { mapActions, mapState } from 'pinia'
import { useProfileStore } from '../../stores/profile'

export default {
  name:'AdminProfile',
  components: {
    TitleBarSection,
    ProfileBanner,
    ProfileUpdate,
    PasswordUpdate,
    FooterSection
  },
  computed: {
    ...mapState(useProfileStore, { profile: 'getProfile' })
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
  methods:{
    ...mapActions(useProfileStore, {setAvatar:'setAvatar'}),
    onChangeAvatar (file) {
      this.setAvatar(file);
    }
  }

}
</script>

<style scoped>
.mb {
  margin-bottom: 15px;
}
</style>
