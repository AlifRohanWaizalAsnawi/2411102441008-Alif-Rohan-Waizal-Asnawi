<?php
$teks = "Hello World";
for ($a = 10; $a > 5; $a--)
{
    // Baris ini akan mencetak heading yang aneh, misalnya "<h1>0Hello World10</h1>"
    echo "<h".$a.">".$teks."</h".$a.">"; 
}
?>