/**
 * 
 * 
 */

require('./test');



// :: JS Partials

let $ = jQuery;
$(function ($) {
    $('.abstract-typography-wysiwyg-editor-standard-small__text-block').matchHeight({
        byRow: true,
        property: 'height'
    });

    // console.log('matchHeight test 2');

});


require('./js-partials/js-partial-acf-map.js');
require('./js-partials/js-partial-show-hide');
require('./js-partials/js-partial-menu-show-hide');
require('./js-partials/js-partial-abstract-typography-modified-list-toggle-control');
require('./js-partials/js-partial-primary-nav-toggle');
require('./js-partials/js-partial-primary-nav-hover');
