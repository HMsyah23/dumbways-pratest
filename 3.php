<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <h1>Soal 3 <sup>Cetak Pattern</sup></h1>
    <p>Buatlah function untuk mencetak pattern persegi dari karakter “*” dan “=” yang mempunyai sebuah parameter sebagai nilai panjang dengan nilai parameter harus ganjil.</p>
    <input type="text" id="angka" value="" placeholder="Inputkan Angka Ganjil">
    <button onclick="myFunction()">Buat</button>
    <pre id="out"></pre>
    <script>

        function myFunction() {
            document.getElementById('out').innerHTML = "";
            var x = document.getElementById("angka").value;
            if (x % 2 !== 0) {
                function print(s) { document.getElementById('out').innerHTML += s; }
                function println(s) { document.getElementById('out').innerHTML += s + '\n'; }

                var i, j;
                ganjil = 0;

                for (i = 1; i <= x; i++) {
                    if ((i % 2 === 0)) {
                    ganjil= ganjil +1;
                    }
                }
                ganjil=ganjil+1;

                for (i = 1; i <= x; i++) {
                    for (j = 1; j <= x; j++) {
                        if (((i === ganjil) || (j === ganjil)) || ((i === 1) && (j === 1)) || ((i == x) && (j == x)) || ((i === 1) && (j == x)) || ((i == x) && (j === 1))) {
                            print("* ");
                        } else {
                            print("= ");
                        }
                    }
                    println("");
                }
            } else {
                document.getElementById('angka').value = "";
                alert("Harus Menginputkan Angka Ganjil");
            }
        } 
    </script>
    <body>    
</html>