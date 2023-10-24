<link href="<?php echo URLROOT; ?>css/style.css" rel="stylesheet">
<?php require APPROOT . '/views/inc/header2.php'; ?>

<section class="vh-100 bg-main-background">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">
                <div class="d-flex align-items-center ms-xl-6 mt-5 pt-5 justify-content-center">

                    <form action="<?php echo URLROOT; ?>user/login" method="post" style="width: 23rem;">

                        <h2 class="fw-normal mb-3 pb-3 text-center fs-1">Log in</h2>

                        <!-- Email input -->
                        <div class="form-outline my-5">
                            <label for="email" class="form-label fs-4 m-0">Email Address</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <!-- not working correctly icon section-->
                                    <span class="input-group-text material-symbols-outlined position-absolute fs-2 col-12"> mail </span>
                                </div>
                                <input type="email" name="email" placeholder="Email" class="form-control form-control-lg rounded-5 border border-4 border-dark" <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>/>
                            </div>
                            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                        </div>


                        <!-- Password input -->
                        <div class="form-outline my-5">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text material-symbols-outlined position-absolute fs-2 col-12"> lock </span>
                                </div>
                                <input type="password" name="password" placeholder="Password" class="form-control form-control-lg rounded-5 border border-4 border-dark <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"/>
                            </div>
                            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                        </div>

                        <!-- Login Button -->
                        <div class="pt-1 mb-4 ">
                            <input type="submit" value="Login" id="loginBtn" class="rounded-pill form-control form-control-lg rounded-5 border border-4 border-dark">
                        </div>

                    </form>
                </div>
            </div>

            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="https://media.gettyimages.com/id/1134383746/vector/coffee-wallpaper-pattern.jpg?s=2048x2048&w=gi&k=20&c=VQIxPcep7snuh4cyHKOMrH_CGYAPzLSRiHlSupHQsmI=" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>

        </div>
    </div>
</section>
