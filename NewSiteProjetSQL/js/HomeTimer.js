let i = 0;
let timer=10000;

while(true){
    if(i<timer){
        i++
    }
    else{
        i=0;
        IncrementIndex();
        IncrementShowIndex();
    }
    console.log(i);
}