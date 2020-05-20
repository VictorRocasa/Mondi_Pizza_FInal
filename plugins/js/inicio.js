$(document).ready(function () {
    
    $("#login").click(function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        $('#loader').css('display', 'block');
        $('body').css('overflowY', 'hidden');
        $('#navbar').hide();
    });

    $('#loader').css('display', 'none');
    $('body').css('overflowY', 'auto');
});

function informacoesFilial(indice){
    var local = $('#rowFilial_' + indice).attr("data-local");
    var telefone = $('#rowFilial_' + indice).attr("data-telefone");
    var whatsapp = $('#rowFilial_' + indice).attr("data-whatsapp");
    dialog = bootbox.dialog({
        message: '<p class="text-center mb-0"> Mondi Pizza - '+ local +'/MG </p> <br> <p style="cursor: pointer;"><i class="fa fa-phone" aria-hidden="true"></i> '+ telefone +'</p><a style="color: #000; border-bottom: 0px;" target="_blank" href="https://api.whatsapp.com/send?phone=55'+ whatsapp +'&text=Olá,%20gostaria%20de%20pedir%20uma%20pizza!"><i class="fa fa-whatsapp" aria-hidden="true"></i> '+ whatsapp +'</p>',
        closeButton: true
    });
}

function editCardapio(id){
      $('#model').modal('show');
      $('#modelTitle').html('Edite as informações');
    $.post('viewEditarCardapio.php',function (retorna) {
        //Subtitui o valor no seletor id="externas"
        $("#modelBody").html(retorna);
      alert(retorna);
      });

}