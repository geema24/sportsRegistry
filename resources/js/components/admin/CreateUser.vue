<template>
<div class="row col-12 mb-2">
    <div class="create-user card">
        <div class="card-header d-flex justify-content-between">
            <div class="col-8">
            <strong class="page-title">ユーザー登録</strong>
        </div>

        <div class="col-4">
            <router-link 
                :to="{ path: '/admin'}" 
                class="float-right btn btn-primary"
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
                        >
                        <span v-if="isNameInvalid" class="error-text">正しい名前を入力して下さい</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="type" class="col-md-4 col-form-label text-md-right">ユーザータイプ</label>

                    <div class="col-md-8">
                        <select
                            class="form-control" 
                            name="userTypes" 
                            required 
                            autofocus
                            aria-label="ユーザータイプ"
                            v-model="form.userType"
                        >
                            <option v-for="userType in userTypeList" :key="userType" :value="userType">
                                {{ userType }} </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                    <div class="col-md-8">
                        <input 
                            id="email" 
                            type="email" 
                            class="form-control" 
                            name="email" 
                            required 
                            placeholder="メールアドレスを入力してください" 
                            autocomplete="email"
                            v-model="form.email"
                        >
                        <span v-if="isEmailInvalid" class="error-text">正しいメールを入力して下さい</span>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">電話番号</label>

                    <div class="col-md-8">
                        <input 
                            id="phone" 
                            type="text" 
                            class="form-control" 
                            name="phone" 
                            required　
                            placeholder="電話番号を入力してください" 
                            autofocus
                            v-model="form.phone"
                        >
                        <span v-if="isPhoneInvalid" class="error-text">正しい電話番号を入力して下さい</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dob" class="col-md-4 col-form-label text-md-right">誕生日</label>

                    <div class="col-md-8">
                    <input 
                        id="dob" 
                        type="date" 
                        class="form-control" 
                        name="dob" 
                        required 
                        placeholder="誕生日を入力してください" 
                        autofocus
                        v-model="form.dob"
                    >
                    <span v-if="isDOBInvalid" class="error-text">正しい誕生日を入力して下さい</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                    <div class="col-md-8">
                        <input 
                            id="password" 
                            type="password" 
                            class="form-control" 
                            name="password" 
                            required 
                            placeholder="パスワードを入力してください" 
                            autocomplete="new-password"
                            v-model="form.password"
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_confirm" class="col-md-4 col-form-label text-md-right">パスワード確認</label>

                    <div class="col-md-8">
                        <input 
                            id="password_confirm" 
                            type="password" 
                            class="form-control" 
                            name="password_confirmation" 
                            required placeholder="同じパスワードをもう一回入力してください" 
                            autocomplete="new-password"
                            v-model="form.password_confirm"
                        >
                        <span v-if="isPasswordInvalid" class="error-text">正しいパスワードを入力して下さい</span>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="button" @click="saveUser()" class="btn btn-success">
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
            userTypeList    : ['管理者', '登録ユーザー', 'ゲスト'],
            form: {
                userType : 'ゲスト', 
                name: "",
                email : "",
                dob : null,
                password : "",
                password_confirm : "",
            },
            isDOBInvalid : null,
            isEmailInvalid : null,
            isNameInvalid : null,
            isPasswordInvalid : null,
            isPhoneInvalid : null,
        }
    },

    methods: {
        saveUser() {
            let isValid = this.validateForm();

            if(isValid) {
                axios.post("/api/admin/saveuser", this.form) 
                .then(response => {
                    this.$router.push({ path: '/admin' });
                    Vue.toasted.success('ユーザーが正常に保存されました');
                }).catch
                (error => {
                    Vue.toasted.error('保存するときエラーが発生しました');
                });
            }
            else {
                Vue.toasted.error('入力にエラーがあります');
            }
        },

        validateUserName() {
            return (typeof this.form.name !== "string") ? true : null;
        },

        validatePhone() {
            return (!(/^[0-9\s- ]*$/g).test(this.form.phone)) ? true : null;
        },

        validateDOB(){
            let current = new Date;
            const currentDate = `${current.getFullYear()}-${current.getMonth()+1}-${current.getDate()}-}`; 

            return (currentDate < this.form.dob || this.form.dob === null) ? true : null;
        },

        validatePassword() {
            if(this.form.password.length < 8 || this.form.password_confirm.length < 8 || this.form.password !== this.form.password_confirm) {
                return true;      
            }
            else {
                return null;
            }
        },

        validateEmail() {
            return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.form.email)) ? null : true;
        },

        validateForm() {
            this.isDOBInvalid = this.validateDOB();
            this.isEmailInvalid = this.validateEmail();
            this.isNameInvalid = this.validateUserName();
            this.isPhoneInvalid = this.validatePhone();
            this.isPasswordInvalid = this.validatePassword();

            if(this.isDOBInvalid || this.isEmailInvalid || this.isNameInvalid || this.isPasswordInvalid || this.isPhoneInvalid) {
                return false;
            }
            else {
                return true;
            }
        },
    }
}
</script>

<style scoped>
.col-form-label {
    font-size: 12px;
}
.card {
    min-width: max-content;
}
</style>
