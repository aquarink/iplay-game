
/**************** AJAX READ COMMENT ****************/
$('.ReadComment').click(function(){

	var bodyAttr   = document.getElementsByTagName("body")[0];
  var dataRoot   = bodyAttr.getAttribute("data-root");
  var CommentID  = $(this).attr('data-comment');


	$.ajax({
      type : "GET",
      url : dataRoot+"/dashboard/comments/read",
      data: {'id':CommentID},
      success : function(response) {
        if (response.status == 'error') {
          var hideOldError = document.getElementById('toast-container');
          if (hideOldError) {
              hideOldError.hide();
          }
          // Show Error Notification
          toastr["error"](response.msg)
          toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "linear",
            "hideEasing": "swing",
            "showMethod": "slideDown"
          }

        }else{

          // Show Notice Box 
          $('.material-notice').show();

          var commentTXT = document.getElementById('commentTXT');

          // Success Postting 
          commentTXT.innerHTML = response.msg;
          
        }
      }
  });

  $('.removeBox').click(function() {
    $('.material-notice').hide();
  });

});



/**************** AJAX READ MESSAGE ****************/
$('.ReadMessage').click(function(){

	var MessageTxt = document.getElementById('MessageTxt');
	var bodyAttr   = document.getElementsByTagName("body")[0];
    var dataRoot   = bodyAttr.getAttribute("data-root");
    var messageID  = $(this).attr('data-message');

    // Clear String first 
    MessageTxt.innerHTML = '';

	$.ajax({
      type : "GET",
      url : dataRoot+"/dashboard/messages/read",
      data: {'id':messageID},
      success : function(response) {
        if (response.status == 'error') {
          var hideOldError = document.getElementById('toast-container');
          if (hideOldError) {
              hideOldError.hide();
          }
          // Show Error Notification
          toastr["error"](response.msg)
          toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "linear",
            "hideEasing": "swing",
            "showMethod": "slideDown"
          }

        }else{
          
          var hideOldError = document.getElementById('toast-container');
          if (hideOldError) {
              hideOldError.hide();
          }
          // Success Postting 
          MessageTxt.innerHTML = response.msg;
          
        }
      }
  });

});
