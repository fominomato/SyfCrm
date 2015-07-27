/**
 * Created by Andre on 30/06/2015.
 */

$(document).ready(function() {

    /**
     * Adicionando comportamento para adicionar campos ao formulário de cadastro de cliente
     */
    bookIndex = 0;

    $('.addButton').click(function () {
        bookIndex++;
        var $template = $('#enderecoTemplate'),
            $clone = $template
                .clone()
                .removeClass('hide')
                .removeAttr('id')
                .attr('data-book-index', bookIndex)
                .insertBefore($template);

        // Update the name attributes
        $clone
            .find('[name="cep"]').attr('name', 'endereco[' + bookIndex + '].cep').end()
            .find('[name="favorito"]').attr('name', 'endereco[' + bookIndex + '].favorito').end()
            .find('[name="logradouro"]').attr('name', 'endereco[' + bookIndex + '].logradouro').end()
            .find('[name="bairro"]').attr('name', 'endereco[' + bookIndex + '].bairro').end()
            .find('[name="cidade"]').attr('name', 'endereco[' + bookIndex + '].cidade').end()
            .find('[name="uf"]').attr('name', 'endereco[' + bookIndex + '].uf').end();

    });

    $('#newClienteForm').on("click", ".removeButton", function (e)
    {
        e.preventDefault();
        var $row = $(this).parents('.form-group'),
            index = $row.attr('data-book-index');

        // Remove fields
        $('#newClienteForm')
            .find('[name="cep"]').attr('name', 'endereco[' + bookIndex + '].cep').end()
            .find('[name="favorito"]').attr('name', 'endereco[' + bookIndex + '].favorito').end()
            .find('[name="logradouro"]').attr('name', 'endereco[' + bookIndex + '].logradouro').end()
            .find('[name="bairro"]').attr('name', 'endereco[' + bookIndex + '].bairro').end()
            .find('[name="cidade"]').attr('name', 'endereco[' + bookIndex + '].cidade').end()
            .find('[name="uf"]').attr('name', 'endereco[' + bookIndex + '].uf').end();

        // Remove element containing the fields
        $row.remove();
    });
});