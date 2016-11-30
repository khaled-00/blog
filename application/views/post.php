
    <?php 
        /*
         * Get all of data
         */
        if(!empty($posts[0]) )
            $post = $posts[0];
        else 
            $post = array();
        
    ?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" 
            style="background-image: url('<?php echo base_url();?>/Uplods_files/<?php echo $post->image ;?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1><?php echo $post->title ;?></h1>
                        <span class="meta">الناشر
                            <a href="<?php echo base_url();?>index.php/blog/publisher/<?php echo $post->blogger;?>">
                            <?php echo $post->blogger ;?></a> <?php echo $post->date ;?>
                        </span>
                        <div class="category  text-center ">
                            <ul>
                                <?php foreach ($sections as $section) : ?>
                                <li>
                                    <a href="<?php echo base_url();?>index.php/blog/section/<?php echo $section->name_section ?>">
                                        <?php echo $section->name_section ;?>
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

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <h1 dir="ltr" style="text-align: center; font-size: 55px;"> <?php echo $error; ?> </h1>
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php echo $post->content ;?>
                </div>
            </div>
        </div>
    </article>

    <hr>

    