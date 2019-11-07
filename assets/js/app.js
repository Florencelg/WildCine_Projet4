/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../scss/app.scss');
import "bootstrap";
// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

const $ = require('jquery');

$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://api.themoviedb.org/3/authentication/guest_session/new?api_key=89eb9a166ca8bb55eb3f96deb8e8104f",
    "method": "GET",
    "headers": {},
    "data": "{}"
}

$.ajax(settings).done(function (response) {
    console.log(response);
});