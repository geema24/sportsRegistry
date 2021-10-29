<template>
  <div class="container">
    <div class="row">
      <div class="card mx-auto">
        <div class="card-header">
          <div class="align-items-center d-flex justify-content-between mb-4">
            <strong class="page-title">ユーザー一覧</strong>
          </div>

          <div class="row">
            <div class="col-12">
              <form>
                <div class="form-row d-flex justify-content-between">
                  <div class="col-6">
                    <input
                      type="search"
                      name="searchWrd"
                      class="form-control mb-2"
                      id="inlineFormInput"
                      v-model="searchWord"
                      placeholder="ユーザー名, 電話番号, メール"
                    />
                  </div>

                  <div class="col-2 align-items-righ">
                    <button type="button" class="btn btn-primary mb-2" @click="searchResult()">
                      検索
                    </button>
                  </div>

                  <div class="col">
                    <select
                      class="form-control"
                      name="searchParameter"
                      v-model="selectedSearchParameter"
                    >
                      <option
                        v-for="searchType in searchParameters"
                        :key="searchType"
                        :value="searchType"
                      >
                        {{ searchType }}
                      </option>
                    </select>
                  </div>

                  <div class="col-4 align-items-right">
                    <router-link
                      :to="{ path: '/admin/createuser' }"
                      class="create-user-button btn btn-success mb-2"
                      >ユーザー作成</router-link
                    >
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>ユーザー名</th>
                <th>メール</th>
                <th>電話番号</th>
                <th>ユーザータイプ</th>
              </tr>
            </thead>

            <tbody v-for="user in users" :key="user.id">
              <tr>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.phone }}</td>
                <td>{{ user.type }}</td>
                <td>
                  <router-link
                    :to="{ name: 'EditUser', params: { id: user.id } }"
                    class="btn btn-primary mb-2"
                    >変化</router-link
                  >
                </td>
                <td>
                  <button @click="deleteUser(user)" class="btn btn-warning mb-2">削除</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'UserList',
  data() {
    return {
      users: [],
      selectedSearchParameter: '',
      searchParameters: ['ユーザー名', 'メール', '電話番号'],
      searchWord: '',
      authUserId: '',
    };
  },

  created() {
    this.getUsers();
    this.initial();
  },
  methods: {
    initial() {
      this.authUserId = parseInt(
        document.querySelector("meta[name='user_id']").getAttribute('content'),
        10,
      );
    },
    getUsers() {
      axios
        .get('/api/admin/getusers')
        .then(response => {
          this.users = response.data;
        })
        .catch(error => {
          Vue.toasted.error('入力にエラーがあります');
        });
    },
    deleteUser(user) {
      axios
        .delete('/api/admin/deleteuser/' + user.id, { data: { authUserId: this.authUserId } })
        .then(response => {
          Vue.toasted.success(response.data.msg);
          this.getUsers();
        })
        .catch(error => {
          Vue.toasted.error('エラーが発生しました');
        });
    },
    searchResult() {
      axios
        .get('/api/admin/searchusers/' + this.selectedSearchParameter + '/' + this.searchWord)
        .then(response => {
          this.users = response.data;
        })
        .catch(error => {
          Vue.toasted.error('入力にエラーがあります');
        });
    },
  },
};
</script>

<style scoped>
.user-list-container {
  align-content: center;
  align-items: center;
}
</style>
