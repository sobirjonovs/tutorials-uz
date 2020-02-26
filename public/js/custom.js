
$('.multi-level-dropdown .dropdown-submenu > a').on("mouseenter", function(e) {
    var submenu = $(this);
    $('.multi-level-dropdown .dropdown-submenu .dropdown-menu').removeClass('show');
    submenu.next('.dropdown-menu').addClass('show');
    e.stopPropagation();
  });

  $('.multi-level-dropdown .dropdown').on("hidden.bs.dropdown", function() {
    // hide any open menus when parent closes
    $('.multi-level-dropdown .dropdown-menu.show').removeClass('show');
  });