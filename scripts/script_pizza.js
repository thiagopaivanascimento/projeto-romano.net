//Máscara para valor
function mascara_valor1() {
if(document.FormPizza.preco_med.value.length == 2) {
document.FormPizza.preco_med.value += ',';
}
}
function mascara_valor2() {
if(document.FormPizza.preco_fam.value.length == 2) {
document.FormPizza.preco_fam.value += ',';
}
}
function mascara_valor3() {
if(document.FormPizza.preco_gig.value.length == 2) {
document.FormPizza.preco_gig.value += ',';
}
}
