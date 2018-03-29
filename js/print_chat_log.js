function print_chat(conversation_id) {
  var file_name = "application/conversations/"+conversation_id+".txt";
   // document.write(file_name);
    document.getElementById("test").innerHTML = file_name;
    alert("tere");

   /*
   <?php
    //TODO: move it to a model file: java script
    $file_name = "application/conversations/".$_SESSION['conversation_id'].".txt";

if (file_exists($file_name)){
    if ($file = fopen($file_name, "r")) {
        while(!feof($file)) {
            $line = fgets($file);
            echo $line."<br>";
        }
        fclose($file);
    }
}

    ?>
    */
}


