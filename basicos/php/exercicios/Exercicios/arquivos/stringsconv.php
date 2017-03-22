<?php
$foo = 1 + "10.5";echo $foo."<br>";             // $foo é float (11.5)
$foo = 1 + "-1.3e3";echo $foo."<br>";              // $foo é float (-1299)
$foo = 1 + "bob-1.3e3";echo $foo."<br>";          // $foo é integer (1)
$foo = 1 + "bob3";echo $foo."<br>";                // $foo é integer (1)
$foo = 1 + "10 Small Pigs";echo $foo."<br>";      // $foo é integer (11)
$foo = 4 + "10.2 Little Piggies";echo $foo."<br>"; // $foo é float (14.2)
$foo = "10.0 pigs " + 1;echo $foo."<br>";          // $foo é float (11)
$foo = "10.0 pigs " + 1.0;echo $foo."<br>";        // $foo é float (11)
?>
