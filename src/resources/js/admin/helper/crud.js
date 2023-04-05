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
      const baseURL = '/api/admin/'
      let response = {
        'data': {},
        'errors': {},
      }
      const token = localStorage.getItem('token')
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        }
      }
      await axios.post(baseURL + url, payload, config).then(res => {
        response.data = res.data
      }).catch(err => {
        response.errors = err.response.data
      })
      return response
    }
  }
}

export default crud
