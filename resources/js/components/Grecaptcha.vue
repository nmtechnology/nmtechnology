<script>
const onloadCallback = function () {
    grecaptcha.render('g-form', {
            sitekey: '6LeSowkbAAAAAH0lNBSQYDeTzQ-gyCmK8r3PPFsE',
            callback: 'enableBtn',
            theme: 'dark'
        },
        $("g-form").click(onloadCallback))
};
</script>




<template>
    <div class="container">
        <div class="container mt-5">
            <div class="container img-responsive col-10 items-center" id="recap-verify">
                <div class="g-recaptcha" id="g-form" data-sitekey="6LeSowkbAAAAAH0lNBSQYDeTzQ-gyCmK8r3PPFsE" data-callback="enableBtn"></div>
                <br>
                <a href="/" class="offset-md-2 offset-lg-2 offset-sm-3">
                    <input class="rounded-md bg-lime-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-lime-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                           type="button" value="ENTER" disabled="disabled" data-expired-callback="enableBtn"></a>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
