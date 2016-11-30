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
                                - Sections Editor :
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <br/>
                                        <br/><br/>
                                        <div class="form-group input-group">
                               <!-- form --><form action="" method="post">
                                                <input type="text" name="inpt-section" class="form-control" placeholder="Username">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" name="btn-section" value="btn-section" type="submit">
                                                        <i class="fa fa-plus"> ADD </i>
                                                    </button>
                                                </span>
                             <!-- /form --></form>
                                        </div>
                                    </div><!-- /col-lg-6 -->
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                    <br/><br/><br/>
                                    <div class="panel-body">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>Section </th>
                                                        <th>Date</th>
                                                        <th>Edits</th>
                                                    </tr>
                                                </thead>
                                                
                                                
                                                <tbody>
                                                   <?php
                                                    foreach ($sections as $s_value):
                                                        echo"<tr class='odd gradeX'>
                                                                <form action='' method='post'>
                                                                    <td class='swo_up_sec'>$s_value->name_section</td>
                                                                    <td class='hd_up_sec' >
                                                                            <input type='text' name='update_section' value=".$s_value->name_section." />
                                                                            <input type='hidden' name='up_id_sec' value=".$s_value->section_id." >
                                                                            <input type='submit' name='btn_up_section' value='update !!' />
                                                                    </td>   
                                                                    <td>$s_value->date</td>
                                                                    <td style='text-align: center'>
                                                                        <a href='#'><i class='fa fa-wrench vir_up_sec'></i> </a>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        
                                                                            <button type='submit' name='btn_del_section' value='btn_del_section' class='btn_none'>
                                                                                <i class='fa fa-trash-o'></i>
                                                                            </button>
                                                                        
                                                                    </td>
                                                                </form>
                                                            </tr>";
                                                    endforeach;
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- /.panel-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    <!-- /#wrapper -->
    