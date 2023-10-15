<link href="<?php echo URLROOT; ?>css/style.css" rel="stylesheet"> 
<?php require APPROOT . '/views/inc/header2.php'; ?>

<section class="vh-100 bg-main-background">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form style="width: 23rem;">

            <h2 class="fw-normal mb-3 pb-3 text-center">Log in</h3>


            <!-- Email Address -->
            <div class="form-outline my-5">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control form-control-lg material-symbols-outlined pl-5" placeholder="mail"/>
            </div>


            <!-- Password input -->
            <div class="form-outline my-5">
                <label class="form-label">Password</label>  
                <input type="password" class="form-control form-control-lg material-symbols-outlined pl-5" placeholder="lock"/>
            </div>

            <!-- Login Button -->
            <div class="pt-1 mb-4">
              <button type="button" class="btn btn-lg btn-dark rounded-pill">Log in</button>
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
