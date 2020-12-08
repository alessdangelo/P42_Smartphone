/*
    ETML
    By : Theo Bensaci
    Date : 08.12.2020
    Desc : toute les fonction de la page search
*/
let phonelist=[];
function ShowPhones(listPhone){
    let div=document.getElementById("PhoneResult");
    listPhone.forEach(element => {
        div.appendChild(element.slot)
    });
}

function addPhoneSlot(name, imagesource, price, url){
    phonelist.push(new PhoneSlot(name,imagesource,price,url));
}
function genPhoneListe(){
    for (var i = 0; i < 40; i++) {
        phonelist.push(new PhoneSlot("Phone Name n°"+phonelist.length,"../oder/Image/HuaweiP40.png",phonelist.length*10,""))
    }
    ShowPhones(phonelist);
}