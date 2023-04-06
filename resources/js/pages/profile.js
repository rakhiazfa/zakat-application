$(window).on("load", function () {
    $("#avatarField").on("change", function (e) {
        if (e.target.files.length > 0) {
            console.log("asd");
            var src = URL.createObjectURL(e.target.files[0]);
            var preview = document.getElementById("previewAvatar");

            preview.src = src;
        }
    });
});
