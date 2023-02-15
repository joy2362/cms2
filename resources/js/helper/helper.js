const helper = {
    install(app , options){
        app.config.globalProperties.$ucFirst = (str) => {
            return typeof(str) === 'string' ? str.charAt(0).toUpperCase() + str.slice(1) : str;
        }
    }
}

export default helper;
