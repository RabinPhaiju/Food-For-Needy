function showSuggest() {
    var el = document.querySelector('.suggest-hide');
    el.style.display = 'block';
    document.querySelector('.suggestAnchor').style.display = 'none';
}

function showSearch() {
    var ed = document.querySelector('.search-suggest .search input[type=button]');
    ed.style.display = 'block';
}