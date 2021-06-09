
jQuery(document).ready(function ($) {
    var overlayBg = $("#overlay_bg:not(.show-0)");
    var overVideo = $("#over_video");7
    
    
    $(overVideo).on("play", () => { 
        // $(overVideo).animate(
        //     { 
        //         // height: 'toggle',
        //         "margin-left": 0,
        //     }, 1500,
        //     () => {
        //     }
        // );
    });

    $(overVideo).on("ended", () => {

        $(overlayBg).animate(
            { 
                // height: 'toggle',
                opacity: 0,
            }, 400,
            () => {
                overlayBg.css("display", "none");
            }
        );
    });
});