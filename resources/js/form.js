function incre(){
    var a=parseInt(document.getElementById("bagqt").value);
    var b=a+1;
    document.getElementById("bagqt").value=b;
}
function decre(){
    
    var a=parseInt(document.getElementById("bagqt").value);
    if(a==0){
        document.getElementById("bagqt").value="0";
    }
    else{
    var b=a-1;
    document.getElementById("bagqt").value=b;
    }
}