var primary = localStorage.getItem("primary") || '#158df7';
var secondary = localStorage.getItem("secondary") || '#fb2e63';

window.XoloAdminConfig = {
	// Theme Primary Color
	primary: primary,
	// theme secondary color
	secondary: secondary,

};

// localstorage all setting

$("body").attr("class", localStorage.getItem('body'));
$("body").attr("main-theme-layout",localStorage.getItem('main-theme-layout'));
$("html").attr("dir",localStorage.getItem('html'));
$(".main-nav").attr("class", "main-nav "+localStorage.getItem('main-nav'));

$(".page-wrapper").attr("class", "page-wrapper "+localStorage.getItem('page-wrapper'));
$(".page-body-wrapper").attr("class", "page-body-wrapper "+localStorage.getItem('page-body-wrapper'));

if (localStorage.getItem("page-wrapper") === null) {
	$(".page-wrapper").addClass("compact-wrapper");
	$(".page-body-wrapper").addClass("sidebar-icon");
}



// light layout
$(".default-view").click(function(){
    localStorage.setItem('body', 'light-only'); 
    localStorage.setItem('main-nav', ''); 

    // direction html
    localStorage.setItem('html', 'ltr');
    localStorage.setItem('main-theme-layout', 'ltr');

    // menu setting
    localStorage.setItem('page-wrapper', 'compact-wrapper');
	localStorage.setItem('page-body-wrapper', 'sidebar-icon');
	
});

// dark layout
$("#dark-view").click(function(){
	localStorage.setItem('body', 'dark-only');
    localStorage.setItem('main-nav', ''); 

    // direction html
    localStorage.setItem('html', 'ltr');
    localStorage.setItem('main-theme-layout', 'ltr');

    // menu setting
    localStorage.setItem('page-wrapper', 'compact-wrapper');
    localStorage.setItem('page-body-wrapper', 'sidebar-icon');
});

// compact layout
$("#compact-view").click(function(){
    localStorage.setItem('body', 'light-only'); 
    localStorage.setItem('main-nav', 'close_icon');

    // direction html
    localStorage.setItem('html', 'ltr');
    localStorage.setItem('main-theme-layout', 'ltr');

    // menu setting
    localStorage.setItem('page-wrapper', 'compact-wrapper');
    localStorage.setItem('page-body-wrapper', 'sidebar-icon');
});

// rtl layout
$("#rtl-view").click(function(){
	localStorage.setItem('html', 'rtl'); 

    localStorage.setItem('main-theme-layout', 'rtl'); 
    localStorage.setItem('body', 'light-only'); 
    localStorage.setItem('main-nav', '');

    // menu setting
    localStorage.setItem('page-wrapper', 'compact-wrapper');
    localStorage.setItem('page-body-wrapper', 'sidebar-icon');
});

// box layout
$("#box-view").click(function(){
    // direction html
    localStorage.setItem('html', 'ltr'); 

    localStorage.setItem('main-theme-layout', 'box-layout'); 
    localStorage.setItem('body', 'light-only'); 
    localStorage.setItem('main-nav', '');
    
    // menu setting
    localStorage.setItem('page-wrapper', 'compact-wrapper');
    localStorage.setItem('page-body-wrapper', 'sidebar-icon');
});

// horizontal layout
$("#menu-view").click(function(){
    localStorage.setItem('body', 'light-only'); 
    localStorage.setItem('main-nav', ''); 

    // menu setting
    localStorage.setItem('page-wrapper', 'horizontal-wrapper');
    localStorage.setItem('page-body-wrapper', 'horizontal-menu');

    // direction html
    localStorage.setItem('html', 'ltr');
    localStorage.setItem('main-theme-layout', 'ltr');
});

// dark-rtl layout
$("#darkrtl-view").click(function(){
    localStorage.setItem('body', 'dark-only');
    localStorage.setItem('main-nav', ''); 

    // direction html
    localStorage.setItem('html', 'rtl');
    localStorage.setItem('main-theme-layout', 'rtl');

    // menu setting
    localStorage.setItem('page-wrapper', 'compact-wrapper');
    localStorage.setItem('page-body-wrapper', 'sidebar-icon');
});

// horizontal layout
$("#verticalrtl-view").click(function(){
    localStorage.setItem('body', 'light-only'); 
    localStorage.setItem('main-nav', ''); 

    // menu setting
    localStorage.setItem('page-wrapper', 'horizontal-wrapper');
    localStorage.setItem('page-body-wrapper', 'horizontal-menu');

    // direction html
    localStorage.setItem('html', 'rtl');
    localStorage.setItem('main-theme-layout', 'rtl');
});

// compact rtl layout
$("#compactrtl-view").click(function(){
    localStorage.setItem('body', 'light-only'); 
    localStorage.setItem('main-nav', 'close_icon');

    // direction html
    localStorage.setItem('html', 'rtl');
    localStorage.setItem('main-theme-layout', 'rtl');

    // menu setting
    localStorage.setItem('page-wrapper', 'compact-wrapper');
    localStorage.setItem('page-body-wrapper', 'sidebar-icon');
});

// dark box layout
$("#darkbox-view").click(function(){
    // direction html
    localStorage.setItem('html', 'ltr'); 

    localStorage.setItem('main-theme-layout', 'box-layout'); 
    localStorage.setItem('body', 'dark-only'); 
    localStorage.setItem('main-nav', '');
    
    // menu setting
    localStorage.setItem('page-wrapper', 'compact-wrapper');
    localStorage.setItem('page-body-wrapper', 'sidebar-icon');
});

// horizontal box layout
$("#verticalbox-view").click(function(){
    localStorage.setItem('body', 'light-only'); 
    localStorage.setItem('main-nav', ''); 

    // menu setting
    localStorage.setItem('page-wrapper', 'horizontal-wrapper');
    localStorage.setItem('page-body-wrapper', 'horizontal-menu');

    // direction html
    localStorage.setItem('html', 'ltr');
    localStorage.setItem('main-theme-layout', 'box-layout');
});

// compact layout
$("#compactdark-view").click(function(){
    localStorage.setItem('body', 'dark-only'); 
    localStorage.setItem('main-nav', 'close_icon');

    // direction html
    localStorage.setItem('html', 'ltr');
    localStorage.setItem('main-theme-layout', 'ltr');

    // menu setting
    localStorage.setItem('page-wrapper', 'compact-wrapper');
    localStorage.setItem('page-body-wrapper', 'sidebar-icon');
});