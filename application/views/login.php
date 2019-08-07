
<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <?php echo validation_errors(); ?>

            <?php if(!empty($errors)) {
                echo $errors;
            } ?>

            <form action="<?php echo base_url('auth/login') ?>" method="POST">
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                        <label for="email">Email address</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me">
                            Remember Password
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.html">Register an Account</a>
                <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>