var Paginator = {};
Paginator.Pager = function() {
    this.elementsPerPage = 1;
    this.currentPage = 1;
    this.pagingControlsContainer = "#pagingControls";
    this.pagingContainerPath = "#content";
    
    this.numPages = function() {
        var numPages = 0;
        if (this.elements != null && this.elementsPerPage != null) {
            numPages = Math.ceil(this.elements.length / this.elementsPerPage);
        }
        
        return numPages;
    };
    
    this.showPage = function(page) {
        this.currentPage = page;
        var html = "";
        for (var i = (page-1)*this.elementsPerPage; i < ((page-1)*this.elementsPerPage) + this.elementsPerPage; i++) {
            if (i < this.elements.length) {
                var elem = this.elements.get(i);
                html += "<" + elem.tagName + ">" + elem.innerHTML + "</" + elem.tagName + ">";
            }
        }
        
        $(this.pagingContainerPath).html(html);
        
        renderControls(this.pagingControlsContainer, this.currentPage, this.numPages());
    }
    
    var renderControls = function(container, currentPage, numPages) {
        var pagingControls = "<ul>";
        for (var i = 1; i <= numPages; i++) {
            if (i != currentPage) {
                pagingControls += "<li><a href='#' onclick='pager.showPage(" + i + "); return false;'>" + i + "</a></li>";
            } else {
                pagingControls += "<li>" + i + "</li>";
            }
        }        
        pagingControls += "</ul>";        
        $(container).html(pagingControls);
    }
}