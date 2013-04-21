<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

class StatusBoardBridgePackage extends Package {

	protected $pkgHandle = 'status_board_bridge';
	protected $appVersionRequired = '5.6.0';
	protected $pkgVersion = '0.0.1';
	
	public function getPackageDescription() {
		return t("Push website information to Panic brand Status Board");
	}
	
	public function getPackageName() {
		return t("Status Board Bridge");
	}
	
	public function install() {
		$pkg = parent::install();
		
		//Install dashboard page
		Loader::model('single_page');
		$sp = SinglePage::add('/dashboard/system/statusboard', $pkg);
		if (is_object($sp)) {
			$sp->update(array('cName'=>t('Status Board')));
		}
		$sp = SinglePage::add('/dashboard/system/statusboard/statuses', $pkg);
		if (is_object($sp)) {
			$sp->update(array('cName'=>t('Available Statuses')));
		}
	}

}