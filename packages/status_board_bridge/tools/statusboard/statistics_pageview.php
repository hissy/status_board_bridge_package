<?php	
defined('C5_EXECUTE') or die("Access Denied.");
$sbgh = Loader::helper('status_board_bridge','status_board_bridge');
if( ! $sbgh->varidateAuth('statistics_pageview') )
	exit;


Loader::model('page_statistics');
$labels = array();
$dates = array();
for ($i = -4; $i < 1; $i++) {
	$date = date('Y-m-d', strtotime($i . ' days'));
	if ($i == 0) {
		$label = t('Today');
	} else { 
		$label = date('D', strtotime($i . ' days'));
	}
	$labels[] = $label;
	$dates[] = $date;
}

$viewsArray = array();
foreach($dates as $i => $d) { 
	$total = PageStatistics::getTotalPageViews($d);
	$viewsArray[] = array(
		'title' => $labels[$i],
		'value' => $total
	);
}


//Send response
$json = Loader::helper('status_board_json','status_board_bridge');
$json->setTitle(SITE);
$json->addDatasequence(t('Recent Page Views'),$viewsArray);
echo $json->encode();

exit;
