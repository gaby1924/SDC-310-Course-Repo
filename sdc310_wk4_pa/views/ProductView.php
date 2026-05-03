<!-----------
Gaby Malaka
5.2.2026
SDC 310 WK 4 
------------->

<!DOCTYPE html>
<html>
<head>
    <title>Week 4 Products</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin: 20px auto; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
        th { background-color: #eee; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Products Table</h2>

<table>
    <tr>
        <th>ProductNo</th>
        <th>Product Name</th>
        <th>Product Type</th>
    </tr>

    <?php foreach ($products as $p): ?>
        <tr>
            <td><?= $p['prod_No'] ?></td>
            <td><?= $p['prod_name'] ?></td>
            <td><?= $p['prod_type'] ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
