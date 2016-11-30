
            <div id="page-wrapper">
                <?php echo empty($erorr)   ? '' : $erorr   ; ?>
                <br/>
                <br/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                - messages view :
                            </div>
                            <div class="jumbotron" style=" direction: ltr;padding: 15px;">
                                <?php foreach($message as $value): ?>
                                    <br/>
                                    <p><B> name : </B> <?php echo $value->name ?></p>
                                    <p><B> Email : </B> <?php echo $value->mail ?></p>
                                    <br/>
                                    <p> 
                                        <B> The message : </B>
                                        <br/>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php echo $value->message ?>
                                    </p>
                                    <p style="direction: rtl;"><?php echo $value->date ?></p>
                                    <br/>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        <!-- /#wrapper -->
    