document.addEventListener('DOMContentLoaded', function () {
    const downloadBtn = document.getElementById('downloadBtn');
    const form = document.querySelector('form');
    const fields = form.querySelectorAll('input[type="text"], input[type="number"], textarea');
    const submitBtn = form.querySelector('button[type="submit"]'); 


    submitBtn.disabled = false;
    downloadBtn.disabled = false;
    function checkForm() {
        let allFilled = true;
        fields.forEach(function (input) {
            if (input.value.trim() === '') {
                allFilled = false;
            }
        });

        if (allFilled) {
           
           submitBtn.disabled = false;
           downloadBtn.disabled = true;
         
          
        } else {
            
            downloadBtn.disabled = true;
            
            submitBtn.disabled = true;
            
        }    
    }
   

    fields.forEach(function (field) {
        field.addEventListener('input', checkForm); // Каждый раз при изменении поля проверяем форму (та строка что мешает, хотя по факту все норм работает просто надо учитывать что эта строка делает кнопку сабмит активной поэтому и условие такое странное в 52 строке)
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