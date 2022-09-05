<!DOCTYPE html>
<html lang="en" class="html__responsive">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="/images/nmtis-favicon.png">
    <!--Bootstrap CSS CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
                callback: 'button',
                theme: 'dark'
            });
            $(":button").click(onloadCallback);
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
    <nav class="navbar navbar-expand-lg navbar-expand-sm navbar-expand-xsm position-fixed container-fluid">
        <div class="navbar-brand">
            <div class="navbar-brand mx-auto">
            <img href="/#" src="images/nmtis-logo-badge-full-wording.png" alt="nmtechnology-logo" class="navbar-brand img-center" width="400" height="300">
            </div><br>
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

                <h2 class="text-center">ProfessionalLow Voltage Contractors</h2>
                <br>
                <img src="images/desert.png" class="container" alt="nm-desert" width="1100" height="600">
                <br>
                <br>
                <p class="text-center">NM Technology's trained, certified and licensed technicians provide the capability, knowledge
                    and the experience to get what you need repaired or installed correctly and on time! We are here to serve Contractors and the residents of New Mexico
                    so check out the website and then give us a call and have us immediately start working on your project today!
                    </p>

                    <br/>
                <div class="item-center" id="recap-verify">
                    <form class="g-recaptcha-response form mx-auto" method="post" action="validate">
                    <recaptcha data-callback="button" id="submit" data-sitekey="6LeSowkbAAAAAH0lNBSQYDeTzQ-gyCmK8r3PPFsE"></recaptcha>
                    <br>
                    <span id="output-area"></span>
                    <a class="btn btn-outline-gold col-12 btn-lg text-gold" data-bs-toggle="submit" aria-pressed="true" value="submit"  href="/fire">Access Site</a>
                    </form> 
                </div>
    </section>
    <br>
    <br>
    <br>
    <br>
</div>

<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<!--Footer-->
<footer class="p-2 position-fixed container-fluid"><h6>©NM Technology & Integrations Solutions, LLC 2021<img src="/images/usa-icon.png" alt="nmt-logo-banner" class="float-right" width="50" height="30"></h6>
</footer>
</body>

</html>


