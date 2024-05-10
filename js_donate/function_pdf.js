$(document).ready(function(){
    // search_text() ;
    // alert('sd');
});
//-----------------------------------------------------------------------------------------------------
// function search()  {

// search_text() ;

// }
function search_text()  {

    // var test = $('#search_text').val();
    // alert(test);

    $.get("list.php",{
        search_text:$('#search_text').val(),
         ran:Math.random()},function(data){

                    // alert('sssssss');
            $("#show_data").html(data);

        });

}