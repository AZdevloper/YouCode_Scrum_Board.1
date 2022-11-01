function update(id) {
  let btn_titleid = "title" + id;
  let btn_dateid = "date" + id;
  let btn_descriptionid = "description" + id;
  let btn_priorityid = "priority" + id;
  let btn_typeid = "type" + id;

  // get content
  let btn_title = document.getElementById(btn_titleid).textContent;
  let btn_date = document.getElementById(btn_dateid).getAttribute("data");
  let btn_description = document.getElementById(btn_descriptionid).textContent;
  let btn_priority = document
    .getElementById(btn_priorityid)
    .getAttribute("data");
  let btn_type = document.getElementById(btn_typeid).getAttribute("data");
  let btn_status = document
    .getElementById(btn_typeid)
    .getAttribute("datastatus");

  //remplire de modal
  if (btn_type == 1) {
    document.getElementById("task-type-feature").checked = true;
    document.getElementById("task-type-bug").checked = false;
  } else {
    document.getElementById("task-type-feature").checked = false;
    document.getElementById("task-type-bug").checked = true;
  }

  document.getElementById("task-title").value = btn_title;
  document.getElementById("task-priority").value = btn_priority;
  document.getElementById("task-status").value = btn_status;
  document.getElementById("task-date").value = btn_date;
  document.getElementById("task-description").value = btn_description;

  //remplire de modal

  document.getElementById("task-id").value = id;
}
// resit form

function resit() {
  document.getElementById("form-task").reset();
}
