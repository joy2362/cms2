<template>

  <v-card>
    <v-container>
      <v-row>
        <v-col class="d-flex justify-center" lg="3" sm="12">
          <v-avatar :image="profile.avatar" size="180" @click="showProfileUpdate"></v-avatar>
        </v-col>
        <v-col class="align-auto" lg="6" sm="12">
          <v-card-title class="text-h3 d-flex justify-center">{{ profile.name }}</v-card-title>
          <v-card-text class="caption d-flex justify-center">{{ profile.email }}</v-card-text>
        </v-col>
      </v-row>
      <div class="d-flex justify-center">
        <ChangeAvatar></ChangeAvatar>
      </div>
    </v-container>
  </v-card>


</template>

<script>
import { mapActions, mapState } from 'pinia'
import { useProfileStore } from '../../stores/profile'
import ChangeAvatar from './assets/ChangeAvatar.vue'

export default {
  name: 'ProfileBanner',
  components: { ChangeAvatar },
  computed: {
    ...mapState(useProfileStore, { profile: 'profile' })
  },
  methods: {
    ...mapActions(useProfileStore, { setShowChangeAvatar: 'setShowChangeAvatar' }),
    showProfileUpdate () {
      this.setShowChangeAvatar(true)
    }
  },
}
</script>

<style scoped>
.align-auto {
  margin-top: auto;
  margin-bottom: auto;
}

</style>