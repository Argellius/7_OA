let ukoly = [];

function pridejUkol() {
    let ukolHodnota = document.getElementById("novyUkol").value;
    const kategorie = document.getElementById("kategorie").value;

    if (ukolHodnota.trim()) {
        ukoly.push({
            text: ukolHodnota.trim(),
            kategorie: kategorie,
            hotovo: false
        });

        ukolHodnota = "";
        ulozUkoly();
        zobrazUkoly();
    }
}

function zobrazUkoly() {
    const seznam = document.getElementById("seznamUkolu");
    seznam.innerHTML = "";

    ukoly.forEach((ukol, index) => {
        const polozka =
            "<li class='ukol " + (ukol.hotovo ? "hotovo" : "") + "'> " +
            "<input type='checkbox' " +
            (ukol.hotovo ? "checked" : "") + " onchange='oznacUkol(" + index + ")' >" + ukol.text + " (" + ukol.kategorie + ") </li>";

        seznam.innerHTML += polozka;
    })

}

function oznacUkol(index) {
    console.log("Označuju ukol: " + index);
    ukoly[index].hotovo = !ukoly[index].hotovo;
    ulozUkoly();
    zobrazUkoly();
}

function ulozUkoly() {
    localStorage.setItem("ukoly", JSON.stringify(ukoly));
}


ukoly = JSON.parse(localStorage.getItem("ukoly")) || [];

zobrazUkoly();