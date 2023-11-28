@extends('layouts.app')
@section('content')
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">Products</h4> <a href="#" class="btn btn-primary float-right veiwbutton" data-toggle="modal" data-target="#add_product"><i class="fa fa-plus"></i> Add Product</a> </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table class="table table-striped custom-table" id="products_table">
										<thead>
											<tr>
												<th>Name</th>
                                                <th>price</th>
                                                <th>Category</th>
												<th>Product Code</th>
												{{-- <th>Description</th> --}}
												<th class="text-right">Actions</th>
											</tr>
										</thead>
										<tbody>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- Product Modal --}}
<div id="add_product" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add_product_form">
                    @csrf                    
                    <div class="form-group">
                        <label>Category <span class="text-danger">*</span></label>
                        <select class="select form-control" name="category">
                            <option>Select Category</option>
                            <option value="electronics"> Electronics</option>
                            <option value="furniture"> Furniture</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Name <span class="text-danger">*</span></label>
                        <input class="form-control" name="name" type="text">
                    </div>
					<div class="form-group">
                        <label>Price <span class="text-danger">*</span></label>
                        <input class="form-control" name="price" type="number">
                    </div>
                    <div class="form-group">
                        <label>Description <span class="text-danger">*</span></label>
                        <textarea rows="2" class="form-control" name="description"></textarea>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Leave Modal -->
			<div id="delete_asset" class="modal fade delete-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
							<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        @endsection	
		
		
	