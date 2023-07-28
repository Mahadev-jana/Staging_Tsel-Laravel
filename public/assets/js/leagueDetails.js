var base_url = window.location.origin;
var league_id= document.getElementsByName('league_id')[0].value;
var season_id= document.getElementsByName('season_id')[0].value;
var comp_id= document.getElementsByName('comp_id')[0].value;
$(document).ready(function() {
    $.ajax({
            url:base_url+'/LeagueRound/'+league_id,
            method:'GET',
            success: function(responseData){
                $.each(responseData, function(index,response){
                            $("#round").append('<option value="'+response.round_id+'">Game Week '+response.round_name+'</option>');
                    });
                match();
            }

    });
    $.ajax({
        url:base_url+'/LeagueStanding/'+league_id,
        method:'GET',
        success: function(responseData){
            $.each(responseData, function(index,response){
                $("#standings").append('<div class="block bg-grey"><div class="dropdown"><button class="btn btn-lg btn-white w-100 d-flex ais-center" type="button" data-toggle="dropdown"><span class="text-grey">'+(response.group_name == null?'-':response.group_name)+'</span></div></div><div class="standings table-responsive"><table class="table"><thead><tr class="bg-dark text-white"><td colspan="2">Team</td><td>Pts</td><td>P</td><td>W</td><td>D</td><td>L</td><td>F</td><td>A</td><td>GD</td></tr></thead><tbody id="standingsData'+index+'"></tbody></table></div>');
                $.each(response.data, function(key,standings){
                    $("#standingsData"+index).append('<tr><td class="bg-green text-white">'+(key+1)+'.</td><td style="white-space: nowrap"><div class="desc"><<img src="'+(standings.team_logo == null?'-':standings.team_logo)+'" alt=""><div class="team"><span>'+(standings.team_name == null?'-':standings.team_name)+'</span><ul><li class="bg-red">L</li><li class="bg-green">W</li><li class="bg-green">W</li><li class="bg-orange">D</li><li class="bg-red">L</li></ul></div></div></td><td class="smw"><strong>'+(standings.points == null?'-':standings.points)+'</strong></td><td class="smw">'+(standings.points == null?'-':standings.points)+'<br> <span class="px-1 radius-1 bg-grey">-1</span></td><td class="smw">'+(standings.won == null?'-':standings.won)+'</td><td class="smw">'+(standings.draw == null?'-':standings.draw)+'</td><td class="smw">'+(standings.lost == null?'-':standings.lost)+'</td><td class="smw">'+(standings.goals_scored == null?'-':standings.goals_scored)+'</td><td class="smw">'+(standings.goals_against == null?'-':standings.goals_against)+'</td><td class="smw">'+(standings.goal_difference == null?'-':standings.goal_difference)+'</td></tr>');
                });
            });

        }

    });
    $.ajax({
        url:base_url+'/TopScores/'+league_id+'/'+season_id,
        method:'GET',
        success: function(responseData){


            $("#Matched_played").append(responseData.Matched_played);
            $("#Goal").append(responseData.Goals);
            $("#Yellow").append(responseData.Yellow_Cards);
            $("#Red").append(responseData.redcards);
            $("#Assists").append(responseData.assists);

        }
    });
    $.ajax({
        url:base_url+'/TopPlayers/'+league_id+'/'+comp_id,
        method:'GET',
        success: function(responseData){
            if(responseData.length>0){
                $.each(responseData, function(index,Player){


                    $("#PlayerDetails").append('<li><div class="cover-img"><img src="'+(Player.data.image_path == null?'-':Player.data.image_path)+'" alt=""></div><h5 class="my-1">'+(Player.data.name == null?'-':Player.data.name)+'</h5><span><strong>'+(Player.title == null?'-':Player.title)+'</strong></span><span class="btn-pill">Score <br> '+(Player.data.scores == null?'-':Player.data.scores)+'</span></li>');

                });
            }else{
                $("#PlayerDetails").append('<img src="http://demo.goaly.mobi/8ba65c1e24ea7bd4b50e0f69a4bef3f9.png" style="display: flex;justify-content: center;align-items: center;height: 100px;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">');
            }


        }

});

})
$(document).on('change', '#round', function(){
    match();
  });
function match(){
    var league_id= document.getElementsByName('league_id')[0].value;
    var round_id= document.getElementsByName('round')[0].value;
    $.ajax({
        url:base_url+'/LeagueMatch/'+league_id+'/'+round_id,
        method:'GET',
        success: function(responseData){

            $("#match").html('');
            $.each(responseData, function(index,response){
                var date_time = response.current_date;
                var localTime  = moment.utc(date_time).toDate();
                var diff = (localTime - new Date() );
                if(diff<0){
                    hourMinute='<span class="btn-pill bg-red">Finished</span>';
                }else{
                    var day=parseInt( diff/(24*60*60*1000));
                    var hhTime=diff%(24*60*60*1000);
                    var hour=parseInt( hhTime/(60*60*1000));
                    var mmTime=hhTime%(60*60*1000);
                    var minute=parseInt( mmTime/(60*1000));
                    var ssTime= mmTime%(60*1000);
                    var second=parseInt( ssTime/1000);

                    var id=response.id;
                    hourMinute=day+'d:'+hour+'h:'+minute+'m:'+second+'s';
                }
                        $("#match").append('<div class="matches"><div class="d-flex j-center"><div class="club-left mx-1 text-center"><div class="logo"><<img src="'+(response.home_team_logo == null?'-':response.home_team_logo)+'" alt=""></div><h5 class="mb-0">'+(response.home_team_name == null?'-':response.home_team_name)+'</h5></div><div class="mid mx-2 d-flex flex-column my-auto"><div class="border radius-1 px-2 py-1">'+(response.vanue_name == null?'-':response.vanue_name)+'</div><h3 class="my-1">'+hourMinute+'</h3></div><div class="club-right mx-1 text-center"><div class="logo"><<img src="'+(response.away_team_logo == null?'-':response.away_team_logo)+'" alt=""></div><h5 class="mb-0">'+(response.away_team_name == null?'-':response.away_team_name)+'</h5></div></div></div>');
                });

        }
});
}


