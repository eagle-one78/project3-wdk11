var pager = new Paginator.Pager();

$(document).ready(function() {
    pager.elemetsPerPage = 1; // set amount elements per page
    pager.pagingContainer = $('#content'); // set of main container
    pager.elements = $('li', pager.pagingContainer); // set of required containers
    pager.showPage(1);
});