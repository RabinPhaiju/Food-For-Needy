if ($('[data-profile-action]')[0]) {
    $('body').on('click', '[data-profile-action]', function(e) {
        e.preventDefault();
        var d = $(this).data('profile-action');
        document.getElementById('uploadpic').style.display = "block";
        if (d === "edit") {
            $(this).closest('.profile-block').toggleClass('toggled');
        }
        if (d === "reset") {
            $(this).closest('.profile-block').removeClass('toggled');
        }
    });
}