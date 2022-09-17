$(function() {

    $('.data').datepicker({
        language: "pt-BR"
    });

    $("#editar").validate({
        rules: {
            empresa: { required: true },
            data_admissao: { required: true },
            data_demissao: { required: true },
            descricao: { required: true }            
        },
        messages: {
            empresa: "O campo Nome é obrigatório",
            data_admissao: "O campo Data de Admissão é obrigatório", 
            data_demissao: "O campo Data de Demissão é obrigatório", 
            descricao: "O campo Descrição é obrigatório",
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});