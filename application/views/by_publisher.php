

    <!-- Page Header -->
    <?php
        /*
         * Get the row has data . 
         */
        $value = $edits[0];
        
    ?>
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" 
            style="background-image: url('<?php echo base_url();?>/Uplods_files/main_page_picture/<?php echo $value->main_page_picture;?>')"
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        
                            <h1><?php echo $value->main_page_title ; ?></h1>
                            <hr class="small">
                            <span class="subheading"><?php echo $value->main_page_header; ?></span>
                        <div class="category  text-center ">
                            <ul>
                                <?php foreach ( $section as $s ) :?>
                                    <li>
                                        <a href="<?php echo base_url();?>index.php/blog/section/<?php echo $s->name_section ?>">
                                            <?php echo $s->name_section ;?> 
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <div class="container ">
        <div class="row">
            <h1 dir="ltr" style="text-align: center; font-size: 55px;"> <?php echo $error; ?> </h1>
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php foreach ( $by_publisher as $p_s ) :?>
                    <div class="post-preview ">
                        <a href="<?php echo base_url();?>index.php/blog/post/<?php echo $p_s->title;?>">
                            <img class="small_photo"
                                src="<?php echo base_url();?>/Uplods_files/<?php echo $p_s->image;?>" width="100%" />
                            <h2 class="post-title">
                                <?php echo $p_s->title; ?> 
                            </h2>
                        </a>
                            <h3 class="post-subtitle">
                                <?php echo substr($p_s->content, 0,50) .' ... .';  ?> 
                            </h3>
                        <p class="post-meta">
                            الناشر
                            <a href="<?php echo base_url();?>index.php/blog/publisher/<?php echo$p_s->blogger;?>"><?php echo $p_s->blogger ;?></a>
                            
                            <i> <?php echo $p_s->date ;?> </i>
                            
                            <span class="left-00" >
                                <span> قسم </span>
                                <a  href="<?php echo base_url();?>index.php/blog/section/<?php echo $p_s->name_section ?>">
                                    <?php echo $p_s->name_section ;?>
                                </a>
                            </span>
                        </p>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <!-- Pager -->
                <ul class="pager">
                   <?php
                        echo $next_button ; 
                        echo $prev_button ;
                    ?>
                    
                </ul>
            </div>
        </div>
    </div>

    <hr>

   