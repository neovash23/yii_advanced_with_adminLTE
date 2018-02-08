/**
 * Override the default yii confirm dialog. This function is 
 * called by yii when a confirmation is requested.
 *
 * @param string message the message to display
 * @param string ok callback triggered when confirmation is true
 * @param string cancelCallback callback triggered when cancelled
 */
yii.confirm = function (message, okCallback, cancelCallback) {
   swal({
       title: message,
       type: 'warning',
       showCancelButton: true,
       closeOnConfirm: true,
       allowOutsideClick: true
   }, okCallback);
};

$('#crop_imageId').click(function(){

	setTimeout( function() 
                        {
		location.reload();

    }, 1000);
});

$('.cropModal').click(function(){
  	setTimeout( function() 
                        {
    imagewidth = $('#imageId').width()+30;
		console.log(imagewidth);

    $('.modal-content').attr(
      "style" , "width:" + imagewidth + "px"
    );

    }, 300);
})

$('#event-palette').change(function(){
  var imgLoc = $('img#palette').attr("src");
  if(imgLoc != null ){

    rep = imgLoc.slice(-6);
    imgLoc = imgLoc.replace(rep, '');
       var selected = $(this).find(":selected").index();

       if(selected == 0){
        $('img#palette').attr("src", imgLoc+'01.png');
       } else if(selected == 1){
        $('img#palette').attr("src", imgLoc+'02.png');
       } else if(selected == 2){
        $('img#palette').attr("src", imgLoc+'03.png');
       } else if(selected == 3){
        $('img#palette').attr("src", imgLoc+'04.png');     
       }
  }
});

$('div#event-status label').click(function(){
//alert($(this).children('input').val());

  if($(this).children('input').val() == 'published' ) { 
      bootbox.confirm("Are you sure you want to publish this event?", function(result) {
        if (result) {
          //alert('Thanks for confirming');
        } else {
          setTimeout(function(){
            //alert($('div#event-status label').siblings("label").eq(0).attr('class'));
          $('div#event-status label').siblings("label").eq(0).trigger('click');
          },500);
        }
      }); 


  }

});

$(document).ready(function(){


  var imgLoc = $('img#palette').attr("src");
    if(imgLoc != null ){
    rep = imgLoc.slice(-6);
    imgLoc = imgLoc.replace(rep, '');
       var selected = $(this).find(":selected").index();

       if(selected == 0){
        $('img#palette').attr("src", imgLoc+'01.png');
       } else if(selected == 1){
        $('img#palette').attr("src", imgLoc+'02.png');
       } else if(selected == 2){
        $('img#palette').attr("src", imgLoc+'03.png');
       } else if(selected == 3){
        $('img#palette').attr("src", imgLoc+'04.png');     
       }

  }
});



$(document).ready(function(){



    var level = $('#user-accesslevel').val();

      if(level >= 30){
         $('#groupID').hide();
      } else if (level == 20){
        $('#groupID').show();
      }
});

$('#user-accesslevel').change(function(){
  
  var level = $(this).val();
  if(level >= 30){
     $('div#groupID').hide();
  } else if (level == 20){
    $('div#groupID').show();
  }

});