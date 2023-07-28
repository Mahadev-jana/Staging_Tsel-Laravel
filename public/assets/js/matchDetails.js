    var base_url = window.location.origin;
    // const tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
    // document.cookie='fcookie='+tz;
    // function headToHead(homeTeamId,awayTeamId) {
    //     var homeTeamId= homeTeamId;
    //     var awayTeamId= awayTeamId;
    $(document).ready(function() {
        var homeTeamId=document.getElementsByName('homeTeamId')[0].value;

        var awayTeamId= document.getElementsByName('awayTeamId')[0].value;

        var match_id= document.getElementsByName('match_id')[0].value;
        myTimeline();
        // console.log(match_id);
        $.ajax({
            url:base_url+'/players/'+match_id,
            method:'GET',
            success: function(responseMatches){

                
                  $("#sk_loader_match_details_player").hide();
                  $("#player_info").show();
                

                // console.log(responseMatches);
                $.each(responseMatches.playersStats.final_passes, function(index,response){
                        $("#final_passes").append('<tr><td class="one"><img src="'+response.team_logo+'" alt="" class="player-img"></td><td class="ver-mid">'+response.players_name+'</td><td class="one"><img src="'+response.players_logo+'" alt="" class="player-img"></td><td class="text-right"><strong>'+response.passes_total+'</strong> /<strong>'+response.passes_success+'</strong></td></tr>');
                });
                $.each(responseMatches.playersStats.final_passingAccuracy, function(index,response){
                    $("#final_passingAccuracy").append('<tr><td class="one"><img src="'+response.team_logo+'" alt="" class="player-img"></td><td class="ver-mid">'+response.players_name+'</td><td class="one"><img src="'+response.players_logo+'" alt="" class="player-img"></td><td class="text-right"><strong>'+response.passing_accuracy+'%</strong></td></tr>');
                });
                $.each(responseMatches.playersStats.final_crosses, function(index,response){
                    $("#final_crosses").append('<tr><td class="one"><img src="'+response.team_logo+'" alt="" class="player-img"></td><td class="ver-mid">'+response.players_name+'</td><td class="one"><img src="'+response.players_logo+'" alt="" class="player-img"></td><td class="text-right"><strong>'+response.crosses_accuracy+'</strong>/<strong>'+response.crosses_total+'</strong></td></tr>');
                });
                $.each(responseMatches.playersStats.final_shots, function(index,response){
                    $("#final_shots").append('<tr><td class="one"><img src="'+response.team_logo+'" alt="" class="player-img"></td><td class="ver-mid">'+response.players_name+'</td><td class="one"><img src="'+response.players_logo+'" alt="" class="player-img"></td><td class="text-right"><strong>'+response.shots_goal+'</strong>/<strong>'+response.shots_onTarget+'</strong>/<strong>'+response.shots_total+'</strong></td></tr>');
                });
                $.each(responseMatches.playersStats.final_changesCreated, function(index,response){
                    $("#final_changesCreated").append('<tr><td class="one"><img src="'+response.team_logo+'" alt="" class="player-img"></td><td class="ver-mid">'+response.players_name+'</td><td class="one"><img src="'+response.players_logo+'" alt="" class="player-img"></td><td class="text-right"><strong>'+response.created_assists+'</strong>/<strong>'+response.created_chances+'</strong></td></tr>');
                });
            }
        });

        $.ajax({
            url:base_url+'/HandToHand/'+homeTeamId+'/'+awayTeamId,
            method:'GET',
            success: function(responseMatches){
                if(responseMatches['statusOfGame'] != null){
                    $("#wins").append(responseMatches['statusOfGame']['win']);
                    $("#draw").append(responseMatches['statusOfGame']['draw']);
                    $("#loss").append(responseMatches['statusOfGame']['loss']);
                }
                $.each(responseMatches['matches'],function(index,response){
                    if(response['date']!=null){
                        var dayInformation = String(moment(response['date']));
                        var position = dayInformation.indexOf(" ");
                        let result = dayInformation.substring(0, position);
                        $("#matchHead").append('<tr><td width="50" class="text-date"><time datetime="1639161000000">'+result+'<br>'+response['date']+'</time> </td><td> <div class="col-xs-2 handToHand" ><p>'+response['homeTeam']+'</p></div><div class="col-xs-2 handToHand" ><img class="handToHandimg" src="'+response['homeTeamLogo']+'"></div><div class="col-xs-4 handToHand" ><strong>'+response['homeTeamScore']+' - '+response['awayTeamScore']+'</strong></div><div class="col-xs-2 handToHand"><img class="handToHandimg" src="'+response['awayTeamLogo']+'"></div><div class="col-xs-2 handToHand" ><p>'+response['awayTeam']+'</p></div></td></tr>');
                    }

                });
            }
        });


        var size_item = $('.listing').length;
        var v=3;
        $('.listing').hide(); // hide all divs with class `listing`
        $('.listing:lt('+v+')').show();
        $('#load_more').click(function () {
            //alert(size_item); return false;
            v= (v+3 <= size_item) ? v+3 : size_item;
            // var abcd=$(".listing").length;
            // alert(abcd); return false;
            $('.listing:lt('+v+')').show();
            // hide load more button if all items are visible
            if($(".listing:visible").length >= size_item ){ $("#load_more").hide(); }
        });

        let activity = $('.activity')
        for (var i=0; i<10; i++) {
            activity.clone().appendTo('#timeline')
        }
    })
    function myTimeline() {
       
         $("#sk_loader_match_details_timeline").show();
        var match_id= document.getElementsByName('match_id')[0].value;
        $.ajax({
            url:base_url+'/matchTimeline/'+match_id,
            method:'GET',
            success: function(responseMatches){
                var shortComment;
                var img;

                
 
                $("#sk_loader_match_details_timeline").hide();
                 $("#timeline").show();
                
                $.each(responseMatches['comments'], function(index,response){

                    if(response.comment.search("Foul")>=0){
                        // console.log(response.comment);
                        shortComment="FOUL";
                        img ="/assets/img/detail-match/icon-timeline/Group 114.png";
                    }else if(response.comment.search("Corner")>=0){
                        img ="/assets/img/icon-timeline/corner.png";
                        shortComment="CORNER";
                    }else if(response.comment.search("yellow card")>=0){
                        shortComment="YELLOW CARD";
                        img ="/assets/img/icon-timeline/Group 117.png";
                    }else if(response.comment.search("Substitution")>=0){
                        shortComment="SUBSTITUTION";
                        img ="/assets/img/icon-timeline/Group 120.png";
                    }else if(response.comment.search("free kick")>=0){
                        shortComment="FREE KICK";
                        img ="/assets/img/icon-timeline/Group 115.png";
                    }else if(response.comment.search("goal")>=0 || response.comment.search("Goal!")>=0){
                        shortComment="GOAL";
                        img ="/assets/img/icon-timeline/Group 121.png";
                    }else if(response.comment.search("finished")>=0){
                        shortComment="GAME FINISHED";
                        img ="/assets/img/detail-match/icon-timeline/Group 114.png";
                    }else if(response.comment.search("First Half ended ")>=0){
                        shortComment="FIRST HALF END";
                        img ="/assets/img/detail-match/icon-timeline/Group 114.png";
                    }else if(response.comment.search("First Half ended ")>=0){
                        shortComment="FIRST HALF END";
                        img ="/assets/img/detail-match/icon-timeline/Group 114.png";
                    }else if(response.comment.search("Hand")>=0){
                        shortComment="HAND";
                        img ="/assets/img/detail-match/icon-timeline/Group 114.png";
                    }else if(response.comment.search("Offside")>=0){
                        shortComment="FINISHED";
                        img ="/assets/img/detail-match/icon-timeline/Group 114.png";
                    }
                    else{
                        shortComment=response.comment.split(' ')[0].toUpperCase()+" "+response.comment.split(' ')[1].toUpperCase();
                        img ="/assets/img/detail-match/icon-timeline/Group 114.png";
                    }
                    // console.log(shortComment);
                        $("#timeline").append('<div class="row activity"><div class="col-xs-2"><div class="notif-icon"> <div class="icon"><img src="'+base_url+img+'" alt=""></div></div></div><div class="col-xs-10"><div class="notif-body"><div class="msg"><h4>'+shortComment+'</h4><span>'+response.comment+'</span></div></div></div> </div>');
                });
                console.log(responseMatches['status']);
                if(responseMatches['status'] == "NS" || responseMatches['status'] == "TBA"){
                    setTimeout(myTimeline, 60000);
                }

            }

        });

    }
