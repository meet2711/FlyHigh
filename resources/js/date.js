var today = new Date().toISOString().split("T")[0];
document.getElementById("datefield").setAttribute("min", today);