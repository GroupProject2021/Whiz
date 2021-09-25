<div class="form-drag-area">
    <div class="icon">
        <img src="<?php echo URLROOT; ?>/imgs/form/profile-image-placeholder.png" id="profile_image_placeholder" width="90px" height="90px" alt="profile_image">
    </div>
    <div class="right-content">
        <div class="description">Drag & Drop to Upload File</div>
        <div class="form-upload">
            <input type="file" name="profile_image" id="profile_image" onchange="displayImage(this)" style="display: none;">
            Browse File
        </div>
    </div>    
</div>
<div class="form-validation">
    <div class="profile-image-validation">
        <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
        Select a profile picture
    </div>
</div>  


<!-- javascipt -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/imageUpload/imageUpload.js"></script>