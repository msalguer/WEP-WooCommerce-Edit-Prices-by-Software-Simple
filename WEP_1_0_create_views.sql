CREATE VIEW `ss_view_product_featured` AS select `wp_postmeta`.`post_id` as `id`, `wp_postmeta`.`post_id` AS`post_id`,`wp_postmeta`.`meta_value` AS `featured` from `wp_posts` join `wp_postmeta` where ((`wp_posts`.`ID` = `wp_postmeta`.`post_id`) and(`wp_postmeta`.`meta_key` = '_featured') and (`wp_posts`.`post_type` = 'product'));

CREATE VIEW `ss_view_product_price` AS select `wp_postmeta`.`post_id` AS `id`,`wp_postmeta`.`post_id` AS`post_id`,`wp_postmeta`.`meta_value` AS `price` from `wp_posts` join `wp_postmeta` where ((`wp_posts`.`ID` = `wp_postmeta`.`post_id`) and(`wp_postmeta`.`meta_key` = '_price') and (`wp_posts`.`post_type` = 'product'));

CREATE VIEW `ss_view_product_regular_price` AS select `wp_postmeta`.`post_id` AS `id`,`wp_postmeta`.`post_id` AS`post_id`,`wp_postmeta`.`meta_value` AS `regular_price` from `wp_posts` join `wp_postmeta` where ((`wp_posts`.`ID` = `wp_postmeta`.`post_id`) and(`wp_postmeta`.`meta_key` = '_regular_price') and (`wp_posts`.`post_type` = 'product'));

CREATE VIEW `ss_view_product_sale_price` AS select `wp_postmeta`.`post_id` AS `id`,`wp_postmeta`.`post_id` AS`post_id`,`wp_postmeta`.`meta_value` AS `sale_price` from `wp_posts` join `wp_postmeta` where ((`wp_posts`.`ID` = `wp_postmeta`.`post_id`) and(`wp_postmeta`.`meta_key` = '_sale_price') and (`wp_posts`.`post_type` = 'product'));

CREATE VIEW `ss_view_product_sale_price_dates_from` AS select `wp_postmeta`.`post_id` AS `id`,`wp_postmeta`.`post_id` AS`post_id`,`wp_postmeta`.`meta_value` AS `sale_price_dates_from` from `wp_posts` join `wp_postmeta` where ((`wp_posts`.`ID` = `wp_postmeta`.`post_id`) and(`wp_postmeta`.`meta_key` = '_sale_price_dates_from') and (`wp_posts`.`post_type` = 'product'));

CREATE VIEW `ss_view_product_sale_price_dates_to` AS select `wp_postmeta`.`post_id` AS `id`,`wp_postmeta`.`post_id` AS`post_id`,`wp_postmeta`.`meta_value` AS `sale_price_dates_to` from `wp_posts` join `wp_postmeta` where ((`wp_posts`.`ID` = `wp_postmeta`.`post_id`) and(`wp_postmeta`.`meta_key` = '_sale_price_dates_to') and (`wp_posts`.`post_type` = 'product'));

CREATE VIEW `ss_view_product_sku` AS select `wp_postmeta`.`post_id` AS `id`,`wp_postmeta`.`post_id` AS`post_id`,`wp_postmeta`.`meta_value` AS `sku` from `wp_posts` join `wp_postmeta` where ((`wp_posts`.`ID` = `wp_postmeta`.`post_id`) and(`wp_postmeta`.`meta_key` = '_sku') and (`wp_posts`.`post_type` = 'product'));

CREATE VIEW `ss_view_product_description` AS select `p`.`ID` AS`post_id`,`p`.`post_title` AS `title`,`p`.`post_excerpt` AS `excerpt`,`p`.`post_status` AS `post_status` from `wp_posts` `p` where (`p`.`post_type` = 'product');

