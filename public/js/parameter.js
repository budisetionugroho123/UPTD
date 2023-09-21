function createParameter() {

    var namaPengujian  = $("#input_namapengujian").val();
    if(namaPengujian == ""){
      $("#errorNamaPengujian").removeClass("d-none");
      return false;
    }else {
      $("#errorNamaPengujian").addClass("d-none");
    }
    
    var inputSatuan  = $("#input_satuan").val();
    if(inputSatuan == ""){
      $("#errorSatuan").removeClass("d-none");
      return false;
    }else {
      $("#errorSatuan").addClass("d-none");
    }

    var inputMetode  = $("#input_metode").val();
    if(inputMetode == ""){
      $("#errorMetode").removeClass("d-none");
      return false;
    }else {
      $("#errorMetode").addClass("d-none");
    }

    var inputBakuMutu  = $("#input_bakumutu").val();
    if(inputBakuMutu == ""){
      $("#errorBakuMutu").removeClass("d-none");
      return false;
    }else {
      $("#errorBakuMutu").addClass("d-none");
    }

    var inputAcuan  = $("#input_acuan_metoda_pengujian").val();
    if(inputAcuan == ""){
      $("#errorAcuan").removeClass("d-none");
      return false;
    }else {
      $("#errorAcuan").addClass("d-none");
    }

    var inputTarif  = $("#input_tarif").val();
    if(inputTarif == ""){
      $("#errorTarif").removeClass("d-none");
      return false;
    }else {
      $("#errorTarif").addClass("d-none");
    }

}