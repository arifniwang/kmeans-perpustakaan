<?php
/**
 * @param $angka
 * @return string
 */
function kelamin($angka)
{
    $result = "";
    switch ($angka) {
        case '1':
            $result = "Laki-Laki";
            break;
        case '2':
            $result = "Perempuan";
            break;
    }

    return $result;
}


function usia($angka)
{
    $result = "";
    switch ($angka) {
        case '1':
            $result = "7 - 15";
            break;
        case '2':
            $result = "16 - 25";
            break;
        case '3':
            $result = "26 - 30";
            break;
        case '4':
            $result = "31 - 35";
            break;
        case '5':
            $result = "&gt; 36";
            break;
    }

    return $result;
}

/**
 * @param $angka
 * @return string
 */
function format_rupiah($angka)
{
    $rupiah = number_format($angka, 0, ',', '.');
    return $rupiah;
}

/**
 * @param $kode
 * @return int[]
 */
function jumlahKategori($kode_buku)
{
    // main variable
    $sosial = 0;
    $agama = 0;
    $cerita = 0;

    // select data
    $kode = "'" . str_replace(" ", "','", $kode_buku) . "'";
    $sql = "SELECT * FROM buku WHERE id_buku in ($kode)";
    $data = mysql_query($sql);

    if (mysql_num_rows($data) > 0) {
        while ($row = mysql_fetch_assoc($data)) {
            switch ($row['kategori']) {
                case 'Sosial':
                    $sosial++;
                    break;
                case 'Agama':
                    $agama++;
                    break;
                case 'Cerita':
                    $cerita++;
                    break;
            }
        }
    }

    return [
        'sosial' => $sosial,
        'cerita' => $cerita,
        'agama' => $agama,
    ];
}

/**
 * @param $date_pinjam
 * @param $date_kembali
 * @return false|int
 * @throws Exception
 */
function totalHari($date_pinjam, $date_kembali)
{
    $start = new DateTime($date_pinjam);
    $end = new DateTime($date_kembali);
    $dDiff = $start->diff($end);
    return $dDiff->days;
}