<template>
    <v-container>
      <v-row>
        <v-col lg="3" sm="3">
          <chatList :items="userList"></ChatList>
        </v-col>
        <v-col lg="9" sm="9">
          <chatBox></chatBox>
        </v-col>
      </v-row>
    </v-container>
</template>

<script>
import chatBox from '../../components/chat-box/chatBox.vue'
import chatList from '../../components/chat-box/chatList.vue'

export default {
  components: {
    chatBox,
    chatList
  },
  data () {
    return {
      userList: [
        {
          name: 'Abdullah zahid',
          status: 'online',
          avatar: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_10.jpg',
        },
        {
          name: 'Abdullah zahid joy',
          status: 'offline',
          avatar: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_10.jpg',
        },
        {
          name: 'Abdullah ',
          status: 'offline',
          avatar: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_10.jpg',
        },
        {
          name: 'zahid',
          status: 'online',
          avatar: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_10.jpg',
        }
      ],
      title: 'Chat Box',
      routes: [
        {
          title: 'Components',
          disabled: false,
          href: '#',
        },
        {
          title: 'Chat Box',
          disabled: false,
          href: 'chat',
        },
      ],
    }
  },
  methods: {
    setTitle (str) {
      return this.$ucFirst(str)
    }
  }
}
</script>

<style scoped>


</style>
