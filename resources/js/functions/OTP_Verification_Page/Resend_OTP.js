const resendBtn = document.getElementById('resend_otp');

resendBtn.addEventListener('click', function(){

    resendBtn.style.pointerEvents = "none";
    resendBtn.style.opacity = "0.6";
    resendBtn.innerText = "Sending...";

    document.getElementById('resend_otp_form').submit();
});