var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// ss_view_product_description table
ss_view_product_description_addTip=["",spacer+"This option allows all members of the group to add records to the 'WooCommerce Edit Prices' table. A member who adds a record to the table becomes the 'owner' of that record."];

ss_view_product_description_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'WooCommerce Edit Prices' table."];
ss_view_product_description_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'WooCommerce Edit Prices' table."];
ss_view_product_description_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'WooCommerce Edit Prices' table."];
ss_view_product_description_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'WooCommerce Edit Prices' table."];

ss_view_product_description_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'WooCommerce Edit Prices' table."];
ss_view_product_description_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'WooCommerce Edit Prices' table."];
ss_view_product_description_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'WooCommerce Edit Prices' table."];
ss_view_product_description_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'WooCommerce Edit Prices' table, regardless of their owner."];

ss_view_product_description_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'WooCommerce Edit Prices' table."];
ss_view_product_description_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'WooCommerce Edit Prices' table."];
ss_view_product_description_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'WooCommerce Edit Prices' table."];
ss_view_product_description_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'WooCommerce Edit Prices' table."];

// ss_view_product_featured table
ss_view_product_featured_addTip=["",spacer+"This option allows all members of the group to add records to the 'Product Featured' table. A member who adds a record to the table becomes the 'owner' of that record."];

ss_view_product_featured_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Product Featured' table."];
ss_view_product_featured_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Product Featured' table."];
ss_view_product_featured_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Product Featured' table."];
ss_view_product_featured_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Product Featured' table."];

ss_view_product_featured_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Product Featured' table."];
ss_view_product_featured_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Product Featured' table."];
ss_view_product_featured_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Product Featured' table."];
ss_view_product_featured_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Product Featured' table, regardless of their owner."];

ss_view_product_featured_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Product Featured' table."];
ss_view_product_featured_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Product Featured' table."];
ss_view_product_featured_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Product Featured' table."];
ss_view_product_featured_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Product Featured' table."];

// ss_view_product_price table
ss_view_product_price_addTip=["",spacer+"This option allows all members of the group to add records to the 'Product Price' table. A member who adds a record to the table becomes the 'owner' of that record."];

ss_view_product_price_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Product Price' table."];
ss_view_product_price_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Product Price' table."];
ss_view_product_price_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Product Price' table."];
ss_view_product_price_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Product Price' table."];

ss_view_product_price_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Product Price' table."];
ss_view_product_price_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Product Price' table."];
ss_view_product_price_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Product Price' table."];
ss_view_product_price_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Product Price' table, regardless of their owner."];

ss_view_product_price_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Product Price' table."];
ss_view_product_price_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Product Price' table."];
ss_view_product_price_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Product Price' table."];
ss_view_product_price_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Product Price' table."];

// ss_view_product_regular_price table
ss_view_product_regular_price_addTip=["",spacer+"This option allows all members of the group to add records to the 'Product regular price' table. A member who adds a record to the table becomes the 'owner' of that record."];

ss_view_product_regular_price_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Product regular price' table."];
ss_view_product_regular_price_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Product regular price' table."];
ss_view_product_regular_price_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Product regular price' table."];
ss_view_product_regular_price_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Product regular price' table."];

ss_view_product_regular_price_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Product regular price' table."];
ss_view_product_regular_price_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Product regular price' table."];
ss_view_product_regular_price_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Product regular price' table."];
ss_view_product_regular_price_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Product regular price' table, regardless of their owner."];

ss_view_product_regular_price_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Product regular price' table."];
ss_view_product_regular_price_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Product regular price' table."];
ss_view_product_regular_price_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Product regular price' table."];
ss_view_product_regular_price_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Product regular price' table."];

// ss_view_product_sale_price table
ss_view_product_sale_price_addTip=["",spacer+"This option allows all members of the group to add records to the 'Product sale price' table. A member who adds a record to the table becomes the 'owner' of that record."];

ss_view_product_sale_price_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Product sale price' table."];
ss_view_product_sale_price_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Product sale price' table."];
ss_view_product_sale_price_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Product sale price' table."];
ss_view_product_sale_price_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Product sale price' table."];

ss_view_product_sale_price_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Product sale price' table."];
ss_view_product_sale_price_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Product sale price' table."];
ss_view_product_sale_price_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Product sale price' table."];
ss_view_product_sale_price_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Product sale price' table, regardless of their owner."];

ss_view_product_sale_price_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Product sale price' table."];
ss_view_product_sale_price_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Product sale price' table."];
ss_view_product_sale_price_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Product sale price' table."];
ss_view_product_sale_price_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Product sale price' table."];

// ss_view_product_sale_price_dates_from table
ss_view_product_sale_price_dates_from_addTip=["",spacer+"This option allows all members of the group to add records to the 'Product sale price dates from' table. A member who adds a record to the table becomes the 'owner' of that record."];

ss_view_product_sale_price_dates_from_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Product sale price dates from' table."];
ss_view_product_sale_price_dates_from_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Product sale price dates from' table."];
ss_view_product_sale_price_dates_from_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Product sale price dates from' table."];
ss_view_product_sale_price_dates_from_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Product sale price dates from' table."];

ss_view_product_sale_price_dates_from_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Product sale price dates from' table."];
ss_view_product_sale_price_dates_from_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Product sale price dates from' table."];
ss_view_product_sale_price_dates_from_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Product sale price dates from' table."];
ss_view_product_sale_price_dates_from_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Product sale price dates from' table, regardless of their owner."];

ss_view_product_sale_price_dates_from_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Product sale price dates from' table."];
ss_view_product_sale_price_dates_from_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Product sale price dates from' table."];
ss_view_product_sale_price_dates_from_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Product sale price dates from' table."];
ss_view_product_sale_price_dates_from_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Product sale price dates from' table."];

// ss_view_product_sale_price_dates_to table
ss_view_product_sale_price_dates_to_addTip=["",spacer+"This option allows all members of the group to add records to the 'Product sale price dates to' table. A member who adds a record to the table becomes the 'owner' of that record."];

ss_view_product_sale_price_dates_to_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Product sale price dates to' table."];
ss_view_product_sale_price_dates_to_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Product sale price dates to' table."];
ss_view_product_sale_price_dates_to_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Product sale price dates to' table."];
ss_view_product_sale_price_dates_to_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Product sale price dates to' table."];

ss_view_product_sale_price_dates_to_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Product sale price dates to' table."];
ss_view_product_sale_price_dates_to_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Product sale price dates to' table."];
ss_view_product_sale_price_dates_to_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Product sale price dates to' table."];
ss_view_product_sale_price_dates_to_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Product sale price dates to' table, regardless of their owner."];

ss_view_product_sale_price_dates_to_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Product sale price dates to' table."];
ss_view_product_sale_price_dates_to_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Product sale price dates to' table."];
ss_view_product_sale_price_dates_to_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Product sale price dates to' table."];
ss_view_product_sale_price_dates_to_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Product sale price dates to' table."];

// ss_view_product_sku table
ss_view_product_sku_addTip=["",spacer+"This option allows all members of the group to add records to the 'Product Sku' table. A member who adds a record to the table becomes the 'owner' of that record."];

ss_view_product_sku_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Product Sku' table."];
ss_view_product_sku_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Product Sku' table."];
ss_view_product_sku_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Product Sku' table."];
ss_view_product_sku_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Product Sku' table."];

ss_view_product_sku_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Product Sku' table."];
ss_view_product_sku_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Product Sku' table."];
ss_view_product_sku_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Product Sku' table."];
ss_view_product_sku_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Product Sku' table, regardless of their owner."];

ss_view_product_sku_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Product Sku' table."];
ss_view_product_sku_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Product Sku' table."];
ss_view_product_sku_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Product Sku' table."];
ss_view_product_sku_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Product Sku' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
