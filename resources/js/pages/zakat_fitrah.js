$(window).on("load", () => {
    $("input[name='jenis_barang']").on("change", (e) => {
        if (e.target.value == "uang") {
            $("input[name='jumlah_beras']").val("");

            $("input[name='jumlah_beras']").prop("disabled", true);
            $("input[name='nominal_zakat_fitrah']").removeAttr("disabled");
        } else if (e.target.value == "beras") {
            $("input[name='nominal_zakat_fitrah']").val("");

            $("input[name='nominal_zakat_fitrah']").prop("disabled", true);
            $("input[name='jumlah_beras']").removeAttr("disabled");
        }

        $("input[name='jumlah_jiwa']").trigger("input");
    });

    $("input[name='jumlah_jiwa']").on("input", (e) => {
        const jumlahJiwa = parseFloat(e.target.value);

        if ($("input[name='jenis_barang']:checked").val() == "uang") {
            const zakatPerJiwa = parseFloat(
                $("#zakat-per-jiwa-uang").attr("data-nominal")
            );

            $("input[name='nominal_zakat_fitrah']")
                .val(jumlahJiwa * zakatPerJiwa)
                .trigger("change");
        } else if ($("input[name='jenis_barang']:checked").val() == "beras") {
            const zakatPerJiwa = parseFloat(
                $("#zakat-per-jiwa-beras").attr("data-nominal")
            );

            $("input[name='jumlah_beras']")
                .val(jumlahJiwa * zakatPerJiwa)
                .trigger("change");
        }
    });
});
