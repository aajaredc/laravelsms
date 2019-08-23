$(document).ready(function(){

// This is important for ajax setup with Laravel
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

// Like button pressed
$('#like').on('click', function() {
  $numberOfLikes = 0;

  var post_id = $(this).data('id');
  //alert(post_id);
  $likeButton = $('#like');
  $dislikeButton = $('#dislike');
  if ($likeButton.hasClass('board-metaactions-item') && $likeButton.is('#like')) {
    //alert('clicked like');
  	action = 'like';
    //alert('action1' + action)
  } else if($likeButton.hasClass('board-metaactions-item-clicked') && $likeButton.is('#like')) {
    //alert('clicked unlike');
  	action = 'unlike';
  }
  //alert(action);
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
  			$likeButton.removeClass('board-metaactions-item');
  			$likeButton.addClass('board-metaactions-item-clicked');
        if ($dislikeButton.hasClass('board-metaactions-item-clicked')) {
          $dislikeButton.removeClass('board-metaactions-item-clicked');
    			$dislikeButton.addClass('board-metaactions-item');
        }
        //alert('liked');
  		} else if(action == "unlike") {
  			$likeButton.removeClass('board-metaactions-item-clicked');
  			$likeButton.addClass('board-metaactions-item');
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
  $likeButton = $('#like');
  $dislikeButton = $('#dislike');
  if ($dislikeButton.hasClass('board-metaactions-item') && $dislikeButton.is('#dislike')) {
  	action = 'dislike';
  } else if($dislikeButton.hasClass('board-metaactions-item-clicked') && $dislikeButton.is('#dislike')) {
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
  			$dislikeButton.removeClass('board-metaactions-item');
  			$dislikeButton.addClass('board-metaactions-item-clicked');
        if ($likeButton.hasClass('board-metaactions-item-clicked')) {
          $likeButton.removeClass('board-metaactions-item-clicked');
          $likeButton.addClass('board-metaactions-item');
        }
  		} else if(action == "undislike") {
  			$dislikeButton.removeClass('board-metaactions-item-clicked');
  			$dislikeButton.addClass('board-metaactions-item');
  		}
  	}
  });

});

});
