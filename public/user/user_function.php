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


function getHarga($id)
{
    global $conn;
    $query = "SELECT harga from menus where idmenus = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row["harga"];

}


function getStatusPembayaran($id)
{
    global $conn;
    $query = "SELECT statuspembayaran from pesanan where idpesanan = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row["statuspembayaran"];

}


function getStatusPesanan($id)
{
    global $conn;
    $query = "SELECT statuspesanan from pesanan where idpesanan = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row["statuspesanan"];

}

function getNama( $id ){
    global $conn;
    $query = "SELECT nama from menus where idmenus = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row["nama"];
}

function tambahDetail($data,$idpesan){
 global $conn;

 foreach ($data as $in) {
    $idMenu = $in["id"];
    $qu   = $in["q"];
    $jumlah = $in["jumlah"];
    $namaMenu = getNama($in["id"]);
    $harga = getHarga($in["id"]);

    mysqli_query($conn, "INSERT INTO detail_pesanan VALUES('$idpesan','$idMenu','$namaMenu','$qu','$harga','$jumlah')");

    
 }
return mysqli_affected_rows($conn);

}


function getNoAntriSekarang()
{
    global $conn;
    $query = "SELECT COUNT(idpesanan) AS noAntri from pesanan where statuspesanan = 'selesai' AND tanggal = CURDATE() ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row["noAntri"];

}

function getWaktu( $id ){
    global $conn;
    $query = "SELECT waktu from pesanan where idpesanan = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    return $row["waktu"];
}



function getNoAntri($id)
{
    global $conn;
    $waktu = getWaktu($id);
    $query = "SELECT COUNT(idpesanan) AS noAntri from pesanan where waktu <= '$waktu' AND tanggal = CURDATE()";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row["noAntri"];

}





?>