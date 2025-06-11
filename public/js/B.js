document.addEventListener('DOMContentLoaded', function () {
  
    const downloadBtn = document.getElementById('downloadBtn');
    const form = document.querySelector('form');
    const fields = form.querySelectorAll('input[type="text"], input[type="number"], textarea');
    const submitBtn = form.querySelector('button[type="submit"]'); 
    const toggleCheckbox = document.getElementById("toggleCheckbox");
    const toggleCheckbox1 = document.getElementById("toggleCheckbox1");
     
    toggleCheckbox?.addEventListener("change", checkForm)
    toggleCheckbox1?.addEventListener("change", checkForm)
       const radioButtons = document.querySelectorAll('input[name="document_type"]');

    radioButtons.forEach(function (radio) {
        radio.addEventListener('change', checkForm);  
    });
    radioButtons.forEach(function (radio) {
        radio.addEventListener('change', toggleFields);  
    });
    submitBtn.disabled = true;

function getSelectedDocument() {
        let selectedDoc = 'doc1'; // по умолчанию - документ 1
        radioButtons.forEach(function (radio) {
            if (radio.checked) {
                selectedDoc = radio.value;
            }
        });
        return selectedDoc;
    }

    function toggleFields() {
        const selectedDocument = getSelectedDocument();

        // Скрываем все поля
        document.querySelectorAll('.doc_fields').forEach(function (div) {
            div.style.display = 'none';
        });

        // Показываем только поля для выбранного документа
        const visibleFields = document.getElementById(selectedDocument + '_fields');
        if (visibleFields) {
            visibleFields.style.display = 'block';
        }
    }

    function checkForm() {
        let allFilled = true;
         const selectedDocument = getSelectedDocument();
         const visibleFields = form.querySelectorAll(`#${selectedDocument}_fields input[type="text"], #${selectedDocument}_fields input[type="number"], #${selectedDocument}_fields textarea`);
        visibleFields.forEach(function (input) {
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
toggleFields();
checkForm();
});