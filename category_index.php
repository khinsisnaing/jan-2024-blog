<?php 
    include("header.php");  
    include ("sidebar.php");
?>

<?php

    include 'db.php';
    $query = 'SELECT * FROM category';
    $result = mysqli_query($conn, $query);

?>

<a href="category_create.php" class="tm-external-link mb-3">New Category</a>
<table class="table table-sm">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($result as $category): 
        ?>
        <tr>
            <td><?= $category['id'] ; ?></td>
            <td><?= $category['name'] ; ?></td>
            <td>
                <a href="category_edit.php?id=<?= $category['id'] ; ?>" class="text-warning mr-3">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="category_delete.php?id=<?= $category['id'] ; ?>" class="text-danger mr-3">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php 
            endforeach ; 
        ?>
    </tbody>
</table>
<?php include 'footer.php'; ?>