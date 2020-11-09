jQuery(document).ready(function ($) {

	//Submenu Dropdown Toggle
	// if($('.header-main li.menu-item-has-children ul.sub-menu').length){
	// 	$('.header-main li.menu-item-has-children > a').append('<i class="i-plus"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="451.847px" height="451.847px" viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;" xml:space="preserve" fill="#fff"><g><path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></i>');
	// }

	// $(".header-main .hamburger").on('click', function(e){
	// 	$(this).toggleClass('is-active');
	// 	$('header.header-main .right-box .header-menu').slideToggle(300);
	// 	$('.header-main .header-menu').toggleClass('mobile-menu');
	// });

	//$(document).on('click', '.header-main .header-menu.mobile-menu > .menu-item-has-children > a > .i-plus', function(e){
	// 	e.preventDefault();
	// 	let subMenuItem = $(this).parent().parent();
	// 	subMenuItem.toggleClass('menu-item-child-active');
	// 	subMenuItem.find('.sub-menu').slideToggle(300);

	// });

    /* ================== Show Top on Scroll =================== */
    function showFixedTop() {
        let windowTop = $(window).scrollTop();
        let heightTop = 300;

        if( $('body').hasClass('home') ){
            heightTop = 1200;
        }

        if( $('body').hasClass('single-case_study') ){
            heightTop = 750;
        }

        if (windowTop > heightTop) {
            $('.fixed-header').addClass('active'); 
        } else {
            $('.fixed-header').removeClass('active'); 
        }
    }
    showFixedTop();

    $(window).scroll(function () {
        showFixedTop();
    });

	$(".header-main .hamburger-menu").on('click', function(e){
		$(this).toggleClass('active');
		$(".header-main .header-box").toggleClass('active');
		$('body').toggleClass('body-hidden');
	});

    function recursiveCompare(obj, reference){
        if(obj === reference) return true;
        if(obj.constructor !== reference.constructor) return false;
        if(obj instanceof Array){
             if(obj.length !== reference.length) return false;
             for(var i=0, len=obj.length; i<len; i++){
                 if(typeof obj[i] == "object" && typeof reference[j] == "object"){
                     if(!recursiveCompare(obj[i], reference[i])) return false;
                 }
                 else if(obj[i] !== reference[i]) return false;
             }
        }
        else {
            var objListCounter = 0;
            var refListCounter = 0;
            for(var i in obj){
                objListCounter++;
                if(typeof obj[i] == "object" && typeof reference[i] == "object"){
                    if(!recursiveCompare(obj[i], reference[i])) return false;
                }
                else if(obj[i] !== reference[i]) return false;
            }
            for(var i in reference) refListCounter++;
            if(objListCounter !== refListCounter) return false;
        }
        return true;
    }

	//Set z-inted Footer in Home Page

    if( $('body').hasClass('home') ){

        // Show/Hide Tetris Modal
        var $demo = $('#tetris-demo').blockrain({
            speed: 20,
        });

        let keys = [];
        let keysOrigin = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];

        $(document).keyup(function(e) {
            if(e.keyCode != 13){
                keys.push(e.keyCode);
            }else{
                var equalKeys = recursiveCompare(keys, keysOrigin);
                if(equalKeys === true){
                    $('.modal-tetris').fadeIn(); 
                    $('body, .page-home').addClass('body-hidden');
                }
                keys = [];
            }
        });

        $('.modal-tetris').on('click', function(e){ 
            let target = $(e.target); 
            console.log(target);
            if (target[0].className.includes('close-modal')) {
                $('.modal-tetris').fadeOut(); 
                $('body').removeClass('body-hidden');
                $('.modal_team_content').removeClass('active'); 
            } 
        });

        //=======================================================

        let scroll = $(window).scrollTop(),
        	homeBlackSec = $('.fixed-black-box').outerHeight(),	
        	housesHeight = $('.houses-box').outerHeight(),
        	housesTop = $('.houses-box').offset().top,  
        	windowHeight = $(window).height(),
    	    startIndustriesAnimate = windowHeight + scroll - housesHeight/2,
        	workedIndustriesAnimate	= false;

        let industriesHeight = $('.industries-sec').outerHeight();
        let industriesTop = $('.industries-sec').offset().top;

        let industriesBoxHeight = $('.industries-box').outerHeight();
        let industriesBoxTop = $('.industries-box').offset().top;

        let industriesDifference = industriesHeight - industriesBoxHeight;

        let industriesCasesAnimateFlag = false;
        let industriesHideLabelFlug = false;
        let industriesCasesAnimate2Flag = false;

        let industriesText = $('#industries_text_box');
        let industriesCases = $('#industries_cases_box');

        let width = $(window).width();
        	
        function setIndexHomeFooter(){
        	if (scroll > (homeBlackSec + 1000)) {
           		$('.footer-main').css('zIndex', '9999');
    		}else{
    		    $('.footer-main').css('zIndex', '-1');
    		}
       	}	
       	setIndexHomeFooter();

       	function startIndustriesAnimateFunc(){
        	if(startIndustriesAnimate > housesTop && workedIndustriesAnimate === false){
        		workedIndustriesAnimate = true;
            	document.getElementById("animate_1").beginElement();
                console.log('START');
            }
       	}	
    	startIndustriesAnimateFunc();
    	   

       	function startIndustriesAnimateMainFunc(){
       		width = $(window).width();

            let svgText = $('.houses-box svg .hide');


            if( width > 992 && windowHeight + scroll - housesHeight > housesTop && 
                windowHeight + scroll - housesHeight < housesTop + industriesDifference/2 && 
                industriesCasesAnimateFlag === false){

                industriesCasesAnimateFlag = true;
                
                industriesCases.removeClass('visible-box');
                industriesText.removeClass('hide-box');

                //svgText.fadeIn();
                svgText.removeClass('none');
            }

            if( width > 992 && windowHeight + scroll - housesHeight > housesTop + industriesDifference/2 && 
                windowHeight + scroll  < industriesTop + industriesHeight &&
                industriesCasesAnimateFlag === true){

                industriesCasesAnimateFlag = false;

                setTimeout(()=>{
                    industriesCases.addClass('visible-box');
                }, 500);
                
                industriesText.addClass('hide-box');

                //svgText.fadeOut();
                svgText.addClass('none');
            }

       	}	
       	//startIndustriesAnimateMainFunc();

       	let noScroll = false;

        $(window).scroll(function () {

            let $this = $(this);
            scroll = $this.scrollTop(),
            startIndustriesAnimate = windowHeight + scroll - housesHeight/2,

            setIndexHomeFooter();
            startIndustriesAnimateFunc();
            //startIndustriesAnimateMainFunc();

    	});
    }    

    /* Load Mome Resources  */
    $('#loadmore_resources').click(function(){
        $(this).text('Loading...'); 
        var data = {
            'action': 'loadmore_resources',
            'query': true_posts,
            'page' : current_page,
            'topic' : topic,
            'post_ids' : post_ids
        };
        $.ajax({ 
            url:ajaxurl,
            data:data, 
            type:'POST', 
            success:function(data){
                if( data ) { 
                    $('#loadmore_resources').text('Load More'); 
                    $('.resources-posts-box').append(data);
                    current_page++; 
                    if (current_page == max_pages) $("#loadmore_resources").remove(); 
                } else {
                    $('#loadmore_resources').remove(); 
                }
            }
        });
    });

    // Search on Focus Out
    if( $('#searchform').length > 0){
        $('#search_resourse_input').focusout(function(){
            if($(this).val()){
                $('#searchform').submit();
            }
        });
    }

    //Case Stydy Scroll Button

    if( $('.case-study_cta .btn').length ){
        $('.case-study_cta .btn').on('click', function (e) {
            let id_case_section = $(this).attr('href').trim();
            let firstLetter = id_case_section.slice(0, 1);

            if(firstLetter === '#'){
                e.preventDefault();
                    $('html, body').animate({
                    scrollTop: $(id_case_section).offset().top
                }, 1000);
            }
        });
    }


    if( $('#keyboard').length ){
        
        let tooltipElem;

        $( "#keyboard" ).hover(
            function(event) {
                let target = document.getElementById('keyboard') ;
                let tooltipHtml = $(this).data('tooltip');

                if (!tooltipHtml) return;

                tooltipElem = document.createElement('div');
                tooltipElem.className = 'tooltip';
                tooltipElem.innerHTML = tooltipHtml;
                target.append(tooltipElem);

            }, function(event) {
                if (tooltipElem) {
                    tooltipElem.remove();
                    tooltipElem = null;
                }
            }
        );
    }   

    /* CTA Button */
    // $(document).on('click', '.small_banner .hubspot_cta_btn', function(e){
    //     e.preventDefault();
    //     let cta_button = $(this).parent().find('.cta_button');
    //     cta_button[0].click();
    // });    
});