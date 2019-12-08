import axios from "axios";

let url = "http://ts.local";

export const actions = {
    authLogin({commit}, postData) {
        return new Promise(resolve => {
            axios
                .post(url + "/api/auth/login", postData)
                .then(function (response) {
                    // Set default headers for authorisation
                    axios.defaults.headers.common["Authorization"] =
                        "Bearer " + response.data.access_token;
                    commit("SET_LOGGED_IN");
                    resolve(true);
                })
                .catch(function () {
                    resolve(false);
                });
        });
    },
    categoriesGetAll({commit}) {
        commit('CATEGORIES_SET_LOADING')
        axios
            .get(url + '/api/categories/')
            .then(function (response) {
                commit('CATEGORIES_STORE_TABLE_DATA', response.data.data)
            })
            .catch(function () {

            })
    },
    createCategory({dispatch}, postData) {
        return new Promise(resolve => {
            axios
                .post(url + "/api/categories", postData)
                .then(function () {
                    dispatch('categoriesGetAll')
                    resolve(true);
                })
                .catch(function () {
                    resolve(false);
                });
        });
    },
};
