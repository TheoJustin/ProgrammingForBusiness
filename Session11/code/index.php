<?php
include 'utils/db.php';
include 'header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Insert new post
if (isset($_POST['new_title']) && !empty($_POST['new_title'])) {
    $title = trim($_POST['new_title']);
    $userId = $_SESSION['user_id'];
    $stmt = mysqli_prepare($conn, "INSERT INTO posts (title, userId) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "si", $title, $userId);
    mysqli_stmt_execute($stmt);
}

// Delete post
if (isset($_GET['delete'])) {
    $postId = (int)$_GET['delete'];
    $stmt = mysqli_prepare($conn, "DELETE FROM posts WHERE postId=? AND userId=?");
    mysqli_stmt_bind_param($stmt, "ii", $postId, $_SESSION['user_id']);
    mysqli_stmt_execute($stmt);
}

// Update post
if (isset($_POST['edit_id']) && isset($_POST['edit_title'])) {
    $id = (int)$_POST['edit_id'];
    $title = trim($_POST['edit_title']);
    $stmt = mysqli_prepare($conn, "UPDATE posts SET title=? WHERE postId=? AND userId=?");
    mysqli_stmt_bind_param($stmt, "sii", $title, $id, $_SESSION['user_id']);
    mysqli_stmt_execute($stmt);
}

// Fetch posts
$stmt = mysqli_prepare($conn, "SELECT postId, title FROM posts WHERE userId=?");
mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<h2>Your Posts</h2>
<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Actions</th>
</tr>
<!-- ini akan fetch next row sampe habis -->
<?php while ($row = mysqli_fetch_assoc($result)): ?> 
<tr>
    <td><?php echo $row['postId']; ?></td>
    <td><?php echo htmlspecialchars($row['title']); ?></td>
    <td>
        <a href="?delete=<?php echo $row['postId']; ?>" onclick="return confirm('Delete this post?')">
            Delete
        </a>
        <a href="#" onclick="editPost(<?php echo $row['postId']; ?>, '<?php echo htmlspecialchars($row['title']); ?>')">
            Edit
        </a>
    </td>
</tr>
<?php endwhile; ?>
<tr>
    <form method="POST">
        <td>New</td>
        <td><input type="text" name="new_title" required></td>
        <td><button type="submit">Add Post</button></td>
    </form>
</tr>
</table>

<form id="editForm" method="POST" style="display:none;">
    <input type="hidden" name="edit_id" id="edit_id">
    <input type="hidden" name="edit_title" id="edit_title">
</form>

<script>
function editPost(id, title) {
    var newTitle = prompt("Edit title:", title);
    if (newTitle !== null) {
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_title').value = newTitle;
        document.getElementById('editForm').submit();
    }
}
</script>
</body></html>
