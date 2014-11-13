WEP-WooCommerce-Edit-Prices-by-Software-Simple
==============================================

DESCRIPTION

    Script made on PHP-MySQL, that made possible edit products and prices created
    on Wordpress-WooCommerce, with the objetive of rapid updates.
    
    Includes a user management environment


Update Product Fields:

    Title: Product Title
    excerpt: Description
    post_status: Product Status: Publish/ draft
    Featured: yes/no
    Price: real price
    Regular Price: previous price (only with sale price)
    Sale Price: Offer price (must equal to price field, if not null)
    Sale price dates from: Optional (only with vale on sale price). Begin offer date
    Sale price dates to: Optional (only with vale on sale price). Ending offer date
    Sku: Product code (read only)

Limitations:

    Only update
    Not support edit prices with products variations (products with more than one price)
    The tool is not ideal, but it speeds up the work


USE

    For edit prices: only modify on price field
    
    For edit sale/offer prices: 
    Example:
        If a product cost 8$, and sale price is 6$, you fill: 
        field price: 10$
        field sale price: 10$
        field regular price: 8$


INSTALLATION

1.- Execute SQL sentences on Wordpress-WooCommerce Database. 

      Please, BEFORE REVIEW THAT DATABASE NOT CONTAINS TABLES OR VIEWS WITH THESE NAMES:
      
          ss_view_product_featured
          ss_view_product_price
          ss_view_product_regular_price
          ss_view_product_sale_price
          ss_view_product_sale_price_dates_from
          ss_view_product_sale_price_dates_to
          ss_view_product_sku
          ss_view_product_description
          
      SQL file to execute on PHPMyAdmin, for example: WEP_1_0_create_views.sql


2.-Extract files 

      WEP_1_0.zip file on public_html or web root folder
      
      It create a WEP folder name. You can install in other folder.


3.-Open url: 

      http://domain.ext/WEP
      or
      https://domain.ext/WEP
      
      The first time execute https://domain.ext/WEP/setup.php file, 
      runs a wizard that create automatically config.php configuration.
      
      You need know:
          
          database server
          database name
          user database
          user password


RECOMMEND USING FIRST DEVELOPMENT ENVIRONMENTS. 

USE AT YOUR OWN RISK. 

VIEW LICENSE FILE


Made with AppGini.
