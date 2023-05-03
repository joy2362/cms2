const token = localStorage.getItem('token')
let instance = axios.create({
  headers: {
    Authorization: `Bearer ${token}`,
  }
})
const crud = {
  install (app) {
    app.config.globalProperties.$postWithOutToken = async (url, payload) => {
      let response = {
        'data': {},
        'errors': {},
      }
      await instance.post(url, payload).then(res => {
        response.data = res.data
      }).catch(err => {
        response.errors = err.response.data
      })
      return response
    }

    app.config.globalProperties.$get = async (url, payload = []) => {
      let response = {
        'data': {},
        'errors': {},
      }
      await instance.get(url, { params: payload }).then(res => {
        response.data = res.data
      }).catch(err => {
        response.errors = err.response.data
      })
      return response
    }

    app.config.globalProperties.$post = async (url, payload = []) => {
      let response = {
        'data': {},
        'errors': {},
      }
      await instance.post(url, payload).then(res => {
        response.data = res.data
      }).catch(err => {
        response.errors = err.response.data
      })
      return response
    }
  }
}

export default crud
