
function removeErrorOption(){
    var jenis_pesanan = $("#jenis_pesanan").val();
    var layanan_id = $("#layanan_id").val();
    if(layanan_id != ""){
        $("#jenis_pesanan").removeAttr('disabled');
        $("#errorLayanan").addClass("d-none");

    }else if(layanan_id == "") {
        $("#formSatuan").remove();
        $("#jenis_pesanan").attr('disabled' , '');

    }
    if(jenis_pesanan != "") {
        $("#errorJenisPesanan").addClass("d-none");
        
        var id_layanan = $("#layanan_id").val();
        if(id_layanan != ''){

            var formSatuan = ` <div id="formSatuan" class="col-12 col-lg-6 mb-3 mb-lg-5 order-8 order-lg-8">
                <label for="inputSatuan">Jenis Pesanan</label>
                <select multiple="multiple"   class="form-select  border-input" name="inputSatuan[]" id="inputSatuan">
                  
                  </select>   
                  <div class="font-italic text-danger d-none" id="errorInputSatuan">
                    Mohon pilih parameter satuan!
                </div>                    
            </div>`;
                $(formSatuan).insertAfter("#formJenisPesanan");
            var inputSatuan = $("#inputSatuan");
    
            if(jenis_pesanan == "satuan"){
                $.ajax({
                    type: "GET",
                    url : "/layanan/get-parameters/" + id_layanan,
                    success: function(response){
                        $.each(response['parameters'], function(key, value){
                            inputSatuan.append('<option value="' + value.id + '">' + value.nama_pengujian + '</option>');
                        })
                    }
                })
                
            }else if(jenis_pesanan == "paket"){
                $("#formSatuan").remove();
            }
        }
        if(jenis_pesanan == "paket"){
            $("#formSatuan").remove();
        }


    }else{
        $("#formSatuan").remove();

    }
    
}
function removeError(){
    var namaPerusahaan = $("#nama_perusahaan").val();
    var alamat_perusahaan = $("#alamat_perusahaan").val();
    var no_pic = $("#no_pic").val();
    var email_pic = $("#email_pic").val();
    var telephone = $("#telephone").val();
    var nama_pic = $("#nama_pic").val();
    var layanan_id = $("#layanan_id").val();
    var tanggal_pengantaran = $("#tanggal_pengantaran").val();
    var tanggal_pengambilan = $("#tanggal_pengambilan").val();
    // var jumlah_sampel = $("#jumlah_sampel").val();
    var volume_uji_coba = $("#volume_uji_coba").val();
    var alamat_pengambilan_sampel = $("#alamat_pengambilan_sampel").val();

    if(namaPerusahaan != "") {
        $("#errorNamaPerusahaan").addClass("d-none");
    }
    if(alamat_perusahaan != "") {
        $("#errorAlamatPerusahaan").addClass("d-none");
    }
    if(no_pic != "") {
        $("#errorNoPic").addClass("d-none");
    }
    if(email_pic != "") {
        $("#errorEmailPic").addClass("d-none");
    }
    if(telephone != "") {
        $("#errorTelephone").addClass("d-none");
    }
    if(nama_pic != "") {
        $("#errorNamaPic").addClass("d-none");
    }
    if(layanan_id != "") {
        $("#errorLayanan").addClass("d-none");
    }
    if(tanggal_pengantaran != "") {
        $("#errorTanggalPengantaran").addClass("d-none");
    }
    if(tanggal_pengambilan != "") {
        $("#errorTanggalPengambilan").addClass("d-none");
    }
    // if(jumlah_sampel != "") {
    //     $("#errorJumlahSampel").addClass("d-none");
    // }
    if(volume_uji_coba != "") {
        $("#errorVolumeUjiCoba").addClass("d-none");
    }
    if(alamat_pengambilan_sampel != "") {
        $("#errorAlamatPengambilanSampel").addClass("d-none");
    }

    
}

function submitOrderLab(){
    var countParameterSatuan = $('#inputSatuan :selected').length;
    if(countParameterSatuan == 0 ){
        $("#errorInputSatuan").removeClass("d-none");
    } else {
        $("#errorInputSatuan").addClass("d-none");

    }
    var nama_perusahaan = $("#nama_perusahaan").val();
    if(nama_perusahaan == ''){
        $("#errorNamaPerusahaan").removeClass("d-none");
        console.log("empty")
    }else {
        $("#errorNamaPerusahaan").addClass("d-none");

    }
    var alamat_perusahaan = $("#alamat_perusahaan").val();
    if(alamat_perusahaan == ''){
        $("#errorAlamatPerusahaan").removeClass("d-none");
        console.log("empty")
    }else {
        $("#errorAlamatPerusahaan").addClass("d-none");

    }
    var no_pic = $("#no_pic").val();
    if(no_pic == ''){
        $("#errorNoPic").removeClass("d-none");
        console.log("empty")
    }else {
        $("#errorNoPic").addClass("d-none");

    }
    var email_pic = $("#email_pic").val();
    if(email_pic == ''){
        $("#errorEmailPic").removeClass("d-none");
        console.log("empty")
    }else {
        $("#errorEmailPic").addClass("d-none");

    }
    var telephone = $("#telephone").val();
    if(telephone == ''){
        $("#errorTelephone").removeClass("d-none");
        console.log("empty")
    }else {
        $("#errorTelephone").addClass("d-none");

    }
    var nama_pic = $("#nama_pic").val();
    if(nama_pic == ''){
        $("#errorNamaPic").removeClass("d-none");
        console.log("empty")
    }else {
        $("#errorNamaPic").addClass("d-none");

    }
    var layanan_id = $("#layanan_id").val();
    if(layanan_id == ''){
        $("#errorLayanan").removeClass("d-none");
        console.log("empty")
    }else {
        $("#errorLayanan").addClass("d-none");

    }
    var tanggal_pengantaran = $("#tanggal_pengantaran").val();
    if(tanggal_pengantaran == ''){
        $("#errorTanggalPengantaran").removeClass("d-none");
        console.log("empty")
    }else {
        $("#errorTanggalPengantaran").addClass("d-none");

    }
    var tanggal_pengambilan = $("#tanggal_pengambilan").val();
    if(tanggal_pengambilan == ''){
        $("#errorTanggalPengambilan").removeClass("d-none");
        console.log("empty")
    }else {
        $("#errorTanggalPengambilan").addClass("d-none");

    }
    // var jumlah_sampel = $("#jumlah_sampel").val();
    // if(jumlah_sampel == ''){
    //     $("#errorJumlahSampel").removeClass("d-none");
    //     console.log("empty")
    // }else {
    //     $("#errorJumlahSampel").addClass("d-none");

    // }
    var volume_uji_coba = $("#volume_uji_coba").val();
    if(volume_uji_coba == ''){
        $("#errorVolumeUjiCoba").removeClass("d-none");
        console.log("empty")
    }else {
        $("#errorVolumeUjiCoba").addClass("d-none");

    }
    var alamat_pengambilan_sampel = $("#alamat_pengambilan_sampel").val();
    if(alamat_pengambilan_sampel == ''){
        $("#errorAlamatPengambilanSampel").removeClass("d-none");
        console.log("empty")
    }else {
        $("#errorAlamatPengambilanSampel").addClass("d-none");

    }
    var jenis_pesanan = $("#jenis_pesanan").val();
    if(jenis_pesanan == ''){
        $("#errorJenisPesanan").removeClass("d-none");
        console.log("empty")
    }else {
        $("#errorJenisPesanan").addClass("d-none");

    }
    if(nama_perusahaan == '' || alamat_perusahaan == '' || no_pic == '' || nama_pic == '' || email_pic == '' || layanan_id == '' || tanggal_pengambilan == '' || tanggal_pengantaran == '' || alamat_pengambilan_sampel == ''  || (countParameterSatuan == 'undefined' && countParameterSatuan == 0)){
        return false;
    }
}