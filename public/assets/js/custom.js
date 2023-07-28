//show active option latest, hottest, transfer, video

function myFunction(id) {
    if(id==1){
        $("#latest2, #transfer3, #video4").removeClass( "activ" );
        $("#hottest1").even().addClass( "activ" );
    }
    if(id==2){
        $("#hottest1, #transfer3, #video4").removeClass( "activ" );
        $("#latest2").even().addClass( "activ" );
    }
    if(id==3){
        $("#hottest1, #latest2, #video4").removeClass( "activ" );
        $("#transfer3").even().addClass( "activ" );
    }
    if(id==4){
        $("#hottest1, #latest2, #transfer3").removeClass( "activ" );
        $("#video4").even().addClass( "activ" );
    }
};

function setLocalTimeZone()
{

 var base_url = window.location.origin;
 

     $.ajax({
            url:base_url+'/set-timezone',
            method:'GET',
            success: function(responseMatches){

               
                  
            }
        });
}
//show more option in transfer new
$(document).ready(function(){

 
    // Time Zone Update using ajax */


    //show more option
    var size_item = $('.transfer_listing').length;
    var v=5;
    $('.transfer_listing').hide(); // hide all divs with class `listing`
    $('.transfer_listing:lt('+v+')').show();
    $('#transfer_load_more').click(function () {
        //alert(size_item); return false;
        v= (v+5 <= size_item) ? v+5 : size_item;
        // var abcd=$(".listing").length;
        // alert(abcd); return false;
        $('.transfer_listing:lt('+v+')').show();
        // hide load more button if all items are visible
        if($(".transfer_listing:visible").length >= size_item ){ $("#transfer_load_more").hide(); }
    });
});

//show more option in hottest new

$(document).ready(function(){
    //show more option
    var size_item = $('.hottest_listing').length;
    var v=5;
    $('.hottest_listing').hide(); // hide all divs with class `listing`
    $('.hottest_listing:lt('+v+')').show();
    $('#hottest_load_more').click(function () {
        //alert(size_item); return false;
        v= (v+5 <= size_item) ? v+5 : size_item;
        // var abcd=$(".listing").length;
        // alert(abcd); return false;
        $('.hottest_listing:lt('+v+')').show();
        // hide load more button if all items are visible
        if($(".hottest_listing:visible").length >= size_item ){ $("#hottest_load_more").hide(); }
    });
});

//show more video
$(document).ready(function(){
//show more option
    var size_item = $('.video-listing').length;
    var v=5;
    $('.video-listing').hide(); // hide all divs with class `listing`
    $('.video-listing:lt('+v+')').show();
    $('#video_load_more').click(function () {
        //alert(size_item); return false;
        v= (v+5 <= size_item) ? v+5 : size_item;
        // var abcd=$(".listing").length;
        // alert(abcd); return false;
        $('.video-listing:lt('+v+')').show();
        // hide load more button if all items are visible
        if($(".video:visible").length >= size_item ){ $("#video_load_more").hide(); }
    });
});

//show more option in latest new

//prediction 
$(document).ready(function(){
    //show more option
    var size_item = $('.listing').length;
    var v=5;
    $('.listing').hide(); // hide all divs with class `listing`
    $('.listing:lt('+v+')').show();
    $('#load_more').click(function () {
        //alert(size_item); return false;
        v= (v+5 <= size_item) ? v+5 : size_item;
        // var abcd=$(".listing").length;
        // alert(abcd); return false;
        $('.listing:lt('+v+')').show();
        // hide load more button if all items are visible
        if($(".listing:visible").length >= size_item ){ $("#load_more").hide(); }
    });
});

