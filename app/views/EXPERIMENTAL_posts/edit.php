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
                        <h1>Posts</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <a href="<?php echo URLROOT;?>/posts/index"><button class="btn8">Back</button></a>
                        <br>
                    
                        <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="post-creator">
                                <div class="post-creator-image" id="post-creator-image">
                                    <img src="<?php if($data['image_name'] != null){ echo URLROOT.'/imgs/POSTS/'.$data['image_name'];}else{ echo '';} ?>" alt="" id="image_placeholder" style="display: none;">
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
        <script>
            const addImageBtn = document.getElementById("addImageBtn");
            const removeImageBtn = document.getElementById("removeImageBtn");
            const imageplaceholder = document.getElementById("image_placeholder");

            let inputPath = document.querySelector("#image");

            let file;

            // if image exists
            if(imageplaceholder.getAttribute('src') != ''){
                addImageBtn.style.display = "none";
                removeImageBtn.style.display = "block";
                imageplaceholder.style.display = "block";
            }

            function toggleBrowse() {
                inputPath.click();
            }

            function removeImage() {
                addImageBtn.style.display = "block";
                removeImageBtn.style.display = "none";
                imageplaceholder.style.display = "none";

                imageplaceholder.setAttribute('src', '');

                inputPath.value = null;
            }

            inputPath.addEventListener("change", function() {
                file = this.files[0];

                addImageBtn.style.display = "none";
                removeImageBtn.style.display = "block";
                imageplaceholder.style.display = "block";

                showImage();    
            });
            
            function showImage() {
                let fileType = file.type;

                let validExtensions = ["image/jpeg", "image/jpg", "image/png"];

                if(validExtensions.includes(fileType)) {
                    let fileReader = new FileReader();

                    fileReader.onload = ()=>{
                        let fileURL = fileReader.result;

                        imageplaceholder.setAttribute('src', fileURL);
                    }

                    fileReader.readAsDataURL(file);

                }
                else {
                    alert("This is not an Image file");
                }
            }
        </script>
<?php require APPROOT.'/views/inc/footer.php'; ?>