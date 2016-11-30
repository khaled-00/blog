
    <?php 
        /*
         * Get the row has data . 
         */
        $value = $edits[0];
    ?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?php echo base_url();?>/Uplods_files/about_page_picture/<?php echo $value->aboutus_page_picture;?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1><?php echo $value->aboutus_page_title; ?></h1>
                        <hr class="small">
                        <span class="subheading"><?php echo $value->aboutus_page_header; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p><?php echo $value->aboutus_page_contect ?></p>
            </div>
        </div>
    </div>

    <hr>
