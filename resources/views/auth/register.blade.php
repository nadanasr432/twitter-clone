<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('frontPage.SignUp') }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #080710;
        }

        .background {
            width: 300px;
            height: 300px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 240px;
            width: 240px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#1845ad,
                    #23a2f6);
            left: 200px;
            top: 200px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            right: 200px;
            bottom: 195px;
        }

        form {
            height: 580px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 30px 30px;
            margin: 10px,
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 5px;
            font-size: 16px;
            font-weight: 500;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        button {
            margin-top: 20px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .social {
            margin-top: 30px;
            display: flex;
        }

        .social div {
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255, 255, 255, 0.27);
            color: #eaf0fb;
            text-align: center;
        }

        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }

        .social .fb {
            margin-left: 25px;
        }

        .social i {
            margin-right: 4px;
        }


        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #080710;
            float: left;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #2C3333;
        }
    </style>
</head>

<body class="bg-gray-100">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center">

            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>

            </div>

            </li>
            <li style="float:right"><a href="{{ route('login') }}">{{ __('frontPage.Login') }}</a></li>
            </form>
        </ul>
    </nav>
    <br>
    <form action="{{ route('register') }}" method="post">
        @csrf
        @method('post')
        <div>
            <label for="name">{{ __('frontPage.Name') }}</label>
            <input type="name" id="name" name="name" placeholder={{ __('frontPage.Name') }}>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="username">{{ __('frontPage.UserName') }}</label>
            <input type="username" id="username" name="username" placeholder="UserName">
        </div>
        @error('username')
            <div>{{ $message }}</div>
        @enderror
        <div>
            <label for="email">{{ __('frontPage.Email') }}</label>
            <input type="email" id="email" name="email" placeholder={{ __('frontPage.Email') }}>
        </div>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
        <div>
            <label for="password">{{ __('frontPage.Password') }}</label>
            <input type="password" id="password" name="password" placeholder={{ __('frontPage.Password') }}>
        </div>
        @error('password')
            <div>{{ $message }}</div>
        @enderror
        <div>
            <label for="password_confirmation">{{ __('frontPage.Password again') }}</label>
            <input type="password" id="password" name="password_confirmation"
                placeholder={{ __('frontPage.Password again') }}>
        </div>
        @error('password_confirmation')
            <div>{{ $message }}</div>
        @enderror
        <div>

            <button type="submit">{{ __('frontPage.SignUp') }}</button>
            <div class="social">
            </div>


    </form>
    @yield('content')
</body>

</html>
