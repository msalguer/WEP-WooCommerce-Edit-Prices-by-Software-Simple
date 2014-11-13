<?php
	$currDir=dirname(__FILE__);
	require("$currDir/incCommon.php");

	// get groupID of anonymous group
	$anonGroupID=sqlValue("select groupID from membership_groups where name='".$adminConfig['anonymousGroup']."'");

	// request to save changes?
	if($_POST['saveChanges']!=''){
		// validate data
		$name=makeSafe($_POST['name']);
		$description=makeSafe($_POST['description']);
		switch($_POST['visitorSignup']){
			case 0:
				$allowSignup=0;
				$needsApproval=1;
				break;
			case 2:
				$allowSignup=1;
				$needsApproval=0;
				break;
			default:
				$allowSignup=1;
				$needsApproval=1;
		}
		###############################
		$ss_view_product_description_insert=checkPermissionVal('ss_view_product_description_insert');
		$ss_view_product_description_view=checkPermissionVal('ss_view_product_description_view');
		$ss_view_product_description_edit=checkPermissionVal('ss_view_product_description_edit');
		$ss_view_product_description_delete=checkPermissionVal('ss_view_product_description_delete');
		###############################
		$ss_view_product_featured_insert=checkPermissionVal('ss_view_product_featured_insert');
		$ss_view_product_featured_view=checkPermissionVal('ss_view_product_featured_view');
		$ss_view_product_featured_edit=checkPermissionVal('ss_view_product_featured_edit');
		$ss_view_product_featured_delete=checkPermissionVal('ss_view_product_featured_delete');
		###############################
		$ss_view_product_price_insert=checkPermissionVal('ss_view_product_price_insert');
		$ss_view_product_price_view=checkPermissionVal('ss_view_product_price_view');
		$ss_view_product_price_edit=checkPermissionVal('ss_view_product_price_edit');
		$ss_view_product_price_delete=checkPermissionVal('ss_view_product_price_delete');
		###############################
		$ss_view_product_regular_price_insert=checkPermissionVal('ss_view_product_regular_price_insert');
		$ss_view_product_regular_price_view=checkPermissionVal('ss_view_product_regular_price_view');
		$ss_view_product_regular_price_edit=checkPermissionVal('ss_view_product_regular_price_edit');
		$ss_view_product_regular_price_delete=checkPermissionVal('ss_view_product_regular_price_delete');
		###############################
		$ss_view_product_sale_price_insert=checkPermissionVal('ss_view_product_sale_price_insert');
		$ss_view_product_sale_price_view=checkPermissionVal('ss_view_product_sale_price_view');
		$ss_view_product_sale_price_edit=checkPermissionVal('ss_view_product_sale_price_edit');
		$ss_view_product_sale_price_delete=checkPermissionVal('ss_view_product_sale_price_delete');
		###############################
		$ss_view_product_sale_price_dates_from_insert=checkPermissionVal('ss_view_product_sale_price_dates_from_insert');
		$ss_view_product_sale_price_dates_from_view=checkPermissionVal('ss_view_product_sale_price_dates_from_view');
		$ss_view_product_sale_price_dates_from_edit=checkPermissionVal('ss_view_product_sale_price_dates_from_edit');
		$ss_view_product_sale_price_dates_from_delete=checkPermissionVal('ss_view_product_sale_price_dates_from_delete');
		###############################
		$ss_view_product_sale_price_dates_to_insert=checkPermissionVal('ss_view_product_sale_price_dates_to_insert');
		$ss_view_product_sale_price_dates_to_view=checkPermissionVal('ss_view_product_sale_price_dates_to_view');
		$ss_view_product_sale_price_dates_to_edit=checkPermissionVal('ss_view_product_sale_price_dates_to_edit');
		$ss_view_product_sale_price_dates_to_delete=checkPermissionVal('ss_view_product_sale_price_dates_to_delete');
		###############################
		$ss_view_product_sku_insert=checkPermissionVal('ss_view_product_sku_insert');
		$ss_view_product_sku_view=checkPermissionVal('ss_view_product_sku_view');
		$ss_view_product_sku_edit=checkPermissionVal('ss_view_product_sku_edit');
		$ss_view_product_sku_delete=checkPermissionVal('ss_view_product_sku_delete');
		###############################

		// new group or old?
		if($_POST['groupID']==''){ // new group
			// make sure group name is unique
			if(sqlValue("select count(1) from membership_groups where name='$name'")){
				echo "<div class=\"alert alert-danger\">Error: Group name already exists. You must choose a unique group name.</div>";
				include("$currDir/incFooter.php");
			}

			// add group
			sql("insert into membership_groups set name='$name', description='$description', allowSignup='$allowSignup', needsApproval='$needsApproval'", $eo);

			// get new groupID
			$groupID=db_insert_id(db_link());

		}else{ // old group
			// validate groupID
			$groupID=intval($_POST['groupID']);

			if($groupID==$anonGroupID){
				$name=$adminConfig['anonymousGroup'];
				$allowSignup=0;
				$needsApproval=0;
			}

			// make sure group name is unique
			if(sqlValue("select count(1) from membership_groups where name='$name' and groupID!='$groupID'")){
				echo "<div class=\"alert alert-danger\">Error: Group name already exists. You must choose a unique group name.</div>";
				include("$currDir/incFooter.php");
			}

			// update group
			sql("update membership_groups set name='$name', description='$description', allowSignup='$allowSignup', needsApproval='$needsApproval' where groupID='$groupID'", $eo);

			// reset then add group permissions
			sql("delete from membership_grouppermissions where groupID='$groupID' and tableName='ss_view_product_description'", $eo);
			sql("delete from membership_grouppermissions where groupID='$groupID' and tableName='ss_view_product_featured'", $eo);
			sql("delete from membership_grouppermissions where groupID='$groupID' and tableName='ss_view_product_price'", $eo);
			sql("delete from membership_grouppermissions where groupID='$groupID' and tableName='ss_view_product_regular_price'", $eo);
			sql("delete from membership_grouppermissions where groupID='$groupID' and tableName='ss_view_product_sale_price'", $eo);
			sql("delete from membership_grouppermissions where groupID='$groupID' and tableName='ss_view_product_sale_price_dates_from'", $eo);
			sql("delete from membership_grouppermissions where groupID='$groupID' and tableName='ss_view_product_sale_price_dates_to'", $eo);
			sql("delete from membership_grouppermissions where groupID='$groupID' and tableName='ss_view_product_sku'", $eo);
		}

		// add group permissions
		if($groupID){
			// table 'ss_view_product_description'
			sql("insert into membership_grouppermissions set groupID='$groupID', tableName='ss_view_product_description', allowInsert='$ss_view_product_description_insert', allowView='$ss_view_product_description_view', allowEdit='$ss_view_product_description_edit', allowDelete='$ss_view_product_description_delete'", $eo);
			// table 'ss_view_product_featured'
			sql("insert into membership_grouppermissions set groupID='$groupID', tableName='ss_view_product_featured', allowInsert='$ss_view_product_featured_insert', allowView='$ss_view_product_featured_view', allowEdit='$ss_view_product_featured_edit', allowDelete='$ss_view_product_featured_delete'", $eo);
			// table 'ss_view_product_price'
			sql("insert into membership_grouppermissions set groupID='$groupID', tableName='ss_view_product_price', allowInsert='$ss_view_product_price_insert', allowView='$ss_view_product_price_view', allowEdit='$ss_view_product_price_edit', allowDelete='$ss_view_product_price_delete'", $eo);
			// table 'ss_view_product_regular_price'
			sql("insert into membership_grouppermissions set groupID='$groupID', tableName='ss_view_product_regular_price', allowInsert='$ss_view_product_regular_price_insert', allowView='$ss_view_product_regular_price_view', allowEdit='$ss_view_product_regular_price_edit', allowDelete='$ss_view_product_regular_price_delete'", $eo);
			// table 'ss_view_product_sale_price'
			sql("insert into membership_grouppermissions set groupID='$groupID', tableName='ss_view_product_sale_price', allowInsert='$ss_view_product_sale_price_insert', allowView='$ss_view_product_sale_price_view', allowEdit='$ss_view_product_sale_price_edit', allowDelete='$ss_view_product_sale_price_delete'", $eo);
			// table 'ss_view_product_sale_price_dates_from'
			sql("insert into membership_grouppermissions set groupID='$groupID', tableName='ss_view_product_sale_price_dates_from', allowInsert='$ss_view_product_sale_price_dates_from_insert', allowView='$ss_view_product_sale_price_dates_from_view', allowEdit='$ss_view_product_sale_price_dates_from_edit', allowDelete='$ss_view_product_sale_price_dates_from_delete'", $eo);
			// table 'ss_view_product_sale_price_dates_to'
			sql("insert into membership_grouppermissions set groupID='$groupID', tableName='ss_view_product_sale_price_dates_to', allowInsert='$ss_view_product_sale_price_dates_to_insert', allowView='$ss_view_product_sale_price_dates_to_view', allowEdit='$ss_view_product_sale_price_dates_to_edit', allowDelete='$ss_view_product_sale_price_dates_to_delete'", $eo);
			// table 'ss_view_product_sku'
			sql("insert into membership_grouppermissions set groupID='$groupID', tableName='ss_view_product_sku', allowInsert='$ss_view_product_sku_insert', allowView='$ss_view_product_sku_view', allowEdit='$ss_view_product_sku_edit', allowDelete='$ss_view_product_sku_delete'", $eo);
		}

		// redirect to group editing page
		redirect("admin/pageEditGroup.php?groupID=$groupID");

	}elseif($_GET['groupID']!=''){
		// we have an edit request for a group
		$groupID=intval($_GET['groupID']);
	}

	include("$currDir/incHeader.php");

	if($groupID!=''){
		// fetch group data to fill in the form below
		$res=sql("select * from membership_groups where groupID='$groupID'", $eo);
		if($row=db_fetch_assoc($res)){
			// get group data
			$name=$row['name'];
			$description=$row['description'];
			$visitorSignup=($row['allowSignup']==1 && $row['needsApproval']==1 ? 1 : ($row['allowSignup']==1 ? 2 : 0));

			// get group permissions for each table
			$res=sql("select * from membership_grouppermissions where groupID='$groupID'", $eo);
			while($row=db_fetch_assoc($res)){
				$tableName=$row['tableName'];
				$vIns=$tableName."_insert";
				$vUpd=$tableName."_edit";
				$vDel=$tableName."_delete";
				$vVue=$tableName."_view";
				$$vIns=$row['allowInsert'];
				$$vUpd=$row['allowEdit'];
				$$vDel=$row['allowDelete'];
				$$vVue=$row['allowView'];
			}
		}else{
			// no such group exists
			echo "<div class=\"alert alert-danger\">Error: Group not found!</div>";
			$groupID=0;
		}
	}
?>
<div class="page-header"><h1><?php echo ($groupID ? "Edit Group '$name'" : "Add New Group"); ?></h1></div>
<?php if($anonGroupID==$groupID){ ?>
	<div class="alert alert-warning">Attention! This is the anonymous group.</div>
<?php } ?>
<input type="checkbox" id="showToolTips" value="1" checked><label for="showToolTips">Show tool tips as mouse moves over options</label>
<form method="post" action="pageEditGroup.php">
	<input type="hidden" name="groupID" value="<?php echo $groupID; ?>">
	<div class="table-responsive"><table class="table table-striped">
		<tr>
			<td align="right" class="tdFormCaption" valign="top">
				<div class="formFieldCaption">Group name</div>
				</td>
			<td align="left" class="tdFormInput">
				<input type="text" name="name" <?php echo ($anonGroupID==$groupID ? "readonly" : ""); ?> value="<?php echo $name; ?>" size="20" class="formTextBox">
				<br />
				<?php if($anonGroupID==$groupID){ ?>
					The name of the anonymous group is read-only here.
				<?php }else{ ?>
					If you name the group '<?php echo $adminConfig['anonymousGroup']; ?>', it will be considered the anonymous group<br />
					that defines the permissions of guest visitors that do not log into the system.
				<?php } ?>
				</td>
			</tr>
		<tr>
			<td align="right" valign="top" class="tdFormCaption">
				<div class="formFieldCaption">Description</div>
				</td>
			<td align="left" class="tdFormInput">
				<textarea name="description" cols="50" rows="5" class="formTextBox"><?php echo $description; ?></textarea>
				</td>
			</tr>
		<?php if($anonGroupID!=$groupID){ ?>
		<tr>
			<td align="right" valign="top" class="tdFormCaption">
				<div class="formFieldCaption">Allow visitors to sign up?</div>
				</td>
			<td align="left" class="tdFormInput">
				<?php
					echo htmlRadioGroup(
						"visitorSignup",
						array(0, 1, 2),
						array(
							"No. Only the admin can add users.",
							"Yes, and the admin must approve them.",
							"Yes, and automatically approve them."
						),
						($groupID ? $visitorSignup : $adminConfig['defaultSignUp'])
					);
				?>
				</td>
			</tr>
		<?php } ?>
		<tr>
			<td colspan="2" align="right" class="tdFormFooter">
				<input type="submit" name="saveChanges" value="Save changes">
				</td>
			</tr>
		<tr>
			<td colspan="2" class="tdFormHeader">
				<table class="table table-striped">
					<tr>
						<td class="tdFormHeader" colspan="5"><h2>Table permissions for this group</h2></td>
						</tr>
					<?php
						// permissions arrays common to the radio groups below
						$arrPermVal=array(0, 1, 2, 3);
						$arrPermText=array("No", "Owner", "Group", "All");
					?>
					<tr>
						<td class="tdHeader"><div class="ColCaption">Table</div></td>
						<td class="tdHeader"><div class="ColCaption">Insert</div></td>
						<td class="tdHeader"><div class="ColCaption">View</div></td>
						<td class="tdHeader"><div class="ColCaption">Edit</div></td>
						<td class="tdHeader"><div class="ColCaption">Delete</div></td>
						</tr>
				<!-- ss_view_product_description table -->
					<tr>
						<td class="tdCaptionCell" valign="top">WooCommerce Edit Prices</td>
						<td class="tdCell" valign="top">
							<input onMouseOver="stm(ss_view_product_description_addTip, toolTipStyle);" onMouseOut="htm();" type="checkbox" name="ss_view_product_description_insert" value="1" <?php echo ($ss_view_product_description_insert ? "checked class=\"highlight\"" : ""); ?>>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_description_view", $arrPermVal, $arrPermText, $ss_view_product_description_view, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_description_edit", $arrPermVal, $arrPermText, $ss_view_product_description_edit, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_description_delete", $arrPermVal, $arrPermText, $ss_view_product_description_delete, "highlight");
							?>
							</td>
						</tr>
				<!-- ss_view_product_featured table -->
					<tr>
						<td class="tdCaptionCell" valign="top">Product Featured</td>
						<td class="tdCell" valign="top">
							<input onMouseOver="stm(ss_view_product_featured_addTip, toolTipStyle);" onMouseOut="htm();" type="checkbox" name="ss_view_product_featured_insert" value="1" <?php echo ($ss_view_product_featured_insert ? "checked class=\"highlight\"" : ""); ?>>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_featured_view", $arrPermVal, $arrPermText, $ss_view_product_featured_view, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_featured_edit", $arrPermVal, $arrPermText, $ss_view_product_featured_edit, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_featured_delete", $arrPermVal, $arrPermText, $ss_view_product_featured_delete, "highlight");
							?>
							</td>
						</tr>
				<!-- ss_view_product_price table -->
					<tr>
						<td class="tdCaptionCell" valign="top">Product Price</td>
						<td class="tdCell" valign="top">
							<input onMouseOver="stm(ss_view_product_price_addTip, toolTipStyle);" onMouseOut="htm();" type="checkbox" name="ss_view_product_price_insert" value="1" <?php echo ($ss_view_product_price_insert ? "checked class=\"highlight\"" : ""); ?>>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_price_view", $arrPermVal, $arrPermText, $ss_view_product_price_view, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_price_edit", $arrPermVal, $arrPermText, $ss_view_product_price_edit, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_price_delete", $arrPermVal, $arrPermText, $ss_view_product_price_delete, "highlight");
							?>
							</td>
						</tr>
				<!-- ss_view_product_regular_price table -->
					<tr>
						<td class="tdCaptionCell" valign="top">Product regular price</td>
						<td class="tdCell" valign="top">
							<input onMouseOver="stm(ss_view_product_regular_price_addTip, toolTipStyle);" onMouseOut="htm();" type="checkbox" name="ss_view_product_regular_price_insert" value="1" <?php echo ($ss_view_product_regular_price_insert ? "checked class=\"highlight\"" : ""); ?>>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_regular_price_view", $arrPermVal, $arrPermText, $ss_view_product_regular_price_view, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_regular_price_edit", $arrPermVal, $arrPermText, $ss_view_product_regular_price_edit, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_regular_price_delete", $arrPermVal, $arrPermText, $ss_view_product_regular_price_delete, "highlight");
							?>
							</td>
						</tr>
				<!-- ss_view_product_sale_price table -->
					<tr>
						<td class="tdCaptionCell" valign="top">Product sale price</td>
						<td class="tdCell" valign="top">
							<input onMouseOver="stm(ss_view_product_sale_price_addTip, toolTipStyle);" onMouseOut="htm();" type="checkbox" name="ss_view_product_sale_price_insert" value="1" <?php echo ($ss_view_product_sale_price_insert ? "checked class=\"highlight\"" : ""); ?>>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_sale_price_view", $arrPermVal, $arrPermText, $ss_view_product_sale_price_view, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_sale_price_edit", $arrPermVal, $arrPermText, $ss_view_product_sale_price_edit, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_sale_price_delete", $arrPermVal, $arrPermText, $ss_view_product_sale_price_delete, "highlight");
							?>
							</td>
						</tr>
				<!-- ss_view_product_sale_price_dates_from table -->
					<tr>
						<td class="tdCaptionCell" valign="top">Product sale price dates from</td>
						<td class="tdCell" valign="top">
							<input onMouseOver="stm(ss_view_product_sale_price_dates_from_addTip, toolTipStyle);" onMouseOut="htm();" type="checkbox" name="ss_view_product_sale_price_dates_from_insert" value="1" <?php echo ($ss_view_product_sale_price_dates_from_insert ? "checked class=\"highlight\"" : ""); ?>>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_sale_price_dates_from_view", $arrPermVal, $arrPermText, $ss_view_product_sale_price_dates_from_view, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_sale_price_dates_from_edit", $arrPermVal, $arrPermText, $ss_view_product_sale_price_dates_from_edit, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_sale_price_dates_from_delete", $arrPermVal, $arrPermText, $ss_view_product_sale_price_dates_from_delete, "highlight");
							?>
							</td>
						</tr>
				<!-- ss_view_product_sale_price_dates_to table -->
					<tr>
						<td class="tdCaptionCell" valign="top">Product sale price dates to</td>
						<td class="tdCell" valign="top">
							<input onMouseOver="stm(ss_view_product_sale_price_dates_to_addTip, toolTipStyle);" onMouseOut="htm();" type="checkbox" name="ss_view_product_sale_price_dates_to_insert" value="1" <?php echo ($ss_view_product_sale_price_dates_to_insert ? "checked class=\"highlight\"" : ""); ?>>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_sale_price_dates_to_view", $arrPermVal, $arrPermText, $ss_view_product_sale_price_dates_to_view, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_sale_price_dates_to_edit", $arrPermVal, $arrPermText, $ss_view_product_sale_price_dates_to_edit, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_sale_price_dates_to_delete", $arrPermVal, $arrPermText, $ss_view_product_sale_price_dates_to_delete, "highlight");
							?>
							</td>
						</tr>
				<!-- ss_view_product_sku table -->
					<tr>
						<td class="tdCaptionCell" valign="top">Product Sku</td>
						<td class="tdCell" valign="top">
							<input onMouseOver="stm(ss_view_product_sku_addTip, toolTipStyle);" onMouseOut="htm();" type="checkbox" name="ss_view_product_sku_insert" value="1" <?php echo ($ss_view_product_sku_insert ? "checked class=\"highlight\"" : ""); ?>>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_sku_view", $arrPermVal, $arrPermText, $ss_view_product_sku_view, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_sku_edit", $arrPermVal, $arrPermText, $ss_view_product_sku_edit, "highlight");
							?>
							</td>
						<td class="tdCell">
							<?php
								echo htmlRadioGroup("ss_view_product_sku_delete", $arrPermVal, $arrPermText, $ss_view_product_sku_delete, "highlight");
							?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		<tr>
			<td colspan="2" align="right" class="tdFormFooter">
				<input type="submit" name="saveChanges" value="Save changes">
				</td>
			</tr>
		</table></div>
</form>


<?php
	include("$currDir/incFooter.php");
?>