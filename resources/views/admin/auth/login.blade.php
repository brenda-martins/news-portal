<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Área Restrita</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('css/admin/main.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .message {
            display: block;
            padding: 10px;
            border: 2px solid #555555;
            border-left-width: 32px;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            border-radius: 6px;
            margin-bottom: 20px;

            font-size: 0.875em;
            font-weight: 600;


        }

        .message.error {
            color: #ee5253;
            border-color: #ee5253;
        }
    </style>
</head>

<body>
    <main id="login">
        <div class="form_login">
            <div>
                <h3 class="logo1">breaking</h3>
                <h3 class="logo2">news</h3>
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    @error('message')
                    <span class="message error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit">Entrar</button>
                    </div>

                    <!-- <div class="form-group row mb-0">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div> -->
                </form>
            </div>
        </div>
        <div>
            <div style="text-align: right; margin: 15px;">
                <i class="fas fa-sign-out-alt"></i>
                <a href="{{route('web.index')}}"> voltar ao portal</a>
            </div>
            <div style="text-align: center; margin-top: 15px;">
                <h1>Bem vindo, </h1>
                <h3> Digite suas credenciais para entrar na área administrativas</h3>
            </div>
            <div class="login_footer">
                <span class="hours">{{date('H:i')}}</span>
                <span class="day"> {{ strftime('%A, %d de %B de %Y', strtotime('today')) }}</span>
            </div>
        </div>
    </main>
</body>

</html>