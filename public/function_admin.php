<?php
$conn = mysqli_connect("localhost", "root", "", "ordernow", );


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;

}
function query1($query){

    global $conn;
    $result = mysqli_query($conn, $query);
   $row = mysqli_fetch_assoc($result);
    return $row;
}

function tambahMenu($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $mood = htmlspecialchars($data["mood"]);
    $status = htmlspecialchars($data["status"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    $gambar  = upload();
    if(!$gambar){
        return false;
    }



    $query = "INSERT INTO menus VALUES('', '$nama','$harga', '$tipe', '$mood', '$deskripsi','$status','$gambar')";


    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
        alert('Berhasil Menambahkan Menu');
        document.location.href='admin_menu.php';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('Gagal Menambahkan Menu);
        </script>
        "
        ;
    }

}

function hapusMenu($id){
    global $conn;
    $query = "DELETE FROM menus WHERE idmenus = $id";    
    mysqli_query($conn, $query);

    return mysqli_affected_rows( $conn );
}

function upload(){

    $namaGambar = $_FILES["gambar"]["name"];
    $ukuran = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];
// cek gambar ad aatau tidak
    if($error === 4){
      echo  "
        <script>
        alert('Silahkan Upload Gambar terlebih dahulu');
        </script>
        ";
        return false;
    }
//cek ekstensi gambar
 $ekstensiValid = ['jpg','png','jpeg'];
 $ekstensiNow = explode(".",$namaGambar);
 $ekstensi = strtolower(end($ekstensiNow));

    if(!in_array($ekstensi,$ekstensiValid)){
        echo  "
        <script>
        alert('Upload file dengan format jpg/png/jpeg');
        </script>
        ";
        return false;

    }

    $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$namaGambar;

  move_uploaded_file($tmpName,'gambar/'.$nama_gambar_baru);

  return $nama_gambar_baru;

    
}


function updateMenu($data)
{
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $mood = htmlspecialchars($data["mood"]);
    $status = htmlspecialchars($data["status"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    $query = "UPDATE menus SET nama ='$nama' ,harga = '$harga', tipe = '$tipe', mood = '$mood', deskripsi = '$deskripsi', status ='$status' WHERE idmenus = $id ";


    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
        alert('Berhasil Memperbarui Menu');
        document.location.href='admin_menu.php';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('Gagal Memperbarui Menu);
        </script>
        "
        ;
    }

}


function pembaruan($id,$spb,$spm){
    global $conn;

    $query = "UPDATE pesanan SET statuspembayaran = '$spb', statuspesanan = '$spm' WHERE idpesanan = '$id'";
    mysqli_query($conn, $query);


}

?>