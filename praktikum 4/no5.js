let x = parseInt(prompt("Masukkan angka"));

let hasil = ""
while (x >= 1) {
    if (x % 2 == 1) {
        hasil = "1" + hasil
        x = (x-1)/2
    } else {
        hasil = "0" + hasil
        x /= 2
    }
}

console.log(hasil);