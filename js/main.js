(function($) {
    "use strict";

    $(function(){
        // Ratings
        $(".choices.ratings input").on('change', function() {

            $(".choices.ratings .star").removeClass('active');

            for(var i = 0; i < this.value; i++)
            {
                $(".choices.ratings .star_"+i).addClass('active');
            }

        });

        if($(".choices.ratings input:checked").val())
        {
            for(var i = 0; i < $(".choices.ratings input:checked").val(); i++)
            {
                $(".choices.ratings .star_"+i).addClass('active');
            }
        }

        // Dropdown fix for when it goes out of screen area
        $(".nav li.drop").on('hover', function(){
            if($(this).children('.dropdown').offset().left + $(this).children('.dropdown').outerWidth() > $(window).width()){
                 $(this).children('.dropdown').css('margin-left', ($(window).width()-($(this).children('.dropdown').offset().left + $(this).children('.dropdown').outerWidth())));
            }
        });

        // Smooth scroll
        $(".smooth-scroll a").on('click', function(event){     
            event.preventDefault();
            $('.nav li').removeClass('active');
            $(this).parent('li').addClass('active');
            $('html,body').animate({scrollTop:$(this.hash).offset().top-($('#navbar').height()+50)}, 500);
        });

        var pages = []; // [Page obj, link object, Page obj, link object]

        // Loop all pages and add page and link to array
        $('#navbar .nav li a').each(function(){
            if($(this).attr('href') != '#' && $(this).attr('href').substring(0, 1) == '#'){
                var page = $($(this).attr('href'));
                if(page.length){
                    pages.push($($(this).attr('href')));
                    pages.push($(this));
                }
            }
        });

        // Set active menu item on scroll
        var windscroll = 0;
        function onScroll(windscroll){

            if(windscroll >= 100){
                for(var i=0; i<pages.length; i+=2){
                    if(pages[i].offset().top-200 <= windscroll) {
                        $('#navbar .nav li.active').removeClass('active');
                        $(pages[i+1].parent('li')).addClass('active');
                    } 

                    // If bottom then activate last page
                    if(window.innerHeight+windscroll >= $(document).height()){
                        $('#navbar .nav li.active').removeClass('active');
                        $(pages[pages.length-1].parent('li')).addClass('active');
                    }
                }

            } else {

                $('#navbar .nav li.active').removeClass('active');
                $('#navbar .nav li:first').addClass('active');

            }

        }

        var timeoutId = null;
        addEventListener("scroll", function() {
            if (timeoutId) clearTimeout(timeoutId);
            timeoutId = setTimeout(onScroll, 100, window.pageYOffset || document.documentElement.scrollTop);
        }, true);

        // Place all images that are larger than the wrapper in the center
        $(".image-center").each(function(){

            var is_hidden = false;

            // Change from display none to visibility hidden so we can get the image height/width
            if(!$(this).is(':visible') && $(this).parent().css('display') == 'none'){
                $(this).parent().css('visibility', 'hidden');
                $(this).parent().css('display', 'block');
                is_hidden = true;
            }

            var parent_width = $(this).parent().width();
            var parent_height = $(this).parent().height();
            var height = $(this).height();
            var width = $(this).width();

            if(width > parent_width){
                $(this).css('left', -(width-parent_width)/2);
            }

            if(height > parent_height){
                $(this).css('top', -(height-parent_height)/2);
            }

            if(is_hidden){
                $(this).parent().css('visibility', '');
                $(this).parent().css('display', '');
            }
        });

        // Dropdown functionality in mobile menu
        $('.nav li > a').on('click', function(){ // Loop through all the navigation links

            if($(this).parent('li').hasClass('drop')) // If we find a dropdown menu item then we process it
            {

                // Focus in and out of dropdowns in menu as necessary
                if($(this).parent('li').hasClass('focus')){
                    $(this).parent('li').removeClass('focus');
                } else
                {
                    $('.nav li.drop').removeClass('focus');
                    $(this).parent('li').addClass('focus');
                }

            } else
            {
                if(!$(this).parent('li').parent('ul').hasClass('dropdown')) $('.nav li.drop').removeClass('focus');
            }

        });

    

    });

}(jQuery));