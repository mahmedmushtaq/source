/**
 * Created by M Ahmed Mushtaq on 2/15/2019.
 */

$('.search-bar-input').change(function(){
    window.location.replace("search_file.php" +"?name="+$(this).val());
    // $.ajax({
    //     type: "POST",
    //     url: "search_file.php",
    //     data: {text:$(this).val()},
    //     success: function(response) {
    //         //Do Something
    //         alert("works value occur");
    //     },
    //     error: function(xhr) {
    //         //Do Something to handle error
    //     }
    // });
});
