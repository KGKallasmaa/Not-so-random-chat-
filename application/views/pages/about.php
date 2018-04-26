<title>Rando||About</title>
<meta name="description" content="Learn about the Rando experience">

<div>
    This website was made by Fred Kasemaa, Paul Pung and Karl-Gustav Kallasmaa.
    <br>
    Use it wisely!
    <br>
    Contact information:

    <?php
    echo "<br>";

    $feed=simplexml_load_file(base_url('xml/info.xml'));

    echo "<br>";
    echo $feed->TÄNAV. "<br>";
    echo $feed->LINN. "<br>";
    echo $feed->RIIK. "<br>";
    ?>



</div>

