<?php
//pengulangan

// -- for --

// for($count = 1 ; $count < 5; $count++){
//     echo "$count <br>";
// }

//for digunakan untuk pengulangan yang jumlah pengulangannya sudah ditentukan 
//dalam sintak di atas ada 3 bagian : inisialisasi sebagai inisial variabel dengan nilai awal '$count = 1'
//kondisi digunakan untuk menentukan kapan pengulangan akan berhenti '$count < 5' jadi $count akan di tampilkan sebanyak lima kali di layar
//increment digunakan untuk memperbarui nilai variabel di setiap barisnya. '$count++'

// --while--
// $count = 1;  
// while($count < 5){
//     echo "$count <br>";
//     $count++;
// };

// $count ini adalah variabel buatan dengaan nilai 1
// 'while' selama while dengan kondisi ($count < 5) maka akan menjalankan semua yang ada di dalam '{ echo.... }'


// --do--
$d = 1;
do {
    echo "$d";
    $d++;
}while($d <= 5);

// do itu lakukan terlebih dahulu baru dicek apakah 'while' benar atau tidak dengan nilai atau kondisinya '($d <=)' 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan</title>
</head>
<body>
    <table border=1 cellpadding=3 cellspacing=0 >
        <?php for($i= 1;$i<=5;$i++):?>
            <tr>
                <?php for($d = 1;$d <= 6; $d++):?>
                    <td> <?php echo "$i,$d" ?> </td>
                <?php endfor?>
            </tr>
        <?php endfor?>
    </table>
</body>
</html>

