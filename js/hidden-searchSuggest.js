function hiddenSearch(){
    var s=document.querySelector('.searchSuggest-text2');
    s.style.display = 'block';
    document.querySelector('#Search').style.display ='block';
    document.querySelector('#Suggest').style.display ='none';
}
function hiddenSuggest(){
    var s=document.querySelector('.searchSuggest-text1');
    s.style.display = 'block';
    document.querySelector('#Search').style.display ='none';
    document.querySelector('#Suggest').style.display ='block';
}

