# Purpose
A simple template to write PHP applications.
## Todo
- [ ] Create a base function for the routing API, e.g.:
```php
Route::GET("/")->render("home.php");

$about = Route::base("/about");
$about::GET("/home")->render("about_home.php"); // GET /about/home
```
```
```
