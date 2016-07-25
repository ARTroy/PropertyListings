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
});

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