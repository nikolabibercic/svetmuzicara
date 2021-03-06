//Kada se skupi navbar, klikom na ikonicu toggle dobija se ili se uklanja meni
var toggle = document.getElementById('checkBtn');
toggle.onclick = function(){
    var ul = document.getElementById('navBarUl');

    if(ul.style.left === "-100%" || ul.style.left === ""){
        ul.style.left = "0";
        ul.style.transition = ".5s ease";
    }else{
        ul.style.left = "-100%";
        ul.style.transition = ".5s ease";
    }
}

//Na klik imput forme za search prikazuju se dodatne opcije za pretragu
var search = document.getElementById('search');
search.onclick = function(){
    var checkBox = document.getElementById('checkBox');
    checkBox.style.display = "flex";

    var city = document.getElementById('city');
    city.style.display = "flex";

    var unhideExtraSearch = document.getElementById('unhideExtraSearch');
    unhideExtraSearch.style.display = "flex";

    var categoryId = document.getElementById('categoryId');
    categoryId.style.display = "flex";
}

//Na klik dugmeta "ukloni dodatnu pretragu" uklanjaju se dodatne opcije za pretragu
var unhideExtraSearch = document.getElementById('unhideExtraSearch');
unhideExtraSearch.onclick = function(){
    var checkBox = document.getElementById('checkBox');
    checkBox.style.display = "none";

    var city = document.getElementById('city');
    city.style.display = "none";

    var categoryId = document.getElementById('categoryId');
    categoryId.style.display = "none";

    unhideExtraSearch.style.display = "none";
}

//Slider
var slider_content = document.getElementById('box');
var image = ['uploads/harmonika.jpg','uploads/gitara.jpg','uploads/bubnjevi.jpg'];
var i = image.length;

function nextImage(){

    if(i<image.length){
        i = i + 1;
    }else{
        i = 1;
    }
    slider_content.innerHTML = "<img src="+image[i-1]+">";
}

function prewImage(){
    if(i<image.length+1 && i>1){
        i = i-1;
    }else{
        i = image.length;
    }
    slider_content.innerHTML = "<img src="+image[i-1]+">";
}
