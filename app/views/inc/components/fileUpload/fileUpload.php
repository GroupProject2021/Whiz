
<div class="file-form-drag-area">
    <div class="file-icon">
        <img src="<?php echo URLROOT; ?>/imgs/components/fileUpload/upload-icon.png" id="file_image_placeholder" width="90px" height="90px" alt="file_image">
    </div>
    <div class="file-right-content">
        <div class="file-description"><b>Drag & Drop to Upload File</b></div>
        <div class="file-description">Make sure that you upload a file as PDF, JPJ, JPEG or PNG.</div>
        <div class="file-form-upload">
            <input type="file" name="file_to_be_upload" id="file_to_be_upload" onchange="displayImage(this)" style="display: none;">
            Browse File
        </div>
    </div>    
</div>
<div class="form-validation">
    <div class="profile-image-validation">
        <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
        Select a file
    </div>
</div>  

<script type="text/JavaScript">
    var URLROOT = '<?php echo URLROOT; ?>';
</script>

<!-- javascipt -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/fileUpload/fileUpload.js"></script>