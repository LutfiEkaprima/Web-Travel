const menu_toggle = document.querySelector(".menu-toggle");
const sidebar = document.querySelector(".sidebar");

menu_toggle.addEventListener("click", () => {
  menu_toggle.classList.toggle("is-active");
  sidebar.classList.toggle("is-active");
});

function calculateTotal() {
  var selectedOption =
    document.getElementById("id_paket_wisata").options[
      document.getElementById("id_paket_wisata").selectedIndex
    ];
  var harga = parseFloat(selectedOption.getAttribute("data-harga"));
  var hargaPerOrang = parseFloat(
    selectedOption.getAttribute("data-harga-per-orang")
  );
  var tambahanOrang = parseInt(document.getElementById("tambahan_orang").value);

  var totalBiaya = harga + tambahanOrang * hargaPerOrang;
  document.getElementById("total_biaya").value = totalBiaya
}

document
  .getElementById("id_paket_wisata")
  .addEventListener("change", function () {
    var selectedOption = this.options[this.selectedIndex];
    var kapasitasMax = selectedOption.getAttribute("data-kapasitas-max");
    var tambahanOrangInput = document.getElementById("tambahan_orang");
    tambahanOrangInput.max = kapasitasMax;
    calculateTotal();
  });

document
  .getElementById("tambahan_orang")
  .addEventListener("input", calculateTotal);

window.onload = function () {
  var selectedOption =
    document.getElementById("id_paket_wisata").options[
      document.getElementById("id_paket_wisata").selectedIndex
    ];
  var kapasitasMax = selectedOption.getAttribute("data-kapasitas-max");
  document.getElementById("tambahan_orang").max = kapasitasMax;
  calculateTotal();
};
