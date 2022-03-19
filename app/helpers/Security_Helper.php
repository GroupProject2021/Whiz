<?php
    function URL_tamper_protection($current_actor_types, $current_specialized_actor_types) {
        $is_actor_type_matched = false;
        $is_specialized_actor_type_matched = false;

        // Check actor type is allowed
        if(in_array($_SESSION['actor_type'], $current_actor_types)) {
            $is_actor_type_matched = true;
        }
        else {
            $is_actor_type_matched = false;
        }

        // Check specialized actor type is allowed
        if(in_array($_SESSION['specialized_actor_type'], $current_specialized_actor_types)) {
            $is_specialized_actor_type_matched = true;
        }
        else {
            $is_specialized_actor_type_matched = false;
        }


        if($is_actor_type_matched == false || $is_specialized_actor_type_matched == false) {
            // if either doesn't match, redirect user to home page
            redirect('Pages/index');
        }
    }
?>