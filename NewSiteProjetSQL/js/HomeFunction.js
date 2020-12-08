/*
    ETML
    By : Theo Bensaci
    Date : 25.11.2020
    Desc : toute les fonction qui sont utiliser dans la page home
*/
let indexSwitch=0;
let indexShowSwitch=0;
let phoneSlots=[];
let phoneShowSlots=[];

//phone show
function reloadPhoneShow(index){
    let div=document.getElementById("PhoneShow");
    phoneShowSlots[index].Load();
    div.classList.remove("CreateAnimation");
    void div.offsetWidth;
    div.classList.add("CreateAnimation");
}

function switchShowSlot(index){
    reloadPhoneShow(index);
    indexShowSwitch=index;
    switchBntSelected(document.getElementById("PhoneShow").querySelector("#PageView"),"PageBnt",indexShowSwitch)
}

function IncrementShowIndex(){
    if(indexShowSwitch<4){
        indexShowSwitch++;
    }
    else{
        indexShowSwitch=0;
    }
    
    reloadPhoneShow(indexShowSwitch);
    switchBntSelected(document.getElementById("PhoneShow").querySelector("#PageView"),"PageBnt",indexShowSwitch)
}

function SupstractShowIndex(){
    if(indexShowSwitch>0){
        indexShowSwitch--;
    }
    else{
        indexShowSwitch=4;
    }
    reloadPhoneShow(indexShowSwitch);
    switchBntSelected(document.getElementById("PhoneShow").querySelector("#PageView"),"PageBnt",indexShowSwitch)
}


//switch phone
function switchSlot(indexValue){
    indexSwitch=indexValue;
    let div=document.getElementById("PhoneContender");
    let elements = document.querySelectorAll(".PhoneSlots");
    for (var i = 0; i < elements.length; i++) {
        div.removeChild(elements[i]);
    }
    for (var i = 0; i < 3; i++) {
        div.appendChild(phoneSlots[(indexValue*3)+i].slot);
    }
    switchBntSelected(document.getElementById("PhoneList").querySelector("#PageView"),"PageBnt",indexSwitch);

}


function switchBntSelected(div,bntClass, index){
    let elements = div.querySelectorAll("."+bntClass);
    for (var i = 0; i < elements.length; i++) {
        elements[i].id="";
        if(i==index){
            elements[i].id="Selected";
        }
    }
}


function IncrementIndex(){
    if(indexSwitch<4){
        indexSwitch++;
    }
    else{
        indexSwitch=0;
    }
    
    switchSlot(indexSwitch)
    switchBntSelected(document.getElementById("PhoneList").querySelector("#PageView"),"PageBnt",indexSwitch)
}

function SupstractIndex(){
    if(indexSwitch>0){
        indexSwitch--;
    }
    else{
        indexSwitch=4;
    }
    switchSlot(indexSwitch)
    switchBntSelected(document.getElementById("PhoneList").querySelector("#PageView"),"PageBnt",indexSwitch)
}

function genPhoneListe(){
    /*for (var i = 0; i < 3; i++) {
        phoneSlots.push(new PhoneSlot("Phone Name n°"+phoneSlots.length,"../oder/Image/PhoneDefaultImage.png",phoneSlots.length*10,""))
        phoneSlots.push(new PhoneSlot("Phone Name n°"+phoneSlots.length,"../oder/Image/Iphone12.png",phoneSlots.length*10,""))
        phoneSlots.push(new PhoneSlot("Phone Name n°"+phoneSlots.length,"../oder/Image/HuaweiP40.png",phoneSlots.length*10,""))
        phoneSlots.push(new PhoneSlot("Phone Name n°"+phoneSlots.length,"../oder/Image/samsungA51.png",phoneSlots.length*10,""))
        phoneSlots.push(new PhoneSlot("Phone Name n°"+phoneSlots.length,"../oder/Image/XiamiMi10Pro.png",phoneSlots.length*10,""))
    }

    phoneShowSlots.push(new PhoneShow("PhoneShow","Phone Name n°"+phoneShowSlots.length,"../oder/Image/PhoneDefaultImage.png","../oder/Image/PhoneShowBackground"+(phoneShowSlots.length+1)+".jpg",["126 GB","16 MPX","3200x4000px"],phoneShowSlots.length*1000,""))
    phoneShowSlots.push(new PhoneShow("PhoneShow","Phone Name n°"+phoneShowSlots.length,"../oder/Image/Iphone12.png","../oder/Image/PhoneShowBackground"+(phoneShowSlots.length+1)+".jpg",["126 GB","16 MPX","3200x4000px"],phoneShowSlots.length*1000,""))
    phoneShowSlots.push(new PhoneShow("PhoneShow","Phone Name n°"+phoneShowSlots.length,"../oder/Image/HuaweiP40.png","../oder/Image/PhoneShowBackground"+(phoneShowSlots.length+1)+".jpg",["126 GB","16 MPX","3200x4000px"],phoneShowSlots.length*1000,""))
    phoneShowSlots.push(new PhoneShow("PhoneShow","Phone Name n°"+phoneShowSlots.length,"../oder/Image/samsungA51.png","../oder/Image/PhoneShowBackground"+(phoneShowSlots.length+1)+".jpg",["126 GB","16 MPX","3200x4000px"],phoneShowSlots.length*1000,""))
    phoneShowSlots.push(new PhoneShow("PhoneShow","Phone Name n°"+phoneShowSlots.length,"../oder/Image/XiamiMi10Pro.png","../oder/Image/PhoneShowBackground"+(phoneShowSlots.length+1)+".jpg",["126 GB","16 MPX","3200x4000px"],phoneShowSlots.length*1000,""))
    switchShowSlot(0);
    switchSlot(0);*/
}

function addPhoneSlot(name, imagesource, price, url){
    phoneSlots.push(new PhoneSlot(name,imagesource,price,url));
}

function addPhoneShowSlot(name, imagesource, background, infoArray, price, url){
    phoneShowSlots.push(new PhoneShow(name,imagesource,background,infoArray,price,url));
}

function switchBnt(index, idDiv){
    let child=document.getElementById(idDiv).children;
    for (var i = 0; i < child.length; i++) {
        if(child.classname=="PageBnt"){
            console.log(i);
        }
    }
}