let string = "*\n";
for (let i = 2; i <= 5; i++) {
    // printing spaces
    for (let j = 0; j < 5 - i; j++) {
    string += " ";
    }
    // printing star
    for (let k = 0; k < i; k++) {
    string += "*";
    }
    string += "\n";
}
console.log(string)