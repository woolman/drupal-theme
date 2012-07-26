if (Drupal.jsEnabled) {
  Drupal.behaviors.woolman_js = function(context) {

    $('#edit-search-theme-form-1', context).not('.processed').addClass('processed').focus(function() {
      if (this.value == 'Search this site') {
        this.value = '';
        $(this).removeClass('blur');
      }
    }).blur(function() {
      if (this.value == '') {
        $(this).addClass('blur').val('Search this site');
      }
    }).blur();

    $('.messages .message-dismiss').not('.processed').addClass('processed').click(function() {
      $(this).parent().animate({'min-height': 0, height: 0}, 200, function() {$(this).remove();});
    });

  };
}

function preventEnterSubmit(formSelector) {
  $(formSelector).find('*:input:not([type=textarea])').keypress(function(e){
    if ( e.which == 13 ){
      if ($(this).is(':checkbox') || $(this).is(':radio')) {
        if ($(this).is(':checked')) {
          $(this).removeAttr('checked');
        }
        else {
          $(this).attr('checked', 'checked');
        }
      } else {
        var focusNext = false;
        $(formSelector).find(":input:visible:not([disabled],[readonly]), a").each(function(){
          if (this === e.target) {
            focusNext = true;
          }
          else if (focusNext){
            $(this).focus();
            return false;
          }
        });
      }
      e.preventDefault();
      return false;
    }
  });
}
