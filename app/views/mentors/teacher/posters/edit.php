<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sideBar/sidebar.php'?>

        <div class="main-content">
            <!-- TOP Navigation -->
            <header>
                <?php require APPROOT.'/views/inc/components/topnav.php'?>
            </header>

            <main>
                <div class="wrapper">
                    <!-- TOP PANEL -->
                    <div class="top-panel">
                        <h1><a href="<?php echo URLROOT;?>/Posts_C_M_Posters/index">Poster</a>
                        > 
                        <?php echo $data['title']; ?>
                        > Edit</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <a href="<?php echo URLROOT;?>/Posts_C_M_Posters/index"><button class="btn8">Back</button></a>
                        <br>
                    
                        <form action="<?php echo URLROOT; ?>/Posts_C_M_Posters/edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="post-creator">
                                <div class="post-creator-image" id="post-creator-image">
                                    <img src="<?php if($data['image_name'] != null){ echo URLROOT.'/imgs/posts/posters/'.$data['image_name'];}else{ echo '';} ?>" alt="" id="image_placeholder" style="display: none;">
                                    <input type="text" name="isImageRemoved" id="isImageRemoved" style="display: none;">
                                </div>
                                <div class="post-creator-title">
                                    <input type="text" name="title" id="title" autocomplete="off" placeholder="Title" value="<?php echo $data['title']; ?>">
                                    <div class="image-select"><img src="<?php echo URLROOT.'/imgs/components/posts/add-image-icon.png'; ?>" alt="" id="addImageBtn" onclick="toggleBrowse()"></div>
                                    <div class="image-select"><img src="<?php echo URLROOT.'/imgs/components/posts/remove-image-icon.png'; ?>" alt="" id="removeImageBtn" onclick="removeImage()" style="display: none;"></div>
                                    <input type="file" name="image" id="image" onchange="displayImage(this)" style="display: none;">
                                </div>
                                <hr>
                                <div class="post-creator-content">
                                    <textarea name="body" id="body" cols="30" rows="10" placeholder="Content"><?php echo $data['body']; ?></textarea>
                                </div>
                                <br>
                                <hr>
                                <div class="interaction-detail">Session Fee
                                    <input type="text" name="session_fee" id="session_fee"  placeholder="Session Fee" value="<?php echo $data['session_fee']; ?>">
                                    <span class="form-invalid"><?php echo $data['session_fee_err']; ?></span>
                                </div>
                                <div class="interaction-detail">
                                    Maximum enroll capacity <input type="number" name="capacity" id="capacity" value = "<?php echo $data['capacity']; ?>" placeholder="capacity" min=0>
                                </div>
                                <hr>
                                <button type="submit" class="post-creator-submit">Save</button>
                            </div>
                        </form>

                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
        
        <!-- post edit javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/posts/postsEdit.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>