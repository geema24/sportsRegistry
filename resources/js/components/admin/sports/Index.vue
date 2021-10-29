<template>
  <div class="container">
    <div class="row">
      <div class="d-flex justify-content-between">
        <div class="card" v-for="sport in sports" :key="sport.id">
          <div class="card-body">
            <div>
              {{ sport.name }}
            </div>
            <router-link
              :to="{ name: 'TeamList', params: { id: sport.id } }"
              class="btn btn-primary mb-2"
            >
              チームを表示
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SportsList',
  data() {
    return {
      sports: [],
    };
  },

  created() {
    this.getSports();
  },
  methods: {
    getSports() {
      axios
        .get('/api/admin/getSports')
        .then(response => {
          this.sports = response.data;
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

.card {
  padding: 30px !important;
  margin: 30px !important;
}

.card-body {
  display: flex;
  justify-content: center;
  flex-direction: column;
}
</style>
