<template>
  <v-container>
    <GlobalLoading/>
    <BreadCrumb :routes="getBreadCrumb"></BreadCrumb>
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
</template>

<script>
import ProfileBanner from '../../components/profile/ProfileBanner.vue'
import ProfileUpdate from '../../components/profile/ProfileUpdate.vue'
import PasswordUpdate from '../../components/profile/PasswordUpdate.vue'
import FooterSection from '../../components/footer/FooterSection.vue'
import BreadCrumb from '../../components/common/BreadCrumb.vue'
import { mapState } from 'pinia'
import { useProfileStore } from '../../stores/profile'

export default {
  name: 'AdminProfile',
  components: {
    BreadCrumb,
    ProfileBanner,
    ProfileUpdate,
    PasswordUpdate,
    FooterSection
  },
  computed: {
    ...mapState(useProfileStore, { getBreadCrumb: 'getBreadCrumb' })
  },
}
</script>

<style scoped>
.mb {
  margin-bottom: 15px;
}
</style>
