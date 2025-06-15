document.addEventListener('DOMContentLoaded', function () {

    const downloadBtn = document.getElementById('downloadBtn');
    const form = document.querySelector('form');
    const fields = form.querySelectorAll('input[type="text"], input[type="number"], textarea');
    const submitBtn = form.querySelector('button[type="submit"]'); 
    const toggleCheckbox = document.getElementById("toggleCheckbox");
    const toggleCheckbox1 = document.getElementById("toggleCheckbox1");

    toggleCheckbox?.addEventListener("change", checkForm);
    toggleCheckbox1?.addEventListener("change", checkForm);

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

        // Отображаем/скрываем поля для ввода, связанные с чекбоксами
        const checkboxes = visibleFields.querySelectorAll('[id^="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            const associatedInput = visibleFields.querySelector(`#${checkbox.id}_input`);
            
            // Слушатель для изменения состояния чекбокса
            checkbox.addEventListener('change', function () {
                if (checkbox.checked) {
                    associatedInput.style.display = 'block'; // Показываем поле
                } else {
                    associatedInput.style.display = 'none'; // Скрываем поле
                }
            });
        });
        const checkboxes2 = visibleFields.querySelectorAll('[id^="checkbox"]');
        checkboxes2.forEach(function (checkbox) {
            const associatedInput = visibleFields.querySelector(`#${checkbox.id}_input_2`);
            
            // Слушатель для изменения состояния чекбокса
            checkbox.addEventListener('change', function () {
                if (checkbox.checked) {
                    associatedInput.style.display = 'block'; // Показываем поле
                } else {
                    associatedInput.style.display = 'none'; // Скрываем поле
                }
            });
        });
    }

    function checkForm() {
        let allFilled = true;
        const selectedDocument = getSelectedDocument();
        const visibleFields = form.querySelectorAll(`#${selectedDocument}_fields input[type="text"], #${selectedDocument}_fields input[type="number"], #${selectedDocument}_fields textarea`);

        

      visibleFields.forEach(function (input) {
        // Проверяем, что поле имеет класс ignore-check
        if (input.closest('.ignore-check')) {
            console.log(`Поле с ID ${input.id} игнорируется при проверке (имеет класс ignore-check).`);
            return; // Пропускаем это поле
        }

        // Проверяем, что поле не пустое, если оно не в игнорируемом диапазоне
        if (input.value.trim() === '') {
            allFilled = false;
        }
    
});

// Функция для проверки, попадает ли ID поля в диапазон от textbox1 до textbox20


        // Проверка состояния чекбокса toggleCheckbox1
        if (allFilled && toggleCheckbox1.checked) {   
            submitBtn.disabled = false;
        } else {    
            submitBtn.disabled = true;    
        }
    }

    // Добавляем слушатели событий для отслеживания ввода в поля
    fields.forEach(function (field) {
        field.addEventListener('input', checkForm);
    });

    // Инициализируем отображение полей и проверку формы
    toggleFields();
    checkForm();
});
