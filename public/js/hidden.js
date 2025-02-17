console.log("hidden.js загружен!");

document.addEventListener("DOMContentLoaded", function () {
    const toggleCheckbox = document.getElementById("toggleCheckbox");
    const textElement = document.getElementById("toggleText");

    if (!toggleCheckbox) {
        console.error("❌ Не найден элемент #toggleCheckbox");
    } else {
        console.log("✅ Найден #toggleCheckbox");
    }

    if (!textElement) {
        console.error("❌ Не найден элемент #toggleText");
    } else {
        console.log("✅ Найден #toggleText");
    }

    toggleCheckbox?.addEventListener("change", function () {
        textElement?.classList.toggle("hidden");
    });
});
