<?php
    function uploadFile($img, $img_name, $location) {
        // file uploading
        $target = PUBROOT.$location.$img_name;

        return move_uploaded_file($img, $target);
   }

   function updateFile($old, $img, $img_name, $location) {
    // delete old file
    unlink($old);

    // file uploading
    $target = PUBROOT.$location.$img_name;

    return move_uploaded_file($img, $target);
}

function deleteFile($img) {
    // delete old file
    if(unlink($img)) {
        return true;
    }
    else{
        return false;
    }        
}
?>