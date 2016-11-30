<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php
            /*
             * For get all of data
             */
            $post = $posts[0];
        ?>

        <div id="page-wrapper">
            <?php echo empty($success) ? '' : $success ; ?>
            <?php echo empty($erorr)   ? '' : $erorr   ; ?>
            <br/>
            <br/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            - Posting : 
                        </div>
                        <div class="panel-body">
                            <!-- 
                               - Will stop show this part when the page has something wrong
                              -->
                            <?php if(!empty($posts[0])){ ?>
                            <div class="row" style="padding: 20px;">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <label>Title : </label>
                                    <input value="<?php echo $post->title; ?>" name="ipt_title_upde" class="form-control" placeholder="Enter the title . ..">
                                    <br/><br/>
                                    <label>Content : </label>
                                    <textarea id="editor" name="the-post_upde" > <?php echo $post->content; ?> </textarea>
                                    <br/><br/>
                                    <label>Image </label>
                                    <input name="ipt_image_upde" type="file">
                                    <img src="<?php echo base_url();?>/Uplods_files/<?php echo $post->image ;?>" width="150" />
                                    <br/><br/>
                                    <label>Sections : </label>
                                    <select name="ipt_section_upde" class="form-control"> 
                                        <option value="<?php echo $post->section_id; ?>"><?php echo $post->name_section; ?></option>
                                        <?php 
                                            foreach ($sections as  $sec):
                                                echo '<option value="'.$sec->section_id.'">'. $sec->name_section .'</option>';
                                            endforeach;
                                        ?>
                                    </select> 
                                    <br/><br/>
                                    <label>Posting by : </label>
                                    <input value="<?php echo $post->blogger;?>" name="ipt_bloger_upde" class="form-control" placeholder="Enter text">
                                    <br/>
                                    <button value="btn_update" name="btn_update" type="submit" class=" btn btn-outline btn-default btn-lg btn-block">
                                         Update !!  
                                    </button>
                                </form>
                            </div><!-- ./row -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
               
                
    <!-------------------------------------->
        </div>
        <br/>
    </div>
<br/>
        
        
    <!-- /#wrapper -->
   
