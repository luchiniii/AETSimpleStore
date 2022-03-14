# Simple Shop

AET is building the next Amazon (not really...)!!!

The project in this repo contains a basic laravel starter project with vue scaffolding.

Your task is to complete at least 2 of the tasks below in 1-2 hours.

Do not worry about authentication.

Laravel should serve as your JSON API and Vue your frontend.

The main idea is that there are two types of users, vendors and buyers. Vendors sell products on the site and Buyers come to the site to well...buy products. 

Again, you don't have to worry about authentication or authorization. You can simply create pages that a Vendor or a Buyer would use on the site.

## Tasks

1. Allow vendors to create products to sell on the marketplace
1. Build a simple landing page that shows a paginated list of products
1. Allow vendors to see the ratings of their products
1. Build a details page that shows description, price, rating and category of a product
1. Allow search of product by name, category and vendor
1. Allow sorting by product by price and name
1. Allow rating to be submitted for products
1. Provide an easy way to seed data for all models

## Setting up

1. `composer install`
2. `yarn` / `npm i`
3. `yarn watch` / `npm run watch`
4. `php artisan serve`
5. Open browser to [http://localhost:8000](http://localhost:8000)


## For testing the changes:

1. Run `php artisan migrate`
2. Run `php artisan db:seed`

running these commands the system will create 
- 2 types of users (Buyer and Vendor).
- 2 vendor users and 2 buyers users.
- 2 product categories ('Cell Phones', 'Computers')
- 10 products from Computer category for vendor user 'A'. 
- 10 products from Cell Phone category for vendor user 'B'.
- all products from vendor user 'A' will have 1 review from Buyer user 'A' and 1 review from Buyer user 'B'.

## list of avaliable routes:

![availabe-routes](https://user-images.githubusercontent.com/2814231/158122771-aa688620-a4b9-4d82-8942-988a2da7d40d.png)
