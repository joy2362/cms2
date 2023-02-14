const crud = {
    install(app , options){
        app.config.globalProperties.$globalHelper = () =>{
            console.log('register your helper method here')
        }
    }
}

export default crud;
