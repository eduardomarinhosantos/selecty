$(function() {

    $('.data').datepicker({
        language: "pt-BR"
    });

    $("#editar").validate({
        rules: {
            instituicao: { required: true },
            data_inicio: { required: true },
            data_termino: { required: true },
            descricao: { required: true }            
        },
        messages: {
            instituicao: "O campo Instituição é obrigatório",
            data_inicio: "O campo Data de Início é obrigatório", 
            data_termino: "O campo Data de Término é obrigatório", 
            descricao: "O campo Descrição é obrigatório",
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});