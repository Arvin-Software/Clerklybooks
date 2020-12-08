$(document).ready(function(){
    a = 0;
   //  alert('hello');
   $('#here_table').append('<tr><td><select id="it' + a +'" name="it' + a + '" class="custom-select prodx"></select></td><td><input class="form-control  rte " required="" type="text" name="dt' + a + '" id="dt' + a + '"></td><td><input class="accx form-control rte" required="" type="text" name="rt' + a + '" id="rt' + a + '"></td><td><button type="button" id="deletebut" name="deletebut" class="btn btn-danger btndeleterowadded">&times;</button></td></tr>');
   // a += 1;
   
               $.post("../../classes/inventorapi.php",
               {
                   id: "t",
                   name: "Donald Duck",
                   city: "Duckburg"
               },
               function(data, status){
                   // $('#contentx').html(data);
                   // alert(data);
                   myObj = JSON.parse(data);
                   // alert(myObj[1]);
                   // alert(myObj[0]);
                   
                   for(i=1; i<=myObj[0]; i++){
                       
                   $('#it' + a).append('<option>' + myObj[i] + '</option>');
                   }
                   $('#here_table').append('');
                   a += 1;
                   $('#totprod').val(a);
               })
               $('#addbut').click(function(){
                  
               // alert('hello');
               $('#here_table').append('<tr><td><select id="it' + a +'" name="it' + a + '" class="custom-select prodx"></select></td><td><input class="form-control  rte " required="" type="text" name="dt' + a + '" id="dt' + a + '"></td><td><input class="accx form-control rte" required="" type="text" name="rt' + a + '" id="rt' + a + '"></td><td><button type="button" id="deletebut" name="deletebut" class="btn btn-danger btndeleterowadded">&times;</button></td></tr>');
               $.post("../../classes/inventorapi.php",
               {
                   id: "t",
                   name: "Donald Duck",
                   city: "Duckburg"
               },
               function(data, status){
                   // $('#contentx').html(data);
                   // alert(data);
                   myObj = JSON.parse(data);
                   // alert(myObj[1]);
                   // alert(myObj[0]);
                   
                   for(i=1; i<=myObj[0]; i++){
                       
       $('#it' + a).append('<option>' + myObj[i] + '</option>');
                   }
                   $('#here_table').append('');
                   a += 1;
                   $('#totprod').val(a);
               })
               })
               
               $(document).on('keyup','.accx',function(){
                   var element = $(this);
                   
                   var idx = element.attr('id');
                   var num = idx[idx.length -1];
                   // alert(idx + ' : ' + num);
                   var base = $('#dt' + num).val();
                   var rte = $('#rt' + num).val();
                   
                   var resc = parseFloat(Math.round((parseFloat(base) * parseFloat(rte)))).toFixed(2);
                   $('#amt'+num).val(resc);
               });
               $(document).on('click', 'button.btndeleterowadded', function(){
                   $(this).closest('tr').remove();
                   return false;
               });
})