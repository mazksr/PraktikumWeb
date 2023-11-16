let x = prompt("Masukkan kata : ")

x = x.toUpperCase()

let hasil = ""
let temp = ""
for (let i = x.length - 1; i >= 0; i--) {
  hasil += x[i]
}

if (x == hasil) {
  console.log("Kata tersebut adalah palindrom");
} else {
  console.log("Kata tersebut bukan palindrom");
}