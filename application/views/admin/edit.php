<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/admin/edit/<?php echo $data['id']; ?>" method="post" >
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['title'], ENT_QUOTES); ?>" name="title">
                            </div>
                            <div class="form-group">
                                <label>Text</label>
                                <textarea class="form-control" rows="3" name="text"><?php echo htmlspecialchars($data['text'], ENT_QUOTES); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>