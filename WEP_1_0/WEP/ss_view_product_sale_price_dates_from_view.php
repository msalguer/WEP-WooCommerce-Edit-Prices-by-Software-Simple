<?php
// This script and data application were generated by AppGini 5.30
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/ss_view_product_sale_price_dates_from.php");
	include("$currDir/ss_view_product_sale_price_dates_from_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('ss_view_product_sale_price_dates_from');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "ss_view_product_sale_price_dates_from";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV=array(   
		"IF(    CHAR_LENGTH(`ss_view_product_description1`.`post_id`), CONCAT_WS('',   `ss_view_product_description1`.`post_id`), '') /* post_id */" => "post_id",
		"if(`ss_view_product_sale_price_dates_from`.`sale_price_dates_from`,date_format(`ss_view_product_sale_price_dates_from`.`sale_price_dates_from`,'%d/%m/%Y'),'')" => "sale_price_dates_from",
		"`ss_view_product_sale_price_dates_from`.`id`" => "id"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => 1,
		2 => '`ss_view_product_sale_price_dates_from`.`sale_price_dates_from`',
		3 => '`ss_view_product_sale_price_dates_from`.`id`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV=array(   
		"IF(    CHAR_LENGTH(`ss_view_product_description1`.`post_id`), CONCAT_WS('',   `ss_view_product_description1`.`post_id`), '') /* post_id */" => "post_id",
		"if(`ss_view_product_sale_price_dates_from`.`sale_price_dates_from`,date_format(`ss_view_product_sale_price_dates_from`.`sale_price_dates_from`,'%d/%m/%Y'),'')" => "sale_price_dates_from",
		"`ss_view_product_sale_price_dates_from`.`id`" => "id"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters=array(   
		"IF(    CHAR_LENGTH(`ss_view_product_description1`.`post_id`), CONCAT_WS('',   `ss_view_product_description1`.`post_id`), '') /* post_id */" => "post_id",
		"`ss_view_product_sale_price_dates_from`.`sale_price_dates_from`" => "sale_price_dates_from",
		"`ss_view_product_sale_price_dates_from`.`id`" => "Id"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS=array(   
		"IF(    CHAR_LENGTH(`ss_view_product_description1`.`post_id`), CONCAT_WS('',   `ss_view_product_description1`.`post_id`), '') /* post_id */" => "post_id",
		"if(`ss_view_product_sale_price_dates_from`.`sale_price_dates_from`,date_format(`ss_view_product_sale_price_dates_from`.`sale_price_dates_from`,'%d/%m/%Y'),'')" => "sale_price_dates_from",
		"`ss_view_product_sale_price_dates_from`.`id`" => "id"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'post_id' => 'post_id');

	$x->QueryFrom="`ss_view_product_sale_price_dates_from` LEFT JOIN `ss_view_product_description` as ss_view_product_description1 ON `ss_view_product_description1`.`post_id`=`ss_view_product_sale_price_dates_from`.`post_id` ";
	$x->QueryWhere='';
	$x->QueryOrder='';

	$x->AllowSelection = 0;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 0;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 0;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 0;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 0;
	$x->AllowCSV = 0;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 0;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "ss_view_product_sale_price_dates_from_view.php";
	$x->RedirectAfterInsert = "ss_view_product_sale_price_dates_from_view.php?SelectedID=#ID#";
	$x->TableTitle = "Product sale price dates from";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`ss_view_product_sale_price_dates_from`.`id`";

	$x->ColWidth   = array(  150, 150);
	$x->ColCaption = array("post_id", "sale_price_dates_from");
	$x->ColFieldName = array('post_id', 'sale_price_dates_from');
	$x->ColNumber  = array(1, 2);

	$x->Template = 'templates/ss_view_product_sale_price_dates_from_templateTV.html';
	$x->SelectedTemplate = 'templates/ss_view_product_sale_price_dates_from_templateTVS.html';
	$x->ShowTableHeader = 1;
	$x->ShowRecordSlots = 0;
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `ss_view_product_sale_price_dates_from`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='ss_view_product_sale_price_dates_from' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `ss_view_product_sale_price_dates_from`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='ss_view_product_sale_price_dates_from' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`ss_view_product_sale_price_dates_from`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: ss_view_product_sale_price_dates_from_init
	$render=TRUE;
	if(function_exists('ss_view_product_sale_price_dates_from_init')){
		$args=array();
		$render=ss_view_product_sale_price_dates_from_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: ss_view_product_sale_price_dates_from_header
	$headerCode='';
	if(function_exists('ss_view_product_sale_price_dates_from_header')){
		$args=array();
		$headerCode=ss_view_product_sale_price_dates_from_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: ss_view_product_sale_price_dates_from_footer
	$footerCode='';
	if(function_exists('ss_view_product_sale_price_dates_from_footer')){
		$args=array();
		$footerCode=ss_view_product_sale_price_dates_from_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>