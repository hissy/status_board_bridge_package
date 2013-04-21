<?php
defined('C5_EXECUTE') or die("Access Denied.");
/**
 * @package Status Board Bridge
 * @author Takuro Hishikawa <hishikawa@concrete5.co.jp>
 * @copyright Copyright (c) 2013 concrete5 Japan Incorporated. (http://concrete5.co.jp)
 * @license MIT License
 *
 */
 
class StatusBoardJsonHelper extends Concrete5_Helper_Json {

	protected $title = '';
	protected $datasequences = array();
	
	public function getTitle() {
		return $this->title;
	}
	
	public function setTitle($title) {
		$this->title = $title;
	}
	
	public function getDatasequences() {
		return $this->datasequences;
	}
	
	public function addDatasequence($title,$datapoints) {
		$array = array(
			'title' => $title,
			'datapoints' => $datapoints
		);
		$this->datasequences[] = $array;
	}
	
	public function encode() {
		$mixed = array(
			'graph' => array(
				'title' => $this->getTitle(),
				'datasequences' => $this->getDatasequences()
			)
		);
		return parent::encode($mixed);
	}
	
}