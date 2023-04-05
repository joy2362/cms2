<template>
  <v-dialog
      v-model="getShowChangeAvatar"
      persistent
      width="1024"
  >
    <v-card>
      <v-card-title>
        <span class="text-h5">Profile Picture</span>
      </v-card-title>
      <v-card-text>
        <v-container>
          <v-file-input :clearable="false" label="Avatar" @input="onSelect"></v-file-input>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn
            color="blue-darken-1"
            variant="text"
            @click="showProfileUpdate"
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
import { mapActions, mapState } from 'pinia'
import { useGlobalStore } from '../../../stores/global'
import { useProfileStore } from '../../../stores/profile'

export default {
  name: 'ChangeAvatar',
  computed: {
    ...mapState(useGlobalStore, { getShowChangeAvatar: 'getShowChangeAvatar' })
  },
  methods: {
    ...mapActions(useGlobalStore, { setShowChangeAvatar: 'setShowChangeAvatar' }),
    ...mapActions(useProfileStore, { setAvatar: 'setAvatar' }),

    showProfileUpdate () {
      this.setAvatar('')
      this.setShowChangeAvatar(false)
    },
    onSelect (event) {
      this.setAvatar(event.target.files[0])
    },
  }

}
</script>

<style scoped>

</style>