import axios from "axios";
let url = "http://ts.local";

export const actions = {
  authLogin({ commit }, postData) {
    return new Promise(resolve => {
      axios
        .post(url + "/api/auth/login", postData)
        .then(function(response) {
          axios.defaults.headers.common["Authorization"] =
            "Bearer " + response.data.access_token;
          commit("SET_LOGGED_IN");
          resolve(true);
        })
        .catch(function() {
          resolve(false);
        });
    });
  }
};
