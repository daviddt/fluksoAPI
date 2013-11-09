fluksoAPI
=========

Met behulp van dit bestand kan je data van een sensor opvragen. Via JavaScript is het niet toegestaan om data op te halen uit de flukso API dus daarom heb ik dit bestand gemaakt.

1. Zet "sensordata.php" ergens op je server.
2. Nu kan je via de URL sensor data opvragen
3. Je krijgt een JSON object terug, dit is makkelijk met javascript te verwerken. In dit JSON object staan 2 waardes, een interval en data. Het Interval staat voor de tijd (timestamp), en de waarde is de waarde die erbij hoort.

Dit JSON object kan je makkelijk ophalen met AJAX, als je jQuery gebruikt kan dat bijvoorbeeld zo:

  $.get( "http://daviddentoom.nl/sensordata.php?sensorid=c1411c6b4f9910bbbab09f145f8533b9&token=d8a8ab8893ea73f768b66b4523   4b5c3a", function( data ) { console.log(data); });

Parameters:

  sensorid (verplicht) token (verplicht) interval (optioneel) unit (optineel)

Voorbeeld call:

  http://daviddentoom.nl/sensordata.php?sensorid=c1411c6b4f9910bbbab09f145f8533b9&token=d8a8ab8893ea73f768b66b45234b5c3a

Voorbeeld call met optionele parameters:

  http://daviddentoom.nl/sensordata.php?sensorid=c1411c6b4f9910bbbab09f145f8533b9&token=d8a8ab8893ea73f768b66b45234b5c3a&interval=day&unit=eurperyear

Opties voor interval:

  hour, day, month, year, night

Opties voor unit:

  watt, kwhperyear, eurperyear, audperyear
