
document.addEventListener('DOMContentLoaded', function () {
    const downloadBtn = document.getElementById('downloadBtn');
    const form = document.querySelector('form');
    const fields = form.querySelectorAll('input[type="text"], input[type="number"], textarea');
    
    function checkForm() {
        let allFilled = true;
        fields.forEach(function (input) {
            if (input.value.trim() === '') {
                allFilled = false;
            }
        });
        
        if (allFilled) {
            downloadBtn.disabled = false;
            downloadBtn.style.backgroundColor = 'green';
        } else {
            downloadBtn.disabled = true;
            downloadBtn.style.backgroundColor = 'gray';
        }
    }
    
    fields.forEach(function (field) {
        field.addEventListener('input', checkForm);
    });

    checkForm(); // Изначальная проверка
});

