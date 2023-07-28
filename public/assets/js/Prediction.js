
var myTeam=[];
var base_url = window.location.origin;
var c=0;
// var User
    $(document).ready(function() {
        $.ajax({
            url:base_url+'/UserFavourite',
            method:'GET',
            success: function(responses){

               if (responses.length > 0) {
                    var count = 0;                
                $.each(responses, function(index, response) {
                    // Append the images from the response
                    if(count<3){
                    $("#UserFavourite").append('<li style="margin-left: -10px;"><img src="' + response.badge + '" alt=""></li> ');
                    
                    count++;
                    }
                    $("#UserFev").append('<div class="pd-5" style="display: flex; flex-direction: column; justify-content: center; align-items: center; position: relative; width: 33%; float: left;"><div><img src="' + response.badge + '" alt="" style="height: 75px; width: 75px; padding: 10px;"></div></div>');
                });
            } else {
                // If no response, append the default image
                $("#UserFavourite").append('<div><div><img src ="assets/img/no-club.png" alt="club"  style=" width: 75%; margin-left:10px "></div></div>');
            }
            console.log(responses);
            
            }
        });
    $("#show").click(function(){
    $.ajax({
        url: base_url + '/getUser',
        method: 'GET',
        success: function(responses){
            if (responses === '') {
                Swal.fire({
                    title: "Login First To Add your Favourite Club!!",
                    icon: "info",
                    showCancelButton: true, // Show the cancel button
                    confirmButtonText: "Login", // Text for the confirm button
                    cancelButtonText: "Cancel", // Text for the cancel button
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user clicks the confirm (Login) button
                        window.location.replace(base_url + '/login');
                        console.log(responses);
                        console.log('user');
                    } else if (result.isDismissed) {
                        // If the user clicks the cancel button
                        console.log('Cancelled');
                    }
                });
            } else {
                $("#hide").removeClass('hide');
                $('#myTeam').addClass('hide');
            }
        }
    });
});

        $("#clubHide").click(function(){
            $("#hide").addClass('hide');
            $('#myTeam').removeClass('hide');
        });
        $('#skloader-contest').hide();
        $('.contest').show();
    $.ajax({
        url:base_url+'/Leaguebyteam/'+0,
        method:'GET',
        success: function(responses){

            $.each(responses,function(index,response){
                var id="team-ui-"+response.league_id;
                var tid=parseInt(response.id)+'-'+parseInt(response.league_id);
                $("#"+id).append('<div class="pd-5" id="club-select-'+tid+'" style="display: flex; flex-direction: column; justify-content: center; align-items: center; position: relative; width: 33%; float: left;"><div><img src="'+response.logo_path+'"  alt="" style="height: 75px; width: 75px; "></div></div>');

                $( "#club-select-"+tid).click(function() {
                if(myTeam.indexOf(response)<0){
                    myTeam[c]=response;
                    c++;
                    $("#club-select-"+tid).append('<div id="club-select-remuve-'+tid+'" style="position: absolute; padding: 5px 10px; background: rgba(0, 0, 0, 0.5); color: green; border-radius: 2px;"><svg class="hydrated sc-bdVaJa fUuvxv" fill="#1aaf25" width="32px" height="32px" viewBox="0 0 1024 1024" rotate="0"><path d="M372.602 679.786l-180.602-180.864-64 61.014 244.602 244.064 523.398-522.988-64-61.012z"></path></svg></div>');
                }else{
                    $("#club-select-remuve-"+tid).remove();
                    delete myTeam[myTeam.indexOf(response)];
                }
                //    console.log(myTeam);
                });
            });
        }
    });
    $( "#save-team").click(function() {
        console.log(myTeam);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:base_url+'/UpdateTeam',
            data:{'users':myTeam},
            type:'POST',
            success: function(responses){
            console.log(responses);
            console.log(321);
            }
        });
    });

});

// For Modal
var $body = $('body');

$('#js-close').on('click',()=> {
  $('.my-modal').fadeOut();
  $body.removeClass('no-scroll');
});

$('#js-open').on('click',()=>{
  $('.my-modal').fadeIn();
  $body.addClass('no-scroll');
});
