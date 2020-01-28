<?php
require __DIR__ . '/views/header.php';
require __DIR__ . '/views/login-wall.php';

$posts = getPostFromFollowing($_SESSION['user']['id'], $pdo);

?>

<?php if (empty($posts)) : ?>
    <article class="no-posts-article">
        <p>You don't follow anyone yet.</p>
    </article>
<?php endif; ?>

<?php
foreach ($posts as $post) :

    $user = getUserById($post['user_id'], $pdo);

    $likes = countLikes((int) $post['user_id'], $pdo);

?>
    <article class="feed-post-article">
        <div class="post-wrapper">

            <div class="post-creator">
                <img class="post-profile-picture" src="<?php echo '/uploads/' . $user['profile_avatar']; ?>" alt="profile picture" loading="lazy">
                <a href="<?php echo '/view-profile.php?user_id=' . $user['id'] ?>">
                    <h3 class="post-username"><?php echo $user['username']; ?></h3>
                </a>
            </div>

            <div class="post-content">
                <img src="<?php echo '/uploads/' . $post['image']; ?>" alt="post image" loading="lazy">
                <div class="feed-likes">
                    <p class="like-count<?php echo $post['post_id'] ?>"><?php echo $likes; ?> likes</p>
                </div>
                <p><?php echo $post['content']; ?></p>
            </div>

            <div class="post-likes">
                <form method="post" class="post-like-form">
                    <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                    <input type="hidden" name="action" value="<?php echo likedPost((int) $_SESSION['user']['id'], (int) $post['post_id'], $pdo) ? 'liked' : 'unliked'; ?>">
                    <button class="like-btn" type="submit">
                        <div class="<?php echo likedPost((int) $_SESSION['user']['id'], (int) $post['post_id'], $pdo) ? 'like-img' : 'unlike-img'; ?>"></div>
                    </button>
                </form>
            </div>

        </div>
    </article>
<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php'; ?>