<?php

    function profileRedirect($myType, $actorType, $id) {
        if($myType != $actorType) {
            switch($actorType) {
                case 'Student': 
                        redirect('C_S_Settings/settings/'.$id);;
                        break;
                case 'Organization': 
                        redirect('C_O_Settings/settings/'.$id);;
                        break;
                case 'Mentor': 
                        redirect('C_M_Settings/settings/'.$id);;
                        break;
                case 'Admin':
                        redirect('C_A_Settings/settings/'.$id);;
                        break;
                default: 
                        break;
            }
        }
    }

?>