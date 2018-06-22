<header class="masthead">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1><?php echo htmlspecialchars($post['title'], ENT_QUOTES); ?></h1>
                    <p><?= htmlspecialchars($post['date']). " " . htmlspecialchars($post['time'])?></p>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p><?php echo htmlspecialchars($post['text'], ENT_QUOTES); ?></p>
        </div>
</div>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php if (empty($comments)): ?>
                <p>No one comment...</p>
            <?php else: ?>
                <?php foreach ($comments as $val): ?>
                    <div class="post-preview">
                            <h2 class="post-title"><?php echo htmlspecialchars($val['author'], ENT_QUOTES); ?></h2>
                            <h5 class="post-subtitle"><?php echo htmlspecialchars($val['text'], ENT_QUOTES); ?></h5>
                            <p><?= $val['date']." ".$val['time']?></p>
                        </a>
                    </div>
                    <hr>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<a href="../main/addComment/<?=$post['id']?>">ADD COMMENT</a>

