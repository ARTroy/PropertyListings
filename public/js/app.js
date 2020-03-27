$(document).ready(function(){
  $(document).foundation();

  $('#resi').click(function(){
    var comm_but = $('#comm'); 
    comm_but.removeClass('selected');
    $(this).addClass('selected');
    
    var comm = $('#comm_select');
    var resi = $('#resi_select');

    comm.hide();
    resi.show();
    
    comm.find('input').each(function(){ 
      $(this).prop('checked', false); } );

    comm.find('input:radio').prop( "disabled", true );
    resi.find('input:radio').prop( "disabled", false );

    //    comm.find('input:radio').removeProp('checked');
  });
  $('#comm').click(function(){
    var resi_but = $('#resi'); 
    resi_but.removeClass('selected');
    $(this).addClass('selected');

    var resi = $('#resi_select');
    var comm = $('#comm_select');

    resi.hide();  
    comm.show();
    
    resi.find('input').each(function(){ 
      $(this).prop('checked', false); });

    resi.find('input:radio').prop( "disabled", true );
    comm.find('input:radio').prop( "disabled", false );
  });



  $('#resi2').click(function(){
    var comm_but = $('#comm2'); 
    comm_but.removeClass('selected');

    var resi = $('#resi_select');
    var comm = $('#comm_select');

    comm.prop( "disabled", true );
    resi.prop( "disabled", false );

    comm.hide();  
    resi.show();

    comm.find('option').each(function(){ 
      $(this).prop('selected', false); 
    });
    $('resi_unset').prop( "selected", true );

    $(this).addClass('selected');
    comm_but.find('input').prop('checked', false);  
    $(this).find('input').prop('checked', true); 
  });

  $('#comm2').click(function(){
    var resi_but = $('#resi2'); 
    resi_but.removeClass('selected');
    
    var resi = $('#resi_select');
    var comm = $('#comm_select');
    
    resi.hide();  
    comm.show();

    resi.prop( "disabled", true );
    comm.prop( "disabled", false );
    
   
    resi.find('option').each(function(){ 
      $(this).prop('selected', false); 
    });
    $('comm_unset').prop( "selected", true );


    $(this).addClass('selected');
    resi_but.find('input').prop('checked', false);  
    $(this).find('input').prop('checked', true);
  });


  $(document).on('moved.zf.slider', function(){
    var new_min = parseFloat($('#min_slider').val());
    var new_max = parseFloat($('#max_slider').val());
    new_min = format1(new_min, "£");

    if(new_max == 1250000){
      new_max = '£ 1,250,000+';
    } else {
      new_max = format1(new_max, "£");
    }

    $('#min_slider_span').html(new_min);
    $('#max_slider_span').html(new_max);
  });
});

function format1(n, currency) {
    return currency + " " + n.toFixed(0).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
    });
}

/*
$(document).ready(function(){

  var thumb = $('img#thumb');        

  new AjaxUpload('imageUpload', {
    action: $('form#newHotnessForm').attr('action'),
    name: 'image',
    onSubmit: function(file, extension) {
      $('div.preview').addClass('loading');
    },
    onComplete: function(file, response) {
      thumb.load(function(){
        $('div.preview').removeClass('loading');
        thumb.unbind();
      });
      thumb.attr('src', response);
    }
  });
  
});*/