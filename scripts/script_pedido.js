//Função de Máscara

//Máscara para CPF
function mascara_cpf() { 
if(document.FormPed.txtCPF.value.length == 3) { 
document.FormPed.txtCPF.value += '.'; 
} 
if(document.FormPed.txtCPF.value.length == 7) {
document.FormPed.txtCPF.value += '.'; 
}
if(document.FormPed.txtCPF.value.length == 11) { 
document.FormPed.txtCPF.value += '-'; 
}
}
//Máscara para Telefone
function mascara_telefone() {
if(document.FormPed.txtTel.value.length == 2) {
document.FormPed.txtTel.value += ' ';
}
if(document.FormPed.txtTel.value.length == 7) {
document.FormPed.txtTel.value += '-';
}
}
//Máscara para valor
function mascara_valor1() {
if(document.FormPed.preco_med.value.length == 2) {
document.FormPed.preco_med.value += ',';
}
}
function mascara_valor2() {
if(document.FormPed.preco_fam.value.length == 2) {
document.FormPed.preco_fam.value += ',';
}
}
function mascara_valor3() {
if(document.FormPed.preco_gig.value.length == 2) {
document.FormPed.preco_gig.value += ',';
}
}

