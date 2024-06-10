<?php include '../view/header.php'; ?>
<div id="main">
    <h1>Add Product</h1>
    <form action="../product_catalog/index.php" method="post" id="add_product_form">

        <label>Email:</label>
        <input type="email" name="email" />
        <br />

        <label>Username:</label>
        <input type="input" name="username"/>
        <br />

        <label>Password:</label>
        <input type="password" name="pass" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Sign Up" />
        <br />  <br />
    </form>

</div>
<?php include '../view/footer.php'; ?>