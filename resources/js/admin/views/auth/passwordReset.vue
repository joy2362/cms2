<template>
  <div>{{ this.$route.query.token }}</div>
</template>

<script>
import { mapActions, mapState, mapWritableState } from 'pinia'
import { useAuthStore } from '../../stores/auth'
import { useGlobalStore } from '../../stores/global'

export default {
  name: 'passwordReset',
  mounted () {
    this.setResetPasswordToken(this.$route.query.token)
  },
  computed: {
    ...mapWritableState(useAuthStore, { resetPassword: 'resetPassword', errors: 'errors' }),
    ...mapState(useAuthStore, { getForgetPassData: 'getForgetPassData', getForgetPasswordUrl: 'getForgetPasswordUrl' }),
    ...mapState(useGlobalStore, { getLogo: 'getLogo' })
  },
  methods: {
    ...mapActions(useAuthStore, {
      setErrors: 'setErrors',
      clearForgetPassword: 'clearForgetPassword',
      setResetPasswordToken: 'setResetPasswordToken'
    }),
    ...mapActions(useGlobalStore, { setGlobalLoading: 'setGlobalLoading' }),
  }
}
</script>

<style scoped>

</style>