<?php

include('../config/function.php');

if(isset($_POST['saveAdmin']))
    
{

    $name =validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) == true ? 1 : 0;



    if($name !='' && $email !='' && $password !='' ){

        $emailCheck = mysqli_query($conn, "SELECT * FROM admins WHERE email='$email' ");
        if($emailCheck){
            if(mysqli_num_rows($emailCheck) > 0){
                redirect( 'admins-create.php', 'Email already exists' );

            }
        }

        $bcrypt_password = password_hash( $password, PASSWORD_BCRYPT ); 
        $data =[
            'name' => $name,
            'email'=> $email,
            'password' => $bcrypt_password,
            'phone' => $phone,
            'is_ban' => $is_ban
        ];

        $result = insert('admins', $data);
        if($result){
                redirect( 'admins.php', 'admin created successfully' );
        }else{
            redirect( 'admins-create.php', 'something went wrong' );
        }


    }else{ 
        redirect( 'admins-create.php', 'please fill all required fields' );
    }






}

if(isset($_POST['updateAdmin'])){


    $adminId = validate($_POST['admin_id']);

    $adminData = getByID('admins', $adminId);
    if($adminData ['status']!=200){
        redirect( 'admins-edit.php?id='.$adminId, 'please fill all required fields' );
    }

    $name =validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) == true ? 1 : 0;


    if($password != ''){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    }else{
        $hashedPassword = $adminData['data']['password'];
    }

    if($name !='' && $email !=''  ){

       $data =[
            'name' => $name,
            'email'=> $email,
            'password' => $hashedPassword,
            'phone' => $phone,
            'is_ban' => $is_ban
        ];

        $result = update('admins',$adminId, $data);

        if($result){
                redirect( 'admins-edit.php?id='.$adminId, 'admin updated successfully' );
        }else{
            redirect( 'admins-edit.php?id='.$adminId, 'something went wrong' );
        }
    }
    else
    { 
        redirect( 'admins-edit.php?id='.$adminId, 'please fill all required fields' );
    }

}

?>