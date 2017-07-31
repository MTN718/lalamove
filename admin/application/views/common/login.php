<body class="login-body">
    <div class="container-fluid">
        <div class="login-page">
            <div class="login-form">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" id="login_logo" alt="logo" width="100px"/>
                <form method="post" action="<?php echo site_url('login'); ?>" name="loginform">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="username" required="required"/>
                    </div>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input id="password" class="form-control" type="password" name="password" placeholder="password"
                               required="required"/>
                    </div>
                    <p style="text-align:right;"><a href="#">Forget Password ?</a></p>
                    <button type="submit"><i class="fa fa-key"></i>&nbsp;login</button>
                </form>
            </div>
            <p class="text-center copyright_margin copyright_white_font">&#9400; Karyon Solutions. All Rights Reserved</p>
        </div>
    </div>
