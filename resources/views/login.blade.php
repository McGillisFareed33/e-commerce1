<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
         
        .red-background {
            background-color: red; /* Arka plan rengini kırmızı yapar */
            color: white; /* Yazı rengini beyaz yapar, kontrast sağlar */
            padding: 5px; /* İçeriğin etrafında boşluk sağlar */
            margin: 10px; /* Dış boşluk sağlar */
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
            color: #555;
        }

        input {
            width: 90%;
            padding: 8px;
            margin-bottom: 15px;
            margin-right: 2px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div>
    @if ($errors->any())
    <div class="red-background">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
    <div class="login-container">
        
        <h2>Giriş Yap</h2>
        <form method="post" action="{{route('login.validate')}}">
            @csrf
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" id="username" name="username">
            
            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password">
            
            <button type="submit">Giriş</button>
        </form>
    </div>
</div>

    
</body>
</html>
