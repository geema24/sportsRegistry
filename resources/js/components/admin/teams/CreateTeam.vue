<template>
  <div class="row col-12 mb-2">
    <div class="create-user card">
      <div class="card-header d-flex justify-content-between">
        <div class="col-8">
          <strong class="page-title">チーム作成</strong>
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

          <input id="sport_id" type="hidden" name="sport_id" v-model="form.sport_id" />
          <input type="hidden" name="_token" :value="csrf" />

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="button" @click="saveUser()" class="btn btn-success">
                チーム追加
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
      userTypeList: ['管理者', 'ゲスト'],
      form: {
        name: '',
        sport_id: '',
        author_id: '',
      },
      isNameInvalid: null,
      csrf: '',
    };
  },

  created() {
    this.initial();
  },

  methods: {
    initial() {
      this.form.sport_id = window.location.href.split('/').pop();
      this.csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      this.form.author_id = parseInt(
        document.querySelector("meta[name='user_id']").getAttribute('content'),
        10,
      );
    },

    saveUser() {
      let isValid = this.validateForm();

      if (isValid) {
        axios
          .post('/api/admin/saveTeam', this.form, {
            headers: {
              'Access-Control-Allow-Origin': '*',
              'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content'),
            },
          })
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
