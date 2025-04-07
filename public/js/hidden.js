console.log("hidden.js загружен");

document.addEventListener("DOMContentLoaded", function () {
    const toggleCheckbox1 = document.getElementById("toggleCheckbox1");
    const textElement = document.getElementById("toggleText");

    if (!toggleCheckbox1) {
        console.error("❌ Не найден элемент #toggleCheckbox1");
    } else {
        console.log("✅ Найден #1");
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
