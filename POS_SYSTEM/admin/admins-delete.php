<?php


require '../config/function.php';

$paraResultId =checkParamID('id');
if (is_numeric($paraResultId)) {

    $adminId = validate($paraResultId);

    $result = delete('admins', $adminId);
    if ($result) {
        redirect('admins.php', 'admin deleted successfully');
    } else {
        redirect('admins.php', 'something went wrong');
    }

} else {
    redirect('admins.php', 'something went wrong');
}

    

?>



