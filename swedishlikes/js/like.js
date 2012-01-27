$(document).ready(function(){
//    $("a").click(function(event){
//        event.preventDefault();
        $(".likes").live("click", function (){
            
//        })
//        $(".likes").click(function(){
            var article_id = $(this).data('articleId');
            //passar in id siffran till php filen för att kalla på den
            $.post('./ajax/like_add.php',{article_id:article_id}, function(data){            
                if(data == "success"){ 
                    like_get(article_id);                
                }
                else{
                    $('.message'+article_id).text("Article like done!");//jag vill göra en onclick för att den ska bort när man klickar på den eller en timeout sen försvinner den.
                }
            });
        });

        function like_get(article_id){
            $.post('./ajax/like_get.php', {article_id:article_id}, function(data){
                $('#article_'+ article_id +'_likes').text(data);            
            });
        }    
    });
// });