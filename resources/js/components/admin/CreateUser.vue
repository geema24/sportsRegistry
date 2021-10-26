<template>
<div>
    <div class="align-items-center justify-content-between mb-4">
        <h1 class="page-title">ユーザー登録</h1>
    </div>

    <div class="row col-12 mb-2">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" placeholder="名前を入力してください" autofocus>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required placeholder="メールアドレスを入力してください" autocomplete="email">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">電話番号</label>

                        <div class="col-md-8">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required　placeholder="電話番号を入力してください" autofocus>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dob" class="col-md-4 col-form-label text-md-right">誕生日</label>

                        <div class="col-md-8">
                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" required placeholder="誕生日を入力してください" autofocus>
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="パスワードを入力してください" autocomplete="new-password">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード確認</label>

                        <div class="col-md-8">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="同じパスワードをもう一回入力してください" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                登録
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>
 


<script>

export default {
}
</script>

<style scoped>
.col-form-label {
    font-size: 12px;
}

</style>
