<link href="<?php echo URLROOT; ?>css/style.css" rel="stylesheet">
<?php require APPROOT . '/views/inc/header2.php'; ?>


<section class="vh-50 bg-main-background">
    <div class="row">
        <div class="col-sm-6 text-black">
            <div class="d-flex align-items-center ms-xl-6 mt-5 pt-5 justify-content-center">


                <form action="<?php echo URLROOT; ?>user/login" method="post" style="width: 23rem;">


                    <h2 id="title" class="fw-normal mb-3 pb-3 text-center">Log in</h2>


                    <!-- Email input -->
                    <div class="form-outline my-5">
                        <label id="form-label" for="email" class="form-label fs-5 m-0">Email Address</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label>
                                    <input type="email" name="email" id="email" placeholder="Email" class="fs-4 shadow-none form-control rounded-pill form-control form-control-lg rounded-5 border border-5" <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>/>
                                </label>
                            </div>
                        </div>
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline pt-1 mb-4 my-5">
                        <label id="form-label" for="password" class="form-label fs-5">Password</label>
                        <div class="input-group">
                            <label>
                                <input type="password" name="password" id="password" placeholder="Password" class="fs-4 shadow-none form-control form-control-lg rounded-5 border border-5 <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" />
                            </label>
                        </div>
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>


                    <!-- Login Button -->
                    <div class="pt-1 mb-4 my-5">
                        <input type="submit" value="Login" id="loginBtn" class="fs-4 rounded-pill form-control form-control-lg rounded-5 ">
                    </div>
                </form>
            </div>
        </div>


        <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="https://media.gettyimages.com/id/1134383746/vector/coffee-wallpaper-pattern.jpg?s=2048x2048&w=gi&k=20&c=VQIxPcep7snuh4cyHKOMrH_CGYAPzLSRiHlSupHQsmI=" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
        </div>


    </div>
</section>
