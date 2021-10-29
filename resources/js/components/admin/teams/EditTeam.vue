<template>
  <div class="row col-12 mb-2">
    <div class="update-user card">
      <div class="card-header d-flex justify-content-between">
        <div class="col-8">
          <strong class="page-title">チーム更新</strong>
        </div>

        <div class="col-4">
          <router-link :to="{ path: '/sports/team_list/' + form.sport_id }" class="float-right btn btn-primary"
            >戻る
          </router-link>
        </div>
      </div>
      <div class="card-body">
        <form>
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>

            <div class="col-md-8">
              <input
                id="name"
                type="text"
                class="form-control"
                name="name"
                required
                autocomplete="name"
                placeholder="名前を入力してください"
                autofocus
                v-model="form.name"
              />
              <span v-if="isNameInvalid" class="error-text">正しい名前を入力して下さい</span>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="button" @click="updateTeam()" class="btn btn-success">
                保存
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: '',
      },
      isNameInvalid: null,
    };
  },
  created() {
    this.loadTeamHistory();
  },

  methods: {
    updateTeam() {
      let isValid = this.validateForm();

      if (isValid) {
        axios
          .put('/api/admin/updateTeam/' + this.$route.params.id, this.form)
          .then(response => {
            this.$router.push({ path: '/sports' });
            Vue.toasted.success('ユーザーが正常に保存されました');
          })
          .catch(error => {
            Vue.toasted.error('保存するときエラーが発生しました');
          });
      } else {
        Vue.toasted.error('入力にエラーがあります');
      }
    },

    validateUserName() {
      return typeof this.form.name !== 'string' ? true : null;
    },

    validateForm() {
      this.isNameInvalid = this.validateUserName();

      if (this.isNameInvalid) {
        return false;
      } else {
        return true;
      }
    },
    loadTeamHistory() {
      axios
        .get('/api/admin/getTeamByID/' + this.$route.params.id)
        .then(response => {
          this.form = response.data;
        })
        .catch(error => {
          Vue.toasted.error('エラーが発生しました');
        });
    },
  },
};
</script>

<style scoped>
.col-form-label {
  font-size: 12px;
}
.card {
  min-width: max-content;
}
</style>
