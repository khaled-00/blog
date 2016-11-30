

<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> <?php echo $pages['page_title']; ?> </title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url();?>style/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url();?>style/admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url();?>style/admin/dist/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>style/admin/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url();?>style/admin/bower_components/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url();?>style/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <link href="<?php echo base_url();?>style/admin/dist/css/style.css" rel="stylesheet" type="text/css"/>

        <!-- 0000000000000000000000 -->
        <script src="<?php echo base_url();?>style/admin/ckeditor/ckeditor.js"></script>

        
        <script src="<?php echo base_url();?>style/admin/ckeditor/samples/js/sample.js"></script>

        
        <link href="<?php echo base_url();?>style/admin/style.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        
       
        <div id="wrapper">    
       
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index"><span>C</span> - Panel </a>
                </div>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="<?php echo base_url();?>index.php/admin/posting"  <?php echo $pages['page1'] == 1 ? 'class="active"' : 'class=""' ; ?> >
                                    <i class="fa fa-edit fa-fw"></i>
                                    - posting 
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/admin/sections" <?php echo $pages['page2'] == 1 ? 'class="active"' : 'class=""' ; ?> >
                                    <i class="fa fa-sitemap fa-fw"></i>
                                    - Sections 
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/admin/edit"<?php echo $pages['page3'] == 1 ? 'class="active"' : 'class=""' ; ?> >
                                    <i class="fa fa-suitcase fa-fw"></i>
                                    - Edit
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/admin/messages" <?php echo $pages['page4'] == 1 ? 'class="active"' : 'class=""' ; ?> >
                                    <i class="fa fa-envelope fa-fw"></i>
                                    - Messages
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo base_url();?>index.php/admin/logout"  <?php echo $pages['page5'] == 1 ? 'class="active"' : 'class=""' ; ?> >
                                    <i class="fa fa-unlock fa-fw"></i>
                                    - Logout
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.sidebar-collapse -->
                </div><!-- /.navbar-static-side -->
            </nav>
        </div>
