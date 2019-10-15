jQuery( document ).ready( function( $ ) {
    // $() will work as an alias for jQuery() inside of this function
    $('button.btn').click(function(e){
        if ($("input#animals-title").val() && $("input#animals-color").val() && $("input#animals-age").val() ) {
            var title = $("input#animals-title").val();
            var color = $("input#animals-color").val();
            var age = $("input#animals-age").val();

            $.ajax({
                type: "POST",
                url: animalsAjax.url,
                data: {
                    nonce: animalsAjax.nonce,
                    title: title,
                    color: color,
                    age: age,
                    action: "add-animal"
                },
                success: function(response){

                    var obj = jQuery.parseJSON(response);
                    var article = "<article class='animal'>";
                    var h1 = "<h1 class='entry-title post_title'>" + obj.title + "</h1><div class='entry-content'><ul class='animals-info'>";
                    var li_color = "<li><strong>Animal Color: " + obj.color + "</li>";
                    var li_age =  "<li><strong>Animal Age: " + obj.age + "</li></ul> </div></article>";
                    var summeryHtml = article + h1 + li_color + li_age;
                    $("div.animals-form").after(summeryHtml);
                },
                error: function(){
                    alert("ERROR");
                }
            });
            e.preventDefault();

        } else { alert('Fit all fields'); }
    });

    $('button.del').click(function(e){

            alert("Are You Sure?");
            var postID =  $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: animalsAjax.url,
                data: {
                    nonce: animalsAjax.nonce,
                    postID: postID,
                    action: "del-animal"
                },
                success: function(response){
                   $("article#post-" + postID).html("<h2>" + response + "</h2>");
                },
                error: function(){
                    alert("ERROR");
                }
            });
            e.preventDefault();
              });


});