# Purpose
A simple template to write PHP applications.
## Todo
- [ ] Create a base function for the routing API, e.g.:
```php
Route::GET("/")->render("home.php"); // GET /

Route::base("/about");
Route::GET("/home")->render("about_home.php"); // GET /about/home
```
- [ ] Wildcard endpoint rendering
