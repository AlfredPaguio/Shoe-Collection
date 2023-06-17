<div class="modal fade modal-lg" id="add_shoes" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="../php/shoes.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <h3 class="modal-title">Add Shoes
                    </h3>
                </div>
                <div class="modal-body">

                    <input type="file" name="image" id="image" accept=".png,.gif,.jpg,.jpeg" hidden>




                    <div class="bg-image  hover-overlay ripple mb-4">
                        <img src="../assets/img/shoes_uploads/default.jpg" class="w-100" style="max-height:250px;"
                            id="image-preview" />
                        <a id="imageclick">
                            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <p class="text-white mb-0"><i class="fa-solid fa-edit pe-none"></i>Edit Image</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body modal-dialog-scrollable">
                        <div class="row">
                            <div class="col-12 mb-4">

                                <div class="form-outline">
                                    <input type="text" id="name" name="name" class="form-control form-control-lg"
                                        required />
                                    <label class="form-label" for="name">Shoe Name</label>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <input type="text" id="brand" name="brand" class="form-control form-control-lg"
                                        required />
                                    <label class="form-label" for="brand">Brand</label>
                                </div>

                            </div>
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <input type="text" id="color" name="color" class="form-control form-control-lg"
                                        required />
                                    <label class="form-label" for="color">Color</label>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <input type="number" id="size" name="size" class="form-control form-control-lg"
                                        required />
                                    <label class="form-label" for="size">Size</label>
                                </div>

                            </div>
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <input type="text" id="price" name="price" class="form-control form-control-lg"
                                        required />
                                    <label class="form-label" for="price">Price</label>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-4">

                                <div class="form-outline">
                                    <input type="number" id="quantity" name="quantity" class="form-control form-control-lg"
                                        required />
                                    <label class="form-label" for="quantity">Quantity</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button class="btn btn-success" name="add_shoes" type="submit"><span
                            class="fa-solid fa-edit"></span>
                        Add Shoe</button>
                    <button class="btn btn-danger" type="button" data-mdb-dismiss="modal"><span
                            class="fa-solid fa-delete"></span> Close</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>