<?php
    switch($_SESSION['actor_type']) {
        case 'Student': 
                require APPROOT.'/views/inc/components/sideBar/studentSideBar/student_sidebar.php';
                break;
        case 'Organization': 
                require APPROOT.'/views/inc/components/sideBar/organizationSideBar/organization_sidebar.php';
                break;
        case 'Mentor': 
                require APPROOT.'/views/inc/components/sideBar/mentorSideBar/mentor_sidebar.php';
                break;
        case 'Admin':
                require APPROOT.'/views/inc/components/sideBar/adminSideBar/admin_sidebar.php';
                break;
        default: 
                break;
    }
?>