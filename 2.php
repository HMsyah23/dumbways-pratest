<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <h1>Soal 2 <sup>Pembagian Kue</sup></h1>
    <p>Zizah memiliki sebuah coklat batangan yang ingin dia berikan kepada Aziz untuk hadiah ulang tahunnya, di setiap blok coklat tersebut terdapat sebuah angka. Dia memutuskan untuk memberikan coklat tersebut dengan blok-blok yang berurutan dimana banyak blok nya sama dengan bulan lahir Aziz dan jika angka-angka tersebut di setiap blok tersebut di jumlah kan maka hasil nya sama dengan tanggal lahir Aziz, hitunglah berapa banyak kemungkinan Zizah bisa memotong coklat tersebut ?</p>
    <input type="text" id="tanggal" value="" placeholder="Masukkan Tanggal Lahir">
    <select id="bulan" name="bulan">
        <option value="Januari">Januari</option>
        <option value="Februari">Februari</option>
        <option value="Maret">Maret</option>
        <option value="April">April</option>
        <option value="Mei">Mei</option>
        <option value="Juni">Juni</option>
        <option value="Juli">Juli</option>
        <option value="Agustus">Agustus</option>
        <option value="September">September</option>
        <option value="Oktober">Oktober</option>
        <option value="November">November</option>
        <option value="Desember">Desember</option>
        </select>
    <p id="hasil"></p>
    <button onclick="hitungBro()">Hitung</button>
    <script>

        
    
    function hitungBro() {
        var arr = [];
        y = document.getElementById("tanggal").value;;
        b = 0;

        var z = 1;

        do {
            if (b > y) {
                arr.splice(-1,1);
                z=1;
            } 
                arr.push(z);
                b = arr.reduce(myFunc);
            
            console.log(b,z);
            if (b == y) {
                break;
            }
            z++;
        }
        while (z <= y);

        console.log(arr);
        console.log(b);
        function myFunc(total, num) {
            return total + num;
        }
        var kue = arr;

        var x = document.getElementById("bulan").value;
        switch (x) {
        case "Januari":
            x = 1;
            break;
        case "Februari":
            x = 2;
            break;
        case "Maret":
            x = 3;
            break;
        case "April":
            x = 4;
            break;
        case "Mei":
            x = 5;
            break;
        case "Juni":
            x = 6;
            break;
        case "Juli":
            x = 7;
            break;
        case "Agustus":
            x = 8;
        break;case "September":
            x = 9;
        break;case "Oktober":
            x = 10;
        break;case "November":
            x = 11;
        break;case "Desember":
            x = 12;
        }
        const result = kue.filter(i => i === parseInt(x, 10)).length;
        document.getElementById("hasil").innerHTML = "Jumlah Kue Yang Didapat Aziz adalah "+ result;
    }
    </script>
    <body>    
</html>