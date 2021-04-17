<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>
    <h1>Soal 1 <sup>Perhitungan Jarak</sup></h1>
    <p>Ismail berangkat dari rumah menuju ke kantor yang berjarak 64,5km dengan kecepatan 3 m/detik. Tetapi setelah 23 menit kemudian, kecepatan menjadi 5 m/detik. Demikian setelah 12 menit berikutnya kecepatan konstan dengan lebih lambat 3 m/detik dibandingkan 23 menit sebelumnya. Buatlah suatu program untuk menghitung dan mengetahui berapa lama Ismail menempuh perjalanan dalam format Jam, Menit dan Detik dari rumah menuju ke kantornya.</p>
    <table borde>
        <thead>
        <tr>
            <td>Jarak yang ditempuh</td>
            <td>Kecepatan m/detik</td>
            <td>Kecepatan m/menit</td>
            <td>Durasi</td>
            <td colspan="2">Jarak yang Sudah Ditempuh</td>
            <td colspan="2">Sisa Jarak</td>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="4">64,5Km</td>
            </tr>
            <tr>
                <td>3 m/detik</td>
                <td>180 m/menit</td>
                <td>Selama <b>23</b> Menit</td>
                <td>4140 M</td>
                <td>4,1 Km</td>
                <td>60.4 Km</td>
            </tr>
            <tr>
                <td>5 m/detik</td>
                <td>300 m/menit</td>
                <td>Selama <b>12</b> Menit</td>
                <td>3600 M</td>
                <td>3,6 Km</td>
                <td>56,8 Km</td>
            </tr>
            <tr>
                <td>2 m/detik</td>
                <td>120 m/menit</td>
                <td>Kecepatan Konstan Hingga Sampai Rumah selama <b>473 </b>Menit</td>
                <td>56760 M</td>
                <td>56,8 Km</td>
                <td>0 Km</td>
            </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3"></td>
            <td >508 Menit</td>
            <td colspan="3" style="background-color:yellow;"><b id="hasil"></b></td>
        </tr>
        </tfoot>
    </table>

    <script>
            String.prototype.toHHMMSS = function () {
            var sec_num = parseInt(this, 10); // don't forget the second param
            var hours   = Math.floor(sec_num / 3600);
            var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
            var seconds = sec_num - (hours * 3600) - (minutes * 60);

            if (hours   < 10) {hours   = "0"+hours;}
            if (minutes < 10) {minutes = "0"+minutes;}
            if (seconds < 10) {seconds = "0"+seconds;}
            return hours+' Jam '+minutes+' Menit '+seconds+' Detik';
        }
        document.getElementById("hasil").innerHTML = "30480".toHHMMSS();
    </script>
    <body>
</html>