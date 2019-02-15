var $ = $ || window.jQuery;

function terapeutaSeleciona(state) {
  var terapeutas = TERAPEUTAS_MAPA[state] || [];
  $('.terapeutas .terapeuta').addClass('hide');
  $('#map .state').removeClass('selected');
  
  $('#map #state_' + state.toLowerCase()).addClass('selected');

  $('#uf-select').val(state);
  terapeutas.forEach(function(item) {
    $('.terapeutas .terapeuta-' + item).removeClass('hide');
  });
}

(function($){
  $('#uf-select').on('change', function(){
    var value = $(this).val();
    terapeutaSeleciona(value);
  })
})(window.jQuery)