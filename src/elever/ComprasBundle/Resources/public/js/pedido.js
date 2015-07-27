/**
 * Created by Andre on 08/07/2015.
 */

function getSubSegmento(value)
{
    $.ajax({
        url: '/compras/subsegmento/getsubsegmento/' + value,
        type: 'POST',
        data: {idSegmento: value},
        error: function () {
            $('#info').html('<p>An error has occurred</p>');
        },
        success: function (data) {
            $(".subsegmento").html(data);
        }
    });
}

function getRegras(value, action)
{
    $.ajax({
        url: '/compras/regra/getregra/' + action  + '/' + value,
        type: 'POST',
        data: {id: value, action: action},
        error: function () {
            $('#info').html('<p>An error has occurred</p>');
        },
        success: function (data) {
            $("#regra_"+action).remove();
            if(data.length > 3)
                $('.listregras').show();

            $("#listItemRegra").append(data);
        }
    });
}


$(function () {

    $('#elever_comprasbundle_ebproduto_idSegmento').change(function () {
        getRegras( $(this).val(), "segmento");
        return getSubSegmento( $(this).val());
    });

    $('#elever_comprasbundle_ebproduto_idProdutoCategoria').change(function(){
        return getRegras( $(this).val(), "categoria");
    });

    $('#elever_comprasbundle_ebproduto_idEmpresa').change(function(){
        return getRegras( $(this).val(), "empresa");
    });

});

$( document ).ready(function() {
    getSubSegmento($('#elever_comprasbundle_ebproduto_idSegmento').val());
    getRegras($('#elever_comprasbundle_ebproduto_idSegmento').val(), "segmento");
    getRegras($('#elever_comprasbundle_ebproduto_idEmpresa').val(), "empresa");
    getRegras($('#elever_comprasbundle_ebproduto_idProdutoCategoria').val(), "categoria");
});
