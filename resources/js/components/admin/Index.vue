<template>
<div class="container">
    <div class="align-items-center justify-content-between mb-4">
        <h1 class="page-title">ユーザー一覧</h1>
    </div>

    <div class="row">
        <div class="card mx-auto">
            <div>
                <div class="alert alert-success">
                </div>
            </div>


            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <form >
                            <div class="form-row">
                                <div class="col-10">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="ユーザー名, 電話番号, メール">
                                </div>

                                <div class="col-2 align-items-right">
                                    <button type="submit" class="btn btn-primary mb-2">検索</button> 
                                </div>                           
                            </div>
                        </form>
                    </div>

                    <div class="col-12">
                        <router-link :to="{ path: '/admin/createuser'}" class="btn btn-primary mb-2">ユーザー作成</router-link>
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
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <!-- <router-link :to="{ name: }" class="btn btn-primary mb-2">変化</router-link> -->
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
}
</script>

<style scoped>

.user-list-container {
    align-content: center;
    align-items: center;
}

</style>


