// Reseta o formulário do modal, limpando os inputs.
$("#ModalInserirConfronto").on("shown.bs.modal", () => {
    $('.formulario-modal').trigger('reset');
});

function insereConfronto() {
    try {
        const modalInserirConfronto = $("#ModalInserirConfronto");

        const timeCasa = $("#InputTimeCasa").val();
        const golTimeCasa = $("#InputGolTimeCasa").val();
        const timeVisitante = $("#InputTimeVisitante").val();
        const golTimeVisitante = $("#InputGolTimeVisitante").val();

        validarInsercaoConfronto(timeCasa, golTimeCasa, timeVisitante, golTimeVisitante);

        atualizaClassificacao(timeCasa, golTimeCasa, timeVisitante, golTimeVisitante);

        modalInserirConfronto.modal('hide');
    } catch (e) {
        alert(e);
    }
}

function validarInsercaoConfronto(timeCasa, golTimeCasa, timeVisitante, golTimeVisitante) {
    if (!timeCasa || !timeVisitante || !golTimeCasa || !golTimeVisitante) {
        throw "Favor preencher todos os campos";
    }

    if (golTimeCasa < 0 || golTimeVisitante < 0) {
        throw "A quantidade de gols, deve ser maior ou igual a zero";
    }

    return true;
}

function atualizaClassificacao(timeCasa, golTimeCasa, timeVisitante, golTimeVisitante) {
    const dados = {
        timeCasa, golTimeCasa, timeVisitante, golTimeVisitante
    };
}