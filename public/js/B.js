document.addEventListener('DOMContentLoaded', function () {
    const downloadBtn = document.getElementById('downloadBtn');
    const form = document.querySelector('form');
    const fields = form.querySelectorAll('input[type="text"], input[type="number"], textarea');
    const submitBtn = form.querySelector('button[type="submit"]'); 
    const toggleCheckbox1 = document.getElementById("toggleCheckbox1");
    toggleCheckbox1?.addEventListener("change", checkForm)
        
    
    if (toggleCheckbox1) {
        console.log("Элемент с id 'toggleCheckbox1'  найден!");
    }
    submitBtn.disabled = false;
    downloadBtn.disabled = false;
    function checkForm() {
        let allFilled = true;
        fields.forEach(function (input) {
            if (input.value.trim() === '') {
                allFilled = false;
            }
        });

        if (allFilled&& toggleCheckbox1.checked ) {
           
           submitBtn.disabled = false;
           downloadBtn.disabled = true;
         
          
        } else {
            
            downloadBtn.disabled = true;
            
            submitBtn.disabled = true;
            
        }    
    }
   

    fields.forEach(function (field) {
        field.addEventListener('input', checkForm); 
        });

   
    downloadBtn.addEventListener('click', function() {
        // e.preventDefault(); // Если нужно предотвратить отправку формы

        downloadBtn.disabled = true;
        submitBtn.disabled = false;
    });

    submitBtn.addEventListener('click', function() {
        // e.preventDefault(); // Если нужно предотвратить отправку формы
        //form.submit();
        submitBtn.disabled = true;
        downloadBtn.disabled = false;
       
    });
  
checkForm();

});