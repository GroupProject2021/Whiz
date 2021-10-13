<div class="captcha-wrapper">
    <div class="captcha-area">
        <div class="captcha-img">
            <img src="<?php echo URLROOT; ?>/imgs/components/captcha/captcha-bg-1.jpg" alt="">
            <span class="captcha">K 4 j v Y O</span>
        </div>
        <button class="reload-btn"><img src="<?php echo URLROOT; ?>/imgs/components/captcha/reload-icon.png" alt=""></button>
    </div>
    <div class="input-area">
        <input class="captcha-input" type="text" placeholder="Enter captcha" maxlength = "6" required  name="captcha_value" id="captcha_value" value="<?php echo $data['captcha_value']; ?>">
        <button class="check-btn">Check</button>
    </div>
    <div class="status-txt"></div>
</div>
<div class="captcha-matched-alert">
    <div class="matched-tick "><img src="<?php echo URLROOT;?>/imgs/components/captcha/matched-tick-icon.png" alt=""></div>
    <div class="matched-content">Captcha matched successfully</div>
</div>

<!-- javascript -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/captcha/captcha.js"></script>