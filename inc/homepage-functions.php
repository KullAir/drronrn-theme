<?php



if ( ! function_exists( 'homepage_sections_func' ) ) {

	function homepage_sections_func(){
        $id = get_the_ID();
        $rows = get_post_meta( $id, 'hsections', true );
        $size='large';
        if( $rows ) :
        

            for( $i = 0; $i < $rows; $i++ ) {

                $title =  get_post_meta(  $id, 'hsections_'.$i.'_section_title', true );
                $content = apply_filters( 'the_content', get_post_meta( $id, 'hsections_'.$i.'_section_content', true ));
                $image =  (int) get_post_meta(  $id, 'hsections_'.$i.'_section_image', true );
                $sid = get_post_meta(  $id, 'hsections_'.$i.'_section_id', true );

            ?>
                <section <?php if($id) echo 'id="'.$sid.'"'; ?> class="extra-content" >
                    <div class= "container-fluid"> 
                        <div class="row">
                            <div class="col section-content-col">
                                <div class="section-content-wrap">
                                <?php if($title){ echo '<h2 class="section-title">'.$title.'</h2>';} ?>
                                <?php if($content){ echo '<div class="section-content">'.$content.'</div>'; }?>
                                </div>
                            </div><!-- col -->
                        <?php if($image): ?>
                            <div class= "col-md-5 section-image-col">
                                <div class="img-wrap">
                                    <img src="<?php echo wp_get_attachment_image_src( $image, $size  )[0]; ?>" alt="<?php echo $title; ?>" aria-hidden="true" >
                                </div>
                            </div>

                        <?php endif; ?>
                        </div>
                    </div><!--container -->
                </section>
            <?php } ?>
        <?php endif; 

	}
}


if ( ! function_exists( 'plans_model_section' ) ) {
    function plans_model_section(){
        $id = get_the_ID();
        $title = get_post_meta($id ,'pms_title',true);
		$text  = get_post_meta( $id ,'pms_description',true); 
        $movie = get_post_meta( $id ,'pms_movie',true); 
        $options = get_post_meta(  $id, 'plan', true );
        $size =""


        ?>
            
            <section id="plans_model_section">
                <div class="container">
                    <?php if($title): ?>
                        <h2><?php echo $title; ?></h2>
                    <?php endif; ?>

                    <div class="row plans-info-fow">
                        <div class="col">
                        <?php if($text): ?>
                            <div class="info-wrap">
                                <?php echo $text; ?>
                            </div>
                        <?php endif; ?>

                        </div>
                        <?php if( $movie): ?>
                           <div class="col-lg-7">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo youtube_code_caller($movie); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        <?php endif; ?>
                        
                    </div>
                    <?php if($options){ ?>
                        <div class="switch-wrap">
                            <button id="plans-op-1" class="" data-plan="one"><?php echo __("מנוי לחודש"); ?></button>
                            <button id="plans-op-2" class="" data-plan="three"><?php echo __("מנוי לשלושה חודשים"); ?></button>
                        </div>
                        <div class="row plans-display-row">
                        <?php
                        
                            for( $i = 0; $i < $options; $i++ ) {
         
                                $plan_title =get_post_meta(  $id, 'plan_'.$i.'_plan_type', true ); 
                                $plan_price =get_post_meta(  $id, 'plan_'.$i.'_plan_price', true );
                                $plan_display =get_post_meta(  $id, 'plan_'.$i.'_display', true ); 
                                
                                $plan_desc = apply_filters( 'the_content', get_post_meta(  $id,'plan_'.$i.'_details', true )); 
                                
                                $plan_icon = (int) get_post_meta(  $id,  'plan_'.$i.'_icon', true );

                                $classes = implode(" ", $plan_display)  
                           


                                ?>
                                <div class="plan-col col-lg-4 <?php echo $classes;?>">


                                    <div class="plan-wrap">
                                        <div class="plan-top-wrap">
                                            <?php if($plan_icon): ?>
                                                <div class="img-wrap">
                                                    <img src="<?php echo wp_get_attachment_image_src( $plan_icon, $size  )[0]; ?>" alt="<?php echo $plan_title; ?>" aria-hidden="true" >
                                                </div>
                                            <?php endif; ?>
                                           
                                        <?php if($plan_title): ?>
                                            <h3><?php echo $plan_title; ?></h3>
                                        <?php endif; ?>
                                        
                                        <?php if($plan_title): ?>
                                            <div class="h2"><?php echo $plan_price; ?></div>
                                        <?php endif; ?>
                                        </div><!-- plan-top-wrap -->
                                        <div class="plan-desc">
                                            <?php echo $plan_desc; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            
                            }
                            ?>
                             </div>
                        <?php   }  ?>
                   



                </div>



            </section>


        <?php

    }
}

if ( ! function_exists( 'homepage_contactus_func' ) ) {

	function homepage_contactus_func(){
		
		$title = get_post_meta(get_the_ID(),'contact_title',true);
		$text  = apply_filters( 'the_content', get_post_meta( get_the_ID(),'contact_text',true)); 
		$form = get_post_meta( get_the_ID(),'form_shortcode',true); 

		?>
			<section id="contactus" class="">



				<div class=" col-md-12" id="">
					<div class= "container">
						<div class="row">
							
							<div class=" col-md-12" >
								<?php
								if ( $text || $title){
								?>
									<h2 id="contact-title" ><?php echo $title; ?></h2>
									<div class="contact-text">	
										<?php echo $text; ?>
									</div>
									<?php
									}
								?>



								<div class="form-wrap">
									<?php
									if($form):
										echo do_shortcode($form);
									else:
										 echo do_shortcode('[contact-form-7 id="17" title="home page contact"]'); 
									endif;
									?>
								</div>

							</div>
						</div>
					</div>
				</div>
			</section>
		<?php


	}
}


if ( ! function_exists( 'homepage_testimonials_func' ) ) {
	function homepage_testimonials_func() {
	   
		/*

		 'tax_query'  => array(
        array(
            'taxonomy'  => 'post_tag',
            'field'     => 'slug',
            'terms'     =>  array(
                'tag1',
                'tag2',
            ),
		),
		*/


		$returnContent = '<section id="testimonials-sections">
		<h2 id="test-title" class="underline-titles undeline-title-center underline-green">'.__('מה אומרים הלקוחות').'</h2>
        <div class="container">
           
			<div class="row">';
				
         $term = term_exists('homepage', 'post_tag');
        if (post_type_exists( 'testimonials' )){

            if ($term !== 0 && $term !== null) {
                $args = array( 'posts_per_page' => 4, 'post_type'   => 'testimonials', 'tag'=> 'homepage' );
            }else{
                $args = array( 'posts_per_page' => 4, 'post_type'   => 'testimonials' );
            }
        
        
        }else{
           // $args = array( 'posts_per_page' => 4,  'category_name' 	=> 	'testimonials' , 'tag'=> 'homepage');
          
            if ($term !== 0 && $term !== null) {
                
                $args = array( 'posts_per_page' => 4,  'category_name' 	=> 	'testimonials' , 'tag'=> 'homepage');
            } else {
                $args = array( 'posts_per_page' => 4,  'category_name' 	=> 	'testimonials' );
            }


           
           
        }
           
        
		$loop = get_posts( $args );//get_posts
		
		
	
		foreach ( $loop as $post ): 
			//
            $returnContent = $returnContent. '<div class="col-md-6">
			<div class="testem_inner">	
					<p class="testem-body">'.short_segment(strip_shortcodes($post->post_content),320).'</p>
					<p class="testem-name"><span class="strong">'.$post->post_title.'</span></p>
				
				</div>
			</div>';
		endforeach;	
		//*/ 		
		$returnContent = $returnContent.'</div><!-- row --></div><!-- contianer -->'; 

		$link =  get_post_meta( get_the_ID(), 'testi_link', true ) ;
		
		
		if( $link ):
			 
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';

			$returnContent = $returnContent.'<div class="section-link-wrap"><a href="'.$link_url.'" target=="'.$link_target.'" class="button">'.$link_title.'</a></div>';

		endif;	

		$returnContent = $returnContent.'</section>'; 
		
		echo $returnContent ;


    }
}


if ( ! function_exists( 'homepage_linklist_func' ) ) {
	function homepage_linklist_func() {

        $id = get_the_ID();
        $rows = get_post_meta(  $id, 'links_list', true );
        $section_title =  get_post_meta(  $id, 'the_list_title', true );
        $size='large';
       
       
        if( $rows ) {
            ?>
            <nav id="page-links-list"  class="page-links-list">
            <?php
            if( $section_title ){
               ?>
               <h2><?php echo $section_title; ?></h2>
               <?php
            }
            ?>
            <div class="container">
                <div class="row">
            <?php
                        

            for( $i = 0; $i < $rows; $i++ ) {
         
                $title =get_post_meta(  $id, 'links_list_'.$i.'_list_item_title', true ); 
             //   $desc =get_post_meta(  $id,'links_list_'.$i.'_list_item_desc', true ); 
                $link = get_post_meta(  $id,  'links_list_'.$i.'_the_url', true );
              //  $image= (int) get_post_meta(  $id, 'links_list_'.$i.'_list_item_image', true );
                $nofollow =get_post_meta(  $id, 'links_list_'.$i.'_list_item_nofollow', true ); 
                $col_class= "col-sm-12";
                
                if(!empty($nofollow)){
                    $rel =  'rel="'.$nofollow[0].'"';
                }else{
                    $rel ='';
                }
                if( $link ){
                    ?>
                    <div class="links-item-wrap col-md-3">
                   
                        

                          
                                <a class="links-list-link" href="<?php echo $link; ?>"  <?php echo $rel; ?>><?php echo $title; ?> </a>
                                  
                              
                          
                        
                    </div> <!--service-item-wrap col-md-6 -->
                <?php
                } 
            }
            ?>  
             </div>
            </div></nav>
            <?php
              
            
                
        }

    }
}
//**** Youtube *****/


function get_youtube_code($string , $youtube_src){
	//$youtube_src= 'h';
	$mid = '';
	$is_youtube = strpos( $string, $youtube_src );


	
	if (!($is_youtube === false) ){
		if ($youtube_src=='https://www.youtube.com/embed/'){		

			$start_point = $is_youtube + strlen($youtube_src);
			$end_point =  strpos($movie,'"',$start_point );
			$mid = substr ($movie,$start_point,$end_point-$start_point);

		}else{
			$start_point = 	$start_point + strlen($youtube_src);
			$end_point =  strlen($string);
			$mid = substr ($string,$start_point,$end_point-$start_point);

		}


		$query_mark =  strpos( $mid ,"?");

		if ( $query_mark != FALSE  ){
			$mid =  substr ($mid,0,$query_mark);
		}
	
	}
	
	return $mid;
	
}

function youtube_code_caller($string , $index = 3 ){

	switch ($index){
		case 3:
			$youtube_str= 'https://www.youtube.com/embed/';
			
			break;
		case 2:
			$youtube_str= 'https://youtu.be/';
			 
			
			break;

		case 1:
			
			$youtube_str= 'https://www.youtube.com/watch?v=';
			break;
		
		case 0:
			return false;
			break;

	}
	
	$returnVal = get_youtube_code($string,$youtube_str );

	if ( $returnVal == ''){

		$index--;
		return youtube_code_caller($string,$index);

	}

	return $returnVal;
}	



//***********************/
/*
add_action("homepage_pre_header_actions",'homepage_announcement',10);
add_action("homepage_hebo_actions",'homepage_banner_text_func',20);*/
add_action("homepage_actions",'homepage_sections_func',10);

add_action("homepage_actions",'plans_model_section',20);
add_action("homepage_actions","homepage_contactus_func",30);
add_action("homepage_actions","homepage_testimonials_func",40);
add_action("homepage_actions","homepage_linklist_func",50);






