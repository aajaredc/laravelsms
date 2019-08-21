$(document).ready(function(){

// This is important for ajax setup with Laravel
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

// Like button pressed
$('#like').on('click', function() {
  var post_id = $(this).data('id');
  //alert(post_id);
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('board-metaactions-item') && $clicked_btn.is('#like')) {
    //alert('clicked like');
  	action = 'like';
    //alert('action1' + action)
  } else if($clicked_btn.hasClass('board-metaactions-item-clicked') && $clicked_btn.is('#like')) {
    //alert('clicked unlike');
  	action = 'unlike';
  }
  $.ajax({
  	url: '/ajaxRequest',
  	type: 'POST',
  	data: {
  		'action': action,
  		'post_id': post_id
  	},
  	success: function(data){
      //alert('success');
      //alert('action2 ' + action);
  		if (action == "like") {
  			$clicked_btn.removeClass('board-metaactions-item');
  			$clicked_btn.addClass('board-metaactions-item-clicked');
        //alert('liked');
  		} else if(action == "unlike") {
  			$clicked_btn.removeClass('board-metaactions-item-clicked');
  			$clicked_btn.addClass('board-metaactions-item');
        //alert('disliked');
  		}
  	},
    error: function(xhr) {
       console.log("Error: " + xhr.statusText);
   }
  });

});

// if the user clicks on the dislike button ...
$('#dislike').on('click', function() {
  var post_id = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('board-metaactions-item') && $clicked_btn.is('#dislike')) {
  	action = 'dislike';
  } else if($clicked_btn.hasClass('board-metaactions-item-clicked') && $clicked_btn.is('#dislike')) {
  	action = 'undislike';
  }
  $.ajax({
  	url: '/ajaxRequest',
  	type: 'post',
  	data: {
  		'action': action,
  		'post_id': post_id
  	},
  	success: function(data){
  		if (action == "dislike") {
  			$clicked_btn.removeClass('board-metaactions-item');
  			$clicked_btn.addClass('board-metaactions-item-clicked');
  		} else if(action == "undislike") {
  			$clicked_btn.removeClass('board-metaactions-item-clicked');
  			$clicked_btn.addClass('board-metaactions-item');
  		}
  	}
  });

});

});
