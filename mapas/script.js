var $ = $ || window.jQuery;

function terapeutaSeleciona(state) {
  console.log(state);
  var terapeutas = TERAPEUTAS_MAPA[state] || [];
  $('.terapeutas .terapeuta').fadeOut();
  $('#map .state').removeClass('selected');
  
  $('#map #state_' + state.toLowerCase()).addClass('selected');

  terapeutas.forEach(function(item) {
    $('.terapeutas .terapeuta-' + item).fadeIn();
  });
}

(function($){
  $('#uf-select').on('change', function(){
    var value = $(this).val();
    terapeutaSeleciona(value);
  })
})(window.jQuery)