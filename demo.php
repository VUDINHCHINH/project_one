<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1 lab 5</title>
    
</head>
<body>
     <label id="pro" data-price="1950">iphone 9</label>
     <input id="qty" type="number" oninput="display()">
     <br> 
     <h3>Name: <span id="name">?</span></h3>
     <h3>Amount: <span id="amount">?</span></h3>
     <script>
        function display(){
           var pro= document.getElementById("pro");
           var qty= document.getElementById("qty");
           var name =pro.innerText;
           var price = pro.getAttribute("data-price");
           var quantity=qty.value;
           var amount = price*quantity;
           document.getElementById("name").innerText = name;
           document.getElementById("amount").innerText = amount;
        }
    
    </script>
</body>
</html>
