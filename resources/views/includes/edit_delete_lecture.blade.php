<!-- Edit Lecture Modal -->
<div class="modal fade" id="edit{{ $lecture->id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title"><b>Edit Lecture Details</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card-body text-left">
                    <form method="POST" action="{{ route('lectures.update', $lecture->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="lecture_name">Lecture Name</label>
                            <input type="text" class="form-control" placeholder="Enter Lecture Name" id="lecture_name" name="lecture_name" value="{{ $lecture->lecture_name }}" required />
                        </div>

                        <div class="form-group">
                            <label for="start_time">Starting Time</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $lecture->start_time }}" required />
                        </div>

                        <div class="form-group">
                            <label for="end_time">Ending Time</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $lecture->end_time }}" required />
                        </div>

                        <div class="form-group">
                            <label for="lecture_week">Lecture Week</label>
                            <select class="form-control" id="lecture_week" name="lecture_week" required>
                                <option value="{{ $lecture->lecture_week }}" selected>{{ $lecture->lecture_week }}</option>
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
                            <textarea class="form-control" placeholder="Enter any additional notes" id="additional_notes" name="additional_notes">{{ $lecture->notes }}</textarea>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                    Update
                                </button>
                                <button type="button" class="btn btn-danger waves-effect m-l-5" data-dismiss="modal">
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
<!-- Delete Lecture Modal -->
<div class="modal fade" id="delete{{ $lecture->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="align-items: center">
                <h4 class="modal-title"><span class="lecture_id">Delete Lecture</span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('lectures.destroy', $lecture->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="text-center">
                        <h6>Are you sure you want to delete:</h6>
                        <h2 class="bold del_lecture_name">{{ $lecture->lecture_name }}</h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
                    <i class="fa fa-close"></i> Close
                </button>
                <button type="submit" class="btn btn-danger btn-flat">
                    <i class="fa fa-trash"></i> Delete
                </button>
                </form>
            </div>
        </div>
    </div>
</div>