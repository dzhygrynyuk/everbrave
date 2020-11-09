jQuery(document).ready(function ($) {

    /* ================== Fixed Header =================== */
    var currentWindowTop = $(window).scrollTop();
    var widowHeight = $(window).height();

    /* ================== Scroll to Section =================== */
	$('.arrow-bown').on('click', function () {
        var pagesWithoutOffset = ['how-info', 'page-case-study_content' ];

        let id = $(this).data('id');
        const offset = pagesWithoutOffset.includes(id) ? 0 : 100;

		$('html, body').animate({
            scrollTop: $('#' + id).offset().top - offset
        }, 500);
        
    });

    /* ================== Open Mobile Submenu =================== */
    $('.header-main .menu-item-has-children a').on('click', function(){

        $('.header-main  .menu-item-has-children a').not(this).parent().find('.sub-menu').slideUp();
        $('.header-main  .menu-item-has-children a').not(this).removeClass('active');

        $(this).toggleClass('active');
        $(this).parent().find('.sub-menu').slideToggle();
    });

    if($(window).width() < 991){
        $('.header-menu .sub-menu').prev().removeAttr("href");
    }

    
    /* ================== Team Mobile =================== */
    if($(window).width() < 767){
        $(".member").slice(3).wrapAll('<div class="team_mobile">');
        $('.btn_team').on('click', function(){
            $('.team_mobile').slideToggle();
            $(this).hide();
        });
    }

    /* ================== Kind of Talent Animate =================== */
    if($('.page-template').hasClass('page-template-careers')){
        $(window).scroll(function(){
            var windowTop = $(window).scrollTop();
            var offset = $('.kind-talent').offset().top
            var height = $('.kind-talent').height();
            var targetHero = $('.flying-hero');
            var difference = (windowTop + height - offset) / 2;
    
            if(windowTop + height > offset){
                console.log(difference)
                targetHero.css('margin-top', -difference + 'px');
            }
        });  
    }


    /* ================== How Page =================== */
    function howAnimate(){
       var windowWidth = $(window).width();
       var targetWrap = $('.how-banner_item_wrap');
       targetWrap.css('width',  windowWidth);

       var target = $('.how-banner_item');

       target.each(function () {
            var index = $(this).data('key');
            $(this).css('transition-delay', index * 2 + 's');
        });

       $('.how-banner .wrap').addClass('start-animate');

    }
    howAnimate();


    var blockHeight = $('.how-menu_item-text').height();
    $('.how-menu_item-more').on('click', function(){
        var blockMenuItem = $(this).parent();
        var textBlockHeight = blockMenuItem.find('.how-menu_item-text').height();
        var textHeight = blockMenuItem.find('.desc').height();

        blockMenuItem.parent().toggleClass('active');

        if(textBlockHeight == textHeight){
            blockMenuItem.find('.how-menu_item-text').css('height', blockHeight + 'px');
            $(this).text("More"); 
        }else{
            blockMenuItem.find('.how-menu_item-text').css('height', textHeight + 'px');
            $(this).text("Less");
        }

    });



});


