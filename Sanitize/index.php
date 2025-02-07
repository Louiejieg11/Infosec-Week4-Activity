<?php
// Function to sanitize input


function sanitizeInput($data) {
    $data = trim($data); // Remove unnecessary spaces before and after
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Converts special characters to prevent XSS
    return $data;
}


$sanitized_name = $sanitized_email = ""; // Default empty values


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sanitized_name = sanitizeInput($_POST['name']);
    $sanitized_email = sanitizeInput($_POST['email']);
    $sanitized_contact = sanitizeInput($_POST['contact']);
    $sanitized_message = sanitizeInput($_POST['message']);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         * {
            box-sizing: border-box;
         }
         body{
            display: flex;
            justify-content: center;
            align-items: center;
         
         }
        form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 500px;
            width: 300px;
            padding: 20px;
            background: #3B6790;
            color: white;
            margin-top: 200px;
           
        }
        input{
            padding: 8px;
            margin: 10px;
            border-radius:5px;
        }
        label{
            text-align: right;
            font-size: 18px;
        }
        button{
            background-color: #EFB036;
            padding: 5px;
            border-radius: 5px;
            width: 30%;
            color: white;
            border: none
        }
        textarea{
            border-radius: 5px;
            margin: 10px
        }
    
        .output{
            font-size: 16px;
            background-color: #EFB036;
            margin-left: 50px;
            padding: 30px;
            
        }
    </style>
</head>
<body>
        <form method="POSt" action=" ">
     
     
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
   

     
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
     

        
        <label for="contact">Contact</label>
        <input type="number" name="contact" id="contact" required>
   
       
     
        <label for="message" class="message">Message</label>
        <textarea id="message" name="message" rows="5" cols="30"></textarea>
        
       
        <button type="submit">Submit</button>

    

        </form>
    <?php if (!empty($sanitized_name) && !empty($sanitized_email)): ?>
       
       <div class="output">
               <h3>Sanitized Output:</h3>
   
               <p>Name: <?php echo htmlspecialchars($sanitized_name, ENT_QUOTES, 'UTF-8'); ?></p>
               <p>Email: <?php echo htmlspecialchars($sanitized_email, ENT_QUOTES, 'UTF-8'); ?></p>
               <p>Contact: <?php echo htmlspecialchars($sanitized_contact, ENT_QUOTES, 'UTF-8'); ?></p>
               <p>Message: <?php echo htmlspecialchars($sanitized_message, ENT_QUOTES, 'UTF-8'); ?></p>
           </div>
       <?php endif; ?>

    
      
</body>
</html>