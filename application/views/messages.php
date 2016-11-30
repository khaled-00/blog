<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
            
            <div id="page-wrapper">
                <br/>
                <br/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                - messages view :
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <br/><br/><br/>
                                    <div class="panel-body">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>E-mail</th>
                                                        <th>Date</th>
                                                        <th>IP</th>
                                                        <th style="text-align: center">Show</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($messages as $value1): ?>
                                                    <tr class="odd gradeX">
                                                        <td><?php echo $value1->name ?></td>
                                                        <td><?php echo $value1->mail ?></td>
                                                        <td><?php echo $value1->date ?></td>
                                                        <td class="center"><?php echo $value1->browser ?></td>
                                                        <td style="text-align: center">
                                                            <a href="<?php echo base_url();?>index.php/admin/message/<?php echo $value1->message_id ?>">
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    
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
 