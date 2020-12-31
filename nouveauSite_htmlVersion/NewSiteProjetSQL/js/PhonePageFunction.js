/*
    ETML
    By : Theo Bensaci
    Date : 16.12.2020
    Desc : toute les fonction qui sont utiliser dans les page phone
*/

//mette un background random pour le tel
function GetNewWallpaper(){
    let sceen=document.getElementById("PhoneSceen");
    sceen.style.backgroundImage="url(../oder/Image/PhonePageBackground/"+Math.floor(Math.random() * 4)+".jpg)";
}
//ajoute un info dans les caratectirstique du telephone
function AddInfo(infoTitle, infoText){
    let table=document.getElementById("Caracteristique").childNodes[1];
    let tr=document.createElement("TR");
    let title=document.createElement("TD");
    title.innerHTML=infoTitle;
    let text=document.createElement("TD");
    text.innerHTML=infoText;
    tr.appendChild(title);
    tr.appendChild(text);
    table.appendChild(tr);
}

//setup le titre du tel et ça photo
function SetUpPhone(phoneName,phoneImagePath){
    document.getElementById("PhoneTitle").innerHTML=phoneName
    document.getElementById("PhoneImage").style.source=phoneImagePath;
}