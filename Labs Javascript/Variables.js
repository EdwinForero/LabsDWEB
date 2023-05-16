var total = 0;
var aux = 0;

suma(1,3);
resta(3,1);

function suma (a,b){
    aux = a+b;
    total = aux;
    console.log(total);
}

function resta(a,b){
    var aux = a-b;
    total = aux;
    console.log(total);
}