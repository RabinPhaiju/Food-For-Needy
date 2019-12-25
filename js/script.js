function showSuggest() {
    var el = document.querySelector('.suggest-hide');
    el.style.display = 'block';
    document.querySelector('.suggestAnchor').style.display = 'none';
    document.querySelector('.suggestAnchor1').style.display = 'inline';
}
function showSuggest1(){
    var el = document.querySelector('.suggest-hide');
    el.style.display = 'none';
    document.querySelector('.suggestAnchor').style.display = 'inline';
    document.querySelector('.suggestAnchor1').style.display = 'none';
}

function showSearch() {
    var ed = document.querySelector('.search-suggest .search input[type=button]');
    ed.style.display = 'block';
}