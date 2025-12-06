<?php


require '../config/function.php';

$paraResultId = checkParamID('id');
if (is_numeric($paraResultId)) {

    $customerId = validate($paraResultId);

    $customer =getById('customers', $customerId);

    if($customer['status'] == 200){
        $response = delete('customers', $customerId);
        if($response){
            redirect('customer.php','customer deleted successfully');
        }
        else{
            redirect('customer.php','something went wrong');
        }
    }
    else{
        redirect('customer.php',$category['message']);
    }

    

} else {
    redirect('customer.php', 'something went wrong');
}

?>