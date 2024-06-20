// alert("aaaa");
// $(document).ready(function() {
//     $("#live-search").keyup(function() {
//         var input = $(this).val();
//         if(input != "") {
//             $.ajax({
//                 url: "../livesearchpro.php",
//                 method: "POST",
//                 data: {input: input},
//                 success: function(data) {
//                     $("#searchresult").html(data);
//                 },
//                 error: function(jqXHR, textStatus, errorThrown) {
//                     console.error("Error in AJAX request:", textStatus, errorThrown);
//                 }
//             });
//         } else {
//             $("#searchresult").html("");
//         }
//     });
// });