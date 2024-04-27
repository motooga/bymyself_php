import axios from "axios";

const axiosInstance = axios.create({
  baseURL:'http://localhost8000/api/:',
  headers:{
    "Cntent-type": "application/json",
  },
})

export default axiosInstance
