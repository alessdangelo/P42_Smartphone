class PhoneSlot{
    constructor(name, imageSource, price, pageUrl){
        this.name=name;
        this.imageSource=imageSource;
        this.price=price;
        this.pageUrl=pageUrl;
        this.slot=document.createElement("div");
        this.Create();
    }

    //Crée le slots dans un div
    Create(){
        this.slot=document.createElement("div");
        this.slot.className="PhoneSlots";

        let phoneImage=document.createElement("Image");
        phoneImage.source=this.imageSource;

        let h2=document.createElement("h2");
        h2.innerHTML=this.name;
        this.slot.appendChild(h2)

        let image=(document.createElement("IMG"));
        image.src=this.imageSource;
        this.slot.appendChild(image);

        let h3=document.createElement("h3");
        h3.innerHTML=this.price+".-";

        this.slot.appendChild(h3);

        let more=document.createElement("a");
        more.href=this.pageUrl;

        let h3More=document.createElement("h2");
        h3More.innerHTML="More";
        more.appendChild(h3More);
        this.slot.appendChild(more);
    }
}
class PhoneShow{
    constructor(divName,name, imageSource, backgroundSource, info, price, pageUrl){
        this.SceenName=divName;
        this.name=name;
        this.imageSource=imageSource;
        this.backgroundSource=backgroundSource;
        this.info=info;
        this.price=price;
        this.pageUrl=pageUrl;
    }
    
    //charge l'object sur la page
    Load(){
        let sceen=document.getElementById(this.SceenName);
        sceen.style.backgroundImage="url("+this.backgroundSource+")";
        sceen.querySelector("#PhoneInfo").querySelector("a").href=this.pageUrl;
        sceen.querySelector("#PhoneInfo").querySelector("a").querySelector("#PhoneImage").src=this.imageSource;
        sceen.querySelector("#PhoneInfo").querySelector("#Desc").querySelector("h1").innerHTML=this.name;
        let elements = sceen.querySelector("#PhoneInfo").querySelector("#Desc").querySelectorAll("h2");
        for (var i = 0; i < elements.length; i++) {
            sceen.querySelector("#PhoneInfo").querySelector("#Desc").removeChild(elements[i]);
        }
        for (var i = 0; i < this.info.length; i++){
            let value=document.createElement("h2");
            value.innerHTML=this.info[i];
            sceen.querySelector("#PhoneInfo").querySelector("#Desc").appendChild(value)
        }
        sceen.querySelector("#Price").innerHTML=this.price+".-";
    }
}