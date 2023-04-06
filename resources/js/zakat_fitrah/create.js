$(window).on("load", () => {
    $("input[name='jumlah_jiwa']").on("input", (e) => {
        const jumlahJiwa = parseInt(e.target.value);
        const zakatPerJiwa = parseInt(
            $("#zakat-per-jiwa").attr("data-nominal")
        );

        $("input[name='nominal_zakat_fitrah']")
            .val(jumlahJiwa * zakatPerJiwa)
            .trigger("change");
    });
});
