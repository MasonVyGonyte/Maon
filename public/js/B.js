document.addEventListener('DOMContentLoaded', function () {
    const downloadBtn = document.getElementById('downloadBtn');
    const form = document.querySelector('form');
    const fields = form.querySelectorAll('input[type="text"], input[type="number"], textarea');
    const submitBtn = form.querySelector('button[type="submit"]'); 
    const toggleCheckbox1 = document.getElementById("toggleCheckbox1");
    toggleCheckbox1?.addEventListener("change", checkForm)

    const toggleCheckbox = document.getElementById("toggleCheckbox");
    toggleCheckbox?.addEventListener("change", checkForm)
        
    
    if (toggleCheckbox1) {
        console.log("Элемент с id 'toggleCheckbox1'  найден!");
    }
    submitBtn.disabled = true;

    function checkForm() {
        let allFilled = true;
        fields.forEach(function (input) {
            if (input.value.trim() === '') {
                allFilled = false;
            }
        });

        if (allFilled && toggleCheckbox1.checked ) {
           
           submitBtn.disabled = false;
        
        } else {
            
            submitBtn.disabled = true;
            
        }    
    }
   

    fields.forEach(function (field) {
        field.addEventListener('input', checkForm); 
        });
  
checkForm();

});