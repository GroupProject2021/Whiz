<html>
    <head>
        <style>
            body {  
                font-family: Arial, Helvetica, sans-serif;
            }                            

            .email-body{
                background-color: #FFF8F6;
                width: 600px;
                margin: 0 auto;
                height: auto;
                text-align: center;
                color: #363636;
            }

            p {
                font-size: 30px;
                height: 30px;	
            }

            .email-title {  
                background-image: linear-gradient(to right, #ffa502, #ffd79f , #f5ffac);
            }

            .email-title img {
                height: 100px;
                width: 100px;
            }

            .email-content {
                padding-top: 5px;
                padding-left: 100px;
                padding-right: 100px;
                padding-bottom: 20px;
                font-size: 14px;
                height: fit-content;
            }

            .email-admin-details {
                text-align: left;
                margin: 0 20% 0 20%;
            }

            .email-code {
                font-size: 35px;
                font-weight: bold;
                height: auto;
                line-height: 70px;
                vertical-align: middle;
            }

            .email-footer {
                margin-top: 30px;
                padding-left: 80px;
                padding-right: 80px;
                padding-bottom: 30px;
                font-size: 12px;
                color: gray;
                border-bottom: 8px solid #ffa502;
            }
            
            .copyright {
                margin-top: 40px;
                text-align: center;
                font-size: 12px;
                color: gray;
            }

            .link {
                margin-top: 30px;
                font-size: 15px;
            }
            
            .report-link {
                text-decoration: none;
                color: inherit;
            }
            
            .report-btn {
                background-color: red;
                color: white;
                padding: 10px;
                width: 30%;
                margin: 0 auto;
            }
        </style>
    </head>
<body>
    <div class="email-body">
    <div class="email-title">
        <img src="https://drive.google.com/uc?export=view&id=10XKWTckkC-tquXJYrDyQrluabr51FAJL" alt="">
    </div>					
    <p>Admin verification</p>
    <h5>[Organizational purposes only]</h5>
    <div class="email-content">
        A new admin want to access Whiz admin dhashboard. Please check the following details to identify whether he/she is an actual organizational member who need to be having the accessbility.
    </div>
    <!-- new admin details -->
    <div class="email-admin-details">
        <b>Name: </b>%name%<br>
        <b>Email: </b>%email%<br>
        <b>User role: </b>%user_role%<br>
    </div>
    <br>
    <div class="email-content">
        If you know the above mentioned personal please forward following verification code to him/her. (Feel free to use any medium to forward this verification code. For example:- email, message, from a call verbally etc.)
    </div>
    <!-- verification code -->
    <div class="email-code">%verificationCode%</div>
    <div class="email-content">
        If you dont know the above mentioned personal please report us as soon as possible, because someone may trying to illegally access the Whiz admin panel.
    </div>
    <a href="www.whiz.web.lk/reports/unauthorizedAdminAccessRequest" class="report-link">
    <div class="report-btn">
        Report
    </div>
    </a>
    <div class="email-footer">
        <div class="link">
            Visit Us: <a href="www.whiz.web.lk">www.whiz.web.lk</a>
        </div>						
    </div>
    </div>
    <div class="copyright">
        This email sent by <br>
    Whiz 2021. All rights reserved.
    </div>
</body>
</html>