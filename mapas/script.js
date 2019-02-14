var $ = $ || window.jQuery;

function terapeutaSeleciona(state) {
  var terapeutas = TERAPEUTAS_MAPA[state] || [];
  $('.terapeutas .terapeuta').fadeOff();

  terapeutas.forEach(function(item) {
    $('.terapeutas .terapeuta-' + item).fadeIn();
  });
}