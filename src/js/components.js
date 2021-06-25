/** 
 * Front-end components
 * 
 * @package Emertech WordPress Theme
 */

 (jQuery)(
    function($) {

        /**
         * Generate clickable custom links
         * 
         * @since 2.0
         */
        function generateClickableCustomLinks() {
            $(".clink").each(function() {
                var href = $(this).attr("href");
                if(href != '') {
                    $(this).css('cursor', 'pointer');

                    $(this).on('click', () => {
                        console.log('hey');
                        window.location.href = href;
                        return;
                    });
                }
            });

            // $('a').each(function(){
            //     if($(this).attr('class')
            //     || !$(this).parent('p')) return;

            //     this.innerHTML += '<i class="bi bi-arrow-up-right"></i>';
            // });
        }

        /**
         * Invocate functions when document.body is ready 
         */
        $(document.body).ready(function (){
            generateClickableCustomLinks();
        });
    }
)