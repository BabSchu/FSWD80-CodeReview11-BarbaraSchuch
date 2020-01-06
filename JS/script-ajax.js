$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                $(".display").html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of searchButton
    $(document).on("click", ".searchButton", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".searchButton").empty();
    });
});