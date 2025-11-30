<?php
<?php

require '../config/function.php';

$paraResultId = checkParamID('id');
if (is_numeric($paraResultId)) {

    $categoryId = validate($paraResultId);

    $result = delete(tableName: 'categories', id: $categoryId);
    if ($result) {
        redirect('categories.php', 'category deleted successfully');
    } else {
        redirect('categories.php', 'something went wrong');
    }

} else {
    redirect('categories.php', 'something went wrong');
}

?>