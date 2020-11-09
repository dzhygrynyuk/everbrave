<?php 
get_header(); 
$fields = get_fields();
?>

<main class="page-home">
	<section class="fixed-black-box">
		<div class="black-wrapper">
			<div class="container">
				<?php if($fields['first_section_title']): ?>
					<h1><?php echo $fields['first_section_title'];?></h1>
				<?php endif; ?>
				<img class="logo-gif"
					loop="infinite"
					id="imgcontainer" 
					src="<?php echo get_template_directory_uri();?>/assets/img/logo-gif.gif" alt="Image">
				<?php if($fields['first_section_desc']): ?>
					<div class="desc-box"><?php echo apply_filters( 'the_content', $fields['first_section_desc'] );?></div>
				<?php endif; ?>
				<div class="arrow-bown" data-id="devices-sec">
					<span class="top-arrow"></span>
					<span class="bottom-arrow"></span>
				</div>
			</div>
		</div>
	</section>

	<div class="homa-main-wrapper">
		<div class="everbuddy-wrapper">
			<img src="<?php echo get_template_directory_uri();?>/assets/img/everbuddy-scroll.svg" alt="Everbuddy">
		</div>
		<div class="homa-main-box">

			<section id="devices-sec" class="devices-sec">
				<div class="container">
					<div class="text-wrapper">
						<img class="devices-sec_mobile-img" 
							src="<?php echo get_template_directory_uri();?>/assets/img/devices_mobile_2x.png" alt="Image">
						<?php if($fields['home_devices_title']): ?>
							<h2><?php echo $fields['home_devices_title'];?></h2>
						<?php endif; ?>
						<?php if($fields['home_devices_desc']): ?>
							<div class="desc-box"><?php echo apply_filters( 'the_content', $fields['home_devices_desc'] );?></div>
						<?php endif; ?>
						<?php if(!empty($fields['home_devices_btn']) && ($fields['home_devices_btn']['title'] && $fields['home_devices_btn']['url'])) : ?>
							<a href="<?php echo $fields['home_devices_btn']['url'];?>" class="button black" target="<?php if($fields['home_devices_btn']['target']){print('_blank');}?>"><?php echo $fields['home_devices_btn']['title'];?></a>
						<?php endif;?>
						<div id="keyboard" data-tooltip="Up, Up, Down, Down, Left, Right, Left, Right, B, A, Enter" class="keyboard">
							<img class="keyboard-1" src="<?php echo get_template_directory_uri();?>/assets/img/keyboard.png" alt="Devices">
							<img class="keyboard-2" src="<?php echo get_template_directory_uri();?>/assets/img/keyboard-3.png" alt="Devices">
						</div>
						
					</div>
					<img class="right-devices" src="<?php echo get_template_directory_uri();?>/assets/img/devices_new.png" alt="Devices">
				</div>
			</section>

			<!-- <?php echo do_shortcode('[indeedattribution]');?>
			<?php echo do_shortcode('[indeedsearchstyle]');?>
			<?php echo do_shortcode('[indeedsearchform]');?>
			<?php echo do_shortcode('[indeedsearchresults]');?> -->

			<!-- <button data-tooltip="эта подсказка должна быть длиннее, чем элемент">Короткая кнопка</button> -->

			<section class="organizations-sec">
					
					<div class="industries-sec">
						<div class="industries-box">
							<div id="industries_text_box" class="text-box">
								<div class="container">
									<div class="text-wrapper">
										<?php if($fields['home_organizations_title']): ?>
											<h2><?php echo $fields['home_organizations_title'];?></h2>
										<?php endif; ?>
										<?php if($fields['home_organizations_desc']): ?>
											<div class="desc-box"><?php echo apply_filters( 'the_content', $fields['home_organizations_desc'] );?></div>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="houses-box">
								<?php include 'inc/industries.php';?>
							</div>
						</div>
					</div>

			</section>


			<section class="home-growth-stories">
				<?php if($fields['home_case_study']): ?>

					<div class="container">
						<h2>Growth Stories</h2>
					</div>	

					<div id="industries_cases_box" class="cases-wrapper">
						<div class="container">
							<div class="cases-box">
								<?php foreach ($fields['home_case_study'] as $case): 
									if(!empty($case['item'])): 
										$case_fields = get_fields($case['item']);
										$case_thumbnail_url = '';
										if($case_fields['banner_background_image']){
										    $case_thumbnail_url = $case_fields['banner_background_image'];
										}else{
										    $case_thumbnail_url = get_template_directory_uri().'/assets/img/default-thumbnail.jpg';
										}
										?>
										<div class="item">
											<a href="<?php echo get_the_permalink($case['item']); ?>" class="img-link">
												<div class="img-link_bg" style="background-image: url('<?php echo $case_thumbnail_url ;?>');"></div>
											</a>
											<div class="content-box">
												<?php if($case_fields['case_study_description']): ?>
													<div class="desc-wrp">
														<?php echo $case_fields['case_study_description']; ?>
														<?php /* if(strlen($case_fields['case_study_description']) > 95){
															echo substr($case_fields['case_study_description'], 0, 95) . '...';
														}else{
															echo $case_fields['case_study_description'];
														} */?>
													</div>
												<?php endif; ?>	
												<?php if($case_fields['case_study_subtitle']): ?>
													<span class="case-label"><?php echo $case_fields['case_study_subtitle']; ?></span>
												<?php endif; ?>	
												<a href="<?php echo get_the_permalink($case['item']); ?>" class="title"><?php if($case_fields['case_study_title']){ echo $case_fields['case_study_title']; }else{ echo get_the_title($case['item']); } ?></a>
												<a href="<?php echo get_the_permalink($case['item']); ?>" class="left-arrow"></a>
											</div>
										</div>
									<?php endif; ?>	
								<?php endforeach; ?>
							</div>

							<?php if( !empty($fields['home_case_study_btn']) && $fields['home_case_study_btn']['title'] && $fields['home_case_study_btn']['url'] ): ?>
									<div class="home_case_study_btn_wrp">
										<a href="<?php echo $fields['home_case_study_btn']['url']; ?>" class="home_case_study_btn"><?php echo $fields['home_case_study_btn']['title']; ?></a>
									</div>
							<?php endif; ?>	
						</div>
						
						<!-- <?php if( !empty($fields['home_case_study_btn']) && $fields['home_case_study_btn']['title'] && $fields['home_case_study_btn']['url'] ): ?>
							<div class="all-cases-btn">
								<a href="<?php echo $fields['home_case_study_btn']['url']; ?>" class="button black"><?php echo $fields['home_case_study_btn']['title']; ?></a>
							</div>
						<?php endif; ?>	 -->	
					</div>
										
				<?php endif; ?>	
			</section>
			
			
			<!--------------------------------------------- Resources --------------------------------------------->
			<?php $args_posts = array(
			    'post_type' => 'post', 
			    'posts_per_page' => 3,
			    'orderby' => 'date',
			    'order'   => 'DESC',
			    'category_name' => 'featured'
			);
			$loop_posts = new WP_Query( $args_posts );?>

			<section class="home-posts-sec">
				<div class="container">	
					<?php if($fields['home_posts_title']): ?>
						<h2><?php echo $fields['home_posts_title'];?></h2>
					<?php endif; ?>

					<?php if($loop_posts->have_posts()): ?>
						<div class="posts-box">
							<?php while ($loop_posts->have_posts()): $loop_posts->the_post();
								get_template_part( 'template-parts/post', 'item' );
							endwhile; ?>	
						</div>
					<?php endif; ?>
				</div>
			</section>	

			<!-- <article id="versus-arena">
				<div class="game-holder" id="tetris-versus-1">
					<div class="score">0</div>
					<div class="game game-first"></div>
				</div>

				<div class="game-holder" id="tetris-versus-2">
					<div class="score">0</div>
					<div class="game game-second"></div>
				</div>
			</article> -->

			<?php if($fields['home_bottom_articles']): ?>
				<section class="home-bottom-articles">
					<div class="bottom-articles">
						<?php foreach ($fields['home_bottom_articles'] as $article): 
							if($article['bg_color']){
								$bg_color = $article['bg_color'];
							}else{
								$bg_color = "#000";
							}
							?>
							<div class="item">
								<div class="bg-wrapper" style="background-color: <?php echo $bg_color ?>;">
									<img class="bg-image" src="<?php echo $article['img']; ?>" alt="Image">
								</div>
								<div class="content-box">
									<?php if($article['title']): ?>
										<h3><?php echo $article['title']; ?></h3>
									<?php endif; ?>
									<?php if(!empty($article['link']) && ($article['link']['title'] && $article['link']['url'])) : ?>
										<a href="<?php echo $article['link']['url'];?>" class="button white" target="<?php if($article['link']['target']){print('_blank');}?>"><?php echo $article['link']['title'];?></a>
									<?php endif;?>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</section>
			<?php endif; ?>	
				
			<?php //get_footer(); ?>
		</div>
	</div>

	<div class="modal-tetris">
		<div class="wrap close-modal">

			<div id="examples">
				<article id="example-slider">
					<div class="example">
						<div class="instructions">
							Use only arrows
							<div class="keyboard">
								<div class="key key-up">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/arrow-up.png" alt="">
								</div>
								<div class="key key-left">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/arrow-left.png" alt="">
								</div>
								<div class="key key-down">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/arrow-down.png" alt="">
								</div>
								<div class="key key-right">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/arrow-right.png" alt="">
								</div>
							</div>
						</div>
						<div class="game" id="tetris-demo"></div>
					</div>
				</article>
			</div>

		</div>
	</div>



</main>



<script>

	jQuery(document).ready(function ($) {


		// $('.keyboard').on('click', function(){
  //           $('.modal-tetris').fadeIn(); 
  //           $('body, .page-home').addClass('body-hidden');
		// });
		
		$('.modal-tetris').on('click', function(e){ 
            let target = $(e.target); 
            console.log(target);
            if (target[0].className.includes('close-modal')) {
                $('.modal-tetris').fadeOut(); 
                $('body').removeClass('body-hidden');
                $('.modal_team_content').removeClass('active'); 
            } 
		});

		var $demo = $('#tetris-demo').blockrain({
			speed: 20,
		});

		// function switchDemoTheme(next) {

		// 	var themes = Object.keys(BlockrainThemes);

		// 	var currentTheme = $demo.blockrain('theme');
		// 	var currentIx = themes.indexOf(currentTheme);

		// 	if( next ) { currentIx++; }
		// 	else { currentIx--; }

		// 	if( currentIx >= themes.length ){ currentIx = 0; }
		// 	if( currentIx < 0 ){ currentIx = themes.length-1; }

		// 	$demo.blockrain('theme', themes[currentIx]);
		// 	$('#example-slider .theme strong').text( '"'+themes[currentIx]+'"' );
		// }

		// ========================= Growth Stories AutoHeight =========================

		let maxHeightDesc = 0;
		let maxHeightTitle = 0;

		function autoHeightGrowthStories(){
			$('.cases-box > .item .desc-wrp').each(function (index, value) { 
				if($(this).height() > maxHeightDesc) {
		         	maxHeightDesc = $(this).height();  
		        }
			});
			$('.cases-box > .item .title').each(function (index, value) { 
				if($(this).height() > maxHeightTitle) {
		         	maxHeightTitle = $(this).height();  
		        }
			});
			//console.log('maxHeightDesc - '+ maxHeightDesc);
			//console.log('maxHeightTitle - '+ maxHeightTitle);

			$('.cases-box > .item .desc-wrp').css('min-height', maxHeightDesc+'px');
			$('.cases-box > .item .title').css('min-height', maxHeightTitle+'px');
		}

		autoHeightGrowthStories();

		$(window).resize(function() {
    		autoHeightGrowthStories();
		});

	});

</script>

<?php get_footer(); ?>