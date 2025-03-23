<?php

require "../utils/view_handling.php";

render_view(
    "homepage",
    [
        "username" => "<script>console.log('XSS Attack');</script>"
    ],
    [
        "html" => "<h1>Test</h1>"
    ]
);
