// Mendapatkan elemen input screen
const screen = document.getElementById('screen');
let currentInput = ''; 
let operator = ''; 
let firstValue = ''; // untuk menyimpan nilai pertama

// Fungsi untuk menampilkan angka atau operasi yang dipilih
function appendValue(value) {
    currentInput += value;
    screen.value = currentInput;
}

// Fungsi untuk melakukan operasi
function setOperator(op) {
    firstValue = currentInput;
    operator = op;
    currentInput = ''; // reset input setelah memilih operator
}

// Fungsi untuk menghitung hasil berdasarkan operator
function calculate() {
    let result;
    const secondValue = currentInput; // nilai kedua setelah operator dipilih
    const num1 = parseFloat(firstValue);
    const num2 = parseFloat(secondValue);

    switch (operator) {
        case '+':
            result = num1 + num2;
            break;
        case '-':
            result = num1 - num2;
            break;
        case '*':
            result = num1 * num2;
            break;
        case '/':
            if (num2 === 0) {
                alert("Tidak bisa membagi dengan 0");
                return;
            }
            result = num1 / num2;
            break;
        case '%':
            result = num1 % num2;
            break;
        case 'x^2':
            result = Math.pow(num1, 2);
            break;
        default:
            return;
    }
    screen.value = result;
    currentInput = ''; 
}

function clearAll() {
    currentInput = '';
    firstValue = '';
    operator = '';
    screen.value = '';
}

// Fungsi untuk menghapus karakter terakhir (C)
function clearEntry() {
    currentInput = currentInput.slice(0, -1);
    screen.value = currentInput;
}

// Event listener untuk setiap tombol kalkulator
document.querySelectorAll('button').forEach(button => {
    button.addEventListener('click', () => {
        const value = button.innerText;

        if (!isNaN(value)) {
         
            appendValue(value);
        } else if (value === '+' || value === '-' || value === '*' || value === '/') {

            const operatorSymbol = value === 'x' ? '*' : value; 
            setOperator(operatorSymbol);
        } else if (value === '=') {
        
            calculate();
        } else if (value === 'AC') {
           
            clearAll();
        } else if (value === 'C') {
           
            clearEntry();
        } else if (value === '%') {
     
            setOperator('%');
        } else if (value === 'x^2') {
            
            setOperator('x^2');
            calculate();
        }
    });
});



// Mendapatkan elemen dari DOM
