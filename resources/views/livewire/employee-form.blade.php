<form wire:submit.prevent="create" action="">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myMediumModalLabel">Add New Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <p class="card-title-desc">Fill in details below.</p>

            <div class="mb-3 row">
                <label for="name" class="col-md-4 col-form-label">Name</label>
                <div class="col-md-8">
                    <input wire:model="name" class="form-control" type="text" placeholder="Add a name" id="department_name" name="department_name">
                </div>
                <span id="name_error" class="text-danger"></span>
            </div>
            <div class="mb-3 row">
                <label for="department_name" class="col-md-4 col-form-label">Department Name</label>
                <div class="col-md-8">
                    <input wire:model="department_name" class="form-control" type="text" placeholder="Add a name" id="department_name" name="department_name">
                </div>
                <span id="department_name_error" class="text-danger"></span>
            </div>
            <div class="mb-3 row">
                <label for="designation" class="col-md-4 col-form-label">Designation</label>
                <div class="col-md-8">
                    <input class="form-control" wire:model="designation" type="text" placeholder="Add a Designation" id="location" name="location">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="contact_number" class="col-md-4 col-form-label">Contact Number</label>
                <div class="col-md-8">
                    <input class="form-control" wire:model="contact_number" type="text" placeholder="Add a contact number" id="contact_number" name="contact_number">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email_address" class="col-md-4 col-form-label">Email Address</label>
                <div class="col-md-8">
                    <input class="form-control" wire:model="email_address" type="email" placeholder="Add an email address" id="email_address" name="email_address">
                </div>
            </div>
            <div class="mb-4 row">
                <label for="status" class="form-label col-form-label col-md-4">Status</label>
                <div class="col-md-8">
                    <select wire:model="status" class="form-control select2 status" name="status">
                        <option>Select</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                        <option value="Pending Restructuring">Pending Restructuring</option>
                        <option value="Pending Budget Approval">Pending Budget Approval</option>
                        <option value="On Hold">On Hold</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary waves-effect btn-label waves-light addBtn">
                    <i class="bx bx-smile label-icon"></i>
                    Add Employee
                </button>
            </div>
        </div>
    </div><!-- /.modal-content -->
</form>
