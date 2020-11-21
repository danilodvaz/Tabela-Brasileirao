function insereConfronto() {
    const modalInserirConfronto = $("#ModalInserirConfronto");

    const timeCasa = $("#InputTimeCasa").val();
    const golTimeCasa = $("#InputGolTimeCasa").val();
    const timeVisitante = $("#InputTimeVisitante").val();
    const golTimeVisitante = $("#InputGolTimeVisitante").val();




    return true;
}

function validarInsercaoConfronto(timeCasa, golTimeCasa, timeVisitante, golTimeVisitante) {
    if (!timeCasa || !timeVisitante || !golTimeCasa || !golTimeVisitante) {
        alert("Favor preencher todos os campos");
        return false;
    }

    if (golTimeCasa < 0 || golTimeVisitante < 0) {
        alert("A quantidade de gols, deve ser maior ou igual a zero");
        return false;
    }
    
    return false;
}