//Fun��o de M�scara

//M�scara para CPF
function mascara_cpf() { 
if(document.FormFunc.txtCPF.value.length == 3) { 
document.FormFunc.txtCPF.value += '.'; 
} 
if(document.FormFunc.txtCPF.value.length == 7) {
document.FormFunc.txtCPF.value += '.'; 
}
if(document.FormFunc.txtCPF.value.length == 11) { 
document.FormFunc.txtCPF.value += '-'; 
}
}
//M�scara para Telefone
function mascara_telefone() {
if(document.FormFunc.txtTel.value.length == 2) {
document.FormFunc.txtTel.value += ' ';
}
if(document.FormFunc.txtTel.value.length == 7) {
document.FormFunc.txtTel.value += '-';
}
}
//M�scara para CEP
function mascara_cep() {
if(document.FormFunc.txtCEP.value.length == 5) {
document.FormFunc.txtCEP.value += '-';
}
}