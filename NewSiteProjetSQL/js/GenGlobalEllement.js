/*
    ETML
    by : Theo Bensaci
    Date : 02.12.2020
    Desc : génère les élément commun a toute les pages, genre le footer
*/
function GenEllement(){
    //Footer 
    let footer=document.querySelector("Footer");
    let div=document.createElement("div");
    let logo=document.createElement("IMG");
    logo.src="../oder/Image/LogoShort.png";
    div.appendChild(logo);
    let ul=document.createElement("ul");

    let creditContent = [];
    creditContent.push(document.createElement("li"));
    creditContent[creditContent.length-1].innerHTML="dsads";
    creditContent.forEach(element => {
        ul.appendChild(element);
    });
    
    div.appendChild(ul);
    footer.appendChild(div);
}