var floor_plan_expand = function() {
    var toShow = jQuery(this).next();

    if( jQuery(toShow).hasClass('active') ) {
        jQuery(toShow).removeClass('active');
        jQuery(this).html('View Floor Plans +');
    } else {
        jQuery(toShow).addClass('active');
        jQuery(this).html('Hide Floor Plans -');
    }
};

jQuery('.fp-models .view-btn').on('click', floor_plan_expand);