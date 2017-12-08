/**
 * Script to defer loading of CSS files
 * Ideally, this should be a looped function that accepts any number of files
 * Paths to scripts should ideally be dynamic and not hard-coded
 */

//function deferCSS( srcPath ) {
    var linkTag = document.createElement('link');
    linkTag.rel = 'stylesheet';
    linkTag.href = '/peak-theme/wp-content/plugins/social-warfare/css/style.min.css';
    linkTag.type = 'text/css';
    var tag = document.getElementsByTagName('link')[0];
    tag.parentNode.insertBefore(linkTag, tag);
//}


