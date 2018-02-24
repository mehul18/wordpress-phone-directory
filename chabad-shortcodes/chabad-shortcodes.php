<?php
/*
  Plugin Name: Chabad Shortcode
  Description: Extend theme with custom shortcodes.
  Version: 0.1.0
  Author: Chabad
 */

/* Phone Directory list */

function mb_strcasecmp($str1, $str2, $encoding = null) {                    
        $retVal = strcmp(mb_strtoupper(get_post_meta($str1,'listing_firstname', true)), mb_strtoupper(get_post_meta($str2,'listing_firstname', true)));                
        if ($retVal===0) $retVal = strcmp(mb_strtoupper(get_post_meta($str1,'listing_husband_name', true)), mb_strtoupper(get_post_meta($str2,'listing_husband_name', true)));        
        if ($retVal===0) $retVal = strcmp(mb_strtoupper(get_post_meta($str1,'listing_wife_name', true)), mb_strtoupper(get_post_meta($str2,'listing_wife_name', true)));
        return $retVal;
}

function mb_strcasecmp2($str1, $str2, $encoding = null) {          
        $retVal = strcmp(mb_strtoupper(get_post_meta($str1->ID,'listing_firstname', true)), mb_strtoupper(get_post_meta($str2->ID,'listing_firstname', true)));                
        if ($retVal===0) $retVal = strcmp(mb_strtoupper(get_post_meta($str1->ID,'listing_husband_name', true)), mb_strtoupper(get_post_meta($str2->ID,'listing_husband_name', true)));        
        if ($retVal===0) $retVal = strcmp(mb_strtoupper(get_post_meta($str1->ID,'listing_wife_name', true)), mb_strtoupper(get_post_meta($str2->ID,'listing_wife_name', true)));
        return $retVal;
}

function phone_dir_list_func($atts) {

     $_GET['search'] = stripcslashes($_GET['search']);

     $output .='<div class="row searching srh-frm">
     				<div class="col-sm-9 search-list-frm col-xs-12 pull-right"> 
                              ' . do_shortcode('[listing_search]') . '
                        </div>
                <div class="col-xs-12 col-md-3 col-lg-3 cr-user-btn pull-left">
                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#createlisting" ><i class="material-icons person_add">person_add</i><span class="creat-bt">הוספת כרטיס</span></button>
                                                
                <div class="modal fade col-lg-3 col-md-4 col-sm-6" id="createlisting" role="dialog" data-backdrop="true">
                  <div class="modal-dialog" role="document" style="direction: rtl;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> צור כרטיס חדש</h4>
                      </div>
                      <div class="modal-body">
                        <form action="#" method="POST" id="directoryform">
                            <div class="form-group">
                              <div class="row">
                                  <div class="col-md-2 col-xs-2 cicon"><i class="material-icons custglyphicon">person</i></div>
                                  <div class="col-md-10 col-xs-9 cfield">
                                     <input type="text" class="form-control" name="first-name" id="dir-first-name" placeholder="שם משפחה">
                                  </div>
                              </div>
                            </div>

                            <div class="form-group">
                             <div class="row">
                               <div class="col-md-2 col-xs-2 cicon"><i class="material-icons custglyphicon"></i></div>
                                <div class="col-md-10 col-xs-9 cfield">
                                   <input type="text" class="form-control dir-husband-name" name="husband-name" id="dir-husband-name" placeholder="שם הבעל">
                                </div>
                            </div>
                            </div>

                            <div class="form-group">
                              <div class="row">
                                    <div class="col-md-2 col-xs-2 cicon"><i class="material-icons custglyphicon"></i></div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                     <input type="text" class="form-control dir-wife-name" name="wife-name" id="dir-wife-name" placeholder="שם האשה">
                                    </div>
                                </div>
                            </div>
							
                            <hr>

                            <div class="form-group">
                                <div class="row">
                                  <div class="col-md-2 col-xs-2 cicon"> <i class="material-icons custglyphicon">phone</i></div>
                                   <div class="col-md-10 col-xs-9 cfield">
                                   <input type="text" class="form-control" name="phone-number" id="dir-phone-number" placeholder="טלפון בבית">
                                   </div>
                                   
                               </div>
                            </div>    
                                                        
                            <div class="form-group">
                               <div class="row">
                                  <div class="col-md-2 col-xs-2 cicon"> 
                                    <i class="material-icons custglyphicon"></i>
                                  </div>
                                  <div class="col-md-10 col-xs-9 cfield">
                                       <input type="text" class="form-control" name="hus-number" id="dir-hus-number" placeholder="טלפון בעל">
                                  </div>
                                </div>
                              
                            </div>    
                            <div class="form-group">
                               <div class="row">
                                  <div class="col-md-2 col-xs-2 cicon"> 
                                    <i class="material-icons custglyphicon"></i>
                                  </div>
                                  <div class="col-md-10 col-xs-9 cfield">
                                       <input type="text" class="form-control" name="wife-number" id="dir-wife-number" placeholder="טלפון אשה">
                                  </div>
                                </div>
                              
                            </div> 
                                                        
                            <div class="form-group">
                                 <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                        <i class="material-icons custglyphicon"></i>
                                      </div>
                                      <div class="col-md-10 col-xs-9 cfield">
                                        <input type="text" class="form-control" name="other-number" id="dir-other-number" placeholder="טלפון נוסף">
                                      </div>
                                 </div>
                            </div>    
                            <hr>

                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                        <i class="material-icons custglyphicon">email</i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                       <input type="text" class="form-control" name="email-address" id="dir-email-address" placeholder="אימייל">
                                    </div>
                                 </div>
                                 <div class="row">  
                                    <div class="col-md-2 col-xs-2 cicon">
                                        
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                       <input type="text" class="form-control" name="other-email-address" id="dir-other-email-address" placeholder="אימייל נוסף">
                                    </div>
                                </div>
                            </div>
                                
                            <hr>
                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                              <i class="material-icons custglyphicon">place</i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                       <input class="form-control autocomplete" type="text" name ="dir-home-address" placeholder="כתובת בית" id="dir-home-address" />
                                    </div>
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                          <i class="material-icons custglyphicon"></i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                      <input type="text" class="form-control" name="home_country" id="dir-home_country" placeholder="מדינה">
                                    </div>
                                </div>
                            </div>  

                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                            <i class="material-icons custglyphicon"></i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                        <input type="text" class="form-control" name="home_city" id="dir-home_city" placeholder="עיר">               
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                            <i class="material-icons custglyphicon"></i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                        <input type="text" class="form-control" name="home_zipcode" id="dir-home_zipcode" placeholder="מיקוד">               
                                    </div>
                                </div>
                            </div>
             
                                
                            

                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                           <i class="material-icons custglyphicon"></i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                      <input class="form-control autocomplete" onFocus="geolocate()" type="text" name ="dir-work-address" placeholder="כתובת נוספת" id="dir-work-address"/>
                                    </div>
                                </div>
                            </div> 

                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                         <i class="material-icons custglyphicon"></i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                      <input type="text" class="form-control" name="work_country" id="dir-work_country" placeholder="מדינה">
                                    </div>
                                </div>
                            </div>   

                             <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                        <i class="material-icons custglyphicon"></i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                     <input type="text" class="form-control" name="work_city" id="dir-work_city" placeholder="עיר">
                                    </div>
                                </div>
                            </div>  

                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                        <i class="material-icons custglyphicon"></i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                     <input type="text" class="form-control" name="work_zipcode" id="dir-work_zipcode" placeholder="מיקוד">
                                    </div>
                                </div>
                            </div>  

                            
                            <hr> 

                             <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                         <i class="material-icons custglyphicon">public</i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                       <input type="text" class="form-control" name="dir-website-url" id="dir-website-url" placeholder="אתר אינטרנט">
                                    </div>
                                </div>
                            </div>  
                            <hr>

                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                         <i class="fa fa-skype custglyphicon" aria-hidden="true"></i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                       <input type="text" class="form-control" name="dir-skype-id" id="dir-skype-id" placeholder="סקייפ">
                                    </div>
                                </div>
                            </div>   
                            <hr> 

                              <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                           <i class="fa fa-facebook-square custglyphicon" aria-hidden="true"></i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                        <input type="text" class="form-control" name="dir-facebook-url" id="dir-facebook-url" placeholder="פייסבוק">
                                    </div>
                                </div>
                            </div>   
                            <hr>

                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                          <i class="fa fa-twitter custglyphicon" aria-hidden="true"></i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                         <input type="text" class="form-control" name="dir-twitter-uname" id="dir-twitter-uname" placeholder="טוויטר">
                                    </div>
                                </div>
                            </div> 
                            <hr>

                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                         <i class="material-icons custglyphicon"></i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                        <input type="text" class="form-control" name="dir-other-id" id="dir-other-id" placeholder="נוסף">
                                    </div>
                                </div>
                            </div> 
                            <hr>   

                          

                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                         <i class="material-icons custglyphicon notranslate">date_range</i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                         <input type="text" class="form-control" name="dir-husband-bdy" id="dir-husband-bdy" placeholder="יום הולדת (dd/mm/yyyy)">
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                       </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                         <input type="text" class="form-control" name="dir-wife-bdy" id="dir-wife-bdy" placeholder="יום הולדת (dd/mm/yyyy)">
                                    </div>
                                </div>
                            </div> 

                            <hr>

                            <div class="form-group">
                                <div class="row">
                                      <div class="col-md-2 col-xs-2 cicon">
                                           <i class="material-icons custglyphicon">edit</i>
                                      </div>
                                    <div class="col-md-10 col-xs-9 cfield">
                                        <textarea class="form-control custarea" name ="dir-bio" id="dir-bio" placeholder="אודות"></textarea>
                                    </div>
                                </div>
                            </div> 
                            <hr>
                             <div class="form-group">
                                <div class="row">
                                     <div class=" col-md-12"> 
                                           <input type="checkbox" name="terms-cond" id="terms-cond" value="yes" class="dir-terms-cond"> אני מאשר שקראתי את <a href="/policy/" target="_blank" class="terms-condition">תנאי השימוש והמדיניות</a>
										   <div id="terms_error" class="join_1_error" style="display: none"></div>
                                     </div> 
                                  </div>   
                              </div>
                            
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">בטל</button>
                        <input type="button" value="צור כרטיס" class="add-listing-btn" data-dismiss="modal">

                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                
                </div>
                     
                </div>';
     

    $args = array(
        'post_type' => 'listing', 
        'post_status' => 'publish',
        'order' => 'DESC', 
		'orderby' => 'meta_value_num',
        'posts_per_page' => -1, 
        'fields' => 'ids',
    );
    $args['meta_query'] =  array(
        'relation' => 'AND',        
    );    

    if (!empty($_GET['search'])) {

  		$searchkeyword = explode(" ",$_GET['search']);

      if ( count($searchkeyword) == 1) { //one name 



        $args['meta_query'][0] = array(
              'relation' => 'OR',
        );
      
        foreach ($searchkeyword as $search_key=>$search_value) {
          

    			$args['meta_query'][0][] = array(
    				'key' => 'listing_firstname',
    				'value' => $search_value,
    				'compare' => 'LIKE'
    			);
    			$args['meta_query'][0][] = array(
    				'key' => 'listing_husband_name ',
    				'value' =>$search_value,
    				'compare' => 'LIKE'
    			);
    			$args['meta_query'][0][] = array(
    				'key' => 'listing_wife_name ',
    				'value' =>$search_value,
    				'compare' => 'LIKE'
    			);
    		}

      }

      else { //more than one name sent - try to match  - added by Ofer             

        $args['meta_query'][0] = array(
                'relation' => 'OR',
        );

        $args['meta_query'][0][] = array(
                'relation' => 'AND',
        );
        $args['meta_query'][0][0][] = array(
            'key' => 'listing_firstname',
            'value' => $searchkeyword[0],
            'compare' => 'LIKE'
        );

        $iIndex = -1;

        foreach ($searchkeyword as $search_key=>$search_value) {

          $iIndex++;

          if ($iIndex==0) continue;          

          if ( mb_substr($search_value,0,1) == "ו" ) $search_value = mb_substr($search_value,1);

          $args['meta_query'][0][0][] = array(
              'relation' => 'OR',
          );
            $args['meta_query'][0][0][$iIndex][] = array(
              'key' => 'listing_husband_name',
              'value' => $search_value,
              'compare' => 'LIKE' 
            );    
            $args['meta_query'][0][0][$iIndex][] = array(
              'key' => 'listing_wife_name',
              'value' => $search_value,
              'compare' => 'LIKE' 
            );
         }   
        
      }

    }    
      
    if (!empty($_GET['search']) && !empty($_GET['scc'])) {
        $args['meta_query'][1] = array(
            'relation' => 'OR',
        );
        if($_GET['scc']=='phone'){
             $args['meta_query'][1][] = array(
                'key' => 'listing_phone_1',
                'value' => '',
                'compare' => '!='
            );
            $args['meta_query'][1][] = array(
                'key' => 'listing_husband_phone',
                'value' => '',
                'compare' => '!='
            );
            $args['meta_query'][1][] = array(
                'key' => 'listing_wife_phone',
                'value' => '',
                'compare' => '!='
            );
        }else if($_GET['scc']=='listing_email'){
            $args['meta_query'][1][] = array(
                'key' => 'listing_email',
                'value' => '',
                'compare' => '!='
            );
        }else if($_GET['scc']=='address'){
            $args['meta_query'][1][] = array(
                'key' => 'listing_home_address',
                'value' => '',
                'compare' => '!='
            );
            $args['meta_query'][1][] = array(
                'key' => 'listing_street_address',
                'value' => '',
                'compare' => '!='
            );
        }
       
    }
    
    if ((!empty($_GET['sort_by'])) && $_GET['sort_by'] != '0') {
        if ($_GET['sort_by'] != 'alphabetical' && $_GET['sort_by'] != 'best_top') {
            $args['meta_key'] = 'listing_' . $_GET['sort_by'];
            $args['orderby'] = 'listing_' . $_GET['sort_by'];
        } 
        elseif ($_GET['sort_by'] == 'alphabetical') {
            $args['meta_key'] = 'listing_firstname';            
            $args['orderby'] = 'listing_firstname';
        }
    }
    else {
            $args['meta_key'] = 'listing_firstname';
            $args['orderby'] = 'listing_firstname';
    }        
    $args['order'] = 'ASC';      
    
    
    
    $dir_list = new WP_Query($args);      
       
    
    usort($dir_list->posts, 'mb_strcasecmp');    

    
    
    if ($dir_list->have_posts()) {
		$output .= '<div class="alert alert-success" role="alert" style="display:none" id="update_create_msg"></div>';
        $output .= '<div class="row" id="dir-list">';

        while ($dir_list->have_posts()) {

            $dir_list->the_post();
          
            $address = ''; 
			$short_address = '';
								$flag = 0;
								if(get_post_meta(get_the_ID(), 'listing_home_address', true)!=''){
									$address .= get_post_meta(get_the_ID(), 'listing_home_address', true);
									$short_address .= get_post_meta(get_the_ID(), 'listing_home_address', true);
									$flag = 1;
								}
								if(get_post_meta(get_the_ID(), 'listing_home_city', true)!=''){
									if($flag==0){
										$address .= get_post_meta(get_the_ID(), 'listing_home_city', true);
										$short_address .= get_post_meta(get_the_ID(), 'listing_home_city', true);
										$flag = 1;
									}else{
										$address .= ', '.get_post_meta(get_the_ID(), 'listing_home_city', true);
										$short_address .= ', '.get_post_meta(get_the_ID(), 'listing_home_city', true);
									}	
								}

								if(get_post_meta(get_the_ID(), 'listing_home_country', true)!=''){
									if($flag==0){
										$address .= get_post_meta(get_the_ID(), 'listing_home_country', true);
										$short_address .= get_post_meta(get_the_ID(), 'listing_home_country', true);
										$flag = 1;
									}else{
										$address .= ', '.get_post_meta(get_the_ID(), 'listing_home_country', true);
										$short_address .= ', '.get_post_meta(get_the_ID(), 'listing_home_country', true);
									}
								}      
								if(get_post_meta(get_the_ID(), 'listing_home_zipcode', true)!=''){
									if($flag==0){
										$address .= get_post_meta(get_the_ID(), 'listing_home_zipcode', true);
										$flag = 1;
									}else{
										$address .= ', '.get_post_meta(get_the_ID(), 'listing_home_zipcode', true);
									}
								}
            
            
            $work_address = ''; 
            $flag_work = 0;
            if(get_post_meta(get_the_ID(), 'listing_street_address', true)!=''){
                $work_address .= get_post_meta(get_the_ID(), 'listing_street_address', true);
                $flag_work = 1;
            }
            if(get_post_meta(get_the_ID(), 'listing_street_city', true)!=''){
                if($flag_work==0){
                    $work_address .= get_post_meta(get_the_ID(), 'listing_street_city', true);
                    $flag_work = 1;
                }else{
                    $work_address .= ', '.get_post_meta(get_the_ID(), 'listing_street_city', true);
                }
            }
            
            if(get_post_meta(get_the_ID(), 'listing_street_country', true)!=''){
                if($flag_work==0){
                    $work_address .= get_post_meta(get_the_ID(), 'listing_street_country', true);
                    $flag_work = 1;
                }else{
                    $work_address .= ', '.get_post_meta(get_the_ID(), 'listing_street_country', true);
                }
            }
            if(get_post_meta(get_the_ID(), 'listing_street_zipcode', true)!=''){
                if($flag==0){
                    $work_address .= get_post_meta(get_the_ID(), 'listing_street_zipcode', true);
                    $flag = 1;
                }else{
                    $work_address .= ', '.get_post_meta(get_the_ID(), 'listing_street_zipcode', true);
                }
            }
           
            
            $home_address = str_replace(" ", "+", $address);
            $work_address_map = str_replace(" ", "+", $work_address);

            $output .= '<div class="col-xs-10 col-sm-6 col-md-4 dir-box">';

            $output .= '<div class="box">';

            $output .= '<div class="icon">
	                    <div class="info">';
                                $info_title = '';
                                if(get_post_meta(get_the_ID(), 'listing_firstname', true)!=''){
                                    $info_title .= trim(get_post_meta(get_the_ID(), 'listing_firstname', true));
                                }
                                if(get_post_meta(get_the_ID(), 'listing_husband_name', true)!=''){
                                  $info_title .= ' '.trim(get_post_meta(get_the_ID(), 'listing_husband_name', true));
                                }
                                if ( (get_post_meta(get_the_ID(), 'listing_husband_name', true)!='') && (get_post_meta(get_the_ID(), 'listing_wife_name', true)!='') ) {
                                      $info_title .= ' ו';
                                } 
                                else $info_title .= ' ';
                                if(get_post_meta(get_the_ID(), 'listing_wife_name', true)!=''){
                                  $info_title .= trim(get_post_meta(get_the_ID(), 'listing_wife_name', true));
                                }       
                                
                                
                                $output .= '<h3 class="title">' . $info_title . '</h3>';
									
								
								 
                                if($short_address!=''){
                                  $output .= '<p class="card-main-address">' . $short_address . '</p>';
                                }
	 		        $output .= '<div class="more">
                                        <p>
					    <a class="btn btn-default btn-lg downarrw card-more-btn" data-id="' . get_the_ID() . '" > <i class="material-icons expand_more notranslate">expand_more</i>הצג כרטיס</a>
										     </p>
									    </div>

	                            </div>

                              </div>

                              <div class="space"></div>';

            $output .= '</div></div>';


            $output .= '<div class="col-xs-10 col-sm-6 col-md-4 oversection dir-full-content" id="oversection-' . get_the_ID() . '" data-id="' . get_the_ID() . '">
                        <form method="post" id="editdata-' . get_the_ID() . '"  class="editdata">
                            <div class="panel panel-info text-right">
                                <div class="panel-heading">';	
                                $panel_title = '';
                                if(get_post_meta(get_the_ID(), 'listing_firstname', true)!=''){
                                   $panel_title .= trim(get_post_meta(get_the_ID(), 'listing_firstname', true));
                                }
                                if(get_post_meta(get_the_ID(), 'listing_husband_name', true)!=''){
                                  $panel_title .= ' '.trim(get_post_meta(get_the_ID(), 'listing_husband_name', true));
                                }
                                if ( (get_post_meta(get_the_ID(), 'listing_husband_name', true)!='') && (get_post_meta(get_the_ID(), 'listing_wife_name', true)!='') ) {
                                      $info_title .= ' ו';
                                } 
                                else $info_title .= ' ';
                                if(get_post_meta(get_the_ID(), 'listing_wife_name', true)!=''){
                                  $panel_title .= trim(get_post_meta(get_the_ID(), 'listing_wife_name', true));
                                }
        
                                                               
                    $output .= '<h3 class="panel-title">' . $panel_title . '</h3>';
                    $output .= '</div>
                                <div class="panel-body">';
                    
                                if(get_post_meta(get_the_ID(), 'listing_phone_1', true)!=''){    
                    $output .= '<div class="row">

                                         <div class="col-md-2 col-xs-2"> 
                                            <i class="material-icons custicon">phone</i>
                                        </div>
                                        <div class=" col-md-10 col-xs-9"> 
                 	                    <h3 class="panel-subtitle">' . get_post_meta(get_the_ID(), 'listing_phone_1', true) . '</h3>
					    <p>טלפון בבית</p>
					</div>
                                       
	                            </div>';
                                }
                                
                                if(get_post_meta(get_the_ID(), 'listing_husband_phone', true)!=''){    
                    $output .= '<div class="row">

                                        <div class="col-md-2 col-xs-2"> 
                                           <i class="material-icons custicon"></i>  
                                        </div>
                                        <div class=" col-md-10 col-xs-9"> 
                 	                    <h3 class="panel-subtitle">'. get_post_meta(get_the_ID(), 'listing_husband_phone', true) . '</h3>
					    <p>'.get_post_meta(get_the_ID(), 'listing_husband_name', true).' </p>
					</div>
                                        
	                            </div>';
                                }
                                
                                if(get_post_meta(get_the_ID(), 'listing_wife_phone', true)!=''){    
                    $output .= '<div class="row">

                                        <div class="col-md-2 col-xs-2"> 
                                           <i class="material-icons custicon"></i>  
                                        </div>
                                        <div class=" col-md-10 col-xs-9"> 
                 	                    <h3 class="panel-subtitle">' . get_post_meta(get_the_ID(), 'listing_wife_phone', true) . '</h3>
					    <p>'.get_post_meta(get_the_ID(), 'listing_wife_name', true).'</p>
					</div>
                                        
	                            </div>';
                                }
                                
                                
                                
                                if(get_post_meta(get_the_ID(), 'listing_other_phone', true)!=''){    
                    $output .= '<div class="row">
                                       
                                         <div class="col-md-2 col-xs-2"> 
                                               <i class="material-icons custicon"></i>  
                                        </div>
                                        <div class=" col-md-10 col-xs-9"> 
                 	                    <h3 class="panel-subtitle">' . get_post_meta(get_the_ID(), 'listing_other_phone', true) . '</h3>
					    <p>טלפון נוסף</p>
					</div>
                                       
	                            </div>';
                                }
                                
                                if(get_post_meta(get_the_ID(), 'listing_email', true)!=''){    
                                    $output .= '<hr>
	                                      <div class="row">

	                                              <div class="col-md-2 col-xs-2"> 
                                                         <i class="material-icons custicon">email</i>
                                                  </div>
                                                <div class=" col-md-10 col-xs-9"> 
										                  <h3 class="panel-subtitle">' . get_post_meta(get_the_ID(), 'listing_email', true) . '</h3>
										                  <p>אימייל</p>
										         </div>

	                                      </div>';
                                }
                                 if(get_post_meta(get_the_ID(), 'listing_other_email', true)!=''){    
                                    $output .= '
	                                      <div class="row">
	                                              <div class="col-md-2 col-xs-2"> 
                                                         
                                                  </div>
                                                <div class=" col-md-10 col-xs-9"> 
										                  <h3 class="panel-subtitle">' . get_post_meta(get_the_ID(), 'listing_other_email', true) . '</h3>
										                  <p>אימייל נוסף</p>
										         </div>

										        


	                                      </div>';
                                }
                                if($address!=''){   									
                                    $output .= '<hr/>
	                                       <div class="row">

	                                             <div class="col-md-2 col-xs-2"> 
                                                  
                                                          <i class="material-icons custicon notranslate">place</i>
                                                      
                                                  </div>
                                                <div class=" col-md-10 col-xs-9"> 
										                  <h3 class="panel-subtitle">' . $address . '</h3>
										                  <p>כתובת בית</p>

										         </div>

										         


	                                       </div>
	                                       <div class="row">

	                                            <div class=" col-md-12 col-lg-12 fullmap ">    
                                                        <iframe class="frmtop" frameborder="0" id="cusmap" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<' . $address . '&output=embed"></iframe>
										         </div>
	                                       </div>';
                                }
                                
                                if($work_address!=''){    
                                    $output .= '

	                                       <div class="row">

	                                             <div class="col-md-2 col-xs-2"> 
                                                  
                                                          <i class="material-icons custicon notranslate">place</i>
                                                      
                                                  </div>
                                                <div class=" col-md-10 col-xs-9"> 
										                  <h3 class="panel-subtitle">' . $work_address . '</h3>
										                  <p>כתובת נוספת</p>

										         </div>

										         


	                                       </div>
	                                       
	                                       <div class="row">
									     <div class=" col-md-12 col-lg-12 fullmap">    
										                  <iframe class="frmtop" frameborder="0" id="cusmap" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<' . $work_address_map . '&output=embed"></iframe>
										         </div>
	                                       </div>';
                                }
                                
                                if(get_post_meta(get_the_ID(), 'listing_website_url', true)!=''){    
                                    $output .= '
	                                      <div class="row">

	                                             <div class="col-md-2 col-xs-2"> 
                                                  
                                                         <i class="material-icons custicon">public</i>
                                                      
                                                  </div>
                                                <div class=" col-md-10 col-xs-9"> 
										                  <h3 class="panel-subtitle"><a href="' . get_post_meta(get_the_ID(), 'listing_website_url', true) . '" target="_blank">' . get_post_meta(get_the_ID(), 'listing_website_url', true) . '</a></h3>
										                  <p>אתר אינטרנט</p>
										         </div>

										         


	                                       </div>';
                                }
                                
                                if(get_post_meta(get_the_ID(), 'listing_skype_id', true)!=''){    
                                    $output .= '<hr/>
		                                      <div class="row">

		                                            <div class="col-md-2 col-xs-2"> 
                                                            <i class="fa fa-skype custglyphicon" aria-hidden="true"></i>
                                                          
                                                      </div>


                                                    <div class=" col-md-10 col-xs-9"> 
											                  <h3 class="panel-subtitle">' . get_post_meta(get_the_ID(), 'listing_skype_id', true) . '</h3>
											                  <p>סקייפ</p>
											         </div>

											          
		                                       </div>';
                                }
                                if(get_post_meta(get_the_ID(), 'listing_other_id', true)!=''){    
                                    $output .= '<div class="row">

		                                            
                                                      <div class="col-md-2 col-xs-2"> 
                                                         <i class="material-icons custicon"></i>  
                                                             
                                                      </div>
                                                    <div class=" col-md-10 col-xs-9"> 
											                  <h3 class="panel-subtitle">' . get_post_meta(get_the_ID(), 'listing_other_id', true) . '</h3>
											                  <p>נוסף</p>
											         </div>



		                                       </div>';
                                }
                                
                                if(get_post_meta(get_the_ID(), 'listing_facebook', true)!=''){    
                                    $output .= '<hr/><div class="row">
                                                    
                                                     <div class="col-md-2 col-xs-2"> 
                                                        <i class="fa fa-facebook-square custglyphicon" aria-hidden="true"></i>
                                                    </div>
                                                    <div class=" col-md-10 col-xs-9 "> 
                                                        <h3 class="panel-subtitle"><a href="' . get_post_meta(get_the_ID(), 'listing_facebook', true) . '" target="_blank">' . get_post_meta(get_the_ID(), 'listing_facebook', true) . '</a></h3>
							<p>פייסבוק</p>
                                                    </div>
                                                   
		                                </div>';
                                }
                                if(get_post_meta(get_the_ID(), 'listing_twitter', true)!=''){    
                                    $output .= '<div class="row">

		                                            
                                                     <div class="col-md-2 col-xs-2"> 
                                                           <i class="fa fa-twitter custglyphicon" aria-hidden="true"></i>
                                                      </div>

                                                    <div class=" col-md-10 col-xs-9"> 
											                  <h3 class="panel-subtitle"><a href="' . get_post_meta(get_the_ID(), 'listing_twitter', true) . '" target="_blank">' . get_post_meta(get_the_ID(), 'listing_twitter', true) . '</a></h3>
											                  <p>טוויטר</p>
											         </div>

											         

		                                       </div>';
                                }  
                                
                                if(get_post_meta(get_the_ID(), 'listing_husb_bdy', true)!=''){    
                                    $output .= '<hr><div class="row">
                                        <div class="col-md-2 col-xs-2"> 
                                            <i class="material-icons custicon notranslate">date_range</i>
                                        </div>
                                        <div class=" col-md-10 col-xs-9 "> 
                                            <h3 class="panel-subtitle">' . get_post_meta(get_the_ID(), 'listing_husb_bdy', true) . '</h3>
					    <p class="hus_bday">'.get_post_meta(get_the_ID(), 'listing_husband_name', true).' יום הולדת</p>
					</div>
	                            </div>';
                                }
                                
                                if(get_post_meta(get_the_ID(), 'listing_wife_bdy', true)!=''){    
                                    $output .= '<div class="row">

	                                            
                                                <div class="col-md-2 col-xs-2 "> 
                                                    <i class="material-icons custicon notranslate">date_range</i>
                                                  </div>
                                                <div class=" col-md-10 col-xs-9 "> 
										                  <h3 class="panel-subtitle">' . get_post_meta(get_the_ID(), 'listing_wife_bdy', true) . '</h3>
										                  <p class="wife_bday">'.get_post_meta(get_the_ID(), 'listing_wife_name', true).' יום הולדת</p>
										         </div>

										          


	                                        </div>';
                                }
                                
                                
                                if(get_post_meta(get_the_ID(), 'listing_bio', true)!=''){    
                                    $output .= '<hr/>
	                                      <div class="row">

	                                              <div class="col-md-2 col-xs-2"> 
                                                       <i class="material-icons custicon">edit</i>  
                                                  </div>
                                                <div class=" col-md-10 col-xs-9"> 
										                  <h3 class="panel-subtitle listing-bio">' . get_post_meta(get_the_ID(), 'listing_bio', true) . '</h3>
										                  <p>אודות</p>
										         </div>

										        


	                                      </div>';
                                }
                                
                                
                                $output .= '<hr>
	                                        <div class="row">

                                              <div class="fbt">

	                                           <div class="col-md-2 col-lg-2 "> 
                                                       <div class="more">
                                                            
                                                                <a class="btn uparrw" data-back-id="' . get_the_ID() . '" ><i class="material-icons">expand_less</i></a> 
                                                             
                                                        </div>
                                                  </div>
                                                <div class="col-md-10 col-lg-10 "> 
										               <div class="more">
															
															     <button type="button" class="btn editdirinfo" data-toggle="modal"  id="buttondir" data-edit-id="' . get_the_ID() . '" >
																  עדכן כרטיס
																</button>
														    
									                    </div>
										         </div>

										        </div>  


	                                       </div>
	                                      </div>

                                   </div>
                                   </form>
	                          </div> ';

            /* edit pop up class */


            $output .='<div class="col-xs-10 col-sm-6 col-md-4 upd-edit over_section_form_edit" id="upd-edit-' . get_the_ID() . '" data-id="' . get_the_ID() . '"></div>';
        }


        $output .= '</div>';
    } else {
        if (isset($_GET['search']) || $_GET['search'] != '') {
            $output .= '<div class="col-xs-12"><div class="box no-records">לחיפוש זה לא נמצאו תוצאות</div></div>';
        } else {
            $output = 'Please add single Phone Directory from backend.';
        }
    }
    return $output;
}

add_shortcode('phone_dir_list', 'phone_dir_list_func');


/* Ajax for pass the data of form */

function ajax_create_directory_func() {
    ?>

    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <!-- insert data !-->
    <script type="text/javascript">
        jQuery(document).ready(function () {
        	function validateEmail($email) {
 				 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  				 return emailReg.test( $email );
			}
            jQuery('.add-listing-btn').click(function (event) {
            	event.preventDefault();
            	  
                var dir_first_name = jQuery("#dir-first-name").val();
                var dir_husband_name = jQuery("#dir-husband-name").val();
                var dir_wife_name = jQuery("#dir-wife-name").val();    
                
                var dir_phone_number = jQuery("#dir-phone-number").val();
                var dir_hus_number = jQuery("#dir-hus-number").val();
                var dir_wife_number = jQuery("#dir-wife-number").val();
                var dir_other_number = jQuery("#dir-other-number").val();
                
                var dir_email_address = jQuery("#dir-email-address").val();
                var dir_other_email_address = jQuery("#dir-other-email-address").val();
                
                
                var dir_website_url = jQuery("#dir-website-url").val();

                var dir_home_address = jQuery("#dir-home-address").val();
                var dir_home_city = jQuery("#dir-home_city").val();
                var dir_home_country = jQuery("#dir-home_country").val();
                var dir_home_zipcode = jQuery("#dir-home_zipcode").val();
                
                var dir_work_address = jQuery("#dir-work-address").val();
                var dir_work_city = jQuery("#dir-work_city").val();
                var dir_work_country = jQuery("#dir-work_country").val();
                var dir_work_zipcode = jQuery("#dir-work_zipcode").val();

                var dir_other_id = jQuery("#dir-other-id").val();
                var dir_skype_id = jQuery("#dir-skype-id").val();
                var dir_facebook_url = jQuery("#dir-facebook-url").val();
                var dir_twitter_uname = jQuery("#dir-twitter-uname").val();
                
                var dir_husband_bdy = jQuery("#dir-husband-bdy").val();
                var dir_wife_bdy = jQuery("#dir-wife-bdy").val();
                var bio = jQuery("#dir-bio").val();
				
				jQuery('.join_1_error').css("display","none");
        
				var flag=0;  
				var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;      
				jQuery('.cfield').removeClass('error');
				if(dir_first_name==''){
					flag=1;
					jQuery("#dir-first-name").parent().addClass('error');
				}
				if(dir_husband_name =='' && dir_wife_name == ''){
					flag=1;
					jQuery('#dir-husband-name').parent().addClass('error');
					jQuery('#dir-wife-name').parent().addClass('error');
				}
				if(dir_phone_number != '' && jQuery.isNumeric( dir_phone_number.replace(/-/g, "") ) == false) {
					flag = 1;
					jQuery('#dir-phone-number').parent().addClass('error');
				}
				if(dir_hus_number != '' && jQuery.isNumeric( dir_hus_number.replace(/-/g, "") ) == false) {
					flag = 1;
					jQuery('#dir-hus-number').parent().addClass('error');
				}
				if(dir_wife_number != '' & jQuery.isNumeric( dir_wife_number.replace(/-/g, "") ) == false) {
					flag = 1;
					jQuery('#dir-wife-number').parent().addClass('error');
				}
				if(dir_other_number != '' && jQuery.isNumeric( dir_other_number.replace(/-/g, "") ) == false) {
					flag = 1;
					jQuery('#dir-other-number').parent().addClass('error');
				}
				
				if(dir_email_address != '' && validateEmail(dir_email_address) == false){
					flag = 1;
					jQuery('#dir-email-address').parent().addClass('error');
				}
				
				if(jQuery("#terms-cond").is(':checked') == false){
					flag = 1;
					jQuery('#terms-cond').parent().find('#terms_error').html('אנא אשר את תנאי השימוש והמדיניות').css({"display":"block","color":"red","margin-bottom":"10px","margin-right":"10px"});
				}
				
				if(flag == 1){
					jQuery(".cr-user-btn #createlisting").animate({ scrollTop: 0 }, "slow");
					return false;
				}	

                jQuery.ajax({
                    data: {action: 'directory_form', dir_first_name: dir_first_name, dir_husband_name: dir_husband_name, dir_wife_name: dir_wife_name, dir_phone_number: dir_phone_number, dir_hus_number: dir_hus_number, dir_wife_number: dir_wife_number, dir_other_number: dir_other_number, dir_email_address: dir_email_address, dir_other_email_address: dir_other_email_address, dir_website_url: dir_website_url, dir_home_address: dir_home_address, dir_home_city: dir_home_city, dir_home_country: dir_home_country, dir_work_address: dir_work_address, dir_work_city: dir_work_city, dir_work_country: dir_work_country, dir_other_id: dir_other_id, dir_skype_id: dir_skype_id, dir_facebook_url: dir_facebook_url, dir_twitter_uname: dir_twitter_uname, dir_husband_bdy: dir_husband_bdy, dir_wife_bdy: dir_wife_bdy, bio: bio, dir_home_zipcode: dir_home_zipcode, dir_work_zipcode: dir_work_zipcode},
                    type: 'POST',
                    url: ajaxurl, 
                    success: function (data) {   
						jQuery('.modal-dialog').hide();
						jQuery('#update_create_msg').html('תודה על שליחת כרטיס חדש. הכרטיס יבחן ואם ימצא תקין ונכון יאושר ויופיע במערכת').show();
						jQuery("#update_create_msg").animate({ scrollTop: 0 }, "slow"); 
                       // var uurl = jQuery('.site_url').val();
                      //  window.location.href = uurl+'/phone-directory';
                    }
                });

            })



        });
    </script>
   

    <!-- open edit data pop up !-->

    <script type="text/javascript" >
        jQuery(document).ready(function () {

            jQuery('.editdirinfo').click(function (event) {

                event.preventDefault();

                var editid = jQuery(this).attr('data-edit-id');

                jQuery('#oversection-' + editid).hide();

                jQuery.ajax({
                    data: {action: 'editdir_data', editid: editid},
                    type: 'post',
                    url: ajaxurl,
                    success: function (data) {

                        jQuery("#upd-edit-" + editid).html(data);
                        jQuery("#upd-edit-" + editid).show();
                        jQuery("#upd-edit-" + editid).css("position","absolute");						
                        initAutocomplete();                       
                        //var id = jQuery(".upd-edit").attr('id');	
                        //if(id==editid) {

                        //}


                    } 
                });

            });
        });
    </script>
   

    <!-- update directory popup data !-->




    <?php
}

add_action('wp_footer', 'ajax_create_directory_func');


/* Insert post data in pop up */
add_action('wp_ajax_directory_form', 'directory_form');
add_action('wp_ajax_nopriv_directory_form', 'directory_form');

function directory_form() {
    global $wpdb;
    $post_title = '';
    $flag = 0;
  	
  	if($_POST['dir_first_name']!=''){
        $post_title .= $_POST['dir_first_name'];
        $flag=1;     
    }    
    if($_POST['dir_husband_name']!=''){
        if($flag==0){
            $post_title .= $_POST['dir_husband_name'];
            $flag=1;
        }else{
            $post_title .= " ".$_POST['dir_husband_name'];
        }
    }    
    if($_POST['dir_wife_name']!=''){
        if($flag==0){
            $post_title .= $_POST['dir_wife_name'];
            $flag=1;
        }else{
            $post_title .= " ".$_POST['dir_wife_name'];
        }
    }
    
    $new_dir = array(
        'post_title' => $post_title,
        'post_status' => 'pending', 
        'post_type' => 'listing'
    );
    $pid = wp_insert_post($new_dir);    
    if ($pid) {      

        add_post_meta($pid, 'listing_firstname', $_POST['dir_first_name'], true);
        add_post_meta($pid, 'listing_husband_name', $_POST['dir_husband_name'], true);
        add_post_meta($pid, 'listing_wife_name', $_POST['dir_wife_name'], true);
        add_post_meta($pid, 'listing_phone_1', $_POST['dir_phone_number'], true);
        add_post_meta($pid, 'listing_husband_phone', $_POST['dir_hus_number'], true);
        add_post_meta($pid, 'listing_wife_phone', $_POST['dir_wife_number'], true);
        
        add_post_meta($pid, 'listing_other_phone', $_POST['dir_other_number'], true);
        add_post_meta($pid, 'listing_email', $_POST['dir_email_address'], true);
        add_post_meta($pid, 'listing_other_email', $_POST['dir_other_email_address'], true);
        add_post_meta($pid, 'listing_website_url', $_POST['dir_website_url'], true);
        add_post_meta($pid, 'listing_home_address', $_POST['dir_home_address'], true);
        add_post_meta($pid, 'listing_home_city', $_POST['dir_home_city'], true);
        add_post_meta($pid, 'listing_home_country', $_POST['dir_home_country'], true);
        add_post_meta($pid, 'listing_street_zipcode', $_POST['dir_home_zipcode'], true);
        
        add_post_meta($pid, 'listing_street_address', $_POST['dir_work_address'], true);
        add_post_meta($pid, 'listing_street_city', $_POST['dir_work_city'], true);
        add_post_meta($pid, 'listing_street_country', $_POST['dir_work_country'], true);
        add_post_meta($pid, 'listing_home_zipcode', $_POST['dir_work_zipcode'], true);
        
        add_post_meta($pid, 'listing_other_id', $_POST['dir_other_id'], true);
        add_post_meta($pid, 'listing_skype_id', $_POST['dir_skype_id'], true);
        add_post_meta($pid, 'listing_facebook', $_POST['dir_facebook_url'], true);
        add_post_meta($pid, 'listing_twitter', $_POST['dir_twitter_uname'], true);
        add_post_meta($pid, 'listing_husb_bdy', $_POST['dir_husband_bdy'], true);
        add_post_meta($pid, 'listing_wife_bdy', $_POST['dir_wife_bdy'], true);
        
        add_post_meta($pid, 'listing_bio', $_POST['bio'], true);
    }
}

/* Edit Form data display in pop up */

add_action('wp_ajax_editdir_data', 'user_clicked');
add_action('wp_ajax_nopriv_editdir_data', 'user_clicked');

function user_clicked() {
    
    $edit_id = $_POST['editid']; 
        
    $panel_title1 = '';
    if(get_post_meta($edit_id, 'listing_firstname', true)!=''){
        $panel_title1 .= get_post_meta($edit_id, 'listing_firstname', true);
    }                                    
    if(get_post_meta($edit_id, 'listing_wife_name', true)!=''){
        $panel_title1 .= ' '.get_post_meta($edit_id, 'listing_wife_name', true);
    }       
    if(get_post_meta($edit_id, 'listing_husband_name', true)!=''){
        $panel_title1 .= ' ו'.get_post_meta($edit_id, 'listing_husband_name', true);
    }     
    
    

    echo ' <form data-async id="editdirectoryform" method="POST" data-dismiss="modal">

	                          <div class="panel panel-info text-right edit_phone_dir_form">

	                             <input type="hidden" name="editid" value="' . $edit_id . '">

	                                <div class="panel-heading">
                                            <h3 class="panel-title">' . $panel_title1 . '</h3>
						            </div>

						             <div class="panel-body">

						                    <div class="row">

	                                              <div class="col-md-2 col-xs-2"> 
                                                          <i class="material-icons editcusticon">person</i>
                                                  </div>

                                                <div class=" col-md-10 col-xs-9 "> 
										                  <input type="text" class="form-control" name="first-name" id="dir-first-name" placeholder="Name" value="' . get_post_meta($edit_id, 'listing_firstname', true) . '">
										                  <p>שם משפחה</p>
										         </div>

										        

	                                        </div>
                                                
                                                <div class="row">
                                                <div class="col-md-2 col-xs-2 "><i class="material-icons editcusticon">person</i> </div>

	                                            <div class=" col-md-10 col-xs-9"> 
		 								                 <input type="text" class="form-control dir-husband-name" name="dir-husband-name" id="dir-husband-name" placeholder="שם הבעל"  value="' . get_post_meta($edit_id, 'listing_husband_name', true) . '">
										                  <p>שם הבעל</p>
										         </div>

	                                        </div>         
                                                
<div class="row">   <div class="col-md-2 col-xs-2 "><i class="material-icons editcusticon"></i>  </div>

	                                            <div class=" col-md-10 col-xs-9"> 
										                 <input type="text" class="form-control dir-wife-name" name="dir-wife-name" id="dir-wife-name" placeholder="שם האשה" value="' . get_post_meta($edit_id, 'listing_wife_name', true) . '">
										                  <p>שם האשה</p>
										         </div>

	                                        </div>           
	                                         <hr/>
	                                        <div class="row">

	                                             <div class="col-md-2 col-xs-2"> 
                                                         <i class="material-icons editcusticon">phone</i>
                                                  </div>
                                                <div class=" col-md-10 col-xs-9"> 
										                  <input type="text" class="form-control" name="phone-number" id="dir-phone-number" placeholder="טלפון בבית" value="' . get_post_meta($edit_id, 'listing_phone_1', true) . '">
										                  <p>טלפון בבית</p>
										         </div>

										          


	                                         </div>
                                                 
                                            <div class="row">
	                                        <div class="col-md-2 col-xs-2"><i class="material-icons editcusticon"></i>   
                                                </div>
                                                <div class=" col-md-10 col-xs-9"> 
						    <input type="text" class="form-control" name="husband_phone_number" id="husband_phone_number" placeholder="'.get_post_meta(get_the_ID(), 'listing_husband_name', true).' טלפון בבית" value="' . get_post_meta($edit_id, 'listing_husband_phone', true) . '">
						    <p class="hus_name">'.get_post_meta($edit_id, 'listing_husband_name', true).' טלפון בבית</p>
						</div>
                                            </div>
                                            
                                            <div class="row">
	                                        <div class="col-md-2 col-xs-2"> <i class="material-icons editcusticon"></i>  
                                                </div>
                                                <div class=" col-md-10 col-xs-9"> 
						    <input type="text" class="form-control" name="wife_phone_number" id="wife_phone_number" value="' . get_post_meta($edit_id, 'listing_wife_phone', true) . '">
						    <p class="hus_wife_name">'.get_post_meta($edit_id, 'listing_wife_name', true).' טלפון בבית</p>
						</div>
                                            </div>
                                            
                                    <div class="row">
                                        <div class="col-md-2 col-xs-2"> <i class="material-icons editcusticon"></i>  
                                        </div>
                                        <div class=" col-md-10 col-xs-9"> 
					    <input type="text" class="form-control" name="listing_other_phone" id="other-phone-number" placeholder="Other Phone Number" value="' . get_post_meta($edit_id, 'listing_other_phone', true) . '">
					    <p>טלפון נוסף</p>
					</div>
                                    </div>
                                            <hr/>
	                                      <div class="row">

	                                               <div class="col-md-2 col-xs-2"> 
                                                        <i class="material-icons editcusticon">email</i>
                                                  </div>
                                                <div class=" col-md-10 col-xs-9"> 
										                   <input type="text" class="form-control" name="email-address" id="dir-email-address" placeholder="אימייל" value="' . get_post_meta($edit_id, 'listing_email', true) . '">
										                  <p>אימייל</p>
										         </div>

	                                    </div>
	                                      <div class="row">

	                                               <div class="col-md-2 col-xs-2"> 
                                                        
                                                  </div>
                                                <div class=" col-md-10 col-xs-9"> 
										                   <input type="text" class="form-control" name="other-email-address" id="dir-other-email-address" placeholder="אימייל נוסף" value="' . get_post_meta($edit_id, 'listing_other_email', true) . '">
										                  <p>אימייל נוסף</p>
										         </div>

	                                    </div>
                                            <hr/>
	                                    <div class="row">
                                                 <div class="col-md-2 col-xs-2"> 
                                                    <i class="material-icons editcusticon">place</i>
                        </div>
                                                <div class=" col-md-10 col-xs-9"> 
                                                <input class="form-control" type="text" name ="dir-home-address" placeholder="כתובת בית" id="dir-home-address1" value="'.get_post_meta($edit_id, 'listing_home_address', true).'">
                                            
                                                    <p>כתובת בית</p>
                			        </div>
                                               
	                                    </div> 
                                            
                                            
                                <div class="row">
	                                    <div class="col-md-2 col-xs-2">  <i class="material-icons editcusticon"></i>
                                            </div>
                                            <div class=" col-md-10 col-xs-9"> 
                                                    <input type="text" class="form-control country_home" name="dir-country" id="dircountry" placeholder="מדינה" value="' . get_post_meta($edit_id, 'listing_home_country', true) . '">
                                                    <p>מדינה</p>
                                                </div>
					
	                                    </div>
                                            
                                <div class="row">
	                                       <div class="col-md-2 col-xs-2">  <i class="material-icons editcusticon"></i>
                        </div>
                                            <div class=" col-md-10 col-xs-9"> 
                                                    <input type="text" class="form-control locality_home" name="dir-city" id="dircity" placeholder="עיר" value="' . get_post_meta($edit_id, 'listing_home_city', true) . '">
                                                    <p>עיר</p>
                                                </div>
						
	                                    </div>
                                            
                                <div class="row">
	                            <div class="col-md-2 col-xs-2">  <i class="material-icons editcusticon"></i></div>
                                        <div class=" col-md-10 col-xs-9"> 
                                            <input type="text" class="form-control dirzipcode" name="dir-zipcode" id="dirzipcode" placeholder="מיקוד" value="' . get_post_meta($edit_id, 'listing_home_zipcode', true) . '">
                                            <p>מיקוד</p>
                                        </div>
	                        </div>
                                

                                            
                                            
                                            <hr/>
                                            
                                            <div class="row">
                                                <div class="col-md-2 col-xs-2"> 
                                                    <i class="material-icons editcusticon">place</i>
                        </div>
                                                <div class=" col-md-10 col-xs-9"> 

                                        <input class="form-control autocomplete" type="text" name ="dir-work-address" placeholder="כתובת נוספת" id="dir-work-address1" value="' . get_post_meta($edit_id, 'listing_street_address', true) . '"/>
                			                        <p>כתובת נוספת</p>
                			        </div>
                                                
	                                    </div> 
                                            
                                       
                                            <div class="row">
	                                        <div class="col-md-2 col-xs-2"> <i class="material-icons editcusticon"></i>
                        </div>
                                            <div class=" col-md-10 col-xs-9"> 
                                                    <input type="text" class="form-control country_work" name="dir-street_country" id="dir-country" placeholder="Country" value="' . get_post_meta($edit_id, 'listing_street_country', true) . '">
                                                    <p>מדינה</p>
                                                </div>
						
	                                    </div>
                                            
                                             <div class="row">
	                                       <div class="col-md-2 col-xs-2">  <i class="material-icons editcusticon"></i>
                        </div>
                                            <div class=" col-md-10 col-xs-9"> 
                                                    <input type="text" class="form-control locality_work" name="dir-street_city" id="dir-city" placeholder="עיר" value="' . get_post_meta($edit_id, 'listing_street_city', true) . '">
                                                    <p>עיר</p>
                                                </div>
						
	                                    </div>	


                                            
                                            <div class="row">
	                                        <div class="col-md-2 col-xs-2"> <i class="material-icons editcusticon"></i>
                        </div>
                                            <div class=" col-md-10 col-xs-9"> 
                                                    <input type="text" class="form-control dir-street_zipcode" name="dir-street_zipcode" id="dir-zipcode" placeholder="מיקוד" value="' . get_post_meta($edit_id, 'listing_street_zipcode', true) . '">
                                                    <p>מיקוד</p>
                                                </div>
						
	                                    </div>

                                                                                
                                            

                                            <hr/>
                                            
                                            <div class="row">
	                                        <div class="col-md-2 col-xs-2"> 
                            <i class="material-icons editcusticon">public</i>
                        </div>
                                            <div class=" col-md-10 col-xs-9"> 
                                                    <input type="text" class="form-control" name="dir-website-url" value="' . get_post_meta($edit_id, 'listing_website_url', true) . '">
						    <p>אתר אינטרנט</p>
						</div>
						
	                                    </div>    
                                            
                                            <hr>
                                            <div class="row">
		                                <div class="col-md-2 col-xs-2"> 
                            <i class="fa fa-skype custglyphicon" aria-hidden="true"></i>
                                                </div>
                                        <div class=" col-md-10 col-xs-9"> 
						    <input type="text" class="form-control" name="dir-skype-id" id="dir-skype-id" placeholder="סקייפ" value="' . get_post_meta($edit_id, 'listing_skype_id', true) . '">
						    <p>סקייפ</p>
						</div>
						
		                            </div>
                                            
                                            <div class="row">
                                            <div class="col-md-2 col-xs-2"> <i class="material-icons custglyphicon"></i>
                                                </div>
                                                 <div class=" col-md-10 col-xs-9"> 
						    <input type="text" class="form-control" name="dir-other-id" id="dir-other-id" placeholder="נוסף" value="' . get_post_meta($edit_id, 'listing_other_id', true) . '">
						    <p>נוסף</p>
						</div>
						
		                            </div>
                                            <hr/>
                                            

                                            <div class="row">
                                            <div class="col-md-2 col-xs-2"> 
                             <i class="fa fa-facebook-square custglyphicon" aria-hidden="true"></i>
                        </div>
		                                <div class=" col-md-10 col-xs-9"> 
                                                    <input type="text" class="form-control" name="dir-facebook-url" id="dir-facebook-url" placeholder="פייסבוק" value="' . get_post_meta($edit_id, 'listing_facebook', true) . '">
                                                    <p>פייסבוק</p>
						</div>
                                        	
		                            </div>
                                            <div class="row">

                                                <div class="col-md-2 col-xs-2">                                                                                                    <i class="fa fa-twitter custglyphicon" aria-hidden="true"></i>
                                                </div>
		                                <div class=" col-md-10 col-xs-9"> 
						    <input type="text" class="form-control" name="dir-twitter-uname" id="dir-twitter-uname" placeholder="טוויטר"  value="' . get_post_meta($edit_id, 'listing_twitter', true) . '">
						    <p>טוויטר</p>
						</div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                              <div class=" col-md-2 col-xs-2"> <i class="material-icons custicon notranslate">date_range</i></div>
	                                        <div class=" col-md-10 col-xs-9"> 
                                                    <input type="text" class="form-control" name="dir-husband-bdy" id="dir-husband-bdy" placeholder="(dd/mm/yyyy)" value="' . get_post_meta($edit_id, 'listing_husb_bdy', true) . '">
						    <p class="hus_bday">'.get_post_meta($edit_id, 'listing_husband_name', true).' יום הולדת</p>
						</div>
                                              
	                                    </div>
                                            
                                            <div class="row">
                                              <div class=" col-md-2 col-xs-2"> <i class="material-icons custicon notranslate">date_range</i></div>
	                                        <div class=" col-md-10 col-xs-9"> 
                                                    <input type="text" class="form-control" name="dir-wife-bdy" id="dir-wife-bdy" placeholder="(dd/mm/yyyy)" value="' . get_post_meta($edit_id, 'listing_wife_bdy', true) . '">
						    <p class="wife_bday">'.get_post_meta($edit_id, 'listing_wife_name', true).' יום הולדת</p>
						</div>
                                              
	                                    </div>

                                            <div class="row">
                                             <div class="col-md-2 col-xs-2"> <i class="material-icons editcusticon">edit</i></div>
	                                            <div class=" col-md-10 col-xs-9"> 
                                                        <textarea class="form-control" name="listing_bio" id="dir-bio" placeholder="אודות" >'. get_post_meta($edit_id, 'listing_bio', true) . '</textarea>
                                                        <p>אודות</p>
                                                    </div>
                                                   
	                                    </div>
                                            <hr>
		                                      
		                                       <div class="row">
                                                 <div class="upsec">

		                                            <div class=" col-md-12"> 
													  <input type="checkbox" name="dir-terms-cond" id="dir-terms-cond" value="yes" class="dir-terms-cond"> אני מאשר שקראתי את <a href="/policy/" target="_blank" class="terms-condition">תנאי השימוש והמדיניות</a>
													</div>
                                                    </div>
											   </div>

	                                        <hr>
	                                        <div class="row">
                                               <div class="upsec">
												<div class=" col-md-1"> </div>
	                                            <div class=" col-md-8 col-lg-8 update-car-btn"> 
										                   <div class="more">
    															 <p>
    															     <input id="update-dir-btn" type="submit" value="עדכן" class="btn updatedir" data-target="#resmodal" data-toggle="modal" >
    														     </p>
    									                    </div>
                                                        
										         </div>

										          <div class="col-md-3 col-lg-3 "> 
                                                     

    										               <div class="more">
    															 <p>
    														        <a class="btn uparrw editarrw" data-back-id="upd-edit-' . $edit_id . '" ><i class="material-icons">expand_less</i></a>
    														     </p>
    													    </div>
                                                     
										          </div>
                                                  </div>


	                                       </div>
	                                      </div>

                                         </div>
	                                   </form>';

    exit;
}

/* update directory data mail send ajax script */

function update_dir() {
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>

    <script type="text/javascript">

        jQuery(document).ready(function () {
            jQuery('.upd-edit').on('submit', 'form[data-async]', function (event) {
                event.preventDefault();


                if (jQuery('.dir-terms-cond').is(':checked')) {

                    //jQuery('#editModal').hide();					 

                    var $form = jQuery(this);
                    //var data = $form.serialize();
                    var data = jQuery('#editdirectoryform').serialize();
                    jQuery.ajax({
                        type: 'post',
                        url: ajaxurl,
                        data: {action: 'dirmail_data', data},
                        success: function (data) {							
                            jQuery('.dir-box').show();
							jQuery('.upd-edit').hide();
							jQuery('#update_create_msg').html('תודה על עדכון הכרטיס. העדכון יבחן ואם ימצא תקין ונכון יאושר ויעודכן במערכת').show();
							jQuery("#update_create_msg").animate({ scrollTop: 0 }, "slow");                           
							return false;
                        }
                    });

                } else {
                    alert("אנא אשר את תנאי השימוש והמדיניות");
                }


            });
   
            
       
		

        });
    </script>
    <?php
}

add_action('wp_footer', 'update_dir');

/* ajax call for update data */

add_action('wp_ajax_dirmail_data', 'send_editdata');
add_action('wp_ajax_nopriv_dirmail_data', 'send_editdata');

function send_editdata() {
    $update_data1 = $_POST['data'];
    $update_arr = array();
    parse_str($update_data1, $update_arr);
    
    global $wpdb;
    
    $post_title = '';
    $flag = 0;
    if($update_arr['first-name']!=''){
        $post_title .= $update_arr['first-name'];
        $flag=1;
    }    
    if($update_arr['dir-husband-name']!=''){
        if($flag==0){
            $post_title .= $update_arr['dir-husband-name'];
            $flag=1;
        }else{
            $post_title .= " ".$update_arr['dir-husband-name'];
        }
    }    
    if($update_arr['dir-wife-name']!=''){
        if($flag==0){
            $post_title .= $update_arr['dir-wife-name'];
            $flag=1;
        }else{
            $post_title .= " ".$update_arr['dir-wife-name'];
        }
    }
    $new_dir = array(
        'post_title' => $post_title,
        'post_status' => 'pending',
        'post_type' => 'pending_listing'
    );
    $pid = wp_insert_post($new_dir);
    if ($pid) {
        $ID = $update_arr['editid'];
        
        $fname = get_post_meta($ID, 'listing_firstname');
        $husband_name = get_post_meta($ID, 'listing_husband_name');
        $wife_name = get_post_meta($ID, 'listing_wife_name');
        
        $phone = get_post_meta($ID, 'listing_phone_1');
        $husband_phone = get_post_meta($ID, 'listing_husband_phone');
        $wife_phone = get_post_meta($ID, 'listing_wife_phone');
        
        $other_phone = get_post_meta($ID, 'listing_other_phone');
        $email = get_post_meta($ID, 'listing_email');
        $other_email = get_post_meta($ID, 'listing_other_email');
        $home_add = get_post_meta($ID, 'listing_home_address');
        $home_city = get_post_meta($ID, 'listing_home_city');
        $home_country = get_post_meta($ID, 'listing_home_country');
        $home_zipcode = get_post_meta($ID, 'listing_home_zipcode');
        
        $work_add = get_post_meta($ID, 'listing_street_address');
        $work_city = get_post_meta($ID, 'listing_street_city');
        $work_country = get_post_meta($ID, 'listing_street_country');
        $work_zipcode = get_post_meta($ID, 'listing_street_zipcode');
        
        $web_url = get_post_meta($ID, 'listing_website_url');
        $skypeid = get_post_meta($ID, 'listing_skype_id');
        $otherid = get_post_meta($ID, 'listing_other_id');
        $fb = get_post_meta($ID, 'listing_facebook');
        $twitter = get_post_meta($ID, 'listing_twitter');
        
        $hus_bday = get_post_meta($ID, 'listing_husb_bdy');
        $wife_bday = get_post_meta($ID, 'listing_wife_bdy');
        
        $bio = get_post_meta($ID, 'listing_bio');


        add_post_meta($pid, 'old_listing_firstname', $fname[0], true);
        add_post_meta($pid, 'old_listing_husband_name', $husband_name[0], true);
        add_post_meta($pid, 'old_listing_wife_name', $wife_name[0], true);
        
        add_post_meta($pid, 'old_listing_phone_1', $phone[0], true);
        add_post_meta($pid, 'old_listing_husband_phone', $husband_phone[0], true);
        add_post_meta($pid, 'old_listing_wife_phone', $wife_phone[0], true);
        
        add_post_meta($pid, 'old_listing_other_phone', $other_phone[0], true);
        add_post_meta($pid, 'old_listing_email', $email[0], true);
        add_post_meta($pid, 'old_other_listing_email', $other_email[0], true);
        
        add_post_meta($pid, 'old_listing_home_address', $home_add[0], true);
        add_post_meta($pid, 'old_listing_home_city', $home_city[0], true);
        add_post_meta($pid, 'old_listing_home_country', $home_country[0], true);
        add_post_meta($pid, 'old_listing_home_zipcode', $home_zipcode[0], true);
        
        add_post_meta($pid, 'old_listing_street_address', $work_add[0], true);
        add_post_meta($pid, 'old_listing_street_city', $work_city[0], true);
        add_post_meta($pid, 'old_listing_street_country', $work_country[0], true);
        add_post_meta($pid, 'old_listing_street_zipcode', $work_zipcode[0], true);
        
        add_post_meta($pid, 'old_listing_website_url', $web_url[0], true);
        
        
        add_post_meta($pid, 'old_listing_skype_id', $skypeid[0], true);
        add_post_meta($pid, 'old_listing_other_id', $otherid[0], true);
        
        add_post_meta($pid, 'old_listing_facebook', $fb[0], true);
        add_post_meta($pid, 'old_listing_twitter', $twitter[0], true);
       
        add_post_meta($pid, 'old_listing_husb_bdy', $hus_bday[0], true);
        add_post_meta($pid, 'old_listing_wife_bdy', $wife_bday[0], true);
        
        add_post_meta($pid, 'old_listing_bio', $bio[0], true);


        add_post_meta($pid, 'old_listing_ID', $update_arr['editid'], true);
        add_post_meta($pid, 'listing_firstname', $update_arr['first-name'], true);        
        add_post_meta($pid, 'listing_husband_name', $update_arr['dir-husband-name'], true);
        add_post_meta($pid, 'listing_wife_name', $update_arr['dir-wife-name'], true);
        
        add_post_meta($pid, 'listing_phone_1', $update_arr['phone-number'], true);
        add_post_meta($pid, 'listing_husband_phone', $update_arr['husband_phone_number'], true);
        add_post_meta($pid, 'listing_wife_phone', $update_arr['wife_phone_number'], true);
        
        add_post_meta($pid, 'listing_other_phone', $update_arr['listing_other_phone'], true);
        add_post_meta($pid, 'listing_email', $update_arr['email-address'], true);
        add_post_meta($pid, 'listing_other_email', $update_arr['other-email-address'], true);
        
        add_post_meta($pid, 'listing_home_address', $update_arr['dir-home-address'], true);
        add_post_meta($pid, 'listing_home_city', $update_arr['dir-city'], true);
        add_post_meta($pid, 'listing_home_country', $update_arr['dir-country'], true);
        add_post_meta($pid, 'listing_home_zipcode', $update_arr['dir-zipcode'], true);
        
        add_post_meta($pid, 'listing_street_address', $update_arr['dir-work-address'], true);
        add_post_meta($pid, 'listing_street_city', $update_arr['dir-street_city'], true);
        add_post_meta($pid, 'listing_street_country', $update_arr['dir-street_country'], true);
        add_post_meta($pid, 'listing_street_zipcode', $update_arr['dir-street_zipcode'], true);
        
        add_post_meta($pid, 'listing_website_url', $update_arr['dir-website-url'], true);
        
        add_post_meta($pid, 'listing_skype_id', $update_arr['dir-skype-id'], true);
        add_post_meta($pid, 'listing_other_id', $update_arr['dir-other-id'], true);
        
        add_post_meta($pid, 'listing_facebook', $update_arr['dir-facebook-url'], true);
        add_post_meta($pid, 'listing_twitter', $update_arr['dir-twitter-uname'], true);
       
        add_post_meta($pid, 'listing_husb_bdy', $update_arr['dir-husband-bdy'], true);
        add_post_meta($pid, 'listing_wife_bdy', $update_arr['dir-wife-bdy'], true);
        
        add_post_meta($pid, 'listing_bio', $update_arr['listing_bio'], true);
    }

}

function hyphenize($string) {
    return

            preg_replace(
            array('#[\\s-]+#', '#[^A-Za-z0-9\. -]+#'), array('-', ''), urldecode($string)
    );
}

add_action('wp_ajax_autosearch', 'autosearch');
add_action('wp_ajax_nopriv_autosearch', 'autosearch');

function autosearch() {
	
    if ($_GET['q'] != NULL) {
		
		$searchstring=explode(" ",$_GET['q']);


        $args = array(
            'post_type' => 'listing',
            'post_status' => 'publish',
            'order' => 'DESC',
            'posts_per_page' => 10,
        );

        if ( count($searchstring)==1 ) {


            $args['meta_query'] = array(
                'relation' => 'OR',
            );
            foreach ($searchstring as $key=>$value) {
      			
          			$args['meta_query'][] = array(
          				'key' => 'listing_firstname',
          				'value' => $value,
          				'compare' => 'LIKE'
          			);
          			$args['meta_query'][] = array(
          				'key' => 'listing_husband_name ',
          				'value' =>$value,
          				'compare' => 'LIKE'
          			);
          			$args['meta_query'][] = array(
          				'key' => 'listing_wife_name ',
          				'value' =>$value,
          				'compare' => 'LIKE'
          			);
      		  }
        }

        else { //more than one name sent - try to match  - added by Ofer             

          $args['meta_query'][0] = array(
                  'relation' => 'OR',
          );

          $args['meta_query'][0][] = array(
                  'relation' => 'AND',
          );
          $args['meta_query'][0][0][] = array(
              'key' => 'listing_firstname',
              'value' => $searchstring[0],
              'compare' => 'LIKE'
          );

          $iIndex = -1;

          foreach ($searchstring as $search_key=>$search_value) {

            $iIndex++;

            if ($iIndex==0) continue;          

            if ( mb_substr($search_value,0,1) == "ו" ) $search_value = mb_substr($search_value,1);

            $args['meta_query'][0][0][] = array(
                'relation' => 'OR',
            );
              $args['meta_query'][0][0][$iIndex][] = array(
                'key' => 'listing_husband_name',
                'value' => $search_value,
                'compare' => 'LIKE' 
              );    
              $args['meta_query'][0][0][$iIndex][] = array(
                'key' => 'listing_wife_name',
                'value' => $search_value,
                'compare' => 'LIKE' 
              );
           }   
          
        }


    }
    $dir_search_list = new WP_Query($args);    
    

    usort($dir_search_list->posts, 'mb_strcasecmp2');            

    $search_list = '';
	
    if ($dir_search_list->have_posts()) {

        while ($dir_search_list->have_posts()) {

            $dir_search_list->the_post();
            $person_name = get_post_meta(get_the_ID(), 'listing_firstname', true)." ".get_post_meta(get_the_ID(), 'listing_husband_name', true)." ".get_post_meta(get_the_ID(), 'listing_wife_name', true) ;
            $search_list .= '"' . $person_name . '",';            
        }        
    }
    $search_result = $_GET['callback'] . '([' . $search_list . '])';
    echo $search_result;
    die();
}

function get_countries() {
    global $wpdb;

    //$get_countries = "SELECT country_name FROM wp_countries ORDER BY country_name ASC";

    //$countries = $wpdb->get_results($get_countries, OBJECT);

    $countries_array = array('as' => 'ads');
    //foreach ($countries as $country) {
    //    $country_name = $country->country_name;
    //    $countries_array[$country_name] = $country_name;
    //}

    return $countries_array;
}

/* Create custom post type */

add_filter('piklist_post_types', 'pending_listing_post_type');

function pending_listing_post_type($post_types) {
    $post_types['pending_listing'] = array(
        'labels' => piklist('post_type_labels', 'Pending Listing')
        , 'title' => __('Enter a New Pending Listing')
        , 'public' => true
        , 'rewrite' => array(
            'slug' => 'pending_listing'
        )
        , 'supports' => array(
            'author'
            , 'revisions'
            , 'title'
            , 'thumbnail'
        )
    );
    return $post_types;
}

function pending_listing_publish($ID, $post) {

    
    if ($post->post_type == 'pending_listing') {
        $listing_id1 = get_post_meta($ID, 'old_listing_ID');
        $listing_id = $listing_id1[0];
        /* Get all fileds data */
        
        $fname = get_post_meta($ID, 'listing_firstname');
        $husband_name = get_post_meta($ID, 'listing_husband_name');
        $wife_name = get_post_meta($ID, 'listing_wife_name');
        
        $phone = get_post_meta($ID, 'listing_phone_1');
        $husband_phone = get_post_meta($ID, 'listing_husband_phone');
        $wife_phone = get_post_meta($ID, 'listing_wife_phone');
        
        $other_phone = get_post_meta($ID, 'listing_other_phone');
        $email = get_post_meta($ID, 'listing_email');
        $other_email = get_post_meta($ID, 'listing_other_email');
        
        $home_add = get_post_meta($ID, 'listing_home_address');
        $home_city = get_post_meta($ID, 'listing_home_city');
        $home_country = get_post_meta($ID, 'listing_home_country');
        $home_zipcode = get_post_meta($ID, 'listing_home_zipcode');
        
        $work_add = get_post_meta($ID, 'listing_street_address');
        $work_city = get_post_meta($ID, 'listing_street_city');
        $work_country = get_post_meta($ID, 'listing_street_country');
        $work_zipcode = get_post_meta($ID, 'listing_street_zipcode');
        
        $web_url = get_post_meta($ID, 'listing_website_url');
        $skypeid = get_post_meta($ID, 'listing_skype_id');
        $otherid = get_post_meta($ID, 'listing_other_id');
        $fb = get_post_meta($ID, 'listing_facebook');
        $twitter = get_post_meta($ID, 'listing_twitter');
        $hus_bday = get_post_meta($ID, 'listing_husb_bdy');
        $wife_bday = get_post_meta($ID, 'listing_wife_bdy');
        
        $bio = get_post_meta($ID, 'listing_bio');
        
        $posttitle = get_the_title($ID);
        /* Update listing post data */
        
        $post_listing = array(
            'ID'           => $listing_id,
            'post_title'   => $posttitle,
        );
        wp_update_post( $post_listing );
        
        update_post_meta($listing_id, 'listing_firstname', $fname[0]);
        update_post_meta($listing_id, 'listing_husband_name', $husband_name[0]);
        update_post_meta($listing_id, 'listing_wife_name', $wife_name[0]);
        
        update_post_meta($listing_id, 'listing_phone_1', $phone[0]);
        update_post_meta($listing_id, 'listing_husband_phone', $husband_phone[0]);
        update_post_meta($listing_id, 'listing_wife_phone', $wife_phone[0]);
        
        
        update_post_meta($listing_id, 'listing_other_phone', $other_phone[0]);
        update_post_meta($listing_id, 'listing_email', $email[0]);
        update_post_meta($listing_id, 'listing_other_email', $other_email[0]);
        update_post_meta($listing_id, 'listing_home_address', $home_add[0]);
        update_post_meta($listing_id, 'listing_home_city', $home_city[0]);
        update_post_meta($listing_id, 'listing_home_country', $home_country[0]);
        update_post_meta($listing_id, 'listing_home_zipcode', $home_zipcode[0]);        
        
        update_post_meta($listing_id, 'listing_street_address', $work_add[0]);
        update_post_meta($listing_id, 'listing_street_city', $work_city[0]);
        update_post_meta($listing_id, 'listing_street_country', $work_country[0]);
        update_post_meta($listing_id, 'listing_street_zipcode', $work_zipcode[0]);        
        
        update_post_meta($listing_id, 'listing_website_url', $web_url[0]);
        update_post_meta($listing_id, 'listing_skype_id', $skypeid[0]);
        update_post_meta($listing_id, 'listing_other_id', $otherid[0]);
        update_post_meta($listing_id, 'listing_facebook', $fb[0]);
        update_post_meta($listing_id, 'listing_twitter', $twitter[0]);
        update_post_meta($listing_id, 'listing_husb_bdy', $hus_bday[0]);
        update_post_meta($listing_id, 'listing_wife_bdy', $wife_bday[0]);
        
        update_post_meta($listing_id, 'listing_bio', $bio[0]);


        /* Delete Post meta */
 
        delete_post_meta($ID, 'listing_firstname');
        delete_post_meta($ID, 'listing_husband_name');
        delete_post_meta($ID, 'listing_wife_name');
        
        delete_post_meta($ID, 'listing_phone_1');
        delete_post_meta($ID, 'listing_husband_phone');
        delete_post_meta($ID, 'listing_wife_phone');
        
        delete_post_meta($ID, 'listing_other_phone');
        delete_post_meta($ID, 'listing_email');
        delete_post_meta($ID, 'listing_other_email');
        delete_post_meta($ID, 'listing_home_address');
        delete_post_meta($ID, 'listing_home_city');
        delete_post_meta($ID, 'listing_home_country');
        delete_post_meta($ID, 'listing_home_zipcode');
        
        delete_post_meta($ID, 'listing_street_address');
        delete_post_meta($ID, 'listing_street_city');
        delete_post_meta($ID, 'listing_street_country');
        delete_post_meta($ID, 'listing_street_zipcode');
        
        delete_post_meta($ID, 'listing_website_url');
        delete_post_meta($ID, 'listing_skype_id');
        delete_post_meta($ID, 'listing_other_id');
        delete_post_meta($ID, 'listing_facebook');
        delete_post_meta($ID, 'listing_twitter');
        delete_post_meta($ID, 'listing_husb_bdy');
        delete_post_meta($ID, 'listing_wife_bdy');
        
        delete_post_meta($ID, 'listing_bio');

        delete_post_meta($ID, 'old_listing_firstname');
        delete_post_meta($ID, 'old_listing_husband_name');
        delete_post_meta($ID, 'old_listing_wife_name');
        
        delete_post_meta($ID, 'old_listing_phone_1');
        delete_post_meta($ID, 'old_listing_husband_phone');
        delete_post_meta($ID, 'old_listing_wife_phone');
        
        delete_post_meta($ID, 'old_listing_other_phone');
        delete_post_meta($ID, 'old_listing_email');
        delete_post_meta($ID, 'old_listing_home_address');
        delete_post_meta($ID, 'old_listing_home_city');
        delete_post_meta($ID, 'old_listing_home_country');
        delete_post_meta($ID, 'old_listing_home_zipcode');
        
        delete_post_meta($ID, 'old_listing_street_address');
        delete_post_meta($ID, 'old_listing_street_city');
        delete_post_meta($ID, 'old_listing_street_country');
        delete_post_meta($ID, 'old_listing_street_zipcode');
        
        delete_post_meta($ID, 'old_listing_website_url');
        delete_post_meta($ID, 'old_listing_skype_id');
        delete_post_meta($ID, 'old_listing_other_id');
        delete_post_meta($ID, 'old_listing_facebook');
        delete_post_meta($ID, 'old_listing_twitter');
        delete_post_meta($ID, 'old_listing_husb_bdy');
        delete_post_meta($ID, 'old_listing_wife_bdy');
        
        delete_post_meta($ID, 'old_listing_bio');
        
        wp_delete_post($ID); 
            
        return wp_redirect(admin_url("edit.php?post_type=pending_listing"));
    }
}

add_action('publish_pending_listing', 'pending_listing_publish', 10, 2);
 
function initiauto_script( $hook ) {
    wp_enqueue_script( 'myscript.js', plugin_dir_url( __FILE__ ) . 'myscript.js' );
    
    wp_enqueue_script( 'my_custom_script', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC31D3zPYDbIFYyUnmHlW7jKgvKaDJYLI0&libraries=places&callback=initAutocomplete' );
}
add_action('in_admin_footer', 'initiauto_script');
