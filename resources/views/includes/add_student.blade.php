<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <div class="modal-header">
                <h5 class="modal-title"><b>Add New Student</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card-body text-left">
                    <form method="POST" action="{{ route('students.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Enter Student's Name" id="name" name="name" required />
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Enter Student's Email" id="email" name="email" required />
                        </div>

                        <div class="form-group">
                            <label for="course">Course</label>
                            <input type="text" class="form-control" placeholder="Enter Student's Course" id="course" name="course" required />
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" placeholder="Enter Student's Phone Number(0767505656)" id="phone" name="phone" />
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-danger waves-effect m-l-5" data-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    

</div>

