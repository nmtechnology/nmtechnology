<!DOCTYPE HTML>
<html lang="en" class="html__responsive">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="/images/nmtis-favicon.png">
    <!--Bootstrap CSS CDN-->
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" rel="stylesheet">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Saira:200,400&display=swap" rel="stylesheet">
    <!--CSS stylesheet-->
    <link href="/css/style.css" rel="stylesheet">
    <!--aos animation-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@next/dist/aos.css">
    <!--jQuery first, then Popper.js, then Bootstrap JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!--jQuery Form, Additional Methods, Validate-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

{{--    <!--Google reCAPTCHA-->--}}
    <script>

        var onloadCallback = function () {
            grecaptcha.render('submit', {
                sitekey: '6LeSowkbAAAAAH0lNBSQYDeTzQ-gyCmK8r3PPFsE',
                callback: 'onClick',
                theme: 'dark'
            });
            $(":submit").click(onloadCallback);
        };
        console.log(onLoadCallback)
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
            async defer>
    </script>

    <title>NM Technology</title>
</head>

<body>
<!--/**background image**/-->
<div id="background-image">
    <!--Top banner with NM Technology logo fixed to top-->
    <nav class="navbar navbar-expand-lg position-fixed container-fluid">
        <div class="container-fluid">
            <div>
            <a class="navbar-brand" id="recap-button" href="/#"><img src="images/nmtech-logo-full.png" alt="nmtechnology-logo" class="navbar-brand img-fluid" width="400" height="65"></a>
            <br>

            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <img src="images/hazard-bar-yellow-cam.png" alt="hazard-bar-banner" class="container-fluid img-fluid position-fixed" width="2045" height="76">
    <br>
    <br>
    <section class="mt-5">
            <div class="container box-back flex-column">

                <h2 class="text-center">Welcome to NM Technology & Integration Solutions</h2>
                <br>
                <img src="images/nm-desert.jpeg" class="container" alt="nm-desert" width="1100" height="600">
                <br>
                <br>
                <p class="text-center">NM Technology's trained, certified and licensed technicians provide the capability, knowledge
                    and the experience to get what you need fixed or installed correctly. We are here to serve businesses and the residents of New Mexico
                    so check out the website and then give us a call and have us immediately start working on what you need today!
                    </p>

                    <br/>
                <div id="recap-verify">
                    <form class="g-recaptcha-response form" method="post">
                    <recaptcha data-callback="onClick" id="submit" data-sitekey="6LeSowkbAAAAAH0lNBSQYDeTzQ-gyCmK8r3PPFsE"></recaptcha><h6>Please complete recaptcha for access to site and make sure you are human!</h6>
                    <br>
                    <a class="btn btn-outline-success col-12 btn-lg onClick spinner-grow text-success" data-bs-toggle="onClick" aria-pressed="true" href="/fire">Access Site</a>
                    </form> </div>
                </div>
    </section>
    <br>
    <br>
    <br>
    <br>
</div>

<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<!--Footer-->
<footer class="p-2 position-fixed container-fluid"><h6>©NM Technology & Integrations Solutions, LLC 2021<img src="/images/usa-icon.png" alt="nmt-logo-banner" class="float-right" width="50" height="30"></h6>
</footer>
</body>

</html>


