<?php require APPROOT.'/views/inc/header.php'?>
    <div class="home-grid">
        <div class="home-grid-header">
            <?php require APPROOT.'/views/inc/components/topnav.php'?>
        </div>
        <br><br>
        <div class="home-grid-main">
            <div class="showcase" style='background: url("<?php echo URLROOT.'/imgs/pages/index/main-img.jpg'; ?>") no-repeat center center/cover;'>
                <img src="<?php echo URLROOT; ?>/imgs/logo.png"width="130px" height="130px" alt="logo">
                <h2> Guider of your future. </h2>
                <p>
                Whiz is a platform that collaborate students, universities, companies, teachers <br>
                and professional guiders through our system.
                </p>
                <a href="<?php echo URLROOT; ?>/Students/register" class="showcase-btn">
                    GET STARTED
                </a>
            </div>

            <!-- students -->
            <div class="section-title">For Student</div>
            <section class="home-cards">
                <div>
                    <div class="home-card-pic">
                        <img src="<?php echo URLROOT.'/imgs/pages/index/cards/student-card-img.jpg'; ?>" alt="">
                    </div>
                    <div class="home-card-title">
                        Beginners
                    </div>
                    <div class="home-card-content">
                        If you have not sit for the O/L examination yet and still do not know what subjects can be chosen as basket subjects, we can help you. And also you can search for the university courses as well.
                    </div>
                    <div class="home-card-seemore">
                        <a href="<?php echo URLROOT; ?>/Pages/seeMore/Students/Beginner">See more <i><img class="chevron-right" src="<?php echo URLROOT.'/imgs/pages/index/chevron-right.png'; ?>" alt="" style="width: 20px; height: 20px;"></i></a>
                    </div>
                </div>
                <div>
                    <div class="home-card-pic">
                        <img src="<?php echo URLROOT.'/imgs/pages/index/cards/olqualified-card-img.jpg'; ?>" alt="">
                    </div>
                    <div class="home-card-title">
                        OL Qualified Students
                    </div>
                    <div class="home-card-content">
                        Are you still worrying about selecting A/L stream ? Then you should give a try on Whiz. We are here to help you in selecting the best stream taking your O/L results into consideration.
                    </div>
                    <div class="home-card-seemore">
                        <a href="<?php echo URLROOT; ?>/Pages/seeMore/Students/OLqualified">See more <i><img class="chevron-right" src="<?php echo URLROOT.'/imgs/pages/index/chevron-right.png'; ?>" alt="" style="width: 20px; height: 20px;"></i></a>
                    </div>
                </div>
                <div>
                    <div class="home-card-pic">
                        <img src="<?php echo URLROOT.'/imgs/pages/index/cards/alqualified-card-img.jpg'; ?>" alt="">
                    </div>
                    <div class="home-card-title">
                        AL Qualified Students
                    </div>
                    <div class="home-card-content">
                        If you are an A/L qualified student who whishes to enter to the university, Whiz can help you to select courses based on your z-score. And also you can get basic knowledge of your selected course before the university entrance.
                    </div>
                    <div class="home-card-seemore">
                        <a href="<?php echo URLROOT; ?>/Pages/seeMore/Students/ALqualified">See more <i><img class="chevron-right" src="<?php echo URLROOT.'/imgs/pages/index/chevron-right.png'; ?>" alt="" style="width: 20px; height: 20px;"></i></a>
                    </div>
                </div>
                <div>
                    <div class="home-card-pic">
                        <img src="<?php echo URLROOT.'/imgs/pages/index/cards/undergraduates-card-img.jpg'; ?>" alt="">
                    </div>
                    <div class="home-card-title">
                        Undergraduates / Graduates
                    </div>
                    <div class="home-card-content">
                        Still seeking for a job? We publish all the latest job opportunities within the industry. You can apply for them through Whiz as well.
                    </div>
                    <div class="home-card-seemore">
                        <a href="<?php echo URLROOT; ?>/Pages/seeMore/Students/UndergraduateGraduate">See more <i><img class="chevron-right" src="<?php echo URLROOT.'/imgs/pages/index/chevron-right.png'; ?>" alt="" style="width: 20px; height: 20px;"></i></a>
                    </div>
                </div>
            </section>

            <!-- organizations -->
            <br>
            <div class="section-title">For Organizations</div>
            <section class="home-cards organization">
                <div class="left">
                    <div class="title">
                        Join with us to enlarge your business.
                    </div>
                    <div class="description">
                        <!-- lll -->
                    </div>
                    <a href="<?php echo URLROOT; ?>/Organizations/register" class="left-btn">
                        GET STARTED
                    </a>
                </div>
                <div>
                    <div class="home-card-pic">
                        <img src="<?php echo URLROOT.'/imgs/pages/index/cards/company-card-img.jpg'; ?>" alt="">
                    </div>
                    <div class="home-card-title">
                        Companies
                    </div>
                    <div class="home-card-content">
                        Whiz can help you to fill institutional vacancies of your company. All you have to do is register on Whiz as a Company under Organization category and post your job notices.
                    </div>
                    <div class="home-card-seemore">
                        <a href="<?php echo URLROOT; ?>/Pages/seeMore/Organizations/Company">See more <i><img class="chevron-right" src="<?php echo URLROOT.'/imgs/pages/index/chevron-right.png'; ?>" alt="" style="width: 20px; height: 20px;"></i></a>
                    </div>
                </div>
                <div>
                    <div class="home-card-pic">
                        <img src="<?php echo URLROOT.'/imgs/pages/index/cards/university-card-img.jpg'; ?>" alt="">
                    </div>
                    <div class="home-card-title">
                        Universities
                    </div>
                    <div class="home-card-content">
                        Private universities and Semi-government universities can register under Organization category and post about intake notices and course offerings through our Whiz platform.
                    </div>
                    <div class="home-card-seemore">
                        <a href="<?php echo URLROOT; ?>/Pages/seeMore/Organizations/University">See more <i><img class="chevron-right" src="<?php echo URLROOT.'/imgs/pages/index/chevron-right.png'; ?>" alt="" style="width: 20px; height: 20px;"></i></a>
                    </div>
                </div>
            </section>

            <!-- mentors -->
            <br>
            <div class="section-title">For Mentors</div>
            <section class="home-cards mentors">
                <div>
                    <div class="home-card-pic">
                        <img src="<?php echo URLROOT.'/imgs/pages/index/cards/professionalguider-card-img.jpg'; ?>" alt="">
                    </div>
                    <div class="home-card-title">
                        Professional Guider
                    </div>
                    <div class="home-card-content">
                        If you are an organization which offers globally recognized career qualifications, Whiz is a great oppertunity for you to educate people. By registering as a professional guider under mentor category, you are permitted to post about career sessions to your enthusiast.
                    </div>
                    <div class="home-card-seemore">
                        <a href="<?php echo URLROOT; ?>/Pages/seeMore/Mentors/ProfessionalGuider">See more <i><img class="chevron-right" src="<?php echo URLROOT.'/imgs/pages/index/chevron-right.png'; ?>" alt="" style="width: 20px; height: 20px;"></i></a>
                    </div>
                </div>
                <div>
                    <div class="home-card-pic">
                        <img src="<?php echo URLROOT.'/imgs/pages/index/cards/teacher-card-img.jpg'; ?>" alt="">
                    </div>
                    <div class="home-card-title">
                        Teacher
                    </div>
                    <div class="home-card-content">
                        If you are willing to help to the Advanced Level qualified students on getting basic knowledge about their selected courses, Whiz is the best platform.
                    </div>
                    <div class="home-card-seemore">
                        <a href="<?php echo URLROOT; ?>/Pages/seeMore/Mentors/Teacher">See more <i><img class="chevron-right" src="<?php echo URLROOT.'/imgs/pages/index/chevron-right.png'; ?>" alt="" style="width: 20px; height: 20px;"></i></a>
                    </div>
                </div>
                <div class="right">
                    <div class="title">
                        Guide our students to achieve their goals.
                    </div>
                    <div class="description">
                        <!-- lll -->
                    </div>
                    <a href="<?php echo URLROOT; ?>/Mentors/register" class="right-btn">
                        GET STARTED
                    </a>
                </div>
            </section>

            
        </div>
        <div class="home-grid-footer">
            <?php require APPROOT.'/views/inc/components/bottomnav.php'?>
        </div>
    </div>
    
<?php require APPROOT.'/views/inc/footer.php'; ?> 