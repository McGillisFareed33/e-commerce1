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
