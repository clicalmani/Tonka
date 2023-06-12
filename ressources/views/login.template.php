<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo assets('/assets/style.css')?>"/>
    <title>Authenticate - Login</title>
</head>
<body>
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
                <div class="d-flex align-items-center position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <h1 class="fw-bolder text-white fs-2tx pb-5 pb-md-10">Welcome to Tonka</h1>
                        <p class="fw-bold fs-2 text-white">Exploring a new way to code</p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <form class="form w-100" novalidate="novalidate" action="/auth" method="post">
                            <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">Sign In to App</h1>
                            </div>
                            <div class="d-flex flex-column mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                                <input class="form-control form-control-lg" type="text" name="email" placeholder="Email" autocomplete="off" />
                            </div>
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                    <a href="/forgot-passord" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                                </div>
                                <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" autocomplete="off" />
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-primary fw-bolder me-3 my-2 w-100">Sign In</button>
                            </div>
                            <input type="hidden" name="csrf-token" value="<?php echo csrf()?>"/>
                        </form>
                    </div>
                </div>
                <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                    <div class="d-flex flex-center fw-bold fs-6">
                        <a href="/about" class="text-muted text-hover-primary px-2">About</a>
                        <a href="/contact" class="text-muted text-hover-primary px-2">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>