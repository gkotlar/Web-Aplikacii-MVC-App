<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include '../../header.php'; ?>
    <div class="container">
        <div id="content">
            <h1 class="top">Administrator Accounts</h1>
            <?php if (isset($_SESSION['admin'])) : ?>
            <h2>My Account</h2>
            <p><?php echo $name . ' (' . $email . ')'; ?></p>
            <form action="" method="post" style="display:inline;">
                <input type="hidden" name="action" value="view_edit" />
                <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" />
                <input type="submit" value="Edit" class="btn btn-secondary"/>
            </form>
            <form action="" method="post" style="display:inline;">
                <input type="hidden" name="action" value="logout" />
                <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" />
                <input type="submit" value="Log Out" class="btn btn-danger"/>
            </form>
            <?php endif; ?>
            <?php if ( count($admins) > 1 ) : ?>
                <h2>Other Administrators</h2>
                <table>
                <?php foreach($admins as $admin):
                    if ( $admin['adminID'] != $admin_id ) :
                        ?>
                        <tr>
                            <td><?php echo $admin['lastName'] . ', ' .
                                    $admin['firstName']; ?>
                            </td>
                            <td>
                                <form action="" method="post" class="inline" style="display:inline;">
                                    <input type="hidden" name="action"
                                        value="view_edit" />
                                    <input type="hidden" name="admin_id"
                                        value="<?php echo $admin['adminID']; ?>" />
                                    <input type="submit" value="Edit" class="btn btn-secondary"/>
                                </form>
                                <form action="" method="post" class="inline" style="display:inline;">
                                    <input type="hidden" name="action"
                                        value="view_delete_confirm" />
                                    <input type="hidden" name="admin_id"
                                        value="<?php echo $admin['adminID']; ?>" />
                                    <input type="submit" value="Delete" class="btn btn-danger"/>
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </table>
            <?php endif; ?>
            <h2>Add an Administrator</h2>
            <form action="" method="post" id="add_admin_user_form">
                <input type="hidden" name="action" value="create" />
                <label for="email">E-Mail:</label>
                <input type="text" name="email" />
                <br />
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" />
                <br />
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name"  />
                <br />
                <label for="password_1">Password:</label>
                <input type="password" name="password_1" />
                <br />
                <label for="password_2">Retype password:</label>
                <input type="password" name="password_2" />
                <br />
                <label>&nbsp;</label>
                <input type="submit" value="Add Admin User" class="btn btn-primary"/>
            </form>
        </div>
        <?php
        if (isset($_SESSION['form_data'])) {
            unset($_SESSION['form_data']);
        }
        ?>

    </div>
    <?php include '../../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>