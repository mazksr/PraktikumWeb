let n = parseInt(prompt("Masukkan banyak data : "));
let angka = [];
for (let i = 0; i < n; i++) {
  inp = parseInt(prompt(`Masukkan data ke-${i+1} : `));
  angka.push(inp)
}

let temp = 0;
for (let i = 0; i < angka.length; i++) {
  for (let j = 0; j < angka.length - i - 1; j++) {
    if (angka[j] > angka[j + 1]) {
      temp = angka[j];
      angka[j] = angka[j + 1];
      angka[j + 1] = temp;
    }
  }
}

console.log(angka);