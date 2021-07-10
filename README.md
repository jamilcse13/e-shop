## Here we use

* 1. Seeder for our custom value.
* 2. A BaseController where we defined the basic methods which are needed frequently.
* 3. SettingServiceProvider for Settings options.
* 4. Created Traits 
* 5. Created BaseRepositories which implements BaseContract which is generated the common methods like create, update etc.
* 6. Created Contracts- BaseContract Interface.
* 7. used config.auth, Exceptions.Handler for authentication issue
* 8. used php artisan storage:link for generating storage link
* 9. used CategoryContract & CategoryRepository for creatong category operation
* 10. used RepositoryServiceProvider for binding CategoryContract & CategoryRepository
* 11. created Attributes(size, color) and AtttributeValues(size category, color category)
* 12. used vueJS for Attribute Value page
* 13. for vueJS, i needed to change resource/app.js, webpack,mix.js, added vue-swal packages on package.json, run 'npm install', 
* 14. Created Contact and Repository file.
* 15. for Brands, it like categories.

* 16.  Here are some features, which we would like to implement in our products.
## design database for products, we followed 
* A product will belong to a Brand.
* A product will belong to many categories and a category will have many products.
* As we know most of the eCommerce websites display multiple images for a product. So we need to have a model for images, then we can define a product have many images features.
* A product also can have many attributes with different quantity and price.

##
* You might be wondering, we already have the quantity column in products table, so why have it in the product attributes table.
The only reason for defining the quantity in both tables is, there can be some products which don’t have attributes. So we can use the quantity column from the products table. Hope, I cleared the point.
* we created a pivot table to link ProductAttribute with the AttributeValue.
* The whole reason for taking this approach is to access the attribute values with different price and quantity for a given product.

* 17. used NestableTrait for nested listing. just used nest() and listsFlattened() methods for category list.
* 18. send categories to site.partials.nav from ViewComposerServiceProvider.

