$(document).ready(function(){
    showdata() ;
});

function showdata()  {
    // $.ajax({
    //     url: 'list.php',
    //     method: 'POST',
    //     success: function(data) {
    //         $("#result").html(data);
    //     }

    // });
}

function search_text() {
    let search_text = $('#search_text').val();
    // console.log(search_text)
    $.ajax({
        url: 'list.php',
        method: 'POST',
        data: {search_text:search_text},
        success: function(data) {
            $("#result").html(data);
        }

    });
}

// $('#btnSerarch').click(function() {
//     mytableDatatable.draw();
//     let search_text = $('#search_text').val();
//     if (search_text != '') {
//         $('#search_text').DataTable().destroy();
//     }
// });

// $(document).ready(function(){
//     search_text() ;
//     // alert('sd');
// });
// function search_text()  {

//     // var test = $('#search_text').val();
//     // alert(test);

//     $.get("list.php", {
//             search_text:$('#search_text').val(),
//             ran:Math.random()
//         },
//         function(data){
//             $("#show_data").html(data);

//     });

// }