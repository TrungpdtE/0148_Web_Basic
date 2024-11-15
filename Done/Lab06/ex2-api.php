<?php
header("Access-Control-Allow-Origin: *");

// <!-- trên mac nhớ chạy: macbookpro@TTrung-2 lab6_web_522H0148 % php -S localhost:8080 
// rồi mới chạy được file ex2.html -->

$num1 = $_GET["num1"];
$num2 = $_GET["num2"];
$operator = $_GET["operator"];

switch ($operator) {
    case "+":
        $result = $num1 + $num2;
        break;
    case "-":
        $result = $num1 - $num2;
        break;
    case "*":
        $result = $num1 * $num2;
        break;
    case "/":
        $result = $num1 / $num2;
        break;
    default:
        $result = "Invalid operator";
        break;
}

echo $result;