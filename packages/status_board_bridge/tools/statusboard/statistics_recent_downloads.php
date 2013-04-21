<?php	
defined('C5_EXECUTE') or die("Access Denied.");
$sbgh = Loader::helper('status_board_bridge','status_board_bridge');
if( ! $sbgh->varidateAuth('statistics_recent_downloads') )
	exit;


Loader::model('file');
$downloads = File::getDownloadStatistics(5);
?>
<h1><?php echo t('Five Most Recent Downloads')?> - <?php echo SITE?></h1>
<table>
<thead>
<tr>
	<th><?php echo t('File')?></th>
	<th style="width:160px;"><?php echo t('User')?></th>
	<th style="width:256px;"><?php echo t('Downloaded On')?></th>
</tr>
</thead>
<tbody>
<?php if (count($downloads) == 0) { ?>
	<tr>
		<td colspan="3"><?php echo t('No files have been downloaded.')?></td>
	</tr>
<?php } else { ?>
<?php
	foreach($downloads as $download) {
		$f = File::getByID($download['fID']);
		if (!is_object($f)) {
			continue;
		}
		?>
	<tr>
		<td><?php
		$title = $f->getTitle();
		$maxlen = 20;
		if (strlen($title) > ($maxlen-4)) {
			$ext = substr($title,strrpos($title, '.'));
			if (substr($ext,0,1) != '.') { $ext = ''; }
			$title = substr($title,0,$maxlen-4-strlen($ext)).'[..]'.$ext;
		}
		echo $title;
		?></td>
		<td>
			<?php
			$uID=intval($download['uID']);
			if(!$uID){
				echo t('Anonymous');
			}else{
				$downloadUI = UserInfo::getById($uID);
				if($downloadUI instanceof UserInfo) {
					echo $downloadUI->getUserName();
				} else {
					echo t('Deleted User');
				}
			}
			?>
		</td>
		<td><?php echo date(t('n/j \a\t g:i A'), strtotime($download['timestamp']))?></td>
	</tr>
	<?php } ?>
<?php } ?>
</table>