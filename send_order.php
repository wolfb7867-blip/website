<?php

$data = json_decode(file_get_contents("php://input"), true);

$name = $data["name"];
$phone = $data["phone"];
$email = $data["email"];
$address = $data["address"];
$delivery = $data["delivery"];
$cart = $data["cart"];
$total = $data["total"];

$to = $email; // отправляем клиенту
$adminEmail = "wolfb7867@gmail.com"; // твоя почта

$subject = "Ваш заказ - Зелёные поля";

$message = "Спасибо за заказ!\n\n";
$message .= "Имя: $name\n";
$message .= "Телефон: $phone\n";
$message .= "Адрес: $address\n";
$message .= "Доставка: $delivery\n\n";
$message .= "Состав заказа:\n";

foreach($cart as $item){
    $message .= $item["name"] . " x" . $item["qty"] . " — " . ($item["price"] * $item["qty"]) . " ₽\n";
}

$message .= "\nИтого: $total ₽";

$headers = "From: noreply@yourdomain.ru";

mail($to, $subject, $message, $headers);
mail($adminEmail, "Новый заказ", $message, $headers);

echo "success";
?>