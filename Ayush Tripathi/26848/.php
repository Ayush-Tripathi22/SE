<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
                Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
                sans-serif;
        }

        form {
            border-radius: 8px;
            padding: 20px;
            width: 450px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        h1 {
            padding-bottom: 10px;
            border-bottom: 1px solid #333;
        }

        label {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        input {
            padding: 10px;
            border-radius: 5px;
        }

        form button {
            all: unset;
            cursor: pointer;
            padding: 10px;
            border-radius: 5px;
            display: grid;
            place-items: center;
            background-color: blueviolet;
            color: #fff;
        }

        p {
            all: unset;
            color: #333;
        }
    </style>
</head>

<body>
    <?php
$errors = [];
$name = $email = $password = $phone = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$phone = $_POST['phone'] ?? '';
if (empty($name)) {
$errors[] = 'Name is required';
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
$errors[] = 'Invalid email address';
}
if (empty($password)) {
$errors[] = 'Password is required';
}
if (!empty($phone) && !preg_match('/^\d{10}$/', $phone)) {
$errors[] = 'Invalid phone number';
}
if (empty($errors)) {
echo '<p>Signup successful!</p>';
} else {
echo '<ul>';
foreach ($errors as $error) {
echo '<li style="color:red;">' . $error . '</li>';
}
echo '</ul>';
}
}
?>
    <form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]); ?>"
        method="post">
        <h1>Signup</h1>
        <label for="name">
            <span class="label">Name*</span>
            <input type="text" id="name" name="name" value="<?php echo
htmlspecialchars($name); ?>">
        </label>
        <label for="email">
            <span class="label">Email*</span>
            <input type="email" id="email" name="email" value="<?php echo
htmlspecialchars($email); ?>">
        </label>
        <label for="password">
            <span class="label">Password*</span>
            <input type="password" id="password" name="password">
        </label>
        <label for="phone">
            <span class="label">Phone</span>
            <input type="text" id="phone" name="phone" value="<?php echo
htmlspecialchars($phone); ?>">
        </label>
        <button type="submit">Signup</button>
        <p>Abid Adhikari 26840/077</p>
    </form>
</body>

</html>