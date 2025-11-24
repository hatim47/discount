<?php
/**
 * Main Themify class
 * @package themify
 */
class Themify {
	/** Default sidebar layout
	 * @var string */
	public $layout;
	public $post_filter=false;
	public $post_layout;
	
	public $hide_title;
	public $hide_meta;
	public $hide_date;
	public $hide_image;
	
	public $unlink_title;
	public $unlink_image;
	
	public $display_content = '';
	public $media_position='above';
	public $auto_featured_image;
	
	public $width = '';
	public $height = '';
	public $image_size='';
	public $avatar_size = 96;
	public $page_navigation;
	public $posts_per_page;
	
	public $is_shortcode = false;
	public $page_id = '';
	public $query_category = '';
	public $query_post_type = '';
	public $query_taxonomy = '';
	public $paged = '';
	public $query_all_post_types;
	
	
	private const PAGE_IMAGE_WIDTH = 978;
	// Default Single Image Size
	private const SINGLE_IMAGE_WIDTH = 978;
	private const SINGLE_IMAGE_HEIGHT = 400;
	
	// Grid4
	private const GRID4_WIDTH = 222;
	private const GRID4_HEIGHT = 140;
	
	// Grid3
	private const GRID3_WIDTH = 306;
	private const GRID3_HEIGHT = 190;
	
	// Grid2
	private const GRID2_WIDTH = 474;
	private const GRID2_HEIGHT = 270;
	
	// List Large
	private const LIST_LARGE_IMAGE_WIDTH = 716;
	private const LIST_LARGE_IMAGE_HEIGHT = 390;
	 
	// List Thumb
	private const LIST_THUMB_IMAGE_WIDTH = 160;
	private const LIST_THUMB_IMAGE_HEIGHT = 100;
	
	// List Grid2 Thumb
	private const GRID2_THUMB_WIDTH = 110;
	private const GRID2_THUMB_HEIGHT = 100;
	
	// List Post
	private const LIST_POST_WIDTH = 978;
	private const LIST_POST_HEIGHT = 400;
	
	// Sorting Parameters
	public $order = 'DESC';
	public $orderby = 'date';
	public $order_meta_key = false;
	
	public $page_title;
	public $image_page_single_width;
	public $image_page_single_height;
	public $hide_page_image;
	public $excerpt_length;
	public $isPage=false;
	public $themify_post_title_tag='';
	public $post_module_hook = null;
	public $post_module_tax = null;
	public $lightboxed_permalink = false;

	function __construct() {
		add_action('template_redirect', array($this, 'template_redirect'),5);
	}
	
	
	private function themify_set_global_options() {
		
		///////////////////////////////////////////
		//Global options setup
		///////////////////////////////////////////
	    
		$this->layout = themify_get('setting-default_layout', 'sidebar2',true);
		
		$this->post_layout = themify_get( 'setting-default_post_layout', 'list-post',true );
		
		$this->hide_title = themify_get('setting-default_post_title', '', true);
		$this->unlink_title = themify_get('setting-default_unlink_post_title', '', true);
		
		$this->hide_image = themify_get('setting-default_post_image', '', true);
		$this->unlink_image = themify_get('setting-default_unlink_post_image', '', true);
		$this->auto_featured_image = themify_check('setting-auto_featured_image', '', true);
		
		$this->hide_meta = themify_get('setting-default_post_meta', '', true);
		$this->hide_date = themify_get('setting-default_post_date', '', true);

		$this->order = themify_get('setting-index_order', $this->order, true);
		$this->orderby = themify_get('setting-index_orderby', $this->orderby, true);

		if ($this->orderby === 'meta_value' || $this->orderby === 'meta_value_num') {
		    $this->order_meta_key = themify_get('setting-index_meta_key', '', true);
		}

		$this->width = themify_get('setting-image_post_width', '', true);
		$this->height = themify_get('setting-image_post_height', '', true);
		
		$this->display_content = themify_get('setting-default_layout_display', '', true);
		$this->excerpt_length = themify_get( 'setting-default_excerpt_length' , '', true);
		$this->avatar_size = apply_filters('themify_author_box_avatar_size', $this->avatar_size);
		$this->posts_per_page = get_option('posts_per_page');
	}

	function template_redirect() {
		$this->themify_set_global_options();
		if( is_singular() ) {
			$this->display_content = 'content';
		}
		
		
		if (is_page() || themify_is_shop()) {
			if (post_password_required()) {
			    return;
			}
			$this->page_id = get_the_ID();
			$this->paged=get_query_var( 'paged' ) ;
			if(empty($this->paged)){
			    $this->paged=get_query_var( 'page',1 );
			}
			global $paged;
			$paged = $this->paged;
			
			$this->layout = themify_get_both('page_layout', 'setting-default_page_layout', 'sidebar2');
			$this->hide_page_image = themify_get('setting-hide_page_image', false, true) === 'yes' ? 'yes' : 'no';
			$this->image_page_single_width = themify_get('setting-page_featured_image_width', self::PAGE_IMAGE_WIDTH, true);
			$this->image_page_single_height = themify_get('setting-page_featured_image_height', 0, true);
			$this->page_title = themify_get_both('hide_page_title', 'setting-hide_page_title', 'no');
			if(!themify_is_shop()){
			    $this->query_category = themify_get('query_category','');
			    if($this->query_category!==''){
				$this->query_taxonomy = 'category';
				$this->query_post_type = 'post';
				$this->post_layout = themify_get( 'layout','list-post');
				$this->hide_title = themify_get('hide_title',$this->hide_title); 
				$this->unlink_title = themify_get('unlink_title',$this->unlink_title); 
				$this->hide_image = themify_get('hide_image',$this->hide_image); 
				$this->unlink_image = themify_get('unlink_image',$this->unlink_image); 
				$this->hide_meta = themify_get('hide_meta',$this->hide_meta); 
				$this->hide_date = themify_get('hide_date',$this->hide_date); 
				$this->display_content = themify_get( 'display_content','excerpt');
				$this->width = themify_get('image_width',$this->width); 
				$this->height = themify_get('image_height',$this->height ); 
				$this->page_navigation = themify_get('hide_navigation',$this->page_navigation); 
				$this->posts_per_page = themify_get('posts_per_page',$this->posts_per_page);
				$this->order = themify_get( 'order','desc');
				$this->orderby = themify_get( 'orderby', 'date');
				if ($this->orderby === 'meta_value' || $this->orderby === 'meta_value_num') {
				    $this->order_meta_key = themify_get( 'meta_key', $this->order_meta_key );
				}
			    }
			}
			
		}
		elseif( is_single() ) {
			$this->layout = themify_get_both('layout','setting-default_page_post_layout','sidebar2');
			$this->hide_title = themify_get_both('hide_post_title','setting-default_page_post_title');
			$this->unlink_title = themify_get_both('unlink_post_title','setting-default_page_unlink_post_title');
			$this->hide_date = themify_get_both('hide_post_date','setting-default_page_post_date');
			$this->hide_meta = themify_get_both('hide_post_meta','setting-default_page_post_meta');
			$this->hide_image = themify_get_both('hide_post_image','setting-default_page_post_image');
			$this->unlink_image = themify_get_both('unlink_post_image','setting-default_page_unlink_post_image');
                        $this->width = themify_get_both('image_width','setting-image_post_single_width','');
                        $this->height = themify_get_both('image_height','setting-image_post_single_height','');
			$this->display_content = '';
		}
		elseif ( is_archive() ) {
			$excluded_types = apply_filters( 'themify_exclude_CPT_for_sidebar', array('post', 'page', 'attachment', 'tbuilder_layout', 'tbuilder_layout_part', 'section'));
            $postType = get_post_type();
			if ( !in_array($postType, $excluded_types,true) ) {
			    $this->layout = themify_get( 'setting-custom_post_'. $postType .'_archive',$this->layout ,true );
			}
		}

		if($this->width==='' && $this->height===''){
		    if(is_single()){
			$this->width =self::SINGLE_IMAGE_WIDTH;
			$this->height = self::SINGLE_IMAGE_HEIGHT;
		    }
		    else{
			switch ($this->post_layout){
			    case 'grid4':
				$this->width = self::GRID4_WIDTH;
				$this->height = self::GRID4_HEIGHT;
			    break;
			    case 'grid3':
				$this->width = self::GRID3_WIDTH;
				$this->height = self::GRID3_HEIGHT;
			    break;
			    case 'grid2':
				$this->width = self::GRID2_WIDTH;
				$this->height = self::GRID2_HEIGHT;
			    break;
			    case 'list-large-image':
				$this->width = self::LIST_LARGE_IMAGE_WIDTH;
				$this->height = self::LIST_LARGE_IMAGE_HEIGHT;
			    break;
			    case 'list-thumb-image':
				$this->width = self::LIST_THUMB_IMAGE_WIDTH;
				$this->height = self::LIST_THUMB_IMAGE_HEIGHT;
			    break;
			    case 'grid2-thumb':
				$this->width = self::GRID2_THUMB_WIDTH;
				$this->height = self::GRID2_THUMB_HEIGHT;
			    break;
			    default :
				$this->width = self::LIST_POST_WIDTH;
				$this->height = self::LIST_POST_HEIGHT;
			    break;
			}
		    }
		}
		
		
	}
	
	/**
	 * Returns post category IDs concatenated in a string
	 * @param number Post ID
	 * @return string Category IDs
	 */
	public function get_categories_as_classes($post_id){
		$categories = wp_get_post_categories($post_id);
		$class = '';
		foreach($categories as $cat)
			$class .= ' cat-'.$cat;
		return $class;
	}
	 	 
	 /**
	  * Returns category description
	  * @return string
	  */
	 function get_category_description(){
	 	$category_description = category_description();
		if ( !empty( $category_description ) ){
			return '<div class="category-description">' . $category_description . '</div>';
		}
	 }
	 
	 
}
global $themify;
$themify = new Themify();