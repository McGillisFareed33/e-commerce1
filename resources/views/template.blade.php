<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .alert-success {
            background-color: #d4edda; /* Açık yeşil arka plan */
            color: #155724; /* Koyu yeşil yazı rengi */
            padding: 10px; /* İç boşluk */
            border-radius: 5px; /* Kenarları yuvarlatma */
            display: inline-block; /* Mesajın yalnızca yazı genişliğini kaplaması için */
            font-size: 16px; /* Yazı boyutu */
        }

        .red-background {
            background-color: #f8d7da; /* Light red background */
            color: #721c24; /* Dark red text */
            padding: 15px;
            border: 1px solid #f5c6cb; /* Light red border */
            border-radius: 5px;
            position: fixed;
            top: 10px; /* Space from the top of the viewport */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%); /* Adjust horizontal position */
            z-index: 1000; /* Ensure it appears above other content */
            text-align: center;
            width: auto; /* Width adjusts to content */
            max-width: 90%; /* Limit the width to a maximum percentage */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            opacity: 1; /* Fully visible */
            transition: opacity 0.5s ease-out; /* Smooth transition for fading out */
        }
        .hidden {
            opacity: 0; /* Fully transparent */
        }
         .container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
        }

        .product-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .product-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .back-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        .container {
            display: flex; /* Flexbox kullanarak yanyana sıralama */
            width: 100%;
            gap: 20px; /* Kutucuklar arasındaki boşluk */
            justify-content: center; /* Kutucukları yatayda ortalar */
            flex-wrap: wrap; /* Ekrana sığmadığında alt satıra geçmesini sağlar */
        }

        .logout-button {
            position: fixed; /* Sabit konumda olmasını sağlar */
            top: 10px; /* Üstten 10px */
            right: 10px; /* Sağdan 10px */
            background-color: blue; /* Butonun arka plan rengi */
            color: white; /* Butonun yazı rengi */
            border: none; /* Kenarlık yok */
            padding: 10px 20px; /* İç boşluk */
            border-radius: 5px; /* Köşeleri yuvarlar */
            cursor: pointer; /* İmleci işaretçi yapar */
            z-index: 1001; /* Diğer öğelerin üstünde kalmasını sağlar */
        }

        .logout-button:hover {
            background-color: darkblue; /* Hover durumunda butonun rengi değişir */
        }

        .sidebar {
            width: 200px;
            background-color: #333;
            color: white;
            height: 100vh;
            padding: 15px;
            box-sizing: border-box;
        }

        .sidebar h3 {
            color: #fff;
            text-align: center;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 10px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 8px;
            border-radius: 4px;
        }

        .sidebar ul li a:hover {
            background-color: red;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        h1 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button style= "position: absolute; top: 10px; right: 20px;" type="submit" class="btn btn-danger">Çıkış Yap</button>
    </form>
    @if ($errors->any())
    <div class="red-background">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
    <div class="sidebar">
        
        <h3>Menü</h3>
        <ul>
            <li><a href="{{ route('user.list') }}">Kullanıcı Listesi</a></li>
            <li><a href="{{ route('user.create') }}">Kullanıcı Ekleme</a></li>
            <li><a href="{{ route('category.list') }}">Kategori Listesi</a></li>
            <li><a href="{{ route('category.create') }}">Kategori Ekleme</a></li>
            <li><a href="{{ route('product.list') }}">Ürün Listesi</a></li>
            <li><a href="{{ route('product.create') }}">Ürün Ekleme</a></li>
        </ul>
    </div>
    
    <div class="content">
        @yield('content')
    </div>
    

</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select the error message container
        var errorBox = document.querySelector('.red-background');
    
        if (errorBox) {
            // Set a timeout to hide the error box after 2 seconds
            setTimeout(function() {
                errorBox.classList.add('hidden');
            }, 2000); // 2000 milliseconds = 2 seconds
        }
    });
    </script>