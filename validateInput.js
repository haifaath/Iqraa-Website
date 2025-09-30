var bookId;
var title;
var stock;
var price;
var helpText;

function init(){
    title = document.getElementById("title");
    author=document.getElementById("bookauthor");
    desc=document.getElementById("bookDesc");
    stock = document.getElementById("stock");
    pages=document.getElementById("pgs");
    price = document.getElementById("price");
    genre=document.getElementById("genre");
  //  var pic=<?php $_FILES["image-upload"]["name"]?>
    //console.log(pic);
    helpText = document.getElementById("helpText");
    var myForm = document.getElementById("myForm");
    myForm.onsubmit = validate;
    myForm.onreset = clear;
}

function validate(){
    var errTitle="";
    var errAuthor="";
    var errDesc="";
    var errStock="";
    var errPages="";
    var errPrice="";
    var errGenre="";
    var errPic="";
    var flag=true;

    if (title.value==""){
        errTitle = "Enter book title.<br/>";
        title.style.border= "2px solid red";
        flag=false;
    }
    if (author.value==""){
        errAuthor = "Enter book author.<br/>";
        bookauthor.style.border= "2px solid red";
        flag=false;
    }
    if (desc.value==""){
        errDesc = "Enter book description.<br/>";
        bookDesc.style.border= "2px solid red";
        flag=false;
    }

    if (stock.value==""){
        errStock = "Enter book stock availability.<br/>";
        stock.style.border= "2px solid red";
        flag=false;
    }
    else if(!stock.value.match(/^[0-9]+$/)){
        errStock = "Book stock contains numbers only.<br/>";
        stock.style.border= "2px solid red";
        flag=false;
    }
    if (pages.value==""){
        errPages = "Enter number of pages.<br/>";
        pgs.style.border= "2px solid red";
        flag=false;
    }
    else if(!pages.value.match(/^[0-9]+$/)){
        errPages = "Number of pages contains numbers only.<br/>";
        pgs.style.border= "2px solid red";
        flag=false;
    }
    if (price.value==""){
        errPrice = "Enter book price in SAR.<br/>";
        price.style.border= "2px solid red";
        flag=false;
    }
    else if(!price.value.match(/^[0-9]+$/)){
        errPrice = "Book price contains numbers only.<br/>";
        price.style.border= "2px solid red";
        flag=false;
    }
    if (genre.value==""){
        errGenre = "Enter book genre.<br/>";
        genre.style.border= "2px solid red";
        flag=false;
    }
 //  if (pic==null) {
   //   errPic= "Select book image.<br/>";
  //      flag=false;
    //}

    if (flag==false){
        msgTitle.innerHTML = errTitle;
        msgAuthor.innerHTML=errAuthor;
        msgBookDesc.innerHTML=errDesc;
        msgStock.innerHTML=errStock;
        msgPages.innerHTML = errPages;
        msgPrice.innerHTML = errPrice;
        msgGenre.innerHTML=errGenre;
        msgPic.innerHTML=errPic;
    }
    return flag;
}

function clear(){
    return confirm("Are you sure you want to reset?");
}

window.addEventListener("load",init,false);