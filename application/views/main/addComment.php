<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form method="post">
                            <div class="form-group">
                                <label>Author</label>
                                <input class="form-control" type="text" name="author">
                            </div>
                            <div class="form-group">
                                <label>Text</label>
                                <textarea class="form-control" rows="3" name="text"></textarea>
                                <input type="hidden" name="date" value="<?= date('Y-m-d')?>">
                                <input type="hidden" name="time" value="<?= date('H:i:s')?>">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>