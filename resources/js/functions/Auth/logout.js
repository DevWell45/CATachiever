document.addEventListener('DOMContentLoaded', function () {
    const logoutBtn = document.getElementById('logout');

    if (logoutBtn) {
        logoutBtn.addEventListener('click', function () {
            console.log("Logout clicked");
            document.getElementById('logout-form').submit();
        });
    }
});