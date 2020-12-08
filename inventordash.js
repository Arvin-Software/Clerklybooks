function startTime() {
    // var d = new Date("2015-03-25");
     var today = new Date();
     var h = today.getHours();
     var m = today.getMinutes();
     var day = today.getDate();
     var mon = today.getMonth() + 1;
     var year = today.getFullYear();
     var datebuild = day + "/" + mon + "/" + year
     var s = today.getSeconds();
     h = checkTime(h);
     m = checkTime(m);
     s = checkTime(s);
     $('#dt').html("Time : " + h + ":" + m + ":" + s + "  |  Date : " + datebuild);
     var t = setTimeout(startTime, 500);
 }
 function checkTime(i) {
     if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
     return i;
 }
 $(document).ready(function(){
     startTime();
 });
$(document).ready(function(){
    // document.getElementById('id01').style.display='block';
    $('#comp').click(function(){
        $("#tar").attr("src", "inventorapp/pages/mtrl.php");
        $('#comp').addClass("btn-col");
        $('#users').removeClass("btn-col");
        
        $('#modul').removeClass("btn-col");
        $('#invoi').removeClass("btn-col");
        $('#srb').removeClass("btn-col");
        $('#gin').removeClass("btn-col");
        $('#supp').removeClass("btn-col");
        $('#grn').removeClass("btn-col");
        $('#dash').removeClass("btn-col");
        $("#navbarWEX").removeClass("show");
        $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Inventory");
    })
    $('#users').click(function(){
        $("#tar").attr("src", "inventorapp/purchaseorder/po.php");
        
        $('#users').addClass("btn-col");
        $('#comp').removeClass("btn-col");
        $('#modul').removeClass("btn-col");
        $('#invoi').removeClass("btn-col");
        $('#srb').removeClass("btn-col");
        $('#gin').removeClass("btn-col");
        $('#supp').removeClass("btn-col");
        $('#grn').removeClass("btn-col");
        $('#dash').removeClass("btn-col");
        $("#navbarWEX").removeClass("show");
        $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Purchase Order");
    })
    $('#modul').click(function(){
        $("#tar").attr("src", "inventorapp/entry/deliverychalan.php");
        
        $('#modul').addClass("btn-col");
        $('#users').removeClass("btn-col");
        $('#comp').removeClass("btn-col");
        $('#invoi').removeClass("btn-col");
        $('#srb').removeClass("btn-col");
        $('#gin').removeClass("btn-col");
        $('#supp').removeClass("btn-col");
        $('#grn').removeClass("btn-col");
        $('#dash').removeClass("btn-col");
        $("#navbarWEX").removeClass("show");
        $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  EWay Bill /DC Entry");
    })
    $('#invoi').click(function(){
        $("#tar").attr("src", "inventorapp/entry/invoice.php");
        $('#invoi').addClass("btn-col");
        $('#users').removeClass("btn-col");
        $('#comp').removeClass("btn-col");
        $('#modul').removeClass("btn-col");
        $('#srb').removeClass("btn-col");
        $('#gin').removeClass("btn-col");
        $('#supp').removeClass("btn-col");
        $('#grn').removeClass("btn-col");
        $('#dash').removeClass("btn-col");
        $("#navbarWEX").removeClass("show");
        $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Invoice Entry");
    })
    $('#srb').click(function(){
        $("#tar").attr("src", "inventorapp/pages/srb.php");
        
        $('#srb').addClass("btn-col");
        $('#users').removeClass("btn-col");
        $('#comp').removeClass("btn-col");
        $('#modul').removeClass("btn-col");
        $('#invoi').removeClass("btn-col");
        $('#gin').removeClass("btn-col");
        $('#supp').removeClass("btn-col");
        $('#grn').removeClass("btn-col");
        $('#dash').removeClass("btn-col");
        $("#navbarWEX").removeClass("show");
        $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Stock register book");
    })
    $('#gin').click(function(){
        $("#tar").attr("src", "inventorapp/gin/gin.php");
        $('#gin').addClass("btn-col");
        $('#users').removeClass("btn-col");
        $('#comp').removeClass("btn-col");
        $('#modul').removeClass("btn-col");
        $('#invoi').removeClass("btn-col");
        $('#srb').removeClass("btn-col");
        $('#supp').removeClass("btn-col");
        $('#grn').removeClass("btn-col");
        $('#dash').removeClass("btn-col");
        $("#navbarWEX").removeClass("show");
        $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Goods issue note");
    })
    $('#supp').click(function(){
        $("#tar").attr("src", "inventorapp/supplier.php");
        $('#supp').addClass("btn-col");
        $('#users').removeClass("btn-col");
        $('#comp').removeClass("btn-col");
        $('#modul').removeClass("btn-col");
        $('#invoi').removeClass("btn-col");
        $('#srb').removeClass("btn-col");
        $('#gin').removeClass("btn-col");
        $('#grn').removeClass("btn-col");
        $('#dash').removeClass("btn-col");
        $("#navbarWEX").removeClass("show");
        $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Supplier");
    })
    $('#grn').click(function(){
        $("#tar").attr("src", "inventorapp/grn/stockentry.php");
        
        $('#grn').addClass("btn-col");
        $('#users').removeClass("btn-col");
        $('#comp').removeClass("btn-col");
        $('#modul').removeClass("btn-col");
        $('#invoi').removeClass("btn-col");
        $('#srb').removeClass("btn-col");
        $('#gin').removeClass("btn-col");
        $('#supp').removeClass("btn-col");
        $('#dash').removeClass("btn-col");
        $("#navbarWEX").removeClass("show");
        $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a> /  Goods Received Note");
    })
    $('#dash').click(function(){
        $("#tar").attr("src", "app/dash.php");
        
        $('#dash').addClass("btn-col");
        $('#users').removeClass("btn-col");
        $('#comp').removeClass("btn-col");
        $('#modul').removeClass("btn-col");
        $('#invoi').removeClass("btn-col");
        $('#srb').removeClass("btn-col");
        $('#gin').removeClass("btn-col");
        $('#supp').removeClass("btn-col");
        $('#grn').removeClass("btn-col");
        $("#navbarWEX").removeClass("show");
        $('#navg').html("Clerkly Books</a> / <a href=\"inventordash.php\" class=\"navigator\">Inventor</a>");
    })
})