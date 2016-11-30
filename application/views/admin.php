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
                            - Posting : 
                        </div>
                        <div class="panel-body">
                            <div class="row" style="padding: 20px;">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <label>Title : </label>
                                    <input name="ipt_title" class="form-control" placeholder="Enter the title . ..">
                                    <br/><br/>
                                    <label>Content : </label>
                                    <textarea id="editor" name="the-post" >  </textarea>
                                    <br/><br/>
                                    <label>Image </label>
                                    <input name="ipt_image" type="file">
                                    <br/><br/>
                                    <label>Sections : </label>
                                    <select name="ipt_section" class="form-control"> 
                                        <?php 
                                            foreach ($sections as  $sec):
                                                echo '<option value="'.$sec->section_id.'">'. $sec->name_section .'</option>';
                                            endforeach;
                                        ?>
                                    </select> 
                                    <br/><br/>
                                    <label>Posting by : </label>
                                    <input name="ipt_bloger" class="form-control" placeholder="Enter text">
                                    <br/>
                                    <button id="post_btn" value="btn_post" name="btn_post" type="submit"  class="btn btn-outline btn-default btn-lg btn-block">
                                         Post now !!  
                                    </button>
                                </form>
                            </div><!-- ./row -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            - Posts :
                        </div>
                        <div class="panel-body">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>Post </th>
                                                        <th>Section</th>
                                                        <th>Blogger</th>
                                                        <th>Date</th>
                                                        <th> Edit </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach ($posts as $value) : ?>
                                                    <tr class='odd gradeX'>
                                                        <td><?php echo $value->title ;?></td>
                                                        <td><?php echo $value->name_section ;?></td>
                                                        <td><?php echo $value->blogger ;?></td>
                                                        <td><?php echo $value->date ;?></td>
                                                        <td style='text-align: center'>
                                                            <form action='' method='post'>
                                                                <input type='hidden' name='up_id_post' value="<?php echo $value->id_post ; ?>" >
                                                                <input type='hidden' name='del_img' value="<?php echo $value->image;?>" >
                                                                <a href="<?php echo base_url();?>index.php/admin/post_edit/<?php echo $value->id_post;?>" class='btn_none' >
                                                                    <i class='fa fa-wrench'></i>
                                                                </a>
                                                                <button name='btn_del_post' value='btn_del_post' class='btn_none' >
                                                                    <i class='fa fa-trash-o'></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>";
                                                    <?php endforeach; ?>
                                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- /.panel-body -->
                        </div>
                    </div>
                
    <!-------------------------------------->
        </div>
    </div>
        
        
    <!-- /#wrapper -->
   
