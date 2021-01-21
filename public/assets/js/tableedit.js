$(document).ready(function(){
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token' : $("input[name=_token]").val()
      }
    });
  
    $('#editable').Tabledit({
      url:'{{ route("tabledit.action") }}',
      dataType:"json",
      columns:{
        identifier:[0, 'k_id'],
        editable:[[1, 'k_nama'], [2, 'k_bobot']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
        if(data.action == 'delete')
        {
          $('#'+data.k_id).remove();
        }
      }
    });
  
  });