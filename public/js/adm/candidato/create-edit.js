$(function() {

    $( "[name='telefone']" ).mask('(99) 99999 9999');

    //Validação Editar
    $("#editar").validate({
        rules: {
            nome: { required: true },
            email: { required: true, email: true },
            telefone: { required: true },
            usuario: { required: true }            
        },
        messages: {
            nome: "O campo Nome é obrigatório",
            email: {
                required: "O campo Email é obrigatório", 
                email: "Insira um Email válido;"
            },
            telefone: "O campo Telefone é obrigatório", 
            usuario: "O campo Usuário é obrigatório",
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});