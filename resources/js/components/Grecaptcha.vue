<script>
const onloadCallback = function () {
    grecaptcha.render('g-form', {
            sitekey: '6LeQOiUaAAAAAKFMZr3FD88EEbGVABvgw4pMYUny',
            callback: 'enableBtn',
            theme: 'dark'
        },
        $("g-form").click(onloadCallback))
};
</script>




<template><div class="relative isolate">
    <svg class="absolute inset-x-0 top-0 -z-10 h-[38rem] w-full stroke-gray-200 [mask-image:radial-gradient(32rem_28rem_at_center,white,transparent)]" aria-hidden="true">
        <defs>
            <pattern id="1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84" width="200" height="50" x="50%" y="-1" patternUnits="userSpaceOnUse">

            </pattern>
        </defs>
            <svg x="50%" y="-1" class="overflow-hidden">
                <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" stroke-width="0" />
            </svg>
        <rect width="100%" height="60%" stroke-width="4" fill="url(#1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84)" />
    </svg>
</div>
    <div class="flex justify-center bg-blue-950">
        <div class="bg-blue-950 m-40">

            <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl text-center">Let's Get You Verified</p>
            <p class="text-lg leading-8 flex-auto flex-col text-gray-300 text-center">As you can see were all about security, please utilize our verification to continue to our site
                to prove you are human, thank you!</p>

            <div class="bg-blue-950">
                <div class="g-recaptcha" id="g-form" data-sitekey="6LeQOiUaAAAAAKFMZr3FD88EEbGVABvgw4pMYUny" data-callback="enableBtn"></div>
                <br>
                <a href="/" class="offset-md-2 offset-lg-2 offset-sm-3">
                    <input class="cursor-not-allowed rounded-md bg-lime-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                           type="button" value="Get Started" data-expired-callback="enableBtn"></a>
            </div>

        </div>
    </div>

</template>

<style scoped>

</style>
