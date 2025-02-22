<!DOCTYPE HTML>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Fiktivní hotel - Rezervace</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div>
        <h1>Rezervace pokoje v hotelu U TŘÍ ČEPIC: </h1>
        <form action="process.php" method="post">
            <label for="name"> Jmeno a přijmení: </label>
            <input type="text" id="name" name="name" value="Adam Cerny" required>

            <label for="email"> Email: </label>
            <input type="email" id="email" name="email" value="test@test.com" required>

            <label for="arrival"> Datum odjezdu: </label>
            <input type="date" id="arrival" name="arrival" value="2025-02-08" required>

            <label for="departure"> Datum příjezdu: </label>
            <input type="date" id="departure" name="departure" value="2025-02-14" required>

            <label for="room"> Výběr pokoje: </label>
            <select id="room" name="room">
                <option value="jednoluzkovy"> Jednolůžkový </option>
                <option value="dvouluzkovy"> Dvoulůžkový </option>
                <option value="apartman" selected> Apartmán </option>
            </select>


            <div>
                <h2>Doplňkové služby</h2>
                <label>
                    <input type="checkbox" name="services[]" value="snidane" checked> Snídaně (+150 Kč / noc)
                </label>

                <label>
                    <input type="checkbox" name="services[]" value="obed"> Oběd (+250 Kč / noc)
                </label>

                <label>
                    <input type="checkbox" name="services[]" value="vecere"> Večeře (+150 Kč / noc)
                </label>

                <label>
                    <input type="checkbox" name="services[]" value="parkovani" checked> Parkování (+50 Kč / noc)
                </label>
            </div>

            <div>
                <br>
                <button type="submit">Závazné odeslání objednávky</button>
            </div>


        </form>
    </div>

</body>

</html>