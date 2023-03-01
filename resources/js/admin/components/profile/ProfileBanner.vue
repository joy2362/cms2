<template>
  <v-card elevation="4">
    <v-container>
      <v-row>
        <v-col lg="3" sm="12" class="d-flex justify-center">
          <v-avatar :image="profile.avatar" size="180"></v-avatar>
        </v-col>
        <v-col lg="6" sm="12" class="align-auto">
          <v-card-title class="text-h3 d-flex justify-center">{{ profile.name }}</v-card-title>
          <v-card-text class="caption d-flex justify-center">{{ profile.email }}</v-card-text>
        </v-col>
      </v-row>
      <div class="d-flex justify-center">
        <v-dialog
            v-model="showProfileUpdate"
            persistent
            width="1024"
        >
          <template v-slot:activator="{ props }">

            <v-btn append-icon="mdi mdi-image-sync" v-bind="props">Profile picture</v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="text-h5">Profile Picture</span>
            </v-card-title>
            <v-card-text>
              <v-container>
                <v-file-input label="Avatar" @input="onSelect" :clearable="false"></v-file-input>
              </v-container>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                  color="blue-darken-1"
                  variant="text"
                  @click="showProfileUpdate = false"
              >
                Close
              </v-btn>
              <v-btn
                  color="blue-darken-1"
                  variant="text"
                  @click="showProfileUpdate = false"
              >
                Save
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </div>
    </v-container>
  </v-card>
</template>

<script>
export default {
  name: 'ProfileBanner',
  props:['profile'],
  data () {
    return {
      showProfileUpdate: false,
    }
  },
  methods: {
    onSelect (event) {
      this.$emit("onChangeAvatar", event.target.files[0])

     // this.avatar = event.target.files[0];
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