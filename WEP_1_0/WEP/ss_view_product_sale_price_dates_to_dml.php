<?php

// Data functions for table ss_view_product_sale_price_dates_to

// This script and data application were generated by AppGini 5.30
// Download AppGini for free from http://bigprof.com/appgini/download/

function ss_view_product_sale_price_dates_to_insert(){
	global $Translation;

	if($_GET['insert_x']!=''){$_POST=$_GET;}

	// mm: can member insert record?
	$arrPerm=getTablePermissions('ss_view_product_sale_price_dates_to');
	if(!$arrPerm[1]){
		return false;
	}

	$data['sale_price_dates_to'] = intval($_POST['sale_price_dates_toYear']) . '-' . intval($_POST['sale_price_dates_toMonth']) . '-' . intval($_POST['sale_price_dates_toDay']);
	$data['sale_price_dates_to'] = parseMySQLDate($data['sale_price_dates_to'], '');
	if($data['id'] == '') {echo StyleSheet() . "\n\n<div class=\"alert alert-danger\">" . $Translation['error:'] . " 'Id': " . $Translation['pkfield empty'] . '</div>'; exit;}

	if($data['post_id'] == '') $data['post_id'] = "0";

	// hook: ss_view_product_sale_price_dates_to_before_insert
	if(function_exists('ss_view_product_sale_price_dates_to_before_insert')){
		$args=array();
		if(!ss_view_product_sale_price_dates_to_before_insert($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('insert into `ss_view_product_sale_price_dates_to` set       `sale_price_dates_to`=' . (($data['sale_price_dates_to'] !== '' && $data['sale_price_dates_to'] !== NULL) ? "'{$data['sale_price_dates_to']}'" : 'NULL'), $o);
	if($o['error']!=''){
		echo $o['error'];
		echo "<a href=\"ss_view_product_sale_price_dates_to_view.php?addNew_x=1\">{$Translation['< back']}</a>";
		exit;
	}

	$recID=$data['id'];

	// hook: ss_view_product_sale_price_dates_to_after_insert
	if(function_exists('ss_view_product_sale_price_dates_to_after_insert')){
		$res = sql("select * from `ss_view_product_sale_price_dates_to` where `id`='" . makeSafe($recID) . "' limit 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID);
		$args=array();
		if(!ss_view_product_sale_price_dates_to_after_insert($data, getMemberInfo(), $args)){ return (get_magic_quotes_gpc() ? stripslashes($recID) : $recID); }
	}

	// mm: save ownership data
	sql("insert into membership_userrecords set tableName='ss_view_product_sale_price_dates_to', pkValue='$recID', memberID='".getLoggedMemberID()."', dateAdded='".time()."', dateUpdated='".time()."', groupID='".getLoggedGroupID()."'", $eo);

	return (get_magic_quotes_gpc() ? stripslashes($recID) : $recID);
}

function ss_view_product_sale_price_dates_to_delete($selected_id, $AllowDeleteOfParents=false, $skipChecks=false){
	// insure referential integrity ...
	global $Translation;
	$selected_id=makeSafe($selected_id);

	// mm: can member delete record?
	$arrPerm=getTablePermissions('ss_view_product_sale_price_dates_to');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='ss_view_product_sale_price_dates_to' and pkValue='$selected_id'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='ss_view_product_sale_price_dates_to' and pkValue='$selected_id'");
	if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
		// delete allowed, so continue ...
	}else{
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: ss_view_product_sale_price_dates_to_before_delete
	if(function_exists('ss_view_product_sale_price_dates_to_before_delete')){
		$args=array();
		if(!ss_view_product_sale_price_dates_to_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'];
	}

	sql("delete from `ss_view_product_sale_price_dates_to` where `id`='$selected_id'", $eo);

	// hook: ss_view_product_sale_price_dates_to_after_delete
	if(function_exists('ss_view_product_sale_price_dates_to_after_delete')){
		$args=array();
		ss_view_product_sale_price_dates_to_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("delete from membership_userrecords where tableName='ss_view_product_sale_price_dates_to' and pkValue='$selected_id'", $eo);
}

function ss_view_product_sale_price_dates_to_update($selected_id){
	global $Translation;

	if($_GET['update_x']!=''){$_POST=$_GET;}

	// mm: can member edit record?
	$arrPerm=getTablePermissions('ss_view_product_sale_price_dates_to');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='ss_view_product_sale_price_dates_to' and pkValue='".makeSafe($selected_id)."'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='ss_view_product_sale_price_dates_to' and pkValue='".makeSafe($selected_id)."'");
	if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){ // allow update?
		// update allowed, so continue ...
	}else{
		return false;
	}

	$data['sale_price_dates_to'] = intval($_POST['sale_price_dates_toYear']) . '-' . intval($_POST['sale_price_dates_toMonth']) . '-' . intval($_POST['sale_price_dates_toDay']);
	$data['sale_price_dates_to'] = parseMySQLDate($data['sale_price_dates_to'], '');
	$data['selectedID']=makeSafe($selected_id);

	// hook: ss_view_product_sale_price_dates_to_before_update
	if(function_exists('ss_view_product_sale_price_dates_to_before_update')){
		$args=array();
		if(!ss_view_product_sale_price_dates_to_before_update($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('update `ss_view_product_sale_price_dates_to` set       `sale_price_dates_to`=' . (($data['sale_price_dates_to'] !== '' && $data['sale_price_dates_to'] !== NULL) ? "'{$data['sale_price_dates_to']}'" : 'NULL') . " where `id`='".makeSafe($selected_id)."'", $o);
	if($o['error']!=''){
		echo $o['error'];
		echo '<a href="ss_view_product_sale_price_dates_to_view.php?SelectedID='.urlencode($selected_id)."\">{$Translation['< back']}</a>";
		exit;
	}

	$data['selectedID'] = $data['id'];

	// hook: ss_view_product_sale_price_dates_to_after_update
	if(function_exists('ss_view_product_sale_price_dates_to_after_update')){
		$res = sql("SELECT * FROM `ss_view_product_sale_price_dates_to` WHERE `id`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = $data['id'];
		$args = array();
		if(!ss_view_product_sale_price_dates_to_after_update($data, getMemberInfo(), $args)){ return; }
	}

	// mm: update ownership data
	sql("update membership_userrecords set dateUpdated='".time()."', pkValue='{$data['id']}' where tableName='ss_view_product_sale_price_dates_to' and pkValue='".makeSafe($selected_id)."'", $eo);

}

function ss_view_product_sale_price_dates_to_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0){
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm=getTablePermissions('ss_view_product_sale_price_dates_to');
	if(!$arrPerm[1] && $selected_id==''){ return ''; }
	$AllowInsert = ($arrPerm[1] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != ''){
		$dvprint = true;
	}

	$filterer_post_id = thisOr(undo_magic_quotes($_REQUEST['filterer_post_id']), '');

	// populate filterers, starting from children to grand-parents

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');
	// combobox: post_id
	$combo_post_id = new DataCombo;
	// combobox: sale_price_dates_to
	$combo_sale_price_dates_to = new DateCombo;
	$combo_sale_price_dates_to->DateFormat = "dmy";
	$combo_sale_price_dates_to->MinYear = 1900;
	$combo_sale_price_dates_to->MaxYear = 2100;
	$combo_sale_price_dates_to->DefaultDate = parseMySQLDate('', '');
	$combo_sale_price_dates_to->MonthNames = $Translation['month names'];
	$combo_sale_price_dates_to->NamePrefix = 'sale_price_dates_to';

	if($selected_id){
		// mm: check member permissions
		if(!$arrPerm[2]){
			return "";
		}
		// mm: who is the owner?
		$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='ss_view_product_sale_price_dates_to' and pkValue='".makeSafe($selected_id)."'");
		$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='ss_view_product_sale_price_dates_to' and pkValue='".makeSafe($selected_id)."'");
		if($arrPerm[2]==1 && getLoggedMemberID()!=$ownerMemberID){
			return "";
		}
		if($arrPerm[2]==2 && getLoggedGroupID()!=$ownerGroupID){
			return "";
		}

		// can edit?
		if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){
			$AllowUpdate=1;
		}else{
			$AllowUpdate=0;
		}

		$res = sql("select * from `ss_view_product_sale_price_dates_to` where `id`='".makeSafe($selected_id)."'", $eo);
		$row = db_fetch_array($res);
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input();
		$row = $hc->xss_clean($row); /* sanitize data */
		$combo_post_id->SelectedData = $row['post_id'];
		$combo_sale_price_dates_to->DefaultDate = $row['sale_price_dates_to'];
	}else{
		$combo_post_id->SelectedData = $filterer_post_id;
	}
	$combo_post_id->HTML = '<span id="post_id-container' . $rnd1 . '"></span><input type="hidden" name="post_id" id="post_id' . $rnd1 . '">';
	$combo_post_id->MatchText = '<span id="post_id-container-readonly' . $rnd1 . '"></span><input type="hidden" name="post_id" id="post_id' . $rnd1 . '">';

	ob_start();
	?>

	<script>
		// initial lookup values
		var current_post_id__RAND__ = { text: "<?php echo ($selected_id ? '' : '0'); ?>", value: "<?php echo addslashes($selected_id ? $urow['post_id'] : $filterer_post_id); ?>"};
		
		jQuery(function() {
			post_id_reload__RAND__();
		});
		function post_id_reload__RAND__(){
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint){ ?>

			jQuery("#post_id-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c){
					jQuery.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						<?php if(!$selected_id && !$filterer_post_id){ ?>
							data: { text: '0', t: 'ss_view_product_sale_price_dates_to', f: 'post_id' }
						<?php }else{ ?>
							data: { id: current_post_id__RAND__.value, t: 'ss_view_product_sale_price_dates_to', f: 'post_id' }
						<?php } ?>

					}).done(function(resp){
						c({
							id: resp.results[0].id,
							text: resp.results[0].text
						});
						jQuery('[name="post_id"]').val(resp.results[0].id);
						jQuery('[id=post_id-container-readonly__RAND__]').html('<span id="post_id-match-text">' + resp.results[0].text + '</span>');


						if(typeof(post_id_update_autofills__RAND__) == 'function') post_id_update_autofills__RAND__();
					});
				},
				width: '100%',
				formatNoMatches: function(term){ return '<?php echo addslashes($Translation['No matches found!']); ?>'; },
				minimumResultsForSearch: 10,
				loadMorePadding: 200,
				ajax: {
					url: 'ajax_combo.php',
					dataType: 'json',
					cache: true,
					data: function(term, page){ return { s: term, p: page, t: 'ss_view_product_sale_price_dates_to', f: 'post_id' }; },
					results: function(resp, page){ return resp; }
				}
			}).on('change', function(e){
				current_post_id__RAND__.value = e.added.id;
				current_post_id__RAND__.text = e.added.text;
				jQuery('[name="post_id"]').val(e.added.id);


				if(typeof(post_id_update_autofills__RAND__) == 'function') post_id_update_autofills__RAND__();
			});
		<?php }else{ ?>

			jQuery.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: current_post_id__RAND__.value, t: 'ss_view_product_sale_price_dates_to', f: 'post_id' }
			}).done(function(resp){
				jQuery('[id=post_id-container__RAND__], [id=post_id-container-readonly__RAND__]').html('<span id="post_id-match-text">' + resp.results[0].text + '</span>');

				if(typeof(post_id_update_autofills__RAND__) == 'function') post_id_update_autofills__RAND__();
			});
		<?php } ?>

		}
	</script>
	<?php
	
	$lookups = str_replace('__RAND__', $rnd1, ob_get_contents());
	ob_end_clean();


	// code for template based detail view forms

	// open the detail view template
	$templateCode = @file_get_contents('./templates/ss_view_product_sale_price_dates_to_templateDV.html');

	// process form title
	$templateCode=str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Detail View', $templateCode);
	$templateCode=str_replace('<%%RND1%%>', $rnd1, $templateCode);
	// process buttons
	if($arrPerm[1] && !$selected_id){ // allow insert and no record selected?
		if(!$selected_id) $templateCode=str_replace('<%%INSERT_BUTTON%%>', '<button tabindex="2" type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return ss_view_product_sale_price_dates_to_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode=str_replace('<%%INSERT_BUTTON%%>', '<button tabindex="2" type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return ss_view_product_sale_price_dates_to_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
	}else{
		$templateCode=str_replace('<%%INSERT_BUTTON%%>', '', $templateCode);
	}

	// 'Back' button action
	if($_REQUEST['Embedded']){
		$backAction = 'window.parent.jQuery(\'.modal\').modal(\'hide\'); return false;';
	}else{
		$backAction = '$$(\'form\')[0].writeAttribute(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;';
	}

	if($selected_id){
		if($AllowUpdate){
			$templateCode=str_replace('<%%UPDATE_BUTTON%%>', '<button tabindex="2" type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return ss_view_product_sale_price_dates_to_validateData();"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
		}else{
			$templateCode=str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		}
		if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
			$templateCode=str_replace('<%%DELETE_BUTTON%%>', '<button tabindex="2" type="submit" class="btn btn-danger" id="delete" name="delete_x" value="1" onclick="return confirm(\'' . $Translation['are you sure?'] . '\');"><i class="glyphicon glyphicon-trash"></i> ' . $Translation['Delete'] . '</button>', $templateCode);
		}else{
			$templateCode=str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		}
		$templateCode=str_replace('<%%DESELECT_BUTTON%%>', '<button tabindex="2" type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>', $templateCode);
	}else{
		$templateCode=str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		$templateCode=str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		$templateCode=str_replace('<%%DESELECT_BUTTON%%>', ($ShowCancel ? '<button tabindex="2" type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>' : ''), $templateCode);
	}

	// set records to read only if user can't insert new records and can't edit current record
	if(($selected_id && !$AllowUpdate) || (!$selected_id && !$AllowInsert)){
		$jsReadOnly .= "\tjQuery('#sale_price_dates_to').prop('readonly', true);\n";
		$jsReadOnly .= "\tjQuery('#sale_price_dates_toDay, #sale_price_dates_toMonth, #sale_price_dates_toYear').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";

		$noUploads = true;
	}elseif(($AllowInsert && !$selected_id) || ($AllowUpdate && $selected_id)){
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos
	$templateCode=str_replace('<%%COMBO(post_id)%%>', $combo_post_id->HTML, $templateCode);
	$templateCode=str_replace('<%%COMBOTEXT(post_id)%%>', $combo_post_id->MatchText, $templateCode);
	$templateCode=str_replace('<%%URLCOMBOTEXT(post_id)%%>', urlencode($combo_post_id->MatchText), $templateCode);
	$templateCode=str_replace('<%%COMBO(sale_price_dates_to)%%>', ($selected_id && !$arrPerm[3] ? '<p class="form-control-static">' . $combo_sale_price_dates_to->GetHTML(true) . '</p>' : $combo_sale_price_dates_to->GetHTML()), $templateCode);
	$templateCode=str_replace('<%%COMBOTEXT(sale_price_dates_to)%%>', $combo_sale_price_dates_to->GetHTML(true), $templateCode);

	// process foreign key links
	if($selected_id){
		$templateCode=str_replace('<%%PLINK(post_id)%%>', ($combo_post_id->SelectedData ? "<span id=\"ss_view_product_description_plink1\" class=\"hidden\"><a class=\"btn btn-default\" href=\"ss_view_product_description_view.php?SelectedID=" . urlencode($combo_post_id->SelectedData) . "\"><i class=\"glyphicon glyphicon-search\"></i></a></span>" : ''), $templateCode);
	}

	// process images
	$templateCode=str_replace('<%%UPLOADFILE(post_id)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(sale_price_dates_to)%%>', '', $templateCode);
	$templateCode=str_replace('<%%UPLOADFILE(id)%%>', '', $templateCode);

	// process values
	if($selected_id){
		$templateCode=str_replace('<%%VALUE(post_id)%%>', htmlspecialchars($row['post_id'], ENT_QUOTES), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(post_id)%%>', urlencode($urow['post_id']), $templateCode);
		$templateCode=str_replace('<%%VALUE(sale_price_dates_to)%%>', @date('d/m/Y', @strtotime(htmlspecialchars($row['sale_price_dates_to'], ENT_QUOTES))), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(sale_price_dates_to)%%>', urlencode(@date('d/m/Y', @strtotime(htmlspecialchars($urow['sale_price_dates_to'], ENT_QUOTES)))), $templateCode);
		$templateCode=str_replace('<%%VALUE(id)%%>', htmlspecialchars($row['id'], ENT_QUOTES), $templateCode);
		$templateCode=str_replace('<%%URLVALUE(id)%%>', urlencode($urow['id']), $templateCode);
	}else{
		$templateCode=str_replace('<%%VALUE(post_id)%%>', '0', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(post_id)%%>', urlencode('0'), $templateCode);
		$templateCode=str_replace('<%%VALUE(sale_price_dates_to)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(sale_price_dates_to)%%>', urlencode(''), $templateCode);
		$templateCode=str_replace('<%%VALUE(id)%%>', '', $templateCode);
		$templateCode=str_replace('<%%URLVALUE(id)%%>', urlencode(''), $templateCode);
	}

	// process translations
	foreach($Translation as $symbol=>$trans){
		$templateCode=str_replace("<%%TRANSLATION($symbol)%%>", $trans, $templateCode);
	}

	// clear scrap
	$templateCode=str_replace('<%%', '<!-- ', $templateCode);
	$templateCode=str_replace('%%>', ' -->', $templateCode);

	// hide links to inaccessible tables
	if($_POST['dvprint_x']==''){
		$templateCode.="\n\n<script>jQuery(function(){\n";
		$arrTables=getTableList();
		foreach($arrTables as $name => $caption){
			$templateCode .= "\tjQuery('#{$name}_link').removeClass('hidden');\n";
			$templateCode .= "\tjQuery('#xs_{$name}_link').removeClass('hidden');\n";
			$templateCode .= "\tjQuery('[id^=\"{$name}_plink\"]').removeClass('hidden');\n";
		}

		$templateCode .= $jsReadOnly;
		$templateCode .= $jsEditable;

		if(!$selected_id){
		}

		$templateCode.="\n});</script>\n";
	}

	// ajaxed auto-fill fields
	$templateCode.="<script>";
	$templateCode.="document.observe('dom:loaded', function() {";


	$templateCode.="});";
	$templateCode.="</script>";
	$templateCode .= $lookups;

	// handle enforced parent values for read-only lookup fields
	if( $_REQUEST['FilterField'][1]=='1' && $_REQUEST['FilterOperator'][1]=='<=>'){
		$templateCode.="\n<input type=hidden name=post_id value=\"".htmlspecialchars((get_magic_quotes_gpc() ? stripslashes($_REQUEST['FilterValue'][1]) : $_REQUEST['FilterValue'][1]))."\">\n";
	}

	// don't include blank images in lightbox gallery
	$templateCode=preg_replace('/blank.gif" rel="lightbox\[.*?\]"/', 'blank.gif"', $templateCode);

	// don't display empty email links
	$templateCode=preg_replace('/<a .*?href="mailto:".*?<\/a>/', '', $templateCode);

	// hook: ss_view_product_sale_price_dates_to_dv
	if(function_exists('ss_view_product_sale_price_dates_to_dv')){
		$args=array();
		ss_view_product_sale_price_dates_to_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}
?>