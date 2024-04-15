function change() {
  var selectedTipe = document.getElementById("pilihan").value;
  var allMenus = document.querySelectorAll(".menus");
  
  allMenus.forEach(function(menu) {
    // Tampilkan atau sembunyikan elemen berdasarkan tipe
    if (selectedTipe === "semua menu" || menu.classList.contains(selectedTipe)) {
      menu.style.display = "flex";
    } else {
      menu.style.display = "none";
    }
  });
}