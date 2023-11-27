<?php

// spl_autoload_register(function ($className) {
//     $classFile = __DIR__ . '../views/classes/' . $className.'php';

//     if (file_exists($classFile)) {
//         require_once $classFile;
//     }
// });


spl_autoload_register(function ($className) {
    $classFile = __DIR__ . '../views/classes.php';

    if (file_exists($classFile)) {
        require_once $classFile;
    }
});



?>


<?php


?>