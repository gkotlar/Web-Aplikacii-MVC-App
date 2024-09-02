<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include '../../header.php'; ?>
    <div class="container">
        <div id="content">
            <h1>Category Manager</h1>
            <table id="category_table">
                <?php foreach ($categories as $category) : ?>
                <tr>
                    <form action="" method="post" >
                    <td>
                        <input type="text" name="name"
                                value="<?php echo $category['categoryName']; ?>" />
                    </td>
                    <td>
                        <input type="hidden" name="action" value="update_category" />
                        <input type="hidden" name="category_id"
                            value="<?php echo $category['categoryID']; ?>"/>
                        <input type="submit" value="Update" class="btn btn-secondary"/>
                    </td>
                    </form>
                    <td>
                        <?php if ($category['productCount'] == 0) : ?>
                        <form action="" method="post" >
                            <input type="hidden" name="action" value="delete_category" />
                            <input type="hidden" name="category_id"
                                value="<?php echo $category['categoryID']; ?>" />
                            <input type="submit" value="Delete" class="btn btn-danger"/>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

            <h2>Add Category</h2>
            <form action="" method="post" id="add_category_form" >
                <input type="hidden" name="action" value="add_category" />
                <input type="input" name="name" />
                <input type="submit" value="Add" class="btn btn-primary"/>
            </form>

        </div>
    </div>

    <?php include '../../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>