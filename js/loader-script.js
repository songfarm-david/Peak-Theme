/* 
 * This script dynamically adds class to hero DOM elements to allow animation
 * 
 * It also quietly loads "large" banner images  used on subsequent pages
 */

function queueAnimation() {
    headlineContainer.className += ' fadeInUp';
}

document.addEventListener('DOMContentLoaded', function() {
    var headlineContainer;
    // if homepage
    if (document.querySelector('.hero-headline-container')) {
        headlineContainer = document.querySelector('.hero-headline-container');
        
        document.body.addEventListener('webkitAnimationEnd animationend oanimationend', queueAnimation());
    }
    
    // add fadeIn class to body
    document.body.className += ' fadeIn';
    
    
    // preload image strings
    var mobileImages = `
        <img src="https://peakwebsites.ca/wp-content/uploads/2018/02/sm-screen-80.jpg" width="1"height="1" alt="" />
        <img src="https://peakwebsites.ca/wp-content/uploads/2018/02/green-1200-min.png" width="1" height="1" alt="" />
        <img src="https://peakwebsites.ca/wp-content/uploads/2018/02/orange-1200-min.png" width="1" height="1" alt="" />
        <img src="https://peakwebsites.ca/wp-content/uploads/2018/02/purple-1200-min.png" width="1" height="1" alt="" />`;
    
    var desktopImages = `
        <img src="https://peakwebsites.ca/wp-content/uploads/2018/02/md-screen-80.jpg" width="1"height="1" alt="" />
        <img src="https://peakwebsites.ca/wp-content/uploads/2018/02/lg-screen-80.jpg" width="1"height="1" alt="" />
        <img src="https://peakwebsites.ca/wp-content/uploads/2018/02/green-1800-min.png" width="1" height="1" alt="" />
        <img src="https://peakwebsites.ca/wp-content/uploads/2018/02/green-2400-min.png" width="1" height="1" alt="" />
        <img src="https://peakwebsites.ca/wp-content/uploads/2018/02/orange-1800-min.png" width="1" height="1" alt="" />
        <img src="https://peakwebsites.ca/wp-content/uploads/2018/02/orange-2400-min.png" width="1" height="1" alt="" />
        <img src="https://peakwebsites.ca/wp-content/uploads/2018/02/purple-1800-min.png" width="1" height="1" alt="" />
        <img src="https://peakwebsites.ca/wp-content/uploads/2018/02/purple-2400-min.png" width="1" height="1" alt="" />`;
    
    var preloadContainer = document.createElement('div');
    preloadContainer.id = "preload-container";
    
    var isMobile = window.matchMedia("only screen and (max-width: 760px)");
    // matches true if mobile viewport
    if (isMobile.matches) {
        preloadContainer.innerHTML = mobileImages;
        document.body.appendChild(preloadContainer);
    } else {
        preloadContainer.innerHTML = desktopImages;
        document.body.appendChild(preloadContainer);
    }

});