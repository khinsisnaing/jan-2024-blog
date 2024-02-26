<?php

include 'db.php';
$query = "SELECT * FROM category";
$result = mysqli_query($conn, $query);


if(isset($_POST['article-store'])){
    $title = $_POST['title'];
    $body = addslashes($_POST['body']);
    $photos = $_FILES['photos'];
    $category_id = $_POST['category_id'];
    $error = [];

    empty(trim($title)) ? $error[] = 'Title is required': '';
    empty(trim($body)) ? $error[] = 'Body is required': '';
    !is_uploaded_file($photos['tmp_name'][0]) ? $error[] = 'Photo is required': '';
    empty(trim($category_id)) ? $error[] = 'Category is needed to select': '';

    if (!$error) {
        $photo_path = [];
        for ($i = 0; $i < count ($photos['tmp_name']); $i++ ){
            move_uploaded_file($photos['tmp_name'][$i], 'img/'.$photos['name'][$i]);
            $photo_path[] = 'img/'.$photos['name'][$i];
        } $photo_path = json_encode($photo_path);

        $query = "INSERT INTO article (title, body, photos, category_id, posted_at) 
        VALUES ('$title', '$body', '$photo_path', '$category_id', now())";
        $result = mysqli_query($conn, $query);
        if ($result){
            header('location : article_index.php');
        }
        else{
            echo mysqli_connect_error();
        }
    }
}


?>



<?php 
    include 'header.php';
    include 'sidebar.php';

?>

<h1>New Article</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title" class="form-control mb-3">
    <textarea name="body" id="body" cols="30" rows="5" class="form-control mb-3" placeholder="Text Here ..."></textarea>
    <input type="file" name="photos[]" class="form-control mb-3" multiple>
    <select name="category_id" class="form-control mb-3">
        <option value="">select category</option>
        <?php 
            while($row  = mysqli_fetch_assoc($result)): 
        ?>
            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
        <?php 
            endwhile; 
        ?>
    </select>
    <button type="submit" class="tm-search-button" name="article-store">Add</button>

</form>

<?php include 'footer.php' ?>