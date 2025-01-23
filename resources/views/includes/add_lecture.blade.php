<!-- Add Lecture Modal -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title"><b>Add New Lecture</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card-body text-left">
                    <form method="POST" action="{{ route('lectures.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="lecture_name">Lecture Name</label>
                            <input type="text" class="form-control" placeholder="Enter Lecture Name" id="lecture_name" name="lecture_name" required />
                        </div>

                        <div class="form-group">
                            <label for="start_time">Starting Time</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" required />
                        </div>

                        <div class="form-group">
                            <label for="end_time">Ending Time</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" required />
                        </div>

                        <div class="form-group">
                            <label for="lecture_week">Lecture Week</label>
                            <select class="form-control" id="lecture_week" name="lecture_week" required>
                                <option value="" selected>- Select Week -</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="additional_notes">Additional Notes</label>
                            <textarea class="form-control" placeholder="Enter any additional notes" id="additional_notes" name="additional_notes"></textarea>
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