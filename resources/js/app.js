require('./jquery-3.3.1.slim.min');
require('./popper.min');
require('./bootstrap.min');
require('./bootstrap');
try {
    require('bootstrap');
} catch (e) {}

window.$ = window.jQuery = require('jquery');
