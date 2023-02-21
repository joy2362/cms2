const crud = {
    install(app){
        app.config.globalProperties.$post = async (url, payload) => {
            let response = {
                 'data' : {},
                 'errors' : {},
            };
            await axios.post(url, payload).then(res => {
                response.data = res.data;
            }).catch(err => {
                response.errors = err.response.data;
            })
            return response;
        }
    }
}

export default crud;
