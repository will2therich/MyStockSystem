export const getters = {
  getLoggedInStatus(state) {
    return state.auth.loggedIn;
  },
  getCategoriesData(state) {
    return state.categories.table
  }
};
