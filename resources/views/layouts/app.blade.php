<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel - @yield('title')</title>

    <link rel="icon" type="image/png" href="/favicon-32x32.png" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        * {
            font-family: 'Nunito', sans-serif;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            position: relative;
            color: #636b6f;
            margin: 0 20px;
            padding: 0 2px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .links > a:before {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            display: block;
            width: 0;
            height: 2px;
            background: #636b6f;
            transition: .3s ease;
        }

        .links > a:hover:before {
            width: 100%;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        ul li {
            margin-bottom: 5px;
        }

        ul li label {
            display: inline-block;
            width: 130px;
            text-align: right;
            font-weight: bold;
        }

        input {
            margin-left: 6px;
            padding: 2px 4px;
            border: 1px solid rgba(0, 0, 0, .1);
            background: rgba(0, 0, 0, .05);
            border-radius: 3px;
            transition: .3s ease;
        }

        input:focus {
            outline: 0;
            border-color: rgba(240, 98, 146, 0.5);
            box-shadow: 0px 0px 10px 0px rgba(240, 98, 146, 0.5);
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            border: 0;
            background: linear-gradient(to left, #F06292, #EC407A);
            padding: 5px 10px;
            color: #ffffff;
            font-size: 16px;
            font-weight: normal;
            border-radius: 3px;
            transition: .3s ease;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .btn:focus,
        .btn:hover {
            outline: 0;
            padding: 5px 20px;
            box-shadow: 0px 0px 10px 0px rgba(240, 98, 146, 0.5);
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @yield('body')
</div>
</body>
</html>
