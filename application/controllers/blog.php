<?php

/*
 * This page works on orders of blog
 */


class Blog extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_get("UTC+02:00");   // For make a time.
        $this->load->model('db_blog');            // Get model page.  
        $base_url = $this->config->base_url();    // Get base url.
       
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
            'page_title'   =>   '',
            "$page_num"    =>   1 ,
        );
        $pages['page1'] == 1  ?  $pages['page_title']  =  ' | Home '        : '';
        $pages['page2'] == 1  ?  $pages['page_title']  =  ' | About Us '    : '';
        $pages['page3'] == 1  ?  $pages['page_title']  =  ' | Connect us'   : '';
        $pages['page4'] == 1  ?  $pages['page_title']  =  ' | POST'         : '';
        
        return $pages;
    }
    /*
     * This function uses for show and send data to view files,
     * By page number and page name like 'index' and data if you want, 
     * ( Number of page like 'page1', Name of page like 'index', Array has a data If you want )      
     */
    public function viewer($page_num,$page_name,$data='') {
        $page['pages'] = $this->page("$page_num"); // page function.
        $this->load->view('include/header',$page);
        $this->load->view("$page_name",$data);
        $this->load->view('include/footer');
    }
    /*
     * The main page we call it `index`
     * Works on showing all of posts and pass from page to another page .  
     */
    public function index($pageee=''){
        $all_of_data['edits']               = $this->db_blog->get_db('edit');
        $all_of_data['section']             = $this->db_blog->get_db('sections');
        $all_of_data['for-affected-rows']   = $this->db_blog->get_by_join_db('posts','sections','section_id');
        $page_num                           = '';                   // Set variable
        $all_of_data['error']               = '';                   // Set variable
        $all_of_data['next_button']         = '';                   // Set variable
        $all_of_data['prev_button']         = '';                   // Set variable
        $all_of_data['posts_section']       = array();              // Set Array
        $base_url                           = base_url();           // Get base url
        /*
         * Make the URL integer
         * --------------------
         * If the link is not empty make it integer ,
         * Because if it wasn't integer will make the link = 0
         */
        if($pageee != ''){
            $pageee = (int) $pageee;        
        }
        
        //To make sure the database and the link is OK
        if(empty($all_of_data['for-affected-rows']) ){
            $all_of_data['error']     = ' There are no articles in this page !!!!'; 
        } else {
            if ($pageee === 0){
                $all_of_data['error'] = ' This link has something wrong !!!!';  
            } else {
                if(empty($pageee) )
                    $page_num       = 1; // Set id
                else
                    $page_num       = $pageee;                                 // ID
                
                $num_of_posts       = 3 ;                                      // This is number of blogs on one `page`
                $num_of_rows        = $this->db->affected_rows();              // This is number of blogs in the `database`
                $start              = ($page_num-1)*$num_of_posts;             // Get start 
                $end                = $num_of_posts;                           // Get finish
                $how_many_pages     = (int) ceil($num_of_rows/$num_of_posts);  // This is number to all of pages we have to show
                
                if ($how_many_pages < $page_num){
                    $all_of_data['error'] = ' Not found, page number is more than normal !!'; 
                }else{
                    // Get posts on every page
                    $all_of_data['posts_section']  = $this->db_blog->get_some_postes('posts','sections','section_id'
                    ,"ORDER BY `id_post` DESC LIMIT $start,$end ");            

                    // To show the 'next button'
                    if($page_num  < $how_many_pages) {
                        $next_page                  = $page_num + 1;
                        $all_of_data['next_button'] = "<li class='next'>
                                            <a href = '".$base_url."index.php/blog/index/$next_page'>Older Posts &rarr;</a> </li>";
                    }
                    // To show the 'prev button'
                    if($page_num  > 1) {
                        $prev_page                  = $page_num - 1;
                        $all_of_data['prev_button'] = "<li class='prev'>
                                            <a href = '".$base_url."index.php/blog/index/$prev_page'>&larr; Newer Posts </a> </li>";
                    }
                }
            }
        }
        $this->viewer('page1','index',$all_of_data);
    }
    /*
     * Works on showing a page has all of post is publish by one publisher we call it `publisher`
     * When anyone click on the publisher's name this page will show.
     */
    function publisher($pub='') {
        $all_of_data['edits']       = $this->db_blog->get_db('edit');
        $all_of_data['section']     = $this->db_blog->get_db('sections');
        $all_of_data['error']       = '';           //set_variable
        $all_of_data['next_button'] = '';           //set_variable
        $all_of_data['prev_button'] = '';           //set_variable
        $base_url                   = base_url();   // Get base url.
        // If ther space at link, it'll remove that '%20'
        $publisher                  = str_replace('%20', ' ', $pub);
        // To make sure database isn't empty
        $is_not_found               = $this->db_blog->get_where_db('posts','blogger',$publisher);
       
        // To make sure the database and the link is OK
        if(empty($publisher)){
            $all_of_data['error']   = ' Wrong page  !!'; 
        } else if (empty($is_not_found) ) {
            $all_of_data['error']   = ' There are no articles published by this publisher '; 
        } else {
            // Get id
            $page_num = $this->input->get('page');                          
            // Set id 
            if ( $page_num == '')
                $page_num   = 1; 
            else 
                $page_num   = (int) $page_num;  
            
            if ($page_num === 0) {
                $all_of_data['error'] = ' This link has something wrong !!!!';  
            } else {
                $num_of_posts    = 3 ;                                           // This is number of blogs on one page 
                $num_of_rows     = $this->db->affected_rows();                   // This is number of blogs on the databases
                $start           = ($page_num-1)*$num_of_posts;                  // Get start 
                $end             = $num_of_posts;                                // Get finish
                $how_many_pages  = (int) ceil($num_of_rows/$num_of_posts);       // This is number of pages we have to show
                
                if ($how_many_pages < $page_num) {
                    $all_of_data['error'] = ' Not found, page number is more than normal !!'; 
                } else {
                    // Get posts in evrey page
                     $all_of_data['by_publisher']  = $this->db_blog->get_some_postes('posts','sections','section_id'
                    ,"where `blogger` = '$publisher' ORDER BY `id_post` DESC LIMIT $start,$end  ");
                    
                    // To show the 'next button'
                    if($page_num  < $how_many_pages) {
                        $next_page                  = $page_num + 1;
                        $all_of_data['next_button'] = "<li class='next'>
                            <a href = '".$base_url."index.php/blog/publisher/$publisher?page=$next_page'>Older Posts &rarr;</a> </li>";
                    }
                    // To show the 'prev button'
                    if($page_num  > 1) {
                        $prev_page                  = $page_num - 1;
                        $all_of_data['prev_button'] = "<li class='prev'>
                            <a href = '".$base_url."index.php/blog/publisher/$publisher?page=$prev_page'>&larr; Newer Posts </a> </li>";
                    }
                }
            }
        }
        // We create it for when 'by_publisher' is empty, don't be a problem
        if ( empty($all_of_data['by_publisher']))
            $all_of_data['by_publisher'] = array();
        
        $this->viewer('page1','by_publisher',$all_of_data);
    }
    /*
     * Works on showing a page has all of post is publish in one section we call it `section`
     * When anyone click on the section's name this page will show.
     */
    function section($sec='') {
        $all_of_data['edits']       = $this->db_blog->get_db('edit');
        $all_of_data['section']     = $this->db_blog->get_db('sections');
        $all_of_data['error']       = '';           //set_variable
        $all_of_data['next_button'] = '';           //set_variable
        $all_of_data['prev_button'] = '';           //set_variable
        $base_url                   = base_url();   // Get base url
        // If ther space at link, it'll remove that '%20'
        $section                    = str_replace('%20', ' ', $sec); 
        // To make sure database isn't empty
        $is_not_found               =  $this->db_blog->get_some_postes('posts','sections','section_id'
             ,"WHERE `name_section` = '$section'  ");
        
        // To make sure the database and the link is OK
        if(empty($section)){
            $all_of_data['error'] = ' Wrong page  !!'; 
        } else if (empty($is_not_found) ) {
            $all_of_data['error'] = ' There are no articles at this section !!!!! '; 
        } else {
            // Get id
            $page_num = $this->input->get('page');                          
            // Set id 
            if ( $page_num == '')
                $page_num   = 1; 
            else 
                $page_num   = (int) $page_num;  
            
            if ($page_num === 0) {
                $all_of_data['error'] = ' This link has something wrong !!!!';  
            } else {
                $num_of_posts    = 3 ;                                           // This is number of blogs on one page 
                $num_of_rows     = $this->db->affected_rows();                   // This is number of blogs on the databases
                $start           = ($page_num-1)*$num_of_posts;                  // Get start 
                $end             = $num_of_posts;                                // Get finish
                $how_many_pages  = (int) ceil($num_of_rows/$num_of_posts);       // This is number of pages we have to show

                if ($how_many_pages < $page_num) {
                    $all_of_data['error'] = ' Not found, page number is more than normal !!'; 
                } else {
                    // Get posts in evrey page
                    $all_of_data['by_section']  = $this->db_blog->get_some_postes('posts','sections','section_id'
                        ,"where `name_section` = '$section' ORDER BY `id_post` DESC LIMIT $start,$end  ");

                    // To show the 'next button'
                    if($page_num  < $how_many_pages) {
                        $next_page                  = $page_num + 1;
                        $all_of_data['next_button'] = "<li class='next'>
                            <a href = '".$base_url."index.php/blog/section/$section?page=$next_page'>Older Posts &rarr;</a> </li>";
                    }
                    // To show the 'prev button'
                    if($page_num  > 1) {
                        $prev_page                  = $page_num - 1;
                        $all_of_data['prev_button'] = "<li class='prev'>
                            <a href = '".$base_url."index.php/blog/section/$section?page=$prev_page'>&larr; Newer Posts </a> </li>";
                    }
                }
            }
        }
        // We create it for when 'by_section' is empty, don't be a problem
        if ( empty($all_of_data['by_section']))
            $all_of_data['by_section'] = array();
        
        $this->viewer('page1','by_section.php',$all_of_data);
    }
    /*
     * To show every post as only one post
     */   
    public function post($posts='') {
        $all_of_data['sections']    = $this->db_blog->get_db('sections');
        $all_of_data['error']       = ''; // Set variable
        $all_of_data['posts']       = array(); // Set variable
        
        // If ther space at link, it'll remove that '%20'
        $post                       = str_replace('%20', ' ',$posts); 
        $is_not_found = $this->db_blog->get_some_postes('posts','sections','section_id'," WHERE title = '$post' ");
        
        // To make sure the database and the link is OK
        if (empty($is_not_found) ) {
            $all_of_data['error'] = " Not found, may the link is wrong or the post has been removed ";
           
            $post == '' ? $post ='wrong' : '';  // If `$post` is empty, make it full 
            $this->index($post);                // Get index page like as wrong page 
        } else {
            $all_of_data['posts'] = 
                $this->db_blog->get_some_postes('posts','sections','section_id'," WHERE title = '$post' ");
            
            $this->viewer('page4','post',$all_of_data);
        }
    }
    /*
     * To showing `about us` page.
     */
    public function about(){
        $all_of_data['edits'] = $this->db_blog->get_db('edit');
        $this->viewer('page2','about',$all_of_data);
    } 
    /*
     * To showing `about us` page, and send a message to the C-panel
     */   
    public function contact(){
        $all_of_data['edits'] = $this->db_blog->get_db('edit');
       
        // click on button of send
        if($this->input->post('send')){
            $this->form_validation->set_rules('name'    ,'Name '         ,'required');
            $this->form_validation->set_rules('email'   ,'E-mail '       ,'required');
            $this->form_validation->set_rules('message' ,'Message '      ,'required');
            
            if($this->form_validation->run()) {
                $message = array(
                    'name'      =>  $this->input->post('name'),
                    'mail'      =>  $this->input->post('email'),
                    'message'   =>  $this->input->post('message'),
                    'browser'   =>  $_SERVER['REMOTE_ADDR'],
                    'date'      =>  date("Y/m/d"),
                );
                $this->db_blog->insert_db('messages' ,$message );
            } else {
                echo validation_errors();
            }
        }
        $this->viewer('page3','contact',$all_of_data);
    } 
    
}

