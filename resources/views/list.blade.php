<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: white;
    margin: 0;
    padding: 20px;
}
.alert-success {
            background-color: #d4edda; /* Açık yeşil arka plan */
            color: #155724; /* Koyu yeşil yazı rengi */
            padding: 10px; /* İç boşluk */
            border-radius: 5px; /* Kenarları yuvarlatma */
            display: inline-block; /* Mesajın yalnızca yazı genişliğini kaplaması için */
            font-size: 16px; /* Yazı boyutu */
}

.table-container {
    margin: 0 auto;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background-color: #007BFF;
    color: white;
}

th, td {
    padding: 12px 15px;
    text-align: left;
}

th {
    text-transform: uppercase;
    font-size: 14px;
}
/*

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f1f1f1;
}
*/
.action-buttons {
    display: flex;
    gap: 10px;
}

.edit-button {
    background-color: cyan;
    color: black;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    text-decoration: none; /* Alt çizgiyi kaldırır */
    cursor: pointer;
    transition: background-color 0.3s;
    display: inline-block; /* Buton görünümü için */
}

.edit-button:hover {
    background-color: red; /* Hover durumunda arka plan rengi değişikliği */
}
.action-buttons button {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.action-buttons button:hover {
    background-color: #218838;
}

.delete-button {
    background-color: #dc3545;
}

.delete-button:hover {
    background-color: #c82333;
}
</style>

</head>
<body>
    
    @if ($errors->any())
    <div class="red-background">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
@yield('list')

</body>
<html>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select the error message container
            var errorBox = document.querySelector('.red-background');
        
            if (errorBox) {
                // Set a timeout to add the 'hidden' class after 2 seconds
                setTimeout(function() {
                    errorBox.classList.add('hidden');
                    
                    // Remove the element from the DOM after the transition ends
                    setTimeout(function() {
                        errorBox.remove();
                    }, 2000); // Match this duration with the CSS transition time
                }, 2000); // Adjust this delay as needed
            }
        });
    </script>