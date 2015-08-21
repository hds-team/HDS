
function check_thai(ch){
    var len, digit;
    if(ch == " "){
        len=0;
    }else{
        len = ch.length;
    }
    for(var i=0 ; i<len ; i++){
        digit = ch.charAt(i)
        if(!((digit >= "a" && digit <= "z") || (digit >="0" && digit <="9") || (digit >="A" && digit <="Z"))){
            ;
        }else{
            return false;
        }
    }
    return true;
}

function checkthai(idName,idError){
    var str  = document.getElementById(idName).value;   // ถ้าจะนำไปใช้ต้องเปลี่ยน ID ด้วยน้าาค๊าบบบ
    if(!check_thai(str) || str == "" ){
        document.getElementById(idName).value = str.substring(0, str.length -1);
        document.getElementById(idError).innerHTML = "<font style=\"font-size:10px\" >*กรุณาใส่ภาษาไทยเท่านั้น</font>".fontcolor("red");
        //document.getElementById('n').style.backgroundColor= 'red';
    }
    else{
        document.getElementById(idError).innerHTML = null;
        //document.getElementById('n').style.backgroundColor= 'white';
    }
}

function check_eng(ch){
    var len, digit;
    if(ch == " "){
        len=0;
    }else{
        len = ch.length;
    }
    for(var i=0 ; i<len ; i++){
        digit = ch.charAt(i)
        if(((digit >= "a" && digit <= "z") || (digit >="0" && digit <="9") || (digit >="A" && digit <="Z") || (digit==".") || (digit=="/") || (digit=="*") || (digit=="-") || (digit==" ") || (digit=="_") || (digit==";") || (digit==":") || (digit=="'"))){
            ;
        }else{
            return false;
        }
    }
    return true;
}

function checkeng(idName,idError){
    var str  = document.getElementById(idName).value;   // ถ้าจะนำไปใช้ต้องเปลี่ยน ID ด้วยน้าาค๊าบบบ
    if(!check_eng(str) || str == "" ){
        document.getElementById(idName).value = str.substring(0, str.length -1);
        document.getElementById(idError).innerHTML = "<font style=\"font-size:10px\" >กรุณาใส่ภาษาอังกฤษเท่านั้น</font>".fontcolor("red");
        //document.getElementById('n').style.backgroundColor= 'red';
    }
    else{
        document.getElementById(idError).innerHTML = null;
        //document.getElementById('n').style.backgroundColor= 'white';
    }
}

function check_digit(ch){
    var len, digit;
    if(ch == " "){
        len=0;
    }else{
        len = ch.length;
    }
    for(var i=0 ; i<len ; i++){
        digit = ch.charAt(i)
        if(((digit >="0" && digit <="9") || (digit >="๐" && digit <="๙") )){
            ;
        }else{
            return false;
        }
    }
    return true;
}

function checkdigit(idName,idError){
    var str  = document.getElementById(idName).value;   // ถ้าจะนำไปใช้ต้องเปลี่ยน ID ด้วยน้าาค๊าบบบ
    if(!check_digit(str) || str == "" ){
        document.getElementById(idName).value = str.substring(0, str.length -1);
        document.getElementById(idError).innerHTML = "<font style=\"font-size:10px\" >กรุณาใส่ตัวเลขเท่านั้น</font>".fontcolor("red");
        //document.getElementById('n').style.backgroundColor= 'red';
    }
    else{
        document.getElementById(idError).innerHTML = null;
        //document.getElementById('n').style.backgroundColor= 'white';
    }
}
