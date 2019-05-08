$(document).ready(function(){
  
  var $resSexe=$('#resSex'),$resAge=$('#resAge'),$sexe=$('#sexe'),$age=$('#age');

  var $bntModal=$('#btnModal');

  var sexe=$sexe.val();
  var age=$age.val();

function defaultQ(x){
  if (x == 0) {
    return '<span class="badge badge-danger">No</span>';
  }
  else{
    return '<span class="badge badge-success">OK</span>';
  }
};

 $resAge.append(defaultQ(age));
 $resSexe.append(defaultQ(sexe));


  var $btnOpen=$('.fa-bars'), $btnClose=$('#btnClose'), $pannel=$('#pannel'),  
      $btn=$("#btnNbr"), $result=$('#result'), $possibilitées=$('#possibilitées');

  $btnOpen.click(function() {
    $pannel.fadeIn();
    $btnOpen.hide();
  });
  $btnClose.click(function() {
    $pannel.fadeOut();
    $btnOpen.show();
  });
  $btn.click(function() {
    
    $result.html('');
    var nbr=$possibilitées.val();

    for (var i = 0; i < nbr; i++) {
      
      $result.append("<div class=\"form-group\"><label for=\"formGroupExampleInput\">Possibilitée "+(i+1)+"</label><input type=\"text\" class=\"form-control\" id=\"formGroupExampleInput\" placeholder=\"Entrer une possibilitée\" name=\"possibilitées"+i+"\"></div>");

    }
  });

  $bntModal.click(function(){

    var id=$btnModal.value;
    
    console.log(id);
    
    $('.modal-body').html(id);
  
  })

$('#updateModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var libel = button.data('libel')

  // window.location.href = "admin-update.php?id="+id; 

  var modal = $(this)
  modal.find('.modal-title').text('Question : ' + libel)
  modal.find('#modalId').val(id)

  document.cookie="profile_viewer_uid="+button.data('id');
  console.log(document.cookie);
})

})