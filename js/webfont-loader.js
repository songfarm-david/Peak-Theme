var WebFontConfig = {
        google: {
                families: [
                        'Raleway:300,400,800',
                        'Titillium Web'
                 ]
        },
        timeout: 3300
};
(function(){
        var wf = document.createElement("script");
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.async = 'true';
        document.head.appendChild(wf);
})();
