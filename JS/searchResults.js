$(document).ready(function() {
    let selectedtab = $('#hidden-input-tab')[0];
    selectedtab.value = $('#selected-tab')[0].text.toLowerCase();
    let search = $('#hidden-input-search')[0].value;
    let showCount = 6;
    $("#moreShows").click(function(){
        showCount = showCount + 6;
        console.log(showCount);
        $("#list").load("LOGIC/loadShows.logic.php" , {
            showNewCount: showCount,
            tab: selectedtab.value,
            query: search
        });
    });
});