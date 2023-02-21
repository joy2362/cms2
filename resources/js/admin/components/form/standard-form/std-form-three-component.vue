<template>
    <v-card elevation="4">
      <v-card-title>Standard Form</v-card-title>
      <v-container>
          <v-text-field label="First Name" variant="solo"></v-text-field>
          <v-text-field label="Last Name" variant="solo"></v-text-field>
          <v-textarea label="Description" variant="solo"></v-textarea>
          <div class="my-btn">
              <v-btn variant="tonal" color="primary">
                  Save
              </v-btn>
              <v-btn variant="tonal" color="red">
                  Cancel
              </v-btn>
          </div>
      </v-container>
    </v-card>
  </template>
  
  <script>
  export default {
  
  }
  </script>
  
  <style scoped>
  .my-btn {
      display: flex;
      justify-content: end;
      align-items: center;
  }
  </style>