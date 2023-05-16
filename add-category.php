
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_user" aria-hidden="true" id="add-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
            	
                <div class="modal-header">
                    <h5 class="modal-title">New Category</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>

                <!-- `country_id`, `country_name` -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group" style="">
                                <label>Category Name (required)</label>
                                 <input class="form-control" style="border: 1px solid #000;" name="cat_name" type="text" required /> 
                            </div>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="submit" name="add_category_btn" class="btn btn-success">Add Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>