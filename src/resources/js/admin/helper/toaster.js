const toaster = {
  install (app) {
    app.config.globalProperties.$success = (message, position = 'bottom-right', duration = 4000) => {
      app.$toast.success(message, {
        position: position,
        duration: duration,
      })
    }
    app.config.globalProperties.$error = (message, position = 'bottom-right', duration = 4000) => {
      app.$toast.error(message, {
        position: position,
        duration: duration,
      })
    }
    app.config.globalProperties.$warning = (message, position = 'bottom-right', duration = 4000) => {
      app.$toast.warning(message, {
        position: position,
        duration: duration,
      })
    }
    app.config.globalProperties.$info = (message, position = 'bottom-right', duration = 4000) => {
      app.$toast.info(message, {
        position: position,
        duration: duration,
      })
    }
    app.config.globalProperties.$default = (message, position = 'bottom-right', duration = 4000) => {
      app.$toast.default(message, {
        position: position,
        duration: duration,
      })
    }
  }
}

export default toaster
