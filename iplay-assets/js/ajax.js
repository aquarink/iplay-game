$(document).ready(function(){

	/************ Get Element by ID ************/
	function _(id) {
		return document.getElementById(id);
	}

	/*************** add favorites ***************/
	$('#addFavorite').click(function(e){

		e.preventDefault();

		// Get Vars
		var gameID   = $(this).attr('data-game');
		var bodyAttr = document.getElementsByTagName("body")[0];
	    var dataRoot = bodyAttr.getAttribute("data-root");

		$.ajax({
	      type : "GET",
	      url : dataRoot+"/favorites/add",
	      data: {'id':gameID},
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

	          // Animate
	          var addedFav = $("#addedFav");

		      addedFav.animate({opacity:'0.3'},"slow");
		      addedFav.animate({opacity:'1'},"slow");
	          
	          // Show Error Notification
	          toastr["success"](response.msg)
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
	          
	        }
	      }
	  });

	});


	/******************** AJAX COMMENT ********************/
    $("#SubmitComment").submit(function(e) {

          // Get Variables
          var postComment  = document.getElementById('postComment');
          var gameID       = postComment.getAttribute('data-game');
          var bodyAttr     = document.getElementsByTagName("body")[0];
          var dataRoot     = bodyAttr.getAttribute("data-root");

          e.preventDefault();

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
          });

          $.ajax({
              type : "POST",
              url : dataRoot+"/comments/add",
              data: {'comment':$('#commentsBox').val(), 'id':gameID},
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
                  toastr["success"](response.msg)
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
                  
                }
              }
          });
          e.preventDefault();
    });

    /******************** AJAX REPORT GAME ********************/
    $(".reportGame").click(function(e) {

          // Get Variables
          var reportGame   = document.getElementById('reportGame');
          var gameID       = reportGame.getAttribute('data-game');
          var bodyAttr     = document.getElementsByTagName("body")[0];
          var dataRoot     = bodyAttr.getAttribute("data-root");

          e.preventDefault();

          $.ajax({
              type : "GET",
              url : dataRoot+"/report",
              data: {'id':gameID},
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
                  toastr["success"](response.msg)
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
                  
                }
              }
          });
          e.preventDefault();
    });

    /********** share Game **************/
    $('.shareGame').click(function(e){

    	e.preventDefault();

    	$('#shareGameBox').toggle();

    });

});