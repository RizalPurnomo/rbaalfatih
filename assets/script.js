//Global
function getRibuan($nilai){
  var reverse = $nilai.split('').join();
      ribuan = reverse.match(/\d{1,3}/g);
      ribuan2 = ribuan.join('.').split('').reverse().join('');
    //return ribuan;
    console.log($nilai);
    console.log(reverse);
    console.log(ribuan);
    console.log(ribuan2);
}

function tandaPemisahTitik($b){
  var _minus = false;
  if ($b<0) _minus = true;
  b = $b.toString();
  b=b.replace(".","");
  b=b.replace("-","");
  c = "";
  panjang = b.length;
  j = 0;
  for (i = panjang; i > 0; i--){
    j = j + 1;
    if (((j % 3) == 1) && (j != 1)){
      c = b.substr(i-1,1) + "." + c;
    } else {
      c = b.substr(i-1,1) + c;
    }
  }
  if (_minus) c = "-" + c ;
  return c;
  console.log(b);
}

function kurensi(nilai){
  bk = nilai.replace(/[^\d]/g,"");
  ck = "";
  panjangk = bk.length;
  j = 0;
  for (i = panjangk; i > 0; i--){
    j = j + 1;
    if (((j % 3) == 1) && (j != 1)){
      ck = bk.substr(i-1,1) + "."  + ck;
      xk = bk;
    }else{
      ck = bk.substr(i-1,1) + ck;
      xk = bk;
    }
  }
  return ck;  
}



// function getModal(){
//   var txt =""  ;
//   txt += "<div class='modal fade bs-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='gridSystemModalLabel'>";
//   txt +=  "<div class='modal-dialog' role='document'>";
//   txt +=    "<div class='modal-content'>";
//   txt +=      "<div class='modal-header'>";
//   txt +=        "<button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='.bs-example-modal-lg'>Browse </button>"
//   txt +=        "<h4 class='modal-title' id='gridSystemModalLabel'>Modal title</h4>";
//   txt +=      "</div>";
//   txt +=    "</div>";
//   txt +=  "</div";
//   txt += "</div>"
// }

function getSiswa($div){
  // $(document).ready(function(){
  //     $('#nama').autocomplete({
  //             source: "<?php echo site_url('tunggakan/get_autocomplete');?>",
   
  //             select: function (event, ui) {
  //                 $(this).val(ui.item.label);
  //                 //$("#form_search").submit(); 
  //             }
  //     });

  // });

  var txt="";
  // txt += "<div class='col-sm-12'>"
  txt += "     <div class='input-group col-sm-12'>"
  txt += "        <input class='form-control' type='text' name='nama' class='form-control' id='nama' placeholder='Search Nama'>"
  txt += "     </div>"
  // txt += "</div>"


  // txt += "<div class='input-group input-group-sm'>"
  // txt +=  "<input type='text' class='form-control'>"
  // txt +=  "<span class='input-group-btn'>"
  // txt +=  "<button type='button' class='btn btn-info btn-flat' data-toggle='modal' data-target='.bs-example-modal-lg'>Browse </button>";
  // txt +=  "</span>"
  // txt += "</div>"

  // txt += "<div class='modal fade bs-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='gridSystemModalLabel'>";
  // txt +=  "<div class='modal-dialog' role='document'>";
  // txt +=    "<div class='modal-content'>";
  // txt +=      "<div class='modal-header'>";
  // txt +=        "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
  // txt +=        "<h4 class='modal-title' id='gridSystemModalLabel'>Modal title</h4>";
  // txt +=        "<div class='modal-body'>";
  // txt +=          "<section class='content'>";
  // txt +=            "<div class='row'>";
  // txt +=              "<div class='col-xs-12'>";
  // txt +=                "<div class='box'>";
  // txt +=                  "<div class='box-header'>";
  // txt +=                    "<h3 class='box-title'>Data Table With Full Features</h3>";
  // txt +=                  "</div>";
  // txt +=                "<div class='box-body'>";
  // txt +=                  "<table id='example1' class='table table-bordered table-striped'>";
  // txt +=                    "<thead>";
  // txt +=                      "<tr>";
  // txt +=                        "<th>No</th><th>Id Siswa</th><th>Nama</th><th>Kelas</th><th>Action</th>";
  // txt +=                      "</tr>";
  // txt +=                    "</thead>";
  // txt +=                    "<tbody>";
  // txt +=                      "<tr>";
  // txt +=                        "<td>1</td>";
  // txt +=                        "<td>2</td>";
  // txt +=                        "<td>3</td>";
  // txt +=                        "<td>4</td>";
  // txt +=                        "<td><input type='button' class='btn btn-xs bg-green' value='Pilih'></td>";
  // txt +=                      "</tr>";
  // txt +=                    "</tbody>";

  // txt +=                  "</table>";
  // txt +=                "</div>";

  // txt +=                "</div>";
  // txt +=              "</div>";
  // txt +=            "</div>";
  // txt +=          "</section>";
  // txt +=        "</div>";
  // txt +=      "</div>";
  // txt +=    "</div>";
  // txt +=  "</div";
  // txt += "</div>"  
        
  document.getElementById($div).innerHTML = txt;  
}

function getKelasDet($div){
  var thnAjaran     = $("#thnAjaran").val();
  console.log(thnAjaran);
  $.ajax({
    type:"POST",
    data : {"tahunajaran" : thnAjaran},
    url:"/ananda/siswa/getKelasDetail/",
      success:function(msg){
        myObj = JSON.parse(msg);

        var txt="";
        txt += "<select class='form-control' id='detail' name='detail'>";//kelasDet
        txt += "<option value=''>-- Pilih Kelas Detail --</option>";
        for (x in myObj) {
          if (myObj[x].NamaKelas=="") {
            txt += "<option value=" + myObj[x].IdKelasDetail  + " > " + myObj[x].KelasDetail + "</option>\n";
          }else{
            txt += "<option value=" + myObj[x].IdKelasDetail  + " > " + myObj[x].NamaKelas + "</option>\n";
          }
        }
        txt += "</select>";
        document.getElementById($div).innerHTML = txt;
        console.log(txt);
      }
  });
}

function getJenisBiayaDet($div){
    $.ajax({
      type:"GET",
      url:"/ananda/tunggakan/getJenisBiayaDet/",
      success:function(msg){
        myObj = JSON.parse(msg);
        
        var txt="";
        txt += "<select class='form-control' id='detail' name='detail'>";
        for (x in myObj) {
            txt += "<option value=" + myObj[x].IdJenisBiayaDet  + " > " + myObj[x].JenisBiayaDet + "</option>\n";
        }
        txt += "</select>";
        document.getElementById($div).innerHTML = txt;
        console.log(txt);
      }
    });          
}

function getBayarDetail() {
  var idJenisBiaya  = $("#jenisBiaya").val()
  if (idJenisBiaya=="") {
    var cbBox = "<select class='form-control' id='jenisBiayaDetail' onchange='getTunggakan()' name='jenisBiayaDet'>" +
        "<option value=''>-- Pilih Jenis Biaya Detail --</option>" +
        "</select>"   
    $("#div_jenisBiayaDetail").html(cbBox);
  }else{
    $.ajax({
      type:"GET",
      url:"/ananda/billing/getBillingDetail/" + idJenisBiaya ,
      success:function(msg){
        $("#div_jenisBiayaDetail").html(msg);
        console.log(msg);
      }
    });
  }          
}    

function getJenis() {
  //view Tunggakan
  var filter  = $("#filter").val();
  if (filter=="biaya") {
    getJenisBiayaDet("div_jenis");
  }else if(filter=="siswa"){
    getSiswa("div_jenis");
  }else{
    getKelasDet("div_jenis");           
  }      
  console.log(filter);
}      

function test(){
	alert("sds");
}


//PAYMENT
function selectPayment(id) {  
  //console.log(id);
  var idBayar = $("#" + id + " td")[1].innerHTML;
  var reverse = $("#" + id + " td")[10].innerHTML;
  if (reverse=="R") {
    alert("Payment Ini Sudah Di Reverse");
  }else{
    $.ajax({
      success:function(html){
        var url = "/ananda/payment/edit/" + idBayar;
        window.location.href = url;
      }
    });
  }
}
