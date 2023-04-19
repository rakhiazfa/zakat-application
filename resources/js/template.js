$(window).on("load", () => {
    /**
     * Handle Sidebar.
     */

    $(".sidebar-toggler").on("click", (e) => {
        e.stopPropagation();

        const $sidebar = $(".admin-wrapper .sidebar");

        !$sidebar.hasClass("active")
            ? $sidebar.trigger("sidebar:show")
            : $sidebar.trigger("sidebar:hide");
    });

    $(".admin-wrapper .sidebar").on("sidebar:show", (e) => {
        $("html, body").css({
            overflow: "hidden",
            height: "100%",
        });

        $(e.target).addClass("active");
        $(".admin-wrapper .sidebar-overlay").addClass("active");
    });

    $(".admin-wrapper .sidebar").on("sidebar:hide", (e) => {
        $("html, body").css({
            overflow: "auto",
            height: "auto",
        });

        $(e.target).removeClass("active");
        $(".admin-wrapper .sidebar-overlay").removeClass("active");
    });

    /**
     * Handle Sidebar Dropdown.
     */

    function switchArrowIcon(target, isTopUp) {
        if (isTopUp) {
            $(target).removeClass("uil-angle-down");
            $(target).addClass("uil-angle-up");
        } else {
            $(target).removeClass("uil-angle-up");
            $(target).addClass("uil-angle-down");
        }
    }

    $(".admin-wrapper .sidebar .dropdown-toggler").on("click", (e) => {
        const $sidebarDropdown = $(e.target)
            .closest(".dropdown")
            .find(".dropdown-menu");

        !$sidebarDropdown.hasClass("active")
            ? $sidebarDropdown.trigger("sidebar-dropdown:show")
            : $sidebarDropdown.trigger("sidebar-dropdown:hide");
    });

    $(".admin-wrapper .sidebar .dropdown-menu").on(
        "sidebar-dropdown:show",
        (e) => {
            $(".admin-wrapper .sidebar .dropdown-menu")
                .not(e.target)
                .trigger("sidebar-dropdown:hide");

            $(e.target).addClass("active");

            const sidebarLinkHeight = $(
                ".admin-wrapper .sidebar .dropdown-menu .sidebar-link"
            ).innerHeight();

            const sidebarLinkCount = $(e.target).find(".sidebar-link").length;

            $(e.target).animate(
                {
                    height: sidebarLinkHeight * sidebarLinkCount,
                },
                150
            );

            switchArrowIcon(
                $(e.target).closest(".dropdown").find(".arrow"),
                true
            );
        }
    );

    $(".admin-wrapper .sidebar .dropdown-menu").on(
        "sidebar-dropdown:hide",
        (e) => {
            $(e.target).removeClass("active");

            $(e.target).animate(
                {
                    height: 0,
                },
                150
            );

            switchArrowIcon(
                $(e.target).closest(".dropdown").find(".arrow"),
                false
            );
        }
    );

    const $sidebarDropdownLinkActive = $(
        ".admin-wrapper .sidebar .dropdown-menu"
    ).find(".sidebar-link.active");

    if ($sidebarDropdownLinkActive.length) {
        $sidebarDropdownLinkActive
            .closest(".dropdown-menu")
            .trigger("sidebar-dropdown:show");
    }

    /**
     * Handle Topbar Dropdown.
     */

    $(".admin-wrapper .topbar .dropdown-toggler").on("click", (e) => {
        e.stopPropagation();

        const $topbarDropdown = $(e.target)
            .closest(".dropdown")
            .find(".dropdown-menu");

        !$topbarDropdown.hasClass("active")
            ? $topbarDropdown.trigger("topbar-dropdown:show", e.target)
            : $topbarDropdown.trigger("topbar-dropdown:hide", e.target);
    });

    $(".admin-wrapper .topbar .dropdown-menu").on(
        "topbar-dropdown:show",
        (e) => {
            $(e.target).addClass("active");
        }
    );

    $(".admin-wrapper .topbar .dropdown-menu").on(
        "topbar-dropdown:hide",
        (e) => {
            $(e.target).removeClass("active");
        }
    );

    /**
     * Handle Click Outside.
     */

    $(window).on("click", (e) => {
        // Sidebar
        if (!e.target.closest(".admin-wrapper .sidebar")) {
            $(".admin-wrapper .sidebar").trigger("sidebar:hide");
        }

        // Topbar Dropdown
        if (!e.target.closest(".admin-wrapper .topbar .dropdown-menu")) {
            $(".admin-wrapper .topbar .dropdown-menu").trigger(
                "topbar-dropdown:hide"
            );
        }
    });
});
