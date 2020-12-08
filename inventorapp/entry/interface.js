$(document).ready(function(){
    a = 0;
   //  alert('hello');
   $('#here_table').append('<tr><td><select id="it' + a +'" name="it' + a + '" class="custom-select prodx"></select></td><td><input class="form-control  rte " required="" type="text" name="dt' + a + '" id="dt' + a + '"></td><td><input class=" form-control rte" required="" type="text" name="rt' + a + '" id="rt' + a + '"></td><td><input class="accx1 form-control rte" required="" type="text" name="cgst' + a + '" id="cgst' + a + '"></td><td><input class="accx form-control rte" required="" type="text" name="sgst' + a + '" id="sgst' + a + '"></td><td><input class="form-control rte" required="" type="text" name="amt' + a + '" id="amt' + a + '"></td><td><button type="button" id="deletebut" name="deletebut" class="btn btn-danger btndeleterowadded">X</button></td></tr>');
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
               $('#here_table').append('<tr><td><select id="it' + a +'" name="it' + a + '" class="custom-select prodx"></select></td><td><input class="form-control  rte " required="" type="text" name="dt' + a + '" id="dt' + a + '"></td><td><input class="form-control rte" required="" type="text" name="rt' + a + '" id="rt' + a + '"></td><td><input class="accx1 form-control rte" required="" type="text" name="cgst' + a + '" id="cgst' + a + '"></td><td><input class="accx form-control rte" required="" type="text" name="sgst' + a + '" id="sgst' + a + '"></td><td><input class="form-control rte" required="" type="text" name="amt' + a + '" id="amt' + a + '"></td><td><button type="button" id="deletebut" name="deletebut" class="btn btn-danger btndeleterowadded">X</button></td></tr>');
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
                   var sgstper = $('#sgst'+num).val();
                   var cgstper = $('#cgst'+num).val();
                   var resc = parseFloat(Math.round((parseFloat(base) * parseFloat(rte)) * parseFloat(cgstper))/100).toFixed(2);
                   
                   var ress = parseFloat(Math.round((parseFloat(base) * parseFloat(rte)) * parseFloat(sgstper))/100).toFixed(2);
                  
                   var res = parseFloat(Math.round((parseFloat(base) * parseFloat(rte)) + parseFloat(resc) + parseFloat(ress))).toFixed(2);
                   $('#amt'+num).val(res);
               });
               $(document).on('click', 'button.btndeleterowadded', function(){
                   $(this).closest('tr').remove();
                   return false;
               });
               $(document).on('keyup','.accx1',function(){
                var element = $(this);
                
                var idx = element.attr('id');
                var num = idx[idx.length -1];
                // alert(idx + ' : ' + num);
                var base = $('#dt' + num).val();
                var rte = $('#rt' + num).val();
                var sgstper = $('#sgst'+num).val();
                var cgstper = $('#cgst'+num).val();
                var resc = parseFloat(Math.round((parseFloat(base) * parseFloat(rte)) * parseFloat(cgstper))/100).toFixed(2);
                
                var ress = parseFloat(Math.round((parseFloat(base) * parseFloat(rte)) * parseFloat(sgstper))/100).toFixed(2);
               
                var res = parseFloat(Math.round((parseFloat(base) * parseFloat(rte)) + parseFloat(resc) + parseFloat(ress))).toFixed(2);
                $('#amt'+num).val(res);
            });
            $(document).on('click', 'button.btndeleterowadded', function(){
                $(this).closest('tr').remove();
                return false;
            });
})