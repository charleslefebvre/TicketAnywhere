$(document).ready(function() {
    console.log(1);
    let showCount = 6;
    $("#moreShows").click(function(){
        showCount = showCount + 6;
        $("#list").load("LOGIC/loadShowsIndex.logic.php" , {
            showNewCount: showCount,
        });
    });
})
