<?php
    function uploadFile($img, $img_name, $location) {
        // profile picture uploading
        $target = PUBROOT.$location.$img_name;

        return move_uploaded_file($img, $target);
   }
?>