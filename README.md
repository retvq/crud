Basic CRUD Functionalities on MySQL DB

<img width="665" height="405" alt="image" src="https://github.com/user-attachments/assets/641403e4-6428-4cbc-a835-88f7cf420807" />

Conencting to MySQL using sqli
```
$db = new mysqli("localhost", "root", "", "crud_app");
if ($db->connect_error) die("DB Error");
```


CREATE Option to ADD User
```
if (isset($_POST['add'])) {
    $n = $_POST['name'];
    $e = $_POST['email'];
    $db->query("INSERT INTO users (name,email) VALUES ('$n','$e')");
}
```


DELETE User
```
if (isset($_GET['delete'])) {
    $db->query("DELETE FROM users WHERE id=" . $_GET['delete']);
}
```

UPDATE User
```
if (isset($_POST['update'])) {
    $db->query("UPDATE users SET name='" . $_POST['name'] . "', email='" . $_POST['email'] . "' WHERE id=" . $_POST['id']);
}
```

READ to fetch all users
```
$users = $db->query("SELECT * FROM users");
```

**Rest code is HTML Formatting for UI**
