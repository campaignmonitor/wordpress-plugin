<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once( CAMPAIGN_MONITOR_CLASS_FOLDER . 'campaign_monitor_element.php' );

class CampaignMonitorLightbox extends CampaignMonitorElement {
	public $type = 'lightbox';
	public $defaults = array(
			'name' => 'New Lightbox',
			'global' => 0,
			'enabled' => 0,
			'data' => array(
				'form_id' => '',
				'scrolled'  => 0,
				'scrolled_value' => '100%',
				'timed' => 0,
				'once_per_page' => 1,
				'active' => 0,
				'show_in' => array(),
				'text' => 'Default Text:',
			),
	);

	function __construct() {
		$this->name = $this->defaults['name'];
		$this->global = $this->defaults['global'];
		$this->enabled = $this->defaults['enabled'];
		$this->data = $this->defaults['data'];
		$this->id = 0;
	}

	public function get_all_global(  ) {
		global $wpdb;
		$sql = "SELECT * FROM ".$wpdb->prefix.$this->tableName." WHERE global = 1 and enabled = 1 and type='{$this->type}'";

		$result = $wpdb->get_results($sql);

		return $result;

	}

	public function render() {
		if ( 0 == $this->id ) {
			return '';
		}

		$this->renderTemplate('lightbox-render');
	}
}