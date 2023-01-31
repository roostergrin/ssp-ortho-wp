<?
class Events {
    public
        $is_rebuilding = false,
        $events = null,
        $domain = 'Event',

        $___ ## DUMMY ##
    ;

    public function __construct()  {
		$this->registerPreviewButtonHook();
		$this->registerPostTypes();
		$this->registerACF();
		$this->registerActions();
		$this->registerSaveHook();
	}

    private function registerPreviewButtonHook() {
		add_action('admin_head-post-new.php', [$this, 'hidePreviewButton']);
		add_action('admin_head-post.php', [$this, 'hidePreviewButton']);
	}

    public function hidePreviewButton() {
		global $post_type;

		foreach(['event'] as $pt) {
			if($post_type == $pt) {
				echo '<style type="text/css">body.wp-admin.post-type-'.$pt.' .preview.button { display:none; }</style>';
			}
		}
	}

    private function registerPostTypes() {
		add_action('init', function() {
			register_post_type('event', array(
				'labels' => array(
					'name' => _x('Events', $this->domain),
					'singular_name' => _x('Event', $this->domain),
					'add_new' => _x('Add New Event', $this->domain),
					'add_new_item' => _x('Add New Event', $this->domain),
					'edit_item' => _x('Edit Event', $this->domain),
					'new_item' => _x('Add a Event', $this->domain),
					'view_item' => _x('View Event', $this->domain),
					'search_items' => _x('Search Event', $this->domain),
					'not_found' => _x('No events found', $this->domain),
					'not_found_in_trash' => _x('No events found in trash', $this->domain),
					'parent_item_colon' => _x('Parent Event:', $this->domain),
					'menu_name' => _x('Events', $this->domain),
				),
				'hierarchical' => false,
				'supports' => ['title', 'revisions'],
				'taxonomies' => [],
				'public' => false,
				'show_ui' => true,
				'show_in_menu' => true,
				// 'menu_position' => 5,
				'menu_icon' => 'dashicons-calendar-alt',
				'show_in_nav_menus' => false,
				'publicly_queryable' => false,
				'exclude_from_search' => false,
				'has_archive' => false,
				'query_var' => true,
				'can_export' => true,
				'capability_type' => 'post',
			));
		});
	}

    private function registerACF() {
		////////////////////////////// POST TYPE FIELDS //////////////////////////////
		$menu_order = 0;

		if(function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group([
                'key' => 'event_settings',
                'title' => 'Event Settings',
                'fields' => [
					[
						'key' => 'relationship_tab_location',
						'name' => 'relationship_tab_location',
						'label' => 'Relationship’s',
						'type' => 'tab',
					],
					[
						'key' => 'event_brand_relationship',
						'name' => 'event_brand_relationship',
						'label' => 'Brand Relationship',
						'type' => 'relationship',
						'required' => 1,
						'conditional_logic' => 0,
						'post_type' => [
							0 => 'brand',
						],
						'filters' => [],
						'elements' => [],
						'return_format' => 'object',
					],
					[
						'key' => 'event_region_relationship',
						'name' => 'event_region_relationship',
						'label' => 'Regions Relationship',
						'type' => 'relationship',
						'required' => 1,
						'conditional_logic' => 0,
						'post_type' => [
							0 => 'region',
						],
						'filters' => [],
						'elements' => [],
						'return_format' => 'object',
					],

					[
						'key' => 'event_forms_tab_location',
						'name' => 'event_forms_tab_location',
						'label' => 'Event Forms',
						'type' => 'tab',
					],
					[
						'key' => 'event_form_to_emails',
						'name' => 'event_form_to_emails',
						'label' => 'Event form TO: Emails',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'collapsed' => '',
						'min' => '',
						'max' => '',
						'layout' => 'row',
						'button_label' => 'Add email',
						'sub_fields' => [
							[
								'key' => 'email',
								'name' => 'email',
								'label' => 'Email',
								'type' => 'text',
							],
						],
					],
					[
						'key' => 'event_form_cc_emails',
						'name' => 'event_form_cc_emails',
						'label' => 'Event form CC: Emails',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'collapsed' => '',
						'min' => '',
						'max' => '',
						'layout' => 'row',
						'button_label' => 'Add email',
						'sub_fields' => [
							[
								'key' => 'email',
								'name' => 'email',
								'label' => 'Email',
								'type' => 'text',
							],
						],
					],
					[
						'key' => 'event_form_bcc_emails',
						'name' => 'event_form_bcc_emails',
						'label' => 'Event form BCC: Emails',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'collapsed' => '',
						'min' => '',
						'max' => '',
						'layout' => 'row',
						'button_label' => 'Add email',
						'sub_fields' => [
							[
								'key' => 'email',
								'name' => 'email',
								'label' => 'Email',
								'type' => 'text',
							],
						],
					],

					[
						'key' => 'event_details_tab_location',
						'name' => 'event_details_tab_location',
						'label' => 'Event Details',
						'type' => 'tab',
					],
					[
						'key' => 'event_date',
						'name' => 'event_date',
						'label' => 'Event Date',
						'type' => 'date_picker',
						'instructions' => '',
						'required' => false,
						'wrapper' => [
							'width' => 33,
						],
						'display_format' => 'F j, Y',
						'return_format' => 'F j, Y',
					],
					[
						'key' => 'event_hours_start',
						'name' => 'event_hours_start',
						'label' => 'Event Start',
						'type' => 'time_picker',
						'instructions' => '',
						'required' => false,
						'wrapper' => [
							'width' => 33,
						],
						'display_format' => 'g:i a',
						'return_format' => 'HA',
					],
					[
						'key' => 'event_hours_end',
						'name' => 'event_hours_end',
						'label' => 'Event End',
						'type' => 'time_picker',
						'instructions' => '',
						'required' => false,
						'wrapper' => [
							'width' => 33,
						],
						'display_format' => 'g:i a',
						'return_format' => 'hA',
					],
					[
						'key' => 'event_is_scholarship',
						'name' => 'event_is_scholarship',
						'label' => 'Is Scholarship Event',
						'type' => 'true_false',
						'instructions' => '',
						'required' => false,
						'default_value' => 0,
						'ui' => 1,
						'ui_on_text' => 'Yes',
						'ui_off_text' => 'No',
						'wrapper' => [
							'width' => 20,
						],
					],
					[
						'key' => 'event_scholarship_learn_more',
						'name' => 'event_scholarship_learn_more',
						'label' => 'Scholarship Link',
						'type' => 'text',
						'wrapper' => [
							'width' => 79,	
						],
						'conditional_logic' => [
							[
							  [
								'field' => 'event_is_scholarship',
								'operator' => '==',
								'value' => 1
							  ]
							]
						],
					],
					[
						'key' => 'event_details_content',
						'name' => 'event_details_content',
						'label' => 'Description',
						'type' => 'wysiwyg',
						'required' => false,
						'tabs' => 'all',
						'toolbar' => 'simple',
						'media_upload' => 0,
						'delay' => 0,
						'wrapper' => [
							'width' => 100,
						],
					],
				],
                'location' => [
                    [[
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'event',
                    ]],
                ],
                'menu_order' => $menu_order++,
            ]);
        }
    }

    private function registerActions() {
		add_action('init', function() {
			$this->loadData();
		});

		add_filter('manage_event_posts_columns', function($columns) {
			$columns = [
				'cb' => $columns['cb'],
				'title' => $columns['title'],
				'brands' => __('Brands', 'location'),
				'regions' => __('Regions', $this->domain),
				'date' => $columns['date'],
			];

			return $columns;
		}, 10, 1);

		add_action('manage_event_posts_custom_column', function($column, $post_id) {
			switch ($column) {
				case 'brands':
					$brands = get_brands_for_event($post_id);
					echo !empty($brands) ? implode(', ', $brands) : '—';
					break;
				case 'regions':
					$regions = get_regions_for_event($post_id);
					echo !empty($regions) ? implode(', ', $regions) : '—';
					break;
			}
		}, 10, 2);

		add_action('admin_head', function() {
			?>
			<style>
			.acf-field.auto-height { min-height:0!important;height:auto!important; }
			</style>
			<?
		});
	}

    private function registerSaveHook() {
		add_action('save_post', function($post_id, $post, $update) {
			if(get_post_type($post_id) == 'event') $this->rebuild();
		}, 10, 3);
	}

    public function flushCache() {
		delete_option('__website_cache_metadata_events');
	}

	private function loadData() {
		$this->events = get_option('__website_cache_metadata_events');

		if(
			false
			|| isset($_GET['rebuild'])
			|| isset($_GET['rebuild-events'])
			|| empty($this->events)
		) {
			add_action('template_redirect', function() {
				$this->rebuild();
			});
		}
	}

    public function rebuild() {
		if($this->is_rebuilding) return;
		$this->is_rebuilding = true;

		$q = new WP_Query([
			'post_type' => 'event',
			'post_status' => 'publish',
			'posts_per_page' => -1,
		]);

		# Build storage
		$this->events = [];
		foreach($q->posts as $p) {
			# Prepare meta attributes
			$temp = [];
			foreach(get_post_meta($p->ID) as $key => $value) {
				if(starts_with($key, 'event_')) $temp[str_replace('event_', '', $key)] = $value[0];
			}
			$temp = array_map('trim', $temp);

			$this->events[$p->ID] = (object)array_merge((array)$p, $temp);
		}
		update_option('__website_cache_metadata_events', $this->events, false);
	}
}