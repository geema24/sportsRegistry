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
    font-size: 25px;
}
.container-fluid {
    margin-left: 10rem;
}
.app {
    width: -webkit-fill-available;
}
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  font-size: 10px;
}
.card {
    min-width: max-content;
}
.error-text {
    color: red;
}
</style>
