<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>

export default {
    name: 'Header'
}
</script>

<style >
.page-title {
    color: #000;
    padding-left: 5rem;
    font-size: 30px;
}
.container-fluid {
    margin-left: 20rem;
}
.app {
    width: -webkit-fill-available;
}
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  font-size: 10px;
}
</style>
