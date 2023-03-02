const crud = {
  install (app) {
    app.config.globalProperties.$postWithOutToken = async (url, payload) => {
      let response = {
        'data': {},
        'errors': {},
      }
      await axios.post(url, payload).then(res => {
        response.data = res.data
      }).catch(err => {
        response.errors = err.response.data
      })
      return response
    }
    app.config.globalProperties.$post = async (url, payload = []) => {
      const token = localStorage.getItem('token')
      axios.defaults.baseURL = '/api/admin'
      axios.defaults.headers.common['Authorization'] = `Bearer ${token}`

      let response = {
        'data': {},
        'errors': {},
      }

      await axios.post(url, payload).then(res => {
        response.data = res.data
      }).catch(err => {
        response.errors = err.response.data
      })
      return response
    }
  }
}

export default crud
