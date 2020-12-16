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
function ReloadPhoneShow(index){
    let div=document.getElementById("PhoneShow");
    phoneShowSlots[index].Load();
    div.classList.remove("CreateAnimation");
    void div.offsetWidth;
    div.classList.add("CreateAnimation");
}

function switchShowSlot(index){
    ReloadPhoneShow(index);
    indexShowSwitch=index;
    SwitchBntSelected(document.getElementById("PhoneShow").querySelector("#PageView"),"PageBnt",indexShowSwitch)
}

function IncrementShowIndex(){
    if(indexShowSwitch<4){
        indexShowSwitch++;
    }
    else{
        indexShowSwitch=0;
    }
    
    ReloadPhoneShow(indexShowSwitch);
    SwitchBntSelected(document.getElementById("PhoneShow").querySelector("#PageView"),"PageBnt",indexShowSwitch)
}

function SupstractShowIndex(){
    if(indexShowSwitch>0){
        indexShowSwitch--;
    }
    else{
        indexShowSwitch=4;
    }
    ReloadPhoneShow(indexShowSwitch);
    SwitchBntSelected(document.getElementById("PhoneShow").querySelector("#PageView"),"PageBnt",indexShowSwitch)
}


//switch phone
function SwitchSlot(indexValue){
    indexSwitch=indexValue;
    let div=document.getElementById("PhoneContender");
    let elements = document.querySelectorAll(".PhoneSlots");
    for (var i = 0; i < elements.length; i++) {
        div.removeChild(elements[i]);
    }
    for (var i = 0; i < 3; i++) {
        div.appendChild(phoneSlots[(indexValue*3)+i].slot);
    }
    SwitchBntSelected(document.getElementById("PhoneList").querySelector("#PageView"),"PageBnt",indexSwitch);

}


function SwitchBntSelected(div,bntClass, index){
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
    
    SwitchSlot(indexSwitch)
    SwitchBntSelected(document.getElementById("PhoneList").querySelector("#PageView"),"PageBnt",indexSwitch)
}

function SupstractIndex(){
    if(indexSwitch>0){
        indexSwitch--;
    }
    else{
        indexSwitch=4;
    }
    SwitchSlot(indexSwitch)
    SwitchBntSelected(document.getElementById("PhoneList").querySelector("#PageView"),"PageBnt",indexSwitch)
}

function AddPhoneSlot(name, imagesource, price, url){
    phoneSlots.push(new PhoneSlot(name,imagesource,price,url));
}

function PhoneSlotClean(){
    phoneSlots=[];
}
function PhoneShowSlotClean(){
    phoneShowSlots=[];
}

function AddPhoneShowSlot(name, imagesource, background, infoArray, price, url){
    phoneShowSlots.push(new PhoneShow(name,imagesource,background,infoArray,price,url));
}

function SwitchBnt(index, idDiv){
    let child=document.getElementById(idDiv).children;
    for (var i = 0; i < child.length; i++) {
        if(child.classname=="PageBnt"){
            console.log(i);
        }
    }
}