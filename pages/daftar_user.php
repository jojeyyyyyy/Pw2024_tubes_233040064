<?php
include('../function/functions.php');

if(isset($_GET['id'], $_GET['role'])) {
    $userId = intval($_GET['id']); 
    $role = $_GET['role'];

    // Validasi role
    if($role === 'admin' || $role === 'user') {
        // Query untuk mengubah role user
        $updateQuery = "UPDATE users SET role='$role' WHERE id=$userId";

        $result = mysqli_query(koneksi(), $updateQuery); 
        if($result === false) {
            echo "Error mengubah role.";
        } else {
            // arahkan ke daftar_user.php setelah mengubah role
            header('Location: daftar_user.php');
            exit();
        }
    } else {
        echo "Role tidak valid.";
    }
}

// Ambil daftar users dari database
$users = query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Daftar User</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Role</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $i => $user) : ?>
            <tr>
                <th scope="row"><?= $i + 1; ?></th>
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['password']; ?></td>
                <td><?= $user['role']; ?></td>
                <td>
                    <a href="?id=<?= $user['id']; ?>&role=admin" class="btn btn-primary" onclick="return confirm('yakin?')">Buat Admin</a>
                    <a href="?id=<?= $user['id']; ?>&role=user" class="btn btn-success" onclick="return confirm('yakin?')">Buat User</a>
                    <a href="delete_user.php?id=<?= $user['id'];?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
