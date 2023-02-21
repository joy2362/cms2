<template>
  <v-card elevation="4">
    <v-card-title>Advanced Form</v-card-title>
    <v-container>
        <v-row>
            <v-col cols="cols">
                <v-text-field
                    label="First name"
                    required
                ></v-text-field>
            </v-col>
            <v-col cols="cols">
                <v-text-field
                    label="Last name"
                    required
                ></v-text-field>
            </v-col>
        </v-row>
        <v-text-field
            label="Email"
            type="email"
            required
        ></v-text-field>
        <v-autocomplete
            label="Gender"
            :items="['Male', 'Female']"
        ></v-autocomplete>
        <v-text-field
            label="Date of Birth"
            required
            type="date"
        ></v-text-field>
        <v-textarea label="Description"></v-textarea>
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