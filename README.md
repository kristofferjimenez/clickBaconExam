clickBacon Exam

by Kristoffer Jimenez

Laravel Framework
MySQL Database
Bootstrap CSS
jQuery

VIEWS FOLDER STRUCTURE

master
    |_ layout.blade.php
pages
    |_ category
            |_ edit.blade.php
            |_ index.blade.php
            |_ new.blade.php
    |_ sales
            |_ edit.blade.php
            |_ index.blade.php
            |_ new.blade.php

JS

delete.category.js      // For deleting categories
delete.sales.js         // For deleting sales
sales.calculator.js     // For calculating total of sales

CONTROLLERS

CategoryController
SaleController

MODELS

Category
Sale
SalesItem

MIGRATIONS

create_categories_table
create_sales_table
create_sales_items_table
