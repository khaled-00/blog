<?php

/* 
 * This page works on orders of C-panel 
 */


class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_get("UTC+02:00");  // For make a time.
        $this->load->model('db_blog');          // Get model page.  
        
    }
    /*
     * Pass to the `Postaing` page.      
     */
    public function index () {
         header("Location: ".base_url()."index.php/admin/posting");
    }
    /*
     * This function uses for make page title and hover,
     * By page number,
     * --------------------------------
     * !!! We won't use this function |
     * --------------------------------      
     */
    public function page($page_num) {
        $pages = array (
            'page1'        =>   0 ,
            'page2'        =>   0 ,
            'page3'        =>   0 ,
            'page4'        =>   0 ,
            'page5'        =>   0 ,
            'page_title'   =>   '',
            "$page_num"    =>   1 ,
        );
        $pages['page1'] == 1  ?  $pages['page_title']  =  'Posting'  : '';
        $pages['page2'] == 1  ?  $pages['page_title']  =  'Sections' : '';
        $pages['page3'] == 1  ?  $pages['page_title']  =  'Edit'     : '';
        $pages['page4'] == 1  ?  $pages['page_title']  =  'Messages' : '';
        $pages['page5'] == 1  ?  $pages['page_title']  =  'Users'    : '';
        return $pages;
    }
    /*
     * This function uses for show and send data to view files,
     * By page number and page name like 'index' and data if you want, 
     * ( Number of page like 'page1', Name of page like 'index', Array has a data If you want )      
     */
    public function viewer($page_num,$page_name,$data='') {
        $page['pages'] = $this->page("$page_num"); // page function.
        $this->load->view('include/head_admin',$page);
        $this->load->view("$page_name",$data);
        $this->load->view('include/footer_admin');
    }
    /*
     * posting page for insert a new post
     */
    public function posting() {
        $data['success'] = ' '; // Set variable
        $data['erorr']   = '';  // Set variable
        
        // For checkup are you admin or not.
        $this->check_up();  
        
        if($this->input->post('btn_post')) {
            // Edites of imge 
            $file = array (
                'upload_path'       =>    './Uplods_files/',
                'allowed_types'     =>    'gif|jpg|png',
                'max_size'          =>    5500,
                'max_width'         =>    1360,
                'max_height'        =>    768,
            );
            $this->load->library('upload', $file);
           
            //validations
            $this->form_validation->set_rules('ipt_title'   ,'Title input'   ,'required');
            $this->form_validation->set_rules('ipt_bloger'  ,'Bloger input'  ,'required');
            
            if($this->form_validation->run() && $this->upload->do_upload('ipt_image') ) {
                // file information
                $img = $this->upload->data(); 
                $data = array (
                    'title'         =>   $this->input->post('ipt_title'   ),
                    'image'         =>   $img['file_name'],
                    'content'       =>   $this->input->post('the-post'    ),
                    'blogger'       =>   $this->input->post('ipt_bloger'  ),
                    'date'          =>   date("Y/m/d"),
                    'section_id'    =>   $this->input->post('ipt_section' ),
                );
                $this->db_blog->insert_db('posts',$data);
                // success messages
                $data['success'] = "<h3 class='success'>It has published. ..</h3>";
                echo "<meta  http-equiv='refresh' content='3;'.$url.'index.php/admin/posting'/>";
            } else { 
                //erorr messages
                $data['erorr'] = "<h3 class='erorr'>".validation_errors()."</h3>";
                $data['erorr'] = "<h3 class='erorr'>".$this->upload->display_errors()."</h3>";
            }
        }
        //For delete post
        if($this->input->post('btn_del_post')){
            $this->db_blog->delete_db('posts','id_post',$this->input->post('up_id_post')) ;
            //Delete the image
            $del = $_SERVER['DOCUMENT_ROOT']."/blogg/Uplods_files/".$this->input->post('del_img');
            unlink($del);
            $data['success'] = "<h3 class='success'>It has deleted. ..</h3>";
        }
        
        $data['sections']  =  $this->db_blog->get_db('sections');
        $data['posts']     =  $this->db_blog->get_by_join_db('posts' ,'sections' ,'section_id' ,'id_post');
        $this->viewer('page1','admin',$data);
    }
    /*
     * 
     */
    public function post_edit($post_id='') {
        $all_of_data ['posts']     = array(0);          // Set array
        $all_of_data ['success']   = '';                // Set variable
        $all_of_data ['erorr']     = '';                // Set variable
        $post_id                   = (int) $post_id;    // Set ID
        
        // To make sure the post is exist
        $is_it_here = $this->db_blog->get_where_db('posts','id_post',$post_id);
        
        // Edites of imge
        $file = array (
            'upload_path'       =>    './Uplods_files/',
            'allowed_types'     =>    'gif|jpg|png',
            'max_size'          =>    5500,
            'max_width'         =>    1360,
            'max_height'        =>    768,
        );
        $this->load->library('upload', $file);

        if(empty($post_id)) {
            $all_of_data['erorr']  = "<h3 class='erorr'>  The link has something wrong !!!! </h3>";  
        } elseif (empty($is_it_here)) {
            $all_of_data['erorr']  = "<h3 class='erorr'> Not found, There no post has this ID !!!! </h3>";  
        } else {
            $all_of_data ['posts'] = $this->db_blog->get_some_postes
                    ('posts', 'sections', 'section_id', " WHERE `id_post` =$post_id");
            
            if($this->input->post('btn_update') && $this->upload->do_upload('ipt_image_upde') ) {
                // Get the file informtion
                $img = $this->upload->data(); 
                $data = array(
                    'title'       => $this->input->post('ipt_title_upde'),
                    'image'       => $img['file_name'],
                    'content'     => $this->input->post('the-post_upde'),
                    'blogger'     => $this->input->post('ipt_bloger_upde'),
                    'date'        =>  date("Y/m/d"),
                    'section_id'  => $this->input->post('ipt_section_upde'),
                );
                // Updating
                $this->db_blog->update_db('posts',$data,'id_post',$post_id); 
                
                // Delete the old image
                $posts  = $all_of_data ['posts'];
                $post   = $posts[0];
                $del    = $_SERVER['DOCUMENT_ROOT']."/blogg/Uplods_files/".$post->image;
                unlink($del);
                
                // success messages
                $all_of_data['success']  = "<h3 class='success'> Update is success </h3>";
                $url    = base_url();
                echo "<meta  http-equiv='refresh' content='3;'.$url.'index.php/admin/post_edit/$post->id_post'/>";
                
            } else {
                if( validation_errors() || $this->upload->display_errors() ) {
                    // erorr messages 
                    $all_of_data['erorr']  = "<h3 class='erorr'>".validation_errors()."</h3>";
                    $all_of_data['erorr']  = "<h3 class='erorr'>".$this->upload->display_errors()."</h3>";
                }
            }
        }
        
        $all_of_data['sections']  =  $this->db_blog->get_db('sections');
        $this->viewer('page1','post_ed',$all_of_data);
    }
    /*
     * Sections page for add and remove and update sections
     */
    public function sections() {
        // For checkup are you admin or not.
        $this->check_up();  
        
        // For add a new section
        if($this->input->post('btn-section')) {
            //validations
            $this->form_validation->set_rules('inpt-section' ,' Input section ' ,'required');

            if($this->form_validation->run()) {
                $data = array(
                    'name_section'  =>  $this->input->post('inpt-section'),
                    'date'          =>  date("Y/m/d"),
                );
                $this->db_blog->insert_db('sections',$data);
                
                // Seccess messages
                $sec['success'] = "<h3 class='success'> Section has added </h3>";
                $url            = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/sections'>";
            } else {
                // Erorr messages
                $sec['erorr']  = "<h3 class='erorr'>".validation_errors()."</h3>";
            }
        }
        // `section_id` field
        $id_edit = $this->input->post('up_id_sec'); 
        
        // For update section
        if($this->input->post('btn_up_section')){
            //validations
            $this->form_validation->set_rules('update_section' ,' Input update ' ,'required');

            if($this->form_validation->run()) {
                $update = array(
                    'name_section'  =>  $this->input->post('update_section'),
                );
                $this->db_blog->update_db('sections' ,$update ,'section_id' ,$id_edit);
                
                // Seccess messages
                $sec['success'] = "<h3 class='success'> Section has updated </h3>";
                $url            = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/sections'>";
            } else {
                // Erorr messages
                $sec['erorr']  = "<h3 class='erorr'>".validation_errors()."</h3>";
            }
        }
        // For delete section
        if($this->input->post('btn_del_section')){
            $this->db_blog->delete_db('sections','section_id',$id_edit);
            // Seccess messages
            $sec['success'] = "<h3 class='success'> Section has deleted </h3>";
        }
        
        $sec['sections']  = $this->db_blog->get_by_field_db('sections','section_id');
        $this->viewer('page2', 'sections',$sec);
    }
    /*
     * Edit page for blog Eidation
     */
    public function edit() {
        // For checkup are you admin or not.
        $this->check_up();  
        
        $array['success'] = '';  // Set varibale 
        $array['erorr']   = '';  // Set varibale
        
        // insert pictures ____________________________ENTER
        
        /*
         * To change a home page picture
         */
        if($this->input->post('btn_main_img')){
            // Edites of imge
            $file = array (
                'upload_path'       =>    './Uplods_files/main_page_picture/',
                'allowed_types'     =>    'gif|jpg|png',
                'max_size'          =>    15500,
            );
            $this->load->library('upload', $file);
             
            // For delet old picture
            $poth= './Uplods_files/main_page_picture/';
            $dir = opendir($poth);
            while($f = readdir($dir)){
                if($f == '.' || $f == '..'){
                    continue;
                }
                $a = $f;
            }
            fopen($poth.$a,'a');
            
            if($this->upload->do_upload('main_img')) {
                unlink($poth.$a);               // Remove the old picture !!
                $img = $this->upload->data();   // picture information
                $picture= array(
                    'main_page_picture'  =>  $img['file_name'],
                );
                $this->db_blog->update_db('edit',$picture,'id_edit',1);
                
                // Seccess messages
                $array['success'] = "<h3 class='success'> Done </h3>";
                $url              = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/edit'>";
            }  else {
                // Erorr messages
                $array['erorr']  = "<h3 class='erorr'>". $this->upload->display_errors()."</h3>";
            }
        }
        /*
         * To change an about-us page picture
         */
        if($this->input->post('btn_about_img')){
            //Edite of imge 
            $file = array (
                'upload_path'       =>    './Uplods_files/about_page_picture/',
                'allowed_types'     =>    'gif|jpg|png',
                'max_size'          =>    15500,
            );
            $this->load->library('upload', $file);
            
            // For delet old picture 
            $poth= './Uplods_files/about_page_picture/';
            $dir = opendir($poth);
            while($f = readdir($dir)){
                if($f == '.' || $f == '..'){
                    continue;
                }
                $a = $f;
            }
            fopen($poth.$a,'a');

            if($this->upload->do_upload('about_img')) {
                unlink($poth.$a);               // Remove the old picture !!
                $img = $this->upload->data();   // picture information
                $picture= array(
                    'aboutus_page_picture'  =>  $img['file_name'],
                );
                $this->db_blog->update_db('edit',$picture,'id_edit',1);
                
                // Seccess messages
                $array['success'] = "<h3 class='success'> Done </h3>";
                $url              = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/edit'>";
            }  else {
                // Erorr messages
                $array['erorr']  = "<h3 class='erorr'>". $this->upload->display_errors()."</h3>";
            }
            
        }
        /*
         * To change a connect-us page picture
         */
        if($this->input->post('btn_connect_img')){
            //Edite of imge 
            $file = array (
                'upload_path'       =>    './Uplods_files/connect_page_picture/',
                'allowed_types'     =>    'gif|jpg|png',
                'max_size'          =>    15500,
            );
            $this->load->library('upload', $file);

            // For delet old picture 
            $poth= './Uplods_files/connect_page_picture/';
            $dir = opendir($poth);
            while($f = readdir($dir)){
                if($f == '.' || $f == '..'){
                    continue;
                }
                $a = $f;
            }
            fopen($poth.$a,'a');

            if($this->upload->do_upload('connect_img')) {
                unlink($poth.$a);               // Remove the old picture !!
                $img = $this->upload->data();   // picture information
                $picture= array(
                    'connectus_page_picture'  =>  $img['file_name'],
                );
                $this->db_blog->update_db('edit',$picture,'id_edit',1);
                // Seccess messages
                $array['success'] = "<h3 class='success'> Done </h3>";
                $url              = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/edit'>";
            }  else {
                // Erorr messages
                $array['erorr']  = "<h3 class='erorr'>". $this->upload->display_errors()."</h3>";
            }
        }
        // insert pictures ______________________________________END
        // insert title  ________________________________________ENTER
        
        /*
         * To change a home page title
         */
        if($this->input->post('btn_title_main')){
            $this->form_validation->set_rules('title_main' ,'Title inpot ' ,'required');

            if($this->form_validation->run()) {
                $update = array(
                    'main_page_title'  =>  $this->input->post('title_main'),
                );
                $this->db_blog->update_db('edit' ,$update ,'id_edit' ,1);
                // Seccess messages
                $array['success'] = "<h3 class='success'> Done </h3>";
                $url              = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/edit'>";
            } else {
                // Erorr messages
                $array['erorr']  = "<h3 class='erorr'>".validation_errors()."</h3>";
            }
        }
        /*
         * To change an about-us page title
         */
        if($this->input->post('btn_title_about')){
            $this->form_validation->set_rules('title_about' ,'Title inpot ' ,'required');

            if($this->form_validation->run()) {
                $update = array(
                    'aboutus_page_title'  =>  $this->input->post('title_about'),
                );
                $this->db_blog->update_db('edit' ,$update ,'id_edit' ,1);
                // Seccess messages
                $array['success'] = "<h3 class='success'> Done </h3>";
                $url              = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/edit'>";
            } else {
                // Erorr messages
                $array['erorr']  = "<h3 class='erorr'>".validation_errors()."</h3>";
            }
        }
        /*
         * To change a connect-us page title
         */
        if($this->input->post('btn_title_connect')){
            $this->form_validation->set_rules('title_connect' ,'Title inpot ' ,'required');

            if($this->form_validation->run()) {
                $update = array(
                    'connectus_page_title'  =>  $this->input->post('title_connect'),
                );
                $this->db_blog->update_db('edit' ,$update ,'id_edit' ,1);
                // Seccess messages
                $array['success'] = "<h3 class='success'> Done </h3>";
                $url              = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/edit'>";
            } else {
                // Erorr messages
                $array['erorr']  = "<h3 class='erorr'>".validation_errors()."</h3>";
            }
        }
        // insert title  _______________________________________END
        // insert header _______________________________________ENTER
        
        /*
         * To change a home page Header
         */
        if($this->input->post('btn_head_main')){
            $this->form_validation->set_rules('head_main' ,'Title inpot ' ,'required');

            if($this->form_validation->run()) {
                $update = array(
                    'main_page_header'  =>  $this->input->post('head_main'),
                );
                $this->db_blog->update_db('edit' ,$update ,'id_edit' ,1);
                // Seccess messages
                $array['success'] = "<h3 class='success'> Done </h3>";
                $url              = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/edit'>";
            } else {
                // Erorr messages
                $array['erorr']  = "<h3 class='erorr'>".validation_errors()."</h3>";
            }
        }
        /*
         * To change an about-us page Header
         */
        if($this->input->post('btn_head_about')){
            $this->form_validation->set_rules('head_about' ,'Title inpot ' ,'required');

            if($this->form_validation->run()) {
                $update = array(
                    'aboutus_page_header'  =>  $this->input->post('head_about'),
                );
                $this->db_blog->update_db('edit' ,$update ,'id_edit' ,1);
                 // Seccess messages
                $array['success'] = "<h3 class='success'> Done </h3>";
                $url              = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/edit'>";
            } else {
                 // Erorr messages
                $array['erorr']  = "<h3 class='erorr'>".validation_errors()."</h3>";
            }
        }
        /*
         * To change a connect-us page Header
         */
        if($this->input->post('btn_head_connect')){
            $this->form_validation->set_rules('head_connect' ,'Title inpot ' ,'required');

            if($this->form_validation->run()) {
                $update = array(
                    'connectus_page_header'  =>  $this->input->post('head_connect'),
                );
                $this->db_blog->update_db('edit' ,$update ,'id_edit' ,1);
                 // Seccess messages
                $array['success'] = "<h3 class='success'> Done </h3>";
                $url              = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/edit'>";
            } else {
                 // Erorr messages
                $array['erorr']  = "<h3 class='erorr'>".validation_errors()."</h3>";
            }
        }
        // insert header __________________________________END
        // insert content _________________________________ENTER
        
        /*
         * To change an about-us page content
         */
         if($this->input->post('btn_content_about')){
            $this->form_validation->set_rules('content_about' ,'Title inpot ' ,'required');

            if($this->form_validation->run()) {
                $update = array(
                    'aboutus_page_contect'  =>  $this->input->post('content_about'),
                );
                $this->db_blog->update_db('edit' ,$update ,'id_edit' ,1);
                 // Seccess messages
                $array['success'] = "<h3 class='success'> Done </h3>";
                $url              = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/edit'>";
            } else {
                 // Erorr messages
                $array['erorr']  = "<h3 class='erorr'>".validation_errors()."</h3>";
            }
        }
        /*
         * To change an connect-us page content
         */
        if($this->input->post('btn_content_connect')){
            $this->form_validation->set_rules('content_connect' ,'Title inpot ' ,'required');

            if($this->form_validation->run()) {
                $update = array(
                    'connectus_page_contect'  =>  $this->input->post('content_connect'),
                );
                $this->db_blog->update_db('edit' ,$update ,'id_edit' ,1);
                // Seccess messages
                $array['success'] = "<h3 class='success'> Done </h3>";
                $url              = base_url();
                echo "<meta  http-equiv='refresh' content='2;'.$url.'index.php/admin/edit'>";
            } else {
                 // Erorr messages
                $array['erorr']  = "<h3 class='erorr'>".validation_errors()."</h3>";
            }
        }
        // insert content _________________END
        
        $array['data']  =  $this->db_blog->get_db('edit');
        $this->viewer('page3' ,'edit' ,$array );
    }
    /*
     * To view messages page
     */
    public function messages() {
        // For checkup are you admin or not.
        $this->check_up();  
        
        $data['messages'] = $this->db_blog->get_by_field_db('messages','message_id');
        $this->viewer('page4', 'messages', $data);
    }
    /*
     * To view one message on a page by his `ID`
     */
    public function message($message) {
        // For checkup are you admin or not.
        $this->check_up();  
        
        $data['message'] = array();             // Set array
        $data['erorr']   = '';                  // Set varibale
        $message         = (int) $message;      // Set ID
        $is_it_exist     = $this->db_blog->get_where_db('messages','message_id',$message);
        
        if($message == 0) {
            // Erorr messages
            $data['erorr']   = "<h3 class='erorr'> The link is wrong </h3>";
            $url             = base_url();
            echo "<meta http-equiv='refresh' content='2;$url/index.php/admin/messages' />";
            
        } else if (empty($is_it_exist)) {
            // Erorr messages
            $data['erorr']   = "<h3 class='erorr'> Nout found</h3>";
            $url             = base_url();
            echo "<meta http-equiv='refresh' content='2;$url/index.php/admin/messages' />";
            
        } else {
            // Get the data
            $data['message'] = $this->db_blog->get_where_db('messages','message_id',$message);
        }
        
        $this->viewer('page4', 'message', $data);
    } 
    /*
     * To view Login page
     */
    public function login () {
        if( $this->session->userdata('name') &&  $this->session->userdata('password')){
            //back to this page Login
            header("Location: ".base_url()."index.php/admin");
        } else {
            if($this->input->post('btn_login')) {
                
                $sessions = array (
                    'name'      =>  $this->input->post('username'),
                    'password'  =>  $this->input->post('password'),
                );
                $get = $this->db_blog->login($sessions['name'],$sessions['password']);

                if(!empty($get) && $get != 0) {
                    $this->session->set_userdata($sessions);
                    header("Location: ".base_url()."index.php/admin");
                }  else {
                    echo 'username or password is not corctle';
                }

            }
            $this->load->view('login');
        }
    }
    /*
     * To validate of his e-mail 
     */
    public function check_up() {
        if(! $this->session->userdata('name') || ! $this->session->userdata('password')){
            //back to this page Login
            header("Location: ".base_url()."index.php/admin/login");
        }
    }
    /*
     * To logout
     */
    public function logout() {
        // For checkup are you admin or not.
        $this->check_up();  
        //destroy session
        $this->session->sess_destroy();
        //back to this page Login
        header("Location: ".base_url()."index.php/admin/login");
    }
    
    
}