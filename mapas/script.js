var $ = $ || window.jQuery;

function terapeutaSeleciona(state) {
  console.log(state);
  var terapeutas = TERAPEUTAS_MAPA[state] || [];
  $('.terapeutas .terapeuta').fadeOut();

  terapeutas.forEach(function(item) {
    $('.terapeutas .terapeuta-' + item).fadeIn();
  });
}