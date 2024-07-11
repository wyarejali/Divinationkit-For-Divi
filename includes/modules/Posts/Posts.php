<?php

class DINA_Posts extends DINA_Builder_Module_Type_PostBased {

    protected $module_credits = array(
        'module_uri' => DINA_DIVINATIONKIT_WEBSITE . 'modules/Posts/',
        'author'     => DINA_DIVINATIONKIT_AUTHOR,
        'author_uri' => DINA_DIVINATIONKIT_WEBSITE,
    );

    public function init() {

        $this->name        = esc_html__( 'Posts', 'divinationkit-for-divi' );
        $this->icon_path   = $this->dina_module_icon('posts');
        $this->slug        = 'dina_posts';
        $this->vb_support  = 'on';
        $this->folder_name = 'Divi Nation Kit';

        $this->settings_modal_toggles = array(
            'general'                       => array(
                'toggles'                   => array(
                    'content'               => esc_html__( 'Content', 'divinationkit-for-divi' ),
                    'elements'               => esc_html__( 'Elements', 'divinationkit-for-divi' ),
                ),
            ),
            'advanced'                      => array(
                'toggles'                   => array(
                    'layout'                => esc_html__( 'Layout', 'divinationkit-for-divi' ),
                    'image'                 => esc_html__( 'Price Image', 'divinationkit-for-divi' ),
                    'item'                  => esc_html__( 'Post Item', 'divinationkit-for-divi' ),
                    'content'               => array(
                        'title'             => esc_html__( 'Post Texts', 'divinationkit-for-divi' ),
                        'tabbed_subtoggles' => true,
                        'sub_toggles'       => array(
                            'title'         => array(
                                'name'      => esc_html__( 'Title', 'divinationkit-for-divi' ),
                            ),
                            'description'   => array(
                                'name'      => esc_html__( 'Description', 'divinationkit-for-divi' ),
                            ),
                            'meta'         => array(
                                'name'      => esc_html__( 'Meta', 'divinationkit-for-divi' ),
                            ),
                        )
                    ),
                ),
            ),
        );
    }

    public function get_fields() {

        $content = array(
            'post_type'                     => array(
				'label'            => esc_html__( 'Post Type', 'divinationkit-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => et_get_registered_post_type_options( false, false ),
				'description'      => esc_html__( 'Choose posts of which post type you would like to display.', 'divinationkit-for-divi' ),
				'computed_affects' => array(
					'__posts',
				),
				'toggle_slug' => 'content',
				'default'     => 'post',
			),
			'posts_number'                  => array(
				'label'            => esc_html__( 'Post Count', 'divinationkit-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'description'      => esc_html__( 'Choose how much posts you would like to display per page.', 'divinationkit-for-divi' ),
				'computed_affects' => array(
					'__posts',
				),
				'toggle_slug' => 'content',
				'default'     => 10,
			),
			'include_categories'            => array(
				'label'           => esc_html__( 'Included Categories', 'divinationkit-for-divi' ),
				'type'            => 'categories',
				'meta_categories' => array(
					'all'     => esc_html__( 'All Categories', 'divinationkit-for-divi' ),
					'current' => esc_html__( 'Current Category', 'divinationkit-for-divi' ),
				),
				'option_category'  => 'basic_option',
				'renderer_options' => array(
					'use_terms' => false,
				),
				'description'      => esc_html__( 'Choose which categories you would like to include in the feed.', 'divinationkit-for-divi' ),
				'toggle_slug'      => 'content',
				'computed_affects' => array(
					'__posts',
				),
				'show_if'          => array(
					'post_type'        => 'post',
				),
			),
            'order_by'              => array(
				'label'            => esc_html__( 'Order By', 'divinationkit-for-divi' ),
				'description'      => esc_html__( 'Choose how your posts should be ordered.', 'divinationkit-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'content',
				'default'          => 'date',
				'options'          => array(
					'date'  => esc_html__( 'Date', 'divinationkit-for-divi' ),
					'title' => esc_html__( 'Title', 'divinationkit-for-divi' ),
				),

				'default_on_front' => 'date',
				'computed_affects' => array( '__posts' ),
			),

			'order'                 => array(
				'label'            => esc_html__( 'Sorted By', 'divinationkit-for-divi' ),
				'description'      => esc_html__( 'Choose how your posts should be sorted.', 'divinationkit-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'toggle_slug'      => 'content',
				'default'          => 'ASC',
				'options'          => array(
					'ASC'  => esc_html__( 'Ascending', 'divinationkit-for-divi' ),
					'DESC' => esc_html__( 'Descending', 'divinationkit-for-divi' ),
				),

				'default_on_front' => 'ASC',
				'computed_affects' => array( '__posts' ),
			),
			'date_format'                     => array(
				'label'            => esc_html__( 'Date Format', 'divinationkit-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'description'      => esc_html__( 'If you would like to adjust the date format, input the appropriate PHP date format here.', 'divinationkit-for-divi' ),
				'toggle_slug'      => 'content',
				'computed_affects' => array(
					'__posts',
				),
				'default' => 'M j, Y',
			),

            'show_content'                  => array(
				'label'            => esc_html__( 'Content Length', 'divinationkit-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'Show Excerpt', 'divinationkit-for-divi' ),
					'on'  => esc_html__( 'Show Content', 'divinationkit-for-divi' ),
				),
				'affects'          => array(
					'show_more',
					'show_excerpt',
					'use_manual_excerpt',
					'excerpt_length',
				),
				'description'      => esc_html__( 'Showing the full content will not truncate your posts on the index page. Showing the excerpt will only display your excerpt text.', 'divinationkit-for-divi' ),
				'toggle_slug'      => 'content',
				'computed_affects' => array(
					'__posts',
				),
				'default_on_front' => 'off',
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'use_manual_excerpt'            => array(
				'label'            => esc_html__( 'Use Post Excerpts', 'divinationkit-for-divi' ),
				'description'      => esc_html__( 'Disable this option if you want to ignore manually defined excerpts and always generate it automatically.', 'divinationkit-for-divi' ),
				'type'             => 'yes_no_button',
				'options'          => array(
					'on'  => et_builder_i18n( 'Yes' ),
					'off' => et_builder_i18n( 'No' ),
				),
				'default'          => 'on',
				'computed_affects' => array(
					'__posts',
				),
				'depends_show_if'  => 'off',
				'toggle_slug'      => 'content',
				'option_category'  => 'configuration',
			),
			'excerpt_length'                => array(
				'label'            => esc_html__( 'Excerpt Length', 'divinationkit-for-divi' ),
				'description'      => esc_html__( 'Define the length of automatically generated excerpts. Leave blank for default ( 270 ) ', 'divinationkit-for-divi' ),
				'type'             => 'text',
				'default'          => '270',
				'computed_affects' => array(
					'__posts',
				),
				'depends_show_if'  => 'off',
				'toggle_slug'      => 'content',
				'option_category'  => 'configuration',
			),
			'show_more'                     => array(
				'label'            => esc_html__( 'Show Read More Button', 'divinationkit-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => et_builder_i18n( 'No' ),
					'on'  => et_builder_i18n( 'Yes' ),
				),
				'depends_show_if'  => 'off',
				'description'      => esc_html__( 'Here you can define whether to show "read more" link after the excerpts or not.', 'divinationkit-for-divi' ),
				'computed_affects' => array(
					'__posts',
				),
				'toggle_slug'      => 'elements',
				'default_on_front' => 'off',
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
        );

        $elements = array(
            'show_thumbnail'                => array(
				'label'            => esc_html__( 'Show Featured Image', 'divinationkit-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => et_builder_i18n( 'Yes' ),
					'off' => et_builder_i18n( 'No' ),
				),
				'description'      => esc_html__( 'This will turn thumbnails on and off.', 'divinationkit-for-divi' ),
				'computed_affects' => array(
					'__posts',
				),
				'toggle_slug'      => 'elements',
				'default_on_front' => 'on',
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
            'show_author'                   => array(
				'label'            => esc_html__( 'Show Author', 'divinationkit-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => et_builder_i18n( 'Yes' ),
					'off' => et_builder_i18n( 'No' ),
				),
				'description'      => esc_html__( 'Turn on or off the author link.', 'divinationkit-for-divi' ),
				'computed_affects' => array(
					'__posts',
				),
				'toggle_slug'      => 'elements',
				'default_on_front' => 'on',
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'show_date'                     => array(
				'label'            => esc_html__( 'Show Date', 'divinationkit-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => et_builder_i18n( 'Yes' ),
					'off' => et_builder_i18n( 'No' ),
				),
				'description'      => esc_html__( 'Turn the date on or off.', 'divinationkit-for-divi' ),
				'computed_affects' => array(
					'__posts',
				),
				'toggle_slug'      => 'elements',
				'default_on_front' => 'on',
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'show_categories'               => array(
				'label'            => esc_html__( 'Show Categories', 'divinationkit-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => et_builder_i18n( 'Yes' ),
					'off' => et_builder_i18n( 'No' ),
				),
				'description'      => esc_html__( 'Turn the category links on or off.', 'divinationkit-for-divi' ),
				'computed_affects' => array(
					'__posts',
				),
				'toggle_slug'      => 'elements',
				'default_on_front' => 'on',
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'show_comments'                 => array(
				'label'            => esc_html__( 'Show Comment Count', 'divinationkit-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => et_builder_i18n( 'Yes' ),
					'off' => et_builder_i18n( 'No' ),
				),
				'description'      => esc_html__( 'Turn comment count on and off.', 'divinationkit-for-divi' ),
				'computed_affects' => array(
					'__posts',
				),
				'toggle_slug'      => 'elements',
				'default_on_front' => 'off',
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'show_excerpt'                  => array(
				'label'            => esc_html__( 'Show Excerpt', 'divinationkit-for-divi' ),
				'description'      => esc_html__( 'Turn excerpt on and off.', 'divinationkit-for-divi' ),
				'type'             => 'yes_no_button',
				'options'          => array(
					'on'  => et_builder_i18n( 'Yes' ),
					'off' => et_builder_i18n( 'No' ),
				),
				'default_on_front' => 'on',
				'computed_affects' => array(
					'__posts',
				),
				'depends_show_if'  => 'off',
				'toggle_slug'      => 'elements',
				'option_category'  => 'configuration',
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'show_pagination'               => array(
				'label'            => esc_html__( 'Show Pagination', 'divinationkit-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => et_builder_i18n( 'Yes' ),
					'off' => et_builder_i18n( 'No' ),
				),
				'description'      => esc_html__( 'Turn pagination on and off.', 'divinationkit-for-divi' ),
				'computed_affects' => array(
					'__posts',
				),
				'toggle_slug'      => 'elements',
				'default_on_front' => 'on',
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'offset_number'                 => array(
				'label'            => esc_html__( 'Post Offset Number', 'divinationkit-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'configuration',
				'description'      => esc_html__( 'Choose how many posts you would like to skip. These posts will not be shown in the feed.', 'divinationkit-for-divi' ),
				'toggle_slug'      => 'content',
				'computed_affects' => array(
					'__posts',
				),
				'default'          => 0,
			),
        );

        $posts = array(
            '__posts'                       => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'ET_Builder_Module_Blog', 'get_blog_posts' ),
				'computed_depends_on' => array(
					'post_type',
					'posts_number',
					'include_categories',
                    'order_by',
                    'order',
					'date_format',
					'show_thumbnail',
					'show_content',
					'show_more',
					'show_author',
					'show_date',
					'show_categories',
					'show_comments',
					'show_excerpt',
					'use_manual_excerpt',
					'excerpt_length',
					'show_pagination',
					'offset_number',
					'header_level',
				),
			),
        );

        return array_merge($content, $elements, $posts);
    }

    static function get_post( $args = array(), $conditional_tags = array(), $current_page = array() ) {

        $defaults = array(
			'post_type'                     => '',
			'posts_number'                  => '',
			'include_categories'            => '',
			'show_thumbnail'                => '',
			'show_content'                  => '',
			'show_author'                   => '',
			'show_date'                     => '',
			'date_format'                   => '',
			'show_categories'               => '',
			'show_comments'                 => '',
			'show_excerpt'                  => '',
			'use_manual_excerpt'            => '',
			'excerpt_length'                => '',
			'show_pagination'               => '',
			'background_layout'             => '',
			'show_more'                     => '',
			'header_level'                  => 'h2',
		);

        $args = wp_parse_args( $args, $defaults );

        $post_type = $args[ 'post_type' ];
        $categories = $args[ 'include_categories' ];
        $post_per_page = $args[ 'posts_number' ];
        $order_by = $args[ 'order_by'];
        $order = $args[ 'order'];
        $offset = $args[ 'offset_number' ];


        $query_args = array(
            'post_per_page'     => intval($post_per_page),
            'post_type'         => $post_type,
            'post_status'       => 'publish',
            'order_by'          => $order_by,
            'order'             => $order,
            'offset'            => intval( $offset ),
        );

        $post_id = isset( $current_page[ 'id' ]) ? (int) $current_page[ 'id' ] : 0;

        if( $post_type === 'post' ) {
            $query_args['cat'] = implode( ',', self::filter_include_categories($categories, $post_id));
        }

        $query = new WP_Query( $query_args);

        ob_start();

        if( $query->have_posts() ) : 
            while ( $query->have_posts() ) : 
                $query->the_post();
                include 'templates/dina-post.php';
            endwhile;
        endif;

        $output = ob_get_clean();

        if( !$output ) {
            $output = self::get_no_results_template();
        }

        return $output;
    }

    public function render( $attrs, $content, $render_slug ) {

        $post_query_var = array(
            'post_type'                     => $this->props[ 'post_type' ],
			'posts_number'                  => $this->props[ 'posts_number' ],
			'include_categories'            => $this->props[ 'include_categories' ],
			'show_thumbnail'                => $this->props[ 'show_thumbnail' ],
			'order_by'                      => $this->props[ 'order_by' ],
			'order'                         => $this->props[ 'order' ],
			'offset_number'                 => $this->props[ 'offset_number' ],
			'show_content'                  => $this->props[ 'show_content' ],
			'show_author'                   => $this->props[ 'show_author' ],
			'show_date'                     => $this->props[ 'show_date' ],
			'date_format'                   => $this->props[ 'date_format' ],
			'show_categories'               => $this->props[ 'show_categories' ],
			'show_comments'                 => $this->props[ 'show_comments' ],
			'show_excerpt'                  => $this->props[ 'show_excerpt' ],
			'use_manual_excerpt'            => $this->props[ 'use_manual_excerpt' ],
			'excerpt_length'                => $this->props[ 'excerpt_length' ],
			'show_pagination'               => $this->props[ 'show_pagination' ],
			'show_more'                     => $this->props[ 'show_more' ],
        );

        return sprintf(
            '<div class="dina_posts-container">
                <ul>
                    %1$s
                </ul>
            </div>',
            self::get_post( $post_query_var )
        );
    }
}

new DINA_Posts();