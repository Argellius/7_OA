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

function zobrazUkoly(zobrazovaneUkoly = ukoly) {
    const seznam = document.getElementById("seznamUkolu");
    seznam.innerHTML = "";

    zobrazovaneUkoly.forEach((ukol, index) => {
        const polozka =
            `<li class='ukol  ${(ukol.hotovo ? "hotovo" : "")} '> 
            <input type='checkbox'
            ${(ukol.hotovo ? "checked" : "")} onchange='oznacUkol(${index})' >
            ${ukol.text} (${ukol.kategorie}) 
            <button onclick="smazUkol(${index})">Smazat</button></li>`;

        seznam.innerHTML += polozka;
    })

}

function smazUkol(index) {
    ukoly.splice(index, 1);
    ulozUkoly();
    zobrazUkoly();
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

function filtrujUkoly(kategorie_parameter) {
    console.log("Filtruji podle kategorie " + kategorie_parameter);

    if (kategorie_parameter === 'vse') {
        zobrazUkoly();
    }
    else {
        const filtrovaneUkoly = ukoly.filter(ukol => ukol.kategorie === kategorie_parameter);
        zobrazUkoly(filtrovaneUkoly);
        //kategorie_parameter = "prace"
        //ukol.kategorie - nakupy -> nakupy === kategorie_parameter -> false -> nevrátím tento záznam
        //ukol.kategorie - prace -> prace === kategorie_parameter -> true -> vratím tento záznam
        //ukol.kategorie - osobni -> osobni === kateogire_parameter -> false ->nevrátím
        //ukol.kategorie - prace -> prace === kategorie_parameter -> true -> vratím tento záznam
        //ve výsledku ve filtrovanéUkoly budou dva objekty - s indexem 1 a 3, tj. pořadí 2 a 4 ukol.
    }

}

ukoly = JSON.parse(localStorage.getItem("ukoly")) || [];

zobrazUkoly();