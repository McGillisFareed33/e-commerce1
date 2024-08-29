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
    @yield('list')
</body>
<html>