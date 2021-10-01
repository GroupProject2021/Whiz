<?php
    /*
        --- UPLOAD IMAGE LOGIC ---

        Take the image temp name
        Set the image location+name(target)
        move the actual image(given by the temp name) to the location+name(target)
    */
    function uploadImage($img, $img_name, $location) {
         // profile picture uploading
         $target = PUBROOT.$location.$img_name;

         return move_uploaded_file($img, $target);
    }

    function updateImage($old, $img, $img_name, $location) {
        // delete old image
        unlink($old);

        // profile picture uploading
        $target = PUBROOT.$location.$img_name;

        return move_uploaded_file($img, $target);
   }
?>