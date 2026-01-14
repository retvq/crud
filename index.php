<?php
$db = new mysqli("localhost", "root", "", "crud_app");
if ($db->connect_error) die("DB Error");

if (isset($_POST['add'])) {
    $n = $_POST['name'];
    $e = $_POST['email'];
    $db->query("INSERT INTO users (name,email) VALUES ('$n','$e')");
}

if (isset($_GET['delete'])) {
    $db->query("DELETE FROM users WHERE id=" . $_GET['delete']);
}

if (isset($_POST['update'])) {
    $db->query("UPDATE users SET name='" . $_POST['name'] . "', email='" . $_POST['email'] . "' WHERE id=" . $_POST['id']);
}

$users = $db->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<body>

<h2>Add User</h2>
<form method="post">
    <input type="text" name="name" required>
    <input type="email" name="email" required>
    <button name="add">Add</button>
</form>

<h2>User List</h2>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Action</th></tr>
<?php while ($u = $users->fetch_assoc()) { ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= $u['name'] ?></td>
    <td><?= $u['email'] ?></td>
    <td>
        <a href="?delete=<?= $u['id'] ?>">Delete</a>
        <a href="?edit=<?= $u['id'] ?>">Edit</a>
    </td>
</tr>
<?php } ?>
</table>

<?php if (isset($_GET['edit'])) { 
    $u = $db->query("SELECT * FROM users WHERE id=" . $_GET['edit'])->fetch_assoc();
?>
<h2>Edit User</h2>
<form method="post">
    <input type="hidden" name="id" value="<?= $u['id'] ?>">
    <input type="text" name="name" value="<?= $u['name'] ?>">
    <input type="email" name="email" value="<?= $u['email'] ?>">
    <button name="update">Update</button>
</form>
<?php } ?>

</body>
</html>