// JavaScript Document

  $(document).ready(function(){
    $('.accord a').live('click', function () {
      $(this).blur();
      if ($(this).parent().next('div').is(':visible')) {
      $(this).parent().next('div').slideUp();
    } else {
          $(this).parent().next('div').slideDown().siblings('div').slideUp();
      }
     return false;
      
    })
   });