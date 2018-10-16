jQuery(document).ready(function($) {

    $('input#description').focus( function() {
        $('label#description-prompt-text').addClass('screen-reader-text');
    });

    $('input#description').blur( function() {
        if($(this).val() == '') {
            $('label#description-prompt-text').removeClass('screen-reader-text');
        }
    });

    $(document).on( 'keydown', '#title', function( event ) {
        var keyCode = event.keyCode || event.which;
        if ( 9 == keyCode){
            event.preventDefault();
            jQuery('input#description').focus();
        }
    });

    $(document).on( 'keydown', 'input#description', function( event ) {
        var keyCode = event.keyCode || event.which;
        if ( 9 == keyCode){
            event.preventDefault();
            jQuery('#content').focus();
        }
    });

    $(document).on( 'click', 'span.active-toggle', function() {
        var i = $(this);
        var id = $(this).data('id');
        var data = {
            'action': 'wphtmlblock_active_toggle',
            'block_id': id
        };
        jQuery.post(wphtmlblock_ajax.ajax_url, data, function(response) {
            if(response == 'active') {
                i.removeClass('block-inactive dashicons-no-alt').addClass('block-active dashicons-yes');
            } else {
                i.removeClass('block-active dashicons-yes').addClass('block-inactive dashicons-no-alt');
            }
        });
    });

    $(document).on( 'click', 'pre.copy-code', function() {
        copyToClipboard($(this).html());
        $(this).parent('td').css({
            'position': 'relative'
        });
        $( this ).after( '<span id="code-copied">Copied</span>').fadeIn(500);
        //return false;
        $('span#code-copied').delay(600).fadeOut(500, function() {
            $(this).remove();
        });
    });

    function copyToClipboard( str ) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(str).select();
        document.execCommand("copy");
        $temp.remove();
    }

});