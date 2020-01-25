import Axios from "axios";

const axios = Axios.create({
  baseURL: "URL/BACK",
});

function getToken() {
  return "token_from_api";
}

function getHeader() {
  return {
    Accept: "application/json",
    "Content-Type": "application/json;charset=UTF-8",
    };
}

export default {
  async get(url) {
    console.assert(typeof url === "string");
    const res = await axios.get(url, { headers: getHeader() });
    return res.data;
  },
  async post(url, data) {
    console.assert(typeof url === "string");
    const res = await axios.post(url, data, { headers: getHeader() });
    return res.data;
  },
  async put(url, data) {
    console.assert(typeof url === "string");
    const res = await axios.put(url, data, { headers: getHeader() });
    return res.data;
  },
  async delete(url) {
    console.assert(typeof url === "string");
    const res = await axios.delete(url, { headers: getHeader() });
    return res.data;
  }
};
