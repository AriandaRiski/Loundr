<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: arial;
            text-decoration: none;
        }

        body {
            background: #5c2fab;
        }

        a:focus,
        button:focus {
            outline: none;
        }

        .login-form {
            max-width: 470px;
            background: #673AB7;
            padding: 30px 60px;
            margin: 50px auto 0px;
        }

        .logo {
            margin: 0 auto;
            display: table;
        }

        .logo img {
            max-width: 60px;
        }

        .social-btn {
            display: flex;
            margin: 40px 0px;
            padding: 15px 0px;
            background-color: #5c2fab;
        }

        .social-btn button {
            width: 100%;
            cursor: pointer;
            border: none;
            background-color: transparent;
            font-size: 22px;
            color: #fff;
        }

        .input-box {
            width: 100%;
            height: 50px;
            position: relative;
            margin-top: 15px;
        }

        .input-box input {
            width: 100%;
            height: 50px;
            border: none;
            background: #ffffff;
            padding: 0 15px;
            font-size: 16px;
            outline: none;
            color: #5c2fab;
            border-radius: 4px;
        }

        .require-msg {
            position: absolute;
            top: -20%;
            right: 0px;
            font-size: 15px;
            background-color: #FF9800;
            color: #ffffff;
            padding: 3px 5px;
            border-radius: 4px;
        }

        .input-box input:focus+.require-msg {
            display: none;
        }

        .remember-pwd {
            margin-top: 15px;
            color: #f4f4f480;
            overflow: hidden;
            font-size: 14px;
        }

        .remember-pwd a {
            color: #f4f4f480;
            font-size: 14px;
            float: right;
        }

        .remember {
            float: left;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .checkbox {
            display: inline-block;
            width: 18px;
            height: 18px;
            background: #5c2fab;
            border-radius: 50px;
            margin-right: 10px;
            position: relative;
            border: 2px solid #fff;
        }

        .checkbox input {
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .checked {
            position: absolute;
            left: 5px;
            top: 2px;
            width: 4px;
            height: 10px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(35deg);
            display: none;
        }

        .checkbox input:checked+.checked {
            display: block;
        }

        .login-btn {
            width: 100%;
            margin-top: 30px;
            background: #5c2fab;
            border: none;
            color: #fff;
            outline: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 50px;
            padding: 15px 0px;
            transition: .3s linear;
        }

        .login-btn.active {
            background: #ffffff;
            color: #5c2fab;
        }

        .hide-msg {
            display: none;
        }

        .policy-link {
            text-align: center;
            padding: 20px 0px 0px;
            color: #f1f1f1;
            font-size: 14px;
            display: table;
            margin: 0 auto;
        }

        .new-account a {
            color: #f1f1f1;
            font-size: 14px;
        }

        .new-account {
            font-size: 14px;
            text-align: center;
            color: #f4f4f480;
            margin: 20px 0;
        }

    </style>
    <div class="login-form">
        <a href="#" class="logo"><img src="#" alt="logo"></a>

        <!-- Login by social media -->
        <div class="social-btn">
            <button type="button"><i class="fab fa-facebook-f"></i></button>
            <button type="button"><i class="fab fa-twitter"></i></button>
            <button type="button"><i class="fab fa-pinterest-p"></i></button>
            <button type="button"><i class="fab fa-instagram"></i></button>
        </div>

        <hr><br>

        <!-- Login by username and password -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-box">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="require-msg hide-msg">Required</span>
            </div>

            <div class="input-box">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="require-msg hide-msg">Required</span>
            </div>

            <div class="remember-pwd">
                <label class="remember">
                    <span class="checkbox">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="checked"></span>
                    </span>Remember me
                </label>
                <!-- <a href="#">Forgot Password?</a> -->
            </div>

            <input type="submit" value="Login" class="login-btn" disabled>
            <a href="#" class="policy-link">Our Privacy Policy</a>
        </form>
        <p class="new-account">Don't have an account? <a href="{{route('register')}}">Sign Up</a></p>
    </div>

    <script type="text/javascript">
        // Show/Hide required msg
        $(".input-box input").focusout(function() {
            if ($(this).val() == "") {
                $(this).siblings().removeClass("hide-msg");
            } else {
                $(this).siblings().addClass("hide-msg");
            }
        });

        // Login button able and disabled
        $(".input-box input").keyup(function() {
            var inputs = $(".input-box input");
            if (inputs[0].value != "" && inputs[1].value) {
                $(".login-btn").attr("disabled", false);
                $(".login-btn").addClass("active");
            } else {
                $(".login-btn").attr("disabled", true);
                $(".login-btn").removeClass("active");
            }
        });

    </script>
</body>
</html>
