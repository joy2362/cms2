<template>
  <v-responsive class="overflow-y-auto"
                max-height="400">
    <v-list>

      <v-list-item v-for="(chat, index) in items" v-bind:key="index" :title="chat.name" class="userList"
                   lines="two"
      >
        <template v-slot:prepend>
          <v-avatar color="surface-variant" size="x-large">
            <v-img
                :src="chat.avatar"
                alt="John"
            ></v-img>
          </v-avatar>
        </template>

        <template v-slot:subtitle="{ subtitle }">
          <div><span
              :class="['status', {'orange':chat.status==='offline'},{'green':chat.status==='online'}]"></span>{{
              chat.status
            }}
          </div>
        </template>
      </v-list-item>
    </v-list>
  </v-responsive>
</template>

<script>
export default {
  name: 'chatList',
  props: {
    items: {
      type: Array,
      required: true,
    },
  },

}
</script>

<style scoped>
.status {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  display: inline-block;
  margin-right: 7px;
}

.green {
  background-color: #58b666;
}

.orange {
  background-color: #ff725d;
}

.userList {
  border-radius: 5px;
}

.userList:hover {
  background-color: #5e616a;
}

.active {
  background-color: #5e616a;
}

</style>
