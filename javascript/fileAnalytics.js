/* Automatically track all pdf downloads as google analytics events */
jQuery.noConflict();
(function($) {
    $(document).ready(function() {
        /* Track access */
        var filename = $('#filename').data('filename');
        _gaq.push(['_trackEvent', 'PDF', 'View', filename ]);

        /* TODO - add config-level option for universal analytics */
        ga('send', 'event', 'pdf', 'direct', filename);*/

        /* Redirect w/ url param to bypass file process detection */
        window.location.replace(filename+"?processed=1");
    });
}(jQuery));
