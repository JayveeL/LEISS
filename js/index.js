var totalPrice = 0;
function checkThis(thisValue, thisID){
    var getValue = thisValue.value.split("-");
    var id = thisID+"id";

    if($("#"+thisID).is(':checked')){
      var newDamage = "<tr id ="+id+" class='damagedListClass'>";
          newDamage +="<td>"+getValue[0]+" "+getValue[1]+"</td>";
          newDamage +="<td>"+getValue[2]+"</td>";
          newDamage +="</td>";
      totalPrice += parseInt(getValue[2]);    

      $("#damagedEquipments").append(newDamage);
    }
    else{
      if($(".returnItem").is(':checked')){
        $(".returnItem").prop('checked', false);
      }
      $("#"+id).remove();
      totalPrice -= parseInt(getValue[2]);
    }
    $("#price").html(totalPrice);
}

$(".returnItem").click(function(){
  var table = document.getElementById('damagedList');
  var items = table.getElementsByClassName('boxCheck');

  if($(this).is(':checked')){
      var list = document.getElementById('damagedEquipments').getElementsByClassName('damagedListClass');
      console.log('length', list.length);
      for (var i = 0; i < items.length; i++) {
        var item = items[i].value.split("-");
        var id = item[0]+"id";
        var checkExists = false;

        if(list.length != 0){
          for(var j = 0; j < list.length; j++){
            if(id == list[j].id){
              checkExists = true;
              break;
            }
          }
          if(false == checkExists){
              var newDamage = "<tr id ="+id+" class='damagedListClass'>";
                  newDamage +="<td>"+item[0]+" "+item[1]+"</td>";
                  newDamage +="<td>"+item[2]+"</td>";
                  newDamage +="</td>";

                $("#damagedEquipments").append(newDamage);
                totalPrice += parseInt(item[2]);
          }
        }else{
           var newDamage = "<tr id ="+id+" class='damagedListClass'>";
              newDamage +="<td>"+item[0]+" "+item[1]+"</td>";
              newDamage +="<td>"+item[2]+"</td>";
              newDamage +="</td>";

          $("#damagedEquipments").append(newDamage);
          totalPrice += parseInt(item[2]);    
        }
        $(".boxCheck").prop('checked', true);
     }
  }
  else{
      for (var i = 0; i < items.length; i++) {
        $(".boxCheck").prop('checked', false);
      }
      $("#damagedEquipments").html('');
      totalPrice = 0;
  }
  $("#price").html(totalPrice);
});


function viewEquipmentHistory(viewThisEquipment, thisName){
    console.log(thisName);
    $("#vehModal .modal-title").html(thisName);
}
$(document).ready(function(){
    $("#addBtn").click(function(){
      $("#addBtn").attr("data-toggle", "modal");
      var htmlString = $(this).html();
       if(htmlString=="Add Laboratory"){
          $("#addBtn").attr("data-target", "#addLab");
       }
       if(htmlString=="Add Equipment"){
          $("#addBtn").attr("data-target", "#addEqpmnt");
       }
    });
});
