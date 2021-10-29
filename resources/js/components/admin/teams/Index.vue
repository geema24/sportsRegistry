<template>
  <div class="container">
    <div class="row">
      <div class="card mx-auto">
        <div class="card-header">
          <div class="align-items-center d-flex justify-content-between mb-4">
            <p>
              <strong class="page-title">{{ sportName }}</strong>
              <strong class="page-title">チーム一覧</strong>
            </p>
          </div>

          <div class="row">
            <div class="col-12">
              <form>
                <div class="form-row d-flex justify-content-between">
                  <div class="col-4 align-items-right">
                    <router-link
                      :to="{ path: '/sports/team/create/' + sportId }"
                      class="create-user-button btn btn-success mb-2"
                      >チーム作成</router-link
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
                <th>チームID</th>
                <th>チーム名</th>
                <th>チーム作成者</th>
              </tr>
            </thead>

            <tbody v-for="team in teams" :key="team.id">
              <tr>
                <td>{{ team.id }}</td>
                <td>{{ team.name }}</td>
                <td>{{ team.author }}</td>
                <td>
                  <router-link
                    :to="{ name: 'MemberList', params: { id: team.id } }"
                    class="btn btn-success mb-2"
                  >
                    チームメンバー表示
                  </router-link>
                </td>
                <td>
                  <router-link
                    :to="{ name: 'EditTeam', params: { id: team.id } }"
                    class="btn btn-primary mb-2"
                    >更新</router-link
                  >
                </td>
                <td>
                  <button @click="deleteTeam(team)" class="btn btn-warning mb-2">消去</button>
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
  name: 'TeamList',
  data() {
    return {
      teams: [],
      sportName: '',
      sportId: '',
    };
  },

  created() {
    this.getTeams();
    this.getSportById();
  },
  methods: {
    getSportById() {
      this.sportId = window.location.href.split('/').pop();
      axios
        .get('/api/admin/getSportsById/' + this.sportId)
        .then(response => {
          this.sportName = response.data ? response.data.name : '';
        })
        .catch(error => {
          Vue.toasted.error('入力にエラーがあります');
        });
    },
    getTeams() {
      this.sportId = window.location.href.split('/').pop();
      axios
        .get('/api/admin/getTeams/' + this.sportId)
        .then(response => {
          this.teams = response.data;
        })
        .catch(error => {
          Vue.toasted.error('hi');
        });
    },
    deleteTeam(team) {
      axios
        .delete('/api/admin/deleteTeam/' + team.id)
        .then(response => {
          Vue.toasted.success('チームが正常に削除されました');
          this.getTeams();
        })
        .catch(error => {
          Vue.toasted.error('エラーが発生しました');
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
