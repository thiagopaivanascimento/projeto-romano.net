//Função de Máscara

//Máscara para CPF
function mascara_cpf() { 
if(document.FormCli.txtCPF.value.length == 3) { 
document.FormCli.txtCPF.value += '.'; 
} 
if(document.FormCli.txtCPF.value.length == 7) {
document.FormCli.txtCPF.value += '.'; 
}
if(document.FormCli.txtCPF.value.length == 11) { 
document.FormCli.txtCPF.value += '-'; 
}
}
//Máscara para Telefone
function mascara_telefone() {
if(document.FormCli.txtTel.value.length == 2) {
document.FormCli.txtTel.value += ' ';
}
if(document.FormCli.txtTel.value.length == 7) {
document.FormCli.txtTel.value += '-';
}
}
//Máscara para CEP
function mascara_cep() {
if(document.FormCli.txtCEP.value.length == 5) {
document.FormCli.txtCEP.value += '-';
}
}
