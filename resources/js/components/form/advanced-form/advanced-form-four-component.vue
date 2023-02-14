<template>
    <v-card elevation="4">
      <v-card-title>Advanced Form</v-card-title>
      <v-container>
          <v-row>
              <v-col cols="cols">
                  <v-text-field
                      label="First name"
                      required
                      variant="underlined"
                  ></v-text-field>
              </v-col>
              <v-col cols="cols">
                  <v-text-field
                      label="Last name"
                      required
                      variant="underlined"
                  ></v-text-field>
              </v-col>
          </v-row>
          <v-text-field
              label="Email"
              type="email"
              required
              variant="underlined"
          ></v-text-field>
          <v-autocomplete
              label="Gender"
              :items="['Male', 'Female']"
              variant="underlined"
          ></v-autocomplete>
          <v-text-field
              label="Date of Birth"
              required
              type="date"
              variant="underlined"
          ></v-text-field>
          <v-textarea label="Description" variant="underlined"></v-textarea>
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