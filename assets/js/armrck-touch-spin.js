/*
 * Yii2 Touch Input Spin customizado
 * @author Armando Ricardo Nogueira - armandoricky@gmail.com* 
 */

/** 
 * ACRÉSCIMO [+]
 * @param {event} e
 * **/
$(document).on('click', '.acrescimo', function (e) {
    e.preventDefault;
    var currentEntry = $(this).parents('.armrck-touchspin-entry:first');
    var input = $(currentEntry.find('.input-spin'))[0];
    if (input.value === "") {
        input.value = 0;
    }
    input.value = parseInt(input.value, 10) + 1;
});

/** 
 * DECRÉSCIMO [-]
 * @param {event} e
 **/
$(document).on('click', '.decrescimo', function (e) {
    e.preventDefault;
    var currentEntry = $(this).parents('.armrck-touchspin-entry:first');
    var input = $(currentEntry.find('.input-spin'))[0];
    if (input.value === "") {
        input.value = 0;
    }
    var decrescimo = parseInt(input.value) - 1;
    input.value = decrescimo < 1 ? 0 : decrescimo;
});

/** 
 * ALTERAR PROPRIEDADES DOS BOTÕES E/OU REMOVER ENTRADAS DE CAMPO
 * Ref: armrck-touchspin CLONE ENTRY
 * @param {event} e
 **/
$(document).on('click', '.armrck-touchspin-add', function (e) {
    e.preventDefault();

    // Posicionando no elemento pai do filho clicado
    var currentEntry = $(this).parents('.armrck-touchspin-entry:first');
    var currentDataKey = $(this).parents('.armrck-touchspin-entry:first').data('key');

    // Pegando valores dos campos filhos
    var firstInputValue = currentEntry.find('input:first').val();
    var lastInputValue = currentEntry.find('input:last').val();

    // Não permitir próximos scripts para adicionar (clonar)
    if (!firstInputValue || !lastInputValue) {
        if (typeof swal !== 'undefined' || typeof sweetAlert === "function") {
            swal({
                title: 'Opss!',
                text: 'Preencha todos os campos',
                type: 'warning',
                timer: 3000
            }).catch(swal.noop);
        } else {
            alert('Preencha todos os campos');
        }
        return false;
    }

    var armTouchspinList = $('.armrck-touchspin-list');
    var newEntry = $(currentEntry.clone().attr('data-key', currentDataKey + 1)).appendTo('.armrck-touchspin-list');

    // Alterar attributo "name" de cada campo da nova entrada
    var firstInputName = newEntry.find('input:first').attr('name');
    var lastInputName = newEntry.find('input:last').attr('name');

    newEntry.find('input:first').attr('name', firstInputName.replace(/\d+/, currentDataKey + 1));
    newEntry.find('input:last').attr('name', lastInputName.replace(/\d+/, currentDataKey + 1));

    // Campos em branco
    newEntry.find('input').val('').attr('tabindex', currentDataKey + 1);

    // Desabilitar o primeiro botao 
    armTouchspinList.find('.armrck-touchspin-entry:first .armrck-touchspin-add')
            .removeClass('armrck-touchspin-add')
            .removeClass('btn-success').addClass('btn-default').prop('disabled', true);

    // Inverter os botoes de adicionar campo para remover campo da lista
    armTouchspinList.find('.armrck-touchspin-entry:not(:last) .armrck-touchspin-add')
            .removeClass('armrck-touchspin-add').addClass('armrck-touchspin-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<i class="fa fa-minus" aria-hidden="true"></i> Campo');

    // Posicionar cursor dentro do novo campo
    newEntry.find('input:last').focus();
}).on('click', '.armrck-touchspin-remove', function (e) {
    // Remover item
    $(this).parents('.armrck-touchspin-entry:first').remove();
    e.preventDefault();
    return false;
});