<div class="interactable-rp">
    <div class="see-all-reviews"><a href="<?php echo URLROOT.'/Reviews/viewAll/'.$_SESSION['current_viewing_post_id']; ?>" class="review-link">See all reviews</a></div>
</div>

<form action="<?php echo URLROOT.'/Reviews/edit/'.$data['review_id']; ?>" method="post">
<div class="review-popup">
    <div class="header">
        <div class="profpic">
            <?php echo '<img src="'.URLROOT.'/profileimages/'.getActorTypeForIcons($_SESSION['actor_type']).'/'.$_SESSION['user_profile_image'].'?>" alt="profile_image">';?>
        </div>
        <div class="details">
            <div class="name-area">
                <div class="name"><?php echo $_SESSION['user_name']; ?></div>
                <?php if($_SESSION['status'] == 'verified'): ?>
                    <div class="verified"><img src="<?php echo URLROOT.'/imgs/components/reviewSystem/verified.png'; ?>" alt=""></div>
                <?php endif; ?>
            </div>
            <div class="actor-type"><?php echo $_SESSION['actor_type']; ?> | <?php echo $_SESSION['specialized_actor_type']; ?></div>
        </div>
    </div>
    <div class="content">
        <div class="rate-stars">
            <div class="star" id="star1" data-rating="1"><img src="<?php echo URLROOT.'/imgs/components/reviewSystem/star-icon.png'; ?>" alt=""></div>
            <div class="star" id="star2" data-rating="2"><img src="<?php echo URLROOT.'/imgs/components/reviewSystem/star-icon.png'; ?>" alt=""></div>
            <div class="star" id="star3" data-rating="3"><img src="<?php echo URLROOT.'/imgs/components/reviewSystem/star-icon.png'; ?>" alt=""></div>
            <div class="star" id="star4" data-rating="4"><img src="<?php echo URLROOT.'/imgs/components/reviewSystem/star-icon.png'; ?>" alt=""></div>
            <div class="star" id="star5" data-rating="5"><img src="<?php echo URLROOT.'/imgs/components/reviewSystem/star-icon.png'; ?>" alt=""></div>
        </div>
        <input type="text" name="rate_amount" id="rate_amount" value="0" style="display: none;">
        <div class="text">
            <textarea name="review_text" id="" cols="30" rows="10" required><?php echo $data['review_text']; ?></textarea>
        </div>
        <div>
            <input type="submit" class="btn1" value="Save">
        </div>
    </div>
</div>
</form>


<!-- javascript -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/reviewSystem/editReview.js"></script>