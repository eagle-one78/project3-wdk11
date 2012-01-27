$("document").ready(function(){ 
    $("#register_form").hide();
    $("#register_link").click(function(){
        $("#register_form").fadeIn('550');
    });
    
    $("#reg_reset").click(function(){
       $("#register_form").fadeOut('550'); 
    });
    
    $("#article_form").hide();
    $("#new_article").click(function(){
        $("#article_form").fadeIn('550');
    });
    $("#reset").click(function(){
        $("#article_form").fadeOut('550');
    });
    
    $("#update_form").hide();
    $("#update_profile").click(function(){
        $("#update_form").fadeIn('550');
    });
    $("#update_reset").click(function(){
        $("#update_form").fadeOut('550');
    });
});