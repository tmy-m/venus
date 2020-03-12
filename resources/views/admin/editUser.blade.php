<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venus Studio</title>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form class="login-form" method="POST" action="{{route('editUser', $user->id)}}">
                {{csrf_field()}}
                {{-- ID: <input type="text" name="id" value="{{$user->id}}"> --}}
                Email: <input type="email" name="email" value="{{$user->email}}">               
                Password: <input type="password" name="password">
                Name: <input type="text" name="name" value="{{$user->name}}">
                Admin: 
                <select name="admin">
                    <option value="0" selected>0</option>
                    <option value="1">1</option>
                </select>
                <button type="submit">Edit</button>
                <a href="{{route('cancel')}}">Cancel</a>
            </form>
        </div>
    </div>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);
        
        .cancel{
            background-color: red;
            color: green;
        }

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }

        .form button:hover,.form button:active,.form button:focus {
            background: #43A047;
        }

        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }

        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }
        
        .form select{
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        body {
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;      
        } 
    </style>
</body>
</html>