<template>
  <div class="row col-12 mb-2">
    <div class="update-user card">
      <div class="card-header d-flex justify-content-between">
        <div class="col-8">
          <strong class="page-title">プレイヤー登録</strong>
        </div>

        <div class="col-4">
          <router-link :to="{ path: '/sports' }" class="float-right btn btn-primary"
            >戻る
          </router-link>
        </div>
      </div>
      <div class="card-body">
        <form>
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">メンバー名</label>

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

          <div class="form-group row">
            <label for="player_number" class="col-md-4 col-form-label text-md-right"
              >プレイヤー番号</label
            >

            <div class="col-md-8">
              <input
                id="player_number"
                type="number"
                class="form-control"
                name="player_number"
                required
                placeholder="プレイヤー番号を入力してください"
                autocomplete="player_number"
                v-model="form.player_number"
              />
              <span v-if="isEmailInvalid" class="error-text">正しいプレイヤー番号を入力して下さい</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="position" class="col-md-4 col-form-label text-md-right">位置</label>

            <div class="col-md-8">
              <input
                id="position"
                type="text"
                class="form-control"
                name="position"
                required　
                placeholder="位置を入力してください"
                autofocus
                v-model="form.position"
              />
              <span v-if="isPhoneInvalid" class="error-text">正しい位置を入力して下さい</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="age" class="col-md-4 col-form-label text-md-right">年</label>

            <div class="col-md-8">
              <input
                id="age"
                type="number"
                class="form-control"
                name="age"
                required
                placeholder="年を入力してください"
                autofocus
                v-model="form.age"
              />
              <span v-if="isDOBInvalid" class="error-text">正しい年を入力して下さい</span>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="button" @click="updateUser()" class="btn btn-success">
                登録
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
        player_number: '',
        age: 0,
        position: '',
        teamId: 0,
      },
      isDOBInvalid: null,
      isEmailInvalid: null,
      isNameInvalid: null,
      isPasswordInvalid: null,
      isPhoneInvalid: null,
    };
  },
  created() {
    this.loadMemberHistory();
  },

  methods: {
    updateUser() {
      let isValid = this.validateForm();

      if (isValid) {
        axios
          .put('/api/admin/updateMember/' + this.$route.params.id, this.form)
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

    validatePlayerNumber() {
      return typeof this.form.name !== 'string' ? true : null;
    },

    validatePosition() {
      return typeof this.form.name !== 'string' ? true : null;
    },

    validateForm() {
      this.isNameInvalid = this.validateUserName();

      if (this.validatePlayerNumber() || this.validatePosition() || this.isNameInvalid) {
        return false;
      } else {
        return true;
      }
    },

    loadMemberHistory() {
      axios
        .get('/api/admin/getMemberById/' + this.$route.params.id)
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
