/*[].forEach.call(document.querySelectorAll("*"),function(a){a.style.outline="1px solid #"+(~~(Math.random()*(1<<24))).toString(16)})*/
"use strict"
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form");
  form.addEventListener("submit", formSend);
  async function formSend(e) {
    e.preventDefault();
    let error = formValidate(form);
    let formData = new FormData(form);
    if (error===0) {
    let response = await fetch("sendmail.php", {
      method: "POST",
      body: formData
    });
      if (response.ok) {
        let result = await response.json();
        alert(result.message);
        form.reset();
      } else {
        alert("Ошибка");
      }
    } else {
      alert("Заполните обязательные поля*");
    }
  }
});
