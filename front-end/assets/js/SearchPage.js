const searchBar = document.getElementsByClassName("navbar__center__input");

function Search(thejson) {
    var searchText = searchBar[0].textContent;
    console.log(searchText);
    Searchupdate(thejson);
}



function displayFilter() {

    if (document.getElementById("filterBox").style.display == "none") {
        document.getElementById("filterBox").style.display = "flex";
    }
    else{
        document.getElementById("filterBox").style.display = "none";
    }
}

function Searchupdate( thejson ){
    $filterDATE = document.getElementById("filter_upload_date"); // Last hour, This week, This month, This year
    $filterTYPE = document.getElementById("filter_type"); // Channel, Playlist, Video
    $filterORDER = document.getElementById("filter_order_by"); // View count, Relevance, Upload date, Rating
    var ObjectInJson = JSON.parse($thejson);
    // Actual Time vars :
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var actual_day = today.getDate();
    var actual_month = today.getMonth()+1; // base are within (0-11) so we do a +1
    var actual_year = today.getFullYear();

    var actual_date = actual_year + '-' + actual_month + '-' + actual_day; // YYYY-MM-DD
    var actual_full_month = actual_year + '-' + actual_month;
    
    var actual_full_date = actual_date + '.' + time; // YYYY-MM-DD.HH:MM:SS
    
    // filters Time vars :
    var time_filterhour = (today.getHours() - 1) + ":" + today.getMinutes() + ":" + today.getSeconds(); // last hour √
    var time_filterweek = time_filterweek.setdate(actual_date.getDate() - 7) + time; // last week √
    var time_filtermonth = time_filtermonth.setdate(actual_full_month.getDate() - 1 ) // last month √
    var time_filteryear = time_filteryear.setdate(actual_year.getDate() - 1) + actual_month + actual_day + time;

    // filter View count
    var saveView;
    var Enddata = {}
        Enddata.table = []
    var buffertable = {}
        buffertable.table = []
    var buff_last_position = 0;

    switch($filterTYPE.value) {
        case "Video":
            for (var i = 0; i < ObjectInJson.length; i++) {
                if (ObjectInJson[i].type == "video"){
                    buffertable.push(ObjectInJson[i])
                }
            }
            switch($filterDATE.value){
                case "Last hour":
                    for (var i = 0; i < buffertable.length; i++){
                        if (buffertable[i].date >= time_filterhour){
                            Enddata.push(buffertable[i]);
                            buffertable.splice(i);
                        }
                    }
                    buffertable = [];
                    switch($filterORDER.value) {
                        case "View count":
                            for (var i = 0; i < Enddata.length; i++){
                                for( var j = 0; j< Enddata.length; j++){    
                                    if(Enddata[i].viewscount < Enddata[j].viewcount){
                                        saveView = Enddata[i];
                                        Enddata[i] = Enddata[j];
                                        Enddata[j] = saveView;
                                    }
                                }
                                Enddata.push(Enddata[i]);
                                Enddata.splice(i);
                            }
                            buffertable = "0";
                            for( var i = 0; i < Enddata.length; i++){
                                if( "0" >= Enddata[buff_last_position]){
                                    buff_last_position += 1;
                                    buffertable.splice(buff_last_position, 1, Enddata[i])
                                }
                            }
                            break;
                        case "Rating":
                            
                            break;
                        case "Upload date":

                            break;
                        case "Relevance":

                            break;
                    }
                    break;

                case "This week":
                    for (var i = 0; i < buffertable.length; i++){
                        if (buffertable[i].date >= time_filterweek){
                            Enddata.push(buffertable[i]);
                            buffertable.splice(i);
                        }
                    }
                    buffertable = [];
                    break;

                case "This month":
                    for (var i = 0; i < buffertable.length; i++){
                        if (buffertable[i].date >= time_filtermonth){
                            Enddata.push(buffertable[i]);
                            buffertable.splice(i);
                        }
                    }
                    buffertable = [];
                    break;

                case "This year":
                    for (var i = 0; i < buffertable.length; i++){
                        if (buffertable[i].date >= time_filteryear){
                            Enddata.push(buffertable[i]);
                            buffertable.splice(i);
                        }
                    }
                    buffertable = [];
                    break;
            break;

        case "Channel":
            for (var i = 0; i < ObjectInJson.length; i++) {
                if (ObjectInJson[i].type == "Channel"){
                    buffertable.push(ObjectInJson[i])
                }
            }
            break;

        case "Playlist":
            for (var i = 0; i < ObjectInJson.length; i++) {
                if (ObjectInJson[i].type == "Playlist"){
                    buffertable.push(ObjectInJson[i])
                }
            }
            break;
        default:
            for (var i = 0; i < ObjectInJson.length; i++) {
                if (ObjectInJson[i].type == "video"){
                    buffertable.push(ObjectInJson[i])
                }
            }
            for (var i = 0; i < ObjectInJson.length; i++) {
                if (ObjectInJson[i].type == "Channel"){
                    buffertable.push(ObjectInJson[i])
                }
            }
            for (var i = 0; i < ObjectInJson.length; i++) {
                if (ObjectInJson[i].type == "Playlist"){
                    buffertable.push(ObjectInJson[i])
                }
            }
    }

}
} 