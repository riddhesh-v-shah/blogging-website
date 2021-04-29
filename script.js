// $('#inputGroupFile02').on('change',function(){
//     //get the file name
//     console.log("Ran");
//     var fileName = $(this).val();
//     //replace the "Choose a file" label
//     $(this).next('.custom-file-label').html(fileName);
// })

$(function(){
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        console.log(fileName);
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        //$(".image-preview").src = 
    });
    
    $(".dropdown").on("click", function(){
        //console.log(document.getElementById("dropdown-menu"));
        //console.log($("#dropdown-menu").attr("data-display"));
        if($("#dropdown-menu").attr("data-display") == "none"){
            $("#dropdown-menu").attr("data-display","block");
            document.getElementById("dropdown-menu").style.display = "block";
        }else{
            $("#dropdown-menu").attr("data-display","none");
            document.getElementById("dropdown-menu").style.display = "none";
        }
        
    });
    
    $("html").on("click",function(e){
        //console.log(e.target);
        if($("#dropdown-menu").attr("data-display") == "block" && !e.target.classList.contains("profile-image-photo")){
            $("#dropdown-menu").attr("data-display","none");
            document.getElementById("dropdown-menu").style.display = "none";
        }
    });
    
    $('#responsiveTabStructure').responsiveTabs({
        startCollapsed: 'accordion',
        animation: 'slide'
    });
    
    // $('.r-tabs-nav').on('click',function(e){
    //     console.log(e.target.id);
    // });

    // $("document").on("load",function(e){
    //     if(e.classList.contains("r-tabs-accordion-title")){
    //         e.style.display = "none";
    //     }
    // });

});