<?php
if( function_exists('register_nav_menus') ){   
    register_nav_menus(   
        array(   
            'head_nav1' => '头部导航第一行',
			'head_nav2' => '头部导航第二行',
			'case_nav' => '案例左侧菜单',
			'product_nav' => '产品左侧菜单',
	
        )   
    );   
}
add_theme_support( 'post-thumbnails' );//让主题支持特色图
//输出图片，特色图/文章第一章图/自定义图
function get_post_img($p_id) {    
    $thumb_img = '';   
       if(has_post_thumbnail($p_id)){
	  
	   $thumb_img=wp_get_attachment_image_src(get_post_thumbnail_id($p_id),"full");
	 
	   return $thumb_img[0]; 
	   		}else {
     			  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post($p_id)->post_content, $matches);
       			  $thumb_img = $matches[1][0];
				 
       				if(empty($matches[1][0])){  
        				$thumb_img = get_bloginfo('template_url') ."/images/img.jpg";  		
   								 }
								
       return $thumb_img; 	   
				}  
			}

//输出图片，输出5张图


//通过分类名获取该分类和子类所有id，注意返回值包括自己的id
function get_all_child_cat_id_by_slug($slug){
$cat_id=get_category_by_slug($slug)->cat_ID;//通过slug 获取该分类的id
$str_children=get_category_children($cat_id);//获取父分类子类id，返回值是字符串，类型为"1/2/3"
$array_children_id=explode('/',$str_children);
$array_children_id[0]=$cat_id;
return $array_children_id;
}



//分页导航3
function wp_pagenavi($range = 5){
    global $paged, $wp_query;
	$total= $wp_query->max_num_pages;
	echo '<a>Total '.$total.'</a>';
    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
		//echo '<a>'.$max_page.'页</a>';
    }
    if($max_page > 1){
        if(!$paged){
            $paged = 1;
        }
        if($paged != 1){
		
            echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='go to first'>First</a>";
        }
		
        previous_posts_link('Prev');
        if($max_page > $range){
            if($paged < $range){
                for($i = 1; $i <= ($range + 1); $i++){
                    if($i==$paged) echo "<a class='current'>$i</a>";
                    else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
                }
            } 
            elseif($paged >= ($max_page - ceil(($range/2)))){
                for($i = $max_page - $range; $i <= $max_page; $i++){
                    if($i==$paged) echo "<a class='current'>$i</a>";
                    else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
                }
            }
            elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
                for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
                    if($i==$paged) echo "<a class='current'>$i</a>";
                    else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
                }
            }
        }
        else{
            for($i = 1; $i <= $max_page; $i++){
                if($i==$paged) echo "<a class='current'>$i</a>";
                else echo "<a href='" . get_pagenum_link($i) ."'>$i</a>";
            }
        }
        next_posts_link('Next');
        if($paged != $max_page){
            echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='go to End'>End</a>";
        }
    }
}


//注册侧边栏   
    if ( function_exists('register_sidebar') ) {   
      register_sidebar(array(   
        'name'=>'侧边栏',  
		"id"=>"sidebar1",//多个侧边栏的时候，用这个id控制哪个地方显示
        'before_widget' => '<div class="about_left fl">',   
        'after_widget' => '</div>',   
        'before_title' => '<h2>',   
        'after_title' => '</h2>',   
      ));   
     }  
//截取标题
function customTitle($limit,$id) {
    $title = get_the_title($id);
    if(strlen($title) > $limit) {
        $title = mb_strcut($title, 0, $limit) . '...';
    }
 
    return $title;
}





include("option/option.php");
include("initialize.php");





//获取子类
//获取父分类id
function get_parent_ID($id){
$thisCat = get_category($id,false);
return $thisCat->parent;
}

//检测是否有子类,有返回true ，没有返回false
function have_child($id){
$s_child=get_category_children($id);
	if($s_child){
		return true;
	}else{
		return  false;
		}
}

//获取第一级子类id。返回值为数组，数组第一个值为父id.如果没有子类则只有自己id
function get_first_child_id($id){
$array_cat[0]=$id;
$s_child=get_category_children($id);
	if($s_child){
		$array_child_id=explode('/',$s_child);
		array_shift($array_child_id);//将数组第一个删除，因为get_category_children返回结果格式是“/1/2/3”
			foreach($array_child_id as $child_id){
				if(get_parent_ID($child_id)==$id){
					array_push($array_cat,$child_id);
					}
			}
	}
return $array_cat;
}

//获取第二级子类id。返回值为数组。
function get_second_child_id($id){
$array_cat[0]=$id;
$first_child_id_arr=get_first_child_id($id);
//print_r($first_child_id_arr);
if(count($first_child_id_arr)<2){
	return $array_cat;
		}else{
			for($i=1;$i<count($first_child_id_arr);$i++){
			if(have_child($first_child_id_arr[$i])){
				$second_child_id_arr=get_first_child_id($first_child_id_arr[$i]);
				array_push($array_cat,$second_child_id_arr);
				}else{
				array_push($array_cat,$first_child_id_arr[$i]);
				}

			}//foreach
			return $array_cat;
		}
}
//获取顶级分类
function get_category_root_id($cat)
	{
		$this_category = get_category($cat);   // 取得当前分类
		while($this_category->category_parent){// 若当前分类有上级分类时,循环
		$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类(往上爬)
		}
	return$this_category->term_id; // 返回根分类的id号
}


//获取顶级分类(自定义分类法)

function get_taxonomy_root_id($tax)
	{
		$this_taxonomy =get_term_by('id',$tax,'cn');   // 取得当前分类
		while($this_taxonomy->parent){// 若当前分类有上级分类时,循环
		$this_taxonomy = get_term_by('id',$this_taxonomy->parent,'cn'); // 将当前分类设为上级分类(往上爬)
		}
	return $this_taxonomy->term_id; // 返回根分类的id号
}

//面包屑导航(自定义分类)
function term_crumbnav(){
$crumbnav='当前位置: '.'<a href="'.get_bloginfo('url').'">首页</a> >> ' ;

if(is_tax()){
$url='<a href="'.get_term_link(get_queried_object_id(),"cn").'">'.get_term(get_queried_object_id(), 'cn')->name.'</a>';
echo $crumbnav.$url;
}elseif(is_single()){
$url='<a href="'.get_term_link(current(get_the_terms($post->ID,'cn'))->term_id,"cn").'">'.current(get_the_terms($post->ID,'cn'))->name.'</a> >> '.get_the_title($ID);
echo $crumbnav.$url;
}else{

echo $crumbnav.get_the_title($ID);
}

}

//面包屑导航 英文
function post_crumbnav(){
$crumbnav='<a href="'.get_bloginfo('url').'">Home</a> >> ' ;
if(is_category()){
$cat=get_query_var('cat');//h获取分类id
$this_crumbanv_url='<a href="'.get_category_link($cat).'">'.get_cat_name($cat).'</a>';
$this_cat = get_category($cat);
	while($this_cat->category_parent){
		$part_nav='<a href="'.get_category_link($this_cat->category_parent).'">'.get_cat_name($this_cat->category_parent).'</a>';
		$this_crumbanv_url=$part_nav.' << '.$this_crumbanv_url;
		$this_cat=get_category($this_cat->category_parent);
			}//递归结束
echo $crumbnav.$this_crumbanv_url;

}elseif(is_single()){
$cat=current(get_the_category(get_queried_object_id()))->term_id;

$this_crumbanv_url='<a href="'.get_category_link($cat).'">'.get_cat_name($cat).'</a>';
$this_cat = get_category($cat);
	while($this_cat->category_parent){
		$part_nav='<a href="'.get_category_link($this_cat->category_parent).'">'.get_cat_name($this_cat->category_parent).'</a>';
		$this_crumbanv_url=$part_nav.' << '.$this_crumbanv_url;
		$this_cat=get_category($this_cat->category_parent);
			}//递归结束
echo $crumbnav.$this_crumbanv_url." << ".get_the_title($ID);

}else{
echo $crumbnav.get_the_title($ID);
}

}

function modify_post_mime_types( $post_mime_types ) {   
// 选择mime类型，这里用: 'application/pdf'   
 // 然后扩充数组，定义label的文字   
    $post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ),   
    _n_noop( 'PDF <span class="count">(%s)</span>', 'PDF <span class="count">(%s)</span>' ) );   
    // then we return the $post_mime_types variable   
    return $post_mime_types;   
    }   

    // Add Filter Hook   
    add_filter( 'post_mime_types', 'modify_post_mime_types' );   
//重写url

    add_action('generate_rewrite_rules', 'rewrite_rules' );   
    function rewrite_rules( $wp_rewrite ){   
        $new_rules = array(   
            'cn/[A-Za-z0-9-+]+/([0-9]+)?.html$' => 'index.php?post_type=chinese&p=$matches[1]',   
            'top'   
        );   
        $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;   
    }  
    add_filter('post_type_link', 'chinese_link', 1, 3); //过滤器post_type_link即输出链接的时候用   
    function chinese_link( $link, $post = 0 ){   
        if ( $post->post_type == 'chinese' ){ //判断如果chinese类型的文章  
		if(get_the_terms($post->ID,'cn')){
			$tax_c=current(get_the_terms($post->ID,'cn'))->slug;
			}else{
				$tax_c="cn";
				}
		
            return get_bloginfo("url").'/cn/'.$tax_c.'/'.$post->ID .'.html'; //返回一个正确的链接   
        } else {   
            return $link;   
        }   
    }

/**
 * 自定义 WordPress 后台底部的版权和版本信息
 * http://www.wpdaxue.com/change-admin-footer-text.html
 */
add_filter('admin_footer_text', 'left_admin_footer_text'); 
function left_admin_footer_text($text) {
	// 左边信息
	$text = '<span id="footer-thankyou">感谢使用<a href="http://www.feijiutian.com/">飞九天建站系统</a></span>'; 
	return $text;
}
add_filter('update_footer', 'right_admin_footer_text', 11); 
function right_admin_footer_text($text) {
	// 右边信息
	$text = "v.10版本";
	return $text;
}
//去掉帮助选项
add_filter( 'contextual_help', 'wpse50723_remove_help', 999, 3 );
function wpse50723_remove_help($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}
//使用多说Gravatar镜像服务器加载Gravatar头像
    function mytheme_get_avatar( $avatar ) {
    $avatar = preg_replace( "/http:\/\/(www|\d).gravatar.com/","http://www.baidu.com",$avatar );
    return $avatar;
    }
    add_filter( 'get_avatar', 'mytheme_get_avatar' );
//渠道图片添加到文章带链接
function Bing_imagelink_setup(){
$id = 'image_default_link_type';
if( get_option( $id ) !== 'none' ) update_option( $id, 'none' );
}
add_action( 'admin_init', 'Bing_imagelink_setup' );

function emtx_excerpt_length( $length ) {
	return 10; //把92改为你需要的字数，具体就看你的模板怎么显示了。
}
add_filter( 'excerpt_length', 'emtx_excerpt_length' );
?>