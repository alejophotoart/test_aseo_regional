require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';

$('.datepicker').datepicker({
    dateFormat: 'yyyy/mm/dd',
    changeMonth: true,
    changeYear: true,
    yearRange: '2010:2022',
});