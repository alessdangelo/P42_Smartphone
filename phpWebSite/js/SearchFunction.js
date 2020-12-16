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