jQuery(function($) {
    
   // var pageParts = $("#content tr");
    var pageParts = $(".paginate");
    var numPages = pageParts.length;
    var perPage = 5;

    pageParts.slice(perPage).hide();

    $("#page-nav").pagination({
        items: numPages,
        itemsOnPage: perPage,
        cssStyle: "light-theme",

        onPageClick: function(pageNum) {

            var start = perPage * (pageNum - 1);
            var end = start + perPage;

            pageParts.hide()
                     .slice(start, end).show();
        }
    });
});