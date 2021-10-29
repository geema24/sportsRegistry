<template>
  <div class="container">
    <div class="row">
      <div class="card mx-auto">
        <div class="card-header">
          <div class="align-items-center d-flex justify-content-between mb-4">
            <p>
              <strong class="page-title">チームメンバー一覧</strong>
            </p>
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
                      placeholder="プレイヤー名, プレイヤー番号, 年"
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
                      :to="{ path: '/sports/team/add/member/' + teamId }"
                      class="create-user-button btn btn-success mb-2"
                      >プレーヤー追加</router-link
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
                <th>プレイヤーID</th>
                <th>プレイヤー名</th>
                <th>位置</th>
                <th>プレイヤー番号</th>
                <th>年</th>
              </tr>
            </thead>

            <tbody v-for="member in members" :key="member.id">
              <tr>
                <td>{{ member.id }}</td>
                <td>{{ member.name }}</td>
                <td>{{ member.position }}</td>
                <td>{{ member.player_number }}</td>
                <td>{{ member.age }}</td>
                <td>
                  <router-link
                    :to="{ path: '/sports/team/edit/member/' + member.id }"
                    class="btn btn-primary mb-2"
                    >更新</router-link
                  >
                </td>
                <td>
                  <button @click="deleteUser(member)" class="btn btn-warning mb-2">消去</button>
                </td>
              </tr>
            </tbody>
          </table>

          <div class=" download-button">
            <button @click="downloadTeamData()" class="btn btn-success mb-2">ダウンロード</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'TeamList',
  data() {
    return {
      teamName: '',
      members: [],
      selectedSearchParameter: '',
      searchParameters: ['プレイヤー名', 'プレイヤー番号', '年'],
      searchWord: '',
      teamId: '',
    };
  },

  created() {
    this.getMembers();
  },
  methods: {
    getMembers() {
      this.teamId = window.location.href.split('/').pop();
      axios
        .get('/api/admin/getMembers/' + this.teamId)
        .then(response => {
          this.members = response.data;
        })
        .catch(error => {
          Vue.toasted.error('エラーが発生しました');
        });
    },
    deleteUser(member) {
      axios
        .delete('/api/admin/deleteMember/' + member.id)
        .then(response => {
          Vue.toasted.success('ユーザーレコードが正常に削除されました');
          this.getMembers();
        })
        .catch(error => {
          Vue.toasted.error('エラーが発生しました');
        });
    },
    searchResult() {
      axios
        .get('/api/admin/searchMembers/' + this.selectedSearchParameter + '/' + this.searchWord)
        .then(response => {
          this.members = response.data;
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
.download-button {
  display: flex;
  flex-direction: column;
}
</style>
