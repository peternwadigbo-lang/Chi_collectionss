<?php
 include "db.php";

 $sql = "SELECT * FROM products ORDER BY id DESC";
 $result = $conn->query($sql);

 $whatsapp = "08168291633";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi_collection</title>
    <style>
    
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:Arial,sans-serif;
    }

     body{
         background:#fdf4f7;
     }

     header{
        background:#111;
        color:white;
        padding:25px;
        text-align:center;
     }

     header h1{
        font-size:40px;
     }
     nav{
        background:#e91e63;
        padding:15px;
        text-align:center;
     }

     nav a{
        color:white;
        text-decoration:none;
        margin:15px;
        font-weight:bold;
     }

     .hero{
        padding:50px 20px;
        text-align:center;
     }

     .hero h2{
        font-size:35px;
        color:#e91e63;
        margin-bottom:15px;
     }

     .products{
        display:flex;
        justify-content:center;
        flex-wrap:wrap;
        gap:25px;
        padding:30px;
     }

     .card{
        background:white;
        width:280px;
        padding:20px;
        border-radius:15px;
        box-shadow:0 5px 15px #ccc;
        text-align:center;
     }

     .card img{
      width:100%;
      height:200px;
      object-fit:cover;
      border-radius:8px;
     }

     .card h3{
      margin:15px 0 8px;
     }

     .price{
      color:#e91e63;
      font-weight:bold;
      font-size:20px;
      margin:10px;
     }

     .whatsapp{
      display:inline-block;
      background:#250366;
      color:white;
      text-decoration:none;
      padding:12px 20px;
      border-radius:25px;
      margin-top:10px;
     }

     footer{
      background:#111;
      color:white;
      text-align:center;
      padding:20px;
      margin-top:30px;
     }
     </style>
     </head>
     <body>

     <header>
      <h1>Chi_collections<h1>
         <p>Fashion Style Elegance</p>
    </header>

    <nav>
      <a href="index.php">Home</a>
      <a href="?category=Clothes">Clothes</a>
      <a href="?category=Bags">Bags</a>
      <a href="?category=Shoes">Shoes</a>
   </nav>

   <section class="hero">

   <h2>Welcome To Chi_collections</h2>

   <p>
      Your favorite store for beautiful clothes,
      quality bags and stylish shoes.
   </p>
   </section>


      <?php
      if (isset($_GET['category'])){ 

         $category = $conn->real_escape_string($_GET['category']);
         $sql = "SELECT * FROM products
                 WHERE category='$category'
                 ORDER BY id DESC";

                 $result = $conn->query($sql);
       } else {
         $sql = "SELECT * FROM products ORDER BY id DESC";
         $result = $conn->query($sql);
       }
       ?>
       
       <section class="products">

         <?php
         
         if ($result && $result->num_rows> 0) {

         while ($product = $result->fetch_assoc()) {
         ?>

           <div class="card">
            
            <img
               src="images/<?php echo htmlspecialchars($product['image']);?>"
               alt="<?php echo htmlspecialchars($product['name']);?>"
               width="200"
               height="200"
               style="object-fit: covers"
               >
               <h3>
                  <?php echo htmlspecialchars($product['name']);?>
               </h3>
               
               <p>
                  <?php echo htmlspecialchars($product['description']);?>
               </p>

               <div class="price">
                  <?php echo number_format($product['price']);?>
               </div>

               <a
                  class="whatsapp"
                  href="https://wa.me/<?php echo $whatsapp; ?>text=<?php echo urlencode('Hello Chi_collections, I want to order' . $product['name']);?>"
                  target="_blank"
                  rel="noopener noreferrer"
                  >
                    order on whatsapp
               </a>
         </div>

         <?php
            }
         } else {
            echo "<p>No products available.</p>";
         }
         ?>
         </section>
         
         <footer>
            <p>&copy 2026 Chi_collections | All Rights Reserved</p>
      </footer>

</body>
</html>