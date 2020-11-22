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
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const classificacao = JSON.parse(this.responseText);
            let htmlConteudoTabela = '';

            for (let classificado of classificacao) {
                htmlConteudoTabela += '<tr>';

                htmlConteudoTabela += `<td>${classificado.posicao}</td>`
                htmlConteudoTabela += `<td>${classificado.clube}</td>`
                htmlConteudoTabela += `<td><strong>${classificado.pontos}</strong></td>`
                htmlConteudoTabela += `<td>${classificado.jogos_disputados}</td>`
                htmlConteudoTabela += `<td>${classificado.vitorias}</td>`
                htmlConteudoTabela += `<td>${classificado.empates}</td>`
                htmlConteudoTabela += `<td>${classificado.derrotas}</td>`
                htmlConteudoTabela += `<td>${classificado.gols_pro}</td>`
                htmlConteudoTabela += `<td>${classificado.gols_contra}</td>`
                htmlConteudoTabela += `<td>${classificado.saldo_gol}</td>`
                
                htmlConteudoTabela += '</tr>';
            }

            $("#ConteudoTabela").html(htmlConteudoTabela);
        }
    };
    
    xhttp.open("POST", "http://127.0.0.1:8000/classificacao/atualiza", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`timeCasa=${timeCasa}&golTimeCasa=${golTimeCasa}&timeVisitante=${timeVisitante}&golTimeVisitante=${golTimeVisitante}`);
}