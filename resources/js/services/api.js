import axios from 'axios';

const API_URL = process.env.MIX_APP_URL + 'api';

const api = axios.create({
    baseURL: API_URL,
    withCredentials:true,
})

api.interceptors.response.use(
    responce => new Promise((resolve, reject)=>{
        responce.data.status 
            ? resolve(responce.data.data)
            : reject(responce.data.errors)
    })
)

export default api;