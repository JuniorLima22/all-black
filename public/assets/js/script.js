$(document).ready(function () {
    $('.load').fadeOut('slow', function () {
        $('#btn_cadastrar_editar').text($('form').attr('name'));
    });

    $(".alert-dismissible").fadeTo(10000, 500).slideUp(500, function () {
        $(".alert-dismissible").alert('close');
    });
});

$('#btn_cadastrar_editar').on('click', function () {
    $(this).prop('disabled', true).text('Salvando...');
    $(this).prepend(`<span id="load-button" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> `);
    $('form').submit();
});
