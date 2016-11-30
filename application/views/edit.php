<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <div id="page-wrapper">
            <?php echo empty($success) ? '' : $success ; ?>
            <?php echo empty($erorr)   ? '' : $erorr   ; ?>
            <br/>
            <br/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            - images :
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <label>Main page</label>
                                        <input type="file" name="main_img">
                                        <input class="btn btn-outline btn-default btn-sm right00" name="btn_main_img" type="submit" value="Update !!" />
                                        <br/>
                                        <label>About us page</label>
                                        <input type="file" name="about_img">
                                        <input class="btn btn-outline btn-default btn-sm right00"  name="btn_about_img" type="submit" value="Update !!"/>
                                        <br/>
                                        <label>Connect us page </label>
                                        <input  type="file" name="connect_img">
                                        <input class="btn btn-outline btn-default btn-sm right00"name="btn_connect_img"  type="submit" value="Update !!"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <?php foreach ($data as $value): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            - titles : <!-- just 300 words -->
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="" method="post">     
                                        <label>Main page</label>
                                        <input class="form-control" placeholder="Enter Title .  . ." name="title_main" value="<?php echo $value->main_page_title ?>">
                                        <input class="btn btn-outline btn-default btn-sm right00" name="btn_title_main" value="Update !!" type="submit" />
                                        <br/>
                                        <label>About us page</label>
                                        <input class="form-control" placeholder="Enter Title .  . ." name="title_about" value="<?php echo $value->aboutus_page_title ?>">
                                        <input class="btn btn-outline btn-default btn-sm right00" name="btn_title_about" value="Update !!" type="submit" />
                                        <br/>
                                        <label>Connect us page</label>
                                        <input class="form-control" placeholder="Enter Title .  . ." name="title_connect" value="<?php echo $value->connectus_page_title ?>">
                                        <input class="btn btn-outline btn-default btn-sm right00" name="btn_title_connect" value="Update !!" type="submit" />
                                        
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            - Headers : <!-- just 200 words -->
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="" method="post">
                                        <label>Main page</label>
                                        <textarea class="form-control" name="head_main" rows="3"><?php echo $value->main_page_header ?></textarea>
                                        <input class="btn btn-outline btn-default btn-sm right00" name="btn_head_main" value="Update !!" type="submit" />
                                    <br/>
                                        <label>About us page</label>
                                        <textarea class="form-control" name="head_about" rows="3"><?php echo $value->aboutus_page_header ?></textarea>
                                        <input class="btn btn-outline btn-default btn-sm right00" name="btn_head_about" value="Update !!" type="submit" />
                                    <br/>
                                        <label>Connect us page</label>
                                        <textarea class="form-control" name="head_connect" rows="3"><?php echo $value->connectus_page_header ?></textarea>
                                        <input class="btn btn-outline btn-default btn-sm right00" name="btn_head_connect" value="Update !!" type="submit" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            - Contents :
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="" method="post">
                                    <br/>
                                        <label>About us page</label>
                                        <textarea class="form-control" name="content_about" rows="6"><?php echo $value->aboutus_page_contect ?></textarea>
                                        <input class="btn btn-outline btn-default btn-sm right00" name="btn_content_about" value="Update !!" type="submit" />
                                    <br/>
                                        <label>Connect us page</label>
                                        <textarea class="form-control" name="content_connect" rows="6"><?php echo $value->connectus_page_contect ?></textarea>
                                        <input class="btn btn-outline btn-default btn-sm right00" name="btn_content_connect" value="Update !!" type="submit" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div><!-- page-wrapper -->
        
        
    <!-- /#wrapper -->
   
