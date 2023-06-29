<script>

const onloadCallback = function () {
    grecaptcha.render('g-form', {
            sitekey: '6LeQOiUaAAAAAKFMZr3FD88EEbGVABvgw4pMYUny',
            callback: 'enableBtn',
            theme: 'dark'
        },
        $("g-form").click(onloadCallback))
};

export default {
    components: {
        grecaptcha,
        mounted () {
            onloadCallback();
        }
    },

};
</script>

<template>

<div class="grid grid-cols-1 relative isolate bg-blue-950">
    <div class="justify-content-baseline">
        <div class="m-20">
            <div class="justify-content-start">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="lime" class="w-14 h-12 items-center">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                </svg>
                </div>
                <p class="text-3xl font-bold tracking-tight text-white sm:text-4xl text-center">Let's Get You Verified</p>
                <p class="text-lg leading-8 flex-auto flex-col text-gray-300 text-center">As you can see were all about security, please utilize our verification to continue to our site, thank you!</p>
                <div>
                    
                    <br>
                    <a href="/" class="offset-md-2 offset-lg-2 offset-sm-3">
                    <button data-sitekey="{{ config('services.recaptcha.key') }}" data-callback="enableBtn" class="g-recaptcha justify-items-center cursor-not-allowed rounded-md bg-lime-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        type="button" value="Get Started" data-expired-callback="enableBtn" disabled="disabled">Get Started</button></a>
                </div>
                    <div class="grid grid-cols-1absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48" aria-hidden="true">
                        <div class="justify-items-center aspect-[801/1000] w-[20.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(63.1% 29.5%, 100% 17.1%, 76.6% 3%, 48.4% 0%, 44.6% 4.7%, 54.5% 25.3%, 59.8% 49%, 55.2% 57.8%, 44.4% 57.2%, 27.8% 47.9%, 35.1% 81.5%, 0% 97.7%, 39.2% 100%, 35.2% 81.4%, 97.2% 52.8%, 63.1% 29.5%)"></div>
                    </div>
        </div>
    </div>
</div>

</template>

<style scoped>

</style>
