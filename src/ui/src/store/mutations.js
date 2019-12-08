export const mutations = {
  SET_LOGGED_IN(state) {
    state.auth.loggedIn = true;
  },
  CATEGORIES_STORE_TABLE_DATA(state, data) {
    state.categories.table.tableData = data
    state.categories.table.loading = false
  },
  CATEGORIES_SET_LOADING(state) {
    state.categories.table.loading = true
    state.categories.table.tableData = []
  }
};
