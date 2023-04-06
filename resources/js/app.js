import "./bootstrap";

$(window).on("load", () => {
    /**
     * Handle modal.
     */

    $(".modal-trigger").on("click", (e) => {
        e.stopPropagation();

        const target = e.target.getAttribute("data-target");

        $(target).trigger("modal:show");
    });

    $(".modal-cancel-trigger").on("click", (e) => {
        $(e.target).closest(".modal").trigger("modal:hide");
    });

    $(".modal").on("modal:show", (e) => {
        $(e.target).addClass("show");
    });

    $(".modal").on("modal:hide", (e) => {
        $(e.target).removeClass("show");
    });

    if ($(".modal .invalid-field").length) {
        $($(".modal .invalid-field")[0].closest(".modal")).trigger(
            "modal:show"
        );
    }

    /**
     * Handle Alert.
     */

    $(".close-alert").on("click", (e) => {
        $(e.target).closest(".alert").animate({
            opacity: 0,
        });
        setTimeout(() => $(e.target).closest(".alert").remove(), 500);
    });

    /**
     * Handle Form Trigger.
     */

    $(".form-trigger").on("click", (e) => {
        const target = $(e.target).attr("data-target");

        $(target).submit();
    });

    /**
     * Handle Click Trigger.
     */

    $(".click-trigger").on("click", (e) => {
        const target = $(e.target).attr("data-target");

        $(target).click();
    });

    /**
     * Handle Click Outside.
     */

    $(document).on("click", function (e) {
        // Modal
        if ($(e.target).closest(".modal .modal-content").length === 0) {
            $(".modal").trigger("modal:hide");
        }
    });
});
