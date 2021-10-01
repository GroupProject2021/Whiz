<div class="review-area">
    <div class="review-title">Reviews</div>
    <div class="review-content">
        <div class="left">
            <div class="rate-no"><?php echo $data['avg_rate']; ?></div>
            <div class="rate-stars">
                <?php for($i = 1; $i <= round($data['avg_rate'], 0); $i++): ?>
                    <div class="star active"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                <?php endfor; ?>
                <?php for($i = round($data['avg_rate'], 0) + 1; $i <= 5; $i++): ?>
                    <div class="star"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                <?php endfor; ?>
            </div>
            <div class="total-text">Total Reviews</div>
            <div class="total-rate-amount">
                <div class="user-icon"><img src="<?php echo URLROOT.'/imgs/user-icon.png'; ?>" alt=""></div>
                <div class="user-count"><?php echo $data['total_reviews']; ?></div>
            </div>
        </div>
        <div class="right">
            <div class="right-content">
                <div class="rate-bar-area">
                    <div class="rate-side-no">5</div>
                    <div class="prg-bar">                                                    
                        <div class="rate-bar1" style="width: <?php echo $data['rate5']; ?>%;"></div>
                    </div>
                </div>
                <div class="rate-bar-area">
                    <div class="rate-side-no">4</div>
                    <div class="prg-bar">
                        <div class="rate-bar2" style="width: <?php echo $data['rate4']; ?>%;"></div>
                    </div>
                </div>
                <div class="rate-bar-area">
                    <div class="rate-side-no">3</div>
                    <div class="prg-bar">
                        <div class="rate-bar3" style="width: <?php echo $data['rate3']; ?>%;"></div>
                    </div>
                </div>
                <div class="rate-bar-area">
                    <div class="rate-side-no">2</div>
                    <div class="prg-bar">
                        <div class="rate-bar4" style="width: <?php echo $data['rate2']; ?>%;"></div>
                    </div>
                </div>
                <div class="rate-bar-area">
                    <div class="rate-side-no">1</div>
                    <div class="prg-bar">
                        <div class="rate-bar5" style="width: <?php echo $data['rate1']; ?>%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="interactable-show">
        <div class="write-a-review"><a href="<?php echo URLROOT.'/Reviews/add'; ?>" class="review-link">Write a review</a></div>
        <div class="see-all-reviews"><a href="<?php echo URLROOT.'/Reviews/viewAll/'.$_SESSION['current_viewing_post_id']; ?>" class="review-link">See all reviews</a></div>
    </div>
</div>