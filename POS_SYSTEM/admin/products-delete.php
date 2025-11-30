<?php

require '../config/function.php';

$paraResultId = checkParamID('id');
if (is_numeric($paraResultId)) {

    $productId = validate($paraResultId);

    // Fetch product to get image path so we can delete the file as well
    $product = getByID('products', $productId);
    if ($product && isset($product['status']) && $product['status'] == 200) {
        $imagePath = $product['data']['image'] ?? '';
        if (!empty($imagePath)) {
            $deletePath = '..' . $imagePath; // imagePath stored like /assets/...
            if (file_exists($deletePath)) {
                @unlink($deletePath);
            }
        }

        $result = delete('products', $productId);
        if ($result) {
            redirect('products.php', 'product deleted successfully');
        } else {
            redirect('products.php', 'something went wrong');
        }

    } else {
        redirect('products.php', 'no such product found');
    }

} else {
    redirect('products.php', 'something went wrong');
}

?>
