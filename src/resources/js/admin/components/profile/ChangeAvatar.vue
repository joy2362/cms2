<template>
  <v-dialog
      v-model="getShowChangeAvatar"
      persistent
      width="500"
  >
    <v-card>
      <v-toolbar
          color="primary"
          title="Profile Picture"
      ></v-toolbar>
      <v-card-text>
        <v-container>
          <v-file-input
              :clearable="false"
              :error="!!errors.image.avatar"
              :error-messages="errors.image.avatar" accept="image/png, image/jpeg, image/bmp" label="Profile Picture"
              prepend-icon="mdi-camera"
              show-size
              @input="onSelect"></v-file-input>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn
            color="blue-darken-1"
            variant="text"
            @click="showChangeAvatar = !showChangeAvatar"
        >
          Close
        </v-btn>
        <v-btn
            color="blue-darken-1"
            variant="text"
            @click="showProfileUpdate"
        >
          Save
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import { mapActions, mapState, mapWritableState } from 'pinia'
import { useGlobalStore } from '../../stores/global'
import { useProfileStore } from '../../stores/profile'
import { updateAvatar } from '../../js/profile'

export default {
  name: 'ChangeAvatar',
  computed: {
    ...mapWritableState(useProfileStore, { errors: 'errors', showChangeAvatar: 'showChangeAvatar' }),
    ...mapState(useProfileStore, {
      getApiRoutes: 'getApiRoutes',
      getShowChangeAvatar: 'getShowChangeAvatar',
      getAvatar: 'getAvatar'
    })
  },
  methods: {
    ...mapActions(useProfileStore, {
      setShowChangeAvatar: 'setShowChangeAvatar',
      setAvatar: 'setAvatar',
      setProfile: 'setProfile'
    }),
    ...mapActions(useGlobalStore, { setGlobalLoading: 'setGlobalLoading' }),

    showProfileUpdate () {
      updateAvatar(this)
    },
    onSelect (event) {
      this.setAvatar(event.target.files[0])
    },
  }

}
</script>

<style scoped>

</style>