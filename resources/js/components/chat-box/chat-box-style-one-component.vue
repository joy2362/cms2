<template>
    <v-toolbar color="info">
        <v-container>
            <v-avatar color="purple">
                <span class="text-h5">WA</span>
            </v-avatar>
            Wonder Age
        </v-container>
    </v-toolbar>
    <v-card color="#F5F5F5" elevation="4">
        <v-responsive
            class="overflow-y-auto"
            max-height="400"
        >       

            <v-lazy
                v-model="isActive"
                :options="{
                    threshold: .5
                }"
                min-height="200"
                transition="fade-transition"
            >
        
                <v-container>
                    <div class="d-flex justify-start">
                        <div class="sender">
                            Hello, Good morning
                        </div>
                    </div>
                    <div class="d-flex justify-end">
                        <div class="receiver">
                            Hello, Good morning
                        </div>
                    </div>
                    <div class="d-flex justify-start">
                        <div class="sender">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum quo nihil, sunt voluptates delectus modi itaque cupiditate incidunt dolorum dolor iusto libero expedita, sed sapiente amet quam quod facilis ex.
                        </div>
                    </div>
                    <div class="d-flex justify-end">
                        <div class="receiver">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem dignissimos, perferendis non nisi sit eius dicta esse. Quis maxime, hic magni nihil dolore explicabo voluptatem reprehenderit, earum distinctio, excepturi doloremque!
                        </div>
                    </div>
                    <div class="d-flex justify-end">
                        <div class="receiver">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem optio reiciendis fugit veritatis dolorum maiores nam facilis cumque quidem. Necessitatibus obcaecati accusamus at amet sint itaque eaque velit rem inventore?
                        </div>
                    </div>
                </v-container>

            </v-lazy>
        </v-responsive>
        <v-toolbar color="white">
            <v-container>
                <v-text-field
                    :prepend-icon="icon"
                    append-icon="mdi-send"
                    variant="filled"
                    label="Message"
                    type="text"
                    color="primary"
                ></v-text-field>
            </v-container>
        </v-toolbar>
    </v-card>
</template>

<script>
export default {
    data: () => ({
      isActive: false,
    }),
}
</script>

<style scoped>
    .sender {
        padding: 20px;
        background-color: rgb(125, 199, 252);
        border: none;
        border-radius: 20px;
        color: rgb(0, 149, 255);
        font-weight: 900;
        margin-bottom: 20px;
        width: fit-content;
        max-width: 50%;
    }
    .receiver {
        padding: 20px;
        background-color: rgb(237, 125, 252);
        border: none;
        border-radius: 20px;
        color: rgb(157, 0, 255);
        font-weight: 900;
        margin-bottom: 20px;
        width: fit-content;
        max-width: 50%;
    }
</style>