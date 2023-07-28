var base_url = window.location.origin;
var autocall=[];
var duplicateId=[];
$('.btn-subscribe').click(function() {
    $('.premium-alert').hide();
    $('.premium').removeClass('premium');
});
// var season_id='';
$(document).ready(function() {
    var TeamId=document.getElementsByName('TeamId')[0].value;

    $.ajax({
        url:base_url+'/teamBasicInfo/'+TeamId,
        method:'GET',
        success: function(responseMatches){

            $("#club_body_content").show();
             $("#skloader_club").hide();
             $("#venueLogo_path").append('<img class="img-fluid" src="'+responseMatches['logo_path']+'" alt="">');
                $("#venueName").append(responseMatches['venue']['data'] == null?'-':responseMatches['venue']['data']['name']);
                $("#city").append(responseMatches['venue']['data'] == null?'-':responseMatches['venue']['data']['city']);

            if(responseMatches['league']['data']!=null){
            $("#league").append((responseMatches['league']['data']['name'] == null?'-':responseMatches['league']['data']['name'])+'<a href=""><img src="'+(responseMatches['league'] == null?'-':responseMatches['league']['data']['logo_path'])+'" alt=""></a>');
            }
            if(responseMatches['country']['data']!=null){
            $("#country").append((responseMatches['country']['data']['name'] == null?'-':responseMatches['country']['data']['name'])+'<a href=""><img src="'+(responseMatches['country']['data']['image_path'] == null?'-':responseMatches['country']['data']['image_path'])+'" alt=""></a>');
            }

        }
    });
    $.ajax({
        url:base_url+'/TeamPlayers/'+TeamId,
        method:'GET',
        success: function(responseMatches){
           $.each(responseMatches.Midfielders,function(index,response){
            $("#Midfilders").append(' <tr><td>'+(index+1)+'.</td><td style="white-space: normal"><div class="desc"><img src="'+(response.player_image == null?'-':response.player_image)+'" alt=""><div class="team"><span>'+(response.player_name == null?'-':response.player_name)+'</span></div></div></td><td>'+(response.played == null?'-':response.played)+'</td><td>'+(response.saves == null?'-':response.saves)+'</td><td>'+(response.goals == null?'-':response.goals)+'</td><td>'+(response.yellowcards == null?'-':response.yellowcards)+'</td><td>'+(response.redcards == null?'-':response.redcards)+'</td></tr>');
            });
           $.each(responseMatches.Goal_keeper,function(index,response){
             $("#GoalKeepers").append(' <tr><td>'+(index+1)+'.</td><td style="white-space: normal"><div class="desc"><img src="'+(response.player_image == null?'-':response.player_image)+'" alt=""><div class="team"><span>'+(response.player_name == null?'-':response.player_name)+'</span></div></div></td><td>'+(response.played == null?'-':response.played)+'</td><td>'+(response.saves == null?'-':response.saves)+'</td><td>'+(response.goals == null?'-':response.goals)+'</td><td>'+(response.yellowcards == null?'-':response.yellowcards)+'</td><td>'+(response.redcards == null?'-':response.redcards)+'</td></tr>');
            });
            $.each(responseMatches.Defender,function(index,response){
                $("#Defender").append(' <tr><td>'+(index+1)+'.</td><td style="white-space: normal"><div class="desc"><img src="'+(response.player_image == null?'-':response.player_image)+'" alt=""><div class="team"><span>'+(response.player_name == null?'-':response.player_name)+'</span></div></div></td><td>'+(response.played == null?'-':response.played)+'</td><td>'+(response.saves == null?'-':response.saves)+'</td><td>'+(response.goals == null?'-':response.goals)+'</td><td>'+(response.yellowcards == null?'-':response.yellowcards)+'</td><td>'+(response.redcards == null?'-':response.redcards)+'</td></tr>');
            });
                $.each(responseMatches.Attackers,function(index,response){
                    $("#Attackers").append(' <tr><td>'+(index+1)+'.</td><td style="white-space: normal"><div class="desc"><img src="'+(response.player_image == null?'-':response.player_image)+'" alt=""><div class="team"><span>'+(response.player_name == null?'-':response.player_name)+'</span></div></div></td><td>'+(response.played == null?'-':response.played)+'</td><td>'+(response.saves == null?'-':response.saves)+'</td><td>'+(response.goals == null?'-':response.goals)+'</td><td>'+(response.yellowcards == null?'-':response.yellowcards)+'</td><td>'+(response.redcards == null?'-':response.redcards)+'</td></tr>');
                });
        }
    });
    $.ajax({
        url:base_url+'/teamTeamScorer/'+TeamId,
        method:'GET',
        success: function(responseMatches){
            var highestGoalScorer=0;
            var goals=[];
            $.each(responseMatches['goals'],function(index,response){
                if(response['goals']>highestGoalScorer){
                    highestGoalScorer= response['goals'];
                    goals= response;
                }
            });
            $("#season").append('Season '+goals['season_name']);
            $("#goals-scorerer-img").append('<img src="'+goals['player_image']+'" alt="">');
            $("#goals-scorerer-name").append(goals['player_name']);
            $("#goals").append(goals['goals']);
            var highestAssistsScorer=0;
            var assists=[];
            $.each(responseMatches['assists'],function(index,response){
                if(response['assists']>highestAssistsScorer){
                    highestAssistsScorer= response['assists'];
                    assists= response;
                }
            });
            $("#assists-scorerer-img").append('<img src="'+assists['player_image']+'" alt="">');
            $("#assists-scorerer-name").append(assists['player_name']);
            $("#assists").append(assists['assists']);
        }
    });

    $.ajax({
        url:base_url+'/teamYellowAndRedcard/'+TeamId,
        method:'GET',
        success: function(responseMatches){
            var highestYellowcardScorer=0;
            var yellowcards=[];
            $.each(responseMatches['yellowcards'],function(index,response){
                if(response['yellowcards']>highestYellowcardScorer){
                    highestYellowcardScorer= response['yellowcards'];
                    yellowcards= response;
                }
            });
            $("#yellowcards-scorerer-img").append('<img src="'+yellowcards['player_image']+'" alt="">');
            $("#yellowcards-scorerer-name").append(yellowcards['player_name']);
            $("#yellowcards").append(yellowcards['yellowcards']);
            var highestRedcardScorer=0;
            var redcards=[];
            $.each(responseMatches['redcards'],function(index,response){
                if(response['redcards']>highestRedcardScorer){
                    highestRedcardScorer= response['redcards'];
                    redcards= response;
                }
            });
            $("#redcards-scorerer-img").append('<img src="'+redcards['player_image']+'" alt="">');
            $("#redcards-scorerer-name").append(redcards['player_name']);
            $("#redcards").append(redcards['redcards']);

        }
    });

    $.ajax({
        url:base_url+'/teamMatches/'+TeamId,
        method:'GET',
        success: function(responseMatches){
            $.each(responseMatches.futureMatches,function(index,response){

                    var matche_status = "Finished";
                    var background ="background-color:red";
                    matche_status = response['MatchStatuS'];
                        if(matche_status == "Finished"){
                            background ="background-color:red";
                        }else{
                            background ="background-color:#7CD327";
                        }
                    var date_time = response.date_time;
                    var localTime  = moment.utc(date_time).toDate();
                    var localDateTime = moment(localTime).format('YYYY-MM-DD HH:mm');
                    $("#futureMatches").append(' <div class="matches listing"><div class="d-flex j-center"><div class="club-left mx-1 text-center"><a href="/team/details/'+response.homeTeam_id+'"><div class="logo"><img src="'+response.homeTeam_logo+'" alt=""></div></a><h5 class="mb-0">'+(response.homeTeam_name == null?'--':response.homeTeam_name)+'</h5></div><div class="mid mx-2 d-flex flex-column my-auto"><div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt"><span>'+response.homeTeam_score+'</span><span class="mx-2 border-right"></span><span>'+response.awayTeam_score+'</span></div><span class="my-1">'+localDateTime+'</span><a href="/match/details/'+response.match_id+'"><span class="btn-pill" id="matche_status_id" style="padding: 1px 16px;border-radius: 15px;color: white;'+background+'">'+matche_status+'</span></a></div> <div class="club-right mx-1 text-center"><a href="/team/details/'+response.awayTeam_id+'"><div class="logo"><img src="'+response.awayTeam_logo+'" alt=""></div></a><h5 class="mb-0">'+(response.awayTeam_name == null?'--':response.awayTeam_name)+'</h5></div></div></div>');
                // }

            });
            mylisting();
            $.each(responseMatches.pastMatches,function(index,response){
                    var date_time = response.date_time;
                    var localTime  = moment.utc(date_time).toDate();
                    var localDateTime = moment(localTime).format('YYYY-MM-DD HH:mm');
                $("#pastMatches").append(' <div class="matches previouslisting"><div class="d-flex j-center"><div class="club-left mx-1 text-center"><a href="/team/details/'+response.homeTeam_id+'"><div class="logo"><img src="'+response.homeTeam_logo+'" alt=""></div></a><h5 class="mb-0">'+(response.homeTeam_name == null?'--':response.homeTeam_name)+'</h5></div><div class="mid mx-2 d-flex flex-column my-auto"><div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt"><span>'+response.homeTeam_score+'</span><span class="mx-2 border-right"></span><span>'+response.awayTeam_score+'</span></div><span class="my-1">'+localDateTime+'</span><a href="/match/details/'+response.match_id+'"><span class="btn-pill bg-red" style="padding: 1px 27px; border-radius: 15px;color: white;">Finished</span></a></div><div class="club-right mx-1 text-center"><a href="/team/details/'+response.awayTeam_id+'"><div class="logo"><img src="'+response.awayTeam_logo+'" alt=""></a></div><h5 class="mb-0">'+(response.awayTeam_name == null?'--':response.awayTeam_name)+'</h5></div></div></div>');
            });
            myPreviouslisting();
        }
    });
    $.ajax({
        url:base_url+'/MatchesByRound/'+TeamId,
        method:'GET',
        success: function(responseMatches){

            $.each(responseMatches['matches'],function(index,response){
             var time;
             var id;

            var date_time = response.time;
            var localTime  = moment.utc(date_time).toDate();
            var diff = (localTime - new Date() );
            if(diff>0){

                var id="diff"+response.id;
                hourMinute=null;
                const a={time:localTime, id:id,};
                autocall.push(a);
            }else{
                hourMinute="You are good to go!"
            }
            if(duplicateId.indexOf(response.id)<0){
                duplicateId.push(response.id);
            $("#matches").append('<div class="matches"><div class="d-flex j-center"><div class="club-left mx-1 text-center"><a href="/team/details/'+response.home_team_id+'"><div class="logo"><img src="'+response.home_team_logo+'" alt=""></div></a><h5 class="mb-0">'+response.home_team_name+'</h5></div><div class="mid mx-2 d-flex flex-column my-auto"><div class="border radius-1 px-2 py-1">'+response.vanue_name+'</div><h3 class="my-1" id="'+id+'">'+hourMinute+'</h3></div><div class="club-right mx-1 text-center"><a href="/team/details/'+response.away_team_id+'"><div class="logo"><img src="'+response.away_team_logo+'" alt=""></div></a><h5 class="mb-0">'+(response.away_team_name == null?'-':response.away_team_name)+'</h5></div></div></div>');
            }
                });
            timeCalculate(autocall);
        }
    });
    $.ajax({
        url:base_url+'/TeamByStanding/'+TeamId,
        method:'GET',
        success: function(responseMatches){
            if(responseMatches.length>0){
                $.each(responseMatches,function(index,response){
                    $("#standing").append('<tr><td class="bg-green text-white">'+(index+1)+'.</td><td style="white-space: nowrap"><div class="desc"><<img src="'+(response.team_logo == null?'-':response.team_logo)+'" alt=""><div class="team"><span>'+(response.team_name == null?'-':response.team_name)+'</span><ul><li class="bg-red">L</li><li class="bg-green">W</li><li class="bg-green">W</li><li class="bg-orange">D</li><li class="bg-red">L</li></ul></div></div></td><td class="smw"><strong>'+(response.points == null?'-':response.points)+'</strong></td><td class="smw">'+(response.points == null?'-':response.points)+'<br> <span class="px-1 radius-1 bg-grey">-1</span></td><td class="smw">'+(response.won == null?'-':response.won)+'</td><td class="smw">'+(response.draw == null?'-':response.draw)+'</td><td class="smw">'+(response.lost == null?'-':response.lost)+'</td><td class="smw">'+(response.goals_scored == null?'-':response.goals_scored)+'</td><td class="smw">'+(response.goals_against == null?'-':response.goals_against)+'</td><td class="smw">'+(response.goal_difference == null?'-':response.goal_difference)+'</td></tr>');
                    });
            }
        }
    });
    $.ajax({
        url:base_url+'/Stats/'+TeamId,
        method:'GET',
        success: function(response){
            if(response == null){
                return false;
            }
            $("#Record").append('<tr><td class="text-left club-stats-title">Win</td><td>'+(response.win.home == null?'-':response.win.home)+'</td><td>'+(response.win.away == null?'-':response.win.away)+'</td><td>'+(response.win.total == null?'-':response.win.total)+'</td></tr><tr><td class="text-left club-stats-title">Draw</td><td>'+(response.draw.home == null?'-':response.draw.home)+'</td><td>'+(response.draw.away == null?'-':response.draw.away)+'</td><td>'+(response.draw.total == null?'-':response.draw.total)+'</td></tr><tr><td class="text-left club-stats-title">Lose</td><td>'+(response.lost.home == null?'-':response.lost.home)+'</td><td>'+(response.lost.away == null?'-':response.lost.away)+'</td><td>'+(response.lost.total == null?'-':response.lost.total)+'</td></tr>');

            $("#Goals").append('<tr><td class="text-left club-stats-title">Goals for</td><td>'+(response.goals_for.home == null?'-':response.goals_for.home)+'</td><td>'+(response.goals_for.away == null?'-':response.goals_for.away)+'</td><td>'+(response.goals_for.total == null?'-':response.goals_for.total)+'</td></tr><tr><td class="text-left club-stats-title">Goals Against</td><td>'+(response.goals_against.home == null?'-':response.goals_against.home)+'</td><td>'+(response.goals_against.away == null?'-':response.goals_against.away)+'</td><td>'+(response.goals_against.total == null?'-':response.goals_against.total)+'</td></tr><tr><td class="text-left club-stats-title">Clean Sheets</td><td>'+(response.clean_sheet.home == null?'-':response.clean_sheet.home)+'</td><td>'+(response.clean_sheet.away == null?'-':response.clean_sheet.away)+'</td><td>'+(response.clean_sheet.total == null?'-':response.clean_sheet.total)+'</td></tr><tr><td class="text-left club-stats-title">Failed to Score</td><td>'+(response.failed_to_score.home == null?'-':response.failed_to_score.home)+'</td><td>'+(response.failed_to_score.away == null?'-':response.failed_to_score.away)+'</td><td>'+(response.failed_to_score.total == null?'-':response.failed_to_score.total)+'</td></tr>');


            $("#Average").append('<tr><td class="text-left club-stats-title">Avg. Goals per Game Scored</td><td>'+(response.avg_goals_per_game_scored.home == null?'-':response.avg_goals_per_game_scored.home)+'</td><td>'+(response.avg_goals_per_game_scored.away == null?'-':response.avg_goals_per_game_scored.away)+'</td><td>'+(response.avg_goals_per_game_scored.total == null?'-':response.avg_goals_per_game_scored.total)+'</td></tr><tr><td class="text-left club-stats-title">Avg. Goals per Game Conceded</td><td>'+(response.avg_goals_per_game_conceded.home == null?'-':response.avg_goals_per_game_conceded.home)+'</td><td>'+(response.avg_goals_per_game_conceded.away == null?'-':response.avg_goals_per_game_conceded.away)+'</td><td>'+(response.avg_goals_per_game_conceded.total == null?'-':response.avg_goals_per_game_conceded.total)+'</td></tr><tr><td class="text-left club-stats-title">Avg. First Goal Scored</td><td>'+(response.avg_first_goal_scored.home == null?'-':response.avg_first_goal_scored.home)+'</td><td>'+(response.avg_first_goal_scored.away == null?'-':response.avg_first_goal_scored.away)+'</td><td>'+(response.avg_first_goal_scored.total == null?'-':response.avg_first_goal_scored.total)+'</td></tr><tr><td class="text-left club-stats-title">Avg. First Goal Conceded</td><td>'+(response.avg_first_goal_conceded.home == null?'-':response.avg_first_goal_conceded.home)+'</td><td>'+(response.avg_first_goal_conceded.away == null?'-':response.avg_first_goal_conceded.away)+'</td><td>'+(response.avg_first_goal_conceded.total == null?'-':response.avg_first_goal_conceded.total)+'</td></tr>');

            $.each(response.scoring_minutes,function(index,data){
                $("#Scoring").append('<tr><td class="text-left">'+(data.minute == null?'-':data.minute)+'</td><td class="text-right"><strong>'+(data.count == null?'-':data.count)+'</strong>&nbsp;/'+(data.percentage == null?'-':data.percentage)+'%</td></tr>');
            });
            $.each(response.goals_conceded_minutes,function(index,data){
                $("#Conceded").append('<tr><td class="text-left">'+(data.minute == null?'-':data.minute)+'</td><td class="text-right"><strong>'+(data.count == null?'-':data.count)+'</strong>&nbsp;/'+(data.percentage == null?'-':data.percentage)+'%</td></tr>');
            });
            $("#attacks").append(response.attacks);
            $("#dangerous_attacks").append(response.dangerous_attacks);
            $("#avg_ball_possession_percentage").append(response.avg_ball_possession_percentage);
            $("#shots_blocked").append(response.shots_blocked);
            $("#shots_off_target").append(response.shots_off_target);
            $("#avg_shots_off_target_per_game").append(response.avg_shots_off_target_per_game);
            $("#shots_on_target").append(response.shots_on_target);
            $("#avg_shots_on_target_per_game").append(response.avg_shots_on_target_per_game);
            $("#avg_corners").append(response.avg_corners);
            $("#total_corners").append(response.total_corners);
            $("#btts").append(response.btts);
            $("#avg_player_rating").append(response.avg_player_rating);
            $("#avg_player_rating_per_match").append(response.avg_player_rating_per_match);
            $("#tackles").append(response.tackles);
            $("#redcards-stats").append(response.redcards);
            $("#yellowcards-stats").append(response.yellowcards);
            $("#fouls").append(response.fouls);
            $("#offsides").append(response.offsides);


        }
    });
})
    function timeCalculate(autocall){
       var demoautoCall=[];

        $.each(autocall,function(index,response){

            var diff = (response.time- new Date() );
            var day=0;
            const a=null;
                if(diff>0){
                    var day=parseInt( diff/(24*60*60*1000));
                    var hhTime=diff%(24*60*60*1000);
                    var hour=parseInt( hhTime/(60*60*1000));
                    var mmTime=hhTime%(60*60*1000);
                    var minute=parseInt( mmTime/(60*1000));
                    var ssTime= mmTime%(60*1000);
                    var second=parseInt( ssTime/1000);

                    var id=response.id;
                    if(day != 0){
                        hourMinute = day+' d:';
                    }else if(hour != 0){
                    hourMinute=hour+' h:'+minute+' m:';
                    }else if(minute !=0){
                        hourMinute=minute+' m:'+second+' s';
                    }else{
                        hourMinute=second+' s';
                    }

                    if(day == 0){
                        const a={time:response.time, id:response.id, day:day,};
                        demoautoCall.push(a);
                    }


                }else{
                    hourMinute="You are good to go!"
                }
                $("#"+response.id).html('');
                $("#"+response.id).append(hourMinute);
        });
        autocall=demoautoCall;

        if(autocall.length !=0 ){
            setTimeout(timeCalculate, 6000, autocall);
        }

    }
    function mylisting() {
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
    }
    function myPreviouslisting() {
        var size_item = $('.previouslisting').length;
        var v=3;
        $('.previouslisting').hide(); // hide all divs with class `previouslisting`
        $('.previouslisting:lt('+v+')').show();
        $('#previouslisting_more').click(function () {
            //alert(size_item); return false;
            v= (v+3 <= size_item) ? v+3 : size_item;
            // var abcd=$(".previouslisting").length;
            // alert(abcd); return false;
            $('.previouslisting:lt('+v+')').show();
            // hide load more button if all items are visible
            if($(".previouslisting:visible").length >= size_item ){ $("#previouslisting_more").hide(); }
        });
    }
