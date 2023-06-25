<script>
const onloadCallback = function () {
    grecaptcha.render('g-form', {
            sitekey: '**',
            callback: 'enableBtn',
            theme: 'dark'
        },
        $("g-form").click(onloadCallback))
};
</script>




<template>
    <div class="content-center flex items-center justify-center bg-blue-950 mx-auto">
        <div class="bg-blue-950">
            <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Let's Get You Verified</p>
            <p class="text-lg leading-8 flex-auto flex-col text-gray-300">As you can see were all about security, please pass our verification to continue to our site
                and prove you are a human, thank you!</p>
            <div class="bg-blue-950">
                <div class="g-recaptcha" id="g-form" data-sitekey="**" data-callback="enableBtn"></div>
                <br>
                <a href="/" class="offset-md-2 offset-lg-2 offset-sm-3">
                    <input class="disabled cursor-not-allowed rounded-md bg-lime-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                           type="button" value="Get Started" data-expired-callback="enableBtn"></a>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
