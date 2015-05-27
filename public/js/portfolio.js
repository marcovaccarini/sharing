$(document).ready(function(){

    t = null;
    var speed = 1000;   // animation speed

    $(".detailed-box-container").click(function(){
        var elem    = $(this);
        var parent  = elem.parent();
        var granparent = parent.parent();
        var content = $('<div class="portfolio-container"></div>');

        if($('.portfolio-container').length < 1)
        {
            granparent.after(content);
        }

        $.ajax({type :  "GET",
            url :   "/customers/"+$(this).attr("id"),
            datatype : "html",
            contentType: "application/json; charset=utf-8",
            data : '',
            success: function(html)
            {
                $('.portfolio-container').slideUp(speed, function(){
                    $('.portfolio-container').remove();
                    granparent.after(content);
                    $('.portfolio-container').append(html);
                    $('.portfolio-container').slideDown(speed);
                    scrollToElement(elem,1000,-60);
                });
            }
        })
    });

    function scrollToElement(selector, time, verticalOffset) {
        time = typeof(time) != 'undefined' ? time : 1000;
        verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = $(selector);
        offset = element.offset();
        offsetTop = offset.top + verticalOffset;
        $('html, body').animate({
            scrollTop: offsetTop
        }, time);
    }
});