<title>login</title>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 2px solid #00ffff;
            background: linear-gradient(to right, chartreuse, gray);
            margin: 30px auto;
            border-top-right-radius: 50px;
            border-bottom-left-radius: 50px;
            max-width: 300px;
            padding: 40px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: black;
            color: white;
            padding: 8px 20px;
            margin: 8px auto;
            display: block;
            border: none;
            cursor: pointer;
            width: 40%;
        }

        button:hover {
            opacity: 0.8;
        }

        .container {
            padding: 15px;
        }

        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="{{ route('logindata') }}" method="POST" enctype="multipart/form-data">
            <h2 style="text-align: center">Login Form</h2>
            @csrf
            <div class="container">
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" autocomplete="username" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit">Login</button>
            </div>
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger" style="text-align: center">
            {{ $errors->first('error') }}
        </div>
    @endif
</body>

</html>
