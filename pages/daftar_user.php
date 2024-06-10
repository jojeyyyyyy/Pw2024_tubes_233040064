<?php
include('functions.php');

$db = koneksi();

if (isset($_GET['id'], $_GET['role'])) {
    $userId = intval($_GET['id']);
    $role = $_GET['role'];

    $roleQuery = "SELECT id_role FROM roles WHERE role = ?";
    $roleStmt = mysqli_prepare($db, $roleQuery);
    mysqli_stmt_bind_param($roleStmt, 's', $role);
    mysqli_stmt_execute($roleStmt);
    $roleResult = mysqli_stmt_get_result($roleStmt);

    if ($roleRow = mysqli_fetch_assoc($roleResult)) {
        $id_role = $roleRow['id_role'];

        $updateQuery = "UPDATE users SET id_role=? WHERE id=?";
        $updateStmt = mysqli_prepare($db, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, 'ii', $id_role, $userId);
        $result = mysqli_stmt_execute($updateStmt);

        if ($result === false) {
            echo "Error mengubah role.";
        } else {

            header('Location: daftar_user.php');
            exit();
        }
    } else {
        echo "Role tidak valid.";
    }
}


$usersQuery = "SELECT users.id, users.username, users.email, users.password, roles.role FROM users JOIN roles ON users.id_role = roles.id_role";
$users = mysqli_query($db, $usersQuery);

if (!$users) {
    echo "Error: " . mysqli_error($db);
}
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
        <div class="d-flex justify-content-start mb-3">
            <a href="admin.php" class="btn btn-primary">Halaman admin</a>
        </div>
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
                <?php if (mysqli_num_rows($users) > 0) : ?>
                    <?php foreach ($users as $i => $user) : ?>
                        <tr>
                            <th scope="row"><?= $i + 1; ?></th>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['password']; ?></td>
                            <td><?= $user['role']; ?></td>
                            <td>
                                <a href="?id=<?= $user['id']; ?>&role=admin" class="btn btn-primary" onclick="return confirm('yakin?')">Buat Admin</a>
                                <a href="?id=<?= $user['id']; ?>&role=user" class="btn btn-success" onclick="return confirm('yakin?')">Buat User</a>
                                <a href="delete_user.php?id=<?= $user['id']; ?>" onclick="return confirm('yakin?');" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">No users found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>