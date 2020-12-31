/*
    ETML
    By : Theo Bensaci
    Date : 08.12.2020
    Desc : toute les fonction de la page search
*/
let phonelist=[];
function ShowPhones(){
    let div=document.getElementById("PhoneResult");
    phonelist.forEach(element => {
        div.appendChild(element.slot)
    });
}

function AddPhoneSlot(name, imagesource, price, url){
    phonelist.push(new PhoneSlot(name,imagesource,price,url));
}

function PhoneSlotClean(){
    phonelist=[];
    ShowPhones();
}


//ajoute un nouveau filtre à au filtres os
// name=nom du filtre, href=line de resultat
function AddOsFiltrer(name, href){
    let div=document.getElementById("filltrer-content-os");
    let filtrer=document.createElement("A");
    filtrer.innerHTML=name;
    filtrer.href=href;
    div.appendChild(filtrer);
}

//ajoute un nouveau filtre à au filtres constructeur
// name=nom du filtre, href=line de resultat
function AddConstFiltrer(name, href){
    let div=document.getElementById("filltrer-content-const");
    let filtrer=document.createElement("A");
    filtrer.innerHTML=name;
    filtrer.href=href;
    div.appendChild(filtrer);
}

//ajoute un nouveau filtre à au filtres top
// name=nom du filtre, href=line de resultat
function AddTopFiltrer(name, href){
    let div=document.getElementById("filltrer-content-top");
    let filtrer=document.createElement("A");
    filtrer.innerHTML=name;
    filtrer.href=href;
    div.appendChild(filtrer);
}

//ajoute un nouveau filtre à au filtres oder
// name=nom du filtre, href=line de resultat
function AddOderFiltrer(name, href){
    let div=document.getElementById("filltrer-content-oder");
    let filtrer=document.createElement("A");
    filtrer.innerHTML=name;
    filtrer.href=href;
    div.appendChild(filtrer);
}
