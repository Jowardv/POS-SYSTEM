<?php


require 'config/function.php'; 

if (isset($_POST['loginBtn'])) {
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if ($email != '' && $password != '') {
        $query = "SELECT id, name, email, phone, password, is_ban FROM admins WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row['password'];

            if (!password_verify($password, $hashedPassword)) {
                redirect('login.php', 'Invalid Password');
            }

            if ($row['is_ban'] == 1) {
                redirect('login.php', 'Your account has been banned. Please contact the administrator.');
            }

            // set session and redirect to admin dashboard
            $_SESSION['loggedIn'] = true;
            $_SESSION['loggedInUser'] = [
                'user_id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
            ];

            redirect('admin/index.php', 'Login Successful');

        } else {
            redirect('login.php', 'Invalid Email Address');
        }

    } else {
        redirect('login.php', 'Please fill all fields');
    }

}
?>